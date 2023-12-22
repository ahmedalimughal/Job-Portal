<?php
include("includes/database.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data and sanitize inputs
    $f_name = isset($_POST['f_name']) ? htmlspecialchars($_POST['f_name']) : '';
    $l_name = isset($_POST['l_name']) ? htmlspecialchars($_POST['l_name']) : '';
    $p_number = isset($_POST['p_number']) ? htmlspecialchars($_POST['p_number']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $cover = isset($_POST['cover']) ? htmlspecialchars($_POST['cover']) : '';
    $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
    $salary = isset($_POST['salary']) ? htmlspecialchars($_POST['salary']) : '';
    $location = isset($_POST['location']) ? htmlspecialchars($_POST['location']) : '';
    $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
    $category = isset($_POST['category']) ? htmlspecialchars($_POST['category']) : '';
    $c_id = isset($_POST['c_id']) ? htmlspecialchars($_POST['c_id']) : '';


    // File Upload
    $file_name = $_FILES['resume']['name'];
    $file_tmp = $_FILES['resume']['tmp_name'];
    $upload_directory = 'resumes/'; // Specify your upload directory
    $file_path = $upload_directory . $file_name;

    // Move the uploaded file to the specified directory
    move_uploaded_file($file_tmp, $file_path);

    // SQL query to insert form data into the database
    $sql = "INSERT INTO apply_job 
    (`candidate_id`, `Job_id`, `title`, `salary`, `location`, `first_name`, `last_name`, `phone`, `email`, `ex1`,`cover_des`, `category`) 
            VALUES ('$c_id', '$id', '$title', '$salary', '$location', '$f_name', '$l_name' , '$p_number' , '$email' , '$file_path' , '$cover', '$category' )";

    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
         header("location: all-jobs?sucessfull= You have applied for a job successfully.");
    } else {
        // If there's an error in the SQL query
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
