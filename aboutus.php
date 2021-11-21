<?php
session_start();                // starts session for current page
$user=$_SESSION["user"];        // assign session user attribute's value
?>

<?php
    require_once ('mysqli_connect.php');
    $user=$_SESSION["user"];

    // if user tries to enter without logging in, they will be move out to signin-signup.php
    if ($user === NULL) {
        echo "<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error! Please sign in to access this page!')
            window.location.href='signin-signup.php';</SCRIPT>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>About Us | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital,wght@1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/aboutus_style.css">
        
    </head>
    
    <body>

        <!-- NAV BAR -->
        <div class="nav-fixed">
            <nav>
                <img class="logo" src="src/logo.png" alt="logo">
                <ul class="nav-links">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="myaccount.php">Settings</a></li>
                    <li><a href="add_question.php">+</a></li>
                </ul>

                <!-- SIDE NAV BAR IF SCREEN SIZE IS MINIMIZED-->
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>            
            </nav>
        </div>

        <!-- CONTENT -->
        <div class="home-content">
            <img class="aboutus-img" src="src/uni.jpg" alt="aboutus-img1">
            <div class="about-section">
                <h1>
                    About Us
                </h1>
                <p>
                    Welcome to StudyNotes! Do you know that StudyNotes is
                    created by an individual who wants to build a website
                    which can help other students academically?
                </p>
            </div>
            
            <div class="about-section">
                <h1>
                    About StudyNotes
                </h1>
                <p>
                    StudyNotes is a website that you can do your revisions in
                    by adding and saving your questions into your account.
                    Questions sheets which are saved into your account in the website
                    can be accessed after signing in with the account you have saved
                    the questions with. You can also do the questions in the website
                    and then get the result on how you have done in your questions. 
                </p>
            </div>
        </div>

        <!-- CALLS JAVASCRIPT FUNCTION FOR RESPONSIVE NAV BAR -->
        <script src="js/navbar.js"></script> 
    </body>
</html>
