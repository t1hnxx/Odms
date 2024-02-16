<?php
require_once("dbcon.php"); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you have a table named 'faculty_info'
    // and columns 'facultyFname', 'facultyMname', 'facultyLname', 'facultyEmail', 'facultyGender' for the dean's information
    $newRegistrarFname = mysqli_real_escape_string($conn, $_POST['registrarFname']);
    $newRegistrarMname = mysqli_real_escape_string($conn, $_POST['registrarMname']);
    $newRegistrarLname = mysqli_real_escape_string($conn, $_POST['registrarLname']);
    $newRegistrarEmail = mysqli_real_escape_string($conn, $_POST['registrarEmail']);
    $newRegistrarGender = mysqli_real_escape_string($conn, $_POST['registrarGender']);
    
    $sql = "UPDATE faculty_info 
            SET facultyFname = '$newRegistrarFname', facultyMname = '$newRegistrarMname', facultyLname = '$newRegistrarLname', 
                facultyEmail = '$newRegistrarEmail', facultyGender = '$newRegistrarGender'
            WHERE position = 'registrar'";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["success" => "Registrar's information updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update registrar's information"]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}


mysqli_close($conn);
?>
