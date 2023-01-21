<?php

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

function jourClair($edt){
    for ($i = 0; $i < count($edt); $i++) {
        $edt[$i]["jour_cours"] = getJour($edt[$i]["jour_cours"]);
    }
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