<?php
include("database.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['form'])) {
    // Retrieve form data and sanitize inputs
    $email = $_REQUEST['email'];
    $country = $_REQUEST['country'];
    $ipAddress = $_REQUEST['ipAddress'];

    // SQL query to insert form data into the database
    $sql = "INSERT INTO subscribers ( `email`, `country`, `ipAddress`) VALUES ( '$email', '$country', '$ipAddress')";

    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
         //header("location: all-jobs?sucessfull= You hava Sucessfully Applied on Job");
         echo "<script>window.location='../thank-you.php?cv=Kindly Upload a PDF Format Resume'</script>";
    } else {
        // If there's an error in the SQL query
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
