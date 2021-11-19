<?php
    session_start();
    $user=$_SESSION["user"];
?>

<?php
    require_once ('mysqli_connect.php');
    $user=$_SESSION["user"];

    if ($user === NULL) {
        echo "<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error! Please sign in to access this page!')
            window.location.href='signin-signup.php';</SCRIPT>";
    }
    
    // home quesstion button click variable questionsheet id
    if(isset($_GET['username'])){
        
        // user pick on the question button on main page and will return questionsheetid
        $username = $_GET['username'];
        
        // test
        $query = "SELECT username, email FROM users WHERE username='$user'";
        
        $search_result = filterTable($query);

    }else{
        $query = "SELECT username, email FROM users WHERE username=''";
        
        $search_result = filterTable($query);

    }
    
    function filterTable($query){

        $dbc = mysqli_connect("localhost","root","","studynotes");
        $filter_result=mysqli_query($dbc,$query);
        return $filter_result;

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
        <div class="nav-fixed">
            <div class="navbar">
                <a href="home.php"><img class="logo" src="src/logo.png" alt="logo"></a>
            </div>
        </div>
        
        <nav>
            <ul>
                <div class="current"><li><a href="myaccount.php">My Account</a></li></div>
                <li><a href="questionbank.php">My Question Bank</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="signout-query.php">Sign Out</a></li>
            </ul>
        </nav>
        
        <div class="rightcontent">
            <form method="GET">
            <header><h1>My Account</h1></header>
            <br>
            
            <?php
                require_once ('mysqli_connect.php');
                $user=$_SESSION["user"];
                echo "<label>Username: ".$user."</label><br><br><br>";
            ?>

            
            </form>
            
            <h3><label>Change password</label></h3>
            <button type="submit" id="changepw" name="change_email">Confirm</button>
        
        </div>
    </body>
</html>