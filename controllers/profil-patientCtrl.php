<?php
require_once(dirname(__FILE__).'/../models/Patient.php');

$patient = new Patient();

$id=intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

$profils=$patient->view($id);

$title = "Profil : $profils->lastname  $profils->firstname";

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/profil-patient.php');
include(dirname(__FILE__).'/../views/templates/footer.php');