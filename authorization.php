<?php
$headers = apache_request_headers();
$bearer_token = substr($headers['Authorization'], 7);
// Variables globales
$token_string = "";
$role = null;
$userId = null;

// Define a callback function to extract the token from the headers
Flight::before('GET', function (&$params, &$output) {
    $bearer_token = Flight::request()->headers->get('Authorization');

    // Extract the token from the "Bearer" prefix
    $token = str_replace('Bearer ', '', $bearer_token);

    // Store the token in a global variable
    $GLOBALS['token_string'] = $token;

    //assignation rôle par requête bdd
});

$userId = getUserId($token_string);

Flight::route('GET /token', function () {
    // Do something with the token
    // ...

    Flight::json(array('token' => $GLOBALS['token_string']));
});
?>
