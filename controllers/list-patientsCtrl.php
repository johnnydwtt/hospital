<?php
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../config/conf.php');
require_once(dirname(__FILE__).'/../utils/connect.php');


$patient = new Patient();
$listpatients=$patient->read();

$title = 'Liste des patients - Hôpital';

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/list-patients.php');
include(dirname(__FILE__).'/../views/templates/footer.php');