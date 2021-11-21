<?php
    session_start();                // starts session for current page
    $user=$_SESSION["user"];        // assign session user attribute's value
?>

<?php
    include ('mysqli_connect.php');
                    
    $user=$_SESSION["user"];

    $query = "SELECT * FROM users WHERE username='$user'";
        
    if($r = mysqli_query($dbc, $query)){
        while ($row = mysqli_fetch_array($r)) {
            $sql_username=$row['username'];         // set username variable from database
            $sql_email=$row['email'];               // set email variable from database
            $sql_password=$row['password'];         // set password variable from database
        }
    }

    $input_currentpw=$_POST['currentpw'];       // set current password variable from user input
    $input_newpw=$_POST['newpw'];               // set new password variable from user input
    $input_confirmnewpw=$_POST['confirmnewpw']; // set confirm new password variable from user input

    if($input_newpw==$input_confirmnewpw){          // check if new password and confirm new password values are the same 
        if($input_currentpw!=$input_newpw){         // check if current password is not same as new password
            if($input_currentpw==$sql_password){    // check if current password entered is same as current password in database

                $query = "UPDATE users SET password='$input_newpw' WHERE username='$sql_username'";     // change password value in database
                $r = mysqli_query($dbc, $query);        // execute query to change password

                if (mysqli_affected_rows($dbc) == 1) {
                    // shows password is updated successfully
                    echo "<script language='javascript'>
                            window.alert('Password updated successfully');
                            window.location.href='myaccount.php';
                            </script>";
                } else {
                    // More than one record changed
                    echo "<script language='javascript'>
                    window.alert('Error! Could not update password! Please try again!');
                    window.location.href='changepw.php';
                    </script>";
                }

            } else {
                // Incorrect password entered
                echo "<script language='javascript'>
                    window.alert('Password error! Please try again!');
                    window.location.href='changepw.php';
                    </script>";
            }

        } else {
            // New password cannot be same with current passsword
            echo "<script language='javascript'>
                    window.alert('New password cannot be the same as current password!');
                    window.location.href='changepw.php';
                    </script>";
        }

    } else {
        // Confirm password and new password cannot be same
        echo "<script language='javascript'>
                window.alert('New password and confirm password is not the same! Please try again!');
                window.location.href='changepw.php';
                </script>";
    }
?>