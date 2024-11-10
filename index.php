<?php
session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    header("Location: landing.php"); // Redirect to landing page if already logged in
    exit();
}

// Redirect to login.php if user is not logged in
header(header: "Location: login.php");
exit();
?>
