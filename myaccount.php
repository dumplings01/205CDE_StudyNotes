<?php
session_start();                // starts session for current page
$user=$_SESSION["user"];        // assign session user attribute's value
?>

<?php
    require_once ('mysqli_connect.php');
    $user=$_SESSION["user"];

    // if user tries to enter without logging in, they will be move out to signin-signup.php
    if ($user === NULL) {
        echo "<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error! Please sign in to access this page!')
            window.location.href='signin-signup.php';</SCRIPT>";
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <title>My Account | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/myaccount_style.css">
    </head>
    
    <body>
        <!-- TOP NAV BAR -->
        <div class="nav-fixed">
            <div class="navbar">
                <a href="home.php"><img class="logo" src="src/logo.png" alt="logo"></a>
            </div>
        </div>
        
        <!-- LEFT PANEL NAV BAR-->
        <nav>
            <ul>
                <div class="current"><li><a href="myaccount.php">My Account</a></li></div>
                <li><a href="questionbank.php">My Question Bank</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="signout-query.php">Sign Out</a></li>
            </ul>
        </nav>
        
        <!-- RIGHT PANEL CONTENT -->
        <div class="rightcontent">
            <form method="POST">
                <header><h1>My Account</h1></header>
                <br>
                
                <?php
                    require_once ('mysqli_connect.php'); // Connect to database
                    
                    $user=$_SESSION["user"];

                    // Define query to get username and email value
                    $query = "SELECT username, email FROM users WHERE username='$user'";
                        
                    if($r = mysqli_query($dbc, $query)){
                        while ($row = mysqli_fetch_array($r)) {
                            echo "<label>Username: ".$row['username']."</label><br><br>";
                            echo "<label>Email address: ".$row['email']."</label><br><br><br><br>";
                        }
                    }
                ?>
            </form>
            
            <header><h1>Change Settings</h1></header>

            <!-- CHANGE EMAIL SETTINGS BUTTON -->
            <form action="changeemail.php" method="POST">
                <div class="actioncon">
                    <label>Change Email</label>
                    <button type="submit" id="change" name="change_email">Change</button>
                </div>
            </form>

            <!-- CHANGE PASSWORD SETTINGS BUTTON -->
            <form action="changepw.php" method="POST">
                <div class="actioncon">
                    <label>Change Password</label>
                    <button type="submit" id="change" name="change_pw">Change</button>
                </div>
            </form>
        
        </div>
    </body>
</html>