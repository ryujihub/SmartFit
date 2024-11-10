<?php
require 'vendor/autoload.php'; // Include MongoDB PHP library

$client = new MongoDB\Client("mongodb://localhost:27017"); // MongoDB connection string
$database = $client->workout; // Database name
$collection = $database->workouts; // Workouts collection
?>
