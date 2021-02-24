<?php
    require_once ("Models/M_user.php");
    require_once ("Models/M_cours.php");
    
   
    function home(){
        require("Views/login.php");
    }
    function administrateur(){
        require("Views/homeAdmin.php");
    }
    function etudiant(){
        require("Views/homeEtudiant.php");
    }
    function professeur(){
        require("Views/homeProfesseur.php");
    }
    function liste_etudiant(){
        $user = new user();
        $etudiants = $user -> liste(1);
        require("Views/admin.php");
    }  
    function liste_professeur(){
        $user = new user();
        $professeurs = $user -> listeProfesseur();
        require("Views/listeProfesseur.php");
    }  
    function modifier($id){
        $user = new user();
        $details = $user -> details($id);
        require("Views/modifier.php");
    }
    
    function update($id, $nom , $prenom ,$email,$type){
        $user = new user();
        $details = $user -> update($id, $nom , $prenom ,$email);
        header('Location: index.php?action=liste_'.$type);
    }
    function supprimer($id,$type){
        $user = new user();
        $details = $user -> delete($id);
        header('Location: index.php?action='.$type);
    }
    function ajouterEtudiant(){
        require("Views/ajouterEtudiant.php");
    }
    function insertEtudiant($nom, $prenom, $email, $mdp){
        $user = new user();
        $insert = $user -> inserer($nom, $prenom, $email, $mdp,1);
        header('Location: index.php?action=liste_etudiant');
    }
    function ajouterProfesseur(){
        require("Views/ajouterProfesseur.php");
    }
    function insertProfesseur($nom, $prenom, $email, $mdp, $cours){
        $user = new user();
        $insert = $user -> inserer($nom, $prenom, $email, $mdp,2);
        $id = $user -> lastId();
        $course = new cours();
        $update = $course ->update_professeur ($id, $cours);

        header('Location: index.php?action=liste_professeur');
    }
    function accueil( $email, $mdp, $type){
        $user = new user();
        $login = $user -> signIn( $email, $mdp, $type);

        if(isset($login) ){
            session_start ();
            $_SESSION ["id"] = $login[0];
            $_SESSION ["nom"] = $login[1];
            $_SESSION ["prenom"] = $login[2];
            $_SESSION ["type"] = $login[3];
            $_SESSION ["idType"] = $login[4];
            $_SESSION ["email"] = $login[5];
            $_SESSION ["profile"] = $login[6];

            header("location:index.php?action=".$login[3]);
                
        } 
        else{
            header('Location: index.php');

        }
    }