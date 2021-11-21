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
        <title>Change Email | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/change_style.css">
    </head>
    
    <body>
        <!-- NAV BAR -->
        <div class="nav-fixed">
            <div class="navbar">
                <a href="home.php"><img class="logo" src="src/logo.png" alt="logo"></a>
            </div>
        </div>

        <div class="content">
            <form action="changeemail-query.php" method="POST">
                <h3><label>Change my email address</label></h3>
                
                <label>Current email address: </label>
                <input type="email" name="email" required placeholder="Enter your current email address">

                
                <label>New email address: </label>
                <input type="email" name="newemail" required placeholder="Enter your new email address">

                
                <label>Password: </label>
                <input type="password" name="password" required placeholder="Enter your password">

                <center>
                    <button type="submit" id="confirmsettings" name="change_email">Confirm</button>
            </form>
            <form action="myaccount.php">
                <button type="submit" id="cancel" name="cancel_btn">Cancel</button>
                </center>
            </form>
        </div>
    </body>
</html>