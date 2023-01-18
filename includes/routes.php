<?php
require 'authorization.php';
require 'requests.php';

switch ($role) {
    case null :
        $perm = 0;
        break;
    case "etudiant" :
        $perm = 1;
        break;
    case "enseignant" :
        $perm = 2;
        break;
    case "admin" :
        $perm = 3;
        break;
}


if ($perm >= 0 && $perm != 3){

    if ($perm >= 1){

        // TODO : la semaine courrante si pas de paramètre
//        Flight::route('GET /edt', function () {
//            $json = getEDT($userId, /*semaine courrante*/, null);
//            Flight::json($json);
//        });

        Flight::route('GET /edt-@week', function ($week) {
            $json = getEDT($userId, $week, null);
            Flight::json($json);
        });

        Flight::route('GET /edt-@week-@day', function ($week, $day) {
            $json = getEDT($userId, $week, $day);
            Flight::json($json);
        });

        if ($perm == 2){

        }

    }

}

if ($perm == 3){
    //routes accessibles à un admin
    Flight::route('GET /utilisateurs', function () {
        $json = getUtilisateurs();
        Flight::json($json);
    });
}


?>
