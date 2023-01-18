<?php
require 'pdo.php';

//fonction d'éxécution de la requête
function executeRequest($sql, $params = null) {
    if ($params == null) {
        $result = Flight::get('pdo')->query($sql);    // exécution directe
    } else {
        $result = Flight::get('pdo')->prepare($sql);  // requête préparée
        $result->execute($params);
    }
    return $result->fetchAll();
}

function executeRequestJson($sql, $params = null) {
    if ($params == null) {
        $result = Flight::get('pdo')->query($sql);    // exécution directe
    } else {
        $result = Flight::get('pdo')->prepare($sql);  // requête préparée
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

function getUserIdByToken($token){
    $sql = "select id_utilisateur from utilisateurs where token_utilisateur = :token";
    return executeRequest($sql, array('token' => $token));
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
