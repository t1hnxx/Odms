<?php 
  require ("dbcon.php");
  date_default_timezone_set('Asia/Manila');
  $me = $user1['studentNum'];
?>   
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="ODMS Logo.png">

    <title>CEIT-ODMS |HISTORY </title>
	
	<!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
    <link rel="stylesheet" href="bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
   
</head>
<body style="background-color: #E4E4E4" onload=display_ct6() id="bodyhey">

<nav class="navbar fixed-top shadow-lg" style="background-color: #ec6d18; color: white; top: 0; width: 100%; height: auto; ">
	<div class="d-flex flex-row container-fluid">
    	<button class="navbar-toggler d-lg-none d-inline-block align-text-top" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"> 
			<i class="bi bi-list"></i>
		</button>
		<a class="navbar-brand ms-1 p-0 me-0 me-lg-2" href="index.php" aria-label="odms">
			<img src="uploads/cvsu.png" width="56" height="50" class="align-top" alt="">
			<img src="uploads/ODMS logo.png" width="60" height="60" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
		</a>
		<div class="d-inline-block align-text-top fs-6 text-white w-25">
		
		</div>
		<div class="d-inline-block align-text-top me-1 fs-6 text-white">
			<a href="profile.php?url=<?php echo $user1['studentID'] . '%'.$user1['urlAddress']?>" class="text-white" style="text-decoration:none">
			  <?php 	
          $id = $user1['studentNum'];
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


<br>
<br>
<br>
<div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout"><div class="row "><div class="col-md-2" style="overflow: auto">
 <aside class="bd-sidebar">
<div class="offcanvas-lg offcanvas-start" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" style="background-color: #E4E4E4">
  <div class="offcanvas-header">
    <h4 class="offcanvas-title" id="offcanvasResponsiveLabel">Online Document Monitoring System</h6>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
  </div>


<div class="offcanvas-body">
<nav class="nav nav-underline">
<ul class="bd-links-nav list-unstyled mb-0 pb-5 pb-md-2 pe-lg-1" style="height:100vh; overflow: auto; position:fixed; font-size: 15px"> 
	  
		<li class="bd-links-group py-2 px-3 border-0 " ><a class="nav-link text-decoration-none link-warning text-dark" href="index.php"><i class="bi bi-house" ></i>&nbsp Dashboard</a></li>
		<li></li>

	 
		<li class="bd-links-group py-2 px-3 border-0 "><a href="documentChoice.php" class="nav-link text-decoration-none link-warning text-dark"><i class="bi bi-file-text"></i>&nbsp Documents</a></li>
		<li></li>
		
	  <li class="bd-links-group py-2 px-3 border-0 "><a class="nav-link active text-decoration-none" href="history.php" style="color:#ec6d18; font-size: 15px"><i class="bi bi-layout-text-sidebar-reverse"></i>&nbsp Monitor &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp </a></li>
	  <li></li>
	

   <li class="bd-links-group py-2 px-3 border-0 " ><a onclick="logout()" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-box-arrow-right"></i>&nbsp Log out</a></li>
  <li></li>


</ul>
</nav>
</div>
</div>
</div>

</aside>
<div class="col-md-10 mt-1 shadow">
 <main class="bd-main order-1">
 <?php      
				$conn = mysqli_connect("localhost","root","","odms");
				$student_query = "SELECT * FROM student_info";
				$studentrun = mysqli_query($conn,$student_query);
				$query1 = "SELECT * FROM document_transaction WHERE FIND_IN_SET('$id',documentOwner)";
				$result1 = mysqli_query($conn,$query1);
				$rowres = mysqli_fetch_array($result1);
				$query = "SELECT * FROM document_transaction WHERE FIND_IN_SET('$id',documentOwner) AND documentType='thesis'  ORDER BY date DESC";
				$result = mysqli_query($conn,$query);
				//$row = mysqli_fetch_array($result);
				$query2 = "SELECT * FROM document_transaction WHERE FIND_IN_SET('$id',documentOwner) AND documentType = 'journal' ORDER BY date DESC";
				$result2 = mysqli_query($conn,$query2);
				$query3 = "SELECT * FROM document_transaction WHERE FIND_IN_SET('$id',documentOwner) AND documentType = 'completion_form' ORDER BY date DESC";
				$result3 = mysqli_query($conn,$query3);
				
			?>
    
      <p class="fw-bolder fs-2 text-center" style="letter-spacing: 2px">Monitor Documents</p>
      <hr  style="border-top: 2px solid black" />
