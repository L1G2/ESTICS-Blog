<?php


require_once("pdo.php");

class user extends CONNECT_BDD
{
   public function signIn( $email, $mdp){
        $bdd = $this -> dbConnect();
        $sql = $bdd -> prepare ("SELECT prenom , T.nom FROM user U INNER JOIN type T ON T.id = U.idType WHERE email = ? AND  mdp = SHA1(?)");
        $sql -> execute (array ($email, $mdp));        
        if ($sql -> rowCount() == 1){
            $info = $sql -> fetch();
            $result = array();
            array_push ($result, $info[0]);
            array_push ($result, $info[1]);
            return $result;
        }    
   }
}
$user = new user();
$test = $user -> signIn("rivo2302@gmail.com",1234);
print_r($test);
