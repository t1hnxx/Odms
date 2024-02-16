<?php require "dbcon.php"; ?>
<!DOCTYPE html>
<head>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="ODMS Logo.png">

    <title>Dashboard</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit">
	<link rel="stylesheet" href="bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">

	<style>
.nav-pills>button.active,
.nav-pills>button:hover,
.nav-pills>button:focus {
  background-color: #ec6d18!important;
  color: white!important;
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
			<img src="uploads/cvsu.png" width="60" height="55" class="align-top" alt="">
			<img src="uploads/ODMS logo.png" width="65" height="65" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
		</a>
		<div class="d-inline-block align-text-top fs-6 text-white w-25">
			<input type="text" name="search_bar" onkeyup="search_home()" id="search_index" class="form-control" placeholder="Search">
		</div>
		<div class="d-inline-block align-text-top me-1 fs-6 text-white">
			<a href="profile.php?url=<?php echo $user['facultyID'] . '%'.$user['urlAddress']?>" class="text-white" style="text-decoration:none">
			  <?php 	
					$fname = $user['facultyFname'];
					$lname = $user['facultyLname'];
					$image = $user['Fprofile_image']; ?>
				<div class="text-uppercase"><?php echo	$fname." ".$lname;?> &nbsp&nbsp 
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
			</div></a>
		</div>	
	</div>      	
</nav>
	
<br><br><br>

	<div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout">
	<div class="row">
	 	<div class="col-md-2 justify-content-start" style="overflow: auto;">
	   <aside class="bd-sidebar">
	     <div class="offcanvas-lg offcanvas-start" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" style="background-color: #E4E4E4">
			<div class="offcanvas-header">
				<h4 class="offcanvas-title" id="offcanvasResponsiveLabel">Online Document Monitoring System</h6>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
			</div>

			<div class="offcanvas-body">
			  <nav class="nav nav-underline">
			  <ul class="bd-links-nav list-unstyled mb-0 pb-5 pb-md-2 pe-lg-1" style="height:100vh; overflow: auto; position:fixed; font-size: 15px"> 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="index.php" class="nav-link active text-decoration-none" style="color:#ec6d18"><i class="bi bi-house" ></i>&nbsp Dashboard &nbsp &nbsp &nbsp</a></li>
					
					<li></li>
 
					<li class="bd-links-group py-2 px-3 border-0 " id="bilang"><a href="documentChoice.php" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-file-text"></i>&nbsp Documents
					<?php
					 $faculty = $user['facultyID'];

					$checked = "SELECT COUNT(*) AS submit FROM document WHERE documentStatus = 'submitted' AND submittedTo = '$faculty'";
					$havechecked = mysqli_query($conn,$checked);	
						$count = mysqli_fetch_assoc($havechecked)['submit']; 
						if ($count > 0){?>		
									
							<span class="badge text-bg-danger"><?php echo $count;?></span>
				<?php } ?>
					
					</a></li><li></li>
					
					<li class="bd-links-group py-2 px-3 border-0 "><a href="history.php" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-layout-text-sidebar-reverse"></i>&nbsp Monitor</a></li>

					<li></li>
				
					<li class="bd-links-group py-2 px-3 border-0 "><a onclick="logout()" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-box-arrow-right"></i>&nbsp Log out</a></li>

				</ul>
			  </nav>
			</div>
		 </div>		
	    </aside>
	 </div>



	 
	 
	 <div class="col-md-10 mt-1 shadow">
	    <main class="bd-main order-1">     
		<?php 
		$student_query = "SELECT * FROM student_info";
		$studentrun = mysqli_query($conn,$student_query);

       
       
		$query1 = "SELECT * FROM document WHERE submittedTo = '$faculty'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);

        $query = "SELECT documentType, COUNT(*) as total_thesis FROM document WHERE submittedTo = '$faculty' AND documentType='thesis'";
        $result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		$query2 = "SELECT documentType, COUNT(*) as total_journal FROM document WHERE submittedTo = '$faculty' AND documentType = 'journal'";
        $result2 = mysqli_query($conn,$query2);
		$row2 = mysqli_fetch_assoc($result2);

		$query3 = "SELECT documentType, COUNT(*) as total_completion FROM document WHERE submittedTo = '$faculty' AND documentType = 'completion_form'";
        $result3 = mysqli_query($conn,$query3);
		$row3 = mysqli_fetch_assoc($result3);	

       ?>
    	<div style="color: white"class="search-me">	
			<hr style="height:2px;border-width:0;color:white;background-color:white">
			<div class="overflow-x-auto">		
				<div class="row">
	  
				<div class="col-sm-4">
					<?php					
					$query = "SELECT documentType, COUNT(*) as total_thesis FROM users_documents WHERE submittedTo = '$faculty' AND documentType='thesis'"; 
					$result = mysqli_query($conn,$query);
					
					
					$prof1 = "SELECT documentType, COUNT(*) as total_submitted FROM users_documents WHERE submittedTo = '$faculty' AND documentType='thesis'  AND documentStatus = 'submitted'";
					$profrun1 = mysqli_query($conn,$prof1);
					$profrow1 = mysqli_fetch_assoc($profrun1); 

					$query3 = "SELECT documentType, COUNT(*) as total_review FROM users_documents WHERE submittedTo = '$faculty' AND documentType='thesis' AND documentStatus = 'review'";
					$result3 = mysqli_query($conn,$query3);
					$profrow3 = mysqli_fetch_assoc($result3);

					$query4 = "SELECT documentType, COUNT(*) as total_pickup FROM users_documents WHERE submittedTo = '$faculty' AND documentType='thesis' AND documentStatus = 'pick-up'";
					$result4 = mysqli_query($conn,$query4);
					$profrow4 =  mysqli_fetch_assoc($result4);
						
					$prof5 = "SELECT documentType, COUNT(*) as total_onhand FROM users_documents WHERE submittedTo = '$faculty' AND documentType='thesis'  AND documentStatus = 'on_hand'";
					$profrun5 = mysqli_query($conn,$prof5);
					$profrow5 = mysqli_fetch_assoc($profrun5); 
					?>

						<a  class="text-decoration-none pe-auto" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
							
						<div class="card bg-secondary-subtle border-dark">
						<div class="card-header border-dark border-2 fw-bolder"style="font-size: 16px">Thesis/Capstone Project/ Manuscript</div>
						<div class="card-body lh-1" id="body1">
						<h3 class="card-title" style="color:#ec6d18; font-size: 60px; text-align: center" id="total1"><?php echo $row['total_thesis'];?> </h3>
							<p class="card-text lh-1" id="sbmtd1">Submitted by Students: <span style="color:#ec6d18"> <?php echo $profrow1['total_submitted'];?></span></p>
							<p class="card-text lh-1" id="oh1">On-hand: <span style="color:#ec6d18"> <?php echo $profrow5['total_onhand'];?></span></p>
							<p class="card-text lh-1" id="rv1">Under Review: <span style="color:#ec6d18"> <?php echo $profrow3['total_review'];?></span></p>
							<p class="card-text lh-1" id="pu1">For Pick-up: <span style="color:#ec6d18"> <?php echo $profrow4['total_pickup'];?></span></p>
						</div>
						</div></a>
					</div>

					<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
							<div class="modal-content rounded-0">
							<div class="modal-header">
								<h1 class="modal-title fs-5 text-dark" id="exampleModalToggleLabel">Thesis/Capstone Project/Manuscript</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
				<div class="modal-body">

				<div class=" d-flex align-items-start">
				<div class="nav col-sm-2 flex-column nav-pills me-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true" style="color:#ec6d18">Submitted</button>
					<button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" style="color:#ec6d18">On-hand</button>
					<button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false" style="color:#ec6d18">Under Review</button>
					<button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false" style="color:#ec6d18">For Pick-up</button>
				</div>
				<div class="tab-content col-sm-10" id="v-pills-tabContent">

					<div class="tab-pane fade show active text-dark" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
						<?php 
							$thesiss = "SELECT * FROM document WHERE submittedTo = '$faculty' AND documentType='thesis'  AND documentStatus = 'submitted' ORDER BY date DESC";
							$thesissR = mysqli_query($conn,$thesiss);

							if(mysqli_num_rows($thesissR) > 0){
								while($row = mysqli_fetch_array($thesissR)){?>
								<a class="text-decoration-none text-dark" href="edit-document.php?id=<?php echo $row['id']?>">	
								<div class="border-bottom border-secondary-subtle border-2 p-2 ">
									<span class="lh-2 fw-bold" style="color:#ec6d18;letter-spacing: 0.5px"><?= $row['documentName']; ?></span> &nbsp
									<span class="lh-2 fw-bold">(  <?= $row['documentID']; ?> )</span><br>
									<span class="lh-2" style="font-size:14px">
									<?php
										$owner = $row['documentOwner'];
										$array = explode(",", $owner);
										$name = [];
									
									
											foreach ($array as $number) {
												$inner = "SELECT studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$number'";
												$result_inner = $conn->query($inner);
					
												if ($result_inner->num_rows > 0) {
													$row_inner = $result_inner->fetch_assoc();
					
													// Check for imploded data using a delimiter (e.g., comma):
													$delimiter = ',';  // Adjust the delimiter if needed
													if (strpos($owner, $delimiter) !== false) {
														// Implode data found:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names[] = $full_name;
														
													} else {
														// Single value:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names = [$full_name];
													}
												} else {
													// Handle the case where student number is not found
													$student_names[] = "Student not found";
												}
											}
									?>
									Document Author: <?php echo implode(", ", $student_names); ?>
								</span><br>
									<i class="text-muted ms-2" style="font-size:10px">Last Updated: <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 

								</div>
								</a>
						<?php	}}else{?>
								<div class="border-bottom border-secondary border-3 p-2 m-2">
									There are no submitted documents, Kindly check in other Status 

								</div>
							<?php }
						
						?>
					</div>

					<div class="tab-pane fade text-dark" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
					<?php 
							$thesiso = "SELECT * FROM users_documents WHERE submittedTo = '$faculty' AND documentType='thesis'  AND documentStatus = 'on_hand' ORDER BY date DESC";
							$thesisoR = mysqli_query($conn,$thesiso);

							if(mysqli_num_rows($thesisoR) > 0){
								while($row = mysqli_fetch_array($thesisoR)){?>
								<a class="text-decoration-none text-dark" href="edit-document.php?id=<?php echo $row['id']?>">	
									<div class="border-bottom border-secondary-subtle border-2 p-2 ">
									<span class="lh-2 fw-bold" style="color:#ec6d18;letter-spacing: 0.5px"><?= $row['documentName']; ?></span> &nbsp
									<span class="lh-2 fw-bold">(  <?= $row['documentID']; ?> )</span><br>
									<span class="lh-2" style="font-size:14px">
									<?php
										$owner = $row['documentOwner'];
										$array = explode(",", $owner);
										$name = [];
									
									
											foreach ($array as $number) {
												$inner = "SELECT studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$number'";
												$result_inner = $conn->query($inner);
					
												if ($result_inner->num_rows > 0) {
													$row_inner = $result_inner->fetch_assoc();
					
													// Check for imploded data using a delimiter (e.g., comma):
													$delimiter = ',';  // Adjust the delimiter if needed
													if (strpos($owner, $delimiter) !== false) {
														// Implode data found:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names[] = $full_name;
														
													} else {
														// Single value:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names = [$full_name];
													}
												} else {
													// Handle the case where student number is not found
													$student_names[] = "Student not found";
												}
											}
									?>
									Document Author: <?php echo implode(", ", $student_names); ?>
								</span><br>
									<i class="text-muted ms-2" style="font-size:10px">Last Updated: <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 

								</div>
								</a>
						<?php	}}else{?>
								<div class="border-bottom border-secondary border-2 p-2 m-2">
									There are no submitted documents, Kindly check in other Status 

								</div>
							<?php }
						
						?>
					</div>

					<div class="tab-pane fade text-dark" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
					<?php 
							$thesisrv = "SELECT * FROM users_documents WHERE submittedTo = '$faculty' AND documentType='thesis'  AND documentStatus = 'review' ORDER BY date DESC";
							$thesisrvR = mysqli_query($conn,$thesisrv);

							if(mysqli_num_rows($thesisrvR) > 0){
								while($row = mysqli_fetch_array($thesisrvR)){?>
								<a class="text-decoration-none text-dark" href="edit-document.php?id=<?php echo $row['id']?>">	
								<div class="border-bottom border-secondary-subtle border-2 p-2 ">
									<span class="lh-2 fw-bold" style="color:#ec6d18;letter-spacing: 0.5px"><?= $row['documentName']; ?></span> &nbsp
									<span class="lh-2 fw-bold">(  <?= $row['documentID']; ?> )</span><br>
									<span class="lh-2" style="font-size:14px">
									<?php
										$owner = $row['documentOwner'];
										$array = explode(",", $owner);
										$name = [];
									
									
											foreach ($array as $number) {
												$inner = "SELECT studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$number'";
												$result_inner = $conn->query($inner);
					
												if ($result_inner->num_rows > 0) {
													$row_inner = $result_inner->fetch_assoc();
					
													// Check for imploded data using a delimiter (e.g., comma):
													$delimiter = ',';  // Adjust the delimiter if needed
													if (strpos($owner, $delimiter) !== false) {
														// Implode data found:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names[] = $full_name;
														
													} else {
														// Single value:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names = [$full_name];
													}
												} else {
													// Handle the case where student number is not found
													$student_names[] = "Student not found";
												}
											}
									?>
									Document Author: <?php echo implode(", ", $student_names); ?>
								</span><br>
									<i class="text-muted ms-2" style="font-size:10px">Last Updated: <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 

								</div>
								</a>
						<?php	}}else{?>
								<div class="border-bottom border-secondary border-2 p-2 m-2">
									There are no submitted documents, Kindly check in other Status 

								</div>
							<?php }
						
						?>
					</div>

					<div class="tab-pane fade text-dark" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
					<?php 
							$thesispu = "SELECT * FROM users_documents WHERE submittedTo = '$faculty' AND documentType='thesis'  AND documentStatus = 'pick-up' ORDER BY date DESC";
							$thesispuR = mysqli_query($conn,$thesispu);

							if(mysqli_num_rows($thesispuR) > 0){
								while($row = mysqli_fetch_array($thesispuR)){?>
								<a class="text-decoration-none text-dark" href="edit-document.php?id=<?php echo $row['id']?>">	
								<div class="border-bottom border-secondary-subtle border-2 p-2 ">
									<span class="lh-2 fw-bold" style="color:#ec6d18;letter-spacing: 0.5px"><?= $row['documentName']; ?></span> &nbsp
									<span class="lh-2 fw-bold">(  <?= $row['documentID']; ?> )</span><br>
									<span class="lh-2" style="font-size:14px">
									<?php
										$owner = $row['documentOwner'];
										$array = explode(",", $owner);
										$name = [];
									
									
											foreach ($array as $number) {
												$inner = "SELECT studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$number'";
												$result_inner = $conn->query($inner);
					
												if ($result_inner->num_rows > 0) {
													$row_inner = $result_inner->fetch_assoc();
					
													// Check for imploded data using a delimiter (e.g., comma):
													$delimiter = ',';  // Adjust the delimiter if needed
													if (strpos($owner, $delimiter) !== false) {
														// Implode data found:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names[] = $full_name;
														
													} else {
														// Single value:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names = [$full_name];
													}
												} else {
													// Handle the case where student number is not found
													$student_names[] = "Student not found";
												}
											}
									?>
									Document Author: <?php echo implode(", ", $student_names); ?>
								</span><br>
									<i class="text-muted ms-2" style="font-size:10px">Last Updated: <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 

								</div>
								</a>
						<?php	}}else{?>
								<div class="border-bottom border-secondary border-2 p-2 m-2">
									There are no submitted documents, Kindly check in other Status 

								</div>
							<?php }
						
						?>
					</div>
				</div>
				</div>				
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
			</div>

					<div class="col-sm-4">
						<?php					
						$dafeojt = "SELECT documentType, COUNT(*) as total_journal FROM users_documents WHERE submittedTo = '$faculty' AND documentType='journal' ";
						$resultojt = mysqli_query($conn,$dafeojt);
						$rows = mysqli_fetch_assoc($resultojt);
						
						$dafeojt1 = "SELECT documentType, COUNT(*) as total_submitted FROM users_documents WHERE submittedTo = '$faculty' AND documentType='journal' AND documentStatus = 'submitted'";
						$resultojt1 = mysqli_query($conn,$dafeojt1);
						$rows1 = mysqli_fetch_assoc($resultojt1);

						$dafeojt3 = "SELECT documentType, COUNT(*) as total_review FROM users_documents WHERE submittedTo = '$faculty' AND documentType='journal' AND documentStatus = 'review'";
						$resultojt3 = mysqli_query($conn,$dafeojt3);
						$rows3 = mysqli_fetch_assoc($resultojt3);

						$dafeojt4 = "SELECT documentType, COUNT(*) as total_graded FROM users_documents WHERE submittedTo = '$faculty' AND documentType='journal' AND documentStatus = 'graded'";
						$resultojt4 = mysqli_query($conn,$dafeojt4);
						$rows4 = mysqli_fetch_assoc($resultojt4);	
						
						$dafeojt5 = "SELECT documentType, COUNT(*) as total_onhand FROM users_documents WHERE submittedTo = '$faculty' AND documentType='journal' AND documentStatus = 'on_hand'";
						$resultojt5 = mysqli_query($conn,$dafeojt5);
						$rows5 = mysqli_fetch_assoc($resultojt5);	
						?>

						<a class="text-decoration-none pe-auto" data-bs-target="#dafej" data-bs-toggle="modal"><div class="card bg-secondary-subtle border-dark">
						<div class="card-header border-dark border-2 fw-bolder fs-5">OJT Journal</div>
						<div class="card-body lh-1" id="body2">
						<h3 class="card-title" style="color:#ec6d18; font-size: 60px; text-align: center" id="total2"><?php echo $rows['total_journal'];?></h3>
						<p class="card-text lh-1"id="sbmtd2">Submitted by Students: <span style="color:#ec6d18" > <?php echo $rows1['total_submitted'];?></span></p>
							<p class="card-text lh-1" id="oh2">On-hand: <span style="color:#ec6d18"> <?php echo $rows5['total_onhand'];?></span></p>
							<p class="card-text lh-1"id="rv2">Under Review: <span style="color:#ec6d18"> <?php echo $rows3['total_review'];?></span></p>
							<p class="card-text lh-1"id="pu2">Graded: <span style="color:#ec6d18"> <?php echo $rows4['total_graded'];?></span></p>
						</div>
						</div></a>
					</div>


					<div class="modal fade" id="dafej" aria-hidden="true" aria-labelledby="dafejLabel" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
							<div class="modal-content rounded-0 text-dark">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="dafejLabel">OJT Journal</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
				<div class="modal-body">
					
				<div class=" d-flex align-items-start">
				<div class="nav col-sm-2 flex-column nav-pills me-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<button class="nav-link active" id="v-pills-s-tab" data-bs-toggle="pill" data-bs-target="#v-pills-s" type="button" role="tab" aria-controls="v-pills-s" aria-selected="true" style="color:#ec6d18">Submitted</button>
					<button class="nav-link" id="v-pills-oh-tab" data-bs-toggle="pill" data-bs-target="#v-pills-oh" type="button" role="tab" aria-controls="v-pills-oh" aria-selected="false" style="color:#ec6d18">On-hand</button>
					<button class="nav-link" id="v-pills-rv-tab" data-bs-toggle="pill" data-bs-target="#v-pills-rv" type="button" role="tab" aria-controls="v-pills-rv" aria-selected="false" style="color:#ec6d18">Under Review</button>
					<button class="nav-link" id="v-pills-pu-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pu" type="button" role="tab" aria-controls="v-pills-pu" aria-selected="false" style="color:#ec6d18">Graded</button>
				</div>
				<div class="tab-content col-sm-10" id="v-pills-tabContent">

					<div class="tab-pane fade show active text-dark" id="v-pills-s" role="tabpanel" aria-labelledby="v-pills-s-tab" tabindex="0">
						<?php 
							$journals = "SELECT * FROM users_documents WHERE submittedTo = '$faculty' AND documentType='journal'  AND documentStatus = 'submitted' ORDER BY date DESC";
							$journalsR = mysqli_query($conn,$journals);

							if(mysqli_num_rows($journalsR) > 0){
								while($row = mysqli_fetch_array($journalsR)){?>
								<a class="text-decoration-none text-dark" href="edit-document.php?id=<?php echo $row['id']?>">		
								<div class="border-bottom border-secondary-subtle border-2 p-2 ">
									<span class="lh-2 fw-bold" style="color:#ec6d18;letter-spacing: 0.5px"><?= $row['documentName']; ?></span> &nbsp
									<span class="lh-2 fw-bold">(  <?= $row['documentID']; ?> )</span><br>
									<span class="lh-2" style="font-size:14px">
									<?php
										$owner = $row['documentOwner'];
										$array = explode(",", $owner);
										$name = [];
									
									
											foreach ($array as $number) {
												$inner = "SELECT studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$number'";
												$result_inner = $conn->query($inner);
					
												if ($result_inner->num_rows > 0) {
													$row_inner = $result_inner->fetch_assoc();
					
													// Check for imploded data using a delimiter (e.g., comma):
													$delimiter = ',';  // Adjust the delimiter if needed
													if (strpos($owner, $delimiter) !== false) {
														// Implode data found:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names[] = $full_name;
														
													} else {
														// Single value:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names = [$full_name];
													}
												} else {
													// Handle the case where student number is not found
													$student_names[] = "Student not found";
												}
											}
									?>
									Document Author: <?php echo implode(", ", $student_names); ?>
								</span><br>
									<i class="text-muted ms-2" style="font-size:10px">Last Updated: <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 

								</div>
								</a>
						<?php	}}else{?>
								<div class="border-bottom border-secondary border-3 p-2 m-2">
									There are no submitted documents, Kindly check in other Status 
								</div>
							<?php }
						
						?>
					</div>

					<div class="tab-pane fade text-dark" id="v-pills-oh" role="tabpanel" aria-labelledby="v-pills-oh-tab" tabindex="0">
					<?php 
							$journalo = "SELECT * FROM users_documents WHERE submittedTo = '$faculty' AND documentType='journal'  AND documentStatus = 'on_hand' ORDER BY date DESC";
							$journaloR = mysqli_query($conn,$journalo);

							if(mysqli_num_rows($journaloR) > 0){
								while($row = mysqli_fetch_array($journaloR)){?>
								<a class="text-decoration-none text-dark" href="edit-document.php?id=<?php echo $row['id']?>">	
								<div class="border-bottom border-secondary-subtle border-2 p-2 ">
									<span class="lh-2 fw-bold" style="color:#ec6d18;letter-spacing: 0.5px"><?= $row['documentName']; ?></span> &nbsp
									<span class="lh-2 fw-bold">(  <?= $row['documentID']; ?> )</span><br>
									<span class="lh-2" style="font-size:14px">
									<?php
										$owner = $row['documentOwner'];
										$array = explode(",", $owner);
										$name = [];
									
									
											foreach ($array as $number) {
												$inner = "SELECT studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$number'";
												$result_inner = $conn->query($inner);
					
												if ($result_inner->num_rows > 0) {
													$row_inner = $result_inner->fetch_assoc();
					
													// Check for imploded data using a delimiter (e.g., comma):
													$delimiter = ',';  // Adjust the delimiter if needed
													if (strpos($owner, $delimiter) !== false) {
														// Implode data found:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names[] = $full_name;
														
													} else {
														// Single value:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names = [$full_name];
													}
												} else {
													// Handle the case where student number is not found
													$student_names[] = "Student not found";
												}
											}
									?>
									Document Author: <?php echo implode(", ", $student_names); ?>
								</span><br>
									<i class="text-muted ms-2" style="font-size:10px">Last Updated: <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 

								</div>
								</a>
						<?php	}}else{?>
								<div class="border-bottom border-secondary border-2 p-2 m-2">
									There are no submitted documents, Kindly check in other Status 

								</div>
							<?php }
						
						?>
					</div>

					<div class="tab-pane fade text-dark" id="v-pills-rv" role="tabpanel" aria-labelledby="v-pills-rv-tab" tabindex="0">
					<?php 
							$journalrv = "SELECT * FROM users_documents WHERE submittedTo = '$faculty' AND documentType='journal'  AND documentStatus = 'review' ORDER BY date DESC";
							$journalrvR = mysqli_query($conn,$journalrv);

							if(mysqli_num_rows($journalrvR) > 0){
								while($row = mysqli_fetch_array($journalrvR)){?>
								<a class="text-decoration-none text-dark" href="edit-document.php?id=<?php echo $row['id']?>">		
								<div class="border-bottom border-secondary-subtle border-2 p-2 ">
									<span class="lh-2 fw-bold" style="color:#ec6d18;letter-spacing: 0.5px"><?= $row['documentName']; ?></span> &nbsp
									<span class="lh-2 fw-bold">(  <?= $row['documentID']; ?> )</span><br>
									<span class="lh-2" style="font-size:14px">
									<?php
										$owner = $row['documentOwner'];
										$array = explode(",", $owner);
										$name = [];
									
									
											foreach ($array as $number) {
												$inner = "SELECT studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$number'";
												$result_inner = $conn->query($inner);
					
												if ($result_inner->num_rows > 0) {
													$row_inner = $result_inner->fetch_assoc();
					
													// Check for imploded data using a delimiter (e.g., comma):
													$delimiter = ',';  // Adjust the delimiter if needed
													if (strpos($owner, $delimiter) !== false) {
														// Implode data found:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names[] = $full_name;
														
													} else {
														// Single value:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names = [$full_name];
													}
												} else {
													// Handle the case where student number is not found
													$student_names[] = "Student not found";
												}
											}
									?>
									Document Author: <?php echo implode(", ", $student_names); ?>
								</span><br>
									<i class="text-muted ms-2" style="font-size:10px">Last Updated: <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 

								</div>
								</a>
						<?php	}}else{?>
								<div class="border-bottom border-secondary border-2 p-2 m-2">
									There are no submitted documents, Kindly check in other Status 

								</div>
							<?php }
						
						?>
					</div>

					<div class="tab-pane fade text-dark" id="v-pills-pu" role="tabpanel" aria-labelledby="v-pills-pu-tab" tabindex="0">
					<?php 
							$journalpu = "SELECT * FROM users_documents WHERE submittedTo = '$faculty' AND documentType='journal'  AND documentStatus = 'graded' ORDER BY date DESC";
							$journalpuR = mysqli_query($conn,$journalpu);

							if(mysqli_num_rows($journalpuR) > 0){
								while($row = mysqli_fetch_array($journalpuR)){?>
								<a class="text-decoration-none text-dark" href="edit-document.php?id=<?php echo $row['id']?>">	
								<div class="border-bottom border-secondary-subtle border-2 p-2 ">
									<span class="lh-2 fw-bold" style="color:#ec6d18;letter-spacing: 0.5px"><?= $row['documentName']; ?></span> &nbsp
									<span class="lh-2 fw-bold">(  <?= $row['documentID']; ?> )</span><br>
									<span class="lh-2" style="font-size:14px">
									<?php
										$owner = $row['documentOwner'];
										$array = explode(",", $owner);
										$name = [];
									
									
											foreach ($array as $number) {
												$inner = "SELECT studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$number'";
												$result_inner = $conn->query($inner);
					
												if ($result_inner->num_rows > 0) {
													$row_inner = $result_inner->fetch_assoc();
					
													// Check for imploded data using a delimiter (e.g., comma):
													$delimiter = ',';  // Adjust the delimiter if needed
													if (strpos($owner, $delimiter) !== false) {
														// Implode data found:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names[] = $full_name;
														
													} else {
														// Single value:
														$full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
														$student_names = [$full_name];
													}
												} else {
													// Handle the case where student number is not found
													$student_names[] = "Student not found";
												}
											}
									?>
									Document Author: <?php echo implode(", ", $student_names); ?>
								</span><br>
									<i class="text-muted ms-2" style="font-size:10px">Last Updated: <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 

								</div>
								</a>
						<?php	}}else{?>
								<div class="border-bottom border-secondary border-2 p-2 m-2">
									There are no submitted documents, Kindly check in other Status 

								</div>
							<?php }
						
						?>
					</div>
				</div>
				</div>		
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
					<div class="col-sm-4">
					<?php					
						$dafecompletion = "SELECT documentType, COUNT(*) as total_completion FROM document_transaction WHERE submittedTo = '$faculty' AND documentType='completion_form' AND documentStatus= 'created'";
						$resultcompletion = mysqli_query($conn,$dafecompletion);
						$rowss = mysqli_fetch_assoc($resultcompletion);
						
						$dafecompletion1 = "SELECT documentType, COUNT(*) as total_submitted FROM users_documents WHERE documentType='completion_form' AND  documentStatus = 'to_chairperson'";
						$resultcompletion1 = mysqli_query($conn,$dafecompletion1);
						$rowss1 = mysqli_fetch_array($resultcompletion1);

						$dafecompletion3 = "SELECT documentType, COUNT(*) as total_review FROM users_documents WHERE documentType='completion_form' AND  documentStatus = 'to_registrar'";
						$resultcompletion3 = mysqli_query($conn,$dafecompletion3);
						$rowss3 = mysqli_fetch_assoc($resultcompletion3);

						$dafecompletion4 = "SELECT documentType, COUNT(*) as total_pickup FROM users_documents WHERE documentType='completion_form' AND  documentStatus = 'to_dean'";
						$resultcompletion4 = mysqli_query($conn,$dafecompletion4);
						$rowss4 = mysqli_fetch_assoc($resultcompletion4);
						
						$dafecompletion5 = "SELECT documentType, COUNT(*) as total_created FROM document_transaction WHERE submittedTo = '$faculty' AND  documentType='completion_form' AND  documentStatus = 'created'";
						$resultcompletion5 = mysqli_query($conn,$dafecompletion5);
						$rowss5 = mysqli_fetch_assoc($resultcompletion5);
						?>

						<a  class="text-decoration-none pe-auto" data-bs-target="#completionj" data-bs-toggle="modal">						
						<div class="card bg-secondary-subtle border-dark">
						<div class="card-header border-dark border-2 fw-bolder fs-5">Completion Form</div>
						<div class="card-body" id="body3">
						<h3 class="card-title" style="color:#ec6d18; font-size: 60px; text-align: center" id="total3"><?php echo $rowss['total_completion'];?> </h3>
						<p class="card-text lh-1" id="oh3">Created: <span style="color:#ec6d18"> <?php echo $rowss5['total_created'];?></span></p>
							<p class="card-text lh-1" id="sbmtd3">Submitted to Chairperson:  <span style="color:#ec6d18"> <?php echo $rowss1['total_submitted'];?></span> </p>
							<p class="card-text lh-1" id="rv3">Submitted to Registrar: <span style="color:#ec6d18"> <?php echo $rowss3['total_review'];?></span></p>
							<p class="card-text lh-1" id="pu3">Submitted to Dean: <span style="color:#ec6d18"> <?php echo $rowss4['total_pickup'];?></span></p>
							
						</div>
						</div> </a>
			
						<div class="modal fade" id="completionj"aria-hidden="true" aria-labelledby="completionj" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
							<div class="modal-content ">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="completionj"></h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
				<div class="modal-body">
				<div class=" d-flex align-items-start">
				<div class="nav col-sm-2 flex-column nav-pills me-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<button class="nav-link active" id="v-pills-cc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cc" type="button" role="tab" aria-controls="v-pills-cc" aria-selected="true" style="color:#ec6d18">Created</button>
					<button class="nav-link" id="v-pills-sc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sc" type="button" role="tab" aria-controls="v-pills-sc" aria-selected="false" style="color:#ec6d18">On-hand</button>
					<button class="nav-link" id="v-pills-cr-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cr" type="button" role="tab" aria-controls="v-pills-cr" aria-selected="false" style="color:#ec6d18">Under Review</button>
					<button class="nav-link" id="v-pills-cpu-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cpu" type="button" role="tab" aria-controls="v-pills-cpu" aria-selected="false" style="color:#ec6d18">For Pick-up</button>
				</div>
				<div class="tab-content col-sm-10" id="v-pills-tabContent">

					<div class="tab-pane fade show active text-dark" id="v-pills-cc" role="tabpanel" aria-labelledby="v-pills-cc-tab" tabindex="0">
						<?php 
							$compc = "SELECT * FROM document_transaction WHERE submittedTo = '$faculty' AND documentType='completion_form'  AND documentStatus = 'created' ORDER BY date DESC";
							$compcR = mysqli_query($conn,$compc);

							if(mysqli_num_rows($compcR) > 0){
								while($row = mysqli_fetch_array($compcR)){?>
								<a class="text-decoration-none text-dark" href="history.php#nav-create">		
								<div class="border-bottom border-secondary-subtle border-2 p-2 ">
									<span class="lh-2 fw-bold" style="color:#ec6d18;letter-spacing: 0.5px"><?= $row['documentName']; ?></span> &nbsp
									<span class="lh-2 fw-bold">(  <?= $row['documentID']; ?> )</span><br>
									
									<span class="lh-2" style="font-size:14px">
										<?php
											  $submit = $row['documentOwner'];
											  $them ="SELECT studentNum, studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$submit' LIMIT 1 ";
											  $runme = mysqli_query($conn,$them);
											  $rowFl = mysqli_fetch_assoc($runme);
										?>
										Document Owner: <?php echo $rowFl['studentFname']. " " . $rowFl['studentLname']; ?>
									</span><br>
									<i class="text-muted ms-2" style="font-size:10px">Last Updated: <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 
								</div>
								</a>
						<?php	}}else{?>
								<div class="border-bottom border-secondary border-3 p-2 m-2">
									There are no submitted documents, Kindly check in other Status 

								</div>
							<?php }
						
						?>
					</div>

					<div class="tab-pane fade text-dark" id="v-pills-sc" role="tabpanel" aria-labelledby="v-pills-sc-tab" tabindex="0">
					<?php 
							$comps = "SELECT * FROM users_documents WHERE submittedTo = '$faculty' AND documentType='completion_form' AND documentStatus = 'on_hand'";
							$compsR = mysqli_query($conn,$comps);

							if(mysqli_num_rows($compsR) > 0){
								while($row = mysqli_fetch_array($compsR)){?>
								<a class="text-decoration-none text-dark" href="edit-document.php?id=<?php echo $row['id']?>">		
								<div class="border-bottom border-secondary-subtle border-2 p-2 ">
									<span class="lh-2 fw-bold" style="color:#ec6d18;letter-spacing: 0.5px"><?= $row['documentName']; ?></span> &nbsp
									<span class="lh-2 fw-bold">(  <?= $row['documentID']; ?> )</span><br>
									<span class="lh-2" style="font-size:14px">
										<?php
											  $submit = $row['documentOwner'];
											  $them ="SELECT studentNum, studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$submit' LIMIT 1 ";
											  $runme = mysqli_query($conn,$them);
											  $rowFl = mysqli_fetch_assoc($runme);
										?>
										Document Owner: <?php echo $rowFl['studentFname']. " " . $rowFl['studentLname']; ?>
									</span><br>
									<i class="text-muted ms-2" style="font-size:10px">Last Updated: <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 

								</div>
							</a>
						<?php	}}else{?>
								<div class="border-bottom border-secondary border-2 p-2 m-2">
									There are no submitted documents, Kindly check in other Status 
								</div>
							<?php }
						
						?>
					</div>

					<div class="tab-pane fade text-dark" id="v-pills-cr" role="tabpanel" aria-labelledby="v-pills-cr-tab" tabindex="0">
					<?php 
							$comprv = "SELECT * FROM users_documents WHERE submittedTo = '$faculty' AND documentType='completion_form'  AND documentStatus = 'review' ORDER BY date DESC";
							$comprvR = mysqli_query($conn,$comprv);

							if(mysqli_num_rows($comprvR) > 0){
								while($row = mysqli_fetch_array($comprvR)){?>
								<a class="text-decoration-none text-dark" href="edit-document.php?id=<?php echo $row['id']?>">		
								<div class="border-bottom border-secondary-subtle border-2 p-2 ">
									<span class="lh-2 fw-bold" style="color:#ec6d18;letter-spacing: 0.5px"><?= $row['documentName']; ?></span> &nbsp
									<span class="lh-2 fw-bold">(  <?= $row['documentID']; ?> )</span><br>
									<span class="lh-2" style="font-size:14px">
										<?php
											  $submit = $row['documentOwner'];
											  $them ="SELECT studentNum, studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$submit' LIMIT 1 ";
											  $runme = mysqli_query($conn,$them);
											  $rowFl = mysqli_fetch_assoc($runme);
										?>
										Document Owner: <?php echo $rowFl['studentFname']. " " . $rowFl['studentLname']; ?>
									</span><br>
									<i class="text-muted ms-2" style="font-size:10px">Last Updated: <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 

								</div>
								</a>
						<?php	}}else{?>
								<div class="border-bottom border-secondary border-2 p-2 m-2">
									There are no submitted documents, Kindly check in other Status 

								</div>
							<?php }
						
						?>
					</div>

					<div class="tab-pane fade text-dark" id="v-pills-cpu" role="tabpanel" aria-labelledby="v-pills-cpu-tab" tabindex="0">
					<?php 
							$comppu = "SELECT * FROM users_documents WHERE submittedTo = '$faculty' AND documentType= 'completion_form'  AND documentStatus = 'pick-up'";
							$comppuR = mysqli_query($conn,$comppu);

							if(mysqli_num_rows($comppuR) > 0){
								while($row = mysqli_fetch_array($comppuR)){?>
								<a class="text-decoration-none text-dark" >	<div class="border-bottom border-secondary-subtle border-2 p-2 ">
									<span class="lh-2 fw-bold" style="color:#ec6d18;letter-spacing: 0.5px"><?= $row['documentName']; ?></span> &nbsp
									<span class="lh-2 fw-bold">(  <?= $row['documentID']; ?> )</span><br>
									<span class="lh-2" style="font-size:14px">
										<?php
											  $submit = $row['documentOwner'];
											  $them ="SELECT studentNum, studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$submit' LIMIT 1 ";
											  $runme = mysqli_query($conn,$them);
											  $rowFl = mysqli_fetch_assoc($runme);
										?>
										Document Owner: <?php echo $rowFl['studentFname']. " " . $rowFl['studentLname']; ?>
									</span><br>
									<i class="text-muted ms-2" style="font-size:10px">Last Updated: <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 
								</div></a>
						<?php	}}else{?>
								<div class="border-bottom border-secondary border-2 p-2 m-2">
									There are no submitted documents, Kindly check in other Status 

								</div>
							<?php }
						
						?>
					</div>
				</div>
				</div>
				
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
			</div>
					</div>
				</div><br>
			</div>
		</div>
		</main>
		</div>
</div>

<!---->
<?php require "add_documentT.php" ?>

<div class="position-fixed bottom-0 bg-secondary-subtle" id="ct6" style="font-size: 16px"></div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src='node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script src='node_modules/sweetalert/dist/sweetalert.min.js'> </script>


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

<!--REAL-TIME CARD UPDATE -->

<script>
		$(document).ready(function() {
  setInterval(function() {
    $("#body1").load("index.php #body1 > #total1, #sbmtd1, #oh1, #rv1, #pu1")
  }, 5000); // Reload every 2 seconds
});
</script>

<script>
		$(document).ready(function() {
  setInterval(function() {
    $("#body2").load("index.php #body2 > #total2, #sbmtd2, #oh2, #rv2, #pu2")
  }, 3000); // Reload every 2 seconds
});
</script>



<script>
		$(document).ready(function() {
  setInterval(function() {
    $("#body3").load("index.php #body3 > #total3, #sbmtd3, #oh3, #rv3, #pu3")
  }, 3000); // Reload every 2 seconds
});
</script>

<script>
		$(document).ready(function() {
  setInterval(function() {
    $("#bilang").load("index.php #bilang > a")
  }, 3000); // Reload every 2 seconds
});
</script>


<script>
	function journal(){
	 $(document).ready(function(){
Swal.fire({
  title: "Are you sure?",
  text: "Your document will be created!",
  icon: "question",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  confirmButtonText: "Yes"
}).then((result) => {
  if (result.isConfirmed) {

	window.location.href = "journal_add.php";}   
  })
});
	}
</script>

<script>
$(document).ready(function() {
    $('.roar').click(function() {
        var selected = $('.roar:checked').map(function() {
            return $(this).attr('data-valuetwo');
        }).get().join(', ');
        $('#dito').html(selected);
    });
});
</script>

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
            x[i].style.display="inline-block";
			                
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