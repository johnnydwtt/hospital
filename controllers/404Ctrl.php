<?php
require_once(dirname(__FILE__).'/../config/conf.php');

$title = 'Erreur 404 - Hospital';

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../404.php');
include(dirname(__FILE__).'/../views/templates/footer.php');