<?php
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../utils/connect.php');
require_once(dirname(__FILE__).'/../utils/regex.php');
require_once(dirname(__FILE__).'/../config/conf.php');

$idPatients = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

$error= [];

$id=intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$profile=Patient::view($id);

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $hour = trim(filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $dateTime = $date.' '.$hour;

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

    if (empty($error)) {
        
        $appointment = new Appointment($dateTime,$idPatients);
        $result = $appointment->update();
    }
}

$meet = Appointment::view($idPatients);





$title = "Modification du rendez-vous";

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/modif-appointment.php');
include(dirname(__FILE__).'/../views/templates/footer.php');