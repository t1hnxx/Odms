<?php 

$student_query = "SELECT * FROM student_info";
		$studentrun = mysqli_query($conn,$student_query);?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="ODMS Logo.png">

    <title>Document | CEIT-ODMS</title>
    <link rel="stylesheet" href="bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link href="DataTables/datatables.min.css" rel="stylesheet">
  <style>

.nav-tabs>button.active,
.nav-tabs>button:hover,
.nav-tabs>button:focus {
  background-color: #ec6d18!important;
  color: white!important;
}

</style>
 </head> 
 <body style="background-color: #E4E4E4">
 <nav class="navbar fixed-top shadow-lg" style="background-color: #ec6d18; color: white; top: 0; width: 100%; height: auto; opacity: 95%">
	<div class="d-flex flex-row container-fluid">
    	<button class="navbar-toggler d-lg-none d-inline-block align-text-top" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"> 
			<i class="bi bi-list"></i>
		</button>
		<a class="navbar-brand ms-1 p-0 me-0 me-lg-2" href="index.php" aria-label="odms">
			<img src="uploads/cvsu.png" width="60" height="58" class="align-top" alt="">
			<img src="uploads/ODMS logo.png" width="70" height="70" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
		</a>
		
		<div class="d-inline-block align-text-top me-1 fs-6 text-white">
			<a href="profile.php?url=<?php echo $user['facultyID'] . '%'.$user['urlAddress']?>" class="text-white" style="text-decoration:none">
			  <?php 	
					$fname = $user['facultyFname'];
					$lname = $user['facultyLname'];
					$image = $user['Fprofile_image'];
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
    
<br>
<br>
<br>
<div class="container-xxl bd-gutter mt-3 my-md-3 bd-layout">
  <div class="row ">
    <div class="col-sm-2" style="overflow: auto">
 <aside class="bd-sidebar">
  <div class="offcanvas-lg offcanvas-start" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" style="background-color: #E4E4E4">
  <div class="offcanvas-header">
    <h4 class="offcanvas-title" id="offcanvasResponsiveLabel">Online Document Monitoring System</h6>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
  </div>
<div class="offcanvas-body">
<nav class="nav nav-underline">
      <ul class="bd-links-nav list-unstyled mb-0 pb-5 pb-md-2 pe-lg-1" style="height:100vh; overflow: auto; position:fixed; width: 30vh; font-size: 15px">
	  
		<li class="bd-links-group py-2 px-3 border-0 " ><a class="nav-link text-decoration-none link-warning text-dark" href="index.php"><i class="bi bi-house" ></i>&nbsp Dashboard</a></li>
		<li></li>

	 
		<li class="bd-links-group py-2 px-3 border-0 "><a href="documentChoice.php" class=" nav-link active text-decoration-none" style="color:#ec6d18"><i class="bi bi-file-text"></i>&nbsp Documents
    <?php
					 $faculty = $user['facultyID'];

					$checked = "SELECT COUNT(*) AS submit FROM document WHERE documentStatus = 'submitted' AND submittedTo = '$faculty'";
					$havechecked = mysqli_query($conn,$checked);	
						$count = mysqli_fetch_assoc($havechecked)['submit']; 
						if ($count > 0){?>		
									
							<span class="badge text-bg-danger"><?php echo $count;?></span>
				<?php } ?></a></li>
		<li></li>
		
	<li class="bd-links-group py-2 px-3 border-0 "><a class="nav-link text-decoration-none link-warning text-dark" href="history.php"><i class="bi bi-layout-text-sidebar-reverse"></i>&nbsp Monitor</a></li>
	<li></li>
	
	<li class="bd-links-group py-2 px-3 border-0 " ><a class="nav-link text-decoration-none link-warning text-dark" onclick="logout()"><i class="bi bi-box-arrow-right"></i>&nbsp Log out</a>
</li>

</ul>
</nav>
</div>
</div>
</aside>
</div>



