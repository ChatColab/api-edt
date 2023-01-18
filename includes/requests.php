<?php

//fonction d'éxécution de la requête
function executeRequest($sql, $params = null) {
    if ($params == null) {
        $result = Flight::get('pdo')->query($sql);    // exécution directe
    } else {
        $result = Flight::get('pdo')->prepare($sql);  // requête préparée
        $result->execute($params);
    }
    // retourne un tableau d'enregistrements
    if ($result->columnCount() == 1) {
        $data = $result->fetchColumn();
    } else {
        $data = $result->fetchAll();
    }
    return $data;
}
function executeRequestJson($sql, $params = null) {
    if ($params == null) {
        $result = Flight::get('pdo')->query($sql);    // exécution directe
    } else {
        $result = Flight::get('pdo')->prepare($sql);  // requête préparée
        $result->execute($params);
    }
    return $result->fetchAll();
}

//déclaration des fonctions pour les requêtes sql
function getLibelleRoleByToken($token){
    $sql = "select libelle_role from roles r, utilisateurs u where u.id_role = r.id_role and u.token_utilisateur = :token";
    return executeRequest($sql, array('token' => $token));
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
