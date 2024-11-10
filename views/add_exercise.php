<?php
// Include MongoDB connection
require 'db.php'; // Ensure this file sets up your MongoDB connection

// Get the JSON data sent by AJAX
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    // Extract exercise data from the request
    $title = $data['title'];
    $description = $data['description'];
    $image = $data['image'];

    // Insert the new exercise into the MongoDB collection without UTCDateTime
    $result = $workoutsCollection->insertOne([
        'title' => $title,
        'description' => $description,
        'image' => $image
    ]);

    // Return success response
    echo json_encode(['success' => true]);
} else {
    // Return error response
    echo json_encode(['success' => false, 'message' => 'No data received']);
}
?>
