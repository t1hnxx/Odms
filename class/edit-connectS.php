<?php 
require ("dbcon.php");

$me = $user1['studentNum'];
$query = "SELECT * FROM student_info WHERE studentNum =  '$me'";
$res = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($res)){
	$fname = $row['studentFname'];
	$mname = $row['studentMname'];
	$lname = $row['studentLname'];
	$password = $row['studentPassword'];
}


if(isset($_POST['studentFname']) || isset($_POST['studentMname']) || isset($_POST['studentLname']) || isset($_POST['studentPassword'])){
	$Fname = $_POST['studentFname'];
	$Mname = $_POST['studentMname'];
	$Lname = $_POST['studentLname'];
	$password = $_POST['studentPassword'];
	$me = $user1['studentNum'];

	$pass = hash("sha1", $password);


	if(empty($Fname) || empty($Lname) ||  empty($password)){
		echo '<div class="alert alert-warning alert-dismissible fade show m-2" role="alert"><i class="bi bi-exclamation-diamond"></i> &nbsp&nbsp Empty Fields
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	}else{
		if(preg_match('#^[a-f0-9]{40}$#i',$password)){
		$query = "UPDATE student_info SET studentFname = '$Fname', studentMname = '$Mname', studentLname = '$Lname', studentPassword = '$password' WHERE studentNum = '$me'";
		$run = mysqli_query($conn,$query);
		}else{
			$query = "UPDATE student_info SET studentFname = '$Fname', studentMname = '$Mname', studentLname = '$Lname', studentPassword = '$pass' WHERE studentNum = '$me'";
			$run = mysqli_query($conn,$query);
		}
		if($run == 1){?>

			<script>
					$(document).ready(function(){
					 Swal.fire({
						icon: 'success',
						   title: "ACCOUNT UPDATED SUCCESSFULLY!",	   
						  showConfirmButton: false,
						  timer: 1000
					  }).then(function(){
						window.location.href = "/odms/profile.php";
						
					  });
					});
					
					</script> 
			
			<?php
				}else{
					echo '<div class="alert alert-danger alert-dismissible fade show m-2" role="alert"><i class="bi bi-exclamation-diamond"></i> &nbsp&nbsp An error Occurred
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
				}
				
				}
			
			
			}
	
?>