<?php
	require '../login_connect.php';
	if(isset($_SESSION["id"])){
		$ID = $_SESSION["id"];
		$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE id = '$ID'"));

	}
	else{
		header("Location: ../adminlogin.php");
	  }
?>