<?php
require ("dbcon.php");
date_default_timezone_set('Asia/Manila');?>
<?php 
				$me = $user1['studentNum'];
				//echo strtoupper($fname)." ".strtoupper($lname); ?>   
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="ODMS Logo.png">

    <title>Documents</title>

	<link rel="stylesheet" href="bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">

	<style>
		#status{
          pointer-events: none; /* Prevent mouse interaction */
           opacity: 0.5;         /* Make them appear dimmed */
        }
	</style>
</head>
 
<body style="background-color: #E4E4E4" onload=display_ct6()>
<nav class="navbar fixed-top shadow-lg" style="background-color: #ec6d18; color: white; top: 0; width: 100%; height: auto; ">
	<div class="d-flex flex-row container-fluid">
    	<button class="navbar-toggler d-lg-none d-inline-block align-text-top" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"> 
			<i class="bi bi-list"></i>
		</button>
		<a class="navbar-brand ms-1 p-0 me-0 me-lg-2" href="index.php" aria-label="odms">
			<img src="uploads/cvsu.png" width="58" height="55" class="align-top" alt="">
			<img src="uploads/ODMS logo.png" width="65" height="65" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
		</a>
		
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
	 	<div class="col-md-2 justify-content-start position-relative" >
	   		<aside class="bd-sidebar">
	     	<div class="offcanvas-lg offcanvas-start" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" style="background-color: #E4E4E4">
			<div class="offcanvas-header bg-secondary">
				<h4 class="offcanvas-title" id="offcanvasResponsiveLabel">Online Document Monitoring System</h6>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
			</div>

			<div class="offcanvas-body bg-secondary">
			  <nav class="nav nav-underline">
				<ul class="bd-links-nav list-unstyled mb-0 pb-5 pb-md-2 pe-lg-1" style="height:100vh; overflow: auto; position:fixed; font-size: 15px"> 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="index.php" class="nav-link text-decoration-none link-warning text-dark"><i class="bi bi-house" ></i>&nbsp Dashboard</a></li>
					
					<li></li>
 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="documentChoice.php" class="nav-link active text-decoration-none" style="color:#ec6d18"><i class="bi bi-file-text"></i>&nbsp Documents &nbsp &nbsp &nbsp</a></li>

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

		<div class="col-md-10 mt-1 shadow overflow-y-auto">
			<main class="bd-main order-1" id="main">   
			
			<p class="fw-bolder fs-2 text-center" style="letter-spacing: 2px">Documents</p>
     		 <hr  style="border-top: 2px solid black" />

<br>

<div class="d-flex bg-white w-50 border border-secondary-subtle">
<i class="bi bi-search text-secondary pt-1 ps-2"></i> 
<input type="text" name="search" onkeyup="search_document()" id="search_docu" class="form-control border border-0 w-100" placeholder="Search...">
			</div> 
<br> 