<div class="col-sm-10 mt-1 shadow overflow-y-auto">
	    <main class="bd-main order-1">  
		<div class="text-center">	
			<h3><b>DOCUMENTS</b></h3> 
            <hr style="height:2px;border-width:0;background-color:black">
        </div>  
<br>
  <table class="table table-bordered table-striped table-hover align-middle" id="myTable" style="width:100%; font-size: small">
      <thead class="table-dark">
        <tr class="align-middle text-center">
        <th style="width:10%;" class="text-center">Date Created</th>
                <th>Document Reference ID</th>
                <th>Name/ Title</th>
                <th>Type </th>
                <th class="text-center">Status</th>
				        <th>Document Author</th>
                <th>Remarks</th>
                <th>Action</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>

    <br> <br>

    <div class="fw-bolder fs-5 row" style="color:#ec6d18">
    <div class="col-sm-6 align-middle"> Completion Form</div>
    <div class="col-sm-6 "><?php require "add_completion.php"; ?></div>
   </div> 
    
    <br>
    <table class='table info table-bordered border-dark text-center align-middle' id="completionT" style="font-size:small; width: auto;">
		<thead class="table-dark" id="dark1">
          <tr class="align-middle text-center">
		  		      <th>Date Created</th>
                <th>ID</th>
                <th>Subject</th>
				        <th>Semester / A.Y</th>
				        <th>Previous Grade</th>
				        <th>Final Grade</th> 
                <th>Submitted To</th>
                <th>Status</th>
                <th>Student Name</th>
                <th>Remarks</th>    
                <th>Action</th>  
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</main>
  </div>
  </div>

  <!-- HERE -->
  <?php require "edited.php" ?>


