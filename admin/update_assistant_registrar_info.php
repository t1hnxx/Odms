<?php
require_once("dbcon.php"); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you have a table named 'faculty_info'
    // and columns 'facultyFname', 'facultyMname', 'facultyLname', 'facultyEmail', 'facultyGender' for the dean's information
    $newCRegistrarFname = mysqli_real_escape_string($conn, $_POST['assistant_registrarFname']);
    $newCRegistrarMname = mysqli_real_escape_string($conn, $_POST['assistant_registrarMname']);
    $newCRegistrarLname = mysqli_real_escape_string($conn, $_POST['assistant_registrarLname']);
    $newCRegistrarEmail = mysqli_real_escape_string($conn, $_POST['assistant_registrarEmail']);
    $newCRegistrarGender = mysqli_real_escape_string($conn, $_POST['assistant_registrarGender']);
    
    $sql = "UPDATE faculty_info 
            SET facultyFname = '$newCRegistrarFname', facultyMname = '$newCRegistrarMname', facultyLname = '$newCRegistrarLname', 
                facultyEmail = '$newCRegistrarEmail', facultyGender = '$newCRegistrarGender'
            WHERE position = 'assistant_registrar'";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["success" => "College Registrar's information updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update assistant_registrar's information"]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}


mysqli_close($conn);
?>
