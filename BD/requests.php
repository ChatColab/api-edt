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

function getGroupesByUserId($id){
    $sql = "select id_groupe from utilisateurs where id_utilisateur = :id";
    return executeRequest($sql, array('id' => $id));
}

function getIdRoleByUserId($id){
    $sql = "select id_role from utilisateurs where id_utilisateur = :id";
    return executeRequest($sql, array('id' => $id));
}

function getUserIdByToken($token){
    $sql = "select id_utilisateur from utilisateurs where token_utilisateur = :token";
    return executeRequest($sql, array('token' => $token));
}

function getEDTByGroup($grpId, $year, $week = null, $day = null)
{
    //edt pour un jour
    if ($day != null){
        $sql = "SELECT c.id_cours, c.libelle_cours, c.jour_cours, c.heure_debut_cours, c.heure_fin_cours FROM cours c JOIN appartient a ON a.id_cours = c.id_cours JOIN edt e ON e.id_edt = a.id_edt JOIN recoit r ON r.id_cours = c.id_cours JOIN groupe g ON g.id_groupe = r.id_groupe JOIN calendrier ca ON e.id_edt = ca.id_calendrier WHERE g.id_groupe = :grpId and ca.semaine = :week and ca.annee = :year and c.jour_cours = :day;";
        return executeRequestJson($sql, array('grpId' => $grpId, 'year' => $year, 'week' => $week, 'day' => $day));
    }

    //edt pour une semaine
    else if ($week != null){
        $sql = "SELECT c.id_cours, c.libelle_cours, c.jour_cours, c.heure_debut_cours, c.heure_fin_cours FROM cours c JOIN appartient a ON a.id_cours = c.id_cours JOIN edt e ON e.id_edt = a.id_edt JOIN recoit r ON r.id_cours = c.id_cours JOIN groupe g ON g.id_groupe = r.id_groupe JOIN calendrier ca ON e.id_edt = ca.id_calendrier WHERE g.id_groupe = :grpId and ca.semaine = :week and ca.annee = :year;";
        return executeRequestJson($sql, array('grpId' => $grpId, 'year' => $year, 'week' => $week));
    }

    //edt pour un an
    else {
        $sql = "SELECT c.id_cours, c.libelle_cours, c.jour_cours, c.heure_debut_cours, c.heure_fin_cours FROM cours c JOIN appartient a ON a.id_cours = c.id_cours JOIN edt e ON e.id_edt = a.id_edt JOIN recoit r ON r.id_cours = c.id_cours JOIN groupe g ON g.id_groupe = r.id_groupe JOIN calendrier ca ON e.id_edt = ca.id_calendrier WHERE g.id_groupe = :grpId and ca.annee = :year;";
        return executeRequestJson($sql, array('grpId' => $grpId, 'year' => $year));
    }
}

function getEDTProf($profId, $year, $week = null, $day = null){
    //edt pour un jour
    if ($day != null){
        $sql = "SELECT c.id_cours, c.libelle_cours, c.jour_cours, c.heure_debut_cours, c.heure_fin_cours FROM cours c JOIN appartient a ON a.id_cours = c.id_cours JOIN edt e ON e.id_edt = a.id_edt JOIN recoit r ON r.id_cours = c.id_cours JOIN groupe g ON g.id_groupe = r.id_groupe JOIN enseigne ens ON ens.id_matiere = c.id_matiere JOIN calendrier ca ON e.id_edt = ca.id_calendrier WHERE g.id_groupe = 1 and ca.semaine = :week and ca.annee = :year and c.jour_cours = :day and ens.id_utilisateur = :profId;";
        return executeRequestJson($sql, array('profId' => $profId, 'year' => $year, 'week' => $week, 'day' => $day));
    }

    //edt pour une semaine
    else if ($week != null){
        $sql = "SELECT c.id_cours, c.libelle_cours, c.jour_cours, c.heure_debut_cours, c.heure_fin_cours FROM cours c JOIN appartient a ON a.id_cours = c.id_cours JOIN edt e ON e.id_edt = a.id_edt JOIN recoit r ON r.id_cours = c.id_cours JOIN groupe g ON g.id_groupe = r.id_groupe JOIN enseigne ens ON ens.id_matiere = c.id_matiere JOIN calendrier ca ON e.id_edt = ca.id_calendrier WHERE g.id_groupe = 1 and ca.semaine = :week and ca.annee = :year and ens.id_utilisateur = :profId;";
        return executeRequestJson($sql, array('profId' => $profId, 'year' => $year, 'week' => $week));
    }

    //edt pour un an
    else {
        $sql = "SELECT c.id_cours, c.libelle_cours, c.jour_cours, c.heure_debut_cours, c.heure_fin_cours FROM cours c JOIN appartient a ON a.id_cours = c.id_cours JOIN edt e ON e.id_edt = a.id_edt JOIN recoit r ON r.id_cours = c.id_cours JOIN groupe g ON g.id_groupe = r.id_groupe JOIN enseigne ens ON ens.id_matiere = c.id_matiere JOIN calendrier ca ON e.id_edt = ca.id_calendrier WHERE g.id_groupe = 1 and ca.annee = :year and ens.id_utilisateur = :profId;";
        return executeRequestJson($sql, array('profId' => $profId, 'year' => $year));
    }
}

function getEDTByUser($userId, $year, $week = null, $day = null)
{
    $groupUser = getGroupesByUserId($userId);

    if ($groupUser != 1) {
        //edt pour un élève
        return getEDTByGroup($groupUser, $year, $week, $day);
    }
    else{
        //edt pour un prof
        return getEDTProf($userId, $year, $week, $day);
    }
}
