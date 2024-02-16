<?php
require 'class/login_connect.php';
require "dbcon.php";
if(isset($_SESSION["facultyID"])){
    $facultyID = $_SESSION["facultyID"];
		$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM faculty_info WHERE facultyID = '$facultyID'"));
}
elseif(isset($_SESSION["studentID"])){
	$studentID = $_SESSION["studentID"];
	$user1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_info WHERE studentID = '$studentID'"));
}
else{
	header("Location: user_login.php");
  }


// Function to generate a unique document ID
function generate_unique_ID() {
    $prefix = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2);
    $number = substr(str_shuffle('0123456789'), 0, 4);
    return "OJT" . '-' . date("ymd") . '-' . $number;
}

// Function to insert data into a table
function insert_data($table, $data) {
    global $conn;  // Assuming $conn is the database connection

    $fields = implode(',', array_keys($data));
    $placeholders = implode(',', array_fill(0, count($data), '?'));
    $stmt = $conn->prepare("INSERT INTO $table ($fields) VALUES ($placeholders)");
    $stmt->bind_param(str_repeat('s', count($data)), ...array_values($data));
    return $stmt->execute();
}

// Retrieve student number
$student = $user1['studentNum'];

// Generate unique document ID
$documentID = generate_unique_ID();

// Data to insert into tables
$data = [
    'documentID' => $documentID,
    'documentName' => "OJT Journal",
    'documentType' => 'journal',
    'createdby' => $student,
    'submittedTo' => 'None',
    'documentOwner' => $student,
    'documentStatus' => 'created',
    'remarks' => 'No comment/remarks yet'
];

// Insert data into tables
if (insert_data('document', $data)) {
    if (insert_data('document_transaction', $data)) {
       // Use the correct variable for the student number
            $updateQuery = "UPDATE student_info SET documents_owned = documents_owned + 1 WHERE studentNum = '$student'";

        if (mysqli_query($conn, $updateQuery)) {
            echo "Document Created Successfully";
            var_dump($student);
        } else {
            echo "Document cannot be created: Update failed. " . mysqli_error($conn);
        }
    } else {
        echo "Document cannot be created: Transaction data insert failed. " . mysqli_error($conn);
    }
} else {
    echo "Document cannot be created: Document data insert failed. " . mysqli_error($conn);
}


?>
