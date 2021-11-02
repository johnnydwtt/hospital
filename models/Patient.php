<?php

//on se connecte à la base
require_once(dirname(__FILE__).'/../utils/connect.php');

class Patient{

    private $_id;
    private $_lastname;
    private $_firstname;
    private $_birthdate;
    private $_phone;
    private $_mail;
    private $_pdo;

    public function __construct($lastname = NULL,$firstname = NULL,$birthdate = NULL,$phone = NULL,$mail = NULL,$id = NULL)
    {
        $this->_id = intval($id);
        $this->_lastname = $lastname;
        $this->_firstname = $firstname;
        $this->_birthdate = $birthdate;
        $this->_phone = $phone;
        $this->_mail = $mail;
        //connection avec la class database 
        $this->_pdo = Database::connect();
    }
// **********************************************************************************
// **********************************************************************************

    public function create()
    {
        try {
            $sql = 'INSERT INTO `patients`(`lastname`,`firstname`,`birthdate`,`phone`,`mail`) VALUES (:lastname,:firstname,:birthdate,:phone,:mail)';
            $sth = $this->_pdo->prepare($sql);
                    //on injecte les valeurs
            $sth->bindvalue(":lastname", $this->_lastname, PDO::PARAM_STR);
            $sth->bindvalue(":firstname", $this->_firstname, PDO::PARAM_STR);
            $sth->bindvalue(":phone", $this->_phone, PDO::PARAM_STR);
            $sth->bindvalue(":mail", $this->_mail, PDO::PARAM_STR);
            $sth->bindvalue(":birthdate", $this->_birthdate, PDO::PARAM_STR);

            if(!$sth->execute()){
                die("une erreur est survenue");
            }else {
                include(dirname(__FILE__).'/../controllers/list-patientsCtrl.php');
            }

        } catch (\PDOException $ex) {
            $ex->getMessage();
        }
    }

// **********************************************************************************
// **********************************************************************************

    public function read()
    {
        
        $sql = 'SELECT * FROM `patients`';
        //j'envoie ma requette pour récupérer toutes la tables patients que je stock dans une var

        $sth = $this->_pdo->query($sql);

        $patient=$sth->fetchAll();
        //je récupère l'intégralité de ma table ( données )
        return $patient;
    }

// **********************************************************************************
// **********************************************************************************

    public static function view($id)
    {
        $sql = 'SELECT * FROM `patients` WHERE `id`=:id';
        //j'envoie ma requette pour récupérer quelques élément de la table patient de l'id selectionné que je stock dans une var
        try {
            $pdo = Database::connect();
            $sth = $pdo->prepare($sql);
            $sth->bindvalue(":id", $id, PDO::PARAM_INT);
            $result=$sth->execute();

            if ($result) {
                $profile=$sth->fetch();
                if ($profile) {
                    return $profile;
                }else {
                    throw new PDOException("Le profil n'existe pas");
                }
            }else{
                throw new PDOException("Problème d'execution de requête");
                
            }
            
        } catch (\PDOException $ex) {
            return $ex;
        }

    }

// **********************************************************************************
// **********************************************************************************

    public function update()
    {
        try{
            $sql = "UPDATE  `patients` SET `lastname`=:lastname, `firstname`=:firstname, `birthdate`=:birthdate, `phone`=:phone, `mail`=:mail WHERE `id`=:id";

            $sth = $this->_pdo->prepare($sql);

            $sth->bindvalue(":lastname", $this->_lastname, PDO::PARAM_STR);
            $sth->bindvalue(":firstname", $this->_firstname, PDO::PARAM_STR);
            $sth->bindvalue(":phone", $this->_phone, PDO::PARAM_STR);
            $sth->bindvalue(":mail", $this->_mail, PDO::PARAM_STR);
            $sth->bindvalue(":birthdate", $this->_birthdate, PDO::PARAM_STR);
            $sth->bindvalue(":id", $this->_id, PDO::PARAM_INT);

            if($sth->execute()){
                if ($sth->rowCount()==0) {
                    $sth->rowCount();
                } else {
                    echo '<div class="fs-4 text-center text-success">'.'&#9989; Les modifications sont enregistrée avec succès'.'</div>';
                }
                
                
            }

        } catch (\PDOException $ex) {
            $ex->getMessage();
        }

    }

// **********************************************************************************
// **********************************************************************************

    public function delete($id)
    {
        try{
            $sql = 'DELETE FROM `patients` WHERE `id`= "'.$id.'"';

            $sth = $this->_pdo->prepare($sql);

            if(!$sth->execute()){
                    echo "supréssion erreur";
                }else {
                    echo "supréssion effectué avec succès";
                }

        } catch (\PDOException $ex) {
            $ex->getMessage();
        }
        
    }

}

// **********************************************************************************
// **********************************************************************************



