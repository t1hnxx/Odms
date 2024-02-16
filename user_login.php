<?php
require 'class/login_connect.php';
if(isset($_SESSION["facultyID"])){
  header("Location: index.php");
  }
if(isset($_SESSION["studentID"])){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<!--AUGUST 2, LOGIN PAGE -->
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../ODMS Logo.png">
	<title>LOGIN | CEIT-ODMS</title>

	<link rel="stylesheet" href="bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
	<link rel="stylesheet" href="poppins.css">
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
	  background-image{
		opacity: 0.5;
	  }
	  .hr-sect {
		display: flex;
		flex-basis: 100%;
		align-items: center;
		color: white;
		margin: 10px 0px;
		text-shadow:
		-1px -1px 0 black,
		 1px -1px 0 black,
		-1px 1px 0 black,
		 1px 1px 0 black
	  }
	  .hr-sect::before,
	  .hr-sect::after {
		content: "";
		flex-grow: 1;
		background-color: white;
		height: 2px;
		font-size: 0px;
		line-height: 0px;
		margin: 0px 10px;
		border: 1px solid black;
			 
	  }
    </style>
</head>
  
<body style="background-image: url('bgbg.png');background-size: 100%; background-repeat: no-repeat;" onload=display_ct6()>

<nav class="navbar fixed-top shadow-lg border-bottom border-black" style="background-color: #ec6d18; color: white; top: 0; width: 100%; height: auto">
		<div class="container-fluid">
		<a class="navbar-brand ms-1 p-0 me-0 me-lg-2" href="admin/adminlogin.php" aria-label="odms">
			
				<img src="cvsu.png" width="60" height="59" class="align-top" alt="">
				<img src="ODMS logo.png" width="71" height="71" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
				<div class="d-inline-block align-text-top mt-1 text-white lh-sm">
						<div class="container fs-4">ONLINE DOCUMENT MONITORING SYSTEM<br></div>
				<div class="container fs-6">College of Engineering and Information Technology</div>
				</div>
				</a>
		</div>
	</nav>
<br>
<div class="shadow-lg text-white row mt-5" style="opacity: 85%">
<div class="col-md-5">
	<br> <br>
<div class="hr-sect text-white fw-bolder"><h4>LOG IN</h4></div>
				<!-- form user info -->
				<div class="card border-dark border-1 m-3" >
				<form autocomplete="on" class="form" role="form" action="index.php" method="post">
					<input type="hidden" id="action" value="loginS">
					<div class="form-floating p-1 mt-4 me-2 ms-2 border border-warning rounded-2" style="font-size: 14px; color: #ec6d18 ">
						<input type="text" class="form-control border border-0 studentNum" id="studentNum" placeholder="1">
						<label for="studentNum">Username/ E-mail/ Student Number</label>
					</div>

					<hr class= "bg-black" ></hr>

					<div class="form-floating d-flex p-1 mt-4 me-2 ms-2 border border-warning rounded-2" style="font-size: 16px;color: #ec6d18">
						<input type="password" class="form-control border border-0 studentPassword" id="studentPassword" placeholder="Password"> 
						<label for="password">Password</label> 
						<i class="bi bi-eye-slash mt-2 me-2" id="togglePassword" style="font-size: 27px; background: white; border-radius: 0px 3px 3px; border-color: #ec6d18"></i>
					</div>

					<div class="mt-4 me-2 ms-2 mb-1">

					<button class="btn" id="loginButton" type="button" style="background-color: #ec6d18; color: white; width:100%">LOG IN</button>	
					</div>
					</form>	
				</div><!--/col-->
</div>
</div>
<?php require "login.php"; ?>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src='node_modules/sweetalert/dist/sweetalert.min.js'> </script>
</body>

<!-- ========== Password Toggle ========== -->
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#studentPassword");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });
    </script>
</html>