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

    $input_email=$_POST['email'];
    $input_newemail=$_POST['newemail'];
    $input_password=$_POST['password'];

    if($input_email!=$input_newemail){
        if($input_email==$sql_email){
            if($input_password==$sql_password){

                $query = "UPDATE users SET email='$input_newemail' WHERE username='$sql_username'";
                $r = mysqli_query($dbc, $query);

                if (mysqli_affected_rows($dbc) == 1) {
                    echo "<script language='javascript'>
                            window.alert('New email address updated successfully');
                            window.location.href='myaccount.php';
                            </script>";
                } else {
                    echo "<script language='javascript'>
                    window.alert('Error! Could not update email address! Please try again!');
                    window.location.href='changeemail.php';
                    </script>";
                }
            } else {
                echo "<script language='javascript'>
                    window.alert('Password error! Please try again!');
                    window.location.href='changeemail.php';
                    </script>";
            }

        } else {
            echo "<script language='javascript'>
                    window.alert('Error! Email address does not exist in database!');
                    window.location.href='changeemail.php';
                    </script>";
        }

    } else {
        echo "<script language='javascript'>
                window.alert('Current email address cannot be the same as new email address!');
                window.location.href='changeemail.php';
                </script>";
    }
?>