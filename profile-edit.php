<?php
	require 'class/login_connect.php';
	mysqli_query($conn, "SET NAMES 'utf8'");
                        mysqli_query($conn, "SET CHARACTER SET 'utf8'");
	if(isset($_SESSION["facultyID"])){
		$facultyID = $_SESSION["facultyID"];
		$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM faculty_info WHERE facultyID = '$facultyID'"));
		include("profileT-edit.php"); ?>
		<div class="position-fixed bottom-0 bg-secondary-subtle" id="ct6" style="font-size: 16px"></div>
	<?php
	}
	  elseif(isset($_SESSION["studentID"])){
		$studentID = $_SESSION["studentID"];
		$user1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_info WHERE studentID = '$studentID'"));
		include ("profileS-edit.php"); ?>
		<div class="position-fixed bottom-0 bg-secondary-subtle" id="ct6" style="font-size: 16px"></div>
	<?php
	}
?>
 <link rel="stylesheet"
          href="poppins.css">
    <style>
      @font-face {
                font-family: "Poppins";
                font-weight: normal;
                font-style: normal;
                font-variant: normal;
                src: url("fonts/Poppins-Regular.ttf") format("truetype");
            }
      body {
        font-family: 'Poppins', serif;
      }
    </style>