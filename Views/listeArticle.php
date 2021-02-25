<!DOCTYPE html>
<html>
	<head lang="fr">
		<title>ESTI | Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="Assets/css/template.css">
		<link rel="stylesheet" type="text/css" href="Assets/css/tableau.css">
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
					<h1>Liste des articles </h1>

					<table>
                        <tr>
                            <th>Cours</th>
                            <th>Professeur</th>
                            <th>Objet</th>
                            <th>Texte</th>
                            <th>Date</th>
                        </tr>
                        
                        <?php
                            $data = $liste;

                            foreach ($data[0] as $key => $value) {
                                echo "
                                        <tr>
                                            <td>". $data[1][$key] ."</td>
                                            <td>". $data[0][$key] ."</td>
                                            <td>". $data[2][$key] ."</td>
                                            <td>". $data[3][$key] ."</td>       
											<td>". $data[4][$key] ."</td>                                   
                                        </tr>
                                ";
                            }
                        ?>
                            
                    </table>
				</section>

			</main> 
	</body>

	<footer id = "footer">
			
	</footer>

</html>