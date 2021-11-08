<?php
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../config/conf.php');
require_once(dirname(__FILE__).'/../utils/connect.php');

$id=intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$idPatients = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
$hour = trim(filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
$dateTime = $date.' '.$hour;

$profile=Patient::view($id);
$profileCustom=Appointment::allView($idPatients);

if ($profile instanceof PDOException) {
    header('location: /404Ctrl.php');
}else {
    $title = "Profil : $profile->lastname  $profile->firstname";

    include(dirname(__FILE__).'/../views/templates/header.php');
    include(dirname(__FILE__).'/../views/profil-patient.php');
    include(dirname(__FILE__).'/../views/templates/footer.php');
}

