<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    // Unset the presets so it does not show old presets if user adds new employee/dependent
    unset($_SESSION['presets']);
    unset($_SESSION['errors']);
?>


    <!DOCTYPE html>
    <html>


    <head>
        <meta charset="UTF-8">
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
        <script src="js/load-employees.js" type="text/javascript"></script>

        <title>Paylocity Demo - Employees</title>
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
                <h1 class="orange-title"><?=$_SESSION['company_name']?> Employees</h1>
                
                <!-- Table of employees loads from AJAX load-employees.js -->
                <div class="employees-container">
                </div>
                <div id="new-employee">
                    <a href="new-employee.php"><img src="images/new_employee.png" alt="Add Employee" title="Add Employee" /></a><p id="new-employee-text"><a href="new-employee.php">Add Employee</a></p>
                </div>
            </div>
        </div>
    </body>

    <footer>
        <p>Chris Houston</p>
    </footer>


    </html>
