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
				<button id="logout-btn"><a href="index.php?action=deconnecter">Deconection</a></button>
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
					<h1>Formulaire pour envoyer un message</h1>


					<form action="index.php?action=mety" method="post">
					
						<select class="select" name = "dest">
							<?php

								foreach ($liste[0] as $key => $value) {
								echo "<option value=" .$liste[0][$key] . ">" . $liste[1][$key]. "</option>";
								}
							?>

						</select>
						<input type="text" name="message" id="">
						<input type="submit" value="Envoyer">
					
					</form>
				</section>

			</main> 
	</body>

	<footer id = "footer">
			
	</footer>

</html>