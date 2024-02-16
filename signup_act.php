<?php


	if (isset($_POST['save_signup'])){
		$studentNum = $_POST['studentNum'];
		$studentFname = $_POST['studentFname'];
		$studentMname = $_POST['studentMname'];
		$studentLname = $_POST['studentLname'];
		$studentEmail = $_POST['studentEmail'];
		$studentPassword = $_POST['studentPassword'];
		$studentGender = $_POST['studentGender'];
		$studentCourse = $_POST['studentCourse'];

		$errorEmpty = false;
		$errorEmail = false;
		$errorstudentNum = false;

		$conn=mysqli_connect("localhost","root","","odms");
		$result = mysqli_query($conn,"SELECT * FROM faculty_info WHERE facultyEmail = '$studentEmail'");
		$row = mysqli_fetch_assoc($result);

		$result2 = mysqli_query($conn,"SELECT * FROM student_info WHERE studentNum = '$studentNum' or studentEmail = '$studentEmail'");
		$row2 = mysqli_fetch_assoc($result2);
		 

		if(empty($studentNum) || empty($studentFname) || empty($studentLname) || empty($studentEmail) || empty($studentPassword) || empty($studentGender) || empty($studentCourse)){
			echo "<span style='color: maroon' class='alert alert-success d-flex align-items-center' role='alert'><i class='bi bi-exclamation-diamond-fill' style='color: #fda50d; text-shadow:
			-1px -1px 0 black,
			 1px -1px 0 black,
			-1px 1px 0 black,
			 1px 1px 0 black;'></i>&nbsp &nbsp Please fill out all FIELDS
			 </span>";
			$errorEmpty = true;
		}

		
		elseif(!filter_var($studentEmail,FILTER_VALIDATE_EMAIL)){
			echo "<span style='color: maroon' class='alert alert-success d-flex align-items-center' role='alert'>
			<i class='bi bi-exclamation-diamond-fill' style='color: #fda50d; text-shadow:
			-1px -1px 0 black,
			 1px -1px 0 black,
			-1px 1px 0 black,
			 1px 1px 0 black;'></i>&nbsp &nbsp Email invalid!
			 </span>";
			$errorEmail = true;
		}
		
		
		

		elseif(is_numeric($studentNum) == false)
		{
			echo "<span style='color: maroon' class='alert alert-success d-flex align-items-center' role='alert'><i class='bi bi-exclamation-diamond-fill' style='color: #fda50d; text-shadow:
			-1px -1px 0 black,
			 1px -1px 0 black,
			-1px 1px 0 black,
			 1px 1px 0 black;'></i>&nbsp &nbsp Enter a valid Student Number</span>";
			$errorstudentNum = true;
		}

		elseif(!empty($row2)){
			if($row2['studentEmail']==$studentEmail){
				echo "<span style='color: maroon' class='alert alert-success d-flex align-items-center' role='alert'><i class='bi bi-exclamation-diamond-fill' style='color: #fda50d; text-shadow:
				-1px -1px 0 black,
				 1px -1px 0 black,
				-1px 1px 0 black,
				 1px 1px 0 black;'></i>&nbsp &nbsp Email already exists!
				 </span>";
				 $errorEmail = true;
			}
			elseif($row2['studentNum']==$studentNum){
				echo "<span style='color: maroon' class='alert alert-success d-flex align-items-center' role='alert'><i class='bi bi-exclamation-diamond-fill' style='color: #fda50d; text-shadow:
					-1px -1px 0 black,
					 1px -1px 0 black,
					-1px 1px 0 black,
					 1px 1px 0 black;'></i>&nbsp &nbsp Student number already exist!.
					 </span>";
					$errorstudentNum = true;
				

			}
		}
		elseif(!empty($row)){
			if($row['facultyEmail']==$studentEmail){
				echo "<span style='color: maroon' class='alert alert-success d-flex align-items-center' role='alert'><i class='bi bi-exclamation-diamond-fill' style='color: #fda50d; text-shadow:
				-1px -1px 0 black,
				 1px -1px 0 black,
				-1px 1px 0 black,
				 1px 1px 0 black;'></i>&nbsp &nbsp Email already exists!
				 </span>";
				 $errorEmail = true;
			}

		
		}
	}	

	else{
		echo "<span style='color: maroon' class='alert alert-success d-flex align-items-center' role='alert'><br>Error Occured!<br></span>";
	}

	if($errorEmpty == false && $errorEmail == false && $errorstudentNum == false){
		require("class/signup_student.php");
	}
	
?>			
			<script>
			$errorEmpty = <?php echo $errorEmpty; ?>;
			$errorEmail = <?php echo $errorEmail; ?>;
			$errorstudentNum = <?php echo $errorstudentNum; ?>;
			</script>
			