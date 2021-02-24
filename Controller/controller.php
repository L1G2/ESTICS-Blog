<?php
    require_once ("Models/M_user.php");
    
    $user = new user();
    function home(){
        require("Views/login.php");
    }
    function liste_etudiant(){
        $etudiants = $user -> liste(1);
        require("Views/listeEtudiant.php");
    }
    
    function liste_professeur(){
        require("Views/liste_equipe_mobile.php");
    }
    
    
    function liste_administrateur(){
        require("Views/liste_UIUX.php");
    }


