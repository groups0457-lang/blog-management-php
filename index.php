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
    <link rel="stylesheet" href="css/style.css"> </head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Lato:wght@400;700&display=swap" rel="stylesheet">


    <!-- Favicon (Example with PNG) -->
  <link rel="icon" type="image/png" href="profile.png?v=1">

    <style>
        /* --- CSS to fix image height --- */
        .carousel-item img {
            height: 500px;
            object-fit: cover;
            margin-top: 10px;
        }
        .center{
            margin: 0 auto;
            width:80%;
        }
        #heroCarousel .carousel-control-prev,
        #heroCarousel .carousel-control-next {
            background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent black background */
            width: 3.5rem; /* Set a fixed width */
            height: 3.5rem; /* Set a fixed height */
            border-radius: 50%; /* Make it a circle */
            top: 50%; /* Center vertically */
            transform: translateY(-50%);
            transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transitions */
        }

      .carousel-caption {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 100%);
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem 5% 1.5rem;
            text-align: left;
            color: #fff; /* Set text color to white */
        }

        #heroCarousel .carousel-control-prev {
            left: 1.5rem;
        }
        #heroCarousel .carousel-control-next {
            right: 1.5rem;
        }

        /* Hover effect for the buttons */
        #heroCarousel .carousel-control-prev:hover,
        #heroCarousel .carousel-control-next:hover {
            background-color: rgba(0, 0, 0, 0.7); /* Darken background on hover */
            transform: translateY(-50%) scale(1.1); /* Slightly enlarge the button */
        }

        /* Make the default Bootstrap icons a bit larger and white */
        #heroCarousel .carousel-control-prev-icon,
        #heroCarousel .carousel-control-next-icon {
            width: 1.8rem;
            height: 1.8rem;
            /* The default icons are SVGs with a dark fill. This filter makes them white. */
            filter: brightness(0) invert(1);
        }


        .carousel-caption h5 {
            font-family: 'Merriweather', serif; /* Apply a professional serif font for titles */
            font-size: 2.25rem;
            font-weight: 700; /* Bold weight from Google Fonts */
            text-shadow: 1px 1px 3px rgba(0,0,0,0.4); /* Add subtle shadow for readability */
        }
        .carousel-caption p {
            font-family: 'Lato', sans-serif; /* Apply a clean sans-serif font for paragraphs */
            font-size: 1.1rem;
            line-height: 1.6;
        }
    </style>
<body>
      <?php include 'inc/NavBar.php'; ?>
 <div class="center">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <?php 
        include_once 'db_conn.php';

        try {
            // Get latest 3 posts for slider
            $sql = "SELECT post_id, post_title, post_text, cover_url 
                    FROM post 
                    ORDER BY post_id DESC LIMIT 6 OFFSET 3";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $posts = $stmt->fetchAll();
            
            if ($stmt->rowCount() > 0) {
        ?>
        <!-- Carousel indicators -->
        <div class="carousel-indicators">
            <?php foreach ($posts as $index => $post) { ?>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?= $index ?>" 
                        class="<?= $index === 0 ? 'active' : '' ?>" 
                        aria-current="<?= $index === 0 ? 'true' : 'false' ?>" 
                        aria-label="Slide <?= $index+1 ?>"></button>
            <?php } ?>
        </div>

        <!-- Carousel inner -->
        <div class="carousel-inner">
            <?php foreach ($posts as $index => $post) {
                $post_title = htmlspecialchars($post['post_title']);
                $post_id = (int)$post['post_id'];
                $cover_url = htmlspecialchars($post['cover_url']);
                $post_summary = substr(strip_tags($post['post_text']), 0, 120) . '...';
            ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img src="upload/blog/<?= $cover_url ?>" class="d-block w-100" alt="<?= $post_title ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?= $post_title ?></h5>
                    <p><?= htmlspecialchars($post_summary) ?></p>
                    <a href="blog-view.php?post_id=<?= $post_id ?>" class="btn btn-light">Click here to read more</a>
                </div>
            </div>
            <?php } ?>
        </div>

        <!-- Carousel controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

        <?php 
            } else {
                echo "<div class='alert alert-info text-center'>No posts available for the slider.</div>";
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Database error: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
</div>


        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
    
  <div class="container mt-5">
    <h2 class="text-center mb-4">Latest Articles</h2>
    <div class="row">
        <?php 
        include_once 'db_conn.php';
        
        try {
            // SQL query to select the latest 3 posts from the `post` table
            $sql = "SELECT post_id, post_title, post_text, cover_url FROM post ORDER BY post_id DESC LIMIT 6";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
              $posts = $stmt->fetchAll();
              foreach ($posts as $post) {
                // Sanitize the output to prevent XSS
                $post_title = htmlspecialchars($post['post_title']);
                $post_id = htmlspecialchars($post['post_id']);
                $cover_url = htmlspecialchars($post['cover_url']);
                
                // Create a sanitized summary of the post text
                $post_summary = substr(strip_tags($post['post_text']), 0, 150) . '...';
        ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="upload/blog/<?= $cover_url ?>" class="card-img-top" alt="<?= $post_title ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $post_title ?></h5>
                            <p class="card-text"><?= htmlspecialchars($post_summary) ?></p>
                           <a href="blog-view.php?post_id=<?= $post['post_id'] ?>" class="btn btn-primary">Read more</a>
                          </div>
                    </div>
                </div>
        <?php 
              }
            } else {
                echo "<div class='alert alert-info'>No posts yet.</div>";
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Database error: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
</div>
    
    <footer class="bg-dark text-white text-center p-4 mt-5">
        <div class="container">
            <p>&copy; <?= date('Y') ?> MyBlog. All Rights Reserved.</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>