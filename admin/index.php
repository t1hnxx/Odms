<?php 
	require "dbcon.php";
	require "session.php";
?>
<!DOCTYPE html>
<!--AUGUST 2, LOGIN PAGE -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../ODMS Logo.png">

	<title>ADMIN | CEIT-ODMS</title>
	
  <link rel="stylesheet" href="..//https://fonts.googleapis.com/css2?family=Roboto">
    <link rel="stylesheet" href="..//bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <script src="../node_modules/chart.js/dist/chart.umd.js"></script>
  <script type="text/javascript" src="..//https://www.gstatic.com/charts/loader.js"></script>
 
  
  
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
      }
    .row {
      display: flex;
      justify-content: space-around;
    }

    .chart-container {
      width: 45%;
      max-width: 600px;
    }

    #faculty_sheets {
      width: 100%;
    }

    #3d-pie-chart {
      width: 100%;
      /* Removed fixed height */
    }
  </style>
	
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
     
	  .nav-pills>button.active,
		.nav-pills>button:hover,
		.nav-pills>button:focus {
		background-color: #ec6d18!important;
		color: white!important;
		}
	  

	 
		.row {
  display: flex;
  justify-content: center;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  transition: 0.3s;
  width: 200px;
  height: 100x; /* Reduced height for a rectangular box shape */
  background-color: rgba(255, 224, 178, 0.8);
  margin: .3em;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  border-radius: 1px; /* Smaller borderRadius for subtle box shape */
  cursor: pointer; /* Make it clear these are buttons */
}



.card .image {
  opacity: 1;
  transition: .5s ease;
  backface-visibility: hidden;
  width: 150px; /* Maintain image aspect ratio with reduced height */
  height: 150px;
}

.card:hover .image {
  opacity: 0.3;
}

.card .container {
  padding: 4px;
  background-color: white;
  opacity: 0;
  transition: .5s ease;
  position: absolute;
  top: 20%;
  left: 20%;
  transform: translate(-40%, -40%);
  -ms-transform: translate(-40%, -40%);
}

