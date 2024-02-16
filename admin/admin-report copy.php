<?php require_once("dbcon.php"); ?>
<!DOCTYPE html>
<!--AUGUST 2, LOGIN PAGE -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../ODMS Logo.png">

	<title>ADMIN | CEIT-ODMS</title>
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

	<style>
      body {
        font-family: 'Kanit', serif;
      }
    </style>
</head>
  
<body class="bg-dark">

<!--NAVBAR STILL NEEDS A LOGO, AND ADJUSTMENT TO THE APPEARANCE-->
<nav class="navbar fixed-top bg-dark shadow-lg" style="width: 100%;opacity:90%">
		<div class="d-flex flex-row container-fluid">
        <button class="navbar-toggler d-lg-none d-inline-block align-text-top" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"> 
					<i class="bi bi-list"></i>
				</button>
				<a class="navbar-brand ms-1 p-0 me-0 me-lg-2" href="../optionLogin.php" aria-label="odms">
				<img src="../cvsu.png" width="58" height="55" class="align-top" alt="">
				<img src="../ODMS logo.png" width="65" height="65" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
			
				</a><input type="text" name="search" id="search_all" class="form-control rounded-25 d-inline-block align-text-top w-25" placeholder="Search">
                <div class="d-inline-block align-text-top me-1 fs-6 text-white">
                
			  <?php 
					//$fname = $user['facultyFname'];
					//$lname = $user['facultyLname'];

				
				echo "Admin 1"; ?>   &nbsp&nbsp
				
			  <img src="admin1.png" style="height:40px;width:40px;border-radius: 50%" alt="..." >&nbsp&nbsp
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
					<li class="bd-links-group py-2 px-3 border-0 "><a href="index.php" class="nav-link  text-decoration-none link-warning text-white"><i class="bi bi-house" ></i>&nbsp Dashboard</a></li>
					
					<li></li>
 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-personnel.php" class="nav-link text-decoration-none link-warning text-white" ><i class="bi bi-people"></i>&nbsp Personnel</a></li>

					<li></li>
					
					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-student.php"   class="nav-link text-decoration-none link-warning text-white"><i class="bi bi-mortarboard"></i>&nbsp Students</a></li>
					<li></li>

					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-report.php"  class="nav-link active text-decoration-none" style="color:#ec6d18"><i class="bi bi-file-earmark-text"></i>&nbsp Reports</a></li>
					<li></li>
				
					<li class="bd-links-group py-2 px-3 border-0 "><a onclick="logout()" class="nav-link text-decoration-none link-warning text-white" ><i class="bi bi-box-arrow-right"></i>&nbsp Log out</a></li>

				</ul>
			  </nav>
			</div>
		 </div>		
	    </aside>
	 </div>


	 <div class="col-md-10 mt-1">
	    <main class="bd-main order-1">   
		<ul class="nav nav-underline" id="nav-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true" style="color:#ec6d18">All</a> 
            </li>&nbsp
            <li class="nav-item">
                <a class="nav-link" id="nav-dean-tab" data-bs-toggle="tab" data-bs-target="#nav-dean" type="button" role="tab" aria-controls="nav-dean" aria-selected="true" style="color:#ec6d18">Dean Office</a>
            </li>&nbsp
            <li class="nav-item">
                <a class="nav-link" id="nav-dafe-tab" data-bs-toggle="tab" data-bs-target="#nav-dafe" type="button" role="tab" aria-controls="nav-dafe" aria-selected="true" style="color:#ec6d18">DAFE</a>
            </li>&nbsp
            <li class="nav-item">
                <a class="nav-link" id="nav-dce-tab"   data-bs-toggle="tab" data-bs-target="#nav-dce" type="button" role="tab" aria-controls="nav-dce" aria-selected="false" style="color:#ec6d18">DCE</a>
            </li>&nbsp
            <li class="nav-item">
                <a class="nav-link" id="nav-dcee-tab"   data-bs-toggle="tab" data-bs-target="#nav-dcee" type="button" role="tab" aria-controls="nav-dcee" aria-selected="false" style="color:#ec6d18">DCEE</a>
            </li>&nbsp
            <li class="nav-item">
                <a class="nav-link" id="nav-diet-tab"   data-bs-toggle="tab" data-bs-target="#nav-diet" type="button" role="tab" aria-controls="nav-diet" aria-selected="false" style="color:#ec6d18">DIET</a>
            </li>&nbsp
            <li class="nav-item">
                <a class="nav-link" id="nav-dit-tab"   data-bs-toggle="tab" data-bs-target="#nav-dit" type="button" role="tab" aria-controls="nav-dit" aria-selected="false" style="color:#ec6d18">DIT</a>
            </li>&nbsp
            <li class="nav-item">
                <a class="nav-link" id="nav-guidance-tab"   data-bs-toggle="tab" data-bs-target="#nav-guidance" type="button" role="tab" aria-controls="nav-guidance" aria-selected="false" style="color:#ec6d18">Guidance</a>
            </li>
         </ul>

<br>


<div class="tab-content" id="nav-tabContent">

 
  <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab" tabindex="0"><?php include("faculty/all.php");?></div>
  <div class="tab-pane fade" id="nav-dean" role="tabpanel" aria-labelledby="nav-dean-tab" tabindex="0"><?php include("faculty/dean.php"); ?></div>
  <div class="tab-pane fade" id="nav-dafe" role="tabpanel" aria-labelledby="nav-dafe-tab" tabindex="0"><?php include("faculty/dafe.php"); ?></div>
  <div class="tab-pane fade" id="nav-dce" role="tabpanel" aria-labelledby="nav-dce-tab" tabindex="0"><?php include("faculty/dce.php"); ?></div>
  <div class="tab-pane fade" id="nav-dcee" role="tabpanel" aria-labelledby="nav-dcee-tab" tabindex="0"><?php include("faculty/dcee.php"); ?></div>
  <div class="tab-pane fade" id="nav-diet" role="tabpanel" aria-labelledby="nav-diet-tab" tabindex="0"><?php include("faculty/diet.php"); ?></div>
  <div class="tab-pane fade" id="nav-dit" role="tabpanel" aria-labelledby="nav-dit-tab" tabindex="0"><?php include("faculty/dit.php"); ?></div>
  <div class="tab-pane fade" id="nav-guidance" role="tabpanel" aria-labelledby="nav-guidance-tab" tabindex="0"><?php include("faculty/guidance.php"); ?></div>


  <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div> 
</div>
		</main>
	</div>

	</div>
	</div>



</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js" integrity="sha512-qzgd5cYSZcosqpzpn7zF2ZId8f/8CHmFKZ8j7mU4OUXTNRd5g+ZHBPsgKEwoqxCtdQvExE5LprwwPAgoicguNg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
	$(document).ready(function(){
		
		$("#getval").on('change', function(){
			var value = $(this).val();
			//alert(value);
		
	
			$.ajax({
				url: "get.php",
				type: "POST",
				
				data: 'request=' + value,
				beforeSend:function(){
					$(".container").html("<span class='position-absolute top-50 start-50 translate-middle'><img src='loading45.gif' height='70' width='70'></span>");
				},
				success:function(data){
					$(".container").html(data);
					
				}
			});
		});
		
	});
	
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

