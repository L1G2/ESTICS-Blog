<?php

require_once("pdo.php");

class message extends CONNECT_BDD
{
    /* 
        Une fonction ajouter un message
    */
    public function inserer ($emmeteur, $recepteur, $message){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare ("INSERT INTO discussion ( idUserEmmeteur, idUserRecepteur,  message, date) VALUES (?, ?, ?, NOW())");
        $query -> execute(array($emmeteur, $recepteur, $message));
    }
    public function last_message( $id1, $id2){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare ("SELECT  De.message , De.date FROM discussion De  WHERE De.id = (SELECT MAX(D.id) FROM discussion D INNER JOIN user U ON U.id = D.idUserEmmeteur WHERE idUserEmmeteur = ? AND idUserRecepteur = ? OR idUserEmmeteur = ? AND idUserRecepteur = ? ) LIMIT 1 ");
        $query -> execute(array($id1, $id2, $id2, $id1)); 

        $result = $query -> fetch();

        return $result;
    }
    /*
        Une fonction à pour récuperer les 10 dérnier messages envoyer entre deux personnes.
    */
    public function check_message ($user1, $user2){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare ("SELECT concat(U.nom,' ',U.prenom ) AS sender ,D.message , D.date FROM discussion D INNER JOIN user U ON U.id = D.idUserEmmeteur WHERE idUserEmmeteur = ? AND idUserRecepteur = ? OR idUserEmmeteur = ? AND idUserRecepteur = ? ORDER BY date LIMIT 10 ");
        $query -> execute(array($user1, $user2, $user2, $user1));   
        
        $sender = array ();
        $date = array();
        $message = array ();    

        while ($data = $query -> fetch()){
            array_push($sender, $data["sender"]);
            array_push($date, $data["date"]);
            array_push($message, $data["message"]);
        }

        return [$sender, $message, $date];
    }

    /*
        Une fonction pour compter le nombre de nouveaux messages pour un utilisateur et 
    */
    public function check_nb_message ($id){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare (" SELECT COUNT(*) as total from discussion where idUserRecepteur = ? and visibilite = 0 ");
        $query -> execute(array($id, ));   

        $info = $query -> fetch();
        if ($info[0] >= 1){
            return $info[0];
        }        
    }
    /*
            Une fonction qui retourne les dix dernier discussion d'une personne ,
        du discussion ou y a encore des messages non vue jusqu'au discussion ,
        on on a déja vue tout les textes .(comme messeger ;-) )
    */
    public function check_new_message ($idG){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare ("SELECT U.id as id, CONCAT (U.nom ,' ',U.prenom) as sender , COUNT(*) as total , D.visibilite as vue FROM discussion D INNER JOIN user U on U.id = D.idUserEmmeteur WHERE D.visibilite = 0 AND D.idUserRecepteur = ? GROUP BY id ,sender UNION SELECT U.id as id, CONCAT (U.nom ,' ',U.prenom) as sender , COUNT(*) , D.visibilite FROM discussion D INNER JOIN user U on U.id = D.idUserEmmeteur WHERE D.visibilite = 1  GROUP BY id, sender LIMIT 16");
        $query -> execute(array($idG, )); 
        $message = array();
        $date = array();
        $sender = array ();
        $id = array ();
        $new_message = array();
        $visibility = array();

        while ($data = $query -> fetch()){
            if (!in_array($data["sender"], $sender)) {
                array_push($sender, $data["sender"]);
                array_push($new_message, $data["total"]);
                array_push($visibility ,$data["vue"]);
                array_push($id ,$data["id"]);

                $last = $this -> last_message (intval($idG), intval($data["id"]));
                array_push($date ,$last["date"]);
                array_push($message ,$last["message"]);
            }
            else {
                continue;
            }
        }
        return [$id, $sender, $date, $message,  $new_message, $visibility];
    }

    /*
        Une fonction qui fait qui met le message entre deux personne en vue
    */
    public function update_visibility($id1, $id2){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare ("UPDATE discussion SET visibilite = 1  WHERE idUserEmmeteur = ? AND idUserRecepteur = ? ");
        $query -> execute(array($id2, $id1));
    }

    public function   liste (){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare ("SELECT concat(U.nom,' ',U.prenom ) AS sender ,concat(Ud.nom,' ',Ud.prenom ) AS recepteur,D.message , D.date FROM discussion D INNER JOIN user U ON U.id = D.idUserEmmeteur INNER JOIN user Ud ON Ud.id = D.idUserRecepteur ORDER BY date LIMIT 12 ");
        $query -> execute();       
        $sender = array ();
        $recepteur = array();
        $date = array();
        $message = array ();    
        while ($data = $query -> fetch()){
            array_push($sender, $data["sender"]);
            array_push($recepteur, $data["recepteur"]);
            array_push($date, $data["date"]);
            array_push($message, $data["message"]);
        } 

        return [$sender,$recepteur, $message, $date];      
    }  
}   



