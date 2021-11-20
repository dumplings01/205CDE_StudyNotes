<?php
session_start();
$user=$_SESSION["user"];
?>

<?php
    require_once ('mysqli_connect.php');
    $user=$_SESSION["user"];

    if ($user === NULL) {
        echo "<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error! Please sign in to access this page!')
            window.location.href='signin-signup.php';</SCRIPT>";
    }
    
    // home quesstion button click variable questionsheet id
    if(isset($_GET['questionSheetID'])){
        
        // user pick on the question button on main page and will return questionsheetid
        $questionSheetID = $_GET['questionSheetID'];
        
        // test
        $query = "SELECT a.questionSheetID,a.title, b.username 
                    FROM user_question_sheet a, users b 
        WHERE b.username = a.username
        AND a.questionSheetID=(SELECT questionSheetID FROM user_question_sheet
        WHERE username ='$user')";
        
        $search_result = filterTable($query);

    }else{
        $query = "SELECT a.questionSheetID,a.title, b.username 
                FROM user_question_sheet a, users b 
        WHERE b.username = a.username
        AND b.questionSheetID=(SELECT questionSheetID FROM user_question_sheet
        WHERE username ='')";
        
        $search_result = filterTable($query);

    }
    
    function filterTable($query){

        $dbc = mysqli_connect("localhost","root","","studynotes");
        $filter_result=mysqli_query($dbc,$query);
        return $filter_result;

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
            <center>
                <br><br>
                
                <div class="fav_questions">
                <form method="POST" action="question.php">
                    <?php
                    require_once ('mysqli_connect.php');
                    $user=$_SESSION["user"];

                        $sqlUserPick = "SELECT questionSheetID, title FROM user_question_sheet WHERE username='$user'";
                        
                        $data = mysqli_query($dbc,$sqlUserPick);

                        if ($data->num_rows > 0) {
                            echo "<label>My Questions</label><br><br>";
                            while($row = $data->fetch_assoc()) 
                            {
                                $questionSheetID = $row['questionSheetID'];
                                $title = $row['title'];
                                echo "<input type='submit' class='question_btn' name='".$questionSheetID."' value='".$title."' />";
                            }
                        } else {
                            echo "<p>Looks like you have not save any questions yet~<br>Click on the + icon to start saving your questions in StudyNotes now!</p>";
                        }
                    ?>
                </div>
                </form>
            </center>
        </div>
    <script src="js/navbar.js"></script>
    </body>
</html>
