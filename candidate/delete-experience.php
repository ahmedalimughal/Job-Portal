<?php 

require_once "session.php";
error_reporting(0);


$sql = "DELETE FROM `user_experience` WHERE id ='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)){

    header("location: candidate-experience?delete=Your experience has been Deleted successfully");
    //echo "Lora lele";
    
    } 

else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>