<?php
require_once("dbcon.php"); // Include your database connection file

// Assuming you have a table named 'faculty_info'
// and columns 'facultyFname', 'facultyMname', 'facultyLname', 'facultyEmail', 'facultyGender' for the dean's information
$sql = "SELECT * FROM faculty_info WHERE position = 'dean'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row); // Send dean's information as JSON
} else {
    echo json_encode(["error" => "Failed to fetch dean information"]);
}

mysqli_close($conn);
?>
