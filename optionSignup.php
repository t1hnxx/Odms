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

	<title>Signup | CEIT-ODMS</title>
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
  
<body style="background-color: #E4E4E4">

<!--NAVBAR STILL NEEDS A LOGO, AND ADJUSTMENT TO THE APPEARANCE-->
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

    <br><br><br>
    <div class="row">
			<div class="col-md-12"> 

				<div class="row justify-content-center">
					<div class="col-md-6">
						<!-- form user info -->
						<div class="card border-dark">

						<div class="card-header border-black">
						<h3 class="mx-auto">CREATE YOUR ACCOUNT</h3>
					</div>
							
							<div class="card-body" style="background-color: #cccccc">
				
                            <div class="form-group row">						
										<button class="btn btn-outline-light" id="faculty" type="button" style="background-color: #ec6d18; width:100%">PERSONNEL</button>										
									</div>
                                
									<hr class= "bg-black" ></hr>
                                    
                                    <div class="form-group row">
										
										<button class="btn btn-outline-light" id="student" type="button" style="background-color: #ec6d18; width:100%">STUDENT</button>
										
									</div>
										</div>

                                        
										</div> <br> <br>


										<div class="row border border-secondary bg-white" style="border-radius: 8px;">
					<div class="col-lg-3  p-2"><i><b>Already have an account?</b></i></div>
						<div class="col-lg-9 pt-2">
							<button class="btn" type="button" id="toOption" style="background-color: #ec6d18; color: white; width:100%">LOG IN</button>
						</div>
				</div>
									</div>


									</div>

                            
							</div>
						</div><!-- /form user info -->
					</div>
				</div>

			</div>

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
    $(document).ready(function() {
        $('#faculty').click(function() {
    window.location.href = 'signupFaculty.php';
    return false;
});

$('#student').click(function() {
    window.location.href = 'signupStudent.php';
    return false;
    });

});


</script>