<?php

//on se connecte à la base
require_once(dirname(__FILE__).'/../config/connect.php');

class Patient{

    private $_lastname;
    private $_firstname;
    private $_birthdate;
    private $_phone;
    private $_mail;

    public function __construct($lastname,$firstname,$birthdate,$phone,$mail)
    {
        $this->_lastname = $lastname;
        $this->_firstname = $firstname;
        $this->_birthdate = $birthdate;
        $this->_phone = $phone;
        $this->_mail = $mail;
    }

    public function insertPatient(){
        //on écris la requête
        $sql = 'INSERT INTO `patients`(`lastname`,`firstname`,`birthdate`,`phone`,`mail	`) VALUES (:lastname,:firstname,:birthdate,:phone,:mail)';
        //on prépare la requête
        $query = $pdo->prepare($sql);
        //on injecte les valeurs
        $query->bindvalue(":lastname", $lastname, PDO::PARAM_STR);
        $query->bindvalue(":firstname", $firstname, PDO::PARAM_STR);
        $query->bindvalue(":phone", $phone, PDO::PARAM_STR);
        $query->bindvalue(":mail", $mail, PDO::PARAM_STR);
        $query->bindvalue(":birthdate", $birthdate, PDO::PARAM_STR);
        
        //on exécute la requête
        if(!$query->execute()){
            die("une erreur est survenue");
        }
    }
}




