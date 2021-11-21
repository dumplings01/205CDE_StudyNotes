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
        <title>Your Result | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/result_style.css">
    </head>
    
    <body>
        <!-- NAV BAR -->
        <div class="nav-fixed">
            <div class="navbar">
                <a href="home.php"><img class="logo" src="src/logo.png" alt="logo"></a>
            </div>
        </div>
        
        <div class="content">
            <br><br><br><br><br>
            <header><h1><b>Your Result</b></h1></header>
            <br><br>
                   
            <?php
                include ('mysqli_connect.php');

                // Get questionID and question answered by user
                $qsID = $_POST['questionSheetID'];
                $reply1 = $_POST['answer1'];
                $reply2 = $_POST['answer2'];
                $reply3 = $_POST['answer3'];
                $reply4 = $_POST['answer4'];
                $reply5 = $_POST['answer5'];
                $reply6 = $_POST['answer6'];
                $reply7 = $_POST['answer7'];
                $reply8 = $_POST['answer8'];
                $reply9 = $_POST['answer9'];
                $reply10 = $_POST['answer10'];
                $replies = array($reply1, $reply2, $reply3, $reply4, $reply5,
                            $reply6, $reply7, $reply8, $reply9, $reply10);

                // Define query
                $query = "SELECT question, answerA, answerB, answerC, answerD, correctAnswer FROM questions_content WHERE
                        questionSheetID='$qsID' ORDER BY questionID ASC";
                
                // Execute query
                $result = mysqli_query($dbc, $query);

                if($result->num_rows>0) {
                    $correctCount = 0;
                    $numberCount = 1;
                    while ($row = $result->fetch_assoc())
                    {
                        // Check if item in array index is the same as the correct answer
                        if ($replies[$numberCount-1] == $row['correctAnswer']){
                            $correctCount+=1;

                            // Answer is correct
                            echo "<label>Question ".$numberCount.":<br></label>
                                <textarea readonly>".$row['question']."</textarea>
                                <input type='button' class='answer_btn' name='button".$numberCount."A' value='A. ".$row['answerA']."'/>
                                <input type='button' class='answer_btn' name='button".$numberCount."B' value='B. ".$row['answerB']."'/>
                                <input type='button' class='answer_btn' name='button".$numberCount."C' value='C. ".$row['answerC']."'/>
                                <input type='button' class='answer_btn' name='button".$numberCount."D' value='D. ".$row['answerD']."'/>
                                <div class='youranswer'><color: 'green';>Your answer is correct!<br>
                                You answered: ".$replies[$numberCount-1]."</div>";
                            $numberCount+=1;
                        } else {

                            // Answer is incorrect
                            echo "<label>Question ".$numberCount.":<br></label>
                                <textarea readonly>".$row['question']."</textarea>
                                <input type='button' class='answer_btn' name='button".$numberCount."A' value='A. ".$row['answerA']."'/>
                                <input type='button' class='answer_btn' name='button".$numberCount."B' value='B. ".$row['answerB']."'/>
                                <input type='button' class='answer_btn' name='button".$numberCount."C' value='C. ".$row['answerC']."'/>
                                <input type='button' class='answer_btn' name='button".$numberCount."D' value='D. ".$row['answerD']."'/>
                                <div class='youranswer'><color: 'red';>Your answer is wrong!<br>
                                You answered: ".$replies[$numberCount-1]."</div>";
                            $numberCount+=1;
                        }
                    }
                    echo "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('You got correct for ".$correctCount." questions!');</SCRIPT>";
                }
            ?>
            <form method="POST" action="home.php">
                <center>
                    <input type="submit" class="ok_btn" name="ok_btn" value="OK"></button>
                </center>
            </form>
        </div>
    </body>
</html>