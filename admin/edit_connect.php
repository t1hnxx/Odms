<?php 
	require "dbcon.php";
	require "session.php";


if(isset($_SESSION['id'])){

	$id = $_SESSION['id'];
}

$query = "SELECT * FROM admin WHERE email =  '$id'";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($res)){
	$ID = $row['id'];
	$email = $row['email'];
	$name = $row['name'];
	$password = $row['password'];
	$admin = $row['admin-profile'];
}
 


if(isset($_POST['name']) || isset($_POST['password'])){

	$name = $_POST['name'];
	$password = $_POST['password'];
	$id = $_SESSION['id'];



	if(empty($name) || empty($password)){
		echo '<div class="alert alert-warning alert-dismissible fade show m-2" role="alert"><i class="bi bi-exclamation-diamond"></i> &nbsp&nbsp Empty Fields
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	}else{

	$query = "UPDATE admin SET name = '$name', password = '$password' WHERE id = '$id'";
	$run = mysqli_query($conn,$query);

	if($run == 1){?>

<script>
        $(document).ready(function(){
         Swal.fire({
			icon: 'success',
           	title: "ACCOUNT UPDATED SUCCESSFULLY!",	   
              showConfirmButton: false,
  			timer: 1000
          }).then(function(){
			window.location.href = "admin-profile.php";
            
		  });
        });
        
        </script> 

<?php
	}else{
		echo '<div class="alert alert-danger">An error occurred</div>';
	}
	
	}


}


?>