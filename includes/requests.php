<?php
require 'pdo.php';

//fonction d'éxécution de la requête
function executeRequest(){
    if ($params == null) {
        $result = $pdo->query($sql);    // exécution directe
    } else {
        $result = $pdo->prepare($sql);  // requête préparée
        $result->execute($params);
    }
    return $result;
}

function executeRequestJson($sql, $params = null) {
    if ($params == null) {
        $result = $pdo->query($sql);    // exécution directe
    } else {
        $result = $pdo->prepare($sql);  // requête préparée
        $result->execute($params);
    }
    //return as json
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

//déclaration des fonctions pour les requêtes sql
function getRole($token){
    $sql = "";
    return executeRequest($sql, array($token));
}

function getUserId($token){
    $sql = "";
    return executeRequest($sql, array($token));
}

function getEDT($user_id, $week = null, $day = null): string
{
    if ($day != null){
        $sql = "";
    }

    else if ($week != null){
        $sql = "";
    }

    else {
        $sql = "";
    }

    return executeRequestJson($sql, array($user_id, $week, $day));
}
