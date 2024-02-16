<?php
require_once 'dbcon.php';
require "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//https://fonts.googleapis.com/css2?family=Roboto">
    <link rel="stylesheet" href="../bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
  
    <link rel="icon" href="../ODMS Logo.png">
    <title>ADMIN | CEIT-ODMS</title>
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
.addForm {
  padding: 5px 10px; 
  font-size: 12px;   
}


.removeForm {
  padding: 5px 10px; 
  font-size: 12px;   
}



.outer-container {
	border: #e0dfdf 1px solid;
	padding: 30px 30px 10px 30px;
	border-radius: 15px;
	text-align: center;
	margin: 10px auto;
	width: 350px;
}

.tutorial-table {
	margin-top: 40px;
	font-size: 1.0em;
	border-collapse: collapse;
	width: 100%;
}

.tutorial-table th {
	background: #f0f0f0;
	border-bottom: 2px solid #dddddd;
	padding: 10px;
	text-align: left;
}

.tutorial-table td {
	background: #FFF;
	border-bottom: 1px solid #dddddd;
	padding: 10px;
	text-align: left;
}


label {
	margin-bottom: 5px;
	display: inline-block;
	font-weight: normal;
	color: white;
	line-height: 2.5;
}

.card{
    font-family: 'Poppins', serif;
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
 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-personnel.php" class="nav-link text-decoration-none link-warning text-black"><i class="bi bi-person-circle"></i>&nbsp Designation</a></li>

					<li></li>

					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-faculty.php" class="nav-link active text-decoration-none" style="color:#ec6d18"><i class="bi bi-people"></i>&nbsp Faculty</a></li>

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

    <div class="container">
        <div class="row">
            <div class="card shadow border border-secondary">
                <div class="card-header m-2 border-bottom border-secondary">
                  <h5 style="color:#ec6d18"><b> Faculty Information </b></h5>
                 </div>
                 <div class="card-body">
                    <div class="show_alert"></div>
                    <form action="#" method="POST" id="add_prsnnl">
                        <div id="show_item">
                        <div>
                            <div class="row mb-3">
                                <div class="col-md-4 input-group-sm">
                                <label for="facultyFname" class="form-label fs-6 text-dark fw-bolder">First Name</label>
                                    <input class="form-control border-dark" type="text" name="facultyFname[]" required>
                                </div>

                                <div class="col-md-4 input-group-sm">
                                    <label for="facultyMname" class="form-label fs-6 text-dark fw-bolder">Middle Name (optional)</label>
                                    <input class="form-control border-dark" type="text" name="facultyMname[]">
                                </div>

                                <div class="col-md-4 input-group-sm">
                                <label for="facultyLname" class="form-label fs-6 text-dark fw-bolder">Last Name</label>
                                    <input class="form-control border-dark" type="text" name="facultyLname[]" required>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 input-group-sm">
                                <label for="facultyEmail" class="form-label fs-6 text-dark fw-bolder">Email</label>
                                    <input class="form-control border-dark " type="email" name="facultyEmail[]" required>
                                </div>

                                <div class="col-md-4 input-group-sm">
                                <label for="facultyGender" class="form-label fs-6 text-dark fw-bolder">Sex</label>
                                    <select class="form-select form-select-sm border-dark" name="facultyGender[]" aria-label="Small select example" required>
                                    <option value=""disabled selected hidden></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        </select>
                                </div>

                                <div class="col-md-4 input-group-sm">
                                <?php
										$conn = mysqli_connect("localhost", "root","","odms");
										$query = "SELECT * FROM department ORDER BY departmentCode ASC";
										$result = mysqli_query($conn,$query);
									 ?>


                                    <label for="facultyDepartment" class="form-label fs-6 text-dark fw-bolder">Department</label>
                                    <select class="form-select form-select-sm border-dark" name="facultyDepartment[]" aria-label="Small select example" required>
                                        <option value=""disabled selected hidden></option>
                                    <?php
											while ($row = mysqli_fetch_array($result))
												{
													echo "<option value='".$row['departmentCode']."'>".$row['departmentName']."</option>";
												}
										?>  
                                        </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                            <div class="col-md-12 mb-4">
                                <button class="btn btn-primary addForm border-dark text-white "><i class="bi bi-person-plus-fill"></i> &nbsp Add User</button>
                            </div>
                             <div>
                                <button type="submit" value="Save" class="btn btn-success w-50 float-end text-white btn-sm border-black fw-bold" id="add"><i class="bi bi-floppy"></i> &nbsp Save </button>
                                <a href="admin-faculty.php"> 
                                     <button class="btn btn-secondary float-start text-white btn-sm" type="button" style="width:40%">BACK</button>
                                </a>
                            </div>   
                        </div>                                                                                                                                          
                        
                        </div>
                        </form>
                 </div>
             </div>      
        </div>
    </div><br>
<div class="table-result">
<?php
$query = "SELECT * FROM faculty_email";
$result = mysqli_query($conn,$query); 
if (! empty($result)) {
    ?>
	<button type="button" id="toSave" class="btn btn-success btn-md"><i class="bi bi-envelope-at"></i> &nbsp Send Accounts to their Emails</button>
    <button type="button" id="toRemove" class="btn btn-danger btn-md float-end"><i class="bi bi-person-x"></i> &nbsp Delete</button>
    <table class='tutorial-table'>
		<thead>
			<tr>
				<th>Full Name</th>
				<th>Department</th>
				<th>Email</th>
				<th>Username</th>
				<th>Password</th>
				
			</tr>
		</thead>
<?php
    while($row = mysqli_fetch_array($result)){
        ?>
        <tbody>
			<tr>
				<td><?php  echo $row['facultyFname']. " " . $row['facultyMname']. " " . $row['facultyLname']; ?></td>
				<td><?php  echo $row['facultyDepartment']; ?></td>
				<td><?php  echo $row['facultyEmail']; ?></td>
				<td><?php  echo $row['facultyUsername']; ?></td>
				<td><?php  echo $row['facultyPassword']; ?></td>
			</tr>
<?php
    }
    ?>
        </tbody>
	</table>
	
<?php
}

?>




</div>
    

    </main>
    <div class="position-fixed bottom-0 end-0 bg-secondary-subtle" id="ct6" style="font-size: 16px"></div>


    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src='../node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script>
    
    $(document).ready(function () {
        $(".addForm").click(function(e){
            e.preventDefault();

            $("#show_item").prepend(`<div class="append">
                            <div class="row mb-3">
                                <div class="col-md-4 input-group-sm">
                                <label for="facultyFname" class="form-label fs-6 text-dark fw-bolder">First Name</label>
                                    <input class="form-control border-dark" type="text" name="facultyFname[]"  required>
                                </div>

                                <div class="col-md-4 input-group-sm">
                                    <label for="facultyMname" class="form-label fs-6 text-dark fw-bolder">Middle Name (optional)</label>
                                    <input class="form-control border-dark" type="text" name="facultyMname[]">
                                </div>

                                <div class="col-md-4 input-group-sm">
                                <label for="facultyLname" class="form-label fs-6 text-dark fw-bolder">Last Name</label>
                                    <input class="form-control border-dark" type="text" name="facultyLname[]" required>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 input-group-sm">
                                <label for="facultyEmail" class="form-label fs-6 text-dark fw-bolder">Email</label>
                                    <input class="form-control border-dark " type="email" name="facultyEmail[]"required>
                                </div>

                                <div class="col-md-4 input-group-sm">
                                <label for="facultyGender" class="form-label fs-6 text-dark fw-bolder">Sex</label>
                                    <select class="form-select form-select-sm border-dark" name="facultyGender[]" aria-label="Small select example" required>
                                    <option value=""disabled selected hidden></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        </select>
                                </div>

                                <div class="col-md-4 input-group-sm">
                                <?php
										$conn = mysqli_connect("localhost", "root","","odms");
										$query = "SELECT * FROM department ORDER BY departmentCode ASC";
										$result = mysqli_query($conn,$query);
									 ?>


                                    <label for="facultyDepartment" class="form-label fs-6 text-dark fw-bolder">Department</label>
                                    <select class="form-select form-select-sm border-dark" name="facultyDepartment[]" aria-label="Small select example" required>
                                        <option value=""disabled selected hidden></option>
                                    <?php
											while ($row = mysqli_fetch_array($result))
												{
													echo "<option value='".$row['departmentCode']."'>".$row['departmentName']."</option>";
												}
										?>  
                                        </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                            <div class="col-md-12 mb-4">
                                <button class="btn btn-danger removeForm"><i class="bi bi-person-x-fill"></i> &nbsp Remove</button>
                            </div>
                        </div>   
                        </div>     `);
        });

        $(document).on('click', '.removeForm', function(e){
            e.preventDefault();
            let row_item = $(this).parent().parent().parent();
            $(row_item).remove();
        });
        //AJAX TO INSERT DATA
        $("#add_prsnnl").submit(function (e) { 
            e.preventDefault();
            $("#toSave").hide();
            Swal.fire({
            title: 'Are you sure?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
            $("#add").val('Adding....');
            $.ajax({
                method: "post",
                url: "manualPrsnnl.php",
                data:$(this).serialize(),
                success: function (response) {
                    $("#add").val('Add');
                    $("#add_prsnnl")[0].reset();
                    $(".append").remove();
                    $(".show_alert").html(`<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-square"></i> &nbsp${response}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);                   
                   
                    Swal.fire({
			icon: "success",
           	title: "Accounts Added succesfully",   
              showConfirmButton: false,
  			timer: 2500
          }).then(function(){
			window.location.href = "manualAddP.php"
            $("#toSave").show();})           
                }})
         } });

            
        });
    });
</script>

<script>
	/*$(document).ready(function() {
        $('#toSave').click(function() {
		$.ajax({
        url: 'mail.php',
		type: 'POST',
        success:function(response){
          if(response == "Account Added Successfully!"){
            Swal.fire({
			position: 'top-end',
			icon: 'success',
           	title: response,	   
              showConfirmButton: false,
  			timer: 2500
          }).then(function(){
			window.location.href = "manualAddP.php";
            
		  });
          }
		else{
			Swal.fire({
			position: 'top-end',
              title: response,
              icon: "error",  
              showConfirmButton: false,
 			 timer: 2500
          }).then(function(){
			window.location.href = "manualAddP.php";
		  });
		}},       
      });




});
	});*/
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
    $(document).ready(function() {
        $('#toSave').click(function() {
    window.location.href = 'mail.php';
    return false;
});
	});
</script>

<script>
	$(document).ready(function() {
        $('#toRemove').click(function() {
			Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
			$.ajax({
        url: 'mail-remove.php',
		type: 'POST',
        success:function(response){
          if(response == "SUCCESSFUL"){
            Swal.fire({
			icon: "success",
           	title: response,   
              showConfirmButton: false,
  			timer: 2500
          }).then(function(){
			window.location.href = "manualAddP.php";
		  });
          }
		else{
			Swal.fire({
              title: response,
              icon: "error",  
              showConfirmButton: true,
			  timer: 2500,
          }).then(function(){
			window.location.href = "manualAddP.php";
		  });
		}},       
      });
		}});
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


</body>


</html>