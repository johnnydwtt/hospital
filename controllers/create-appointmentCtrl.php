<?php
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../utils/connect.php');
require_once(dirname(__FILE__).'/../utils/regex.php');

$patient = new Patient();
$profils=$patient->read();
$error= [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $hour = trim(filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

        // ----------------------------------------------------------
    if(!empty($date)){

        if (!preg_match('/'. DATE_REGEX .'/',$date)){
            $error['date'] = 'Saisir une date valide!';
        }
    } else { 
        $error['date'] = 'Ce champ est requis!';
    }
        // ----------------------------------------------------------
    if(!empty($firstname)){

        if (!preg_match('/'. STRING_REGEX .'/',$firstname)){
            $error['firstname'] = 'Saisir un prénom valide!';
        }
    } else { 
        $error['firstname'] = 'Ce champ est requis!';
    }
    
    // ----------------------------------------------------------
    if(!empty($lastname)){
        if (!preg_match('/'. STRING_REGEX .'/',$lastname)){
            $error['lastname'] = 'Saisir un nom valide!';
        }
    } else { 
        $error['lastname'] = 'Ce champ est requis!';
    }

    if (empty($error)) {
        
        $appointment = new Appointment($date,$hour);
        $created_at=$appointment->create();
    }

}

$title = 'Création de rendez-vous - Hôpital';

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/create-appointment.php');
include(dirname(__FILE__).'/../views/templates/footer.php');