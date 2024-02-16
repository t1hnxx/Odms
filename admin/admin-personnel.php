<?php require_once ("dbcon.php");
 
	require "session.php";
?>
<!DOCTYPE html>
<!--AUGUST 2, LOGIN PAGE -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="60">
	<link rel="icon" href="../ODMS Logo.png">

	<title>ADMIN | CEIT-ODMS</title>
	
	<link rel="stylesheet" href="..//https://fonts.googleapis.com/css2?family=Roboto">
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
 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-personnel.php" class="nav-link active text-decoration-none" style="color:#ec6d18"><i class="bi bi-person-circle"></i>&nbsp Designation</a></li>

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


	 <div class="col-md-10 mt-1 shadow">
	    <main class="bd-main order-1">  
        <div class="text-center m-2" style="color:#ec6d18">	
			<h3><b>COLLEGE DESIGNATION</b></h3> 
            <hr style="height:2px;border-width:0;color:black;background-color:black;">
        </div><br>
        <?php 
        $sql = "SELECT * FROM faculty_info WHERE position = 'dean'";
        $result = mysqli_query($conn,$sql);
        $row0 = mysqli_fetch_assoc($result);

        $sql1 = "SELECT * FROM faculty_info WHERE position = 'registrar'";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_assoc($result1);

        $sql2 = "SELECT * FROM faculty_info WHERE position = 'assistant_registrar'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
       
        ?>
        <h3 class="text-center fw-bolder">DEAN</h3><br>
        <div class="text-center">
        <img src="unknown.jpg" class=" m-2 border border-black rounded-circle" style="height: 120px; width: 150"> 
       
        <h4 class="text-center" style="color:#ec6d18"><b><?php echo  strtoupper($row0['facultyFname']). ' ' .strtoupper($row0['facultyMname']). ' ' . strtoupper($row0['facultyLname']);?></b></h4>
        <span class="fs-5 fw-bold">College Dean</span>

        <!-- Add this button inside the dean's section -->

<button type="button" class="btn btn-sm float-left" data-bs-toggle="modal" data-bs-target="#editModalDean" style="color: #ec6d18"><i class="bi bi-pencil-square"></i></button>
<div class="modal fade" id="editModalDean" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel" style="color:#ec6d18"><strong>College Dean Information</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add a form to update dean's information -->
        <form id="editDeanForm">
          <!-- Include input fields for dean's information -->
          <!-- Example: -->
          <div class="row mb-3 text-start">
    <div class="col-md-4 input-group-sm">
        <label for="deanFname" class="form-label fs-6 text-dark fw-bolder">First Name</label>
        <input class="form-control border-dark" type="text"  id="deanFname" name="deanFname" required>
    </div>

    <div class="col-md-4 input-group-sm">
        <label for="deanMname" class="form-label fs-6 text-dark fw-bolder">Middle Name (optional)</label>
        <input class="form-control border-dark" type="text" id="deanMname" name="deanMname">
    </div>

    <div class="col-md-4 input-group-sm">
        <label for="deanLname"  class="form-label fs-6 text-dark fw-bolder">Last Name</label>
        <input class="form-control border-dark" type="text" id="deanLname" name="deanLname" required>
    </div>
</div>

<div class="row mb-3 text-start">
    <div class="col-md-4 input-group-sm">
        <label for="deanEmail"  class="form-label fs-6 text-dark fw-bolder">Email Adress</label>
        <input class="form-control border-dark " type="email" id="deanEmail" name="deanEmail" required>
    </div>

    <div class="col-md-4 input-group-sm">
        <label for="deanGender" class="form-label fs-6 text-dark fw-bolder">Sex</label>
        <select class="form-select form-select-sm border-dark" id="deanGender" name="deanGender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
</div>


<div class="modal-footer">
        <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success mt-3"><i class="bi bi-floppy"></i>&nbsp Save Changes</button>
      </div>

          
        </form>
      </div>
    </div>
  </div>

        </div>
			
       <br> <br>
       <h3 class="text-center fw-bolder">COLLEGE REGISTRAR</h3><br>
       <div class="row">
       <div class="text-center col-sm-6">
        <img src="unknown.jpg" class=" m-2 border border-black rounded-circle" style="height: 120px; width: 150"> 
       
        <h4 class="text-center" style="color:#ec6d18"><b><?php echo  strtoupper('PROF. ' .$row1['facultyFname']). ' ' .strtoupper($row1['facultyMname']). ' ' . strtoupper($row1['facultyLname']);?></b></h4>
        <span class="fs-5 fw-bold">College Registrar</span>


        
