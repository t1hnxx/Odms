<?php
require_once("dbcon.php"); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you have a table named 'faculty_info'
    // and columns 'facultyFname', 'facultyMname', 'facultyLname', 'facultyEmail', 'facultyGender' for the dean's information
    $newDeanFname = mysqli_real_escape_string($conn, $_POST['deanFname']);
    $newDeanMname = mysqli_real_escape_string($conn, $_POST['deanMname']);
    $newDeanLname = mysqli_real_escape_string($conn, $_POST['deanLname']);
    $newDeanEmail = mysqli_real_escape_string($conn, $_POST['deanEmail']);
    $newDeanGender = mysqli_real_escape_string($conn, $_POST['deanGender']);
    
    $sql = "UPDATE faculty_info 
            SET facultyFname = '$newDeanFname', facultyMname = '$newDeanMname', facultyLname = '$newDeanLname', 
                facultyEmail = '$newDeanEmail', facultyGender = '$newDeanGender'
            WHERE position = 'dean'";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["success" => "Dean's information updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update dean's information"]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}


mysqli_close($conn);
?>
