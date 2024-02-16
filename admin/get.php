<?php
// get.php

// Connect to the database
 $conn = mysqli_connect("your_hostname", "your_username", "your_password", "odms");

// Get filter values from POST request
$documentType = isset($_POST['request']) ? $_POST['request'] : null;
$startDate = isset($_POST['start_date']) ? $_POST['start_date'] : null;
$endDate = isset($_POST['end_date']) ? $_POST['end_date'] : null;

// Build SQL query based on filter values
$query = "SELECT * FROM users_documents WHERE 1"; // Basic query

if ($documentType) {
    $query .= " AND documentType = '$documentType'";
}

if ($startDate && $endDate) {
    $query .= " AND documentDate BETWEEN '$startDate' AND '$endDate'";
}

// Execute query and fetch results
$result = mysqli_query($conn, $query);

// Generate table HTML with filtered results
// ... (similar to your existing code for generating the table)
?>
