
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
    <title>Paylocity Demo - Home</title>
</head>


<div class="header">
    <a href="index.php"><img class="logo" src="images/paylocity_logo.png" alt="Paylocity Coding Challenge Logo" title="Paylocity Home" /></a>
    <ul class="navlinks">
        <li><a href="index.php">Home</a></li>
        <?php if(isset($_SESSION['logged_in'])) { ?>
            <li><a href="employees.php">Employees</a></li>
            <li><a href="calculate.php">Calculate</a></li>
            <li><a href="logout.php">Log Out</a></li>
        <?php } else { ?>
            <li><a href="login.php">Sign In</a></li>
            <li><a href="register.php">Register</a></li>
        <?php } ?>
    </ul>
</div>


<div class="main">
    <div class="container">
        <img class="center-image" src="images/coding_challenge.png">
        <h1 class="orange-title">Paylocity Coding Challenge</h1>
        <div class="coding-challenge-content">
            <p>This website was created as a web application coding challenge for Paylocity. This application will demonstrate the calculation a company makes for paying for their employees' benefits package.
            </p>
            <h4>Requirements:</h4>
            <ul>
                <li>The cost of benefits is $1000/year for each employee.</li>
                <li>Each dependent (children and possibly spouse) incurs a cost of $500/year.</li>
                <li>Anyone whose name starts with 'A' gets a 10% discount, employee or dependent.</li>
            </ul>
            <h4>Assumptions:</h4>
            <ul>
                <li>All employees are paid $2000 per paycheck before deductions.</li>
                <li>There are 26 paychecks in a year.</li>
            </ul>
            <p>To get started, sign into your company account or create one. From there you will be able to add new employees or view existing ones. You can calculate the benefits package on the "Calculate" page.
            </p>
            <h3>Get started!</h3>
        </div>
    </div>
</div>


<div class="footer">
    <p>Chris Houston</p>
</div>


</html>
