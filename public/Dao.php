<?php
require_once("../database/config.php");
date_default_timezone_set('America/Boise');
class Dao
{
    /** Creates and returns a PDO connection using the database connection url specificed in the CLEARDB_DATABASE_URL enviorment variable. */
    private function getConnection(){
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        
        $host = $url["host"];
        $db = substr($url["path"],1);
        $user = $url["user"];
        $pass = $url["pass"];
        
        $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
        
        /* Turn on exceptions for debugging. Comment this out for production or make sure to use try-catch statements */
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conn;
    }
    
    /* Returns the databse connection status string */
    public function getConnectionStatus() {
        $conn = $this->getConnection();
        return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
    }
    
    
    /* Adds a new company into the database */
    public function addCompany($email, $password){
        $conn = $this->getConnection();
        // Hash password
        $digest = password_hash($password, PASSWORD_DEFAULT);
        if(!$digest){
            throw new Exception("Could not hash password!");
        }
        
        $query = "INSERT INTO company VALUES ('', :company_name, :email, :password)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':company_name', $company_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $digest);
        
        // Return if the account was created or not
        try {
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }
    
    /* Validate the user's email and password. Then return an array of company info */
    public function validateUser($email, $password){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT company_name, company_email, password FROM company WHERE company_email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();
        $digest = $user['password'];
        $isValid = password_verify($password, $digest);
        
        // If password is correct, return a user array
        if($isValid == TRUE){
            return array('company_name' => $user['company_name']);
        }
 
    }
}