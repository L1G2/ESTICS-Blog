<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Formulaire de modification</h1>
    <form action="index.php?action=update" method="post"> 
    <input type="hidden" name="type" value = <?=  $_GET["type"]?>>
        <input type="hidden" name="id"value = <?=$details[0]?>>       
        Nom = <input type="text" name="nom" id="" value = <?=$details[1]?>> 
        Prenom  =  <input type="text" name="prenom" id="" value = <?=$details[2]?>> 
        email =  <input type="text" name="email" id="" value = <?=$details[3]?>> 
        <br>
         <input type="submit" value="Modifier">         
    </form>

</body>
</html>