<?php
session_start();
?>

<?php
unset($_SESSION["user"]);
echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Sign out successful!')
    window.location.href='signin-signup.php';</SCRIPT>";
?>