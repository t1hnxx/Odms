<?php 
require 'login_connect.php';
if(isset($_SESSION["facultyID"])){
    $facultyID = $_SESSION["facultyID"];
		$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM faculty_info WHERE facultyID = '$facultyID'"));
    include("edit-connectT.php");
}
elseif(isset($_SESSION["studentID"])){
	$studentID = $_SESSION["studentID"];
	$user1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_info WHERE studentID = '$studentID'"));
	include("edit-connectS.php");
  }
else{
	header("Location: user_login.php");
  }


?>