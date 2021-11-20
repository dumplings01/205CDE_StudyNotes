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
            <form action="changeemail-query.php" method="POST">
                <h3><label>Change my email address</label></h3>
                
                <label>Current email address: </label>
                <input type="email" name="email" required placeholder="Enter your current email address">

                
                <label>New email address: </label>
                <input type="email" name="newemail" required placeholder="Enter your new email address">

                
                <label>Password: </label>
                <input type="password" name="password" required placeholder="Enter your password">

                <center>
                    <button type="submit" id="confirmsettings" name="change_email">Confirm</button>
                </center>
            </form>
        </div>
    </body>
</html>