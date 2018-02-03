<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    include('calculate-helper.php');
?>


    <!DOCTYPE html>
    <html>


    <head>
        <meta charset="UTF-8">
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <title>Paylocity Demo - Calculate</title>
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
                
                <?php
                if (isset($_GET['employee_id'])) { ?>
                
                <!-- Employee Name -->
                <h1 class="orange-title"><?=$_SESSION['employee']['first_name']?> <?=$_SESSION['employee']['last_name']?></h1>
                <?php if($_SESSION['employee']['starts_with_a'] === true) { ?>  <p class="error-message-center">(10% discount)</p><?php } ?>
                <div class="spacer"></div>
                
                <!-- Dependents Information -->
                <h3 class="medium-black-title">Dependents</h3>
                <?php
                if ($_SESSION['employee']['number_dependents'] > 0) { ?>
                <?php } else { ?>
                <ul class="dependent-list">
                    <li>No dependents.</li>
                </ul>
                <?php } ?>
                <ul class="dependent-list">
                    <?php for($i = 1; $i <= $_SESSION['employee']['number_dependents']; $i++) {
                        $dependent = 'dependent_' . $i ?>
                        <li><?=$_SESSION[$dependent]['first_name']?> <?=$_SESSION[$dependent]['last_name']?> <?php if($_SESSION[$dependent]['first_name'][0] == 'A' || $_SESSION[$dependent]['first_name'][0] == 'a') { ?>
                            <span class="error-message">(10% discount)</span>
                            <?php } ?>
                    </li>
                    <?php } ?>
                </ul>
                
                <!-- Salary -->
                <h3 class="medium-black-title">Salary</h3>
                <ul class="dependent-list">
                    <li>Yearly salary: $52,000.</li>
                    <li>Paycheck (26 a year): $2000 before deductions.</li>
                </ul>
                
                <!-- Costs -->
                <h3 class="medium-black-title">Benefit Costs (before discounts)</h3>
                <ul class="dependent-list">
                    <li>$1000/year for employee.</li>
                    <li><?php 
                        $dependents_cost = 500 * $_SESSION['employee']['number_dependents'];
                    ?><?=$_SESSION['employee']['number_dependents']?> dependent(s) cost: $<?=$dependents_cost?>/year at $500/dependent.
                    </li>
                </ul>
                
                <!-- Discounts -->
                <h3 class="medium-red-title">Discounts</h3>
                <ul class="dependent-list">
                        <?php
                            if($_SESSION['employee']['discount'] === true) {
                                if($_SESSION['employee']['starts_with_a'] === true) { ?>
                                    <li>Employee name starts with A. 10% becomes $900/year. </li>
                            <?php } 
                            if($_SESSION['employee']['number_discounts'] > 0) { ?>
                                <li><?=$_SESSION['employee']['number_discounts']?> dependent(s) first name starts with A. 10% off becomes $450/year for each dependent with qualifying discount. </li>
                            <?php }
                            } else { ?>
                                <li>No discounts.</li>
                            <?php } ?>
                </ul>
                
                <!-- Total Cost -->
                <h3 class="medium-black-title">Total Cost</h3>
                <ul class="dependent-list">
                    <li>Dependent costs: $<?=$_SESSION['employee']['dependent_cost']?>/year.</li>
                    <li>Total deductions: $<?=$_SESSION['employee']['dependent_cost'] + 1000?>/year.</li>
                    <li>Total deductions per paycheck: $<?= round(($_SESSION['employee']['dependent_cost'] + 1000)/26,2,PHP_ROUND_HALF_UP)?>.</li>
                    <li>Paycheck after deductions: $<?= 2000 - round(($_SESSION['employee']['dependent_cost'] + 1000)/26,2,PHP_ROUND_HALF_UP)?>.</li>
                </ul>
                
                <div class="spacer"></div>
                
                <?php } else { ?>
                    <p id="no-employee">To see the benefits calculation, click on an employee on the Employees page!</p>
                <?php } ?>

            </div>
        </div>
    </body>

    <div class="footer">
        <p>Chris Houston</p>
    </div>


    </html>