<nav>
  <div class="nav nav-underline" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" style="color:#ec6d18">Thesis/ Capstone Project/ Manuscript</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" style="color:#ec6d18">OJT Journal</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" style="color:#ec6d18">Completion Form</button>
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
 <br>
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">   
  <div class="w-50 float-end row">
  <div class="col-sm-1 align-middle p-1">Search:</div> 
  <div class="col-sm-11">
    <input type="text" name="search_history" onkeyup="search_history()" id="search_history" class="form-control-sm float-end border border-secondary border-2" placeholder="" style="width: 96%;background-color: #E4E4E4">
  </div> 
</div>
<br> <br>
 
<div id="hy1" class="">

    <?php
    if(mysqli_num_rows($result)> 0){
    
    while ($row = mysqli_fetch_array($result)){?>  
   <div class=" border border-secondary border-2 m-1 thesis" id="gogo"> 
     <div class="row p-2" >
    <span class="lh-3 fw-bold" id="name1"><?php echo $row['documentName']?> &nbsp &nbsp <span id="id1"> (<?php echo $row['documentID']?>)</span></span> <br>   
    <span class="lh-1 ms-2">Status: <span style="color:#ec6d18" class="fw-bold" id="submitted1"><?php 
            $submit = $row['submittedTo'];
            $faculty ="SELECT facultyID, facultyFname, facultyMname, facultyLname FROM faculty_info WHERE facultyID = '$submit' LIMIT 1 ";
            $runme = mysqli_query($conn,$faculty);
            $rowF = mysqli_fetch_assoc($runme);

              if($row['documentStatus'] == 'submitted'){
                if(!$rowF){
									echo "Submitted the document to None";
								}else{
                  echo "Submitted the document to " .$rowF['facultyFname'] . " " . $rowF['facultyLname']  ;
                }
              }
								elseif($row['documentStatus'] == 'on_hand'){
									echo "Prof. "  .$rowF['facultyFname'] . " " . $rowF['facultyLname'] . " received the document"; 
								}
								elseif($row['documentStatus'] == 'review'){
									echo "Prof. "  .$rowF['facultyFname'] . " " . $rowF['facultyLname'] . " is reviewing your document";
								}
								elseif($row['documentStatus'] == 'pick-up'){
									echo "Your document is available for pick-up";
								}
								elseif($row['documentStatus'] == 'created'){
									echo "You've created your document";
								}
								elseif($row['documentStatus'] == 'return'){
									echo "Your document has been returned";
								}
								elseif($row['documentStatus'] == null){
									echo "Not submitted Yet";
								}
								else{
									echo "Error";
								}; 
  
              ?>
  </span> </span><br>
  <hr style="width: 94%;margin:auto; border: 1px solid black" >
    <span class="lh-1 ms-2" style="font-size: 14px" id="remarks1">Remarks:  <i><?php echo $row['remarks']?></i> </span>
    <i class="text-secondary ms-2" style="font-size:12px" id="date1"> <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 
   </div>
    </div>
<?php }
}else{ ?>
  <div class="border border-secondary border-1 d-flex justify-content-center p-1"id="gogo"> 
<br><span class="justify-content-center align-items-center fw-bolder" style="color:#ec6d18; font-size:x-large">There are no actvity in this document</span>
    </div>
<?php } ?>             
    </div>
  </div>

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
 <div class="w-50 float-end row">
  <div class="col-sm-1 align-middle p-1">Search:</div> 
  <div class="col-sm-11">
    <input type="text" name="search_journal" onkeyup="search_journal()" id="search_journal" class="form-control-sm float-end border border-secondary border-2" placeholder="" style="width: 96%;background-color: #E4E4E4">
  </div> 
