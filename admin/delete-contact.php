<?php 

require_once "session.php";
error_reporting(0);


$sql = "DELETE FROM `contact-form` WHERE id ='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)){

    header("location: contact-us?delete= The lead in the database has been successfully erased.
");
    //echo "Lora lele";
    
    } 

else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>