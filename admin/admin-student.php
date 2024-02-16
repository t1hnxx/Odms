<?php require_once("dbcon.php");
require "session.php";?>
<!DOCTYPE html>
<!--AUGUST 2, LOGIN PAGE -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../ODMS Logo.png">

	<title>ADMIN | CEIT-ODMS</title>
	
	<link rel="stylesheet" href="..//shttps://fonts.googleapis.com/css2?family=Roboto">
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
                <div class="d-inline-block align-text-top me-1 fs-6 text-white">
				<a href="admin-profile.php?url=<?php echo $user['adminID'] . '%'.$user['name']?>" class="text-white" style="text-decoration:none">
			  <?php 
					
					
					$id= $user['id'];
				$name = $user['name'];
				$image = $user['admin-profile'];
				

				
				echo $name?> &nbsp&nbsp
				<?php
				if($image == null){

					
					$output = '<img src="images/adminadmin.jpg" style="height:40px;width:40px;border-radius: 50%" alt="..." >';

					echo $output;
				}
				else{
					echo '<img src="images/' .$image.'"style="height:40px;width:40px;border-radius: 50%" alt="..." >';

					
				}
				?>
			 &nbsp&nbsp
			  </a>
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
					<li class="bd-links-group py-2 px-3 border-0 "><a href="index.php" class="nav-link  text-decoration-none link-warning text-black"><i class="bi bi-house" ></i>&nbsp Dashboard</a></li>
					
					<li></li>
 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-personnel.php" class="nav-link text-decoration-none link-warning text-black" ><i class="bi bi-person-circle"></i>&nbsp Designation</a></li>

					<li></li>

					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-faculty.php" class="nav-link text-decoration-none link-warning text-black" ><i class="bi bi-people"></i>&nbsp Faculty</a></li>

					<li></li>
					
					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-student.php" class="nav-link active text-decoration-none" style="color:#ec6d18"  ><i class="bi bi-mortarboard"></i>&nbsp Students</a></li>
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
		<div class="text-center" style="color:#ec6d18">	
			<h3><b>STUDENTS</b></h3> 
            <hr style="height:2px;border-width:0;color:black;background-color:black">
        </div> 
		<ul class="nav nav-underline" id="nav-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true" style="color:#ec6d18;font-weight:bolder">All</a> 
            </li>&nbsp
            <li class="nav-item">
                <a class="nav-link" id="nav-dafe-tab" data-bs-toggle="tab" data-bs-target="#nav-dafe" type="button" role="tab" aria-controls="nav-dafe" aria-selected="true" style="color:#ec6d18;font-weight:bolder">DAFE</a>
            </li>&nbsp
            <li class="nav-item">
                <a class="nav-link" id="nav-dce-tab"   data-bs-toggle="tab" data-bs-target="#nav-dce" type="button" role="tab" aria-controls="nav-dce" aria-selected="false" style="color:#ec6d18;font-weight:bolder">DCEA</a>
            </li>&nbsp
            <li class="nav-item">
                <a class="nav-link" id="nav-dcee-tab"   data-bs-toggle="tab" data-bs-target="#nav-dcee" type="button" role="tab" aria-controls="nav-dcee" aria-selected="false" style="color:#ec6d18;font-weight:bolder">DCEE</a>
            </li>&nbsp
            <li class="nav-item">
                <a class="nav-link" id="nav-diet-tab"   data-bs-toggle="tab" data-bs-target="#nav-diet" type="button" role="tab" aria-controls="nav-diet" aria-selected="false" style="color:#ec6d18;font-weight:bolder">DIET</a>
            </li>&nbsp
            <li class="nav-item">
                <a class="nav-link" id="nav-dit-tab"   data-bs-toggle="tab" data-bs-target="#nav-dit" type="button" role="tab" aria-controls="nav-dit" aria-selected="false" style="color:#ec6d18;font-weight:bolder">DIT</a>
            </li>&nbsp
         </ul>

<br>
		 <!-- Button trigger modal -->
		<button  class="btn btn-flat float-start btn-md text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color:#ec6d18"><b><i class="bi bi-person-plus"></i>&nbsp Add Students</b></button>
		<br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
		
       <h5 class="modal-title" id="exampleModalLabel"><b>Add Student</b></h5> <sub><button type="button" class="btn"
        data-bs-toggle="tooltip" data-bs-placement="right"
        data-bs-custom-class="custom-tooltip"
        data-bs-title='You will be inserting information one-by-one when choosing the second option.'>
		<i class="bi bi-info-circle"></i>
	</button></sub>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="flex-row lh-base">
	  <button class="btn w-100 btn-md" id="toExcel"type="button" style="background-color:#ec6d18; color:white"><i class="bi bi-filetype-xlsx"></i>&nbsp Uploading an Excel file</button> <br><br>
	  <button class="btn w-100 btn-md" id="toManual" type="button" style="background-color:#ec6d18; color:white"><i class="bi bi-plus-square"></i>&nbsp Add record</button>
      </div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<br><br>

<div class="tab-content" id="nav-tabContent">

 
  <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab" tabindex="0"><?php include("student/all.php");?></div>
  <div class="tab-pane fade" id="nav-dafe" role="tabpanel" aria-labelledby="nav-dafe-tab" tabindex="0"><?php include("student/dafe.php"); ?></div>
  <div class="tab-pane fade" id="nav-dce" role="tabpanel" aria-labelledby="nav-dce-tab" tabindex="0"><?php include("student/dcea.php"); ?></div>
  <div class="tab-pane fade" id="nav-dcee" role="tabpanel" aria-labelledby="nav-dcee-tab" tabindex="0"><?php include("student/dcee.php"); ?></div>
  <div class="tab-pane fade" id="nav-diet" role="tabpanel" aria-labelledby="nav-diet-tab" tabindex="0"><?php include("student/diet.php"); ?></div>
  <div class="tab-pane fade" id="nav-dit" role="tabpanel" aria-labelledby="nav-dit-tab" tabindex="0"><?php include("student/dit.php"); ?></div>
 
  <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div> 
</div>
		</main>
	</div>

	</div>
	</div>

<div class="position-fixed bottom-0 end-0 bg-secondary-subtle" id="ct6" style="font-size: 16px"></div>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src='../node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>

</body>
<script>
	$(document).ready(function() {
        $('#toExcel').click(function() {
    window.location.href = 'excel_emailS.php';
    return false;
});
	});
</script>

<script>
	$(document).ready(function() {
        $('#toManual').click(function() {
    window.location.href = 'manualAddS.php';
    return false;
});
	});
</script>

<script>
	const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>



<script>
	function search_student(){
		let input = document.getElementById('search_student').value 
    input=input.toLowerCase(); 
    head= document.getElementsByTagName("thead");
  w = document.getElementById("myTable");
  v = w.getElementsByTagName("tbody");
    let x = w.getElementsByTagName('tr'); 
	for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
            x[i].style.display="";
			                
        } 
    } 
	}
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
