<?php

session_start();

require_once '../vendor/autoload.php';
require_once '../../../config/bootstrap.php';
require_once 'routes.php';

Flight::start();

?>