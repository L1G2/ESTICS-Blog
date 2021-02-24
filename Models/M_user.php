<?php

require_once("pdo.php");

class user extends CONNECT_BDD
{
    /*
        La fonction d'authentification.
    */
    public function signIn( $email, $mdp, $type){
        $bdd = $this -> dbConnect();
        $sql = $bdd -> prepare ("SELECT U.id,U.nom, U.prenom , T.nom as type,T.id as idType FROM user U INNER JOIN type T ON T.id = U.idType WHERE email = ? AND  mdp = SHA1(?) AND T.id  = ?");
        $sql -> execute (array ($email, $mdp, $type));  
        $result = array();      
        if ($sql -> rowCount() == 1){
            $info = $sql -> fetch();
            array_push($result, $info["id"]);
            array_push($result, $info["nom"]);
            array_push($result, $info["prenom"]);
            array_push($result, $info["type"]);
            array_push($result, $info["idType"]);
            return $result;
        }    
   }    
   /*
        Une fonction qui récupère la liste des users, soit étudiant  soit administrateur  ,
        soit un professeur. Elle prend en paramètre: 
            1= listes es etudiants 
            
            3= liste des aadministrateurs
        Il retourne trois tableaux : Les numéros, Les noms , les prenoms, les emails
   */
    public function liste ($type) {
        $bdd = $this -> dbConnect();
        $query = $bdd -> prepare ("SELECT U.id, U.nom ,prenom ,email   FROM user U INNER JOIN type T ON T.id = U.idType WHERE T.id  = ?");
        $query -> execute (array ($type,));
        $numero = array();
        $nom = array ();
        $email = array ();
        $prenom = array ();

        while ( $data = $query -> fetch()){
            array_push($numero, $data["id"]);
            array_push($nom, $data["nom"]);
            array_push($prenom, $data["prenom"]);
            array_push($email, $data["email"]);
        }
        return [$numero, $nom, $prenom, $email];
   }
   /*
        Une fonction qui va récuperer la liste des professeurs ainsi que les cours qu'ils occuppent
   */
    public function listeProfesseur () {
        $bdd = $this -> dbConnect();
        $query = $bdd -> prepare ("SELECT U.id, U.nom ,prenom ,email, C.nom AS cours   FROM user U INNER JOIN cours  C ON C.idUser = U.id INNER JOIN type T ON T.id = U.idType WHERE T.id  = 2");
        $query -> execute (array ($type,));
        $numero = array();
        $nom = array ();
        $email = array ();
        $prenom = array ();
        $cours= array ();

        while ( $data = $query -> fetch()){
            array_push($numero, $data["id"]);
            array_push($nom, $data["nom"]);
            array_push($prenom, $data["prenom"]);
            array_push($email, $data["email"]);
            array_push($cours, $data["cours"]);
        }
        return [$numero, $nom, $prenom, $email, $cours];
    }
   /*
        Une fonction de récuperer les details sur un user en particulier.
   */
    public function details($id){
        $bdd = $this -> dbConnect();
        $sql = $bdd -> prepare ("SELECT id, nom ,prenom ,email   FROM user U WHERE U.id = ? LIMIT 1") ;
        
        $sql -> execute (array ($id   ,));  
        $query =$sql -> fetch();
        $result = array ();
        array_push($result, $query["id"]);
        array_push($result, $query["nom"]);
        array_push($result, $query["prenom"]);
        array_push($result, $query["email"]);
        


        return $result;
   }

   /*
        Une fonction qui va se charger de la modification des élements dans la table users.
   */
    public function update ($id, $nom , $prenom ,$email){
        $bdd = $this -> dbConnect();
        $query = $bdd -> prepare ("UPDATE user SET nom = ?, prenom = ? , email = ? WHERE id = ? ");
        $query -> execute (array ($nom , $prenom ,$email,$id));
   }

   /*
        Une fonction de supression d'une ligne de la table users.
   */
    public function delete ($id){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare ("DELETE FROM user WHERE user.id = ?");
        $query -> execute(array($id, ));

        $track = $bdd -> prepare ("UPDATE cours as C SET C.idUser = null where  not EXISTS (SELECT * from user U where U.id = C.idUser)");
        $track -> execute();
    }
    /*
        Une fonction pour insérer des lignes dans la table users
    */  
    public function inserer ($nom, $prenom, $email, $mdp, $idType){
        $bdd = $this -> dbconnect();
        $query = $bdd -> prepare ("INSERT INTO user ( nom, prenom, email, mdp,  idType) VALUES (?, ?, ?, SHA1(?), ?)");
        $query -> execute(array($nom, $prenom, $email, $mdp, $idType));
    }

    /*
        Une fonction pour changer le profile de l'utilisateur
    */
    public function updateProfile ($id, $profile){
        $bdd = $this -> dbConnect();
        $query = $bdd -> prepare ("UPDATE user SET profile = ? WHERE id = ? ");
        $query -> execute (array ($profile,$id));
        
   }   
   public function lastId (){
        $bdd = $this -> dbConnect();
        $sql = $bdd -> prepare ("SELECT max(id)  FROM user ");
        $sql -> execute ();        
        if ($sql -> rowCount() == 1){
            $info = $sql -> fetch();
            return $info[0];
        }        
   }

}


