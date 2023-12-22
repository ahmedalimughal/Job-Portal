<?php 

require_once "session.php";


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {



$user_id = $_SESSION['rc_candidates'];
$company_name = $_POST['company_name'];
$designation = $_POST['designation'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$your_roles = $_POST['your_roles'];
$currently_working = $_POST['currently_working'];
$location = $_POST['location'];


$sql = "INSERT INTO user_experience (`user_id`, `company_name`, `designation`, `start_date`, `end_date`, `your_roles`, `location`, `currently_working`) VALUES ('$user_id','$company_name','$designation','$start_date','$end_date','$your_roles','$location','$currently_working')";

    if (mysqli_query($conn, $sql)) 

    {
        // Data inserted successfully
         header("location: candidate-experience?sucessfull= Your Experience has been added successfully.");
    	//echo "Data inserted successfully";
    } 

    else 

    {
        // If there's an error in the SQL query
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>