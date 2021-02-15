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
    public function check_nb_messages ($id){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare (" SELECT COUNT(*) as total from discussion where idUserRecepteur = ? and visibilite = 0 ");
        $query -> execute(array($id, ));   

        $info = $sql -> fetch(0);
        if ($info[0] >= 1){
            return $info[0];
        }
        
    }

    /*
        Une fonction qui retourner de qui et qui sont les nouveaux messages et même les autres messages non lu 
    */
    public function check_new_messages ($id){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare (" SELECT CONCAT (U.nom ,' ',U.prenom) as sender , COUNT(*) FROM discussion D INNER JOIN user U on U.id = D.idUserEmmeteur WHERE D.visibilite = 0 AND D.idUserRecepteur = 2 GROUP BY sender UNION SELECT CONCAT (U.nom ,' ',U.prenom) as sender , COUNT(*) FROM discussion D INNER JOIN user U on U.id = D.idUserEmmeteur WHERE D.visibilite = 1 AND D.idUserRecepteur = 2 GROUP BY sender LIMIT 10 ");
        $query -> execute(array($id, )); 

        $sender = array ();
        $new_message = array();

        while ($data = $query -> fetch()){
            array_push($sender, $data["sender"]);
            array_push($new_message, $data["date"]);

        }
    }

}   

$message = new message();

$message -> inserer (2, 1 );

