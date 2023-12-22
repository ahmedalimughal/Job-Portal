<?php

include("../includes/database.php");

// Check connection


if (isset($_POST['submit'])) {
    // Get the form data
    $id = $_POST['id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $about_you = $_POST['about_you'];

    // Check if a new profile image is uploaded
    if ($_FILES['profile']['size'] > 0) {
        // Process and save the image file
        $profile_image = $_FILES['profile']['name'];
        $profile_image_temp = $_FILES['profile']['tmp_name'];
        move_uploaded_file($profile_image_temp, "../user-profiles/" . $profile_image);

        // Update the profile image in the database
        $update_image_query = "UPDATE candidates SET profile = '$profile_image' WHERE id = $id";
        $conn->query($update_image_query);
    }

    // Check if a new resume is uploaded
    if ($_FILES['resume']['size'] > 0) {
        // Process and save the resume file
        $resume_file = $_FILES['resume']['name'];
        $resume_temp = $_FILES['resume']['tmp_name'];
        move_uploaded_file($resume_temp, "../resumes/" . $resume_file);

        // Update the resume file in the database
        $update_resume_query = "UPDATE candidates SET CV = '$resume_file' WHERE id = $id";
        $conn->query($update_resume_query);
    }

    // Update other fields in the database
    $update_query = "UPDATE candidates SET 
                    first_name = '$f_name',
                    last_name = '$l_name',
                    title = '$title',
                    location = '$location',
                    phone = '$phone',
                    about_you = '$about_you'
                    WHERE id = $id";

    if ($conn->query($update_query) === TRUE) {
        //echo "Record updated successfully";
        header("location: candidate-profile?sucessfull= Your Profile has been Updated successfully.");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
