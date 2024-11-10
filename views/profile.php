<?php
// Include Composer's autoloader
require 'vendor/autoload.php';

// MongoDB connection
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->your_database->workouts; // Replace 'your_database' with your MongoDB database name

// Fetch all workouts added by the user (you might want to filter by user ID)
$workouts = $collection->find(); // Adjust this query based on your needs (e.g., filter by user_id)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="/assets/css/profile.css">
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="/assets/img/muscleman.png" alt="Logo">
        </div>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">Exercise</a>
            <a href="#">Workout</a>
            <a href="#">Progress</a>
            <a href="#">My Profile</a>
        </div>
    </div>

    <!-- Profile Header Section -->
    <div class="profile-header">
        <div class="profile-image">
            <img src="image.png" alt="User Image">
        </div>
        <div class="profile-info">
            <h2>User Name</h2>
            <p>username@gmail.com</p>
            <p>Track your fitness goals and achievements</p>
        </div>
    </div>

    <!-- Fitness Progress Section -->
    <div class="fitness-progress">
        <h3>Fitness Progress</h3>
        <p>Track your fitness goals and achievements</p>
        <div class="progress-bar">
            <div class="progress-fat-burn"></div>
            <div class="progress-calories-burned"></div>
            <div class="progress-muscle-gained"></div>
        </div>
    </div>

    <!-- Workout Section -->
    <div class="workouts">
        <h3>Added Workouts</h3>
        <p>Workouts you’ve added to your routine</p>

        <?php
        // Display the workouts fetched from MongoDB
        if ($workouts->isDead() || $workouts->count() == 0) {
            echo "<p>No workouts added yet.</p>";
        } else {
            foreach ($workouts as $workout) {
                // Display each workout's name and the date it was added
                $workoutName = htmlspecialchars($workout['name']);
                $addedOn = date("F j, Y", strtotime($workout['added_on'])); // Format date

                echo "
                <div class='workout-item'>
                    <h4>$workoutName</h4>
                    <p>Added on $addedOn</p>
                </div>";
            }
        }
        ?>

    </div>

    <!-- Edit Profile Section -->
    <div class="edit-profile">
        <button>Edit Profile</button>
    </div>

</body>
</html>
