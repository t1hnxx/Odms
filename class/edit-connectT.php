<?php 
require ("dbcon.php");

$me = $user['facultyID'];
$query = "SELECT * FROM faculty_info WHERE facultyID =  '$me'";
$res = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($res)){
	$fname = $row['facultyFname'];
	$mname = $row['facultyMname'];
	$lname = $row['facultyLname'];
	$password = $row['facultyPassword'];
}


if(isset($_POST['facultyFname']) || isset($_POST['facultyMname']) || isset($_POST['facultytLname']) || isset($_POST['facultyPassword'])){
	$Fname = $_POST['facultyFname'];
	$Mname = $_POST['facultyMname'];
	$Lname = $_POST['facultyLname'];
	$password = $_POST['facultyPassword'];
	$me = $user['facultyID'];

	$pass = hash("sha1", $password);


	if(empty($Fname) || empty($Lname) ||  empty($password)){
		echo '<div class="alert alert-warning alert-dismissible fade show m-2" role="alert"><i class="bi bi-exclamation-diamond"></i> &nbsp&nbsp Empty Fields
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	}else{
		if(preg_match('#^[a-f0-9]{40}$#i',$password)){
		$query = "UPDATE faculty_info SET facultyFname = '$Fname', facultyMname = '$Mname', facultyLname = '$Lname', facultyPassword = '$password' WHERE facultyID = '$me'";
		$run = mysqli_query($conn,$query);
		}else{
			$query = "UPDATE faculty_info SET facultyFname = '$Fname', facultyMname = '$Mname', facultyLname = '$Lname', facultyPassword = '$pass' WHERE facultyID = '$me'";
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