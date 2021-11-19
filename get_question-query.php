<?php require_once ('mysqli_connect.php');
    $user=$_SESSION["user"];

    // testing
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