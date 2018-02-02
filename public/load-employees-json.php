<?php
require('Dao.php');
session_start();
$company = $_SESSION['company_id'];
$dao = new DAO();
$return = json_encode($dao->getEmployees($company));
echo $return;
?>
