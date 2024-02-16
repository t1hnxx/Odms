<?php
require 'class/login_connect.php';
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

	<title>Create Account Personnel | CEIT-ODMS</title>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
</body>
</head>

<body style="background-color: #E4E4E4">

<!--NAVBAR STILL NEEDS A LOGO-->
<nav class="navbar" style="background-color: #ec6d18; color: white">
		<div class="d-flex flex-row mb-3" style="line-height: 1">
			<div class="p-2"><img src="ODMS Logo.png" width="70" height="70" class="d-inline-block align-top" alt=""></div>
			
			<div class="container p-2">
			<div class="d-flex flex-column mb-3">
				<div class="p-1 fs-4">ONLINE DOCUMENT MONITORING SYSTEM</div>
				<div class="p-1 fs-6">College of Engineering and Information Technology</div>
			</div>
			</div>
		</div>
	</nav>
	
	<br><br>
	
<!-- FORM STILL NEED TO CONNECT IN DATABASE-->	
<div class="row">
 	
	<div class="col-md-12"> 

		<div class="row justify-content-center">
			<div class="col-md-7">
				<div class="row border border-secondary bg-white" style="border-radius: 8px;">
					<div class="col-lg-3  p-2"><i>No have an account?</i></div>
						<div class="col-lg-9 pt-2">
							<button class="btn" type="button" id="toOption" style="background-color: #ec6d18; color: white; width:100%">LOG IN</button>
						</div>
				</div>
				<br>
				<!-- form user info -->
				<div class="card card-outline-secondary">
					<div class="card-header">
						<h3 class="mx-auto">User Information</h3>
					</div>

					<div class="card-body p-5">
					<p class="alert-message"><p>
						<form autocomplete="off" class="form" role="form" id="signupFormF" action="faculty_login.php" method="POST">
							<div class="form-group row">
							<input type="hidden" id="action" value="signupF">
								<div class="col-lg-12">
									<input class="form-control border border-dark" type="text" id="facultyFname" name="facultyFname" placeholder="First Name"required/>
								</div>
							</div>
							<br>

							<div class="form-group row">
								<div class="col-lg-12">
									<input class="form-control border border-dark" type="text" id="facultyMname" name="facultyMname" placeholder="Middle Name (Optional)">
								</div>
							</div>
							<br>
							
							<div class="form-group row">
								<div class="col-lg-12">
									<input class="form-control border border-dark" type="text" id="facultyLname" name="facultyLname" placeholder="Last Name" required/>
								</div>
							</div>
							<br>

							<div class="form-group row">
								<div class="col-lg-12">
									<input class="form-control border border-dark" type="text" id="facultyEmail" name="facultyEmail" placeholder="Email" required/>
								</div>
							</div>
							<br>

							<div class="form-group row">
								<div class="col-lg-11">
									<input class="form-control border border-dark" type="password" id="facultyPassword" name="facultyPassword" placeholder="Password" required/>	
								</div>
								<div class="col-lg-1">
									<i class="bi bi-eye-slash" id="togglePassword" style="font-size: 27px; background: white; border-radius: 0px 3px 3px; border-color: #ec6d18"></i>
								</div>									
							</div>
							<br>
								
							<div class="form-group row">
								<div class="col-lg-12">
									<select class="border border-dark" id="facultyGender" name="facultyGender" style="height: 35px; border-radius: 5px;" required/>
										<option value=""disabled selected hidden>Sex</option>
										<option value="Male" id="input">Male</option>
										<option value="Female" id="input">Female</option>
										</select><br>									
								</div>
							</div>
							<br>

							<div class="form-group row">
								<div class="col-lg-12">
									<?php
										$conn = mysqli_connect("localhost", "root","","odms");
										$query = "SELECT department_id,	departmentCode, departmentName FROM department ORDER BY department_id ASC";
										$result = mysqli_query($conn,$query);
									 ?>
									<select id="facultyDepartment" style="height: 35px; border-radius: 5px;" name="facultyDepartment" required/>
										<option value=""disabled selected hidden>Department</option>
										<?php
											while ($row = mysqli_fetch_array($result))
												{
													echo "<option value='".$row['departmentCode']."'>".$row['departmentName']."</option>";
												}
										?>  
									</select> 
							
								</div>
							</div>	
							<br>
							
							<div class="form-group row">
								<div class="col-lg-12">
									<button class="btn" id="save_signupF" type="submit" style="background-color: #ec6d18; color: white; width:100%">SIGN UP</button>
								</div>
							</div>
						</form>
								
					</div>
				</div><!-- /form user info -->
			</div>
		</div>

	</div><!--/col-->
</div>
</body>
<script>
    $(document).ready(function() {
        $('#toOption').click(function() {
    window.location.href = 'optionLogin.php';
    return false;
});
	});
</script>
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#facultyPassword");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>
	<script>
		 $(document).ready(function() {
			$("#signupFormF").submit(function(event){
				event.preventDefault();
				var facultyFname = $("#facultyFname").val();
				var facultyMname = $("#facultyMname").val();
				var facultyLname = $("#facultyLname").val();
				var facultyEmail = $("#facultyEmail").val();
				var facultyPassword = $("#facultyPassword").val();
				var facultyGender = $("#facultyGender").val();
				var facultyDepartment = $("#facultyDepartment").val();
				var save_signupF = $("#save_signupF").val();

				$(".alert-message").load("signup_actF.php", {
					facultyFname: facultyFname,
					facultyMname: facultyMname,
					facultyLname: facultyLname,
					facultyEmail: facultyEmail,
					facultyPassword: facultyPassword,
					facultyGender: facultyGender,
					facultyDepartment: facultyDepartment,
					save_signupF: save_signupF
				});
			});
		 });

	</script>
</html>