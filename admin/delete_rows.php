<?php
require 'dbcon.php';
// Connect to database

// Get checked row IDs from AJAX request


if(isset($_POST['ids'])){
$ids = $_POST['ids'];
$placeholders = implode(',', $ids);
echo $ids;
}
else{
    echo "<div class='alert alert-warning alert-dismissible fade show m-2' role='alert'><i class='bi bi-exclamation-diamond'></i> &nbsp&nbsp <b>EMPTY!</b> Please select a row to delete account.
    <button type='button' class='btn-close float-end' data-bs-dismiss='alert' aria-label='Close'></button></div>";
}


// Build DELETE query with placeholders for IDs
/*$placeholders = implode(',', array_fill(0, count($ids), '?'));
$query = "DELETE FROM your_table WHERE id IN ($placeholders)";

// Prepare and execute query
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'sss', ...$ids); // Adjust for data types
mysqli_stmt_execute($stmt);*

// Send response back to AJAX
echo "Rows deleted successfully!"; // Or handle errors appropriately*/
?>
