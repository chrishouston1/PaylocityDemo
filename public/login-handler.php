<?php
session_start();
require("Dao.php");

// Set all variables from the form
$email = $_POST['login_email'];
$password = $_POST['password'];

// Holds all the errors that may happen
$errors = array();

// Check the lengths of all variables and valid email
if(strlen($password) <= 0 || strlen($password) >= 60) {
    $errors['loginError'] = "You must enter in a password!";
} 

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['loginError'] = "Enter a valid email address.";
}


// If all valid, redirect the user to the welcome page, else redirect back to the form page
if(empty($errors)){
    try{
        $dao = new DAO();
        $company = $dao->validateUser($email,$password);
                
        // Verify the user information with the DB
        if($company){
            $_SESSION['logged_in'] = true;
            session_regenerate_id(true);
            $_SESSION['company_name'] = $company['company_name'];
            header('Location: employees.php');
            
        }else{
            $errors['loginError'] = "Invalid username or password.";
            $_SESSION['errors'] = $errors;
            $_SESSION['presets'] = array('login_email' => htmlspecialchars($email),
                                         'password' => htmlspecialchars($password));
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        
    } catch(Exception $e){
            $errors['loginError'] = "Something went wrong!";
            $_SESSION['errors'] = $errors;
            $_SESSION['presets'] = array('login_email' => htmlspecialchars($email));
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
} else {
    $_SESSION['errors'] = $errors;
    $_SESSION['presets'] = array('login_email' => htmlspecialchars($email));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>