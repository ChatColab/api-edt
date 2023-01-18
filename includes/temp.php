<?php
require 'requests.php';

$perm = 3;

if ($perm == 3){
    Flight::route('GET /', function () {
        $json = array(
            "status" => "success",
            "data" => array(
                "id" => 1,
                "nom" => "Doe",
                "prenom" => "John",
                "role" => "etudiant",
                "email" => "bonjour@oui.com"
            )
        );
        echo 'Hello World!';
        Flight::json($json);
    });

    Flight::route('GET /bonjour', function () {
        $iddececonnard = getUserId("1234568");
        echo $iddececonnard;
    });

}
?>
