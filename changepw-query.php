<?php
    session_start();
    $user=$_SESSION["user"];
?>

<?php
    include ('mysqli_connect.php');
                    
    $user=$_SESSION["user"];
    $query = "SELECT * FROM users WHERE username='$user'";
        
    if($r = mysqli_query($dbc, $query)){
        while ($row = mysqli_fetch_array($r)) {
            $sql_username=$row['username'];
            $sql_email=$row['email'];
            $sql_password=$row['password'];
        }
    }

    $input_currentpw=$_POST['currentpw'];
    $input_newpw=$_POST['newpw'];
    $input_confirmnewpw=$_POST['confirmnewpw'];

    if($input_newpw==$input_confirmnewpw){
        if($input_currentpw!=$input_newpw){
            if($input_currentpw==$sql_password){

                $query = "UPDATE users SET password='$input_newpw' WHERE username='$sql_username'";
                $r = mysqli_query($dbc, $query);

                if (mysqli_affected_rows($dbc) == 1) {
                    echo "<script language='javascript'>
                            window.alert('Password updated successfully');
                            window.location.href='myaccount.php';
                            </script>";
                } else {
                    echo "<script language='javascript'>
                    window.alert('Error! Could not update password! Please try again!');
                    window.location.href='changepw.php';
                    </script>";
                }

            } else {
                echo "<script language='javascript'>
                    window.alert('Password error! Please try again!');
                    window.location.href='changepw.php';
                    </script>";
            }

        } else {
            echo "<script language='javascript'>
                    window.alert('New password cannot be the same as current password!');
                    window.location.href='changepw.php';
                    </script>";
        }

    } else {
        echo "<script language='javascript'>
                window.alert('New password and confirm password is not the same! Please try again!');
                window.location.href='changepw.php';
                </script>";
    }
?>