</div>
<br> <br>
  
  <div id="hy2" class="">
    <?php if(mysqli_num_rows($result2)){

    while ($row2 = mysqli_fetch_array($result2)){?>  
      <div class= "border border-secondary border-2 m-1 journal" id="gogo2"> 
        <div class ="row p-2">
        <span class="lh-3 fw-bold"><?php echo $row2['documentName']?> &nbsp &nbsp (<?php echo $row2['documentID']?>)</span> <br>   
        <span class="lh-1 ms-2">Status: <span style="color:#ec6d18" class="fw-bold">
        <?php 
        $submit = $row2['submittedTo'];
        $faculty ="SELECT facultyID, facultyFname, facultyMname, facultyLname FROM faculty_info WHERE facultyID = '$submit' LIMIT 1 ";
        $runme = mysqli_query($conn,$faculty);
        $rowF = mysqli_fetch_assoc($runme);
       
        if($row2['documentStatus'] == 'submitted'){
          echo "Submitted the document to " .$rowF['facultyFname'] . " " . $rowF['facultyLname']  ;
        }
        elseif($row2['documentStatus'] == 'on_hand'){
          echo "On-hand"; 
        }
        elseif($row2['documentStatus'] == 'review'){
          echo "Prof. "  .$rowF['facultyFname'] . " " . $rowF['facultyLname'] . " is reviewing your document";
        }
        elseif($row2['documentStatus'] == 'pick-up'){
          echo "Your document is available for pick-up";
        }
        elseif($row2['documentStatus'] == 'created'){
          echo "You've created your document";
        }
        elseif($row2['documentStatus'] == 'return'){
          echo "Your document has been returned";
        }
        elseif($row2['documentStatus'] == 'graded'){
          echo "Prof. "  .$rowF['facultyFname'] . " " . $rowF['facultyLname'] . " graded your OJT Journal"; 
        }
        elseif($row2['documentStatus'] == null){
          echo "Not submitted Yet";
        }
        else{
          echo "Error";
        }; 
      
                  ?>     
      </span> </span><br>
        <hr style="width: 94%;margin:auto; border: 1px solid black" >
        <span class="lh-1 ms-2" style="font-size: 14px">Remarks:  <i><?php echo $row2['remarks']?></i> </span>
        <i class="text-secondary ms-2" style="font-size:12px"><?php echo date('F j, Y, g:i a', strtotime($row2['date']));?></i> 
      </div>
    </div>
      <?php }
      }else{ ?> 
        <div class="border border-secondary border-1 d-flex justify-content-center p-1"> 
      <br><span class="justify-content-center align-items-center fw-bolder" style="color:#ec6d18; font-size:x-large">There are no actvity in this document</span>
    </div>
  <?php } ?>
      </div>
  </div>

  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">  
  <div class="w-50 float-end row">
  <div class="col-sm-1 align-middle p-1">Search:</div> 
  <div class="col-sm-11">
    <input type="text" name="search_completion" onkeyup="search_completion()" id="search_completion" class="form-control-sm float-end border border-secondary border-2" placeholder="" style="width: 96%;background-color: #E4E4E4">
  </div> 
