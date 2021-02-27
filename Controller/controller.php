<?php
    require_once ("Models/M_user.php");
    require_once ("Models/M_cours.php");
    require_once ("Models/M_discussion.php"); 
    require_once ("Models/M_article.php"); 
    
    //Pour afficher la page de login
    function home(){
        require("Views/login.php");
    }
    //Pour afficher la page de formulaire pour la publication d'un article
    function publier(){
        require("Views/publier.php");
    }
    //Pour afficher la page pour envoyer un des personnes en particulier
    function formulaireMessage(){
        $user = new user();
        $liste = $user -> available();
        require("Views/formMessage.php");
    }

    //Pour afficher la page discussion entre deux personne
    function msg($me, $other){
        $message = new message ();
        $idOther= $other;
        $vue = $message -> update_visibility($me, $other);
        $liste = $message -> check_message ($me ,$other);
        require("Views/envoie.php");
    }
    function envoyer($mandef, $mandray, $alefa){
        $message = new message ();
        if ($mandef == $mandray ){
            header('Location: index.php?action=message&id='.$mandray);   
        }
        else {
            $send = $message -> inserer ($mandef, $mandray, $alefa);
            header('Location: index.php?action=message&id='.$mandray);
    
        }

    }
    function publish ($id, $articles,$objet,$image){
        $article = new article();
        $pub = $article -> inserer ($id, $articles, $objet,$image);
        header('Location: index.php?action=professeur');
    }
    function personnel($id){
        $message = new message ();
        $liste = $message -> check_new_message ($id);

        require("Views/message.php");
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
    function about(){
        require("Views/about.php");
    }
    function liste_etudiant(){
        $user = new user();
        $etudiants = $user -> liste(1);
        require("Views/listeEtudiant.php");
    } 
    function liste_message(){
        $message = new message ();
        $liste = $message -> liste();
        require("Views/listeMessage.php");
    }   
    function liste_article(){
        $article = new article ();
        $liste = $article -> liste  ();
        require("Views/listeArticle.php");
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
            $_SESSION ["profile"] = "Assets/img/pdp/".$login[6];

            header("location:index.php?action=".$login[3]);
                
        } 
        else{
            header('Location: index.php');

        }
    }