<button type="button" class="btn btn-sm float-left" data-bs-toggle="modal" data-bs-target="#editModalRegistrar" style="color: #ec6d18"><i class="bi bi-pencil-square"></i></button>
<div class="modal fade" id="editModalRegistrar" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel" style="color:#ec6d18"><strong>College Registrar Information</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add a form to update dean's information -->
        <form id="editRegistrarForm">
          <!-- Include input fields for dean's information -->
          <!-- Example: -->
          <div class="row mb-3 text-start">
    <div class="col-md-4 input-group-sm">
        <label for="registrarFname" class="form-label fs-6 text-dark fw-bolder">First Name</label>
        <input class="form-control border-dark" type="text"  id="registrarFname" name="registrarFname" required>
    </div>

    <div class="col-md-4 input-group-sm">
        <label for="registrarMname" class="form-label fs-6 text-dark fw-bolder">Middle Name (optional)</label>
        <input class="form-control border-dark" type="text" id="registrarMname" name="registrarMname">
    </div>

    <div class="col-md-4 input-group-sm">
        <label for="registrarLname"  class="form-label fs-6 text-dark fw-bolder">Last Name</label>
        <input class="form-control border-dark" type="text" id="registrarLname" name="registrarLname" required>
    </div>
</div>

<div class="row mb-3 text-start">
    <div class="col-md-4 input-group-sm">
        <label for="registrarEmail"  class="form-label fs-6 text-dark fw-bolder">Email Adress</label>
        <input class="form-control border-dark " type="email" id="registrarEmail" name="registrarEmail" required>
    </div>

    <div class="col-md-4 input-group-sm">
        <label for="registrarGender" class="form-label fs-6 text-dark fw-bolder">Sex</label>
        <select class="form-select form-select-sm border-dark" id="registrarGender" name="registrarGender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
</div>


<div class="modal-footer">
        <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success mt-3"><i class="bi bi-floppy"></i>&nbsp Save Changes</button>
      </div>

          
        </form>
      </div>
    </div>
  </div>

</div>

        </div>
        <div class="text-center col-sm-6">
        <img src="unknown.jpg" class=" m-2 border border-black rounded-circle" style="height: 120px; width: 150"> 
       
        <h4 class="text-center" style="color:#ec6d18"><b><?php echo  strtoupper('PROF. ' .$row2['facultyFname']). ' ' .strtoupper($row2['facultyMname']). ' ' . strtoupper($row2['facultyLname']);?></b></h4>
        <span class="fs-5 fw-bold">Asst. College Registrar</span>


        <button type="button" class="btn btn-sm float-left" data-bs-toggle="modal" data-bs-target="#editModalCRegistrar" style="color: #ec6d18"><i class="bi bi-pencil-square"></i></button>
<div class="modal fade" id="editModalCRegistrar" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel" style="color:#ec6d18"><strong>Assistant College Registrar Information</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add a form to update dean's information -->
        <form id="editCRegistrarForm">
          <!-- Include input fields for dean's information -->
          <!-- Example: -->
          <div class="row mb-3 text-start">
    <div class="col-md-4 input-group-sm">
        <label for="assistant_registrarFname" class="form-label fs-6 text-dark fw-bolder">First Name</label>
        <input class="form-control border-dark" type="text"  id="assistant_registrarFname" name="assistant_registrarFname" required>
    </div>

    <div class="col-md-4 input-group-sm">
        <label for="assistant_registrarMname" class="form-label fs-6 text-dark fw-bolder">Middle Name (optional)</label>
        <input class="form-control border-dark" type="text" id="assistant_registrarMname" name="assistant_registrarMname">
    </div>

    <div class="col-md-4 input-group-sm">
        <label for="assistant_registrarLname"  class="form-label fs-6 text-dark fw-bolder">Last Name</label>
        <input class="form-control border-dark" type="text" id="assistant_registrarLname" name="assistant_registrarLname" required>
    </div>
</div>

