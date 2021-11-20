<?php
session_start();
?>

<!-- SIGN IN QUERY -->
<?php
    if(isset($_POST['signin_submit'])){

        require_once ('mysqli_connect.php');

        $query = "SELECT username, password FROM users WHERE username='".$_POST['signin_username']."' AND password='".$_POST['signin_password']."'";
        $sql = mysqli_query($dbc,$query);
    
        if($sql->num_rows>0){
            
            $_SESSION["user"]=$_POST['signin_username']; 
            echo "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Sign in successful! Welcome to StudyNotes, ".$_SESSION['user']."!')
                window.location.href='home.php';</SCRIPT>";
        
        } else {

            echo "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Incorrect username or password entered!')
                window.location.href='signin-signup.php';</SCRIPT>";
        }
    }
?>