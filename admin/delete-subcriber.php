<?php 

require_once "session.php";
error_reporting(0);


$sql = "DELETE FROM `subscribers` WHERE id ='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)){

    header("location: subscribers?delete= Subscriber has been effectively deleted.");
    //echo "Lora lele";
    
    } 

else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>