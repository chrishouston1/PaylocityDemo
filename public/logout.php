<?php
    require_once('session-helper.php');
    session_start();
    
    logOut();

    // Redirect back to home page
    header("Location: index.php");
    
?>