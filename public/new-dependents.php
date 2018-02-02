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
        <title>Paylocity Demo - Add Dependent(s)</title>
    </head>


    <div class="header">
        <a href="index.php"><img class="logo" src="images/paylocity_logo.png" alt="Paylocity Coding Challenge Logo" title="Paylocity Home" /></a>
        <ul class="navlinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="employees.php">Employees</a></li>
            <li><a href="calculate.php">Calculate</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>

    <body>
        <div class="main">
            <div class="container">
                <h1 class="orange-title">
                    <?= $_SESSION['employee_first_name'] ?>
                        <?= $_SESSION['employee_last_name'] ?> - Add Dependent(s)</h1>

                <!-- Sign In Form -->
                <div class="formContainer">
                    <form class="form" action="new-dependents-handler.php" method="POST">

                        <!-- Create X times -->
                        <?php
                            for($i = 1; $i <=$_SESSION['employee_num_dependents']; $i++) {
                                $session_first_name = 'dependent_first_name_' . $i;
                                $session_last_name = 'dependent_last_name_' . $i;
                        ?>
                            <h3 class="dependent-number">Dependent
                                <?=$i?>
                            </h3>
                        
                            <!-- First Last -->
                            <span>First name:</span>
                            <?php if(isset($_SESSION['errors'][$session_first_name])) { ?>
                            <span class="error-message"><?= $_SESSION['errors'][$session_first_name] ?></span>
                            <?php } ?>
                            <br />
                            <input type="text" name="dependent_first_name_<?=$i?>" value="<?= $_SESSION['presets'][$session_first_name] ?>">
                            <br />

                            <!-- Last Name -->
                            <span>Last name:</span>
                            <?php if(isset($_SESSION['errors'][$session_last_name])) { ?>
                            <span class="error-message"><?= $_SESSION['errors'][$session_last_name] ?></span>
                            <?php } ?>
                            <br />
                            <input type="text" name="dependent_last_name_<?=$i?>" value="<?= $_SESSION['presets'][$session_last_name] ?>">
                            <br />

                            <?php
                            }
                        ?>

                                <!-- Submit -->
                                <div class="button-center">
                                    <input class="button-center" type="submit" value="Finish">
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
