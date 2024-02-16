<style>
  .swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #ec6d18;
  font-size: 12px;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
} </style>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
				$errorEmpty = false;
				$errorEmail = false;
				$conn=mysqli_connect("localhost","root","","odms");
				$length = rand(4,19);
			$number= "";
			for($i=0; $i < $length; $i++)
			{
				$new_rand = rand(0,9);
				
				$number = $number . $new_rand;
			}
			$facultyID = $number;
			$userType = "Personnel";
			$facultyFname= $_POST['facultyFname'];
			$facultyMname= $_POST['facultyMname'];
			$facultyLname= $_POST['facultyLname'];
			$facultyEmail= $_POST['facultyEmail'];
			$facultyPassword= $_POST['facultyPassword'];
			$facultyPass = hash('sha1', $facultyPassword);
			$facultyGender= $_POST['facultyGender'];
			$facultyDepartment= $_POST['facultyDepartment'];
			$urlAddress=strtolower($facultyFname) . "." . strtolower($facultyLname);
			mysqli_query($conn, "INSERT INTO faculty_info (facultyID,userType,facultyFname,facultyMname,facultyLname,facultyEmail,facultyPassword,facultyGender,facultyDepartment,urlAddress) VALUES ('$facultyID','$userType','$facultyFname','$facultyMname','$facultyLname','$facultyEmail','$facultyPass', '$facultyGender', '$facultyDepartment', '$urlAddress')");
	?>
<script>
	swal({
              title: "Account Added Successfully!",
			  text: "You need to log in to your account to continue",
              button: "Continue",
          }).then(function(){
			window.location = "faculty_login.php";
		  });
</script>
			