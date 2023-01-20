<?php

function getDateConverted($date){
    $date = explode('-', $date);
    $result = [ $date[0], $date[1], $date[2] ];
    return $result;
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