<?php
	require_once ("Controller/controller.php");

	/*
		Récupérer l'action de l'utilisateur
	*/
	if(!empty($_GET["action"])){
		$action = $_GET["action"];

		if ($action == "login"){
			/*
				Si l'utilisateur veut se connecter
			*/
			if (isset( $_POST["email"])&& isset( $_POST["mdp"])&& isset( $_POST["type"])){
				echo ("test");
				$email = $_POST["email"];
				$mdp =  $_POST["mdp"];
				$type  =  $_POST["type"];
				accueil( $email, $mdp, $type);
			}
		}
		elseif ($action == "administrateur"){
			administrateur();
			liste_etudiant();
		}
		elseif ($action == "liste_professeur"){
			liste_professeur();
		}
		elseif ($action == "modifier"){
			if (isset( $_GET["id"])) {
				# code...
				$id = $_GET["id"];
				modifier ($id);
			}
		}
		elseif ($action == "supprimer"){
			if (isset( $_GET["id"])) {
				$id = $_GET["id"];
				if (isset( $_GET["type"])) {
					$type = $_GET["type"];
					 if ($type =="professeur"){
						supprimer ($id, "liste_professeur");
					 }
					 if ($type =="etudiant"){
						supprimer ($id, "liste_etudiant");
					}
				
				}
			}	
		}
		elseif ($action == "update"){

			if (isset( $_POST["id"])) {
				$id = $_POST["id"];
				if (isset( $_POST["nom"])&& isset( $_POST["prenom"])&& isset( $_POST["email"])&& isset( $_POST["type"])){
					$nom =  $_POST["nom"];
					$prenom =$_POST["prenom"];
					$email = $_POST["email"];
					$type = $_POST["type"];
					update($id, $nom , $prenom ,$email,$type);
				}
			}	
		}
		elseif ($action == "ajouterEtudiant"){
			ajouterEtudiant();
		}
		elseif ($action == "insererEtudiant"){


			if (isset( $_POST["nom"])&& isset( $_POST["prenom"])&& isset( $_POST["email"])&& isset( $_POST["mdp"])){
				$nom =  $_POST["nom"];
				$prenom =$_POST["prenom"];
				$email = $_POST["email"];
				$mdp = $_POST["mdp"];
				insertEtudiant($nom, $prenom, $email, $mdp);	
			}
		}	
		elseif ($action == "ajouterProfesseur"){
			ajouterProfesseur();
		}
		elseif ($action == "insererProfesseur"){
			if (isset( $_POST["nom"])&& isset( $_POST["prenom"])&& isset( $_POST["email"])&& isset( $_POST["mdp"])){
				$nom =  $_POST["nom"];
				$prenom =$_POST["prenom"];
				$email = $_POST["email"];
				$mdp = $_POST["mdp"];
				$cours = $_POST["cours"];
				insertProfesseur($nom, $prenom, $email, $mdp,$cours);	
			}
		}
	}   
	else{  
		home();
	}  