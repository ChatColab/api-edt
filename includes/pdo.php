<?php
//déclaration des constantes pour la connexion à la base de données
$db_name = "edt-sae";
$server_name = "localhost";
$server_port = "3306";
$user_name = "root";
$password = "root";

$pdo = null;

//connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$server_name;port=$server_port;dbname=$db_name;charset=UTF8", $user_name, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die( "Connection failed: " . $e->getMessage());
}

Flight::set('pdo', $pdo);
