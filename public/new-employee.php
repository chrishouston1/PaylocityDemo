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
        <title>Paylocity Demo - Add Employee</title>
    </head>


    <div class="header">
        <a href="index.php"><img class="logo" src="images/paylocity_logo.png" alt="Paylocity Coding Challenge Logo" title="Paylocity Home" /></a>
       <ul class="navlinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="employees.php">Employees</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>

    <body>
        <div class="main">
            <div class="container">
                <h1 class="orange-title">New Employee</h1>

                <!-- Sign In Form -->
                <div class="formContainer">
                    <form class="form" action="new-employee-handler.php" method="POST">

                        <!-- First Last -->
                        <span>First name:</span>
                        <?php if(isset($_SESSION['errors']['first_name_error'])) { ?>
                        <span class="error-message"><?= $_SESSION['errors']['first_name_error'] ?></span>
                        <?php } ?>
                        <br />
                        <input type="text" name="employee_first_name" value="<?= $_SESSION['presets']['first_name'] ?>">
                        <br />
                        
                        <!-- Last Name -->
                        <span>Last name:</span>
                        <?php if(isset($_SESSION['errors']['last_name_error'])) { ?>
                        <span class="error-message"><?= $_SESSION['errors']['last_name_error'] ?></span>
                        <?php } ?>
                        <br />
                        <input type="text" name="employee_last_name" value="<?= $_SESSION['presets']['last_name'] ?>">
                        <br />
                        
                        <!-- Number of Dependents -->
                        <span>Number of dependents:</span><?php if(isset($_SESSION['errors']['num_dependents_error'])) { ?>
                        <span class="error-message"><?= $_SESSION['errors']['num_dependents_error'] ?></span>
                        <?php } ?>
                        <br />
                        <input type="number" name="employee_number_dependents" value="<?= $_SESSION['presets']['num_dependents'] ?>"> <br />

                        <!-- Submit -->
                        <div class="button-center">
                            <input class="button-center" type="submit" value="Add Employee">
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
