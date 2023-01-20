<?php

//tokens
//admin : 1234568
//professur : 1234569
//etudiant : 1234591

require 'includes/flight-master/flight/Flight.php';

Flight::set('permUser', 0);

require 'BD/requests.php';
require 'includes/authorization.php';
require 'BD/pdo.php';

setPermUser();

require 'includes/routes.php';

Flight::start();
