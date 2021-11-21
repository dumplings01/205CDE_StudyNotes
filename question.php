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
        <title>Questions | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/questions_style.css">
    </head>
    
    <!-- NAV BAR -->
    <body>  
        <div class="nav-fixed">
            <div class="navbar">
                <a href="home.php"><img class="logo" src="src/logo.png" alt="logo"></a>
            </div>
        </div>
                
        <div class="question_content">
            <center>
                <form action="result.php" method="POST">

                <?php require_once ('mysqli_connect.php');
                    $user=$_SESSION["user"];

                    $qsID = $_POST['questionSheetID'];

                    // Define query by using questionSheetID to find values
                    $sqlGetTitle = "SELECT title, questionSheetID FROM user_question_sheet WHERE questionSheetID='$qsID'";
                    $getTitle = mysqli_query($dbc,$sqlGetTitle);

                    if ($getTitle->num_rows > 0) {
                        while($row = $getTitle->fetch_assoc()) 
                        {
                            $title = $row['title'];

                            // Print title
                            echo "<br><br><label><h2><b>Title: ".$title."</b></h2></label>";

                            // Assign value for questionSheetID using hidden input type
                            echo "<input type='hidden' name='questionSheetID' value='".$qsID."' />";
                        }
                    }

                    // Define query for questions output
                    $sqlShowQuestions = "SELECT a.question, a.answerA, a.answerB, a.answerC, a.answerD
                                    FROM questions_content a, user_question_sheet b
                                    WHERE a.questionSheetID = b.questionSheetID
                                    AND b.questionSheetID='$qsID' ORDER BY a.questionID ASC";

                    // Execute query
                    $data = mysqli_query($dbc,$sqlShowQuestions);

                    if ($data->num_rows > 0) {
                        $count = 1;
                        while($row = $data->fetch_assoc()) 
                        {
                            // Assigning values get from database to variable
                            $question = $row['question'];
                            $answerA = $row['answerA'];
                            $answerB = $row['answerB'];
                            $answerC = $row['answerC'];
                            $answerD = $row['answerD'];

                            // Print question number and question text
                            echo "<div class='question_label'>
                                <label>Question ".$count.": </label><br>
                                <textarea readonly>".$question."</textarea>
                                </div>";

                            // Display radio buttons and answer options
                            echo "<div class='answer_container'><div class='radio'>
                                <input type='radio' id='radio_btn' name='answer".$count."' value='A' required></input>
                                <input type='button' class='answer_btn' name='button".$count."A' value='A. ".$answerA."'/>
                                </div><div class='radio'>
                                <input type='radio' id='radio_btn' name='answer".$count."' value='B'></input>
                                <input type='button' class='answer_btn' name='button".$count."B' value='B. ".$answerB."'/>
                                </div>
                                <div class='radio'>
                                <input type='radio' id='radio_btn' name='answer".$count."' value='C'></input>
                                <input type='button' class='answer_btn' name='button".$count."C' value='C. ".$answerC."'/>
                                </div>
                                <div class='radio'>
                                <input type='radio' id='radio_btn' name='answer".$count."' value='D'></input>
                                <input type='button' class='answer_btn' name='button".$count."D' value='D. ".$answerD."'/>
                                </div></div>";

                            $count += 1;

                        }
                    } else {
                        print '<p style="color: red;">Could not retrieve the data because: <br>'
                                . mysqli_error($dbc) . ' .</p><p>The query being run was: ' . $sqlShowQuestions . '</p>';
                    }
                ?>
                    
                    <div class="btns_container">
                        <input type="submit" name="submit_questions" class="submit_btn" value="Submit" />
                        <br><br><br>
                    </div>
                </form>
            </center>
        </div>
    </body>
</html>