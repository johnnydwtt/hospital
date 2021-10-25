<?php

//on se connecte à la base
require_once(dirname(__FILE__).'/../config/connect.php');

class Patient{

    private $_lastname;
    private $_firstname;
    private $_birthdate;
    private $_phone;
    private $_mail;
    private $_pdo;

    public function __construct($lastname,$firstname,$birthdate,$phone,$mail)
    {
        $this->_lastname = $lastname;
        $this->_firstname = $firstname;
        $this->_birthdate = $birthdate;
        $this->_phone = $phone;
        $this->_mail = $mail;
        //connection avec la class database 
        $database = new Database();
        $this->_pdo = $database->connect();
    }

    public function create()
    {
        //on écris la requête
        $sql = 'INSERT INTO `patients`(`lastname`,`firstname`,`birthdate`,`phone`,`mail`) VALUES (:lastname,:firstname,:birthdate,:phone,:mail)';
        //on prépare la requête
        $sth = $this->_pdo->prepare($sql);
        //on injecte les valeurs
        $sth->bindvalue(":lastname", $this->_lastname, PDO::PARAM_STR);
        $sth->bindvalue(":firstname", $this->_firstname, PDO::PARAM_STR);
        $sth->bindvalue(":phone", $this->_phone, PDO::PARAM_STR);
        $sth->bindvalue(":mail", $this->_mail, PDO::PARAM_STR);
        $sth->bindvalue(":birthdate", $this->_birthdate, PDO::PARAM_STR);
        
        //on exécute la requête
        if(!$sth->execute()){
            die("une erreur est survenue");
        }
    }

    public function read()
    {
        //on appel connect.php ( notre connexion à la base de données)
        $sql = 'SELECT `patients`.`lastname`,`patients`.`firstname`,`patients`.`birthDate`,`patients`.`mail`,`patients`.`phone` FROM `patients`';
        //j'envoie ma requette pour récupérer toutes la tables clients que je stock dans une var

        $sth = $this->_pdo->query($sql);

        $patient=$sth->fetchAll();
        //je récupère l'intégralité de ma table ( données )
        
    }
}




