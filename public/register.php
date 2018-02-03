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
        <title>Paylocity Demo - Register</title>
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
                <h1 class="orange-title">Register your company now!</h1>

                <!-- Register Form -->
                <div class="formContainer">
                    <form class="form" action="regristration-handler.php" method="POST">

                        <!-- Company Name -->
                        <span>Company name:</span>
                        <?php if(isset($_SESSION['errors']['company_name'])) { ?>
                        <span class="error-message"><?= $_SESSION['errors']['company_name'] ?></span>
                        <?php } ?>
                        <br />
                        <input type="text" name="companyName" value="<?= $_SESSION['presets']['company_name'] ?>"> <br />

                        <!-- Email -->
                        <span>Email:</span>
                        <?php if(isset($_SESSION['errors']['email'])) { ?>
                        <span class="error-message"><?= $_SESSION['errors']['email'] ?></span>
                        <?php } ?>
                        <br />
                        <input type="text" name="email" value="<?= $_SESSION['presets']['email'] ?>"> <br />

                        <!-- Password -->
                        <span>Password:</span>
                        <?php if(isset($_SESSION['errors']['password'])) { ?>
                        <span class="error-message"><?= $_SESSION['errors']['password'] ?></span>
                        <?php } ?>
                        <?php if(isset($_SESSION['errors']['passwords_match'])) { ?>
                        <span class="error-message"><?= $_SESSION['errors']['passwords_match'] ?></span>
                        <?php } ?>
                        <br />
                        <input type="password" name="password"> <br />

                        <!-- Password Repeat -->
                        <span>Confirm password:</span>
                        <?php if(isset($_SESSION['errors']['password_repeat'])) { ?>
                        <span class="error-message"><?= $_SESSION['errors']['password_repeat'] ?></span>
                        <?php } ?>
                        <?php if(isset($_SESSION['errors']['passwords_match'])) { ?>
                        <span class="error-message"><?= $_SESSION['errors']['passwords_match'] ?></span>
                        <?php } ?>
                        <br />
                        <input type="password" name="passwordRepeat"> <br /> <br /><br />

                        <!-- Submit -->
                        <div class="button-center">
                            <input type="submit" value="Register">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>

    <div class="footer">
        <p>Chris Houston</p>
    </div>


    </html>
