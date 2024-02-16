<?php
require ("dbcon.php");
date_default_timezone_set('Asia/Manila');?>
<?php 
				$me = $user1['studentNum'];
				//echo strtoupper($fname)." ".strtoupper($lname); ?>   
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="ODMS Logo.png">

    <title>Edit Documents</title>

	<link rel="stylesheet" href="bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
	<style>
      #id_work_days input[type="radio"] {
          display: none;
        }

        #id_work_days span {
          display: inline-block;
          padding: 15px;
          text-transform: uppercase;
          border: 2px solid #FF6F00;
          border-radius: 3px;
          color: #ec6d18;
          margin: 6px;
          text-align:center;
          width: 100%;
          font-size:90%
        }

        #id_work_days input[type="radio"]:checked + span {
          background-color: #FF6F00;
          color: white;
          
        }


        #personnel input[type="radio"] {
          display: none;
        }

        #personnel span {
          display: inline-block;
          padding: 5px;
          text-transform: uppercase;
          border: 2px solid #FF6F00;
          border-radius: 3px;
          color: #ec6d18;
          margin: 6px;
          text-align:center;
          width: 18rem;
          height: 5rem;
          font-size: 1rem
        }

        #personnel input[type="radio"]:checked + span {
          background-color: #FF6F00;
          color: white;
          
        }
        .chosen-image {
          width: 50px;
          height: 50px;
          border-radius: 50%; 
        }
        .chosen-text{
          margin-left: 10px;
        }
        #status{
          pointer-events: none; /* Prevent mouse interaction */
           opacity: 0.5;         /* Make them appear dimmed */
        }
        
    </style>
</head>
 
