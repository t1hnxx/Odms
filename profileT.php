<!DOCTYPE html>
<head>
<html lang="en">
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="ODMS Logo.png">

    <title>Profile | Personnel</title>

	<link rel="stylesheet" href="bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>
 
<body style="background-color: #f2f2f2" onload=display_ct6()>

<nav class="navbar fixed-top shadow-lg" style="background-color: #ec6d18; color: white; top: 0; width: 100%; height: auto; ">
	<div class="d-flex flex-row container-fluid">
    	<button class="navbar-toggler d-lg-none d-inline-block align-text-top" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"> 
			<i class="bi bi-list"></i>
		</button>
		<a class="navbar-brand ms-1 p-0 me-0 me-lg-2" href="index.php" aria-label="odms">
			<img src="uploads/cvsu.png" width="60" height="58" class="align-top" alt="">
			<img src="uploads/ODMS logo.png" width="70" height="70" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
		</a>
		<div class="d-inline-block align-text-top fs-6 text-white w-25">
			
		</div>
		<div class="d-inline-block align-text-top me-1 fs-6 text-white">
			<a href="profile.php?url=<?php echo $user['facultyID'] . '%'.$user['urlAddress']?>" class="text-white fw-bold" style="text-decoration:none; letter-spacing: 1px">
			   <?php
          $id = $user['facultyID'];
					$fname = $user['facultyFname'];
					$lname = $user['facultyLname'];
          $address = $user['urlAddress'];
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

					<li class="bd-links-group py-2 px-3 border-0 "><a href="documentChoice.php" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-file-text"></i>&nbsp Documents
					<?php
					 $faculty = $user['facultyID'];

					$checked = "SELECT COUNT(*) AS submit FROM document WHERE documentStatus = 'submitted' AND submittedTo = '$faculty'";
					$havechecked = mysqli_query($conn,$checked);	
						$count = mysqli_fetch_assoc($havechecked)['submit']; 
						if ($count > 0){?>		
									
							<span class="badge text-bg-danger"><?php echo $count;?></span>
				<?php } ?></a></li>

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



	 
	 
	 <div class="col-md-10 mt-1 shadow">
	    <main class="bd-main order-1">  


    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4 border-dark-subtle">
          <div class="card-header text-center" style="background-image: url('bg-personnel2.jpg');background-size: cover; background-repeat: no-repeat;">
		  <br><br><?php
				
				if($image == null){

					
					$output = '<img src="uploads/unknown.jpg" style="height:155px;width:155px;border-radius: 50%" alt="..." >';

					echo $output;
				}
				else{
					echo '<img src="temp/' .$image.'"style="height:155px;width:155px;border-radius: 50%" alt="..." >';

					
				}
			?>
				</div>
			  <div class="card-body text-center"> 
            <h4 class="my-3 fw-bolder" style="color: #ec6d18; text-transform: uppercase"><?php echo $user['facultyFname']. " " . $user['facultyMname']. " " . $user['facultyLname'];?></h4>
			<?php 
                    $conn=mysqli_connect("localhost","root","","odms");
                    $user_dept=$user['facultyDepartment'];
                    $dept = mysqli_query($conn, "SELECT * FROM department WHERE departmentCode = '$user_dept'");
                   if(mysqli_num_rows($dept) > 0){

                    $row1 = mysqli_fetch_assoc($dept); 
                   if($user_dept == $row1['departmentCode']){
                    echo   "<p class='text-muted mb-1 fw-bold'>" . strtoupper($row1['departmentName']); "</p>";
                   }}
			?>
			<br><br>
			<p><button class="btn text-white" type="button" id="faculty_edit" style="background-color: #ec6d18"><i class="bi bi-pencil-square"></i>&nbspEDIT</button></p>

			<br>
          
           
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
                <p class="text-muted mb-0"><?php echo $user['facultyGender'];?></p>
              </div>
            </div>

			<hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18"><i class="bi bi-envelope-at"></i>&nbspEmail</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user['facultyEmail'];?></p>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18"><i class="bi bi-person-circle"></i>&nbspUser</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user['userType'];?></p>
              </div>
            </div>  
          </div>

        </div>


		<?php 
			$conn = mysqli_connect("localhost","root","","odms");
			$faculty = $user['facultyID'];


			$query1 = "SELECT documentType, COUNT(*) as total FROM document WHERE submittedTo = '$faculty'";
			$result1 = mysqli_query($conn,$query1);

			$query = "SELECT documentType, COUNT(*) as total_thesis FROM document WHERE submittedTo = '$faculty' AND documentType='thesis'";
			$result = mysqli_query($conn,$query);

			$query2 = "SELECT documentType, COUNT(*) as total_journal FROM document WHERE submittedTo = '$faculty' AND documentType = 'journal'";
			$result2 = mysqli_query($conn,$query2);

			$query3 = "SELECT documentType, COUNT(*) as total_completion FROM document WHERE submittedTo = '$faculty' AND documentType = 'completion_form'";
			$result3 = mysqli_query($conn,$query3);

			$query4 = "SELECT documentType, COUNT(*) as total_request FROM document WHERE submittedTo = '$faculty' AND documentType = 'requested'";
			$result4 = mysqli_query($conn,$query4);?>
					

		
        <div class="card mb-4">
          <div class="card-body">
		  <h4 class="mb-2
		   font-italic me-1" style="color: #ec6d18">Documents Handle</h4>
				<hr>
            <div class="row">
              <div class="col-sm-5">
                <p class="mb-0" style="color: #ec6d18">Total Documents</p>
              </div>	  
              <div class="col-sm-7">
			 <?php while($row = mysqli_fetch_array($result1)) {
                echo  "<p class='text-muted mb-0'>" . $row['total']; "</p>";
			}?>
			  </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-5">
                <p class="mb-0" style="color: #ec6d18">Thesis/Manuscript/Capstone</p>
              </div>
              <div class="col-sm-7">
			  <?php while($row = mysqli_fetch_array($result)) {
						echo  "<p class='text-muted mb-0'>" . $row['total_thesis']; "</p>";	
			}?>             
              </div>
            </div>

            <hr>

			<div class="row">
              <div class="col-sm-5">
                <p class="mb-0" style="color: #ec6d18">OJT Journal</p>
              </div>
              <div class="col-sm-7">

			 <?php while($row = mysqli_fetch_array($result2)) {
				echo  "<p class='text-muted mb-0'>" . $row['total_journal'];"</p>";
			
			 }?>               
              </div>
            </div>

			<hr>

            <div class="row">
              <div class="col-sm-5">
                <p class="mb-0" style="color: #ec6d18">Completion Form </p>
              </div>
              <div class="col-sm-7">

			 <?php while($row = mysqli_fetch_array($result3)) {
				echo  " <p class='text-muted mb-0'>" . $row['total_completion'];"</p>";
	
	
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


<div class="position-fixed bottom-0 end-0 bg-secondary-subtle" id="ct6" style="font-size: 16px"></div>
</body>
</html>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src='node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script src='node_modules/sweetalert/dist/sweetalert.min.js'> </script>
<script>
    $(document).ready(function() {
        $('#faculty_edit').click(function() {
    window.location.href = 'profile-edit.php?url=<?php echo $user['facultyID'] . '%'.$user['urlAddress']?>"';
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

<script>
		$(document).ready(function() {
  setInterval(function() {
    $("#bilang").load("index.php #bilang > a")
  }, 3000); // Reload every 2 seconds
});
</script>