<div class="row mb-3 text-start">
    <div class="col-md-4 input-group-sm">
        <label for="assistant_registrarEmail"  class="form-label fs-6 text-dark fw-bolder">Email Adress</label>
        <input class="form-control border-dark " type="email" id="assistant_registrarEmail" name="assistant_registrarEmail" required>
    </div>

    <div class="col-md-4 input-group-sm">
        <label for="assistant_registrarGender" class="form-label fs-6 text-dark fw-bolder">Sex</label>
        <select class="form-select form-select-sm border-dark" id="assistant_registrarGender" name="assistant_registrarGender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
</div>


<div class="modal-footer">
        <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success mt-3"><i class="bi bi-floppy"></i>&nbsp Save Changes</button>
      </div>

          
        </form>
      </div>
    </div>
  </div>
</div>

        </div>
      </div>

      <br> <br>
       <h3 class="text-center fw-bolder">DEPARTMENT CHAIRPERSON</h3><br>
       <div class="row">
       <div class="text-center col-sm-4">
        <img src="unknown.jpg" class=" m-2 border border-black rounded-circle" style="height: 120px; width: 150"> 
       
        <h5 class="text-center" style="color:#ec6d18"><b>ENGR. AL OWEN ROY A. FERRERA</b></h5>
        <span class="fs-5 fw-bold">Chairperson, DAFE</span>

        </div>
        <div class="text-center col-sm-4">
        <img src="unknown.jpg" class=" m-2 border border-black rounded-circle" style="height: 120px; width: 150"> 
       
        <h5 class="text-center" style="color:#ec6d18"><b>ENGR. ROSLYN P. PEÑA</b></h5>
        <span class="fs-5 fw-bold">Chairperson, DCEA</span>
        </div>
        <div class="text-center col-sm-4">
        <img src="unknown.jpg" class=" m-2 border border-black rounded-circle" style="height: 120px; width: 150"> 
       
        <h5 class="text-center" style="color:#ec6d18"><b>DR. MICHAEL T. COSTA</b></h5>
        <span class="fs-5 fw-bold">Chairperson, DCEE</span>
        </div>
      </div> <br>
      <div class="row d-flex justify-content-center">
       <div class="text-center col-sm-6">
        <img src="unknown.jpg" class=" m-2 border border-black rounded-circle" style="height: 120px; width: 150"> 
       
        <h5 class="text-center" style="color:#ec6d18"><b>PROF. MA. FATIMA B. ZUÑIGA</b></h5>
        <span class="fs-5 fw-bold">Chairperson, DIET</span>
        </div>
        <div class="text-center col-sm-6">
        <img src="unknown.jpg" class=" m-2 border border-black rounded-circle" style="height: 120px; width: 150"> 
       
        <h5 class="text-center" style="color:#ec6d18"><b>PROF. CHARLOTTE B. CARANDANG</b></h5>
        <span class="fs-5 fw-bold">Chairperson, DIT</span>
        </div>
       
      </div>
      <hr style="height:2px;border-width:0;color:black;background-color:black;">
      
		</main>
	</div>

	</div>
	</div>

<div class="position-fixed bottom-0 end-0 bg-secondary-subtle" id="ct6" style="font-size: 16px"></div>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src='../node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script src="..//https://code.jquery.com/jquery-3.6.4.min.js"></script>


</body>
<script>
	$(document).ready(function() {
        $('#toExcel').click(function() {
    window.location.href = 'excel_email.php';
    return false;
});
	});
</script>
<script>

$(document).ready(function() {
  $('#myTable tbody').on('change', 'select', function() {
    var email = $(this).closest('tr').attr('id');
    var column_name = $(this).attr('data-column');
    var new_value = $(this).val();
    
    $.ajax({
  url: '../admin/update_data.php',
  type: 'POST',
  data: {
    row_id: email,
    column_name: column_name,
    new_value: new_value
  },
  success: function(response) {
    $(".alert-message").html(response);
  },
  error: function(jqXHR, textStatus, errorThrown) {
    // Handle error response
  }
});// Code for handling the change and sending AJAX request
  });
});

    </script>
<script>
  const selectAllButton = document.querySelector('#selectAll');
const checkboxes = document.querySelectorAll('input[type="checkbox"]');

selectAllButton.addEventListener('click', () => {
  if (selectAllButton.textContent === 'Select All') {
    // Check all checkboxes and change button text
    checkboxes.forEach(checkbox => checkbox.checked = true);
    selectAllButton.textContent = 'Deselect';
  } else {
    // Deselect all checkboxes and change button text
    checkboxes.forEach(checkbox => checkbox.checked = false);
    selectAllButton.textContent = 'Select All';
  }
});
</script>


