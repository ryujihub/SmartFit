<?php
require 'vendor/autoload.php'; // Ensure MongoDB library is included

// MongoDB connection setup
$client = new MongoDB\Client('mongodb://localhost:27017');
$workoutsCollection = $client->workout->workouts; // Adjust the database and collection names
?>