<div class="container text-white" id="area">
<table class='table info table-responsive- table-bordered border-dark' id="hello">
          <thead class="table-dark align-middle text-center" id="dark" style="text-align:left">
          <tr>
		  		<td>Date Created</td>
                <td>Document Reference ID</td>
                <td>Name/ Title</td>
                <td>Submitted To</td>
                <td>Type </td>
                <td>Status</td>
                <td>Remarks</td>
				<td>Last Updated</td>
				<td colspan="4">Action</td>
				
              
              </tr>
          </thead>
      <tbody class="align-middle" id="table-data" style="font-size:14px">
      <?php 
	  		$query = "SELECT * FROM users_documents WHERE FIND_IN_SET('$me',documentOwner) AND (documentType = 'journal' OR documentType='thesis')";
		  	$result = mysqli_query($conn,$query);  
			if (mysqli_num_rows($result) > 0){	
				while($row = mysqli_fetch_array($result)){
				$teacher = $row['submittedTo'];
				$prof = "SELECT facultyFname, facultyMname, facultyLname FROM faculty_info WHERE facultyID = '$teacher'";
				$prof_run = mysqli_query($conn,$prof);
				$ano = mysqli_fetch_array($prof_run);						
				
				echo'<tr class="info">'; ?>
				 	<td><?php echo date('F j, Y, g:i a', strtotime($row['date_created']));?></td>
			<?php	echo ('
							
					<td class="fst-italic fw-bold documentID" >' . $row['documentID'] . '</td> 
					<td style="width: 15%">' . $row['documentName'] . '</td>') ;
					if($ano == null){
						echo'<td>Not submitted yet</td>';
					}else{		 
						echo '<td>' . $ano['facultyFname'] . ' ' . $ano['facultyMname'] . ' ' . $ano['facultyLname'] . '</td>';
					}
					echo "<td>";
					if($row['documentType'] == 'thesis'){
						echo "Thesis/ Capstone Project/ Manuscript";
					}
					elseif($row['documentType'] == 'journal'){
						echo "OJT Journal"; 
					}
					elseif($row['documentType'] == 'completion_form'){
						echo "Completion Form";
					}
					else{
						echo "Error";
					};	

					echo('</td> <td class="text-center" style="width:20%">'); 
					if($row['documentStatus'] == 'submitted'){
						echo '<span class="rounded p-2" style="background-color:#c2dfff; color:#004a99">Submitted</span>';
					}
					elseif($row['documentStatus'] == 'on_hand'){
						echo '<span class="rounded p-2" style="background-color:#fff494; color:#806a00;">On-Hand</span>'; 
					}
					elseif($row['documentStatus'] == 'review'){
						echo '<span class="rounded p-2" style="background-color:#ffcd85;color: #BE5504">Under Review</span>';
					}
					elseif($row['documentStatus'] == 'pick-up'){
						echo '<span class="rounded p-2" style="background-color:#d2f5b0; color: #003312">Available for pick-up</span>';
					}
					elseif($row['documentStatus'] == 'graded'){
						echo '<span class="rounded p-2" style="background-color:#d2f5b0; color: #003312">Graded</span>';
					}
					elseif($row['documentStatus'] == 'created'){
						echo '<span class="rounded p-2" style="background-color:#AFDCEB; color: #144252">Created</span>';
					}
					elseif($row['documentStatus'] == 'return'){
						echo '<span class="rounded p-2" style="background-color:#c9ccc4; color: #232023">Returned</span>';
					}
					elseif($row['documentStatus'] == 'signed'){
						echo '<span class="rounded p-2" style="background-color:#d2f5b0; color: #003312">Signed</span>';
					}
					elseif($row['documentStatus'] == 'to_chairperson'){
						echo '<span class="rounded p-2" style="background-color:#c2dfff; color:#004a99">Received (Chairperson)</span>';
					}
					elseif($row['documentStatus'] == 'to_registrar'){
						echo '<span class="rounded p-2" style="background-color:#c2dfff; color:#004a99">Received (College Registrar)</span>';
					}
					elseif($row['documentStatus'] == 'to_dean'){
						echo '<span class="rounded p-2" style="background-color:#c2dfff; color:#004a99">Received (Dean)</span>';
					}
					elseif($row['documentStatus'] == 'to_uregistrar'){
						echo '<span class="rounded p-2" style="background-color:#c2dfff; color:#004a99">Forwarded to University Registrae</span>';
					}
					elseif($row['documentStatus'] == 'to_research'){
						echo '<span class="rounded p-2" style="background-color:#c2dfff; color:#004a99">Received (Research COORD.)</span>';
					}
					elseif($row['documentStatus'] == null){
						echo '<span>Not Submitted Yet</span>';
					}
					else{
						echo "Error";
					}; 
										
					echo('</td>');
					
					?>
				
				<?php	echo('
					<td>' . $row['remarks'] . '</td>');?>
					<td><?php echo date('F j, Y, g:i a', strtotime($row['date']));?></td>
					
					
					<td colspan="4">
				<?php	if($row['documentType'] == 'completion_form'){
						echo('
							<div class="d-flex m-1">
							<i class="text-secondary"style="font-size: 12px">For viewing only</i>
							</td>
							</div>');

					}elseif($row['documentType'] == 'journal'){
						echo '<div class="d-flex">';
						

						if ($row['documentStatus'] == 'on-hand' || $row['documentStatus'] == 'review' || $row['documentStatus'] == 'submitted'){
							echo'<a class="btn btn-primary btn-sm" id="status" href="edit-document.php?id=' . $row["id"] . '" type="button" style="font-size:12px"> <i class="bi bi-pencil-square"></i></a>&nbsp
							<button class="btn btn-danger btn-sm"id="status" type="button" onclick="deleteData(' . $row["id"] . ')" style="font-size:12px"> <i class="bi bi-trash3" ></i></button>
							</div>
							</td>
							'; 
						}
						elseif ($row['documentStatus'] == 'graded'){
							echo'<a class="btn btn-primary btn-sm" id="status" href="edit-document.php?id=' . $row["id"] . '" type="button" style="font-size:12px"> <i class="bi bi-pencil-square"></i></a>&nbsp
							<button class="btn btn-danger btn-sm" type="button" onclick="deleteData(' . $row["id"] . ')" style="font-size:12px"> <i class="bi bi-trash3" ></i></button>
							</div>
							</td>
							'; 
						}else{
							echo'<a class="btn btn-primary btn-sm"  href="edit-document.php?id=' . $row["id"] . '" type="button" style="font-size:12px"> <i class="bi bi-pencil-square"></i></a>&nbsp
							<button class="btn btn-danger btn-sm" type="button" onclick="deleteData(' . $row["id"] . ')" style="font-size:12px"> <i class="bi bi-trash3" ></i></button>
							</div>
							</td>
							'; 
						}
					
					}else{
						echo '
							<div class="d-flex">';
							
							
							if($row['documentStatus'] == 'submitted' ||$row['documentStatus'] == 'on_hand' || $row['documentStatus'] == 'review'){
							echo'<a class="btn btn-primary btn-sm" id="status" href="edit-document.php?id=' . $row["id"] . '" type="button" style="font-size:12px"> <i class="bi bi-pencil-square"></i></a>&nbsp
							<button class="btn btn-danger btn-sm"id="status" type="button" onclick="deleteData(' . $row["id"] . ')" style="font-size:12px"> <i class="bi bi-trash3" ></i></button>
							</div>
							</td>
							'; }
							else{
								echo'<a class="btn btn-primary btn-sm"  href="edit-document.php?id=' . $row["id"] . '" type="button" style="font-size:12px"> <i class="bi bi-pencil-square"></i></a>&nbsp
							<button class="btn btn-danger btn-sm" type="button" onclick="deleteData(' . $row["id"] . ')" style="font-size:12px"> <i class="bi bi-trash3" ></i></button>
							</div>
							</td>
							'; 
							}
	
					}
					
				}			
				}else{?> 
                
                  <td colspan='12' class="text-center">NO RESULTS FOUND</td>
				  </tr>
           <?php } ?>
		</tbody>
</table>



</div> 
<br>
<div class="container text-black" id="area1">

<div class="fw-bolder fs-5" style="color:#ec6d18">Completion Form</div>

	<table class='table info table-responsive- table-bordered border-dark text-center align-middle' id="hello1">
		<thead class="align-middle text-center table-dark" id="dark1" style="text-align:left;">
          <tr>
		  		<th>Date Created</th>
                <th>ID</th>
				<th>Semester / A.Y</th>
                <th>Subject</th>
                <th>Submitted To</th>
                <th>Status</th>
                <th>Remarks</th>
				<th>Last Updated</th>         
            </tr>
        </thead>

		<tbody id="table-data1" style="font-size:14px;">
		<?php 
	  		$query1 = "SELECT * FROM completion WHERE FIND_IN_SET('$me',documentOwner)";
		  	$result1 = mysqli_query($conn,$query1);  
			if (mysqli_num_rows($result1) > 0){	
				while($row1 = mysqli_fetch_array($result1)){
				$teachers = $row1['submittedTo'];
				$profs = "SELECT facultyFname, facultyMname, facultyLname FROM faculty_info WHERE facultyID = '$teachers'";
				$prof_runs = mysqli_query($conn,$profs);
				$anos = mysqli_fetch_array($prof_runs);	?>					
				<tr class="info">
					<td><?php echo date('F j, Y, g:i a', strtotime($row1['date_created']));?></td>
				<td class="fw-bolder">
					<?php echo $row1['documentID'] ?>
				</td>
				<td>
					<?php
					if($row1['semester']== 'first'){
						$sem = 'First';
					}
					elseif($row1['semester'] == 'second'){
						$sem = 'Second';
					}
					echo $sem . " / " . $row1['academic_year'];?>
				</td>

				<td>
					<?php 
					echo $row1['subjectCode']; ?>
				</td>

				<td>
					<?php 
					if($teachers == "None"){
						echo "Submitted to University Registrar";
					}else{
					echo $anos['facultyFname'] . ' ' . $anos['facultyLname'] . ' ';}?>
				</td>

				<td style="width: 25%">
					<?php 
					if($row1['documentStatus'] == 'submitted'){
						echo '<span class="rounded p-1" style="background-color:#c2dfff; color:#004a99">Submitted</span>';
					}
					elseif($row1['documentStatus'] == 'on_hand'){
						echo '<span class="rounded p-1" style="background-color:#fff494; color:#806a00;">On-Hand</span>'; 
					}
					elseif($row1['documentStatus'] == 'review'){
						echo '<span class="rounded p-1" style="background-color:#ffcd85;color: #BE5504">Under Review</span>';
					}
					elseif($row1['documentStatus'] == 'pick-up'){
						echo '<span class="rounded p-1" style="background-color:#d2f5b0; color: #003312">Available for pick-up</span>';
					}
					elseif($row1['documentStatus'] == 'graded'){
						echo '<span class="rounded p-1" style="background-color:#d2f5b0; color: #003312">Graded</span>';
					}
					elseif($row1['documentStatus'] == 'created'){
						echo '<span class="rounded p-1" style="background-color:#AFDCEB; color: #144252">Created</span>';
					}
					elseif($row1['documentStatus'] == 'return'){
						echo '<span class="rounded p-1" style="background-color:#c9ccc4; color: #232023">Returned</span>';
					}
					elseif($row1['documentStatus'] == 'signed'){
						echo '<span class="rounded p-1" style="background-color:#d2f5b0; color: #003312">Signed</span>';
					}
					elseif($row1['documentStatus'] == 'to_chairperson'){
						echo '<span class="rounded p-1" style="background-color:#c2dfff; color:#004a99">Forwarded To Chairperson</span>';
					}
					elseif($row1['documentStatus'] == 'to_registrar'){
						echo '<span class="rounded p-1" style="background-color:#c2dfff; color:#004a99">Forwarded To  College Registrar</span>';
					}
					elseif($row1['documentStatus'] == 'to_dean'){
						echo '<span class="rounded p-1" style="background-color:#c2dfff; color:#004a99">Forwarded To  Dean</span>';
					}
					elseif($row1['documentStatus'] == 'to_uregistrar'){
						echo '<span class="rounded p-1" style="background-color:#c2dfff; color:#004a99">Forwarded To  Univ. Registrar</span>';
					}
					elseif($row1['documentStatus'] == 'to_research'){
						echo '<span class="rounded p-1" style="background-color:#c2dfff; color:#004a99">Forwarded To  Research COORD.</span>';
					}
					elseif($row1['documentStatus'] == null){
						echo '<span>Not Submitted Yet</span>';
					}
					else{
						echo "Error";
					}; ?>
				</td>
				
				<td>
					<?php echo $row1['remarks'] ?>
				</td>
				<td><?php echo date('F j, Y, g:i a', strtotime($row1['date_created']));?></td>
				</tr>
				
				
				
				
				
				<?php }
			}else{?>

					<tr>
						<td colspan="8" class="text-center"> No Completion Form Found</td>
					</tr>

			<?php	}?>
		</tbody>
	</table>



</div>

</main>
</div>
</div>
</div>
<?php require "add_documentS.php" ?>
<?php require "edited.php" ?>



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


<!-- ========== Search ========== -->
<script>
	function search_document(){
		let input = document.getElementById('search_docu').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('info'); 
	for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
			x[i].style.listStyleType="none"; 
            x[i].style.display="table-row";
			                
        } 
    } 
	};
</script>


<!-- ========== Real-time Table Reload  ========== -->
<script>
	$(document).ready(function() {
    setInterval(function() {
		$("#hello").load("documentChoice.php #hello > #dark, #table-data");
    }, 2000); // Update every 1 second
});
</script>
<script>
	$(document).ready(function() {
    setInterval(function() {
		$("#hello1").load("documentChoice.php #hello1 > #dark1, #table-data1");
    }, 2000); // Update every 1 second
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
</body>
</html>