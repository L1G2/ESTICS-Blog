<!DOCTYPE html>
<html>
	<head lang="fr">
		<title>ESTI | Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="Assets/css/template.css">
		<link rel="stylesheet" type="text/css" href="Assets/css/about.css">
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
					<table class='table-card'>
                        <tr>
                            <h2>Nous concernant<h2>
                        </tr>
                        <tr>
                            <p>Nous sommes des élèves en L1 à l'ESTI accompagnés par le 
                            programme SESAME aspirant à devenir de grand développeur
                            portant l'honneur de notre famille, notre école et notre patrie.
                            <p>
                        </tr>
                        <tr>
                            <td>
                                <div class="card-us">
                                    <img class="card-img" src="Assets/img/us/arleme.png" alt="Avatar">
                                    <div class="container">
                                        <h4><b>Arlème Johnson</b></h4> 
                                        <p>Developpeur FullStack</p> 
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card-us">
                                    <img class="card-img" src="Assets/img/us/zo.png" alt="Avatar">
                                    <div class="container">
                                        <h4><b>Zo Tsihoarana</b></h4> 
                                        <p>Administrateur Base De Donnée</p> 
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card-us">
                                    <img class="card-img" src="Assets/img/us/rivo.png" alt="Avatar">
                                    <div class="container">
                                        <h4><b>Rivo Lalaina</b></h4> 
                                        <p>Developpeur BackEnd</p> 
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
				</section>
			</main> 
	</body>

	<footer id = "footer">
			
	</footer>

</html>
