<?php
    include ('mysqli_connect.php');

    $signup_username=$_POST['signup_username'];
    $signup_email=$_POST['signup_email'];
    $signup_password=$_POST['signup_password'];
    $signup_confirmpassword=$_POST['signup_confirm_password'];

    $sql1="SELECT * FROM users WHERE username ='$signup_username'";
    $result1=mysqli_query($dbc,$sql1);
    $row1=mysqli_fetch_assoc($result1);
  
    if($signup_password==$signup_confirmpassword){

            $sql2="INSERT INTO users VALUES ('$signup_username','$signup_email','$signup_password')";
            $result2=mysqli_query($dbc,$sql2);

                if($result2==TRUE){

                    //pop up mesej jika pendaftaran pengguna berjaya
                    echo "<script language='javascript'>
                    window.alert('Your account is created successfully!');
                    window.location.href='signin-signup.php';
                    </script>";

                }else{

                    //pop up mesej jika pendaftaran pengguna gagal
                    echo "<script language='javascript'>
                    window.alert('Error! Please use another username!');
                    window.location.href='signin-signup.php';
                    </script>";

                }
    }
            
    else{

        //pop up mesej jika kedua-dua kata laluan yang dimasukkan tidak sama
        echo "<script language='javascript'>
            window.alert('Password is not the same! Please try again!');
            window.location.href='signin-signup.php';
            </script>";
    }
?>