<script>
$(document).ready(function() {
  $('#deleteButton').click(function() {
    var checkedIds = [];
    $('#myTable tbody input[type="checkbox"]:checked').each(function() {
      checkedIds.$(this).attr('id');
    });

    $.ajax({
      url: '../admin/delete_rows.php',
      type: 'POST',
      data: {
        ids: checkedIds
      },
      success: function(response) {
        $(".alert-message").html(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle error response
      }
    });
  });
});

</script>



<script>
	$(document).ready(function() {
        $('#toManual').click(function() {
    window.location.href = 'manualAddP.php';
    return false;
});
	});
</script>


<script>
	const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
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
  $(document).ready(function () {
 
    $('#editModalDean').on('show.bs.modal', function (event) {

      $.ajax({
        url: 'fetch_dean_info.php', 
        type: 'GET',
        success: function (data) {
        
          $('#deanFname').val(data.deanFname); 
          $('#deanMname').val(data.deanMname);
          $('#deanLname').val(data.deanLname);
          $('#deanEmail').val(data.deanEmail);
          $('#deanGender').val(data.deanGender);
        },
        error: function (error) {
          console.error('Error fetching dean information:', error);
        }
      });
    });

    // Handle the form submission
    $('#editDeanForm').submit(function (event) {
      event.preventDefault();
      
      $.ajax({
        url: 'update_dean_info.php', // Replace with your server-side script to update dean's information
        type: 'POST',
        data: $(this).serialize(),

        success: function (response) {
    // Handle success response
    // You may show a success message or redirect the user
    $('#editModalDean').modal('hide'); // Hide the modal after successful update
    window.location.href = "admin-personnel.php"; // Redirect to a specific page
},

        error: function (error) {
          console.error('Error updating dean information:', error);
        }
      });
    });
  });
</script>



<script>
  $(document).ready(function () {
 
    $('#editModalRegistrar').on('show.bs.modal', function (event) {

      $.ajax({
        url: 'fetch_registrar_info.php', 
        type: 'GET',
        success: function (data) {
        
          $('#registrarFname').val(data.registrarFname); 
          $('#registrarMname').val(data.registrarMname);
          $('#registrarLname').val(data.registrarLname);
          $('#registrarEmail').val(data.registrarEmail);
          $('#registrarGender').val(data.registrarGender);
        },
        error: function (error) {
          console.error('Error fetching registrar information:', error);
        }
      });
    });

    // Handle the form submission
    $('#editRegistrarForm').submit(function (event) {
      event.preventDefault();
      
      $.ajax({
        url: 'update_registrar_info.php', // Replace with your server-side script to update dean's information
        type: 'POST',
        data: $(this).serialize(),
        success: function (response) {
          // Handle success response (e.g., show a success message)
          $('#editModalRegistrar').modal('hide'); // Hide the modal after successful update
          window.location.href = "admin-personnel.php";
        },
        error: function (error) {
          console.error('Error updating registrar information:', error);
        }
      });
    });
  });
</script>



<script>
  $(document).ready(function () {
 
    $('#editModalCRegistrar').on('show.bs.modal', function (event) {

      $.ajax({
        url: 'fetch_assistant_registrar_info.php', 
        type: 'GET',
        success: function (data) {
        
          $('#assistant_registrarFname').val(data.assistant_registrarFname); 
          $('#assistant_registrarMname').val(data.assistant_registrarMname);
          $('#assistant_registrarLname').val(data.assistant_registrarLname);
          $('#assistant_registrarEmail').val(data.assistant_registrarEmail);
          $('#assistant_registrarGender').val(data.assistant_registrarGender);
        },
        error: function (error) {
          console.error('Error fetching assistant_registrar information:', error);
        }
      });
    });

    // Handle the form submission
    $('#editCRegistrarForm').submit(function (event) {
      event.preventDefault();
      
      $.ajax({
        url: 'update_assistant_registrar_info.php', // Replace with your server-side script to update dean's information
        type: 'POST',
        data: $(this).serialize(),
        success: function (response) {
          // Handle success response (e.g., show a success message)
          $('#editModalCRegistrar').modal('hide'); // Hide the modal after successful update
          window.location.href = "admin-personnel.php";
        },
        error: function (error) {
          console.error('Error updating assistant_registrar information:', error);
        }
      });
    });
  });
</script>




</html>
