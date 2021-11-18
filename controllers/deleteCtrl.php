<?php
require_once(dirname(__FILE__).'/../models/Appointment.php');


$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$delete = Appointment::delete($id);


$title = 'remove rendez-vous - Hôpital';

header('location: /controllers/list-appointmentCtrl.php');
