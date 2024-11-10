<?php
session_start(); // Start the session

require 'vendor/autoload.php'; // Load MongoDB PHP library via Composer

$error = ''; // Variable to store any error messages

// Process the form submission when method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate form inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // MongoDB connection
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $db = $client->workout_planner; // Specify the database
        $collection = $db->users; // Specify the collection

        // Check if the email already exists in the database
        $existingUser = $collection->findOne(['email' => $email]);
        if ($existingUser) {
            $error = "Email is already registered.";
        } else {
            // Insert new user data into the database
            try {
                $result = $collection->insertOne([
                    'username' => $username,
                    'email' => $email,
                    'password' => $hashed_password
                ]);
                
                // Check if insertion was successful
                if ($result->getInsertedCount() > 0) {
                    // Redirect to the login page after successful signup
                    header("Location: login.php");
                    exit(); // Ensure no further code is executed
                } else {
                    $error = "Signup failed. Please try again.";
                }
            } catch (Exception $e) {
                $error = "Error: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="signup-popup">
        <form method="POST" action="signup.php" class="signup-form">
            <h2>Sign Up</h2>
            <?php if (!empty($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <div class="social-login">
                <button type="button" class="btn-facebook"><i class="fab fa-facebook-f"></i> FACEBOOK</button>
                <button type="button" class="btn-google"><i class="fab fa-google"></i> GOOGLE</button>
            </div>
            <div class="or-container">
                <div class="line"></div>
                <p class="or-text">Or Sign up with</p>
                <div class="line"></div>
            </div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="qwerty123" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="sample@gmail.com" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="************" required>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="************" required>
            <button type="submit" class="btn-signup">Sign Up</button>
            <p class="login-redirect">Already have an account? <a href="login.php">Sign in</a></p>
        </form>
    </div>
</body>
</html>
