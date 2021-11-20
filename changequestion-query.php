<?php
session_start();
$user=$_SESSION["user"];
?>

<?php
    require_once ('mysqli_connect.php');
    $user=$_SESSION["user"];
    $questionSheetID = 1;
    
    // home quesstion button click variable questionsheet id
    if(isset($POST['user'])){
        
        // user pick on the question button on main page and will return questionsheetid
        $username = $POST['user'];
        
        // test
        $query = "SELECT a.questionSheetID,a.title, b.username 
                    FROM user_question_sheet a, users b 
                    WHERE a.username = b.username
                    AND a.questionSheetID ='$questionSheetID'";
        
        $search_result = filterTable($query);

        echo "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('successful')
                window.location.href='question.php';</SCRIPT>";

    }else{
        $query = "SELECT a.questionSheetID,a.title, b.question, b.answerA, b.answerB, b.answerC, b.answerC, b.answerD, c.username 
                FROM user_question_sheet a, questions_content b, users c 
        WHERE a.questionSheetID = b.questionSheetID AND c.username = a.username
        AND b. questionSheetID=(SELECT questionSheetID FROM user_question_sheet
        WHERE questionSheetID ='')";
        
        $search_result = filterTable($query);

        echo "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('failed')
                window.location.href='home.php';</SCRIPT>";

    }
    
    function filterTable($query){

        $dbc = mysqli_connect("localhost","root","","studynotes");
        $filter_result=mysqli_query($dbc,$query);
        return $filter_result;

    }
?>