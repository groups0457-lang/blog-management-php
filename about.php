<?php
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
      <link rel="icon" type="image/png" href="profile.png?v=1">

</head>

<body>
    <!-- Navigation -->
    <?php include 'inc/NavBar.php'; ?>

    <!-- About Content -->
    <div class="container mt-5">
        <section class="mb-5">
            <h1 class="display-4 mb-4 fs-3 text-center">About Us</h1>
            <p>Welcome to <strong>MyBlog</strong>! We are passionate about sharing knowledge, stories, and insights on a variety of topics. Our mission is to create a vibrant community where readers can find valuable information and connect with like-minded individuals.</p>
            <p>At <strong>MyBlog</strong>, we believe in the power of words to inspire, educate, and entertain. Our team of dedicated writers works tirelessly to bring you high-quality content that is both engaging and informative.</p>
            <p>Whether you're here to learn something new, stay updated on the latest trends, or simply enjoy a good read, we hope you find our blog a valuable resource. Thank you for being a part of our journey!</p>
        </section>

        <section class="mb-5">
            <h2 class="fs-4 mb-3">Our Mission</h2>
            <p>To empower individuals through accessible and high-quality content, encouraging learning, personal growth, and meaningful discussion.</p>
        </section>

        <section class="mb-5">
            <h2 class="fs-4 mb-3">Our Vision</h2>
            <p>To become a trusted platform where millions of readers can find honest, helpful, and inspiring content that makes a difference in their lives.</p>
        </section>

        <section class="mb-5">
            <h2 class="fs-4 mb-3">Why Choose Us?</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">✅ Fresh, original content updated regularly</li>
                <li class="list-group-item">✅ Diverse topics: tech, lifestyle, health, education, and more</li>
                <li class="list-group-item">✅ Community-driven values and reader interaction</li>
                <li class="list-group-item">✅ Trusted by thousands of readers worldwide</li>
            </ul>
        </section>

    
        <section class="text-center mt-5">
            <h2 class="fs-4 mb-3">Join Our Community</h2>
            <p>Love reading? Have something to share? <a href="contact.php" class="mt-2">Contact Us</a> and become a part of our growing family!</p>
        </section>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
