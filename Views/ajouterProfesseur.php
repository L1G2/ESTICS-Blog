<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>
    Ajouter un professeur
</h1>
<form action="?action=insererProfesseur" method="post">
        Nom = <input type="text" name="nom" id=""> <br>
        Prenom= <input type="text" name="prenom" id=""> <br>
        email = <input type="text" name="email" id=""> <br>
        cours = <select name="cours" id="">
                    
                        <?php
                            require_once ("Models/M_cours.php");
                            $cours = new cours ();
                            $variable = $cours -> liste_cours();

                            foreach ($variable[0] as $key => $value) {
                               echo "<option value=" .$variable[0][$key] . ">" . $variable[1][$key]. "</option>";
                            }
                        ?>

                </select> 
                <br>
        mot de passe= <input type="text" name="mdp" id=""> <br>

        <input type="submit" value="Envoyer">
    </form> 
</body>
</html>