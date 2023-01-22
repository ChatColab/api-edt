<?php

function getDateConvertedBack($input){
    $year = $input[0];
    $week = $input[1];
    $day = $input[2];
    $date = new DateTime();
    $date->setISODate($year, $week);
    $day_name = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
    $day_name = $day_name[$day];
    $date->modify("next $day_name");
    return $date->format("Y-m-d");
}

function getDateConverted($input){
    $date = new DateTime($input);
    $year = $date->format("Y");
    $week = $date->format("W");
    $day = $date->format("D");
    switch ($day){
        case "Mon":
            $day = 0;
            break;
        case "Tue":
            $day = 1;
            break;
        case "Wed":
            $day = 2;
            break;
        case "Thu":
            $day = 3;
            break;
        case "Fri":
            $day = 4;
            break;
        case "Sat":
            $day = 5;
            break;
        case "Sun":
            $day = 6;
            break;
    }
    $result = [ (int)$year, (int)$week, (int)$day ];
    return $result;
}

function getJour($numJour){
    $jours = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];
    return $jours[$numJour];
}

function getCurrentWeek() {
    $date = new DateTime();
    $week = $date->format("W");
    $result = $week - 1;
    return (int)$week;
}

function getCurrentYear() {
    $date = new DateTime();
    $year = $date->format("Y");
    return (int)$year;
}