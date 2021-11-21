<?php
session_start();                // starts session for current page
$user=$_SESSION["user"];        // assign session user attribute's value
?>

<?php
    include('mysqli_connect.php');

    $user=$_SESSION["user"];
    $date = date('Y-m-d H:i:s');        // get CURRENT DATE value

    $title=mysqli_real_escape_string($dbc, $_POST['question_title']);
    
    // Question 1
    $q1=mysqli_real_escape_string($dbc, $_POST['question1']);
    $q1A=mysqli_real_escape_string($dbc, $_POST['answer_1A']);
    $q1B=mysqli_real_escape_string($dbc, $_POST['answer_1B']);
    $q1C=mysqli_real_escape_string($dbc, $_POST['answer_1C']);
    $q1D=mysqli_real_escape_string($dbc, $_POST['answer_1D']);
    $q1Ans=mysqli_real_escape_string($dbc, $_POST['answer1']);

    // Question 2
    $q2=mysqli_real_escape_string($dbc, $_POST['question2']);
    $q2A=mysqli_real_escape_string($dbc, $_POST['answer_2A']);
    $q2B=mysqli_real_escape_string($dbc, $_POST['answer_2B']);
    $q2C=mysqli_real_escape_string($dbc, $_POST['answer_2C']);
    $q2D=mysqli_real_escape_string($dbc, $_POST['answer_2D']);
    $q2Ans=mysqli_real_escape_string($dbc, $_POST['answer2']);

    // Question 3
    $q3=mysqli_real_escape_string($dbc, $_POST['question3']);
    $q3A=mysqli_real_escape_string($dbc, $_POST['answer_3A']);
    $q3B=mysqli_real_escape_string($dbc, $_POST['answer_3B']);
    $q3C=mysqli_real_escape_string($dbc, $_POST['answer_3C']);
    $q3D=mysqli_real_escape_string($dbc, $_POST['answer_3D']);
    $q3Ans=mysqli_real_escape_string($dbc, $_POST['answer3']);

    // Question 4
    $q4=mysqli_real_escape_string($dbc, $_POST['question4']);
    $q4A=mysqli_real_escape_string($dbc, $_POST['answer_4A']);
    $q4B=mysqli_real_escape_string($dbc, $_POST['answer_4B']);
    $q4C=mysqli_real_escape_string($dbc, $_POST['answer_4C']);
    $q4D=mysqli_real_escape_string($dbc, $_POST['answer_4D']);
    $q4Ans=mysqli_real_escape_string($dbc, $_POST['answer4']);

    // Question 5
    $q5=mysqli_real_escape_string($dbc, $_POST['question5']);
    $q5A=mysqli_real_escape_string($dbc, $_POST['answer_5A']);
    $q5B=mysqli_real_escape_string($dbc, $_POST['answer_5B']);
    $q5C=mysqli_real_escape_string($dbc, $_POST['answer_5C']);
    $q5D=mysqli_real_escape_string($dbc, $_POST['answer_5D']);
    $q5Ans=mysqli_real_escape_string($dbc, $_POST['answer5']);

    // Question 6
    $q6=mysqli_real_escape_string($dbc, $_POST['question6']);
    $q6A=mysqli_real_escape_string($dbc, $_POST['answer_6A']);
    $q6B=mysqli_real_escape_string($dbc, $_POST['answer_6B']);
    $q6C=mysqli_real_escape_string($dbc, $_POST['answer_6C']);
    $q6D=mysqli_real_escape_string($dbc, $_POST['answer_6D']);
    $q6Ans=mysqli_real_escape_string($dbc, $_POST['answer6']);

    // Question 7
    $q7=mysqli_real_escape_string($dbc, $_POST['question7']);
    $q7A=mysqli_real_escape_string($dbc, $_POST['answer_7A']);
    $q7B=mysqli_real_escape_string($dbc, $_POST['answer_7B']);
    $q7C=mysqli_real_escape_string($dbc, $_POST['answer_7C']);
    $q7D=mysqli_real_escape_string($dbc, $_POST['answer_7D']);
    $q7Ans=mysqli_real_escape_string($dbc, $_POST['answer7']);

    // Question 8
    $q8=mysqli_real_escape_string($dbc, $_POST['question8']);
    $q8A=mysqli_real_escape_string($dbc, $_POST['answer_8A']);
    $q8B=mysqli_real_escape_string($dbc, $_POST['answer_8B']);
    $q8C=mysqli_real_escape_string($dbc, $_POST['answer_8C']);
    $q8D=mysqli_real_escape_string($dbc, $_POST['answer_8D']);
    $q8Ans=mysqli_real_escape_string($dbc, $_POST['answer8']);

    // Question 9
    $q9=mysqli_real_escape_string($dbc, $_POST['question9']);
    $q9A=mysqli_real_escape_string($dbc, $_POST['answer_9A']);
    $q9B=mysqli_real_escape_string($dbc, $_POST['answer_9B']);
    $q9C=mysqli_real_escape_string($dbc, $_POST['answer_9C']);
    $q9D=mysqli_real_escape_string($dbc, $_POST['answer_9D']);
    $q9Ans=mysqli_real_escape_string($dbc, $_POST['answer9']);

    // Question 10
    $q10=mysqli_real_escape_string($dbc, $_POST['question10']);
    $q10A=mysqli_real_escape_string($dbc, $_POST['answer_10A']);
    $q10B=mysqli_real_escape_string($dbc, $_POST['answer_10B']);
    $q10C=mysqli_real_escape_string($dbc, $_POST['answer_10C']);
    $q10D=mysqli_real_escape_string($dbc, $_POST['answer_10D']);
    $q10Ans=mysqli_real_escape_string($dbc, $_POST['answer10']);

    // insert into user_question_sheet first to get title value later
    $sql="INSERT INTO user_question_sheet VALUES (DEFAULT, '$title', '$user', '$date')";
    $result=mysqli_query($dbc, $sql);

    if ($result == TRUE) {

        // check if questionSheetID is available
        $getquestionSheetID="SELECT MAX(questionSheetID) FROM user_question_sheet";
        $getID=mysqli_query($dbc, $getquestionSheetID);

        // find questionSheetID value
        if($r = mysqli_query($dbc, $getquestionSheetID)){
            while ($row = mysqli_fetch_array($r)) {
                $questionSheetID = $row['MAX(questionSheetID)']; 
            }
        }

        if ($getID == TRUE) {

            // Question 1
            $insertq1="INSERT INTO questions_content VALUES (DEFAULT, '$q1', '$q1A',
                    '$q1B', '$q1C', '$q1D', '$q1Ans', '$questionSheetID')";

            // Question 2
            $insertq2="INSERT INTO questions_content VALUES (DEFAULT, '$q2', '$q2A',
                    '$q2B', '$q2C', '$q2D', '$q2Ans', '$questionSheetID')";

            // Question 3
            $insertq3="INSERT INTO questions_content VALUES (DEFAULT, '$q3', '$q3A',
                    '$q3B', '$q3C', '$q3D', '$q3Ans', '$questionSheetID')";

            // Question 4
            $insertq4="INSERT INTO questions_content VALUES (DEFAULT, '$q4', '$q4A',
                    '$q4B', '$q4C', '$q4D', '$q4Ans', '$questionSheetID')";

            // Question 5
            $insertq5="INSERT INTO questions_content VALUES (DEFAULT, '$q5', '$q5A',
                   '$q5B', '$q5C', '$q5D', '$q5Ans', '$questionSheetID')";

            // Question 6
            $insertq6="INSERT INTO questions_content VALUES (DEFAULT, '$q6', '$q6A',
                    '$q6B', '$q6C', '$q6D', '$q6Ans', '$questionSheetID')";

            // Question 7
            $insertq7="INSERT INTO questions_content VALUES (DEFAULT, '$q7', '$q7A',
                    '$q7B', '$q7C', '$q7D', '$q7Ans', '$questionSheetID')";

            // Question 8
            $insertq8="INSERT INTO questions_content VALUES (DEFAULT, '$q8', '$q8A',
                    '$q8B', '$q8C', '$q8D', '$q8Ans', '$questionSheetID')";

            // Question 9
            $insertq9="INSERT INTO questions_content VALUES (DEFAULT, '$q9', '$q9A',
                    '$q9B', '$q9C', '$q9D', '$q9Ans', '$questionSheetID')";

            // Question 10
            $insertq10="INSERT INTO questions_content VALUES (DEFAULT, '$q10', '$q10A',
                    '$q10B', '$q10C', '$q10D', '$q10Ans', '$questionSheetID')";

            $result1=mysqli_query($dbc, $insertq1);
            $result2=mysqli_query($dbc, $insertq2);
            $result3=mysqli_query($dbc, $insertq3);
            $result4=mysqli_query($dbc, $insertq4);
            $result5=mysqli_query($dbc, $insertq5);
            $result6=mysqli_query($dbc, $insertq6);
            $result7=mysqli_query($dbc, $insertq7);
            $result8=mysqli_query($dbc, $insertq8);
            $result9=mysqli_query($dbc, $insertq9);
            $result10=mysqli_query($dbc, $insertq10);

            if ($result1 == TRUE) {
                // QUESTION SAVED INTO DATABASE SUCCESSFULLY
                echo "<script language='javascript'>
                        window.alert('Questions saved successfully!');
                        window.location.href='home.php';
                        </script>";
            } else {
                // Error with inserting record into database
                echo "<script language='javascript'>
                        window.alert('Unable to save questions! Please try again!');
                        window.location.href='add_question.php';
                        </script>";

            }
        } else {
            // Error with getting questionSheetID value
            echo "<script language='javascript'>
                    window.alert('Question sheet error!');
                    window.location.href='add_question.php';
                    </script>";

        }
    }else{
        // Error with inserting values in user_question_sheet table
        echo "<script language='javascript'>
            window.alert('Unable to save questions! Please try again!');
            window.location.href='add_question.php';
            </script>";
    }
?>