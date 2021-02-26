<?php

require_once("pdo.php");

class cours extends CONNECT_BDD
{


    /*
        Voir la liste des cours disponible
    */
    public function liste_cours (){
        $bdd = $this -> dbConnect();
        $query = $bdd->query("SELECT nom,id FROM cours WHERE idUser IS NULL");
        $cours = array ();
        $id = array();
        while ($data = $query -> fetch()){
            array_push($cours, $data["nom"]);
            array_push($id, $data["id"]);
        }
        return [$id, $cours];
    }

    /*
        Mettre à jour l'id  de professeur qui occupe le cours
    */
    public function update_professeur ($idUser, $id){
        $bdd = $this -> dbConnect();
        $query = $bdd->prepare("UPDATE cours SET idUser=?  WHERE id=? ");
        $query->execute(array($idUser, $id ));
    }
}    