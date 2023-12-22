<?php 

require_once "session.php";
error_reporting(0);


$sql = "DELETE FROM `staff_request` WHERE id ='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)){

    header("location: staff-request?delete=Request has been Deleted successfully");
    //echo "Lora lele";
    
    } 

else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>