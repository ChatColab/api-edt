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
<<<<<<< HEAD
=======
?>
>>>>>>> 526ac447c3d8d53da6556f25fe74cdec08c5026a