.card:hover {
  opacity: 1;
}
.chart {
  width: 350px;
  height: 250x; /* Reduced height for a rectangular box shape */
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
				

				
				echo $name;?> &nbsp&nbsp
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
			  </a></div>	
		</div>      	
	</nav>


<br><br><br>
	<div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout">
	<div class="row">
	 	<div class="col-md-2 justify-content-start" style="overflow: auto;">
	   <aside class="bd-sidebar">
	     <div class="offcanvas-lg offcanvas-start" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
			<div class="offcanvas-header" style="color:  #ec6d18">
				<h4 class="offcanvas-title" id="offcanvasResponsiveLabel">Online Document Monitoring System</h6>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
			</div>

			<div class="offcanvas-body">
			  <nav class="shadow nav nav-underline">
				<ul class="bd-links-nav list-unstyled mb-0 pb-5 pb-md-2 pe-lg-1" style="height:100vh; overflow: auto; position:fixed; width: 30vh"> 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="index.php" class="nav-link active text-decoration-none" style="color:#ec6d18; font-family: 'Poppins', sans-serif;"><i class="bi bi-house" ></i>&nbsp Dashboard</a></li>
					
					<li></li>
 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-personnel.php" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-person-circle"></i>&nbsp Designation</a></li>


					<li></li>

          <li class="bd-links-group py-2 px-3 border-0 "><a href="admin-faculty.php" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-people"></i>&nbsp Faculty</a></li>

<li></li>
					
					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-student.php" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-mortarboard"></i>&nbsp Students</a></li>
					<li></li>

					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-report.php" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-file-earmark-text"></i>&nbsp Reports</a></li>
					<li></li>
				
					<li class="bd-links-group py-2 px-3 border-0 "><a onclick="logout()" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-box-arrow-right"></i>&nbsp Log out</a></li>

				</ul>
			  </nav>
			</div>
		 </div>		
	    </aside>
	 </div>

	<div class="col-md-10 mt-1" id="body">
	<main class="bd-main order-1" id="main">   
		<div style="color:#ec6d18" class="search-me">	
		<div class="text-center" style="color:#ec6d18">	
			<h3><b>DASHBOARD</b></h3> 
            <hr style="height:2px;border-width:0;color:black;background-color:black">
        </div>

<br>
<div class="row">
<div class="card">
  <a href="index_dafe.php">
    <img src="images/dafe.png" alt="Avatar" class="image" style="width:100%">
  </a>
  <div class="overlay">
    <div>
      
    </div>
  </div>
</div>

  <div class="card">
  <a href="index_dcea.php">
    <img src="images/dcea.png" alt="Avatar" class="image" style="width:100%">
	</a>
    <div class="overlay">
    </div>
  </div>

  <div class="card">
  <a href="index_dcee.php">
    <img src="images/dcee.png" alt="Avatar" class="image" style="width:100%">
	</a>
    <div class="overlay">
    </div>
  </div>

  <div class="card">
  <a href="index_diet.php">
    <img src="images/diet.png" alt="Avatar" class="image" style="width:100%">
</a>	
    <div class="overlay">
    </div>
  </div>

  <div class="card">
  <a href="index_dit.php">
    <img src="images/dit.png" alt="Avatar" class="image" style="width:100%">
</a>
    <div class="overlay">
    </div>
  </div>
 

		</main>

    <br>
    <hr>

    <div class="row">
    
    <div class="col-sm-5">
						<?php					
						$totalFac = "SELECT facultyDepartment, COUNT(*) as total_Faculty FROM faculty_info WHERE userType='Personnel'  AND (facultyDepartment = 'DIT' OR facultyDepartment = 'DIET' OR facultyDepartment = 'DCEE' OR facultyDepartment = 'DCEA' OR facultyDepartment = 'DAFE')";
						$resultFac = mysqli_query($conn,$totalFac);
						$rowsFac = mysqli_fetch_assoc($resultFac);
						
						$totaldceaFAc = "SELECT facultyDepartment, COUNT(*) as total_DCEA FROM faculty_info WHERE userType='Personnel' AND facultyDepartment = 'DCEA'";
						$resultdceaFac = mysqli_query($conn,$totaldceaFAc);
						$rowsdceaFac = mysqli_fetch_assoc($resultdceaFac);

						$totaldceeFac = "SELECT facultyDepartment, COUNT(*) as total_DCEE FROM faculty_info WHERE userType='Personnel' AND facultyDepartment = 'DCEE'";
						$resultdceeFac = mysqli_query($conn,$totaldceeFac);
						$rowsdceeFac = mysqli_fetch_assoc($resultdceeFac);

            $totalditFac = "SELECT facultyDepartment, COUNT(*) as total_DIT FROM faculty_info WHERE userType='Personnel' AND facultyDepartment = 'DIT'";
						$resultditFac = mysqli_query($conn,$totalditFac);
						$rowsditFac = mysqli_fetch_assoc($resultditFac);

            $totaldafeFac = "SELECT facultyDepartment, COUNT(*) as total_DAFE FROM faculty_info WHERE userType='Personnel' AND facultyDepartment = 'DAFE'";
						$resultdafeFac = mysqli_query($conn,$totaldafeFac);
						$rowsdafeFac = mysqli_fetch_assoc($resultdafeFac);

            $totaldietFac = "SELECT facultyDepartment, COUNT(*) as total_DIET FROM faculty_info WHERE userType='Personnel' AND facultyDepartment = 'DIET'";
						$resultdietFac = mysqli_query($conn,$totaldietFac);
						$rowsdietFac = mysqli_fetch_assoc($resultdietFac);

						?>
            <div class="chart border-dark rounded-0" style = "width: 400px; height: 250x;">
    <div class="chart-header border-dark border-2 fw-bolder" style="font-size: 20px">Total Number of Faculty by Department</div>
	<h3 class="chart-title" style="color:#ec6d18; font-size: 40px; text-align: center"><?php echo $rowsFac['total_Faculty']; ?> </h3>
        <!-- Add a canvas element for the bar graph for student distribution in DCEA department -->
        <canvas id="facultyBarChart" width="700" height="500"></canvas>
    </div>
</div> 
<div class="col-sm-5">
					<?php					
					$dceaqueryall = "SELECT documentType, COUNT(*) as total_docu FROM users_documents WHERE (documentType='thesis' OR documentType='journal' OR documentType='completion_form')";
					$resultsall = mysqli_query($conn,$dceaqueryall);
					$dcearowall = mysqli_fetch_assoc($resultsall);
					
					$dceaquery = "SELECT documentType, COUNT(*) as total_thesis1 FROM users_documents WHERE documentType='thesis'";
					$results = mysqli_query($conn,$dceaquery);
					$dcea1 = mysqli_fetch_assoc($results);

					$dceaojt = "SELECT documentType, COUNT(*) as total_journal2 FROM users_documents WHERE documentType='journal'";
					$resultdceaojt = mysqli_query($conn,$dceaojt);
					$dcea2 = mysqli_fetch_assoc($resultdceaojt);

					$dceacompletion = "SELECT documentType, COUNT(*) as total_completion3 FROM users_documents WHERE documentType='completion_form'";
					$resultdceacompletion = mysqli_query($conn,$dceacompletion);
					$dcea3 = mysqli_fetch_assoc($resultdceacompletion);
					
					
					?>
<div class="chart border-dark rounded-0">
    <div class="card-header border-dark border-2 fw-bolder" style="font-size: 20px">Total Documents</div>
    <div class="chart-body lh-1">
        <h3 class="card-title" style="color:#ec6d18; font-size: 40px; text-align: center"><?php echo $dcearowall['total_docu']; ?> </h3>
        <!-- Add a canvas element for the pie chart for DCEA department -->
        <canvas id="dceaPieChart" width="300" height="200"></canvas>
    </div>
      </div>
					</div>
  <div class="row-sm-5">
						<?php					
						$totalStudent = "SELECT studentCourse, COUNT(*) as total_Student FROM student_info WHERE userType='Student'  AND (studentCourse = 'BSABE' OR studentCourse = 'BS Arch' OR studentCourse = 'BSCpE' OR studentCourse = 'BSCS' OR studentCourse = 'BSEE' OR studentCourse = 'BSECE'
            OR studentCourse = 'BSIE' OR studentCourse = 'BSIndT-ET' OR studentCourse = 'BSIndT-ELEX' OR studentCourse = 'BSIndT-AT' OR studentCourse = 'BSIT' OR studentCourse = 'BSCE' )";
						$resultStud = mysqli_query($conn,$totalStudent);
						$rowsStud = mysqli_fetch_assoc($resultStud);
						
						$totalBSABE = "SELECT studentCourse, COUNT(*) as total_BSABE FROM student_info WHERE userType='Student' AND studentCourse = 'BSABE'";
						$resultBSABE = mysqli_query($conn,$totalBSABE);
						$rowsBSABE = mysqli_fetch_assoc($resultBSABE);

						$totalBSARCH = "SELECT studentCourse, COUNT(*) as total_BSARCH FROM student_info WHERE userType='Student' AND studentCourse = 'BS Arch'";
						$resultBSARCH = mysqli_query($conn,$totalBSARCH);
						$rowsBSARCH = mysqli_fetch_assoc($resultBSARCH);

            $totalBSCpE = "SELECT studentCourse, COUNT(*) as total_BSCpE FROM student_info WHERE userType='Student' AND studentCourse = 'BSCpE'";
						$resultBSCpE = mysqli_query($conn,$totalBSCpE);
						$rowsBSCpE = mysqli_fetch_assoc($resultBSCpE);

            $totalBSCS = "SELECT studentCourse, COUNT(*) as total_BSCS FROM student_info WHERE userType='Student' AND studentCourse = 'BSCS'";
						$resultBSCS = mysqli_query($conn,$totalBSCS);
						$rowsBSCS = mysqli_fetch_assoc($resultBSCS);

            $totalBSEE = "SELECT studentCourse, COUNT(*) as total_BSEE FROM student_info WHERE userType='Student' AND studentCourse = 'BSEE'";
						$resultBSEE = mysqli_query($conn,$totalBSEE);
						$rowsdBSEE = mysqli_fetch_assoc($resultBSEE);

            $totalBSECE = "SELECT studentCourse, COUNT(*) as total_BSECE FROM student_info WHERE userType='Student' AND studentCourse = 'BSECE'";
						$resultBSECE = mysqli_query($conn,$totalBSECE);
						$rowsdBSECE = mysqli_fetch_assoc($resultBSECE);

            $totalBSIE = "SELECT studentCourse, COUNT(*) as total_BSIE FROM student_info WHERE userType='Student' AND studentCourse = 'BSIE'";
						$resultBSIE = mysqli_query($conn,$totalBSIE);
						$rowsdBSIE = mysqli_fetch_assoc($resultBSIE);

            $totalBSIndTET = "SELECT studentCourse, COUNT(*) as total_BSIndTET FROM student_info WHERE userType='Student' AND studentCourse = 'BSIndT-ET'";
						$resultBSIndTET = mysqli_query($conn,$totalBSIndTET);
						$rowsdBSIndTET = mysqli_fetch_assoc($resultBSIndTET);

            $totalBSIndTELEX = "SELECT studentCourse, COUNT(*) as total_BSIndTELEX FROM student_info WHERE userType='Student' AND studentCourse = 'BSIndT-ELEX'";
						$resultBSIndTELEX = mysqli_query($conn,$totalBSIndTELEX);
						$rowsdBSIndTELEX = mysqli_fetch_assoc($resultBSIndTELEX);

            $totalBSIndTAT = "SELECT studentCourse, COUNT(*) as total_BSIndTAT FROM student_info WHERE userType='Student' AND studentCourse = 'BSIndT-AT'";
						$resultBSIndTAT = mysqli_query($conn,$totalBSIndTAT);
						$rowsdBSIndTAT = mysqli_fetch_assoc($resultBSIndTAT);

            $totalBSIT = "SELECT studentCourse, COUNT(*) as total_BSIT FROM student_info WHERE userType='Student' AND studentCourse = 'BSIT'";
						$resultBSIT = mysqli_query($conn,$totalBSIT);
						$rowsdBSIT = mysqli_fetch_assoc($resultBSIT);

            $totalBSCE = "SELECT studentCourse, COUNT(*) as total_BSCE FROM student_info WHERE userType='Student' AND studentCourse = 'BSCE'";
						$resultBSCE = mysqli_query($conn,$totalBSCE);
						$rowsdBSCE = mysqli_fetch_assoc($resultBSCE);

						?>
  
  <div class="chart border-dark rounded-0" style = "width: 450px; height: 250x;" >
  <div class="chart-header border-dark border-2 fw-bolder" style="font-size: 20px">Total Number of Student by Program</div>
	<h3 class="chart-title" style="color:#ec6d18; font-size: 40px; text-align: center"><?php echo $rowsStud['total_Student']; ?> </h3>
        <!-- Add a canvas element for the bar graph for student distribution in DCEA department -->
        <canvas id="studentBarChart" width="700" height="500"></canvas>
    </div>
