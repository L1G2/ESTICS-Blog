<?php

require_once("pdo.php");

class article extends CONNECT_BDD
{
    /* 
        Une fonction ajouter un message
    */
    public function inserer ($id, $article,$objet,$image){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare ("INSERT INTO article (idUser, objet, article, image) VALUES (? ,? ,?, ?)");
        $query -> execute(array($id,$objet,$article,$image));
    }

    public function liste (){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare ("SELECT C.nom as cours , concat( U.nom, U.prenom) as professeur ,A.objet , A.article, A.image as texte , A.date, A.image FROM article A INNER JOIN user U on U.id = A.idUser INNER JOIN cours C ON C.idUser = U.id  LIMIT 5");
        $query -> execute();

        $cours = array ();
        $professeur = array ();
        $objet = array ();
        
        $image = array();
        $texte = array ();
        $date = array ();
        while ($data = $query -> fetch()) {
            array_push ($cours, $data["cours"]);
            array_push ($professeur, $data["professeur"]);
            array_push ($objet, $data["objet"]);
            array_push ($texte, $data["texte"]);
            array_push ($date, $data["date"]);
            array_push ($image, $data["image"]);
        }
        return [$professeur, $cours, $objet, $texte, $date,$image];

    }

}
