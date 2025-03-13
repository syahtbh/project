<?php
    session_start();
    include('navstu_staff.php');
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Cook It Your Way</title>

        <!-- Linking external CSS file for styling -->
        <link rel="stylesheet" href="style.css">

        <!-- Font Awesome for social media icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <style>
            /* Global Styles - Applies to all elements */
                *{
                    margin: 0%; padding: 0%;
                    box-sizing: border-box;
                    font-family: 'Arial', sans-serif;
                    outline: none; border: none;
                    text-decoration: none;
                    text-transform: capitalize;
                    transition: .2s linear;
                }
                /* Recipe Section Styles */
                .recipe-section {
                    margin-bottom: 30px;
                    padding: 15px;
                    border: 1px solid #e9ecef;
                    border-radius: 8px;
                    background-color: #f9f9f9;
                }

                /* Horizontal Rule Styles */
                hr {
                    border: 1px solid #e9ecef;
                    margin: 20px 0;
                }

                /* Footer Styles */
                footer {
                    text-align: center;
                    padding: 20px;
                    background-color: #f9f9f9;
                    margin-top: 40px;
                }

                /* Carousel Styles */
                .carousel {
                    position: relative;
                    width: 100%;
                    max-width: 800px; /* Limit the width of the carousel */
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

                /* Featured Recipes Section Styles */
                .featured-recipes {
                    padding: 50px 20px;
                    text-align: center;
                    background-color: #f9f9f9;
                }

                .featured-recipes h2 {
                    font-size: 36px;
                    margin-bottom: 40px;
                }

                .recipe-grid {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr); /* 3 columns per row */
                    gap: 20px;
                    justify-content: center;
                    max-width: 1200px;
                    margin: 0 auto;
                }

                .recipe-card {
                    background: white;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    text-align: center;
                }


                .recipe-card img {
                    width: 100%;
                    height: 200px;
                    object-fit: cover;
                    border-radius: 8px;
                    margin-bottom: 15px;
                }

                .recipe-card h3 {
                    font-size: 24px;
                    margin-bottom: 10px;
                }

                .recipe-card p {
                    font-size: 16px;
                    margin-bottom: 20px;
                }

                .recipe-btn {
                    padding: 10px 20px;
                    background-color: #e50000;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    transition: background-color 0.3s ease;
                }
                /* recipe -btn hover */
                .recipe-btn:hover {
                    background-color: #e50000;
                }
        </style>
    </head>
    <body>
        <section class="featured-recipes">
            <h2>Featured Assets</h2>
            <div class="recipe-grid">
                
                <div class="recipe-card">
                    <img src="img/x50.jpg" alt="Chocolate Chip Cookies">
                    <h3>Proton X50 </h3>
                    <p>A sleek and powerful SUV designed for performance and comfort on the road.</p>
                    <a href="bookingasset.php" class="recipe-btn">Book Now</a>
                </div>

                <div class="recipe-card">
                    <img src="img/jeacoo.jpg" alt="Spaghetti Alla Carbonara">
                    <h3>Jaecoo J7 Turbo</h3>
                    <p>An elegant yet robust vehicle with cutting-edge technology and luxury features.</p>
                    <a href="bookingasset.php" class="recipe-btn">Book Now</a>
                </div>

                <div class="recipe-card">
                    <img src="img/axia.jpg" alt="Cake Chiffon Pandan">
                    <h3>Perodua Axia SE</h3>
                    <p>A compact and fuel-efficient hatchback, perfect for city driving and daily commutes.</p>
                    <a href="bookingasset.php" class="recipe-btn">Book Now</a>
                </div>

                <div class="recipe-card">
                    <img src="img/bus.jpg" alt="Chocolate Chip Cookies">
                    <h3>Luxury Tour Bus</h3>
                    <p>A spacious and modern tour bus designed for long-distance travel with ultimate comfort and style.</p>
                    <a href="bookingasset.php" class="recipe-btn">Book Now</a>
                </div>

                <div class="recipe-card">
                    <img src="img/hiace.jpg" alt="Spaghetti Alla Carbonara">
                    <h3>Toyota Hiace Van</h3>
                    <p>A reliable and practical van, perfect for transporting passengers or cargo with efficiency.</p>
                    <a href="bookingasset.php" class="recipe-btn">Book Now</a>
                </div>

                <div class="recipe-card">
                    <img src="img/canopy.jpg" alt="Cake Chiffon Pandan">
                    <h3>Outdoor Canopy</h3>
                    <p>A creative and stylish pop-up booth showcasing unique artwork and handcrafted items.</p>
                    <a href="bookingasset.php" class="recipe-btn">Book Now</a>
                </div>
            </div>
        </section>

    </body>
</html>
