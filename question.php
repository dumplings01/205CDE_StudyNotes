<?php
session_start();
$user=$_SESSION["user"];
?>

<?php
    require_once ('mysqli_connect.php');
    $user=$_SESSION["user"];
    
    // home quesstion button click variable questionsheet id
    if(isset($POST['questionSheetID'])){
        
        // user pick on the question button on main page and will return questionsheetid
        $questionSheetID = $POST['questionSheetID'];
        
        // test
        $query = "SELECT a.questionSheetID,a.title, b.question, b.answerA, b.answerB, b.answerC, b.answerC, b.answerD, c.username 
                    FROM user_question_sheet a, questions_content b, users c 
        WHERE a.questionSheetID = b.questionSheetID AND c.username = a.username
        AND b. questionSheetID=(SELECT questionSheetID FROM user_question_sheet
        WHERE questionSheetID ='$questionSheetID')";
        
        $search_result = filterTable($query);

    }else{
        $query = "SELECT a.questionSheetID,a.title, b.question, b.answerA, b.answerB, b.answerC, b.answerC, b.answerD, c.username 
                FROM user_question_sheet a, questions_content b, users c 
        WHERE a.questionSheetID = b.questionSheetID AND c.username = a.username
        AND b. questionSheetID=(SELECT questionSheetID FROM user_question_sheet
        WHERE questionSheetID ='')";
        
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
        <title>Question 1 | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/questions_style.css">
    </head>
    
    <body>  
        <div class="nav-fixed">
            <div class="navbar">
                <a href="home.php"><img class="logo" src="src/logo.png" alt="logo"></a>
            </div>
        </div>
                
        <div class="question_content">
            <center>
                <form name="showQuestion" action="question.php" method="POST">

                <?php require_once ('mysqli_connect.php');
                    $user=$_SESSION["user"];

                    // ISSUE!! unable to get value through submit button in home page
                    // so assigned variable value to get output 
                    $questionSheetID = 1;

                    $sqlShowQuestions = "SELECT a.question, a.answerA, a.answerB, a.answerC, a.answerD
                                    FROM questions_content a, user_question_sheet b
                                    WHERE a.questionSheetID = b.questionSheetID
                                    AND b.questionSheetID='$questionSheetID'";

                    $data = mysqli_query($dbc,$sqlShowQuestions);

                    if ($data->num_rows > 0) {
                        $count = 1;
                        while($row = $data->fetch_assoc()) 
                        {
                            $question = $row['question'];
                            $answerA = $row['answerA'];
                            $answerB = $row['answerB'];
                            $answerC = $row['answerC'];
                            $answerD = $row['answerD'];

                            echo "<div class='question_label'>";
                            echo "<label>Question ".$count.": </label><br>";
                            echo "<textarea readonly>".$question."</textarea>";
                            echo "</div>";

                            echo "<div class='answer_container'>";
                            echo "<input type='button' class='answer_btn' name='button".$count."A' value='A. ".$answerA."'/>";
                            echo "<input type='button' class='answer_btn' name='button".$count."B' value='B. ".$answerB."'/>";
                            echo "<input type='button' class='answer_btn' name='button".$count."C' value='C. ".$answerC."'/>";
                            echo "<input type='button' class='answer_btn' name='button".$count."D' value='D. ".$answerD."'/>";
                            echo "</div>";

                            $count += 1;

                        }
                    } else {
                        print '<p style="color: red;">Could not retrieve the data because: <br>'
                                . mysqli_error($dbc) . ' .</p><p>The query being run was: ' . $sqlShowQuestions . '</p>';
                    }
                ?>
                    
                    <div class="btns_container">
                        <div class="next_btn">
                            <a href="result.html" class="other_question">Next</a>
                        </div>
                    </div>
                </form>
            </center>
        </div>
    </body>
</html>