<?php

require_once(dirname(__FILE__).'/../utils/connect.php');

class Appointment{

    private $_dateTime;
    private $_idPatients;

    public function __construct($dateTime = NULL, $idPatients = NULL)
    {
        $this->_dateTime = $dateTime;
        $this->_idPatients = $idPatients;
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
        $sql = 'SELECT `dateHour`,`idPatients` FROM `appointments`;';
        //j'envoie ma requette pour récupérer toutes la tables patients que je stock dans une var

        $sth = $pdo->query($sql);

        $listappointment=$sth->fetchAll();
        //je récupère l'intégralité de ma table ( données )
        return $listappointment;

    }

    public function update()
    {
        try{
            $sql = "UPDATE  `appointements` SET `dateHour`=:dateHour WHERE `idPatients`=:idPatients;";

            $sth = $this->_pdo->prepare($sql);

            $sth->bindvalue(":dateHour", $this->_dateHour, PDO::PARAM_STR);
            $sth->bindvalue(":idPatients", $this->_idPatients, PDO::PARAM_STR);

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
    
}