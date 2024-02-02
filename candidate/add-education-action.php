<?php 

require_once "session.php";


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

$user_id = $_SESSION['rc_candidates'];
$title = $_POST['title'];
$degree = $_POST['degree'];
$school = $_POST['school'];
$year = $_POST['year'];
$marks = $_POST['marks'];
$location = $_POST['location'];



$sql = "INSERT INTO user_education 
(`user_id`, `title`, `last_degree`, `marks`, `passing_year`, `school-universtity`, `location`) 
VALUES 
('$user_id','$title ','$degree','$marks','$year','$school', '$location')";

    if (mysqli_query($conn, $sql)) 

    {
        // Data inserted successfully here
         header("location: candidate-education?sucessfull= Your education has been added successfully.");
    	//echo "Data inserted successfully";
    } 

    else 

    {
        // If there's an error in the SQL query here
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
