<?php
	require_once ("Controller/controller.php");

	/*
		Récupérer l'action de l'utilisateur
	*/
	session_start();
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
		elseif ($action == "ajouterProfesseur"){
			ajouterProfesseur();
		}
		elseif ($action == "administrateur"){
			administrateur();
		}
		elseif ($action == "publish"){
			publier();
		}
		elseif ($action == "about"){
			about();
		}
		elseif ($action == "ajouterEtudiant"){
			ajouterEtudiant();
		}
		elseif ($action == "professeur"){
			professeur();
		}
		elseif ($action == "etudiant"){
			etudiant();
		}
		elseif ($action == "liste_professeur"){
			liste_professeur();
		}
		elseif ($action == "liste_article"){
			liste_article();
		}
		elseif ($action == "liste_message"){
			liste_message();
		}
		elseif ($action == "liste_etudiant"){
			liste_etudiant	();
		}
		elseif ($action == "deconnecter"){
			session_destroy();
			home();

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

		elseif ($action == "insererEtudiant"){


			if (isset( $_POST["nom"])&& isset( $_POST["prenom"])&& isset( $_POST["email"])&& isset( $_POST["mdp"])){
				$nom =  $_POST["nom"];
				$prenom =$_POST["prenom"];
				$email = $_POST["email"];
				$mdp = $_POST["mdp"];
				insertEtudiant($nom, $prenom, $email, $mdp);	
			}
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
		elseif ($action == "message"){
			if (isset( $_GET["id"])){
				msg($_SESSION["id"], $_GET["id"] );
			}
			else {
				personnel($_SESSION["id"]);
			}
		}
		elseif ($action == "envoyer"){
			if (isset( $_GET["id"])&& $_POST["message"]){
				envoyer ($_SESSION["id"], $_GET["id"] , $_POST["message"]);
			}
			else {
				formulaireMessage ();
			}
		}
		elseif ($action == "publierArticle"){
			if (isset($_GET["id"]) && isset($_POST["article"])&& isset($_POST["objet"])){
				$id = $_SESSION["id"];
				$article = $_POST["article"];
				$objet = $_POST ["objet"];

				publish ($id,$article ,$objet);
			}
		}

	} 
	elseif (isset ($_POST["submit"])){
		$target_dir = "pdp/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		  if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		  } else {
			echo "File is not an image.";
			$uploadOk = 0;
		  }
		}
		
		// Check if file already exists
		if (file_exists($target_file)) {
		  echo "Sorry, file already exists.";

		  $chemin = "pdp/".$_FILES["fileToUpload"]["name"];
		  $user = new user ();
		  $user -> updateProfile ($_SESSION["id"],$chemin);
		  $_SESSION ["profile"]= $chemin;
		  $uploadOk = 0;
		}
		
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		  echo "Sorry, your file is too large.";
		  
		  $uploadOk = 0;
		}
		
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}
		
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
			$chemin = "pdp/".$_FILES["fileToUpload"]["name"];
			$user = new user ();
			$user -> updateProfile ($_SESSION["id"],$chemin);
			$_SESSION ["profile"]= $chemin;
		  } else {
			echo "Sorry, there was an error uploading your file.";
		  }
		}
		header('Location: index.php?action=etudiant');
		
	}  
	else{  
		home();
	}  