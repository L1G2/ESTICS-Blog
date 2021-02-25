
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Assets/css/liste.css">
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
					<h1> Gérer les étudiants</h1>
                    <table>
                        <tr>
                            <th>Num</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Opération</th>
                        </tr>
                        
                        <?php
                            $data = $etudiants;

                            foreach ($data[0] as $key => $value) {
                                echo "
                                        <tr>
                                            <td>". $data[0][$key] ."</td>
                                            <td>". $data[1][$key] ."</td>
                                            <td>". $data[2][$key] ."</td>
                                            <td>". $data[3][$key] ."</td>
                                            <td> <a href='?action=modifier&type=etudiant&id=" .$data[0][$key]. "'>Modifier</a> <a href='?action=supprimer&type=etudiant&id=" .$data[0][$key]. "'>Supprimer</a></td>
                                        
                                        </tr>
                                ";
                            }
                        ?>
                            
                    </table>
                    <a href="?action=ajouterEtudiant&type=1">Ajouter</a>
				</section>

			</main> 
	</body>

	<footer id = "footer">
			
	</footer>

</html>