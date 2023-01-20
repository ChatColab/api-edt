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

//function getEDTTest(){
//    $sql = "SELECT c.id_cours, c.libelle_cours, c.jour_cours, c.heure_debut_cours, c.heure_fin_cours FROM cours c JOIN appartient a ON a.id_cours = c.id_cours JOIN edt e ON e.id_edt = a.id_edt JOIN recoit r ON r.id_cours = c.id_cours JOIN groupe g ON g.id_groupe = r.id_groupe JOIN calendrier ca ON e.id_edt = ca.id_calendrier WHERE g.id_groupe = 9 and ca.semaine = 1 and ca.annee = 2023;";
//    return executeRequestJson($sql);
//}

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
