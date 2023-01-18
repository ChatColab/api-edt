<?php

if (Flight::get('permUser') >= 0 && Flight::get('permUser') != 3){



    if (Flight::get('permUser') >= 1){

        Flight::route('GET /', function () {
            echo 'Hello World!';
        });

        // TODO : la semaine courrante si pas de paramètre
//        Flight::route('GET /edt', function () {
//            $json = getEDT(Flight::get('idUser'), /*semaine courrante*/, null);
//            Flight::json($json);
//        });

        Flight::route('GET /edt-@week', function ($week) {
            $json = getEDT(Flight::get('idUser'), $week, null);
            Flight::json($json);
        });

        Flight::route('GET /edt-@week-@day', function ($week, $day) {
            $json = getEDT(Flight::get('idUser'), $week, $day);
            Flight::json($json);
        });

        if (Flight::get('permUser') == 2){

        }

    }

}

if (Flight::get('permUser') == 3){
    //routes accessibles à un admin
    Flight::route('GET /admin', function () {
        echo "admin";
    });
}
