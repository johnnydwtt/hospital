<?php
require_once(dirname(__FILE__).'/../models/Patient.php');

$patient = new Patient($lastname,$firstname,$birthdate,$phone,$mail);
$patient->read();

$title = 'Liste des patients - Hôpital';
include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/list-patients.php');
include(dirname(__FILE__).'/../views/templates/footer.php');