<?php

// Retrieves employees from dao and returns in json format for load-employees.js 

require('Dao.php');
session_start();
$company = $_SESSION['company_id'];
$dao = new DAO();
$return = json_encode($dao->getEmployees($company));
echo $return;

?>
