<?php
require 'requests.php';

$codeRetour = 403;
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
        setPermUser(Flight::request()->headers);
        if (Flight::get('permUser') == 1){
            $codeRetour = 200;
            $iddececonnard = getUserIdByToken("1234568");
            Flight::json($iddececonnard, $codeRetour);
        }
        else{
            $codeRetour = 403;
            Flight::json("bonjour", $codeRetour);
        }
    });

}
?>
