<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    // Unset the presets 
    unset($_SESSION['presets']);
?>


    <!DOCTYPE html>
    <html>


    <head>
        <meta charset="UTF-8">
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <title>Paylocity Demo - Employees</title>
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

            </div>
        </div>
    </body>

    <div class="footer">
        <p>Coding challenge by Chris Houston for Paylocity</p>
    </div>


    </html>
