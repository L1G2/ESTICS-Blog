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
        <div><img src="../Assets/img/logo.png" id="icon" alt="User Icon" width="50px"/></div>
        <!-- Login Form -->
        <form>
          <input type="email" id="login" name="login" placeholder="login">
          <input type="password" id="password" name="login" placeholder="password">
          <input type="submit" value="CONNEXION">
        </form>
        <!-- Select rôle -->
        <div id="banner">
          <select class="select">
            <option value="0">Administrateur</option>
            <option value="1" selected>Etudiant</option>
            <option value="2">Professeur</option>
          </select>
        </div>

      </div>
    </div>
    </main>
  </body>
</html>
