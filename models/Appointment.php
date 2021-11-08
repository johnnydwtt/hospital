<?php

require_once(dirname(__FILE__).'/../utils/connect.php');

class Appointment{

    private $_dateTime;
    private $_idPatients;
    private $_id;

    public function __construct($dateTime = NULL, $idPatients = NULL, $id= NULL)
    {
        $this->_dateTime = $dateTime;
        $this->_idPatients = $idPatients;
        $this->_id = $id;
        $this->_pdo = Database::connect();
    }

    public function create(){
        try {
            $sql = 'INSERT INTO `appointments`(`dateHour`,`idPatients`) VALUES (:dateHour,:idPatients)';
            $sth = $this->_pdo->prepare($sql);
                    //on injecte les valeurs
            $sth->bindvalue(":dateHour", $this->_dateTime, PDO::PARAM_STR);
            $sth->bindvalue(":idPatients", $this->_idPatients, PDO::PARAM_STR);

            if(!$sth->execute()){
                die("une erreur est survenue");
                
            }else{
                return true;
            }
            
        } catch (\PDOException $ex) {
            $ex->getMessage();
            return $ex;
        }
        
    }

    public static function read()
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `appointments` LEFT JOIN `patients` ON `appointments`.`idPatients`=`patients`.`id` ORDER BY `dateHour`;';
        //j'envoie ma requette pour récupérer toutes la tables patients que je stock dans une var

        $sth = $pdo->query($sql);

        $listappointment=$sth->fetchAll();
        //je récupère l'intégralité de ma table ( données )
        return $listappointment;

    }

    public function update()
    {
        try{
            $sql = "UPDATE  `appointments` SET `dateHour`=:dateHour WHERE `idPatients`=:idPatients;";

            $sth = $this->_pdo->prepare($sql);

            $sth->bindvalue(":dateHour", $this->_dateTime, PDO::PARAM_STR);
            $sth->bindvalue(":idPatients", $this->_idPatients, PDO::PARAM_STR);

            if($sth->execute()){
                if ($sth->rowCount()==0) {
                    return $sth->rowCount();
                } else {
                    return '<div class="fs-4 text-center text-success">'.'&#9989; Les modifications sont enregistrée avec succès'.'</div>';
                }
                
            }
        } catch (\PDOException $ex) {
            return $ex->getMessage();
        }

    }

    public static function view($idPatients)
    {
        $sql = 'SELECT `idPatients` FROM `appointments` WHERE `idPatients`=:idPatients;';
        //j'envoie ma requette pour récupérer quelques élément de la table patient de l'id selectionné que je stock dans une var
        try {
            $pdo = Database::connect();
            $sth = $pdo->prepare($sql);
            $sth->bindvalue(":idPatients", $idPatients, PDO::PARAM_INT);
            $result=$sth->execute();

            if ($result) {
                $meet=$sth->fetch();
                if ($meet) {
                    return $meet;
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

    public static function allView($idPatients)
    {
        $sql = 'SELECT * 
                FROM `appointments` 
                LEFT JOIN `patients`
                ON `patients`.`id` = `appointments`.`idPatients` 
                WHERE `appointments`.`idPatients`=:idPatients ;';
        //j'envoie ma requette pour récupérer quelques élément de la table patient de l'id selectionné que je stock dans une var
        try {
            $pdo = Database::connect();
            $sth = $pdo->prepare($sql);
            $sth->bindvalue(":idPatients", $idPatients, PDO::PARAM_INT);
            $result=$sth->execute();

            if ($result) {
                $profileCustom=$sth->fetchAll();
                if ($profileCustom) {
                    return $profileCustom;
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


    public static function delete($id)
    {
        try{
            $sql = 'DELETE FROM `appointments`.`id` WHERE `id`= :id;';

            $pdo = Database::connect();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT );

            if(!$sth->execute()){
                    throw new PDOException('Une erreur est survenue') ;
                }else {
                    return $sth->rowCount();
                }

        } catch (\PDOException $ex) {
            $ex->getMessage();
        }
        
    }


    
}