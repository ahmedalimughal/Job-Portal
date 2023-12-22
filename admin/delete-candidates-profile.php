<?php 

require_once "session.php";
error_reporting(0);


$sql = "DELETE FROM `candidates` WHERE id ='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)){

    header("location: all-candidates?delete=The candidate's profile has been successfully removed.");
    //echo "Lora lele";
    
    } 

else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>