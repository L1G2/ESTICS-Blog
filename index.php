<?php
	require_once ("Controller/controller.php");

	if(!empty($_GET["action"])){
		$action = $_GET["action"];
		echo("rivo");

		if ($action == "login"){

		}
		elseif ($action == "liste_etudiant"){
			if (isset( $_GET["id"])) {
				# code...
				$id = $_GET["id"];
				$user = new user ();
				$details = $user -> details ($id);       
				header("location:../Views/modifier.php");
			}
		}

		elseif ($action == "modifier"){
			if (isset( $_GET["id"])) {
				# code...
				$id = $_GET["id"];
				$user = new user ();
				$details = $user -> details ($id);       
				header("location:../Views/modifier.php");
			}
		}
		elseif ($action == "supprimer"){
			if (isset( $_GET["id"])) {
				# code...
				$id = $_GET["id"];
				$user = new user ();
				$user -> delete ($id);      
				
				header("location:../Views/liste.php");
			}       
		}
	}   
	else{  
		home();
	}  