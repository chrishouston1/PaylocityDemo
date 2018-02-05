<?php
session_start();
require("Dao.php");

// Create database handle
$dao = new DAO();

$employee_id = $_GET['employee_id'];

// Get employee information
$employee = $dao->getEmployee($employee_id);
$_SESSION['employee']['first_name'] = $employee['first_name'];
$_SESSION['employee']['last_name'] = $employee['last_name'];
$_SESSION['employee']['number_dependents'] = $employee['number_dependents'];

$num_dependents = $employee['number_dependents'];
$num_discounts = 0;
$num_no_discounts = 0;

// Check if employee name starts with A
if ($employee['first_name'][0] == 'A' || $employee['first_name'][0] == 'a') {
    $_SESSION['employee']['starts_with_a'] = true;
} else {
    $_SESSION['employee']['starts_with_a'] = false;
}

// Add all dependents
if ($num_dependents != 0) {
    for($i = 1; $i <= $num_dependents; $i++) {

        $dependents = $dao->getDependents($employee_id);
        $num = 'dependent_' . $i;
        
        // Check if first name starts with A
        if ($dependents[$i-1]['first_name'][0] == 'A' || $dependents[$i-1]['first_name'][0] == 'a') {
            $num_discounts += 1;
        } else {
            $num_no_discounts += 1;
        }
        
        // Add dependent to session 
        $_SESSION[$num]['first_name'] = $dependents[$i-1]['first_name'];
        $_SESSION[$num]['last_name'] = $dependents[$i-1]['last_name'];
    }
}

// Add number of discounts to session
$_SESSION['employee']['number_discounts'] = $num_discounts;
$_SESSION['employee']['number_no_discounts'] = $num_no_discounts;

// Check if there are any discounts at all
if($num_discounts == 0 && $_SESSION['employee']['starts_with_a'] == false){
    $_SESSION['employee']['discount'] = false;
} else {
    $_SESSION['employee']['discount'] = true;
}

// Calculate dependent costs
$total_cost = ($num_discounts * 450) + ($num_no_discounts * 500);
$_SESSION['employee']['dependent_cost'] = $total_cost;

?>
