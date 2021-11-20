<!DOCTYPE html>
<html>
    <head>
        <title>Question 1 | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/change_style.css">
    </head>
    
    <body>  
        <div class="nav-fixed">
            <div class="navbar">
                <a href="home.php"><img class="logo" src="src/logo.png" alt="logo"></a>
            </div>
        </div>

        <div class="content">
            <form action="changepw-query.php" method="POST">
                <h3><label>Change my password</label></h3>
                
                <label>Current password: </label>
                <input type="password" name="currentpw" required placeholder="Enter your current password">

                
                <label>New password: </label>
                <input type="password" name="newpw" required placeholder="Enter your new password">

                
                <label>Confirm new password: </label>
                <input type="password" name="confirmnewpw" required placeholder="Confirm your new password">

                <center>
                    <button type="submit" id="confirmsettings" name="change_pw">Confirm</button>
                </center>
            </form>
        </div>
    </body>
</html>