<?php

//tokens
//admin : 1234568
//professur : 1234569
//etudiant : 1234591

require 'includes/flight-master/flight/Flight.php';

Flight::set('permUser', 0);

require 'includes/authorization.php';
require 'includes/pdo.php';

setPermUser();

require 'includes/routes.php';

Flight::start();
