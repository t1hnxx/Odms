
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
	header("Location: user_login.php");
  }

function generate_unique_ID() {
    $prefix = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2);
    $number = substr(str_shuffle('0123456789'), 0, 4);
    return "CF" . '-' . date("ymd") . '-' . $number;
}

// Function to insert data into a table
function insert_data($table, $data) {
    global $conn;  // Assuming $conn is the database connection

    $fields = implode(',', array_keys($data));
    $placeholders = implode(',', array_fill(0, count($data), '?'));
    $query = "INSERT INTO $table ($fields) VALUES ($placeholders)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param(str_repeat('s', count($data)), ...array_values($data));
    return $stmt->execute();
}

function insert_completion($table, $completion) {
    global $conn;  // Assuming $conn is the database connection

    $fields = implode(',', array_keys($completion));
    $placeholders = implode(',', array_fill(0, count($completion), '?'));
    $query = "INSERT INTO $table ($fields) VALUES ($placeholders)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param(str_repeat('s', count($completion)), ...array_values($completion));
    return $stmt->execute();
}

// Retrieve student number
if(isset($_POST['facultyID']) || isset($_POST['semester']) || isset($_POST['academic_year']) || isset($_POST['subjectCode'])
|| isset($_POST['gradeP'])|| isset($_POST['gradeF'])){
    

$submittedTo = $user['facultyID'];

$semester = $_POST['semester'];
$academic_year = $_POST['academic_year'];
$subjectCode = $_POST['subjectCode'];
$gradeP = $_POST['gradeP'];
$gradeF = $_POST['gradeF'];
$name = "Completion Form";
$type = "completion_form";
$status = "created";
$remarks = "No comments/remarks yet";
 if(empty($submittedTo) ||  empty($semester)|| empty($academic_year) || empty($subjectCode) ||  empty($gradeP)|| empty($gradeF)){
		echo 'Please fill out all the fields';
	}else{

        $documentOwner = $_POST['documentOwner'];  
// Generate unique document ID
$documentID = generate_unique_ID();

// Data to insert into tables
$data = [
    'documentID' => $documentID,
    'documentName' => "Completion Form",
    'documentType' => 'completion_form',
    'createdby' => $submittedTo,
    'submittedTo' => $submittedTo,
    'documentOwner' => $documentOwner,
    'documentStatus' => 'created',
    'remarks' => 'No comment/remarks yet'
];

$completion = [
    'documentID' => $documentID,
    'documentName' => "Completion Form",
    'createdby' => $submittedTo,
    'submittedTo' => $submittedTo,
    'documentOwner' => $documentOwner,
    'semester' => $semester,
    'academic_year' => $academic_year,
    'subjectCode' => $subjectCode,
    'gradeP' => $gradeP,
    'gradeF' => $gradeF,
    'documentStatus' => 'created',
    'remarks' => 'No comment/remarks yet'
];

// Insert data into tables
if (insert_data('document', $data) && insert_data('document_transaction', $data) && insert_completion('completion', $completion) && mysqli_query($conn, "UPDATE student_info SET documents_owned = documents_owned + 1 WHERE studentNum = $documentOwner")) {
    echo "Document Created Successfully";
} else {
    echo "Document cannot be created: " . mysqli_error($conn);  // Enhanced error message
}
}
}

 ?>