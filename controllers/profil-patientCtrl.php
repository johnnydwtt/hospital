<?php
require_once(dirname(__FILE__).'/../models/Patient.php');

$id=intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

$profile=Patient::view($id);

if ($profile instanceof PDOException) {
    header('location: /404Ctrl.php');
}else {
    $title = "Profil : $profile->lastname  $profile->firstname";

    include(dirname(__FILE__).'/../views/templates/header.php');
    include(dirname(__FILE__).'/../views/profil-patient.php');
    include(dirname(__FILE__).'/../views/templates/footer.php');
}

