<?php
require 'utils.php';

if (Flight::get('permUser') == 0) {

//    Flight::route('GET /test', function () {
//        Flight::json(getDateConverted("2020-12-05"));
//    });

    //get edt by group without teacher name
    Flight::route('GET /edt_grp-@numGroupe/@date', function ($numGroupe, $date) {
        $convert = getDateConverted($date);
        echo Flight::json(getEDTByGroupNoName($numGroupe, $convert[1], $convert[2]));
    });

    Flight::route('GET /edt_grp-@numGroupe', function ($numGroupe) {
        echo Flight::json(getEDTByGroupNoName($numGroupe, getCurrentWeek(), null));
    });

    Flight::route('GET /edt_grp-@numGroupe-@week', function ($numGroupe, $week) {
        echo Flight::json(getEDTByGroupNoName($numGroupe, $week, null));
    });

    Flight::route('GET /edt_grp-@numGroupe-@week-@day', function ($numGroupe, $week, $day) {
        echo Flight::json(getEDTByGroupNoName($numGroupe, $week, $day));
    });

}

if (Flight::get('permUser') >= 1){

    //get edt by group
    Flight::route('GET /edt_grp-@numGroupe/@date', function ($numGroupe, $date) {
        $convert = getDateConverted($date);
        echo Flight::json(getEDTByGroup($numGroupe, $convert[0], $convert[1], $convert[2]));
    });

    Flight::route('GET /edt_grp-@numGroupe-@week/@year', function ($numGroupe, $week, $day, $year) {
        echo Flight::json(getEDTByGroup($numGroupe, $year, $week, $day));
    });

    Flight::route('GET /edt_grp-@numGroupe-@week-@day/@year', function ($numGroupe, $week, $day, $year) {
        echo Flight::json(getEDTByGroup($numGroupe, $year, $week, $day));
    });

    Flight::route('GET /edt_grp-@numGroupe-@week-@day', function ($numGroupe, $week, $day) {
        echo Flight::json(getEDTByGroup($numGroupe, getCurrentYear(), $week, $day));
    });

    Flight::route('GET /edt_grp-@numGroupe-@week', function ($numGroupe, $week) {
        echo Flight::json(getEDTByGroup($numGroupe, getCurrentYear(), $week, null));
    });

    Flight::route('GET /edt_grp-@numGroupe', function ($numGroupe) {
        echo Flight::json(getEDTByGroup($numGroupe, getCurrentYear(), getCurrentWeek(), null));
    });



    //get edt of asking user
    Flight::route('GET /edt/@date', function ($date) {
        $convert = getDateConverted($date);
        echo Flight::json(getEDTByUser(Flight::get('idUser'), $convert[0], $convert[1], $convert[2]));
    });

    Flight::route('GET /edt-@week-@day/@year', function ($week, $day, $year) {
        $json = getEDTByUser(Flight::get('idUser'), $year, $week, $day);
        Flight::json($json);
    });

    Flight::route('GET /edt-@week/@year', function ($week, $year) {
        $json = getEDTByUser(Flight::get('idUser'), $year, $week, null);
        Flight::json($json);
    });

    Flight::route('GET /edt-@week-@day', function ($week, $day) {
        $json = getEDTByUser(Flight::get('idUser'), getCurrentYear(), $week, $day);
        Flight::json($json);
    });

    Flight::route('GET /edt-@week', function ($week) {
        $json = getEDTByUser(Flight::get('idUser'), getCurrentYear(), $week, null);
        Flight::json($json);
    });

    Flight::route('GET /edt', function () {
        $json = getEDTByUser(Flight::get('idUser'), getCurrentYear(), getCurrentWeek(), null);
        Flight::json($json);
    });



    if (Flight::get('permUser') == 2){

    }

}


if (Flight::get('permUser') == 3){

    //get edt by user
    Flight::route('GET /edt_user@numUser/@date', function ($numUser, $date) {
        $convert = getDateConverted($date);
        echo Flight::json(getEDTByUser($numUser, $convert[0], $convert[1], $convert[2]));
    });

    Flight::route('GET /edt_user@numUser-@week-@day/@year', function ($numUser, $week, $day, $year) {
        $json = getEDTByUser($numUser, $year, $week, $day);
        Flight::json($json);
    });

    Flight::route('GET /edt_user@numUser-@week/@year', function ($numUser, $week, $year) {
        $json = getEDTByUser($numUser, $year, $week, null);
        Flight::json($json);
    });

    Flight::route('GET /edt_user@numUser-@week-@day', function ($numUser, $week, $day) {
        $json = getEDTByUser($numUser, getCurrentYear(), $week, $day);
        Flight::json($json);
    });

    Flight::route('GET /edt_user@numUser-@week', function ($numUser, $week) {
        $json = getEDTByUser($numUser, getCurrentYear(), $week, null);
        Flight::json($json);
    });

    Flight::route('GET /edt_user@numUser', function ($numUser) {
        $json = getEDTByUser($numUser, getCurrentYear(), getCurrentWeek(), null);
        Flight::json($json);
    });


    Flight::route('GET /users', function(){
        echo Flight::json(getUsers());
    });
    Flight::route('GET /users/id=@userId', function($userId){
        echo Flight::json(getUserById($userId));
    });
    Flight::route('GET /users/nom=@userNom', function($userNom){
        echo Flight::json(getUserByName($userNom));
    });
    Flight::route('GET /users/prenom=@userPrenom', function($userPrenom){
        echo Flight::json(getUserByFirstName($userPrenom));
    });

    //modifications
//    Flight::route('POST /modif')
    
}
