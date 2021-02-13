<?php

require_once("pdo.php");

class message extends CONNECT_BDD
{
    /* 
        une fonction ajouter un message
    */
    public function inserer ($emmeteur, $recepteur, $message){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare ("INSERT INTO discussion ( idUserEmmeteur, idUserRecepteur,  message, date) VALUES (?, ?, ?, NOW())");
        $query -> execute(array($emmeteur, $recepteur, $message));
    }

    /*
        C'est la fonction à pour récuperer les 10 dérnier messages envoyer entre deux personnes.
    */

}   

$message = new message();

$message -> inserer (2, 1 , "Kaiz lty aaa !! ela lesy zay le ");

