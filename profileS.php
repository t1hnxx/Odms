<!DOCTYPE html>
<head>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="ODMS Logo.png">

    <title>Profile | Student</title>
    <link rel="stylesheet" href="bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>
 
<body style="background-color: #f2f2f2" onload=display_ct6()>

<nav class="navbar fixed-top shadow-lg" style="background-color: #ec6d18; color: white; top: 0; width: 100%; height: auto;  ">
	<div class="d-flex flex-row container-fluid">
    	<button class="navbar-toggler d-lg-none d-inline-block align-text-top" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"> 
			<i class="bi bi-list"></i>
		</button>
		<a class="navbar-brand ms-1 p-0 me-0 me-lg-2" href="index.php" aria-label="odms">
			<img src="uploads/cvsu.png" width="58" height="55" class="align-top" alt="">
			<img src="uploads/ODMS logo.png" width="65" height="65" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
		</a>
	
		<div class="d-inline-block align-text-top me-1 fs-6 text-white">
			<a href="profile.php?url=<?php echo $user1['studentID'] . '%'.$user1['urlAddress']?>" class="text-white fw-bold" style="text-decoration:none; letter-spacing: 1px">
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
	<div class="row ">
	 	<div class="col-md-2" style="overflow: auto">
	   <aside class="bd-sidebar">
	     <div class="offcanvas-lg offcanvas-start" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" style="background-color: #E4E4E4">
			<div class="offcanvas-header">
				<h4 class="offcanvas-title" id="offcanvasResponsiveLabel">Online Document Monitoring System</h6>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
			</div>

			<div class="offcanvas-body">
			  <nav class="nav nav-underline">
				<ul class="bd-links-nav list-unstyled mb-0 pb-5 pb-md-2 pe-lg-1" style="height:100vh; overflow: auto; position:fixed; width: 30vh; font-size: 15px"> 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="index.php" class=" nav-link text-decoration-none link-warning text-dark"><i class="bi bi-house" ></i>&nbsp Dashboard</a></li>
					
					<li></li>

					<li class="bd-links-group py-2 px-3 border-0 "><a href="documentChoice.php?" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-file-text"></i>&nbsp Documents</a></li>

					<li></li>
					
					<li class="bd-links-group py-2 px-3 border-0 "><a href="history.php" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-clock-history"></i>&nbsp History</a></li>

					<li></li>
				
					<li class="bd-links-group py-2 px-3 border-0 "><a onclick="logout()" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-box-arrow-right"></i>&nbsp Log out</a></li>

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
          <div class="card-header text-center" style="background-image: url('bg-student.jpg');background-size: cover; background-repeat: no-repeat;">
		  <br><br><?php
					if($image == null){

						
						$output = '<img src="uploads/unknown.jpg" style="height:155px;width:155px;border-radius: 50%" alt="..." >';

						echo $output;
					}
					else{
						echo '<img src="temp/' .$image.'"style="height:155px;width:155px;border-radius: 50%" alt="..." >';

						
					}
				?></div>
			  <div class="card-body text-center"> 
            <h4 class="my-3 fw-bolder" style="color: #ec6d18"><?php echo strtoupper($user1['studentFname']). " " . strtoupper($user1['studentMname']). " " . strtoupper($user1['studentLname']);?></h4>
			<?php 
                    $conn=mysqli_connect("localhost","root","","odms");
                    $user_course=$user1['studentCourse'];
                    $course = mysqli_query($conn, "SELECT * FROM course WHERE courseCode = '$user_course'");
                   if(mysqli_num_rows($course) > 0){

                    $row2 = mysqli_fetch_assoc($course); 
                   if($user_course == $row2['courseCode']){
                    echo   "<p class='text-muted mb-1 fw-bold'>" . strtoupper($row2['course_name']); "</p>";
                   }}
			?><br><br>
			<p><button class="btn text-white" type="button" id="student_edit" style="background-color: #ec6d18"><i class="bi bi-pencil-square"></i>&nbspEDIT</button></p>

			
			
          
           
          </div>
        </div>
      </div>
      <div class="col-lg-8">

        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18"><i class="bi bi-person-vcard"></i>&nbsp Student Number</p>
              </div>	  
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user1['studentNum'];?></p>
              </div>
            </div>

            <hr>

			<div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18"><i class="bi bi-gender-trans"></i>&nbspSex</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user1['studentGender'];?></p>
              </div>
            </div>

			<hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18"><i class="bi bi-envelope-at"></i>&nbspEmail</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user1['studentEmail'];?></p>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18"><i class="bi bi-person-circle"></i>&nbspUser</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user1['userType'];?></p>
              </div>
            </div>  
          </div>

        </div>


		<?php 
				$conn = mysqli_connect("localhost","root","","odms");
				$student = $user1['studentNum'];
					$query = "SELECT documentType, COUNT(*) as total FROM document WHERE FIND_IN_SET('$student',documentOwner)";
					$result = mysqli_query($conn,$query);
				  $query2 = "SELECT documentStatus,documentType FROM document WHERE FIND_IN_SET('$student',documentOwner) AND documentType = 'thesis'";
					$result2 = mysqli_query($conn,$query2);
				  $query3 = "SELECT documentStatus,documentType FROM document WHERE FIND_IN_SET('$student',documentOwner) AND documentType = 'journal'";
					  $result3 = mysqli_query($conn,$query3);
				  $query4 = "SELECT documentStatus, subjectCode FROM completion WHERE FIND_IN_SET('$student',documentOwner)";
					  $result4 = mysqli_query($conn,$query4);	?>
				

		
        <div class="card mb-4">
          <div class="card-body">
		  <h4 class="mb-2
		   font-italic me-1" style="color: #ec6d18">My Documents</h4>
				<hr>
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0" style="color: #ec6d18">Total Documents</p>
              </div>	  
              <div class="col-sm-8">
			 <?php 
       while($row = mysqli_fetch_array($result)) {
                echo  "<p class='text-muted mb-0'>" . $row['total']; "</p>";
			} ?>
			  </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0" style="color: #ec6d18">Thesis/ Capstone Project/ Manuscript</p>
              </div>
              <div class="col-sm-8">
              <p class='text-muted mb-0'>
			  <?php 
        
         if(mysqli_num_rows($result2)> 0 ){
        while($row = mysqli_fetch_array($result2)) {
            if($row['documentStatus'] == 'created'){
						echo  " Created";	
            }
            elseif($row['documentStatus'] == 'submitted'){
              echo  "Submitted";
            }
            elseif($row['documentStatus'] == 'on_hand'){
              echo  "Received by personnel";
            }
            elseif($row['documentStatus'] == 'review'){
              echo  "Under Review";
            }
            elseif($row['documentStatus'] == 'pick-up'){
              echo  "Available for pick-up";
            }
            elseif($row['documentStatus'] == 'graded'){
              echo 'Graded';
            }
            elseif($row['documentStatus'] == 'created'){
              echo 'Created';
            }
            elseif($row['documentStatus'] == 'return'){
              echo 'Returned';
            }
            elseif($row['documentStatus'] == 'signed'){
              echo 'Signed';
            }
            elseif($row['documentStatus'] == 'to_chairperson'){
              echo 'Received (Chairperson)';
            }
            elseif($row['documentStatus'] == 'to_registrar'){
              echo 'Received (College Registrar)';
            }
            elseif($row['documentStatus'] == 'to_dean'){
              echo 'Received (Dean)';
            }
            elseif($row['documentStatus'] == 'to_uregistrar'){
              echo 'Received (Univ. Registrar)';
            }
            elseif($row['documentStatus'] == 'to_research'){
              echo 'Received (Research COORD.)';
            }
            else{
              echo  "ERROR";
            }
			}}else{
        echo "Document not Found";
      }?>                   
              </p></div>
            </div>

            <hr>

			<div class="row">
              <div class="col-sm-4">
                <p class="mb-0" style="color: #ec6d18">OJT Journal</p>
              </div>
              <div class="col-sm-8">

			 <?php 
       if(mysqli_num_rows($result3)> 0 ){
       while($row = mysqli_fetch_array($result3)) {
				 if($row['documentStatus'] == 'created'){
          echo  "<p class='text-muted mb-0'> Created </p>";	
          }
          elseif($row['documentStatus'] == 'submitted'){
            echo  "<p class='text-muted mb-0'> Submitted </p>";
          }
          elseif($row['documentStatus'] == 'on_hand'){
            echo  "<p class='text-muted mb-0'> Received by personnel </p>";
          }
          elseif($row['documentStatus'] == 'review'){
            echo  "<p class='text-muted mb-0'> Under Review </p>";
          }
          elseif($row['documentStatus'] == 'pick-up'){
            echo  "<p class='text-muted mb-0'> Available for pick-up </p>";
          }
          elseif($row['documentStatus'] == 'signed'){
            echo 'Signed';
          }
          else{
            echo  "<p class='text-muted mb-0'> ERROR </p>";
          }
			
			 }}else{
        echo "<p class='text-muted mb-0'> Document not Found</p>";
      }?>               
              </div>
            </div>

			<hr>

            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0" style="color: #ec6d18">Completion Form</p>
              </div>
              <div class="col-sm-8">
        
			 <?php if(mysqli_num_rows($result4)> 0 ){
          while($row = mysqli_fetch_array($result4)) {

				  if($row['documentStatus'] == 'created'){
						echo  "<p class='text-muted mb-0'> Created (<i>" . $row['subjectCode'] . "</i>) </p>";	
            }
            elseif($row['documentStatus'] == 'submitted'){
              echo  "<p class='text-muted mb-0'> Submitted (<i>" . $row['subjectCode'] . "</i>)</p>";
            }
            elseif($row['documentStatus'] == 'on_hand'){
              echo  "<p class='text-muted mb-0'> Received by personnel (<i>" . $row['subjectCode'] . "</i>)</p>";
            }
            elseif($row['documentStatus'] == 'review'){
              echo  "<p class='text-muted mb-0'> Under Review (<i>" . $row['subjectCode'] . "</i>)</p>";
            }
            elseif($row['documentStatus'] == 'pick-up'){
              echo  "<p class='text-muted mb-0'> Available for pick-up (<i>" . $row['subjectCode'] . "</i>)</p>";
            }
            elseif($row['documentStatus'] == 'signed'){
              echo "<p class='text-muted mb-0'> Signed (<i>" . $row['subjectCode'] . "</i>)</p>";
            }
            elseif($row['documentStatus'] == 'to_chairperson'){
              echo "<p class='text-muted mb-0'> Received (Chairperson)(<i>" . $row['subjectCode'] . "</i>)</p>";
            }
            elseif($row['documentStatus'] == 'to_registrar'){
              echo "<p class='text-muted mb-0'> Received (College Registrar)(<i>" . $row['subjectCode'] . "</i>)</p>";
            }
            elseif($row['documentStatus'] == 'to_dean'){
              echo "<p class='text-muted mb-0'> Received (Dean)(<i>" . $row['subjectCode'] . "</i>)</p>";
            }
            elseif($row['documentStatus'] == 'to_uregistrar'){
              echo "<p class='text-muted mb-0'> Received (Univ. Registrar)(<i>" . $row['subjectCode'] . "</i>)</p>";
            }
            elseif($row['documentStatus'] == 'to_research'){
              echo "<p class='text-muted mb-0'> Received (Research COORD.)(<i>" . $row['subjectCode'] . "</i>)</p>";
            }
            else{
              echo  "<p class='text-muted mb-0'> ERROR </p>";
            }
			}}else{
        echo "<p class='text-muted mb-0'> Document not Found</p>";
      }?>               
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
</section>

		</main>
		</div>
</div>
</div>

</body>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src='node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script>
    $(document).ready(function() {
        $('#student_edit').click(function() {
    window.location.href = 'profile-edit.php';
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