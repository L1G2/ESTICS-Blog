<?php
	require_once ("Controller/controller.php");

	if(!empty($_GET["action"])){
		$action = $_GET["action"];
		echo("rivo");

		if ($action == "login"){

		}
		elseif ($action == "liste_etudiant"){
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

			echo "1";
			if (isset( $_POST["id"])) {
				echo "2";
				$id = $_POST["id"];
				if (isset( $_POST["nom"])&& isset( $_POST["prenom"])&& isset( $_POST["email"])&& isset( $_POST["type"])){
					echo "3";
					$nom =  $_POST["nom"];
					$prenom =$_POST["prenom"];
					$email = $_POST["email"];
					$type = $_POST["type"];
					update($id, $nom , $prenom ,$email,$type);
				}
			}	
		}
	}   
	else{  
		home();
	}  