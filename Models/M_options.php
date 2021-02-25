<?php

require_once("pdo.php");

class options extends CONNECT_BDD
{
    /* 
        Une fonction pour récuperer la liste des options
    */
    public function list_option ($type){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare ("SELECT nom , lien FROM options WHERE idType = ? ORDER BY id DESC");
        $query -> execute(array($type,));   
        
        $nom = array ();
        $lien = array();
        while ($data = $query -> fetch()){
            array_push($lien, $data["lien"]);
            array_push($nom, $data["nom"]);

        }
        return [$lien, $nom];
    }
}

$options = new options ();
