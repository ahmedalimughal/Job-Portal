<?php 

require_once "session.php";
error_reporting(0);


$sql = "DELETE FROM `apply_job` WHERE id ='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)){

    header("location: applications?delete= The job application was effectively deleted.");
    
    } 

else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>