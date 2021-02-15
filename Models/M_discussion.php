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
        Une fonction pour compter le nombre de nouveaux messages pour un utilisateur
    */
    public function check_new_messages ($id){

    }

}   

$message = new message();

$message -> inserer (2, 1 );