</div>
<br> <br>
  
    <div id="hy3" class="">
      <?php if(mysqli_num_rows($result3)){

      while ($row3 = mysqli_fetch_array($result3)){?>  
       <div class= "border border-secondary border-2 m-1 completion" id="gogo3"> 
          <div class="row p-2">
          <span class="lh-3 fw-bold"><?php echo $row3['documentName']?> &nbsp &nbsp (<?php echo $row3['documentID']?>)</span> <br>   
          <span class="lh-1 ms-2">Status: <span style="color:#ec6d18" class="fw-bold">
          <?php 

              $submit = $row3['submittedTo'];
              $faculty ="SELECT facultyID, facultyFname, facultyMname, facultyLname FROM faculty_info WHERE facultyID = '$submit' LIMIT 1 ";
              $runme = mysqli_query($conn,$faculty);
              $rowFl = mysqli_fetch_assoc($runme);
              if($row3['documentStatus'] == 'submitted'){
                echo "Submitted the document to " .$row3['facultyFname'] . " " . $row3['facultyLname']  ;
              }
              elseif($row3['documentStatus'] == 'on_hand'){
                echo "On-hand"; 
              }
              elseif($row3['documentStatus'] == 'review'){
                echo "Prof. "  .$row3['facultyFname'] . " " . $row3['facultyLname'] . " is reviewing your document";
              }
              elseif($row3['documentStatus'] == 'pick_up'){
                echo "Your document is available for pick-up";
              }
              elseif($row3['documentStatus'] == 'created'){
                echo "Completion Form created";
              }
              elseif($row3['documentStatus'] == 'return'){
                echo "Your document has been returned";
              }
              elseif($row3['documentStatus'] == null){
                echo "Not submitted Yet";
              }
              elseif($row3['documentStatus'] == 'signed'){
                echo $rowFl['facultyFname'] . " " . $rowFl['facultyLname'] . " signed your document";
              }
              elseif($row3['documentStatus'] == 'to_dean'){
                echo "Received by College Dean";
              }
              elseif($row3['documentStatus'] == 'to_registrar'){
                echo "Forwarded to College Registrar";
              }
              elseif($row3['documentStatus'] == 'to_uregistrar'){
                echo "Forwarded to University Registrar";
              }
              elseif($row3['documentStatus'] == 'to_chairperson'){
                echo "Received by the Department Chairperson";
              }
              else{
                echo "Error";
              }; 
        
                    ?>    
        </span> </span><br>
          <hr style="width: 94%;margin:auto; border: 1px solid black" >
          <span class="lh-1 ms-2" style="font-size: 14px">Remarks:  <i><?php echo $row3['remarks']?></i> </span>
          <i class="text-secondary ms-2" style="font-size:12px"><?php echo date('F j, Y, g:i a', strtotime($row3['date']));?></i> 
        </div>
          </div>
      <?php }
      }else{ ?> 
      <div class="border border-secondary border-1 d-flex justify-content-center p-1" id="gogo3"> 
      <br><span class="justify-content-center align-items-center fw-bolder" style="color:#ec6d18; font-size:x-large">There are no actvity in this document</span>
      </div>

      <?php } ?>
    </div>
  </div>
</div>
<br>
 <hr  style="border-top: 2px solid black" />
</main>
   </div> 
  </div>
<br>
     </div>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src='node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>

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
  <!-- ========== CLOCK========== -->
 
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
  setInterval(function() {
    $("#hy1").load("history.php #gogo")
  }, 2000); // Reload every 2 seconds
});
</script>

<script>
	$(document).ready(function() {
  setInterval(function() {
    $("#hy2").load("history.php #gogo2")
  }, 2000); // Reload every 2 seconds
});
</script>

<script>
	$(document).ready(function() {
  setInterval(function() {
    $("#hy3").load("history.php #gogo3")
  }, 2000); // Reload every 2 seconds
});
</script>
<script>
 /* $(document).ready(function() {
    var hcount = 10;
    $('#more-button').click(function() {
        hcount = hcount + 10;
        $('#hy1').load("load.php",{newCount:hcount});
     
    })})*/
</script>

<script>
	function search_history(){
		let input = document.getElementById('search_history').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('thesis'); 
	for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
			x[i].style.listStyleType="none"; 
            x[i].style.display="block";
			                
        } 
    } 
	};
</script>

<script>
	function search_journal(){
		let input = document.getElementById('search_journal').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('journal'); 
	for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
			x[i].style.listStyleType="none"; 
            x[i].style.display="block";
			                
        } 
    } 
	};
</script>

<script>
	function search_completion(){
		let input = document.getElementById('search_completion').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('completion'); 
	for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
			x[i].style.listStyleType="none"; 
            x[i].style.display="block";
			                
        } 
    } 
	};
</script>

</body>
      </html>