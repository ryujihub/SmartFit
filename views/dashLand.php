<?php
// Example exercise data (this could be fetched from a database)
$exercises = [
    [
        'title' => 'Dumbbell Shoulder Press',
        'description' => 'A compound exercise that targets the shoulder muscles. The exercise involves pressing dumbbells overhead from shoulder height.',
        'image' => '/assets/img/dumbbell-shoulder-press.png', // Update with a valid image path or use a placeholder
    ],
    [
        'title' => 'Flat Barbell Bench Press',
        'description' => 'The barbell bench press is a classic exercise popular among all weight lifting circles. From bodybuilders to powerlifters, the bench press is a staple chest exercise in nearly every workout program.',
        'image' => '/assets/img/flat-barbell-bench-press.png',
    ],
    // Add more exercises as needed
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Libraries | SmartFit</title>
    <link rel="stylesheet" href="/assets/css/dashland.css">
</head>
<body>

    <!-- Navigation -->
    <div class="navbar">
        <div class="logo-container">
            <span class="logo-text">
                <span class="smart">Smart</span><span class="fit">Fit</span>
            </span>
            <div class="logo">
                <img src="/assets/img/muscleman.png" alt="SmartFit Logo" />
            </div>
        </div>
        <div class="nav-links">
            <a href="#home">HOME</a>
            <a href="#exercise">Exercise</a>
            <a href="#workout">Workout</a>
            <a href="#progress">Progress</a>
            <a href="#about">About Us</a>
            <a href="#profile">My Profile</a>
        </div>
    </div>

    <main>
        <div class="main-header">
            <h1>Exercise Libraries</h1>
            <p>Browse and discover exercises for your workout routine</p>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Search exercises...">
            <select>
                <option>All Exercise</option>
                <option>Push Workout</option>
                <option>Pull Workout</option>
                <option>Leg Workout</option>
            </select>
        </div>
    </main>

    <!-- Exercise Cards Section -->
    <section class="exercise-cards-section">
        <div class="card-container">
            <?php foreach ($exercises as $exercise): ?>
                <div class="exercise-card">
                    <h3><?php echo $exercise['title']; ?></h3>
                    <img src="<?php echo $exercise['image'] ? $exercise['image'] : '/assets/img/default.jpg'; ?>" alt="Exercise Image">
                    <p><?php echo $exercise['description']; ?></p>

                    <div class="card-buttons">
                        <a href="view-details.php?id=<?php echo urlencode($exercise['title']); ?>" class="view-details">View Details</a>
                        <button class="add-exercise" data-title="<?php echo $exercise['title']; ?>" data-description="<?php echo $exercise['description']; ?>" data-image="<?php echo $exercise['image']; ?>">Add Exercise</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="about-us">
                <div class="about-text">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>

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

            <div class="stay-connected">
                <h2>Stay Connected</h2>
                <div class="input-container">
                    <input type="email" placeholder="Enter your email">
                    <div class="signup-button">
                        <a href="/signup.php" class="signup-link">Sign Up</a>
                    </div>
                </div>

                <div class="social-icons">
                    <a href="#"><img src="/assets/img/facebook-footer.png" alt="Facebook"></a>
                    <a href="#"><img src="/assets/img/twitter-footer.png" alt="Twitter"></a>
                    <a href="#"><img src="/assets/img/GitHub-link.png" alt="GitHub"></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for AJAX -->
    <script>
        // Event listener for "Add Exercise" button
        document.querySelectorAll('.add-exercise').forEach(button => {
            button.addEventListener('click', function() {
                // Get exercise data
                const title = this.getAttribute('data-title');
                const description = this.getAttribute('data-description');
                const image = this.getAttribute('data-image');

                // Create an object to send to the server
                const exerciseData = {
                    title: title,
                    description: description,
                    image: image
                };

                // Send the data via AJAX to PHP
                fetch('add_exercise.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(exerciseData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Exercise added successfully!');
                        location.reload(); // Refresh the page to show the new exercise
                    } else {
                        alert('Error adding exercise.');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>

</body>
</html>
