<?php
session_start();
$user=$_SESSION["user"];
?>

<!DOCTYPE html>

<html>
    <head>
        <title>History | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/history_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
        <div class="nav-fixed">
            <div class="navbar">
                <a href="home.php"><img class="logo" src="src/logo.png" alt="logo"></a>
            </div>
        </div>
        
        <nav>
            <ul>
                <li><a href="myaccount.php">My Account</a></li>
                <li><a href="questionbank.php">My Question Bank</a></li>
                <div class="current"><li><a href="history.php">History</a></li></div>
                <li><a href="signout-query.php">Sign Out</a></li>
            </ul>
        </nav>
        
        <div class="rightcontent">
            <header><h1>History</h1></header>
            <table>
            <tr>
                <th><h3>Question sheet name</h3></th>
                <th><h3>Date Created</h3></th>
            </tr>

            <?php
                $dbc=mysqli_connect('localhost','root', '', 'studynotes');

                //Define the query:
                $query = "SELECT * FROM user_question_sheet WHERE username='".$user."' ORDER BY dateCreated DESC";

                if ($r = mysqli_query($dbc, $query)) { //Run the query

                    //Retrieve and print every record:
                    while ($row = mysqli_fetch_array($r)) {
                        echo "<tr>
                        <td>{$row['title']}</td>
                        <td>{$row['dateCreated']}</td>
                        </tr>";
                    }
                    
                } else { //Query didn't run
                    print '<p style="color: red;">Could not retrieve the data because: <br>'
                    . mysqli_error($dbc) . ' .</p><p>The query being run was: ' . $query . '</p>';

                } // End of query IF.

                mysqli_close($dbc); //CLose connection
            ?>
            </table>
        </div>

    </body>
</html>