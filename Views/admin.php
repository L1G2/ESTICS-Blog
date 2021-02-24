 
<!DOCTYPE html>
<html>
  <head lang="fr">
  	<title>ESTI | Login</title>
	<meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="../Assets/css/admin.css">
  </head>
  <body>
	<header id="header">
		<nav class="nav">
			<div id="container-user">
				<div id="user-avatar">
					<img src="../Assets/img/avatar.png" id="avatar" alt="-votre-avatar">
				</div>
				<div id="user-info">
					<h4 id="name">Arlème Johson</h4>
					<span id="email">arleme.dev7@gmail.com</span>
					<h5 id="fontion">Administrateur</h5>
				</div>
			</div>
			<div id="container-tool">
				<button id="logout-btn">Deconnexion</button>
			</div>
		</nav>
	</header>
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
			<ul>
				<li style="	float: left;"><h4><a href="#">Liste des étudiants</a></h4></li>
				<li style="	float: right;"><h4><a href="#">Liste des profésseur</a></h4></li>
			</ul>
			<div>
				<table id="tableau">
					<th>
						<td>Num</td>
						<td>Nom</td>
						<td>Prenom</td>
						<td>Email</td>
						<td>Opération</td>
					</th>
					
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
			</div>
		</section>
	</main> 
	<footer>

	</footer>
</body>