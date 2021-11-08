<?php
require_once(dirname(__FILE__).'/../config/conf.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../utils/connect.php');


$id = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_NO_ENCODE_QUOTES));

$delete = Appointment::delete($id);

$title = 'remove rendez-vous - Hôpital';

include(dirname(__FILE__).'/../views/templates/header.php');
header('location: /controllers/list-appointmentCtrl.php');
include(dirname(__FILE__).'/../views/templates/footer.php');