<?php
session_start(); // Start the session

require 'vendor/autoload.php'; // Load MongoDB PHP library via Composer

$error = ''; // Variable to store any error messages

// Process the form submission when method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // MongoDB connection
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->workout_planner; // Specify the database
    $collection = $db->users; // Specify the collection

    // Check if the email exists in the database
    $user = $collection->findOne(['email' => $email]);

    if ($user) {
        // Verify the password using password_verify()
        if (password_verify($password, $user['password'])) {
            // Password is correct, store user in session
            $_SESSION['user'] = $user['email'];
            header("Location: /views/dashLand.php"); // Redirect to dashland.php
            exit(); // Ensure no further code is executed
        } else {
            $error = "Incorrect password. Please try again.";
        }
    } else {
        $error = "No user found with that email address.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="logo"><img src="assets/img/muscleman.png" alt="Logo"></div>
        <div class="social-login">
            <button type="button" class="btn-facebook"><i class="fab fa-facebook-f"></i> FACEBOOK</button>
            <button type="button" class="btn-google"><i class="fab fa-google"></i> GOOGLE</button>
        </div>
        <div class="or-container">
            <div class="line"></div>
            <p class="or-text">Or Login with</p>
            <div class="line"></div>
        </div>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="sample@gmail.com" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="************" required>
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
            <button type="submit" class="btn-signin">Sign In</button>
        </form>
        <p class="extra">Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
</body>
</html>
