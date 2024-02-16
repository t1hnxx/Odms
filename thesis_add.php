<?php
require 'class/login_connect.php';
if(isset($_SESSION["facultyID"])){
    $facultyID = $_SESSION["facultyID"];
		$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM faculty_info WHERE facultyID = '$facultyID'"));
}
elseif(isset($_SESSION["studentID"])){
	$studentID = $_SESSION["studentID"];
	$user1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_info WHERE studentID = '$studentID'"));
}
else{
	header("Location: student_login.php");
  }

  function generate_unique_ID() {
    $prefix = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2);
    $number = substr(str_shuffle('0123456789'), 0, 4);
    return "TCM" . '-' . date("ymd") . '-' . $number;
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


if(isset($_POST['documentName']) || isset($_POST['documentOwner'])){


// Retrieve student number and document name
$student = $user1['studentNum'];
$documentName = filter_var($_POST['documentName']);
$documentOwner = implode(",", array_map('filter_var', $_POST['documentOwner']));


if(empty($documentName) ||  empty($documentOwner)){
    echo 'Please fill out all the fields';
}else{
// Generate unique document ID
$documentID = generate_unique_ID();

// Data to insert into tables
$data = [
    'documentID' => $documentID,
    'documentName' => $documentName,
    'documentType' => 'thesis',
    'createdby' => $student,
    'submittedTo' => 'None',
    'documentOwner' => $documentOwner,
    'documentStatus' => 'created',
    'remarks' => 'No comment/remarks yet'
];

// Insert data into tables
if (insert_data('document', $data) && insert_data('document_transaction', $data)) {
    // Explode documentOwner into individual student numbers
    $studentNumbers = explode(",", $documentOwner);

    // Update documents_owned for each student
    foreach ($studentNumbers as $studentNum) {
        $updateQuery = "UPDATE student_info SET documents_owned = documents_owned + 1 WHERE studentNum = '$studentNum'";
        if (!mysqli_query($conn, $updateQuery)) {
            echo "Error updating document count for student $studentNum: " . mysqli_error($conn);
        }
    }

    echo "Document Created Successfully!";
} else {
    echo "Document cannot be created: " . mysqli_error($conn);
}
}

}
?>