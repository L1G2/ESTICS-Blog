<?php

require_once("pdo.php");

class cours extends CONNECT_BDD
{
    public function liste_cours (){
        $bdd = $this -> dbConnect();
        $query = $bdd->query("SELECT nom FROM cours");
        $cours = $query->fetchAll();
        return $cours;
    }
    
}    