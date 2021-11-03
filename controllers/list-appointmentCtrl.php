<?php
require_once(dirname(__FILE__).'/../config/conf.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../utils/connect.php');



$listappointment = Appointment::read();

$title = 'Liste des rendez-vous - Hôpital';

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/list-appointment.php');
include(dirname(__FILE__).'/../views/templates/footer.php');