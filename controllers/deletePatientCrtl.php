<?php
require_once(dirname(__FILE__).'/../models/Patient.php');


$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$delete = Patient::deletePatient($id);


$title = 'remove patients - Hôpital';

header('location: /controllers/list-patientsCtrl.php');
