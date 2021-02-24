<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once ("../Models/M_user.php");
        if (isset( $_GET["id"])) {
            # code...
            echo "rivo";
            $id = $_GET["id"];
            $user = new user ();
            $details = $user -> details ($id);
            echo "rivo";
            
        }
    ?>
    <form action="/" method="post"></form>

</body>
</html>