<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
?>


<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <title>Paylocity Demo - Sign In</title>
</head>


<div class="header">
    <a href="index.php"><img class="logo" src="images/paylocity_logo.png" alt="Paylocity Coding Challenge Logo" title="Paylocity Home" /></a>
    <ul class="navlinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Sign In</a></li>
        <li><a href="register.php">Register</a></li>
    </ul>
</div>


<div class="main">
    <div class="container">
        <h1 class="orange-title">Sign In</h1>
        <div class="formContainer">
            <form class="form" action="login-handler.php" method="POST">
                <span>Email:</span><br />
                <input type="text" name="email" required> <br />
                <span>Password:</span><br />
                <input type="text" name="password" required> <br />
                <div class="button-center">
                    <input class="button-center" type="submit" value="Sign in">
                </div>
            </form>
        </div>
    </div>
</div>


<div class="footer">
    <p>Chris Houston</p>
</div>


</html>
