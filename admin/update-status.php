<?php
 include 'header-links.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data and sanitize inputs
    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];

    // SQL query to insert form data into the database
    $sql = "UPDATE apply_job SET `status`='$status' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
         header("location: applications?status= Changes to the application status have been made successfully.");
        // echo "<script>alert('Hello! I am an alert box!');</script>";
    } else {
        // If there's an error in the SQL query
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>