<?php
require 'requests.php';

 // récupérer le token d'authentification de la requête
function getBearerToken(){
    $headers = null;
    if (function_exists('apache_request_headers')) {
        $requestHeaders = apache_request_headers();
        if (isset($requestHeaders['Authorization'])) {
            $headers = trim($requestHeaders['Authorization']);
        }
    }
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $token)) {
            return $token[1];
        }
    }
}

// Avant chaque requête get, récupérer le token
function setPermUser(){

    $perm = 0;
    $token = (string)getBearerToken();

    //assignation des perms
    if ($token != null){
        $role = getLibelleRoleByToken($token);
        switch ($role) {
            case null :
                $perm = 0;
                break;
            case "Etudiant" :
                $perm = 1;
                break;
            case "Professeur" :
                $perm = 2;
                break;
            case "Administrateur" :
                $perm = 3;
                break;
        }
        Flight::set('permUser', $perm);
    }
    else{
        Flight::set('permUser', 0);
    }

    if (Flight::get('permUser') != 0){
        Flight::set('idUser', getUserIdByToken($token));
    }

}

//Flight::route('GET /', function () {
//    if (Flight::get('permUser') == 1){
//        $codeRetour = 200;
//        $iddececonnard = getUserIdByToken("1234568");
//        Flight::json($iddececonnard, $codeRetour);
//    }
//    else{
//        $codeRetour = 403;
//        Flight::json("bonjour", $codeRetour);
//    }
//});