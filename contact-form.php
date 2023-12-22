<?php 

include("includes/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $ipAddress = $_POST["ipAddress"];
    $country = $_POST['country'];

    // Validate the data if needed

    // Insert data into the database
    $sql = "INSERT INTO  `contact-form` (name, email, message , ipAddress , country) VALUES 
    ('$name', '$email', '$message' , '$ipAddress' , '$country')";

    if (mysqli_query($conn, $sql)) {
        //echo "Record inserted successfully";
        header("location: contact-us?successful=Your%20Message%20Has%20Been%20Received");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection if needed
    mysqli_close($conn);
}
?>