</div>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src='node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script src="DataTables/datatables.min.js"></script>
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
  // call fetchData function
  //initialize datatables
  let table = new DataTable("#myTable",{
    responsive: true,
    dom: 'lBfrtip',
    buttons: [
      'colvis',
      {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'pdf', 'copy', 'excel'
        ],
        columnDefs: [
        { targets: [4], className: 'dt-center' }
    ]});
  fetchData();
  function fetchData() {
    $.ajax({
      url: "server.php?action=fetchData",
      type: "POST",
      dataType: "json",
     
      success: function(response) {
        var data = response.data;
        var student_names = response.student_names;
        
        table.clear().draw();
        $.each(data, function(index, value) {
          var documentTypeDisplay = "";
          if (value.documentType === "thesis") {
            documentTypeDisplay = "Thesis/ Capstone Project/ Manuscript";
          } else if (value.documentType === "journal") {
            documentTypeDisplay = "OJT Journal";
          } else if (value.documentType === "completion_form") {
            documentTypeDisplay = "Completion Form";
          } else {
            documentTypeDisplay = value.documentType; // Default display
          }
          var documentAction = "";
          if (value.documentType === "completion_form") {
            documentAction = '<div class="d-flex justify-content-center"><a class="btn btn-primary btn-sm me-2" href="edit-document.php?id=' + 
            value.id + 
            '" type="button" style="font-size:12px""><i class="bi bi-pencil-square"></i></a>'+
            '<button class="btn btn-danger btn-sm" type="button" onclick=deleteCData("' + 
            value.documentID +
            '") style="font-size:12px"> <i class="bi bi-trash3" ></i></button>' +
            '</div>';
          }else{
            documentAction = '<div class="d-flex justify-content-center"><a class="btn btn-primary btn-sm" href="edit-document.php?id=' + 
            value.id + 
            '" type="button" style="font-size:12px""><i class="bi bi-pencil-square"></i></a>'+
            '</div>';
          }
          var documentStatusDisplay = "";
          if (value.documentStatus === "submitted") {
            documentStatusDisplay = ' <span class="rounded p-1"style="background-color:#c2dfff; color:#004a99">Received</span>';
          } else if (value.documentStatus === "on_hand") {
            documentStatusDisplay = '  <span class="rounded p-1"style="background-color:#fff494; color:#806a00">On-Hand</span>';
          }else if (value.documentStatus === "created") {
            documentStatusDisplay = '<span class="rounded p-1"style="background-color:#AFDCEB; color: #144252">Created</span>';
          } else if (value.documentStatus === "review") {
            documentStatusDisplay = '<span class="rounded p-1"style="background-color:#ffcd85;color: #BE5504">Under Review</span>';
          }else if (value.documentStatus === "pick-up") {
            documentStatusDisplay = '<span class="rounded p-1"style="background-color:#d2f5b0; color: #003312">Available for pick-up</span>';
          }else if (value.documentStatus === "graded") {
            documentStatusDisplay = '<span class="rounded p-1"style="background-color:#d2f5b0; color: #003312">Graded</span>';
          }else if (value.documentStatus === "signed") {
            documentStatusDisplay = '<span class="rounded p-2" style="background-color:#d2f5b0; color: #003312">Signed</span>';
          }else if (value.documentStatus === "to_registrar") {
            documentStatusDisplay = ' <span class="rounded p-1"style="background-color:#c2dfff; color:#004a99;">Received (College Registrar)</span>';
          }else if (value.documentStatus === "to_chairperson") {
            documentStatusDisplay = ' <span class="rounded p-1"style="background-color:#c2dfff; color:#004a99;">Received (Chairperson)</span>';
          }else if (value.documentStatus === "to_uregistrar") {
            documentStatusDisplay = ' <span class="rounded p-1"style="background-color:#c2dfff; color:#004a99;">Received (University Registrar)</span>';
          }else if (value.documentStatus === "to_dean") {
            documentStatusDisplay = ' <span class="rounded p-1"style="background-color:#c2dfff; color:#004a99;">Received (Dean)</span>';
          }else if (value.documentStatus === "to_research") {
            documentStatusDisplay = ' <span class="rounded p-1"style="background-color:#c2dfff; color:#004a99;">Received (Research Coordinator)</span>';
          }else {
            documentStatusDisplay = value.documentStatus; // Default display
          }
          table.row.add([
            value.date_created,
            value.documentID,
            value.documentName, 
            documentTypeDisplay,
            documentStatusDisplay,
            value.documentOwner,
            value.remarks,
            documentAction,         
          ]).draw(false);
        })
      }
    })
  }
  setInterval(fetchData, 2000);
  })
</script>