</div>
</div>
<br>


	</div>
	</div>
	</div>
  
	<div class="position-fixed bottom-0 end-0 bg-secondary-subtle" id="ct6" style="font-size: 16px"></div>


<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src='../node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script>
// Assuming you have the data available in JavaScript variables
var labels = ['Thesis', 'Journal', 'Completion Form'];
var data = [
  <?=$dcea1['total_thesis1']?>,
  <?=$dcea2['total_journal2']?>,
  <?=$dcea3['total_completion3']?>
];

// Set up the data for the pie chart
var pieData = {
  labels: labels,
  datasets: [{
    data: data,
    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
  }]
};

// Get the canvas element
var ctx = document.getElementById('dceaPieChart').getContext('2d');

// Create the pie chart
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: pieData
});
</script>

<script>
// Assuming you have the data available in JavaScript variables
var labels = ['DCEA', 'DCEEE', 'DIT', 'DAFE', 'DIET'];
var data = [
  <?=$rowsdceaFac['total_DCEA']?>,
  <?=$rowsdceeFac['total_DCEE']?>,
  <?=$rowsditFac['total_DIT']?>,
  <?=$rowsdafeFac['total_DAFE']?>,
  <?=$rowsdietFac['total_DIET']?>
];

// Set up the data for the bar chart
var barData = {
  labels: labels,
  datasets: [{
    label: '',
    data: data,
    backgroundColor: ['gray', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF8C00', '#8A2BE2', '#00FF00', '#FFD700', '#9400D3', '#FF4500', '#00BFFF'],
    borderWidth: 1
  }]
};

// Get the canvas element
var ctx = document.getElementById('facultyBarChart').getContext('2d');

// Create the bar chart
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: barData,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>

<script>
// Assuming you have the data available in JavaScript variables
var labels = ['BSABE', 'BS Arch', 'BSCpE', 'BSCS', 'BSEE', 'BSECE', 'BSIE', 'BSIndT-ET', 'BSIndT-ELEX', 'BSIndT-AT', 'BSIT', 'BSCE'];
var data = [
  <?=$rowsBSABE['total_BSABE']?>,
  <?=$rowsBSARCH['total_BSARCH']?>,
  <?=$rowsBSCpE['total_BSCpE']?>,
  <?=$rowsBSCS['total_BSCS']?>,
  <?=$rowsdBSEE['total_BSEE']?>,
  <?=$rowsdBSECE['total_BSECE']?>,
  <?=$rowsdBSIE['total_BSIE']?>,
  <?=$rowsdBSIndTET['total_BSIndTET']?>,
  <?=$rowsdBSIndTELEX['total_BSIndTELEX']?>,
  <?=$rowsdBSIndTAT['total_BSIndTAT']?>,
  <?=$rowsdBSIT['total_BSIT']?>,
  <?=$rowsdBSCE['total_BSCE']?>
];

// Set up the data for the bar chart
var barData = {
  labels: labels,
  datasets: [{
    label: '',
    data: data,
    backgroundColor: ['gray', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF8C00', '#8A2BE2', '#00FF00', '#FFD700', '#9400D3', '#FF4500', '#00BFFF'],
    borderWidth: 1
  }]
};

// Get the canvas element
var ctx = document.getElementById('studentBarChart').getContext('2d');

// Create the bar chart
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: barData,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>
<script>
	/*	$(document).ready(function() {
  setInterval(function() {
    $("#body1").load("index.php #body1 > #total1, #sbmtd1, #oh1, #rv1, #pu1")
  }, 5000); // Reload every 2 seconds
});*/
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
            x[i].style.display="list-item";
			                
        } 
    } 
	};
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








</body>

</html>
