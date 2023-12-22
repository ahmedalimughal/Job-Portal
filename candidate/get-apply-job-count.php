<?php 


// Assuming you have a database connection established
$db = new PDO("mysql:host=localhost;dbname=montreal", "root", "");

// Using prepared statements to prevent SQL injection
$sql = "SELECT COUNT(*) AS row_count FROM `apply_job` WHERE candidate_id = :rc_candidates";

$stmt = $db->prepare($sql);
$stmt->bindParam(':rc_candidates', $_SESSION['rc_candidates']);
$stmt->execute();

$row_count = $stmt->fetchColumn();

//echo "Number of rows: " . $row_count;
 ?>
