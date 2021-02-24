<?php

    class CONNECT_BDD{
        public function dbConnect(){
            // Les configurations de la base de donnéeacceuil.php#
  
            $DB_HOST = 'localhost';
            $DB_USER = 'offman';
            $DB_PASS = 'offman';
            $DB_NAME = 'ESTICS';
            
            try{
                $pdo = new PDO("mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME, $DB_USER, $DB_PASS);
                // Si connection non établie
                return $pdo ;
            } catch(Exception $error){
                die("[ERREUR] La connexion à la BDD a échouée :" . $error->getMessage());
            }
        }
    }
?>