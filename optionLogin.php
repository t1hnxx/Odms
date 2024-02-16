<?php
require 'class/loginall_connect.php';
if(isset($_SESSION["facultyID"])){
  header("Location: index.php");
}
elseif(isset($_SESSION["studentID"])){
	header("Location: index.php");
  }?>


<!DOCTYPE html>
<!--AUGUST 2, LOGIN PAGE -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="ODMS Logo.png">

	<title>Log In | CEIT-ODMS</title>
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit">
	<link rel="stylesheet" href="bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
	<style>
      body {
        font-family: 'Kanit', serif;
        font-size: 48px;
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
	 
}
    </style>
</head>
  
<body style="background-image: url('bgbg.png');background-size: 100% 100vh; background-repeat: no-repeat;">

<!--NAVBAR STILL NEEDS A LOGO, AND ADJUSTMENT TO THE APPEARANCE-->
<nav class="navbar fixed-top shadow-lg border-bottom border-black" style="background-color: #ec6d18; color: white; top: 0; width: 100%; height: auto">
		<div class="container-fluid">
				<a class="navbar-brand p-0 me-0 me-lg-2" href="admin/adminlogin.php" aria-label="odms">
				<img src="cvsu.png" width="60" height="58" class="align-top" alt="">
				<img src="ODMS logo.png" width="70" height="70" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
				<div class="d-inline-block align-text-top mt-1 text-white lh-sm">
						<div class="container fs-4">ONLINE DOCUMENT MONITORING SYSTEM<br></div>
				<div class="container fs-6">College of Engineering and Information Technology</div>
				</div>
				</a>
		</div>
	</nav>
<br><br>
			<div class="shadow-lg float-start ms-5 mt-2 me-2 me-2" style="width: 33%; height: 25%;opacity: 90%">
			<div class="hr-sect text-white fw-bolder"><h4>LOG IN</h4></div>
				<!-- form user info -->
				<div class="card border-dark border-1">
				
					<form autocomplete="off" class="form lh-1" role="form" action="" id="login_formF" method="POST">
					<input type="hidden" id="action" value="sample">
								<div class="form-floating p-1 mt-4 me-2 ms-2 border border-warning rounded-2" style="font-size: 12px; color: #ec6d18 ">
									<input type="text" class="form-control border border-0" name="username" id="username" placeholder="" required/>
									<label for="username">Email address</label>
								</div>

										
							<hr class= "bg-black" ></hr>

							
								<div class="form-floating d-flex p-1 mt-4 me-2 ms-2 border border-warning rounded-2" style="font-size: 12px;color: #ec6d18">
									<input type="password" class="form-control border border-0" name="password" id="password" placeholder="Password" required/> 
									<label for="password">Password</label> 
									<i class="bi bi-eye-slash pt-3" id="togglePassword" style="font-size: 27px;border-radius: 0px 3px 3px; border-color: #ec6d18"></i>
								</div>
							<div class="mt-4 me-2 ms-2 mb-4">
      
								<button class="btn" onclick="loginall()" type="button" style="background-color: #ec6d18; color: white; width:100%">LOG IN</button>
    </div>
						</form>   
				</div>
			
			</div>
			<?php require "login.php"; ?>
<!-- /form user info -->
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src='node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script src='node_modules/sweetalert/dist/sweetalert.min.js'> </script>
</body>
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });
    </script>