<script>
  $(document).ready(function() { 
  // call fetchData function
  //initialize datatables
  let table = new DataTable("#completionT",{
   
    dom: 'lBfrtip',
    buttons: [
      'colvis',
      {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'pdf', 'copy', 'excel'
        ],
        columnDefs: [
        { targets: [4], className: 'dt-center' }
    ]});
  fetchCompletion();
  function fetchCompletion() {
    $.ajax({
      url: "serverCompletion.php?action=fetchcompletion",
      type: "POST",
      dataType: "json",
     
      success: function(response) {
        var data = response.data;
        var student_names = response.student_names;
        
        table.clear().draw();
        $.each(data, function(index, value) {
          var documentSemDisplay = "";
          if (value.semester === "first") {
            documentSemDisplay = "First/ " + value.academic_year;
          } else if (value.semester === "second") {
            documentSemDisplay = "Second/ " + value.academic_year;
          } else if (value.semester === "midyear") {
            documentSemDisplay = "Mid Year";
          } else {
            documentTypeDisplay = value.documentType; // Default display
          }
          var documentAction = "";
          if (value.documentType === "completion_form") {
            documentAction = '<div class="d-flex justify-content-center"><a class="btn btn-primary btn-sm me-2" href="edit-document.php?id=' + 
            value.id + 
            '" type="button" style="font-size:12px""><i class="bi bi-pencil-square"></i></a>'+
            '<button class="btn btn-danger btn-sm" type="button" onclick=deleteCData("' + 
            value.documentID +
            '") style="font-size:12px"> <i class="bi bi-trash3" ></i></button>' +
            '</div>';
          }else{
            documentAction = '<div class="d-flex justify-content-center"><a class="btn btn-primary btn-sm" href="edit-document.php?id=' + 
            value.id + 
            '" type="button" style="font-size:12px""><i class="bi bi-pencil-square"></i></a>'+
            '</div>';
          }
          var documentStatusDisplay = "";
          if (value.documentStatus === "submitted") {
            documentStatusDisplay = ' <span class="rounded p-1"style="background-color:#c2dfff; color:#004a99">Received</span>';
          } else if (value.documentStatus === "on_hand") {
            documentStatusDisplay = '  <span class="rounded p-1"style="background-color:#fff494; color:#806a00">On-Hand</span>';
          }else if (value.documentStatus === "created") {
            documentStatusDisplay = '<span class="rounded p-1"style="background-color:#AFDCEB; color: #144252">Created</span>';
          } else if (value.documentStatus === "review") {
            documentStatusDisplay = '<span class="rounded p-1"style="background-color:#ffcd85;color: #BE5504">Under Review</span>';
          }else if (value.documentStatus === "pick-up") {
            documentStatusDisplay = '<span class="rounded p-1"style="background-color:#d2f5b0; color: #003312">Available for pick-up</span>';
          }else if (value.documentStatus === "graded") {
            documentStatusDisplay = '<span class="rounded p-1"style="background-color:#d2f5b0; color: #003312">Graded</span>';
          }else if (value.documentStatus === "signed") {
            documentStatusDisplay = '<span class="rounded p-2" style="background-color:#d2f5b0; color: #003312">Signed</span>';
          }else if (value.documentStatus === "to_registrar") {
            documentStatusDisplay = ' <span class="rounded p-1"style="background-color:#c2dfff; color:#004a99;">Received (College Registrar)</span>';
          }else if (value.documentStatus === "to_chairperson") {
            documentStatusDisplay = ' <span class="rounded p-1"style="background-color:#c2dfff; color:#004a99;">Received (Chairperson)</span>';
          }else if (value.documentStatus === "to_uregistrar") {
            documentStatusDisplay = ' <span class="rounded p-1"style="background-color:#c2dfff; color:#004a99;">Received (University Registrar)</span>';
          }else if (value.documentStatus === "to_dean") {
            documentStatusDisplay = ' <span class="rounded p-1"style="background-color:#c2dfff; color:#004a99;">Received (Dean)</span>';
          }else if (value.documentStatus === "to_research") {
            documentStatusDisplay = ' <span class="rounded p-1"style="background-color:#c2dfff; color:#004a99;">Received (Research Coordinator)</span>';
          }else {
            documentStatusDisplay = value.documentStatus; // Default display
          }

          var documentAction = "";
          
            documentAction = '<div class="d-flex justify-content-center"><a class="btn btn-primary btn-sm me-2" href="edit-documentC.php?id=' + 
            value.id + 
            '" type="button" style="font-size:12px""><i class="bi bi-pencil-square"></i></a>'+
            '<button class="btn btn-danger btn-sm" type="button" onclick=deleteCData("' + 
            value.documentID +
            '") style="font-size:12px"> <i class="bi bi-trash3" ></i></button>' +
            '</div>';
          

          table.row.add([
            value.date_created,
            value.documentID,
            value.subjectCode, 
            documentSemDisplay, 
            value.gradeP,
            value.gradeF,
            value.submittedTo,
            documentStatusDisplay,
            value.documentOwner,  
            value.remarks,
            documentAction
           
            
          ]).draw(false);
        })
      }
    })
  }
  setInterval(fetchCompletion, 2000);
  })
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
<script>
 
</script>
</body>





