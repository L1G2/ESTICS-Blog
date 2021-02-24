<!DOCTYPE html>
<html>
  <head>
  	<title>ESTI | Login</title>
  	<link rel="stylesheet" type="text/css" href="../Assets/css/login.css">
  </head>
  <body>
  		<!--
  	 	  📝 Login form for the estics-Blog 📝
  	 -->
    <main>
      <div id="container">
        <h2 class="title">Se connecter</h2>
        <div>
          <img src="../Assets/img/logo.png" id="logo" alt="Logo ESTI"/>
        </div>

        <!-- Login Form -->
        <form method="POST" action="index.php?action=login">
          <input type="email" id="login" name="email" placeholder="Email ESTI" autocomplete="off">
          <input type="password" id="password" name="mdp" placeholder="Mot de passe">
          <input type="submit" value="connexion">

          <div id="banner">
            <select class="select" name = "type">
              <option value="1">Etudiant</option>
              <option value="2" selected>Professeur</option>
              <option value="3">Administrateur</option>
            </select>
          </div>
        </form>

        <!-- Select rôle -->

        </div>
      </div>
    </main>
  </body>
</html>
