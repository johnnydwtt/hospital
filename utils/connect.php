<?php
require_once(dirname(__FILE__).'/../config/bdd.php');

class Database{

    public static function connect(){
        //connection à la base de données
        try {
            $pdo = new PDO(DSN, USERNAME, PASSWORD);
        //je la questionne sur l'authenticité de la base
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //j'attribut une valeurs par défaut à FETCH dans ce cas ceci est un Object ( utilisable dans tout mon code )
            return $pdo;
        } 
        catch (\PDOException $ex) {
            echo $ex->getMessage();
        //si elle n'est pas valide elle me montreras l'erreur grâce au getMessage()
        }
    }

}


