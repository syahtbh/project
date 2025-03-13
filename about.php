<?php 
    include('navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgb(255, 255, 255);
            text-align: center;
        }
        .container {
            width: 85%;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }
        h1 {
            color: #333;
        }
        .location {
            margin: 20px 0;
            padding: 130px;
        }
        iframe {
            width: 100%;
            height: 300px;
            border: none;
            border-radius: 8px;
        }
        .images img {
            width: 100%;
            max-width: 500px;
            border-radius: 8px;
            margin-top: 10px;
        }
        /* Carousel Styles */
        .carousel {
            position: relative;
            width: 100%;
            max-width: 500px; /* Limit the width of the carousel */
            margin: 20px auto; /* Center the carousel */
            overflow: hidden;
            border-radius: 8px; /* Add rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Add a subtle shadow */
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease; /* Smooth sliding animation */
        }

        .carousel-item {
            min-width: 100%;
            box-sizing: border-box;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            max-height: 400px; /* Rescale the height of the images */
            object-fit: cover; /* Ensure images cover the area without distortion */
            border-radius: 8px; /* Rounded corners for images */
        }

        .carousel-item video {
            width: 100%;
            height: 100%;
            max-height: 400px; /* Rescale the height of the images */
            object-fit: cover; /* Ensure images cover the area without distortion */
            border-radius: 8px; /* Rounded corners for images */
        }

        .carousel-control-prev, .carousel-control-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 20px;
            border-radius: 50%; /* Make buttons circular */
            transition: background-color 0.3s ease; /* Smooth hover effect */
        }

        .carousel-control-prev:hover, .carousel-control-next:hover {
            background-color: rgba(0, 0, 0, 0.8); /* Darken on hover */
        }

        .carousel-control-prev {
            left: 10px;
        }

        .carousel-control-next {
            right: 10px;
        }
        /* About Section Styles */
        .about {
            padding: 50px 20px;
            
        }

        .about-container {
            display: flex;
            align-items: center;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }
        /* End of About Section Styles */
        .about-text {
            flex: 1;
        }

        .about-image {
            flex: 1;
            text-align: right;
        }

        .about-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <br><br>  
    <div class="container">
        <br>
        <br>
        <!-- Image Carousel Section -->
            <section class="about">
            <div class="about-container">
                <div class="about-text">
                <h1>Asset Management System</h1>
                <p>The Asset Management System helps track and manage assets within the college efficiently. It ensures accountability, provides location tracking, and optimizes resource allocation.</p>
                </div>
            <section class="carousel">
            <div class="carousel-inner">
                <!-- Image Recipe Items -->
                <div class="carousel-item">
                    <img src="img/kptm-bp.jpg" alt="Recipe 2">
                </div>
                <div class="carousel-item">
                    <img src="img/batupahat.jpg" alt="Recipe 3">
                </div>
                <div class="carousel-item">
                    <img src="img/unnamed.jpg" alt="Recipe 4">
                </div>
            </div>
            
            <!-- Carousel Navigation Buttons -->
            <button class="carousel-control-prev" onclick="prevSlide()">&#10094;</button>
            <button class="carousel-control-next" onclick="nextSlide()">&#10095;</button>
        </div>
        </section>
</section>
        <div class="location">
            <h2>College Location</h2>
            <p>Kolej Poly-Tech MARA Batu Pahat, Johor, Malaysia</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.7152145369958!2d103.0136383!3d1.8562788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d056d4a27c45cb%3A0xd58cc13e0325c391!2sKolej%20Poly-Tech%20MARA%20Batu%20Pahat!5e0!3m2!1sen!2smy!4v1617187200000!5m2!1sen!2smy" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <br>
    <script src="script.js"></script>
</body>
</html>
