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
	
	<link href="..//https://fonts.googleapis.com/css2?family=Inconsolata:wght@400;600&family=Open+Sans:wght@600&family=Roboto:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="..//bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
	<script src="../node_modules/chart.js/dist/chart.umd.js"></script>


	

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


<br><br>
<div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout">
        <div class="row">
            <div class="col-md-2 justify-content-start" style="overflow: auto;">
                <!-- ... (unchanged) -->
	   <aside class="bd-sidebar">
	     <div class="offcanvas-lg offcanvas-start" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
			<div class="offcanvas-header" style="color:  #ec6d18">
				<h4 class="offcanvas-title" id="offcanvasResponsiveLabel">Online Document Monitoring System</h6>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
			</div>

			
		 </div>		
	    </aside>
	 </div>
			</div>
			</div>

	 <div class="col-md-10 mt-1 mx-auto" id="body">
                <main class="bd-main order-1" id="main">     
	<a class="btn border-0 m-1 text-decoration-underline fw-bolder" href="index.php" style="border: 1px solid #ec6d18;font-size: 100%;color:#ec6d18"><i class="bi bi-arrow-left-circle"></i>&nbspBACK</a>   
		<div style="color:#ec6d18" class="search-me">	
	
			<div class="text-center" style="color:#ec6d18">	
			<h3><b>Department of Civil Engineering and Architecture (DCEA)</b></h3> 
            <hr style="height:2px;border-width:0;color:black;background-color:black">
        </div>
			
				
		<div class="row">
		<div class="col-sm-4 mx-auto">
					<?php					
					$dceaqueryall = "SELECT documentType, COUNT(*) as total_docu FROM users_documents WHERE  facultyDepartment = 'DCEA' AND (documentType='thesis' OR documentType='journal' OR documentType='completion_form')";
					$resultsall = mysqli_query($conn,$dceaqueryall);
					$dcearowall = mysqli_fetch_assoc($resultsall);
					
					$dceaquery = "SELECT documentType, COUNT(*) as total_thesis1 FROM users_documents WHERE documentType='thesis' AND facultyDepartment = 'DCEA'";
					$results = mysqli_query($conn,$dceaquery);
					$dcea1 = mysqli_fetch_assoc($results);

					$dceaojt = "SELECT documentType, COUNT(*) as total_journal2 FROM users_documents WHERE documentType='journal' AND facultyDepartment = 'DCEA'";
					$resultdceaojt = mysqli_query($conn,$dceaojt);
					$dcea2 = mysqli_fetch_assoc($resultdceaojt);

					$dceacompletion = "SELECT documentType, COUNT(*) as total_completion3 FROM users_documents WHERE documentType='completion_form' AND facultyDepartment = 'DCEA'";
					$resultdceacompletion = mysqli_query($conn,$dceacompletion);
					$dcea3 = mysqli_fetch_assoc($resultdceacompletion);
					
					
					?>
<div class="chart border-dark rounded-0">
    <div class="card-header border-dark border-2 fw-bolder" style="font-size: 16px; text-align: center;">Total Documents</div>
    <div class="chart-body lh-1">
        <h3 class="card-title" style="color:#ec6d18; font-size: 40px; text-align: center"><?php echo $dcearowall['total_docu']; ?> </h3>
        <!-- Add a canvas element for the pie chart for DCEA department -->
        <canvas id="dceaPieChart" width="300" height="200"></canvas>
    </div>
      </div>
					</div>
                   
					<div class="col-sm-5 mx-auto">
						<?php					
						$dceaStud = "SELECT studentCourse, COUNT(*) as total_dceaStud FROM student_info WHERE userType='Student'  AND (studentCourse = 'BSCE' OR studentCourse = 'BS Arch')";
						$resultdceaStud = mysqli_query($conn,$dceaStud);
						$rowsdceaStud = mysqli_fetch_assoc($resultdceaStud);
						
						$dceaBSCE = "SELECT studentCourse, COUNT(*) as total_BSCE FROM student_info WHERE userType='Student' AND studentCourse = 'BSCE'";
						$resultdceaBSCE = mysqli_query($conn,$dceaBSCE);
						$rowsdceaBSCE = mysqli_fetch_assoc($resultdceaBSCE);

						$dceaBSARCH = "SELECT studentCourse, COUNT(*) as total_BSARCH FROM student_info WHERE userType='Student' AND studentCourse = 'BS Arch'";
						$resultdceaBSARCH = mysqli_query($conn,$dceaBSARCH);
						$rowsdceaBSARCH = mysqli_fetch_assoc($resultdceaBSARCH);


						?>
            <div class="chart border-dark rounded-0">
			<div class="card-header border-dark border-2 fw-bolder text-center" style="font-size: 16px;">Total Students in Department of Civil Engineering and Architecture</div>
    <div class="card-body lh-1">
	<h3 class="card-title" style="color:#ec6d18; font-size: 40px; text-align: center"><?php echo $rowsdceaStud['total_dceaStud']; ?> </h3>
        <!-- Add a canvas element for the bar graph for student distribution in DCEA department -->
        <canvas id="barChartDCEA4" width="700" height="500"></canvas>
    </div>
</div>
	</div>
	</div>
		</main>
	</div>
	</div>
	<div class="position-fixed bottom-0 end-0 bg-secondary-subtle" id="ct6" style="font-size: 16px"></div>


<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src='../node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>

<script>
	/*	$(document).ready(function() {
  setInterval(function() {
    $("#body1").load("index.php #body1 > #total1, #sbmtd1, #oh1, #rv1, #pu1")
  }, 5000); // Reload every 2 seconds
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
    // JavaScript code for Chart.js
    document.addEventListener('DOMContentLoaded', function() {
        // Get the data from PHP variables for student distribution in DCEA department
		var totalBSCE = <?php echo $rowsdceaBSCE['total_BSCE']; ?>;
        var totalBSARCH = <?php echo $rowsdceaBSARCH['total_BSARCH']; ?>;

        // Create the bar graph for student distribution in DCEA department
        var ctxDCEA4 = document.getElementById('barChartDCEA4').getContext('2d');
        var myBarChartDCEA4 = new Chart(ctxDCEA4, {
            type: 'bar',
            data: {
                labels: ['BS Civil Engineering', 'BS Architecture'],
                datasets: [{
                    label: 'Total Number of Students',
                    data: [totalBSCE, totalBSARCH],
                    backgroundColor: [
                       
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(255, 193, 7, 0.8)',
                        'rgba(40, 167, 69, 0.8)'
                    ],
                    borderColor: [
                       
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 193, 7, 1)',
                        'rgba(40, 167, 69, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>



</body>
</html>
