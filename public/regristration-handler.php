<?php
session_start();
//require("Dao.php");

// Create database handle
//$dao = new DAO();

$company_name = $_POST['companyName'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repeat = $_POST['passwordRepeat'];

$errors = array();

// Check the lengths of all variables
if (strlen($company_name) <= 0 || strlen($company_name) > 60) {
    $errors['company_name'] = "Company name must be less than 60 characters!";
}
if (strlen($email) <= 0 || strlen($email) > 60) {
    $errors['email'] = "Email must be less than 60 characters!";
}
if (strlen($password) <= 0 || strlen($password) > 60) {
    $errors['password'] = "Password must be less than 60 characters!";
} 
if (strlen($password_repeat) <= 0 || strlen($password_repeat) > 60) {
    $errors['password_repeat'] = "Password must be less than 60 characters!";
} 


// Check if passwords match
if  ($password != $password_repeat) {
    $errors['passwords_match'] = "Passwords do not match!";
}

// Check for valid email address
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Must be a valid email address!";
}


// If everything is valid and no errors, then try to register the company
if (empty($errors)) {
    print("good");
} else {
    
    // Set new session errors for current regrister attempt
    $_SESSION['errors'] = $errors;
    $_SESSION['presets'] = array('company_name' => htmlspecialchars($company_name),
                                'email' => htmlspecialchars($email));
        header('Location: ' . $_SERVER['HTTP_REFERER']);  
}




?>
