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
                    <div class = "privileges" style='text-align:left'>
                        <h1>Bienvenue en tant que Proffesseur <?php echo ($_SESSION["prenom"]);?></h1>
                        <h3> Sur cette plateforme, vous pouvez : </h3>
                            <ul>
                                <li>Envoyer des messages à vos élèves</li> 
                                <li>Publier des articles concernant vos cours</li> 
                            </ul>
                        <div id='citation'>
                            <quotes> "Programmez pour être libre, et libérez de la programmation." </quotes>
                        </div>
                    </div>
				</section>
			</main> 
	</body>

	<footer id = "footer">
			
	</footer>

</html>
