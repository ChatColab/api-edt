<?php
require 'includes/flight-master/flight/Flight.php';
require 'includes/temp.php';
//require 'includes/routes.php';
require 'includes/pdo.php';
//require 'authorization.php';

Flight::set('pdo', $pdo);

Flight::start();
?>
