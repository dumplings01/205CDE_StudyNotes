<?php
session_start();
?>

<!-- SIGN IN QUERY -->
<?php
    if(isset($_POST['signin_submit'])){

        require_once ('mysqli_connect.php'); // Connect to database

        // Define query
        $query = "SELECT username, password FROM users WHERE username='".$_POST['signin_username']."' AND password='".$_POST['signin_password']."'";
        // Execute query
        $sql = mysqli_query($dbc,$query);
    
        if($sql->num_rows>0){
            
            $_SESSION["user"]=$_POST['signin_username']; // Assign session value to variable 'user'
            // Sign in successful
            echo "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Sign in successful! Welcome to StudyNotes, ".$_SESSION['user']."!')
                window.location.href='home.php';</SCRIPT>";
        
        } else {
            // Sign in failed
            echo "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Incorrect username or password entered!')
                window.location.href='signin-signup.php';</SCRIPT>";
        }
    }
?>