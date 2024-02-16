<?php

if (isset($_POST['save_signupF'])){
	$facultyFname= $_POST['facultyFname'];
		$facultyMname= $_POST['facultyMname'];
		$facultyLname= $_POST['facultyLname'];
		$facultyEmail= $_POST['facultyEmail'];
		$facultyPassword= $_POST['facultyPassword'];
		$facultyGender= $_POST['facultyGender'];
		$facultyDepartment= $_POST['facultyDepartment'];

	$errorEmpty = false;
	$errorEmail = false;

	$conn=mysqli_connect("localhost","root","","odms");
		$result = mysqli_query($conn,"SELECT * FROM faculty_info WHERE facultyEmail = '$facultyEmail'");
		$row = mysqli_fetch_assoc($result);

		$result2 = mysqli_query($conn,"SELECT * FROM student_info WHERE studentEmail = '$facultyEmail'");
		$row2 = mysqli_fetch_assoc($result2);
	 

		if(empty($facultyFname) || empty($facultyLname) || empty($facultyEmail) || empty($facultyPassword) || empty($facultyGender) || empty($facultyDepartment)){
		echo "<span style='color: maroon' class='alert alert-success d-flex align-items-center' role='alert'><i class='bi bi-exclamation-diamond-fill' style='color: #fda50d; text-shadow:
		-1px -1px 0 black,
		 1px -1px 0 black,
		-1px 1px 0 black,
		 1px 1px 0 black;'></i>&nbsp &nbsp Please fill out all FIELDS
		 </span>";
		$errorEmpty = true;
	}

	
	elseif(!filter_var($facultyEmail,FILTER_VALIDATE_EMAIL)){
		echo "<span style='color: maroon' class='alert alert-success d-flex align-items-center' role='alert'>
		<i class='bi bi-exclamation-diamond-fill' style='color: #fda50d; text-shadow:
		-1px -1px 0 black,
		 1px -1px 0 black,
		-1px 1px 0 black,
		 1px 1px 0 black;'></i>&nbsp &nbsp Email invalid!
		 </span>";
		$errorEmail = true;
	}
	

	elseif(!empty($row)){
		if($row['facultyEmail']==$facultyEmail){
			echo "<span style='color: maroon' class='alert alert-success d-flex align-items-center' role='alert'><i class='bi bi-exclamation-diamond-fill' style='color: #fda50d; text-shadow:
			-1px -1px 0 black,
			 1px -1px 0 black,
			-1px 1px 0 black,
			 1px 1px 0 black;'></i>&nbsp &nbsp Email already exists!
			 </span>";
			 $errorEmail = true;
		}
	}
	elseif(!empty($row2)){
		if($row2['studentEmail']==$facultyEmail){
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

if($errorEmpty == false && $errorEmail == false){
	require("class/signup_faculty.php");
}

?>			
		<script>
		$errorEmpty = <?php echo $errorEmpty; ?>;
		$errorEmail = <?php echo $errorEmail; ?>;
		</script>