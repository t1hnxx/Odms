<?php
	require 'class/login_connect.php';
    require 'dbcon.php';

	if(isset($_SESSION["facultyID"])){
		$facultyID = $_SESSION["facultyID"];
		$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM faculty_info WHERE facultyID = '$facultyID'"));
		
	}
	  elseif(isset($_SESSION["studentID"])){
		$studentID = $_SESSION["studentID"];
		$user1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_info WHERE studentID = '$studentID'"));
		
	}
	  else{
		header('Location:user_login.php');
	  }

$ID = $user['facultyID'];
if ($_GET["action"] === "fetchcompletion") {
  $sql = "SELECT * FROM completion WHERE (submittedTo = '$ID' OR createdby = '$ID') ORDER BY date DESC";
  $result = mysqli_query($conn, $sql);
  $data = [];
  while ($row = mysqli_fetch_assoc($result)) {
	
    $owner = $row['documentOwner'];
					$array = explode(",", $owner);
					
					foreach ($array as $number) {
						$inner = "SELECT studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$number'";
						$result_inner = $conn->query($inner);
					
						if ($result_inner->num_rows > 0) {
							$row_inner = $result_inner->fetch_array();
					
													// Check for imploded data using a delimiter (e.g., comma):
							$delimiter = ',';  // Adjust the delimiter if needed
							if (strpos($owner, $delimiter) !== false) {
														// Implode data found:
								$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
								$student_names[] = $full_name;
														
							} else {
														// Single value:
								$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
								$student_names = [$full_name];
							}
						} else {
													// Handle the case where student number is not found
							$student_names[] = "Student not found";
						}
					}
          $student = implode(",", $student_names);
			$row['documentOwner'] = $student;

		  $Udate = date('F j, Y, g:i a', strtotime($row['date']));
		  $row['date'] = $Udate;

		  $Cdate = date('F j, Y, g:i a', strtotime($row['date_created']));
		  $row['date_created'] = $Cdate;


         
    $data[] = $row;
  }
  
  mysqli_close($conn);
  header('Content-Type: application/json');
  echo json_encode([
    "data" => $data,
    //"student_names" => $student
  ]);
}
?>
