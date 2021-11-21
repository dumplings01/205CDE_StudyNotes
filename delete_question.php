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

<!doctype html>
<html lang="en">
    <head>
        <title>Delete Question | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/deleteEdit_style.css">
    </head>

    <body>
        <div class="nav-fixed">
            <div class="navbar">
                <a href="home.php"><img class="logo" src="src/logo.png" alt="logo"></a>
            </div>
        </div>

        <div class="content">
            <h1>Delete question?</h1>
            <?php

                // Connect to database
                require_once("mysqli_connect.php");
                
                // Display questions in a form
                if (isset($_GET['questionSheetID']) && is_numeric($_GET['questionSheetID'])) { 
                    
                    // Define query
                    $query = "SELECT title FROM user_question_sheet WHERE questionSheetID={$_GET['questionSheetID']}";

                    if ($r = mysqli_query($dbc, $query)) {

                        // Retrieve the information from database
                        $row = mysqli_fetch_array ($r);

                        // Create form
                        print '<form action="delete_question.php" method="post">
                        <br><br><br><p>Are you sure you want to delete this question?</p>
                        <br><center><p><h3>' . $row['title'] . '</h3></p>' . '<br>
                        <input type ="hidden" name="questionSheetID" value="'.$_GET['questionSheetID'].'">
                        <input type ="submit" id="confirmsettings" name="submit" value="Delete this question!">
                        </center>
                        </form>';

                    } else { 
                        // Could not get information
                        print '<p style="color:red;">Could not retrieve the blog entry because:<br>'
                        . mysqli_error($dbc) . '.</p><p>The query being run was: '.$query . '</p>';
                    }  

                } elseif (isset($_POST['questionSheetID']) && is_numeric($_POST['questionSheetID'])) {

                    // Define the query
                    $delete1 = "DELETE FROM user_question_sheet WHERE questionSheetID={$_POST['questionSheetID']} LIMIT 1";
                    // Delete from database from query line above
                    $r1 = mysqli_query($dbc, $delete1); 

                    // Define the query
                    $delete2 = "DELETE FROM questions_content WHERE questionSheetID={$_POST['questionSheetID']}";
                    // Delete from database from query line above
                    $r2 = mysqli_query($dbc, $delete2);

                    //Report on result
                    if (mysqli_affected_rows($dbc) > 1) {
                        print '<br><p>The question has been deleted.</p>';
                    } else {
                        print '<p style="color: red;">Could not delete the question because:<br>'
                        .mysqli_error($dbc) . '.</p><p>The query being run was: '.$delete1.' and '.$delete2.'</p>';
                    }

                } else { // No ID received
                    print '<p style="color: red;">This page has been accessed in error.</p>';

                }
            ?>
        </div>
    </body>
</html>