<?php
class Database{

    private $_dsn;
    private $_username;
    private $_password;

    public function connect(){
        $this->_dsn = 'mysql:dbname=hospitale2n;host=localhost;charset=utf8';
        //data source name // nom et host (charset pour configurer les caract spéc)
        $this->_username = 'johnny.dw';
        $this->_password = ']H/ph!EJekuSUq8D';
        //connection à la base de données
        try {
            $pdo = new PDO($this->_dsn, $this->_username, $this->_password);
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


