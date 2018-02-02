<?php
session_start();
require("Dao.php");

// Create database handle
$dao = new DAO();
$errors = array();

// Set all variables from the form
$num_dependents = $_SESSION['employee_num_dependents'];

// Loop through and create variables for each dependent. Check if any of them are blank
for($i = 1; $i <= $num_dependents; $i++) {
    $first_name = 'dependent_first_name_' . $i;
    $last_name = 'dependent_last_name_' . $i;
    
    // Check if they are left empty
    if (empty($_POST[$first_name])) {
        $error_first_name = 'dependent_first_name_' . $i;
        $errors[$error_first_name] = "Cannot be left blank!";
    }
    if (empty($_POST[$last_name])) {
        $error_last_name = 'dependent_last_name_' . $i;
        $errors[$error_last_name] = "Cannot be left blank!";
    }
    
    // Add to presets
    $_SESSION['presets'][$first_name] = $_POST[$first_name];
    $_SESSION['presets'][$last_name] = $_POST[$last_name];

    
}



if(empty($errors)) {
    print("good");
} else {
    $_SESSION['errors'] = $errors;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}





?>
