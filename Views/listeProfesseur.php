
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Assets/css/liste.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/tableau.css">
    <title>Document</title>
</head>
<body>

</body>
</html>

<!DOCTYPE html>
<html>
	<head lang="fr">
		<title>ESTI | Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="Assets/css/template.css">
	</head>

  	<body>
		<header id="header">
				<nav class="menu">
					<img src="Assets/img/logo.png" id="logo" alt="Logo ESTI">
					
					<?php
						require_once ("Models/M_options.php");
						$type = $_SESSION["idType"];
						$ls = $options -> list_option ($type);

						foreach ($ls[0] as $key => $value) {
							# code...
							echo "<a href='".$ls[0][$key] ."'class='options'>".$ls[1][$key]."</a>";
						}
					?>
				</nav>
		</header>	

		<div class="nav">
			<div id="container-user">
				<div id="user-avatar">
					<img src=<?php echo ($_SESSION["profile"]);?> id="avatar" alt="-votre-avatar">
				</div>
				<div id="user-info">
					<h4 id="name"><?php echo ($_SESSION["prenom"]);?></h4>
					<span id="email"><?php echo ($_SESSION["email"]);?></span>
					<h5 id="fontion"><?php echo ($_SESSION["type"]);?></h5>

					<form action="index.php" method="post" enctype="multipart/form-data">>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<input type="submit" value="VALIDER" name="submit">
					</form>
				</div>
			</div>
			<div id="container-tool">
				<button id="logout-btn"><a href="index.php?action=deconnecter">Deconnexion</a></button>
			</div>
		</div>

			<main>
				<section id="panel" class="card">
					<h4>Catégorie</h4>
						<h5>Informatique</h5>
							<ul>
								<li>INFO_261</li>
								<li>INFO_261</li>
								<li>INFO_261</li>
							</ul>
						<h5>Communication</h5>
							<ul>
								<li>ENTR_261</li>
								<li>ENTR_261</li>
								<li>ENTR_261</li>
							</ul>
						<h5>Communication</h5>
							<ul>
								<li>ENTR_261</li>
								<li>ENTR_261</li>
								<li>ENTR_261</li>
							</ul>
				</section>


				<section id="central" class="card">
				<h1>Liste des professeurs</h1>
                    <table>
                        <tr>
							<th>Image</th>
                            <th>Num</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Cours</th>
                            <th>Opération</th>
                        </tr>
                        
                        <?php
                            $data = $professeurs;

                            foreach ($data[0] as $key => $value) {
                                echo "
                                        <tr>
											<td><img src='Assets/img/pdp/".$data[5][$key] ."' alt='une_image' class='profileimage'></td>
                                            <td>". $data[0][$key] ."</td>
                                            <td>". $data[1][$key] ."</td>
                                            <td>". $data[2][$key] ."</td>
                                            <td>". $data[3][$key] ."</td>
                                            <td>". $data[4][$key] ."</td>
                                            <td style='width:90px !important; '> <button class='edit'><a href='?action=modifier&type=professeur&id=" .$data[0][$key]."'>Modifier</a></button><button class='suppr'><a href='?action=supprimer&type=professeur&id=" .$data[0][$key]. "'>Supprimer</a></button></td>
                                        </tr>
                                ";
                            }
                        ?>
                            
                    </table>
                    <button id="add"><span>+</span><a href="?action=ajouterProfesseur&type=2"> Ajouter</a></button>
				</section>

			</main> 
	</body>

	<footer id = "footer">
			
	</footer>

</html>