<body style="background-color: #E4E4E4" onload=display_ct6()>
<nav class="navbar fixed-top shadow-lg" style="background-color: #ec6d18; color: white; top: 0; width: 100%; height: auto; opacity: 95%">
	<div class="d-flex flex-row container-fluid">
    	<button class="navbar-toggler d-lg-none d-inline-block align-text-top" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"> 
			<i class="bi bi-list"></i> 
		</button>
		<a class="navbar-brand ms-1 p-0 me-0 me-lg-2" href="index.php" aria-label="odms">
			<img src="uploads/cvsu.png" width="58" height="55" class="align-top" alt="">
			<img src="uploads/ODMS logo.png" width="65" height="65" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
		</a>
		
		<div class="d-inline-block align-text-top me-1 fs-6 text-white">
			<a href="profile.php?url=<?php echo $user1['studentID'] . '%'.$user1['urlAddress']?>" class="text-white" style="text-decoration:none">
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
	<div class="row">
	 	<div class="col-md-2 justify-content-start position-relative" >
	   		<aside class="bd-sidebar">
	     	<div class="offcanvas-lg offcanvas-start" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" style="background-color: #E4E4E4">
			<div class="offcanvas-header bg-secondary">
				<h4 class="offcanvas-title" id="offcanvasResponsiveLabel">Online Document Monitoring System</h6>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
			</div>

			<div class="offcanvas-body bg-secondary">
			  <nav class="nav nav-underline">
				<ul class="bd-links-nav list-unstyled mb-0 pb-5 pb-md-2 pe-lg-1" style="height:100vh; overflow: auto; position:fixed; font-size: 15px"> 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="index.php" class="nav-link text-decoration-none link-warning text-dark"><i class="bi bi-house" ></i>&nbsp Dashboard</a></li>
					
					<li></li>
 
					<li class="bd-links-group py-2 px-3 border-0 "><a href="documentChoice.php" class="nav-link active text-decoration-none" style="color:#ec6d18"><i class="bi bi-file-text"></i>&nbsp Documents &nbsp &nbsp &nbsp</a></li>

					<li></li>
					
					<li class="bd-links-group py-2 px-3 border-0 "><a href="history.php" class="nav-link text-decoration-none link-warning text-dark"><i class="bi bi-layout-text-sidebar-reverse"></i>&nbsp Monitor</a></li>

					<li></li>
				
					<li class="bd-links-group py-2 px-3 border-0 "><a href="logout.php" class="nav-link text-decoration-none link-warning text-dark"><i class="bi bi-box-arrow-right"></i>&nbsp Log out</a></li>

				</ul>
			  </nav>
			</div>
		 </div>		
	    </aside>
		</div> 

	<div class="col-md-10 mt-1 p-4 shadow">
	<main class="bd-main order-1 mb-1 ms-4 me-4" id="main">  
	<a class="btn border-0 m-3 mb-1 text-decoration-underline fw-bolder" href="documentChoice.php" style="border: 2px solid #ec6d18;font-size: 120%;color:#ec6d18"><i class="bi bi-arrow-left-circle"></i>&nbspBACK</a>

	<div class="card rounded-0 border-dark ms-4 me-4" style="background-color:#fffcfa">
		<div class="card-header p-3" style="color:#ec6d18;">
			<h5 class="card-title fw-bolder">EDIT DOCUMENT</h5>
		</div>
        <div class="card-body" id="hehe">
			<div class="card-text">
        	<form action="" method="POST">
				<?php 
					$id = $_GET['id'];
					$rowmo = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM document WHERE id = '$id'"));
				?>
        <div class="fw-bolder fs-5 text-center w-100" style="color:#ec6d18">Do not forget to choose a Personnel when submitting</div>
			<div class="row m-2" >
              <div class="col-md-6 mb-2">
                <label for="" class="form-label">Document Reference ID</label>
                <input
                  type="text"
                  class="form-control border-danger border-1 fst-italic"
                  value="<?= $rowmo['documentID'];?>"
                  name="documentID"
                  id="documentID"
                  aria-describedby="helpId"
                  disabled readonly/>
                <small id="helpId" class="form-text text-danger opacity-75 fst-italic" style="font-size: small">Field cannot be edited</small>
              </div>
              <div class="col-md-6 mb-2">
                <label for="" class="form-label">Document Type</label>
                <input
                  type="text"
                  class="form-control border-danger border-1 fst-italic"
                  name="nameType"
                  id="nameType"
                  aria-describedby="helpId"
                  placeholder=""
				  value="<?php 
				  	if($rowmo['documentType'] == 'thesis'){
						echo "Thesis/Capstone Project/ Manuscript";
					}
					elseif($rowmo['documentType'] == 'completion_form'){
						echo "Completion Form";
					}
					elseif($rowmo['documentType'] == 'journal'){
						echo "OJT Journal";
					}
					else {
						echo "Cannot identify document type";
					} 
				 ?>"
                  disabled readonly/>
                  <small id="helpId" class="form-text text-danger opacity-75 fst-italic" style="font-size: small">Field cannot be edited</small>
              </div> 
				
			  <div class="col-md-6 mb-2">
                <input
                  type="text"
                  class="form-control border-danger border-1 fst-italic"
                  name="documentType"
                  id="documentType"
                  aria-describedby="helpId"
                  placeholder=""
				  value="<?php echo $rowmo['documentType'];?>"
                  hidden/>
               </div> 

            </div>

			<div class="row m-2">
              <div class="col-md-6 mb-2">
                <label for="" class="form-label">Document Name</label>
				<?php
					if($rowmo['documentType']== "thesis"){
						echo '<input
						type="text"
						class="form-control border-secondary border-1"
						name="documentName"
						id="documentName"
						aria-describedby="helpId"
						value = "'. $rowmo['documentName'] . '"
					  	/>';
					}
					else{
						echo '
						<input
						type="text"
						class="form-control border-danger border-1"
						name="documentName"
						id="documentName"
						aria-describedby="helpId"
						value = "'. $rowmo['documentName'] . '"
						disabled
						readonly/>
						<small id="helpId" class="form-text text-danger opacity-75 fst-italic" style="font-size: small">Field cannot be edited</small>';
					}	
				?>    
              </div>

              <div class="col-md-6 mb-2">
                <label for="" class="form-label">Document Authors</label>
                <input
                  type="text"
                  class="form-control border-secondary border-1"
                  name="ownernames[]"
                  id="ownernames"
                  aria-describedby="helpId"
					value="<?php
						$owner = $rowmo['documentOwner'];
						$array = explode(",", $owner);
						$name = [];
						
						foreach($array as $number){
							$inner = "SELECT studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$number'";
							$result_inner = $conn->query($inner);
							if ($result_inner->num_rows > 0) {
								$row_inner = $result_inner->fetch_assoc();
								$student_names[] = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
							} else {
								// Handle the case where student number is not found
								$student_names[] = "Student not found"; // Or any other appropriate message
							}
						}
						echo implode(", ", $student_names);
					?>"
				  disabled readonly/>

				  <div class="col-md-6 mb-2">
                <input
                  type="text"
                  class="form-control border-secondary border-1"
                  name="documentOwner"
                  id="documentOwner"
                  aria-describedby="helpId"
					value="<?php echo $rowmo['documentOwner']?>"
				  hidden/>

          <input
                  type="text"
                  class="form-control border-secondary border-1"
                  name="createdby"
                  id="createdby"
                  aria-describedby="helpId"
					value="<?php echo $rowmo['createdby']?>"
				  hidden/>
						
              </div>
            </div>

			<div class="row m-2">
            <div class="col-md-6 mb-2 ">
              <label for="" class="form-label">Submitted To</label>

              <?php 
              if($rowmo['documentStatus']== 'on_hand' || $rowmo['documentStatus']== 'review' || $rowmo['documentStatus']== 'pick-up'){?>
              <button type="button" id="status" class="btn form-control" data-bs-toggle="modal" data-bs-target="#myModal" style="border: 2px solid #FF6F00; color:#FF6F00">
                SELECT A PERSONNEL
              </button>
              <?php }else{ ?>
                <button type="button"class="btn form-control" data-bs-toggle="modal" data-bs-target="#myModal" style="border: 2px solid #FF6F00; color:#FF6F00">
                SELECT A FACULTY MEMBER
              </button>

              <?php } ?>
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">List of Personnel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body justify-content-center text-center">
                       <div class="sticky-top bg-white">
                      <input type="text" id="search-personnel" class="form-control" placeholder="Search personnel"></div>
                        <div class="form-check " id="personnel">

                        <?php
                        mysqli_query($conn, "SET NAMES 'utf8'");
                        mysqli_query($conn, "SET CHARACTER SET 'utf8'");
                             $queryDAFE = "SELECT * FROM faculty_info WHERE facultyDepartment = 'DAFE'";
                             $queryrunDAFE = mysqli_query($conn,$queryDAFE);

                             $queryDCEA = "SELECT * FROM faculty_info WHERE facultyDepartment = 'DCEA'";
                             $queryrunDCEA = mysqli_query($conn,$queryDCEA);

                             $queryDCEE = "SELECT * FROM faculty_info WHERE facultyDepartment = 'DCEE'";
                             $queryrunDCEE = mysqli_query($conn,$queryDCEE);

                             $queryDIET = "SELECT * FROM faculty_info WHERE facultyDepartment = 'DIET'";
                             $queryrunDIET = mysqli_query($conn,$queryDIET);


                            $queryIT = "SELECT * FROM faculty_info WHERE facultyDepartment = 'DIT'";
                            $queryrunIT = mysqli_query($conn,$queryIT);

                            if($user1['studentCourse'] == 'BSCS' || $user1['studentCourse'] == 'BSIT'){
                            if(mysqli_num_rows($queryrunIT)>0){
                              while($fclty = mysqli_fetch_array($queryrunIT)){?>
                                <label><input type="radio" name="submittedTo" id="submittedTo" value="<?php echo $fclty['facultyID'] ?>" <?php if($rowmo['submittedTo'] == $fclty['facultyID']) echo "checked";?>><span> 
                                <?php 	
					
                                if($fclty['Fprofile_image'] == null){

						
                                    $output = '<img src="uploads/unknown.jpg" class="rounded-circle" style="height:40px;width:40px;" alt="..." >';

                                    echo $output;
                                  }
                                  else{
                                    echo '<img src="temp/' .$fclty['Fprofile_image'].'"class="rounded-circle" style="height:40px;width:40px;" alt="..." >';

                                    
                                  }
                                ?>  
                                &nbsp<?php echo $fclty['facultyFname'] . ' ' . $fclty['facultyMname']. ' '. $fclty['facultyLname']; ?></span></label>

                                          <?php    }
                                            }
                                            else{
                                              echo "An error occurred";
                                            }
                                          }

                            elseif($user1['studentCourse'] == 'BSIndT-AT' || $user1['studentCourse'] == 'BSIndT-ELEX'|| $user1['studentCourse'] == 'BSIndT-ET'|| $user1['studentCourse'] == 'BSIE'){
                                            if(mysqli_num_rows($queryrunDIET)>0){
                                              while($fclty4 = mysqli_fetch_array($queryrunDIET)){?>
                                                <label><input type="radio" name="submittedTo" id="submittedTo" value="<?php echo $fclty4['facultyID'] ?>" <?php if($rowmo['submittedTo'] == $fclty4['facultyID']) echo "checked";?>><span> 
                                                <?php 	
                                            if($fclty4['Fprofile_image'] == null){

                                              
                                              $output = '<img src="uploads/unknown.jpg" class="rounded-circle" style="height:40px;width:40px;" alt="..." >';

                                              echo $output;
                                            }
                                            else{
                                              echo '<img src="temp/' .$fclty4['Fprofile_image'].'"class="rounded-circle" style="height:40px;width:40px;" alt="..." >';

                                              
                                            }
                                       ?>  
                                  &nbsp<?php echo $fclty4['facultyFname'] . ' ' . $fclty4['facultyMname']. ' '. $fclty4['facultyLname']; ?></span></label>

                                          <?php    }
                                            }
                                            else{
                                              echo "An error occurred";
                                            }
                                          }

                            elseif($user1['studentCourse'] == 'BSCpE' || $user1['studentCourse'] == 'BSECE'|| $user1['studentCourse'] == 'BSEE'){
                                            if(mysqli_num_rows($queryrunDCEE)>0){
                                              while($fclty3 = mysqli_fetch_array($queryrunDCEE)){?>
                                                <label><input type="radio" name="submittedTo" id="submittedTo" value="<?php echo $fclty3['facultyID'] ?>" <?php if($rowmo['submittedTo'] == $fclty3['facultyID']) echo "checked";?>><span> 
                                                <?php 	
                                  if($fclty3['Fprofile_image'] == null){

                                    
                                    $output = '<img src="uploads/unknown.jpg" class="rounded-circle" style="height:40px;width:40px;" alt="..." >';

                                    echo $output;
                                  }
                                  else{
                                    echo '<img src="temp/' .$fclty3['Fprofile_image'].'"class="rounded-circle" style="height:40px;width:40px;" alt="..." >';

                                    
                                  }
                        ?>  
                                  &nbsp<?php echo $fclty3['facultyFname'] . ' ' . $fclty3['facultyMname']. ' '. $fclty3['facultyLname']; ?></span></label>

                                          <?php    }
                                            }
                                            else{
                                              echo "An error occurred";
                                            }
                                          }

                              elseif($user1['studentCourse'] == 'BS Arch' || $user1['studentCourse'] == 'BSCE'){
                                            if(mysqli_num_rows($queryrunDCEA)>0){
                                              while($fclty2 = mysqli_fetch_array($queryrunDCEA)){?>
                                                <label><input type="radio" name="submittedTo" id="submittedTo" value="<?php echo $fclty2['facultyID'] ?>" <?php if($rowmo['submittedTo'] == $fclty2['facultyID']) echo "checked";?>><span> 
                                                <?php 	
                                  if($fclty2['Fprofile_image'] == null){

                                    
                                    $output = '<img src="uploads/unknown.jpg" class="rounded-circle" style="height:40px;width:40px;" alt="..." >';

                                    echo $output;
                                  }
                                  else{
                                    echo '<img src="temp/' .$fclty2['Fprofile_image'].'"class="rounded-circle" style="height:40px;width:40px;" alt="..." >';

                                    
                                  }
                        ?>  
                                  &nbsp<?php echo $fclty2['facultyFname'] . ' ' . $fclty2['facultyMname']. ' '. $fclty2['facultyLname']; ?></span></label>

                                          <?php    }
                                            }
                                            else{
                                              echo "An error occurred";
                                            }
                                          }

                         elseif($user1['studentCourse'] == 'BSABE'){
                                            if(mysqli_num_rows($queryrunDAFE)>0){
                                              while($fclty1 = mysqli_fetch_array($queryrunDAFE)){?>
                                                <label><input type="radio" name="submittedTo" id="submittedTo" value="<?php echo $fclty1['facultyID'] ?>" <?php if($rowmo['submittedTo'] == $fclty1['facultyID']) echo "checked";?>><span> 
                                                <?php 	
                                  if($fclty1['Fprofile_image'] == null){

                                    
                                    $output = '<img src="uploads/unknown.jpg" class="rounded-circle" style="height:40px;width:40px;" alt="..." >';

                                    echo $output;
                                  }
                                  else{
                                    echo '<img src="temp/' .$fclty2['Fprofile_image'].'"class="rounded-circle" style="height:40px;width:40px;" alt="..." >';

                                    
                                  }
                        ?>  
                                  &nbsp<?php echo $fclty1['facultyFname'] . ' ' . $fclty1['facultyMname']. ' '. $fclty1['facultyLname']; ?></span></label>

                                          <?php    }
                                            }
                                            else{
                                              echo "An error occurred";
                                            }
                         }
                        ?>
                        </div>
                        </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn text-white" id="save-options" style="background-color:#ec6d18">Save Options</button>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                <div class="col-md-5 mb-2 ">
              <label for="" class="form-label" style="color:#ec6d18" id="previous"></label>
               <?php
                if (isset($rowmo['submittedTo'])) {
                    $selectedFacultyID = $rowmo['submittedTo'];
                    if($selectedFacultyID == 'None'){ ?>
                      <div class="fw-bolder" id="chosen-options" style="display: none;">
                   <?php }else{
                    $query = "SELECT Fprofile_image, facultyFname, facultyMname, facultyLname FROM faculty_info WHERE facultyID = $selectedFacultyID";
                    $selectedFacultyData = mysqli_fetch_assoc(mysqli_query($conn, $query));
                   }
                }
                ?>
                <br>
                <div class="fw-bolder" id="chosen-options" <?php if (!isset($selectedFacultyData)) echo 'style="display: none;"'; ?>style="border: 2px solid #FF6F00;color:#FF6F00; border-radius:5px;padding-left: 5px">
                <img src="temp/<?php echo $selectedFacultyData['Fprofile_image'] ?? 'unknown.jpg'; ?>" alt="Selected Faculty Image" style=" width: 50px; height: 50px; border-radius: 50%; ">
                 <span><?php echo $selectedFacultyData['facultyFname'] . ' ' . $selectedFacultyData['facultyMname'] . ' ' . $selectedFacultyData['facultyLname'] ?? ''; ?></span></div>
                </div>
				<div class="col-md-1 mb-2 mt-2">
				<label for="" class="form-label fw-bolder"></label>
        <?php 
          if($selectedFacultyID == 'None'){ ?>
          <button class="btn btn-sm btn-outline-danger float-start" id="remove-option" hidden>Remove</button>
          <?php }
          else{ ?>
               <button class="btn btn-sm btn-outline-danger float-start" id="remove-option">Remove</button>
          <?php }
        
        ?>
				
				</div>
             
            </div>

			<div class="row m-2">
              <div class="col-md-12 mb-2">
              <label for="" class="form-label">Document Status</label>
              <p id="id_work_days">    

              
              <?php 
              
              
              if($rowmo['documentStatus']=='created'){
                if($rowmo['documentType']=='thesis'){?>
             <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="created" <?php if($rowmo["documentStatus"] == "created") echo "checked"; ?>><span>CREATED</span></label>
                <label><input type="radio" id="documentStatus" name="documentStatus" value="submitted" <?php if($rowmo["documentStatus"] == "submitted") echo "checked"; ?>><span>SUBMIT</span></label>
                <label><input type="radio" id="documentStatus" name="documentStatus" value="to_dean" <?php if($rowmo["documentStatus"] == "to_dean") echo "checked"; ?>><span> SUBMIT TO DEAN</span></label>
                
                <?php }   elseif($rowmo['documentType']=='journal'){?>
                       <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="created" <?php if($rowmo["documentStatus"] == "created") echo "checked"; ?>><span>CREATED</span></label>
                       <label><input type="radio" id="documentStatus" name="documentStatus" value="submitted" <?php if($rowmo["documentStatus"] == "submitted") echo "checked"; ?>><span>SUBMIT</span></label>
                      
             <?php   }
              }elseif($rowmo['documentStatus']=='submitted'){?>
             <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="created" <?php if($rowmo["documentStatus"] == "created") echo "checked"; ?>><span>CREATED</span></label>
                <label><input type="radio" id="documentStatus" name="documentStatus" value="submitted" <?php if($rowmo["documentStatus"] == "submitted") echo "checked"; ?>><span>SUBMITTED</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="on-hand" <?php if($rowmo["documentStatus"] == "on_hand") echo "checked"; ?>><span>ON-HAND</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="review" <?php if($rowmo["documentStatus"] == "review") echo "checked"; ?>><span>REVIEW</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="pick-up" <?php if($rowmo["documentStatus"] == "pick-up") echo "checked"; ?>><span>FOR PICK-UP</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="return" <?php if($rowmo["documentStatus"] == "return") echo "checked"; ?>><span>RETURNED</span></label>
             
                <?php }elseif($rowmo['documentStatus']=='on_hand'){?>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="created" <?php if($rowmo["documentStatus"] == "created") echo "checked"; ?>><span>CREATED</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="submitted" <?php if($rowmo["documentStatus"] == "submitted") echo "checked"; ?>><span>SUBMITTED</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="on-hand" <?php if($rowmo["documentStatus"] == "on_hand") echo "checked"; ?>><span>ON-HAND</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="review" <?php if($rowmo["documentStatus"] == "review") echo "checked"; ?>><span>REVIEW</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="pick-up" <?php if($rowmo["documentStatus"] == "pick-up") echo "checked"; ?>><span>FOR PICK-UP</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="return" <?php if($rowmo["documentStatus"] == "return") echo "checked"; ?>><span>RETURNED</span></label>
             
                <?php }elseif($rowmo['documentStatus']=='review'){?>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="created" <?php if($rowmo["documentStatus"] == "created") echo "checked"; ?>><span>CREATED</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="submitted" <?php if($rowmo["documentStatus"] == "submitted") echo "checked"; ?>><span>SUBMITTED</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="on-hand" <?php if($rowmo["documentStatus"] == "on_hand") echo "checked"; ?>><span>ON-HAND</span></label>
                <label id="status" style="opacity: 1;"><input type="radio" id="documentStatus" name="documentStatus" value="review" <?php if($rowmo["documentStatus"] == "review") echo "checked"; ?>><span>REVIEW</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="pick-up" <?php if($rowmo["documentStatus"] == "pick-up") echo "checked"; ?>><span>FOR PICK-UP</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="return" <?php if($rowmo["documentStatus"] == "return") echo "checked"; ?>><span>RETURNED</span></label>
             
                <?php }elseif($rowmo['documentStatus']=='pick-up'){?>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="created" <?php if($rowmo["documentStatus"] == "created") echo "checked"; ?>><span>CREATED</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="submitted" <?php if($rowmo["documentStatus"] == "submitted") echo "checked"; ?>><span>SUBMITTED</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="on-hand" <?php if($rowmo["documentStatus"] == "on_hand") echo "checked"; ?>><span>ON-HAND</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="review" <?php if($rowmo["documentStatus"] == "review") echo "checked"; ?>><span>REVIEW</span></label>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="pick-up" <?php if($rowmo["documentStatus"] == "pick-up") echo "checked"; ?>><span>FOR PICK-UP</span></label>
                <label><input type="radio" id="documentStatus" name="documentStatus" value="return" <?php if($rowmo["documentStatus"] == "return") echo "checked"; ?>><span>RECEIVE</span></label>
             
                <?php }elseif($rowmo['documentStatus']=='return'){?>
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="created" <?php if($rowmo["documentStatus"] == "created") echo "checked"; ?>><span>CREATED</span></label>
                <label><input type="radio" id="documentStatus" name="documentStatus" value="submitted" <?php if($rowmo["documentStatus"] == "submitted") echo "checked"; ?>><span>SUBMIT</span></label>
                <label><input type="radio" id="documentStatus" name="documentStatus" value="to_chairperson" <?php if($rowmo["documentStatus"] == "to_chairperson") echo "checked"; ?>><span> SUBMIT TO CHAIRPERSON</span></label>
                <label><input type="radio" id="documentStatus" name="documentStatus" value="to_research" <?php if($rowmo["documentStatus"] == "to_research") echo "checked"; ?>><span> SUBMIT TO COLLEGE RESEARCH COORDINATOR</span></label> 
                <label><input type="radio" id="documentStatus" name="documentStatus" value="to_dean" <?php if($rowmo["documentStatus"] == "to_dean") echo "checked"; ?>><span> SUBMIT TO DEAN</span></label> 
                <label id="status"><input type="radio" id="documentStatus" name="documentStatus" value="return" <?php if($rowmo["documentStatus"] == "return") echo "checked"; ?>><span>RETURNED</span></label>
              <?php } ?>
              </p>
              </div>
            </div>

			<div class="row m-2 f">
			<label for="" class="form-label">Remarks</label>
             <textarea class="form-control border border-secondary"  name="remarks" id="remarks"><?= $rowmo['remarks']?></textarea>
              
            </div>

			
			</div>
		</div>
		<div class="card-footer">
            <div class="row">
          <div class="col-md-12 text-center">
            <button class="btn m-2 w-75 fw-bolder" type="button" onclick="submitData('edit');" style="background-color:#ec6d18;color:white">UPDATE</button>
	</form></div>			
	</main>
