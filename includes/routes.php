<?php
require 'utils.php';

if (Flight::get('permUser') == 0) {

    //get edt by group without teacher name
    Flight::route('GET /edt_grp@numGroupe/@date', function ($numGroupe, $date) {
        $convert = getDateConverted($date);
        Flight::json(getEDTByGroupNoName($numGroupe, $convert[0], $convert[1], $convert[2]));
    });

    Flight::route('GET /edt_grp@numGroupe-@week/@year', function ($numGroupe, $week, $day, $year) {
        Flight::json(getEDTByGroupNoName($numGroupe, $year, $week, $day));
    });

    Flight::route('GET /edt_grp@numGroupe-@week-@day/@year', function ($numGroupe, $week, $day, $year) {
        Flight::json(getEDTByGroupNoName($numGroupe, $year, $week, $day));
    });

    Flight::route('GET /edt_grp@numGroupe-@week-@day', function ($numGroupe, $week, $day) {
        Flight::json(getEDTByGroupNoName($numGroupe, getCurrentYear(), $week, $day));
    });

    Flight::route('GET /edt_grp@numGroupe-@week', function ($numGroupe, $week) {
        Flight::json(getEDTByGroupNoName($numGroupe, getCurrentYear(), $week, null));
    });

    Flight::route('GET /edt_grp@numGroupe', function ($numGroupe) {
        Flight::json(getEDTByGroupNoName($numGroupe, getCurrentYear(), getCurrentWeek(), null));
    });

}

if (Flight::get('permUser') >= 1){

    Flight::route('GET /info_user', function () {
        Flight::json(getInfoUser(Flight::get('idUser')));
    });

    //get edt by group
    Flight::route('GET /edt_grp@numGroupe/@date', function ($numGroupe, $date) {
        $convert = getDateConverted($date);
        Flight::json(getEDTByGroup($numGroupe, $convert[0], $convert[1], $convert[2]));
    });

    Flight::route('GET /edt_grp@numGroupe-@week/@year', function ($numGroupe, $week, $day, $year) {
        Flight::json(getEDTByGroup($numGroupe, $year, $week, $day));
    });

    Flight::route('GET /edt_grp@numGroupe-@week-@day/@year', function ($numGroupe, $week, $day, $year) {
        Flight::json(getEDTByGroup($numGroupe, $year, $week, $day));
    });

    Flight::route('GET /edt_grp@numGroupe-@week-@day', function ($numGroupe, $week, $day) {
        Flight::json(getEDTByGroup($numGroupe, getCurrentYear(), $week, $day));
    });

    Flight::route('GET /edt_grp@numGroupe-@week', function ($numGroupe, $week) {
        Flight::json(getEDTByGroup($numGroupe, getCurrentYear(), $week, null));
    });

    Flight::route('GET /edt_grp@numGroupe', function ($numGroupe) {
        Flight::json(getEDTByGroup($numGroupe, getCurrentYear(), getCurrentWeek(), null));
    });


    if (Flight::get('permUser') != 3) {

        //get edt of asking user
        Flight::route('GET /edt/@date', function ($date) {
            $convert = getDateConverted($date);
            Flight::json(getEDTByUser(Flight::get('idUser'), $convert[0], $convert[1], $convert[2]));
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

    }

}


if (Flight::get('permUser') == 3){

    //get edt by user
    Flight::route('GET /edt_user@numUser/@date', function ($numUser, $date) {
        $convert = getDateConverted($date);
        Flight::json(getEDTByUser($numUser, $convert[0], $convert[1], $convert[2]));
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


    Flight::route('POST /change_grp_user@numUser-@numGroupe', function ($numUser, $numGroupe) {
        $json = changeGroupUser($numUser, $numGroupe);
        Flight::json($json);
    });

    Flight::route('POST /change_role_user@numUser-@numRole', function ($numUser, $numRole) {
        $json = changeRoleUser($numUser, $numRole);
        Flight::json($json);
    });

    Flight::route('POST /change_heure_user@numUser-@nbHeure', function ($numUser, $nbHeure) {
        $json = changeHeureUser($numUser, $nbHeure);
        Flight::json($json);
    });





    Flight::route('GET /users', function(){
        Flight::json(getUsers());
    });
    Flight::route('GET /users/id=@userId', function($userId){
        Flight::json(getUserById($userId));
    });
    Flight::route('GET /users/nom=@userNom', function($userNom){
        Flight::json(getUserByName($userNom));
    });
    Flight::route('GET /users/prenom=@userPrenom', function($userPrenom){
        Flight::json(getUserByFirstName($userPrenom));
    });


    Flight::route('GET /indisponibilites', function(){
        Flight::json(getIndisponibilites(null));
    });

    Flight::route('GET /indisponibilites/@idProf', function($idProf){
        Flight::json(getIndisponibilites($idProf));
    });

    //modifications
//    Flight::route('POST /modif')
    
}
