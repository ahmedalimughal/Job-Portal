<?php 

require_once "session.php";
error_reporting(0);



$sql = "DELETE FROM `user_education` WHERE id ='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)){

    header("location: candidate-education?delete=Your education has been Deleted successfully");
    //echo "Lora lele";
    
    } 

else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>