</div>
</div>
</div>
<?php require "edited.php"; ?>
<div class="position-fixed bottom-0 end-0 bg-secondary-subtle" id="ct6" style="font-size: 16px"></div>

	<script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src='node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>

<!-- ========== Real-time clock ========== -->
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
  // Inside the #save-options button's click handler
  $('#save-options').click(function() {
  const selectedRadio = document.querySelector('#personnel input[name="submittedTo"]:checked');
  const selectedValue = selectedRadio.value;
  const selectedText = selectedRadio.nextElementSibling.textContent.trim();
  const imagePath = selectedRadio.nextElementSibling.querySelector('img').src;

  const chosenOptions = document.getElementById('chosen-options');
  chosenOptions.textContent = ''; // Clear previous content

  const chosenImage = document.createElement('img');
  chosenImage.src = imagePath;
  chosenImage.classList.add('chosen-image');
  chosenOptions.appendChild(chosenImage);

  const chosenText = document.createElement('span');
  chosenText.textContent = selectedText;
  chosenText.classList.add('chosen-text');
  chosenOptions.appendChild(chosenText);

  chosenOptions.style.display = 'block';
  $('#myModal').modal('hide');
  $('#chosen-options').css({"border":"2px solid #FF6F00", "color":"#FF6F00", 
    "border-radius": "5px","padding-left":"5px"});
  $('#remove-option').removeAttr("hidden");
  $('#chosen-options').show();
  $('#previous').toggle();

  $('#remove-option').click(function(event) {
    event.preventDefault(); // Prevent form submission or reset

    // Clear chosen options display
    chosenOptions.textContent = '';
    chosenOptions.style.display = 'none';

    // Uncheck the selected radio button only within the modal
    const selectedRadio = document.querySelector('#personnel input[name="submittedTo"]:checked');
    if (selectedRadio) {
      selectedRadio.checked = false;
	  $('#remove-option').attr('hidden', true);
    }
  });

  // Optionally store the selected value for later use  // e.g., document.getElementById('hiddenInput').value = selectedValue;
});

