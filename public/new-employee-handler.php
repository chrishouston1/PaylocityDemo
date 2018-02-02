<?php
session_start();
require("Dao.php");

// Create database handle
$dao = new DAO();

// Set all variables from the form
$first_name = $_POST['employee_first_name'];
$last_name = $_POST['employee_last_name'];
$num_dependents = $_POST['employee_number_dependents'];


// Holds all the errors that may happen
$errors = array();

// Check the lengths of all variables
if(strlen($first_name) <= 0 || strlen($first_name) >= 60) {
    $errors['first_name_error'] = "First name must be less than 60 characters!";
} 
if(strlen($last_name) <= 0 || strlen($last_name) >= 60) {
    $errors['last_name_error'] = "Last name must be less than 60 characters!";
}
if($num_dependents < 0 || $num_dependents >= 10) {
    $errors['num_dependents_error'] = "You must enter a number from 0-10!";
} 
// If no errors, go to the next page of the form
if(empty($errors)){
    
    $dao->addEmployee($first_name, $last_name, $_SESSION['company_id']);
    $employee_ID = $dao->getEmployeeID($first_name, $last_name, $_SESSION['company_id']);
    $_SESSION['employee_id'] = $employee_ID['employee_id'];
    $_SESSION['employee_first_name'] = $first_name;
    $_SESSION['employee_last_name'] = $last_name;
    $_SESSION['employee_num_dependents'] = $num_dependents;
    
    // Add employee if there are no dependents
    if ($num_dependents == 0) {
        header('Location: employees.php');
    } else {
        header('Location: new-dependents.php');
    }
} else {
    $_SESSION['errors'] = $errors;
    $_SESSION['presets'] = array('first_name' => htmlspecialchars($first_name),
                                'last_name' => htmlspecialchars($last_name),
                                'num_dependents' => htmlspecialchars($num_dependents));
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
}

?>