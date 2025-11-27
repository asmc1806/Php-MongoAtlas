<?php
require __DIR__ . '/vendor/autoload.php'; 

use MongoDB\Client;

$database = 'nivelacion_mongo';

// URI normal de MongoDB Atlas
$uri = "mongodb+srv://acmoreno_db_user:6G6ELgbF0CRzpKYK@cluster0.g56r7cd.mongodb.net/?retryWrites=true&w=majority";

try {
    // Conexión con parámetros TLS especiales para Railway / Render
    $client = new Client(
        $uri,
        [
            'ssl' => true,
            'tls' => true,
            'tlsAllowInvalidHostnames' => true,
            'tlsInsecure' => true,
            'serverSelectionTimeoutMS' => 5000,
        ]
    );

    $db = $client->selectDatabase($database);

} catch (Exception $e) {
    die('Error conectando a MongoDB Atlas: ' . $e->getMessage());
}
