<?php
    function isUserLoggedIn() {
        if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] === true)){
            return true;
        }else{
            return false;
        }
    }
    function logOut(){
         // Unset all the variables in the session
        session_unset();
        // Make sure a new session ID is used on next login
        session_regenerate_id(true);
        // Destroy the session data on the server
        session_destroy();
    }
?>