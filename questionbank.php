<?php
session_start();
$user=$_SESSION["user"];
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
        <div class="nav-fixed">
            <div class="navbar">
                <a href="home.php"><img class="logo" src="src/logo.png" alt="logo"></a>
            </div>
        </div>
        
        <nav>
            <ul>
                <li><a href="myaccount.php">My Account</a></li>
                <div class="current"><li><a href="questionbank.php">My Question Bank</a></li></div>
                <li><a href="history.php">History</a></li>
                <li><a href="signout-query.php">Sign Out</a></li>
            </ul>
        </nav>
        
        <div class="rightcontent">
            <header><h1>My Question Bank</h1></header>
            <?php

            //Connect and select:
            $dbc=mysqli_connect('localhost','root', '', 'studynotes');

            //Define the query:
            $query = "SELECT * FROM user_question_sheet WHERE username='".$user."' ORDER BY dateCreated DESC";

            if ($r = mysqli_query($dbc, $query)) { //Run the query

                //Retrieve and print every record:
                while ($row = mysqli_fetch_array($r)) {
                    print "<p><h3>{$row['title']}</h3>
                    Date created: {$row['dateCreated']}<br>
                    <a href=\"edit_question.php?questionsSheetID={$row['questionSheetID']}\">Edit</a>
                    <a href=\"delete_question.php?questionSheetID={$row['questionSheetID']}\">Delete</a>
                    </p>\n";
                }

            } else { //Query didn't run
                print '<p style="color: red;">Could not retrieve the data because: <br>'
                . mysqli_error($dbc) . ' .</p><p>The query being run was: ' . $query . '</p>';

            } // End of query IF.

            mysqli_close($dbc); //CLose connection

            ?>

        </div>
            
    </body>
</html>