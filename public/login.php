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

    <body>
        <div class="main">
            <div class="container">
                <h1 class="orange-title">Sign In</h1>

                <!-- Sign In Form -->
                <div class="formContainer">
                    <form class="form" action="login-handler.php" method="POST">

                        <!-- Email -->
                        <span>Email:</span>
                        <?php if(isset($_SESSION['errors']['loginError'])) { ?>
                        <span class="error-message"><?= $_SESSION['errors']['loginError'] ?></span>
                        <?php } ?>
                        <br />
                        <input type="text" name="login_email" value="<?= $_SESSION['presets']['login_email'] ?>"> <br />

                        <!-- Password -->
                        <span>Password:</span><br />
                        <input type="password" name="password"> <br />

                        <!-- Submit -->
                        <div class="button-center">
                            <input class="button-center" type="submit" value="Sign In">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <footer>
        <p>Chris Houston</p>
    </footer>


    </html>
