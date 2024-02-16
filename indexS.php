<?php
require ("dbcon.php");
date_default_timezone_set('Asia/Manila');
$me = $user1['studentNum'];
?>   
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="ODMS Logo.png">

    <title>Dashboard</title>
	
	
	<link rel="stylesheet" href="bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>
 
<body style="background-color: #E4E4E4" onload=display_ct6()>
<nav class="navbar fixed-top shadow-lg" style="background-color: #ec6d18; color: white; top: 0; width: 100%; height: auto;">
	<div class="d-flex flex-row container-fluid">
    	<button class="navbar-toggler d-lg-none d-inline-block align-text-top" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"> 
			<i class="bi bi-list"></i>
		</button>
		<a class="navbar-brand ms-1 p-0 me-0 me-lg-2" href="index.php" aria-label="odms">
			<img src="uploads/cvsu.png" width="58" height="55" class="align-top" alt="">
			<img src="uploads/ODMS logo.png" width="65" height="65" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
		</a>
		<div class="d-inline-block align-text-top fs-6 text-white w-25">
			<input type="text" name="search_bar" onkeyup="search_home()" id="search_index" class="form-control" placeholder="Search">
		</div>
		<div class="d-inline-block align-text-top me-1 fs-6 text-white">
			<a href="profile.php?url=<?php echo $user1['studentID'] . '%'.$user1['urlAddress']?>" class="text-white" style="text-decoration:none">
			  <?php 	
					$fname = $user1['studentFname'];
					$lname = $user1['studentLname'];
					$image = $user1['profile_image'];
					echo strtoupper($fname)." ".strtoupper($lname);?> &nbsp&nbsp
					<?php
					if($image == null){

						
						$output = '<img src="uploads/unknown.jpg" style="height:40px;width:40px;border-radius: 50%" alt="..." >';

						echo $output;
					}
					else{
						echo '<img src="temp/' .$image.'"style="height:40px;width:40px;border-radius: 50%" alt="..." >';

						
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
	 	<div class="col-md-2 justify-content-start position-relative float-left " >
	   		<aside class="bd-sidebar">
	     	<div class="offcanvas-lg offcanvas-start" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" style="background-color: #E4E4E4">
			<div class="offcanvas-header">
				<h4 class="offcanvas-title" id="offcanvasResponsiveLabel">Online Document Monitoring System</h6>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
			</div>

			<div class="offcanvas-bodyS">
			  <nav class="nav nav-underline">
				<ul class="bd-links-nav list-unstyled mb-0 pb-5 pb-md-2 pe-lg-1" style="height:100vh; overflow: auto; position:fixed; font-size: 15px"> 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="index.php" class=" nav-link active text-decoration-none" style="color:#ec6d18"><i class="bi bi-house" ></i>&nbsp Dashboard &nbsp &nbsp &nbsp &nbsp</a></li>
					
					<li></li>
 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="documentChoice.php" class="nav-link text-decoration-none link-warning text-dark"><i class="bi bi-file-text"></i>&nbsp Documents</a></li>

					<li></li>
					
					<li class="bd-links-group py-2 px-3 border-0 "><a href="history.php" class="nav-link text-decoration-none link-warning text-dark"><i class="bi bi-layout-text-sidebar-reverse"></i>&nbsp Monitor</a></li>

					<li></li>
				
					<li class="bd-links-group py-2 px-3 border-0 "><a onclick="logout()" class="nav-link text-decoration-none link-warning text-dark"><i class="bi bi-box-arrow-right"></i>&nbsp Log out</a></li>

				</ul>
			  </nav>
			</div>
		 </div>		
	    </aside>
		</div> 
		<div class="col-md-10 mt-1 shadow">
			<main class="bd-main order-1" id="main">   
			
				<br>
				<?php      
				$conn = mysqli_connect("localhost","root","","odms");
				
				$student_query = "SELECT * FROM student_info";
				$studentrun = mysqli_query($conn,$student_query);
				$student = $user1['studentNum'];
				$query1 = "SELECT * FROM users_documents WHERE FIND_IN_SET('$student',documentOwner)";
				$result1 = mysqli_query($conn,$query1);
				$rowres = mysqli_fetch_array($result1);
				$query = "SELECT * FROM users_documents WHERE FIND_IN_SET('$student',documentOwner) AND documentType='thesis'";
				$result = mysqli_query($conn,$query);
				//$row = mysqli_fetch_array($result);
				$query2 = "SELECT * FROM users_documents WHERE documentOwner = '$me' AND documentType = 'journal'";
				$result2 = mysqli_query($conn,$query2);
				$query3 = "SELECT * FROM completion WHERE FIND_IN_SET('$student',documentOwner)";
				$result3 = mysqli_query($conn,$query3);
				
			?>
				
					<div class="card border-dark border-2 mb-5" id="main2">
						<div class="card-header border-dark border-2 fw-bolder"style="font-size: 16px">Thesis/Capstone Project/ Manuscript</div>
						<div class="card-body border-secondary border-2 fw-bolder fs" id="body1">
						<div class="card-title less" style="color:#ec6d18; font-size: 25px;" id="name1">
							<?php if(mysqli_num_rows($result) > 0){
								$rowres = mysqli_fetch_assoc($result);
								echo $rowres['documentName'];
							?>
						</div>
								<p class="card-text lh-1" id="id1"><br>Reference ID: <span style="color:#ec6d18"><?=$rowres['documentID'];?></span></p>
							<p class="card-text lh-1"  id="status1">Status: <span style="color:#ec6d18"> 
							<?php 
								if($rowres['documentStatus'] == 'submitted'){
									echo "Submitted the document to " .$rowres['facultyFname'] . " " . $rowres['facultyLname']  ;
								}
								elseif($rowres['documentStatus'] == 'on_hand'){
									echo "On-hand"; 
								}
								elseif($rowres['documentStatus'] == 'review'){
									echo "Mr./Ms. "  .$rowres['facultyFname'] . " " . $rowres['facultyLname'] . " is reviewing your document";
								}
								elseif($rowres['documentStatus'] == 'pick-up'){
									echo "Your document is available for pick-up";
								}
								elseif($rowres['documentStatus'] == 'created'){
									echo "You've created your document";
								}
								elseif($rowres['documentStatus'] == 'return'){
									echo "Your document has been returned";
								}
								elseif($rowres['documentStatus'] == 'signed'){
									echo "Your document has been signed by" . $rowres['facultyFname'] . " " . $rowres['facultyLname'];
								}
								elseif($rowres['documentStatus'] == 'to_dean'){
									echo "Received by College Dean";
								}
								elseif($rowres['documentStatus'] == 'to_research'){
									echo "Received by the College Research Coordinator";
								}
								elseif($rowres['documentStatus'] == 'to_chairperson'){
									echo "Received by the Department Chairperson";
								}
								elseif($rowres['documentStatus'] == null){
									echo "Not submitted Yet";
								}
								else{
									echo "Error";
								}; 
							?>

							</span></p>
							<p class="card-text lh-1" id="remarks1">Remarks: <span style="color:#ec6d18"><i><?=$rowres['remarks'];?></i></span></p>
							<p class="card-text lh-1" id="date1">Last updated: <span style="color:#ec6d18"> <?php echo date("l, F j, Y, g:i a", strtotime($rowres['date']));?></span></p>
						</div>
					</div>
				
			<?php
				}else{
					echo "Capstone/ Thesis/ Manuscript not found\n" . 
						'<br><span class="lh-1" style="font-size: 10px; color: black">
						</span>
						</div>
						</div>
					</div>
				</a>';
					}
			?>

				<a  class="text-decoration-none pe-auto" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
					<div class="card border-dark border-2 mb-5" id="main3">
						<div class="card-header border-dark border-2 fw-bolder"style="font-size: 16px">OJT Journal</div>
						<div class="card-body border-secondary border-2 fw-bolder fs " id="body2">
						<div class="card-title less" style="color:#ec6d18; font-size: 25px;" id="name2">
							<?php if(mysqli_num_rows($result2) > 0){
								$rowres2 = mysqli_fetch_assoc($result2);
								echo $rowres2['documentName'];
							?>
						</div><br>
							<p class="card-text lh-1" id="id2"><br>Reference ID: <span style="color:#ec6d18"><?=$rowres2['documentID'];?></span></p>
							<p class="card-text lh-1" id="status2">Status: <span style="color:#ec6d18"> 
							<?php 
								if($rowres2['documentStatus'] == 'submitted'){
									echo "Submitted the document to " .$rowres2['facultyFname'] . " " . $rowres2['facultyLname']  ;
								}
								elseif($rowres2['documentStatus'] == 'on_hand'){
									echo "On-hand"; 
								}
								elseif($rowres2['documentStatus'] == 'review'){
									echo "Prof. "  .$rowres2['facultyFname'] . " " . $rowres2['facultyLname'] . " is reviewing your document";
								}
								elseif($rowres2['documentStatus'] == 'pick_up'){
									echo "Your document is available for pick-up";
								}
								elseif($rowres2['documentStatus'] == 'created'){
									echo "You've created your document";
								}
								elseif($rowres2['documentStatus'] == 'return'){
									echo "Your document has been returned";
								}
								elseif($rowres2['documentStatus'] == null){
									echo "Not submitted Yet";
								}
								else{
									echo "Error";
								}; 
							?>

							</span></p>
							<p class="card-text lh-1" id="remarks2">Remarks: <span style="color:#ec6d18"><i><?=$rowres2['remarks'];?></i></span></p>
							<p class="card-text lh-1" id="date2">Last updated: <span style="color:#ec6d18"> <?php echo date("l, F j, Y, g:i a", strtotime($rowres2['date']));?></span></p>
						</div>
					</div>
				</a>
			<?php
				}else{
					echo "OJT Journal not found\n" . 
						'<br><span class="lh-1" style="font-size: 10px; color: black">
						</span>
						</div>
						</div>
					</div>
				</a>';
				}
			?>

				<div>	
					<div class="card border-dark border-2 mb-5" id="main4">
						<div class="card-header border-dark border-2 fw-bolder"style="font-size: 16px">Completion Form</div>
						<?php 
							if(mysqli_num_rows($result3) > 0){
							while($rowres3 = mysqli_fetch_array($result3)){
								
								
						?>
						<div class="card-body border-secondary border-2 fw-bolder fs" id="body3">
						<div class="card-title less " style="color:#ec6d18; font-size: 25px;" id="name3">
						<?=$rowres3['subjectCode'];?>
						</div>
							<p class="card-text lh-1" id="id3"><br>Reference ID: <span style="color:#ec6d18"><?=$rowres3['documentID'];?></span></p>
							<p class="card-text lh-1" id="status3">Status: <span style="color:#ec6d18"> 
							<?php 
								if($rowres3['documentStatus'] == 'submitted'){
									echo "Submitted the document to " .$rowres3['facultyFname'] . " " . $rowres3['facultyLname']  ;
								}
								elseif($rowres3['documentStatus'] == 'on_hand'){
									echo "On-hand"; 
								}
								elseif($rowres3['documentStatus'] == 'review'){
									echo "Prof. "  .$rowres3['facultyFname'] . " " . $rowres3['facultyLname'] . " is reviewing your document";
								}
								elseif($rowres3['documentStatus'] == 'pick_up'){
									echo "Your document is available for pick-up";
								}
								elseif($rowres3['documentStatus'] == 'created'){
									echo "Completion Form created";
								}
								elseif($rowres3['documentStatus'] == 'return'){
									echo "Your document has been returned";
								}
								elseif($rowres3['documentStatus'] == null){
									echo "Not submitted Yet";
								}
								elseif($rowres['documentStatus'] == 'signed'){
									echo $rowres['facultyFname'] . " " . $rowres['facultyLname'] . " signed your document";
								}
								elseif($rowres['documentStatus'] == 'to_dean'){
									echo "Received by College Dean";
								}
								elseif($rowres['documentStatus'] == 'to_uregistrar'){
									echo "Received by University Registrar";
								}
								elseif($rowres['documentStatus'] == 'to_chairperson'){
									echo "Received by the Department Chairperson";
								}
								else{
									echo "Error";
								}; 
							?>

							</span></p>
							<p class="card-text lh-1" id="remarks3">Remarks: <span style="color:#ec6d18"><i><?=$rowres3['remarks'];?></i></span></p>
							<p class="card-text lh-1" id="date3">Last updated: <span style="color:#ec6d18"> <?php echo date("l, F j, Y, g:i a", strtotime($rowres3['date']));?></span></p>
						<?php
				
						}
					}else{
						echo '<div class="card-title less fw-bolder p-3" style="color:#ec6d18; font-size: 25px;" id="name3">Completion not found</div>' . 
						'<span class="lh-1" style="font-size: 10px; color: black">
						</span>'
						;
					}
			?></div> <br>
					</div>			
				</div>
		</main>
		</div>
</div>
<?php require "add_documentS.php" ?>




<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src='node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>

<!-- ========== Real-time clock ========== -->
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

<!-- ========== Real-time reload ========== -->
<script>
	$(document).ready(function() {
  setInterval(function() {
    $("#body1").load("index.php #body1 > #id1, #status1, #remarks1, #date1, #name1")
  }, 5000); // Reload every 2 seconds
});
</script>

<script>
		$(document).ready(function() {
  setInterval(function() {
    $("#body2").load("index.php #body2 > #id2, #status2, #remarks2, #date2, #name2")
  }, 5000); // Reload every 2 seconds
});
</script>

<script>
	$(document).ready(function() {
  setInterval(function() {
    $("#body3").load("index.php #body3 > #id3, #status3, #remarks3, #date3, #name3")
  }, 500); // Reload every 2 seconds
});
</script>

<!-- ========== Search ========== -->
<script>
	function search_home(){
		let input = document.getElementById('search_index').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('card'); 
	for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
			x[i].style.listStyleType="none"; 
            x[i].style.display="block";
			                
        } 
    } 
	};
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
</body>
</html>