<?php
require_once(dirname(__FILE__).'/../config/regex.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    $birthdate = trim(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_STRING));

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
            $error['lastname'] = 'Saisir un prénom valide!';
        }
    } else { 
        $error['lastname'] = 'Ce champ est requis!';
    }
    // ----------------------------------------------------------
    if(!empty($phone)){
        if (!preg_match('/'. PHONE_REGEX .'/',$phone)){
            $error['phone'] = 'Saisir un Numéro valide!';
        }
    } else { 
        $error['phone'] = 'Ce champ est requis!';
    }
    // ----------------------------------------------------------
    if(!empty($email)){

        $testmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        if(!$testmail){
            $error['mail'] = "Le mail n'est pas valide ";
            }
    } else{
        $error['mail'] = "Ce champ est requis!";
        }
    // ----------------------------------------------------------
    if(!empty($birthdate)){

        if (!preg_match('/'. STRING_REGEX .'/',$birthdate)){
            $error['birthdate'] = 'Saisir une date de naissance valide!';
        }
    } else { 
        $error['birthdate'] = 'Ce champ est requis!';
    }
}

//***************** */

$title = 'Mon ajout patient - Hospital';

include(dirname(__FILE__).'/../views/templates/header.php');

if (!empty($error) || $_SERVER['REQUEST_METHOD'] !='POST' ) {
    include(dirname(__FILE__).'/../views/add-patient.php');
}else{
    
}

include(dirname(__FILE__).'/../views/templates/footer.php');
