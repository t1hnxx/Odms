<?php 
	require "dbcon.php";
	require "session.php";
?>
<!DOCTYPE html>
<!--AUGUST 2, LOGIN PAGE -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../ODMS Logo.png">

	<title>ADMIN | CEIT-ODMS</title>
	
	<link rel="stylesheet" href="..//https://fonts.googleapis.com/css2?family=Roboto">
	<script src="../node_modules/jquery/dist/jquery.min.js"></script>
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
        font-family: 'Poppins', serif;
        font-weight: 600;
      }
	  
	 
    </style>
</head>
<body style="background-color: #f2f2f2" onload=display_ct6()>
<nav class="navbar fixed-top shadow-lg" style="width: 100%;background-color:#ec6d18">
		<div class="d-flex flex-row container-fluid">
    <button class="navbar-toggler d-lg-none d-inline-block align-text-top" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"> 
					<i class="bi bi-list"></i>
				</button>
				<a class="navbar-brand ms-1 p-0 me-0 me-lg-2" href="index.php" aria-label="odms">
				<img src="../cvsu.png" width="60" height="59" class="align-top" style="margin-top:6px;" alt="">
				<img src="../ODMS logo.png" width="71" height="71" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
				
				</a>
				<div class="d-inline-block align-text-top fs-6 text-white w-50">
				</div>
				<div class="d-inline-block align-text-top me-1 fs-6 text-white fw-bolder" style="letter-spacing: 1px">
		
			    <?php 	
						
						$id= $user['id'];
						$name = $user['name'];
						$image = $user['admin-profile'];
				echo $name
                ?> &nbsp&nbsp
				
				<?php
				if($image == null){

					
					$output = '<img src="images/adminadmin.jpg" style="height:40px;width:40px;border-radius: 50%" alt="..." >';

					echo $output;
				}
				else{
					echo '<img src="images/' .$image.'"style="height:40px;width:40px;border-radius: 50%" alt="..." >';

					
				}
				?>&nbsp&nbsp
		</div>		
		</div>      	
	</nav>


<br><br><br>
	<div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout">
	<div class="row">
	 	<div class="col-md-2 justify-content-start" style="overflow: auto;">
	   <aside class="bd-sidebar">
	     <div class="offcanvas-lg offcanvas-start bg-dark" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
			<div class="offcanvas-header" style="color:  #ec6d18">
				<h4 class="offcanvas-title" id="offcanvasResponsiveLabel">Online Document Monitoring System</h6>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
			</div>

			<div class="offcanvas-body">
			  <nav class="shadow nav nav-underline">
				<ul class="bd-links-nav list-unstyled mb-0 pb-5 pb-md-2 pe-lg-1" style="height:100vh; overflow: auto; position:fixed; width: 30vh"> 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="index.php" class="nav-link active text-decoration-none" style="color:#ec6d18"><i class="bi bi-house" ></i>&nbsp Dashboard</a></li>
					
					<li></li>
 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-personnel.php" class="nav-link text-decoration-none link-warning text-black" ><i class="bi bi-person-circle"></i>&nbsp Designation</a></li>

					<li></li>
					
					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-faculty.php" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-people"></i>&nbsp Faculty</a></li>

					<li></li>

					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-student.php" class="nav-link text-decoration-none link-warning text-black" ><i class="bi bi-mortarboard"></i>&nbsp Students</a></li>
					<li></li>

					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-report.php" class="nav-link text-decoration-none link-warning text-black" ><i class="bi bi-file-earmark-text"></i>&nbsp Reports</a></li>
					<li></li>
				
					<li class="bd-links-group py-2 px-3 border-0 "><a onclick="logout()" class="nav-link text-decoration-none link-warning text-black" ><i class="bi bi-box-arrow-right"></i>&nbsp Log out</a></li>

				</ul>
			  </nav>
			</div>
		 </div>		
	    </aside>
	 </div>
	 <div class="col-md-10 mt-1">
	    <main class="bd-main order-1">  


    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4 border-dark-subtle">
          <div class="card-header text-center" style="background-image: url('admincover.jpg');background-size: cover; background-repeat: no-repeat;">
		  <br><br> <?php
				if($image == null){

					
					$output = '<img src="images/adminadmin.jpg" alt="user" 
					class="rounded-circle img-fluid" style="border-radius: 50%;width: 155px; height: 155px;" >';

					echo $output;
				}
				else{
					echo '<img src="images/' .$image.'"alt="user" 
					class="rounded-circle img-fluid" style="border-radius: 50%;width: 155px; height: 155px; " >';

					
				}
				?>
             </div>
			  <div class="card-body text-center"> 
            <h4 class="my-3 fw-bolder" style="color: #ec6d18"><?php echo strtoupper($user['name']);?></h4>
			<br><br>
			<p><button class="btn text-white btn-sm" type="button" id="student_edit" style="background-color: #ec6d18"><i class="bi bi-pencil-square"></i>&nbspEDIT</button></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">

        <div class="card mb-4">
          <div class="card-body">
			<div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18"><i class="bi bi-gender-trans"></i>&nbspSex</p>
              </div>
              <div class="col-sm-9">
			  		<i class="bi bi-incognito"></i>
              </div>
            </div>

			<hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18"><i class="bi bi-envelope-at"></i>&nbspEmail</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user['email'];?></p>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18"><i class="bi bi-person-circle"></i>&nbspUser</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Admin</p>
              </div>
            </div>  
          </div>

    

			
            </div>
    </div>
  </div>
		</main>
		</div>
</div>
	</div>
	<div class="position-fixed bottom-0 end-0 bg-secondary-subtle" id="ct6" style="font-size: 16px"></div>
</body>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src='../node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script>
    $(document).ready(function() {
        $('#student_edit').click(function() {
    window.location.href = "profile-edit.php?url=<?php echo $user['adminID'] . '%'.$user['name']?>";
    return false;
});
	});
</script>

<script type="text/javascript"> 
 function display_ct6() {
var x = new Date()
var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
hours = x.getHours( ) % 12;
hours = hours ? hours : 12;
var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
x1 = x1 + " - " +  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
document.getElementById('ct6').innerHTML = x1;
display_c6();
 }
 function display_c6(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct6()',refresh)
}
display_c6()
</script>
<script>
function logout(action) {
	Swal.fire({
	title: 'Are you sure you want to log out?',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	confirmButtonText: 'Logout'
	}).then((result) => {
		if (result.isConfirmed) {
			window.location.href = 'logout.php';
		}})
}

	</script>
</html>