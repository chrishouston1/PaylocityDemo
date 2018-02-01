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
        <li><a href="employees.php">Employees</a></li>
        <li><a href="calculate.php">Calculate</a></li>
    </ul>
</div>


<div class="main">
    <div class="container">
        <h1 class="orange-title">Register your company now!</h1>
        <div class="registerForm">
            <form class="register" action="regristration-handler.php" method="POST">
                <span>Company name:</span><br />
                <input type="text" name="companyName" required> <br />
                <span>Email address:</span><br />
                <input type="text" name="email" required> <br />
                <span>Password:</span><br />
                <input type="text" name="password" required> <br />
                <span>Repeat password:</span><br />
                <input type="text" name="password" required> <br /> <br /><br />
                <input type="submit" value="Register">
            </form>
        </div>
    </div>
</div>


<div class="footer">
    <p>Chris Houston</p>
</div>


</html>