function handleRemoveOption() {
    event.preventDefault(); // Prevent form submission or reset

    // Clear chosen options display
    const chosenOptions = document.getElementById('chosen-options');
    chosenOptions.textContent = '';
    chosenOptions.style.display = 'none';

    // Uncheck the selected radio button (if any) in the modal
    const selectedRadio = document.querySelector('#personnel input[name="submittedTo"]:checked');
    if (selectedRadio) {
        selectedRadio.checked = false;
    }

    // Send AJAX request to update database
    $.ajax({
        url: 'remove_option.php?id=<?php echo $rowmo['id'];?>', // Replace with the path to your PHP script
        type: 'POST',
        success: function(response) {
            if (response === 'success') {
                // Update main page display if needed
                console.log('Option removed successfully from database');
                $('#remove-option').attr('hidden', true);
            } else {
                // Handle error
                console.error('Error removing option from database:', response);
                alert('Failed to remove option. Please try again.');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX error:', textStatus, errorThrown);
            alert('An error occurred while trying to remove the option.', errorThrown);
        }
    });

    // Hide the remove-option button
    $('#remove-option').hide();
}

// Attach the click handler to the button (outside the save-options handler)
$('#remove-option').click(handleRemoveOption);
</script>
<script>
  const searchInput = document.getElementById("search-personnel");
const personnelDiv = document.getElementById("personnel");

searchInput.addEventListener("input", () => {
  const searchQuery = searchInput.value.toLowerCase();
  const labels = personnelDiv.querySelectorAll("label");

  labels.forEach(label => {
    const labelText = label.textContent.toLowerCase();
    if (labelText.includes(searchQuery)) {
      label.style.display = "initial";
    } else {
      label.style.display = "none";
    }
  });
});

</script>
</body>
</html>