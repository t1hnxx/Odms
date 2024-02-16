<?php
	require "session.php";
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('vendor/autoload.php');

if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 1; $i <= $sheetCount; $i ++) {
			$studentNum = "";
            if (isset($spreadSheetAry[$i][0])) {
                $studentNum = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }

            $studentFname = "";
            if (isset($spreadSheetAry[$i][1])) {
                $studentFname = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }
            $studentMname = "";
            if (isset($spreadSheetAry[$i][2])) {
                $studentMname = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }
			$studentLname = "";
            if (isset($spreadSheetAry[$i][3])) {
                $studentLname = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }
            $studentGender = "";
            if (isset($spreadSheetAry[$i][4])) {
                $studentGender = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }
			$studentUsername = "";
            if (isset($spreadSheetAry[$i][5])) {
                $studentUsername = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
            }
			$studentEmail = "";
            if (isset($spreadSheetAry[$i][6])) {
                $studentEmail = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
            }
			$studentPassword = "";
            if (isset($spreadSheetAry[$i][7])) {
				
                $studentPassword = mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
            }

			$studentCourse = "";
            if (isset($spreadSheetAry[$i][8])) {
                $studentCourse = mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]);
            }

			
	
			

            if (! empty($studentNum)  || ! empty($studentFname)  || ! empty($studentLname) || ! empty($studentGender) || ! empty($studentCourse) || ! empty($studentEmail)){
				//for username
				$num = '1234567890';
				$number = substr(str_shuffle($num),0,4);
				if($studentCourse == "BSIT"){
				$studentUsername = "bsit_stdnt". $number;}
				else{
					$studentUsername = "stdnt". $number;
				}
				//for password
				$length = 8;
				$random = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
				$studentPassword = $random;

                $query = "insert into student_email(studentNum,studentFname,studentMname,studentLname,studentGender,studentUsername,studentEmail,studentPassword,studentCourse) values(?,?,?,?,?,?,?,?,?)";
                $paramType = "sssssssss";
                $paramArray = array(
                    $studentNum,
					$studentFname,
                    $studentMname,
					$studentLname,
					$studentGender,				
					$studentUsername,
					$studentEmail,
					$studentPassword,
					$studentCourse,
                );



				
                $insertId = $db->insert($query, $paramType, $paramArray);
                // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                // $result = mysqli_query($conn, $query);

                if (! empty($insertId)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }

				$query1 = "insert into student_sheets(studentNum,studentFname,studentMname,studentLname,studentGender,studentUsername,studentEmail,studentPassword,studentCourse) values(?,?,?,?,?,?,?,?,?)";
                $paramType1 = "sssssssss";
                $paramArray1 = array(
                    $studentNum,
					$studentFname,
                    $studentMname,
					$studentLname,
					$studentGender,				
					$studentUsername,
					$studentEmail,
					$studentPassword,
					$studentCourse,
                );



				
                $insertId1 = $db->insert($query1, $paramType1, $paramArray1);
                // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                // $result = mysqli_query($conn, $query);

                if (! empty($insertId1)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../ODMS Logo.png">

	<title>ADMIN | CEIT-ODMS</title>
	
	<link rel="stylesheet" href="../https://fonts.googleapis.com/css2?family=Roboto">

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

.outer-container {
	border:#ec6d18 1px solid;
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

#response {
	padding: 10px;
	margin-top: 10px;
	border-radius: 2px;
	display: none;
}

.success {
	background: #c7efd9;
	border: #bbe2cd 1px solid;
}

.error {
	background: #fbcfcf;
	border: #f3c6c7 1px solid;
}

div#response.display-block {
	display: block;
}

.input-row {
	margin-top: 0px;
	margin-bottom: 20px;
	padding: 20px;
}

.btn-submit {
	background: #ec6d18;
	border: black 1px solid;
	color: white;
	width: 100%;
	border-radius: 20px;
	cursor: pointer;
	padding: 12px;
}

label {
	margin-bottom: 5px;
	display: inline-block;
	font-weight: normal;
	color: white;
	line-height: 2.5;
}

.file {
	border: 1px solid #cfcdcd;
	padding: 12px;
	border-radius: 20px;
	color: #ec6d18;
	width: 93%;
	margin-bottom: 20px;
	display: none;visibility: none;
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
 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-personnel.php" class="nav-link text-decoration-none link-warning text-black" ><i class="bi bi-person-circle"></i>&nbsp Designation</a></li>

					<li></li>

					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-faculty.php" class="nav-link text-decoration-none link-warning text-black" ><i class="bi bi-people"></i>&nbsp Faculty</a></li>

					<li></li>
					
					<li class="bd-links-group py-2 px-3 border-0 "><a href="admin-student.php" class="nav-link active text-decoration-none" style="color:#ec6d18"  ><i class="bi bi-mortarboard"></i>&nbsp Students</a></li>
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
		<a class="btn border-0 m-3 mb-1 text-decoration-underline fw-bolder" href="admin-student.php" style="border: 2px solid #ec6d18;font-size: 120%;color:#ec6d18"><i class="bi bi-arrow-left-circle"></i>&nbspBACK</a>   
		<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block alert alert-primary d-flex align-items-center alert-dismissible fade show "; } ?>"  role="alert">
			<i class="bi bi-check-square"></i> &nbsp <?php if(!empty($message)) { echo $message; } ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>

	<div class="outer-container">
		<div class="row">
			<form class="form-horizontal" action="" method="post"
				name="frmExcelImport" id="frmExcelImport"
				enctype="multipart/form-data" onsubmit="return validateFile()">
				<div Class="input-row">
					<label for="file" class="border border-black rounded-2 text-dark" style="cursor: pointer;">&nbsp<i class="bi bi-file-earmark-spreadsheet"></i>&nbsp INSERT YOUR FILE HERE.&nbsp</label>
					
						<input type="file" name="file" id="file" class="file"
							accept=".xls,.xlsx"  onchange="getImage(this.value);"><br>
							<br><div class="text-dark" id="display-image"></div>
					<div class="import"> <br>
						<button type="submit" id="submit" name="import" class="btn-submit">Import
							Excel and Save Data</button>
					</div>
				</div>
			</form>
		</div>
	</div> <br><br>
	
<?php
$sqlSelect = "SELECT * FROM student_email";
$result = $db->select($sqlSelect);
if (! empty($result)) {
    ?>
	<button type="button" id="toSave" class="btn btn-success btn-lg"><i class="bi bi-envelope-at"></i> &nbsp Send Accounts to their Emails</button>
    <button type="button" id="toRemove" class="btn btn-danger btn-lg float-end"><i class="bi bi-person-x"></i> &nbsp Delete</button>
	<table class='tutorial-table'>
		<thead>
			<tr>
				<th>Full Name</th>
				<th>Student Number</th>
				<th>Course</th>
				<th>Email</th>
				<th>Username</th>
				<th>Password</th>
				
			</tr>
		</thead>
<?php
    foreach ($result as $row) { // ($row = mysqli_fetch_array($result))
        ?>
        <tbody>
			<tr>
				<td><?php  echo $row['studentFname']. " " . $row['studentMname']. " " . $row['studentLname']; ?></td>
				<td><?php  echo $row['studentNum']; ?></td>
				<td><?php  echo $row['studentCourse']; ?></td>
				<td><?php  echo $row['studentEmail']; ?></td>
				<td><?php  echo $row['studentUsername']; ?></td>
				<td><?php  echo $row['studentPassword']; ?></td>
			</tr>
<?php
    }
    ?>
        </tbody>
	</table>
	
<?php
}

?>

</main>
</div>

</div>
</div>
<div class="position-fixed bottom-0 end-0 bg-secondary-subtle" id="ct6" style="font-size: 16px"></div>
</body>
</html>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src='../node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script>
	/*$(document).ready(function() {
        $('#toSave').click(function() {
			$.ajax({
        url: 'mailS.php',
		type: 'POST',
        success:function(response){
          if(response == "Account Added Successfully!"){
            Swal.fire({		
			icon: 'success',
           	title: response,		   
              showConfirmButton: false,
  			timer: 2500
          }).then(function(){
			window.location.href = "excel_emailS.php";
		  });
          }
		else {
			Swal.fire({	
              title: response,
			  text:"Check your internet connection and try again",
              icon: 'error',  
              showConfirmButton: false,
 			 timer: 2500
          }).then(function(){
			window.location.href = "excel_emailS.php";
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
    window.location.href = 'mailS.php';
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
        url: 'mail-removeS.php',
		type: 'POST',
        success:function(response){
          if(response == "SUCCESSFUL"){
            Swal.fire({
		
			icon: "success",
           	title: response,
			   
              showConfirmButton: false,
  			timer: 2500
          }).then(function(){
			window.location.href = "excel_email.php";
		  });
          }
		else{
			Swal.fire({
              title: response,
              icon: "error",  
              showConfirmButton: true,
			  timer: 2500,
          }).then(function(){
			window.location.href = "excel_email.php";
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



<script>
function getImage(imagename)
 {
  var newimg=imagename.replace(/^.*\\/,"");
  $('#display-image').html(newimg).prepend('<i class="bi bi-file-earmark-spreadsheet"></i> &nbsp');
 }
</script>

<script>
	const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>