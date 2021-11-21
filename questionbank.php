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
        <title>My Question Bank | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/questionbank_style.css">
    </head>
    
    <body>
        <!-- TOP NAV BAR -->
        <div class="nav-fixed">
            <div class="navbar">
                <a href="home.php"><img class="logo" src="src/logo.png" alt="logo"></a>
            </div>
        </div>
        
        <!-- LEFT PANEL NAV BAR -->
        <nav>
            <ul>
                <li><a href="myaccount.php">My Account</a></li>
                <div class="current"><li><a href="questionbank.php">My Question Bank</a></li></div>
                <li><a href="history.php">History</a></li>
                <li><a href="signout-query.php">Sign Out</a></li>
            </ul>
        </nav>
        
        <!-- RIGHT PANEL CONTENT -->
        <div class="rightcontent">
            <header><h1>My Question Bank</h1></header>
            <?php

            // Connect to database
            $dbc=mysqli_connect('localhost','root', '', 'studynotes');

            // Define query
            $query = "SELECT * FROM user_question_sheet WHERE username='".$user."' ORDER BY dateCreated DESC";

            if (mysqli_query($dbc, $query)->num_rows > 0) {
                // Execute query
                if ($r = mysqli_query($dbc, $query)) {

                    // Retrieve and print every record get from database
                    while ($row = mysqli_fetch_array($r)) {
                        print "<div class='container'><p><h3>{$row['title']}</h3>
                        Created by: {$row['username']}<br>
                        <a href=\"delete_question.php?questionSheetID={$row['questionSheetID']}\" id='btn'>Delete</a>
                        </p></div>\n";
                    }

                } else { // Query did not run
                    print '<p style="color: red;">Could not retrieve the data because: <br>'
                    . mysqli_error($dbc) . ' .</p><p>The query being run was: ' . $query . '</p>';
                }
            } else {
                echo "<center>
                    <br><br>
                    <p>Wow, it is so empty here :0<br>Looks like you have not save any questions yet~</p>
                    </center>";
            }
            mysqli_close($dbc); //CLose connection

            ?>

        </div>
            
    </body>
</html>