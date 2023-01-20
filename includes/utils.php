<?php

function getDateConverted($date){
    $date = explode('-', $date);
    $result = [ (int)$date[0], (int)$date[1], (int)$date[2] ];
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