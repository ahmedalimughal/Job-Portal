<?php
// Assuming you have a database connection established
$db = new PDO("mysql:host=localhost;dbname=montreal", "root", "");

// Using prepared statements to prevent SQL injection

// Count for apply_job table
$sql = "SELECT COUNT(*) AS row_count FROM `apply_job`";
$stmt = $db->prepare($sql);
$stmt->execute();
$applyJobRowCount = $stmt->fetchColumn();

// Count for candidates table
$sql = "SELECT COUNT(*) AS row_count FROM `candidates`";
$stmt = $db->prepare($sql);
$stmt->execute();
$candidatesRowCount = $stmt->fetchColumn();

// Count for data table
$sql = "SELECT COUNT(*) AS row_count FROM `data`";
$stmt = $db->prepare($sql);
$stmt->execute();
$dataRowCount = $stmt->fetchColumn();

// Count for staff_request table
$sql = "SELECT COUNT(*) AS row_count FROM `staff_request`";
$stmt = $db->prepare($sql);
$stmt->execute();
$staffRequestRowCount = $stmt->fetchColumn();

// Count for subscribers table
$sql = "SELECT COUNT(*) AS row_count FROM `subscribers`";
$stmt = $db->prepare($sql);
$stmt->execute();
$subscribersRowCount = $stmt->fetchColumn();


$sql = "SELECT COUNT(*) AS row_count FROM `contact-form`";
$stmt = $db->prepare($sql);
$stmt->execute();
$contactRowCount = $stmt->fetchColumn();

// Display individual row counts
//echo "apply_job table has $applyJobRowCount rows.<br>";
//echo "candidates table has $candidatesRowCount rows.<br>";
//echo "data table has $dataRowCount rows.<br>";
//echo "staff_request table has $staffRequestRowCount rows.<br>";
//echo "subscribers table has $subscribersRowCount rows.<br>";
?>
