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

    $input_email=$_POST['email'];               // set email variable from user input
    $input_newemail=$_POST['newemail'];         // set new email variable from user input
    $input_password=$_POST['password'];         // set password variable from user input

    if($input_email!=$input_newemail){              // check if email available from database and user input for new email are not the same
        if($input_email==$sql_email){               // check if user input correct email and is existing in database
            if($input_password==$sql_password){     // check if user input correct password

                $query = "UPDATE users SET email='$input_newemail' WHERE username='$sql_username'";     // change email value in database
                $r = mysqli_query($dbc, $query);            // execute query to change email value

                if (mysqli_affected_rows($dbc) == 1) {
                    // Shows alert saying email address is updated in database
                    echo "<script language='javascript'>
                            window.alert('New email address updated successfully');
                            window.location.href='myaccount.php';
                            </script>";
                } else {
                    // More than one record changed
                    echo "<script language='javascript'>
                    window.alert('Error! Could not update email address! Please try again!'); 
                    window.location.href='changeemail.php';
                    </script>";
                }
            } else {
                // Incorrect password entered
                echo "<script language='javascript'>
                    window.alert('Password error! Please try again!');
                    window.location.href='changeemail.php';
                    </script>";
            }

        } else {
            // Incorrect email entered
            echo "<script language='javascript'>
                    window.alert('Error! Email address does not exist in database!');
                    window.location.href='changeemail.php';
                    </script>";
        }

    } else {
        // New email address cannot be same as current email address
        echo "<script language='javascript'>
                window.alert('New email address cannot be the same as current email address!');
                window.location.href='changeemail.php';
                </script>";
    }
?>