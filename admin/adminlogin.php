<!DOCTYPE html>
<!--AUGUST 2, LOGIN PAGE -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../ODMS Logo.png">

	<title>ADMIN LOG IN | CEIT-ODMS</title>
	
	<link rel="stylesheet" href="..//poppins.css">
    <link rel="stylesheet" href="..//bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

	<style>
    @font-face {
                font-family: "Poppins";
                font-weight: normal;
                font-style: normal;
                font-variant: normal;
                src: url("fonts/Poppins-Regular.ttf") format("truetype");
            }
      body {
        font-family: 'Poppins', sans-serif;
      }

	  .no-border {
    border: 0;
    box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
}
    </style>
</head>
  
<body style="background-color: #f2f2f2">




<!--NAVBAR STILL NEEDS A LOGO, AND ADJUSTMENT TO THE APPEARANCE-->
<nav class="navbar border-bottom shadow-lg " style="width: 100%; background-color: #ec6d18;">
		<div class="container-fluid">
				<a class="navbar-brand p-0 me-0 me-lg-2" href="../user_login.php" aria-label="odms">
				<img src="../cvsu.png" width="60" height="59" class="align-top" style="margin-top:5px;" alt="">
				<img src="../ODMS logo.png" width="71" height="71" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
				<div class="d-inline-block align-text-top mt-1 text-white lh-sm">
						<div class="container fs-4">ONLINE DOCUMENT MONITORING SYSTEM<br></div>
				<div class="container fs-6">College of Engineering and Information Technology</div>
				</div>
				</a>
		</div>
	</nav>
        <div class="shadow position-absolute top-50 start-50 translate-middle border border-dark fs-4" style="width:25%">
            
        <div class="border-dark border-bottom m-2 text-center" style="color: #ec6d18">
        LOG IN
        </div> 
        
				<!-- form user info -->
				<form autocomplete="off" class="form" role="form" action="" id="login_formF" method="POST">
							
							<input type="hidden" id="action" value="admin">
								<div class="form-group  m-3 rounded-2" style="font-size: 10px; color: #ec6d18; border: 1.5px solid #ec6d18">
									<input type="text" class="form-control-sm no-border w-100 " name="username" id="username" placeholder="username" required/>
								</div>

										
							<hr class= "bg-black" ></hr>

							
								<div class="form-group m-3 d-flex bg-white rounded-2" style="font-size: 10px;color: #ec6d18;border: 1.5px solid #ec6d18" >
									<input type="password" class="form-control-sm no-border w-100 " name="password"id="password" placeholder="Password" required/> 
									<i class="bi bi-eye-slash pt-1 pe-2" id="togglePassword" style="font-size: 20px;border-color: #ec6d18"></i>
								</div>
							<div class="m-3">
      
								<button class="btn" id="loginButton" type="button" style="background-color: #ec6d18; color: white; width:100%">LOG IN</button>
    </div>
						</form>
    
          
                </div>                     
	
</div>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src='../node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
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


        // prevent form submit
    </script>




<script type="text/javascript">
$(document).ready(function() {
  $("#loginButton").click(function() {
    formAdmin(); // Trigger the form submission function on button click
  });

  $(document).keydown(function(event) {
    if (event.key === "Enter") {
      $("#loginButton").click(); // Simulate a click on the button when Enter is pressed
    }
  });

  function formAdmin(){
    $(document).ready(function(){
      var data = {
        username: $("#username").val(),
        password: $("#password").val(), 
        action: $("#action").val(),
      };

      $.ajax({
        url: 'login_connect.php',
        type: 'POST',
        data: data,
        success:function(response){
          if(response == "LOG IN SUCCESSFULLY"){
            Swal.fire({
              title: response,
              icon: "success",  
              button: "Continue",
          }).then(function() {
              window.location.href = "index.php";
          });
          }
          else {
            Swal.fire({
              title: "Log in Failed",
              text: response,
              icon: "error",  
              button: "Try Again",
          });
          }
        }
      });
      });
    };
  });
</script>

</body>