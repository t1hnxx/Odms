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
				$errorstudentNum = false;
				$conn=mysqli_connect("localhost","root","","odms");
				$length = rand(4,19);
			$number= "";
			for($i=0; $i < $length; $i++)
			{
				$new_rand = rand(0,9);
				
				$number = $number . $new_rand;
			}
			$studentID = $number;
			$userType = "Student";
			$studentNum = $_POST['studentNum'];
			$studentFname = $_POST['studentFname'];
			$studentMname = $_POST['studentMname'];
			$studentLname = $_POST['studentLname'];
			$studentEmail = $_POST['studentEmail'];
			$studentPassword = $_POST['studentPassword'];
			$studPass = hash('sha1', $studentPassword);
			$studentGender = $_POST['studentGender'];
			$studentCourse = $_POST['studentCourse'];
			$urlAddress=strtolower($studentFname) . "." . strtolower($studentLname);
			mysqli_query($conn, "INSERT INTO student_info (studentID,userType,studentNum,studentFname,studentMname,studentLname,studentEmail,studentPassword,studentGender,studentCourse,urlAddress) VALUES ('$studentID','$userType','$studentNum','$studentFname','$studentMname','$studentLname','$studentEmail','$studPass', '$studentGender', '$studentCourse', '$urlAddress')");
			?>


<script>
			swal({
              title: "You have succesfully created your account!",
			  text: "You need to log in to your account to continue",
              button: "Log in",
          }).then(function() {
              window.location = "student_login.php";
          });
			</script>
			
	
			