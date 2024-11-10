<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/landing.css">
</head>
<body>

      <!-- NAVBAR -->
      <div class="navbar">
          <div class="logo"></div>
          <div class="nav-links">
              <a href="#home">HOME</a>
              <a href="#exercise">Exercise</a>
              <a href="#workout">Workout</a>
              <a href="#progress">Progress</a>
              <a href="#about">About Us</a>
          </div>
          <div class="signup-button">
              <a href="/signup.php">Join Now</a> <!-- Link to signup page -->
          </div>
      </div>

    <!-- HEADER CONTENT -->
    <div class="header-content">
        <div class="overlay"></div>
        <div class="headline">
            <h1>
                <span class="transform-body">Transform Your Body, </span>
                <span class="transform-life">Transform Your Life</span>
            </h1>
            <p>Achieve your fitness goals with our easy-to-use workout planner. Customized routines, progress tracking, and expert guidance all in one place.</p>
            <div class="buttons">
                <!-- Updated "Get Started" Button to Redirect to login.php -->
                <a href="/login.php" class="get-started-btn">Get Started</a>
                <a href="#learn-more" class="learn-more-btn">Learn More</a>
            </div>
        </div>
    </div>

    <!-- We Offer Section -->
    <section class="we-offer">
        <div class="workout-container">
            <!-- Workout 1 -->
            <div class="workout-box">
                <div class="icon custom-icon-1"></div>
                <div class="heading">Custom Workouts</div>
                <div class="subheading">Personalized training programs tailored to your goals and fitness levels.</div>
            </div>

            <!-- Workout 2 -->
            <div class="workout-box">
                <div class="icon custom-icon-2"></div>
                <div class="heading">Custom Workouts</div>
                <div class="subheading">Personalized training programs tailored to your goals and fitness levels.</div>
            </div>

            <!-- Workout 3 -->
            <div class="workout-box">
                <div class="icon custom-icon-3"></div>
                <div class="heading">Progress Tracking</div>
                <div class="subheading">Monitor your improvements and stay motivated with detailed analytics.</div>
            </div>

            <!-- Workout 4 -->
            <div class="workout-box">
                <div class="icon custom-icon-4"></div>
                <div class="heading">Workouts</div>
                <div class="subheading">Collection of workouts with proper form guidance.</div>
            </div>
        </div>
    </section>

    <!-- LOCATE GYM SECTION -->
    <section class="locate-gym">
        <div class="locate-gym-container">
            <div class="locate-gym-container2">
                <div class="find-gym-text">
                    <h2>Find Gym Near Me</h2>
                    <form action="search_gym.php" method="POST">
                        <input type="text" name="city_zipcode" placeholder="Enter City/Zipcode">
                        <button type="submit">Search</button>
                    </form>
                </div>
                <div class="result">
                    <h2>Map or List View</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT US SECTION -->
    <div class="about-us">
        <!-- About Text -->
        <div class="about-text">
            <h2>About Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>

        <!-- Quick Links -->
        <div class="quick-links">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="#home"> > Home</a></li>
                <li><a href="#exercise"> > Exercise</a></li>
                <li><a href="#workout"> > Workout</a></li>
                <li><a href="#progress"> > Progress</a></li>
                <li><a href="#about"> > About Us</a></li>
            </ul>
        </div>

       <!-- Stay Connected -->
<div class="stay-connected">
    <h2>Stay Connected</h2>
    <div class="input-container">
        <input type="email" placeholder="Enter your email">
        <div class="signup-button">
            <a href="/signup.php" class="signup-link">Sign Up</a>
        </div>
    </div> <!-- Closing input-container div -->

    <!-- Social Icons Container (placed under the input and sign-up button) -->
    <div class="social-icons">
        <a href="#"><img src="/assets/img/facebook-footer.png" alt="Facebook"></a>
        <a href="#"><img src="/assets/img/twitter-footer.png" alt="Twitter"></a>
        <a href="#"><img src="/assets/img/GitHub-link.png" alt="GitHub"></a>
    </div>
</div>


</body>
</html>
