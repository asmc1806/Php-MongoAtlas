<?php
require __DIR__ . '/vendor/autoload.php'; 

use MongoDB\Client;

$database = 'nivelacion_mongo';

$uri = "mongodb+srv://acmoreno_db_user:6G6ELgbF0CRzpKYK@cluster0.g56r7cd.mongodb.net/?retryWrites=true&w=majority";

try {
    $client = new Client(
        $uri,
        [
            "tls" => true,
            "tlsAllowInvalidHostnames" => true,  // Necesario para Railway/Render
            "serverSelectionTimeoutMS" => 5000
        ]
    );

    $db = $client->selectDatabase($database);

} catch (Exception $e) {
    die('Error conectando a MongoDB Atlas: ' . $e->getMessage());
}


