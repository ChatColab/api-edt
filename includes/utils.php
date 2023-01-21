<?php

function getDateConverted($input){
    $date = new DateTime($input);
    $year = $date->format("Y");
    $week = $date->format("W");
    $day = $date->format("D");
    switch ($day){
        case "Mon":
            $day = 1;
            break;
        case "Tue":
            $day = 2;
            break;
        case "Wed":
            $day = 3;
            break;
        case "Thu":
            $day = 4;
            break;
        case "Fri":
            $day = 5;
            break;
        case "Sat":
            $day = 6;
            break;
        case "Sun":
            $day = 7;
            break;

    }
    $result = [ (int)$year, (int)$week, (int)$day ];
    return $result;
}

function getJour($numJour){
    $jour = "";
    switch ($numJour){
        case 0:
            $jour = "Lundi";
            break;
        case 1:
            $jour = "Mardi";
            break;
        case 2:
            $jour = "Mercredi";
            break;
        case 3:
            $jour = "Jeudi";
            break;
        case 4:
            $jour = "Vendredi";
            break;
        case 5:
            $jour = "Samedi";
            break;
        case 6:
            $jour = "Dimanche";
            break;
    }
    return $jour;
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