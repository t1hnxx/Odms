<?php
require "dbcon.php";

$id = $_GET['id'];
$rowmo = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM document WHERE id = '$id'"));
$ID = $rowmo['id'];
$submittedTo = "None";
// Update the record (assuming you have the ID of the record to update)
$query = "UPDATE document SET submittedTo = ? WHERE id = ?"; // Replace with your actual table and column names
$stmt = $conn->prepare($query);
$stmt->bind_param("si",$submittedTo, $ID); // Replace $recordId with the actual ID
$stmt->execute();

echo "success";
?>