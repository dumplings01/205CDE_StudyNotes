<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
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

                //Connect and select:
                $dbc=mysqli_connect('localhost','root','','studynotes');

                if (isset($_GET['questionSheetID']) && is_numeric($_GET['questionSheetID'])) { //Display the entry in a form
                    
                    // Define the query
                    $query = "SELECT title FROM user_question_sheet WHERE questionSheetID={$_GET['questionSheetID']}";
                    if ($r = mysqli_query($dbc, $query)) {
                        $row = mysqli_fetch_array ($r); //Retrieve the information

                        // Make the form:
                        print '<form action="delete_question.php" method="post">
                        <br><br><br><p>Are you sure you want to delete this question?</p>
                        <br>
                        <center>
                        <p><h3>' . $row['title'] . '</h3></p>' . '<br>
                        <input type ="hidden" name="questionSheetID" value="'.$_GET['questionSheetID'].'">
                        <input type ="submit" id="confirmsettings" name="submit" value="Delete this question!">
                        </center>
                        </form>';

                    } else { // Couldn't get the information
                        print '<p style="color:red;">Could not retrieve the blog entry because:<br>'
                        . mysqli_error($dbc) . '.</p><p>The query being run was: '.$query . '</p>';
                    }  

                } elseif (isset($_POST['questionSheetID']) && is_numeric($_POST['questionSheetID'])) {

                    //Define the query:
                    $delete1 = "DELETE FROM user_question_sheet WHERE questionSheetID={$_POST['questionSheetID']} LIMIT 1";
                    $r1 = mysqli_query($dbc, $delete1); // Execute the query.

                    $delete2 = "DELETE FROM questions_content WHERE questionSheetID={$_POST['questionSheetID']}";
                    $r2 = mysqli_query($dbc, $delete2);

                    //Report on the result:
                    if (mysqli_affected_rows($dbc) > 1) {
                        print '<p>The question has been deleted.</p>';
                    } else {
                        print '<p style="color: red;">Could not delete the question because:<br>'
                        .mysqli_error($dbc) . '.</p><p>The query being run was: '.$delete1.' and '.$delete2.'</p>';
                    }

                } else { // No ID received
                    print '<p style="color: red;">This page has been accessed in error.</p>';

                } // End of main IF

                mysqli_close($dbc); //CLose connection

            ?>
        </div>
    </body>
</html>