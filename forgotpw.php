<!DOCTYPE html>
<html>
    <head>
        <title>Forgot Password | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/forgotpw.css">
    </head>
    
    <body>
        <div class="container">
            <div class="forms-container">
                <form method="POST" action="#" class="forgotpw-form">
                    <h2 class="title">Forgot Password</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" required placeholder="Email" />
                    </div>

                    <input type="submit" name="submit_email" class="btn" value="Confirm" onclick="error_msg()" />
                    <br><br>
                    <a href="signin-signup.php">Go back</a>
                </form>
            </div>
        </div>
        <script src="js/signin-signup.js"></script>
    </body>
</html>
