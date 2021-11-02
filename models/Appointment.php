<?php

require_once(dirname(__FILE__).'/../utils/connect.php');

class Appointment{

    private $_date;
    private $_hour;

    public function __construct($date = NULL, $hour = NULL,$id =NULL)
    {
        $this->_id = intval($id);
        $this->_date = $date;
        $this->_hour = $hour;
        $this->_pdo = Database::connect();
    }

    public function create(){
        try {
            $sql = 'INSERT INTO `appointments`(`dateHour`) VALUES (:dateHour)';
            $sth = $this->_pdo->prepare($sql);
                    //on injecte les valeurs
            $sth->bindvalue(":date", $this->_date, PDO::PARAM_STR);
            $sth->bindvalue(":hour", $this->_hour, PDO::PARAM_INT);

            if(!$sth->execute()){
                die("une erreur est survenue");
            }
            
        } catch (\PDOException $ex) {
            $ex->getMessage();
        }
    }
    
}