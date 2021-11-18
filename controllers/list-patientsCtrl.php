<?php
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../config/conf.php');
require_once(dirname(__FILE__).'/../utils/connect.php');

$search = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

$listpatients = Patient::read($search);

// $listpatients=$patient->read($search);  

$title = 'Liste des patients - Hôpital';

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/list-patients.php');
include(dirname(__FILE__).'/../views/templates/footer.php');