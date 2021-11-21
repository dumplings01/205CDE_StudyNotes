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
        <title>Home | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital,wght@1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/home_style.css">
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

        <div class="home-content">
            <center>
                <br><br>
                
                <div class="my_questions">
                
                    <?php
                    require_once ('mysqli_connect.php'); // Connect to database
                    $user=$_SESSION["user"];

                        // Define query
                        $sqlUserPick = "SELECT questionSheetID, title FROM user_question_sheet WHERE username='$user'";
                        
                        // Execute query
                        $data = mysqli_query($dbc,$sqlUserPick);

                        if ($data->num_rows > 0) {
                            echo "<label>My Questions</label><br><br>";

                            // print values get from database into form
                            // question buttons are printed out
                            while($row = $data->fetch_assoc()) 
                            {
                                $questionSheetID = $row['questionSheetID'];
                                $title = $row['title'];
                                echo "<form method='POST' action='question.php'>";
                                echo "<input type='submit' class='question_btn' name='title' value='".$title."' />";
                                echo "<input type='hidden' name='questionSheetID' value='".$questionSheetID."' />";
                                echo "</form>";
                            }
                        } else {
                            echo "<p>Looks like you have not save any questions yet~<br>Click on the + icon to start saving your questions in StudyNotes now!</p>";
                        }
                    ?>
                </div>
            </center>
        </div>
    <script src="js/navbar.js"></script>
    </body>
</html>
