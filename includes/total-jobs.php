<?php 
// Replace these with your actual database credentials
$db_host = 'localhost';
$db_name = 'montreal';
$db_user = 'root';
$db_password = '';

try {
    // Connect to the database using PDO
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    
    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query to count the rows in the contact-forms table
    $sql = "SELECT COUNT(*) AS row_count FROM `data`";
    
    // Execute the query
    $stmt = $pdo->query($sql);
    
    // Fetch the result 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Get the row count value from the result
    $row_count = $row['row_count'];
    
    // Output the result
    //echo "The number of rows in the 'contact-forms' table is: " . $row_count;
} catch (PDOException $e) {
   // echo "Error connecting to the database: " . $e->getMessage();
}
 ?>