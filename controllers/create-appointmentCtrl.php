<?php
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../config/conf.php');
require_once(dirname(__FILE__).'/../utils/connect.php');
require_once(dirname(__FILE__).'/../utils/regex.php');

$patient = new Patient();
$profils = $patient->read();
$error= [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    
    

    $idPatients = trim(filter_input(INPUT_POST, 'idPatients', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_NO_ENCODE_QUOTES));
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $hour = trim(filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    $dateTime = $date.' '.$hour;
        // ----------------------------------------------------------
    if(!empty($idPatients)){

        if (!preg_match('/'. NUMBER_REGEX .'/',$idPatients)){
            $error['idPatients'] = 'Saisir une date valide!';
        }
    } else { 
        $error['idPatients'] = 'Ce champ est requis!';
    }
        //----------------------------------------------------------
    if(!empty($date)){

        if (!preg_match('/'. DATE_REGEX .'/',$date)){
            $error['date'] = 'Saisir une date valide!';
        }
    } else { 
        $error['date'] = 'Ce champ est requis!';
    }
        // ----------------------------------------------------------
    if(!empty($hour)){

        if (!preg_match('/'. STRING_NUMBER_REGEX .'/',$hour)){
            $error['hour'] = 'Saisir une heure valide!';
        }
    } else { 
        $error['hour'] = 'Ce champ est requis!';
    }

    if (!empty($error)) {
        
        $appointment = new Appointment($dateTime,$idPatients);
        $created_at=$appointment->create();
    }

}

$title = 'Création de rendez-vous - Hôpital';

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/create-appointment.php');
include(dirname(__FILE__).'/../views/templates/footer.php');