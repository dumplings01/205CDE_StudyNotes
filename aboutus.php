<?php
session_start();
$user=$_SESSION["user"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital,wght@1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/aboutus_style.css">
    </head>
    
    <body>
        <div class="nav-fixed">
            <nav>
                <img class="logo" src="src/logo.png" alt="logo">
                <ul class="nav-links">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="myaccount.php">Settings</a></li>
                    <li><a href="add_question.php">+</a></li>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>            
            </nav>
        </div>

        <div class="home-content">
            <div class="about-section">
                <br><br><br><br><br><br>
                <h1>
                    About Us
                </h1>
                <p class="text">
                    Welcome to StudyNotes! Do you know that StudyNotes is
                    created by an individual who wants to build a website which can help other students academically
                </p>
    

                
            </div>
        </div>
    </body>
</html>
