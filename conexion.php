<?php
require __DIR__ . '/vendor/autoload.php'; 

use MongoDB\Client;

$database = 'nivelacion_mongo';

$uri = "mongodb+srv://acmoreno_db_user:6G6ELgbF0CRzpKYK@cluster0.g56r7cd.mongodb.net/?appName=Cluster0";

try {
    $client = new Client($uri);
    $db = $client->selectDatabase($database);
} catch (Exception $e) {
    die('Error conectando a MongoDB Atlas: ' . $e->getMessage());
}
