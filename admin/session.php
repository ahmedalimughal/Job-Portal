<?php  

session_start(); 

require_once "../includes/database.php";
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['name'])) {
 header("location: ./");
    exit;
}

// Include config file
 error_reporting(0);

?>