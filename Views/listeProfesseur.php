
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
    <table>
        <th>
            <td>Num</td>
            <td>Nom</td>
            <td>Prenom</td>
            <td>Email</td>
            <td>Cours</td>
            <td>Opération</td>
        </th>
        
        <?php
            $data = $professeurs;

            foreach ($data[0] as $key => $value) {
                echo "
                        <tr>
                            <td>". $data[0][$key] ."</td>
                            <td>". $data[1][$key] ."</td>
                            <td>". $data[2][$key] ."</td>
                            <td>". $data[3][$key] ."</td>
                            <td>". $data[4][$key] ."</td>
                            <td> <a href='?action=modifier&type=professeur&id=" .$data[0][$key]."'>Modifier</a> <a href='?action=supprimer&type=professeur&id=" .$data[0][$key]. "'>Supprimer</a></td>
                        
                        </tr>
                ";
            }professeur
        ?>
            
    </table>
</body>
</html>