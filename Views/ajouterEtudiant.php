<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Formulare d'ajout Etudiant 
    <form action="?action=insererEtudiant" method="post">
        Nom = <input type="text" name="nom" id=""> <br>
        Prenom= <input type="text" name="prenom" id=""> <br>
        email = <input type="text" name="email" id=""> <br>
        mot de passe= <input type="text" name="mdp" id=""> <br>

        <input type="submit" value="Envoyer">
    </form>

</body>
</html>