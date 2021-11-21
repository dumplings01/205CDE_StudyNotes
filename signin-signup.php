<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/signin-signup.css" />
    <title>StudyNotes</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
        <div class="signin-signup">

            <!-- SIGN IN -->
            <form method="POST" action="signin-query.php" class="sign-in-form">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" maxlength="30" name="signin_username" id="signin-username" required placeholder="Username" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" maxlength="30" name="signin_password" id="signin-password" required placeholder="Password" />
                    <i class="bi bi-eye-slash" id="signin-togglePassword"></i>
                </div>
                <input type="submit" value="Login" name="signin_submit" class="btn solid" />
            </form>

            <!-- SIGN OUT -->
            <form method="POST" action="signup-query.php" class="sign-up-form">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" maxlength="30" name="signup_username" id="signup-username" required placeholder="Username" />
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" maxlength="320" name="signup_email" id="email" required placeholder="Email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" maxlength="30" name="signup_password" id="signup-password" required placeholder="Password" />
                    <i class="bi bi-eye-slash" id="signup-togglePassword"></i>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" maxlength="30" name="signup_confirm_password" id="confirm-password" required placeholder="Confirm Password" />
                    <i class="bi bi-eye-slash" id="confirm-togglePassword"></i>
                </div>
                <input type="submit" class="btn" name="signup_submit" value="Sign up" />
            </form>
        </div>
        </div>

        <div class="panels-container">

        <!-- DESCRIPTION SHOWN NEXT TO SIGN IN PANEL -->
        <div class="panel left-panel">
            <div class="content">
            <h3>Welcome back to StudyNotes</h3>
            <br>
            <p>
                Don't have an account? Just click on the sign up button below.
            </p>
            <br>
            <button class="btn transparent" onclick="clearfield();" id="sign-up-btn">
                Sign up
            </button>
            <br>
            <br>
            <a href="forgotpw.php" class="forgotpw">Forgot password?</a>
            </div>
        </div>

        <!-- DESCRIPTION SHOWN NEXT TO SIGN UP PANEL -->
        <div class="panel right-panel">
            <div class="content">
            <h3>Welcome to StudyNotes</h3>
            <br>
            <p>
                Already have an account? Just click on the sign in button below.
            </p>
            <br>
            <button class="btn transparent" onclick="clearfield();" id="sign-in-btn">
                Sign in
            </button>
            <br>
            <br>
            <a href="forgotpw.php" class="forgotpw">Forgot password?</a>
            </div>
        </div>
        </div>
    </div>

    <script src="js/signin-signup.js"></script>
</body>

</html>