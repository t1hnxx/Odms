<!DOCTYPE html>
<head>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link rel="icon" href="ODMS Logo.png">
    <link rel="stylesheet" href="bootstrap-5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <style>
  .upload{
    width: 125px;
    position: relative;
    margin: auto;
  }
  
  .upload img{
    border-radius: 50%;
    border: 8px solid #DCDCDC;
  }
  
  .upload .round{
    position: absolute;
    bottom: 0;
    right: 0;
    background: #ec6d18;
    width: 32px;
    height: 32px;
    line-height: 33px;
    text-align: center;
    border-radius: 50%;
    overflow: hidden;
  }
  
  .upload .round input[type = "file"]{
    position: absolute;
    transform: scale(2);
    opacity: 0;
  }
  
  input[type=file]::-webkit-file-upload-button{
      cursor: pointer;
  }

  </style>


</head>
 
<body style="background-color: #f2f2f2" onload=display_ct6()>

<nav class="navbar fixed-top shadow-lg" style="background-color: #ec6d18; color: white; top: 0; width: 100%; height: auto; ">
	<div class="d-flex flex-row container-fluid">
    	<button class="navbar-toggler d-lg-none d-inline-block align-text-top" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"> 
			<i class="bi bi-list"></i>
		</button>
		<a class="navbar-brand ms-1 p-0 me-0 me-lg-2" href="index.php" aria-label="odms">
			<img src="uploads/cvsu.png" width="58" height="55" class="align-top" alt="">
			<img src="uploads/ODMS logo.png" width="65" height="65" class="d-inline-block align-text-top" alt="" viewBox="0 0 118 94" role="img">
		</a>
		<div class="d-inline-block align-text-top fs-6 text-white w-25">
		
		</div>
		<div class="d-inline-block align-text-top me-1 fs-6 text-white">
			<a href="profile.php?url=<?php echo $user1['studentID'] . '%'.$user1['urlAddress']?>" class="text-white fw-bold" style="text-decoration:none; letter-spacing: 1px">
			  <?php 	
        $id = $user1['studentNum'];
					$fname = $user1['studentFname'];
          $mname = $user1['studentMname'];
					$lname = $user1['studentLname'];
					$image = $user1['profile_image'];
          $address = $user1['urlAddress'];
          
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

					<li class="bd-links-group py-2 px-3 border-0 "><a href="documentChoice.php" class="nav-link text-decoration-none link-warning text-dark" ><i class="bi bi-file-text"></i>&nbsp Documents</a></li>

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
        <div class="card-header text-center card-secondary">
         
        <br> <br>
        <form class="form" id="Tform" action="" enctype="multipart/form-data" method="post">
          <div class="upload d-flex justify-content-center">
          <?php
        	if($image == null){

					
					$output = '<img src="uploads/unknown.jpg" alt="user" 
          class="rounded-circle img-fluid border border-secondary border-1" style="height: 155px; width: 160px;" >';

					echo $output;
				}
				else{
					echo '<img src="temp/' .$image.'" class="rounded-circle border border-secondary border-2" style="height: 155px; width: 155px;" >';

					
				}
				?>
          <div class="round">
                <input type="hidden" name='id' value="<?php echo $id;?>">
                <input type="hidden" name='name' value="<?php echo $address;?>">

                <input type="file" name='image' id="image" accept = ".jpg, .jpeg, .png">
                <i class="bi bi-camera-fill" style="color: white;"></i>
          </div>
          </div>
      </form>
<br> <br>       
          </div>

      </div> </div>
      <div class="col-lg-8">
      <p class="alert-mess"><p>
     <form class= "form" method="POST" id="save_editForm">
     <div class="card mb-4">
        <div class="alert-message"></div>
          <div class="card-body">


          <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18">Email&nbsp<br><i class="text-danger"style="font-size: 14px">(cannot be edited)</i></p>
              </div>	  
              <div class="col-sm-9">
              <div class="input-group mb-3">
              <input type="text"  value="<?=$user1['studentEmail']?>" class="form-control border-danger border-2" id="studentEmail" name="studentEmail" placeholder="<?php echo $user1['studentEmail'];?>" aria-label="Username" aria-describedby="basic-addon1" disabled>
            </div>
            </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18">Student Number&nbsp<br><i class="text-danger"style="font-size: 14px">(cannot be edited)</i></p>
              </div>	  
              <div class="col-sm-9">
              <div class="input-group mb-3">
              <input type="text"  value="<?=$user1['studentNum']?>" class="form-control border-danger border-2" id="studentNum" name="studentNum" placeholder="<?php echo $user1['studentNum'];?>" aria-label="Username" aria-describedby="basic-addon1" disabled>
            </div>
            </div>
            </div>
            <hr>


            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18">First Name</p>
              </div>	  
              <div class="col-sm-9">
              <div class="input-group mb-3">
              <input type="text"  value="<?=$user1['studentFname']?>" class="form-control border-black" id="studentFname" name="studentFname" placeholder="<?php echo $user['studentFname'];?>" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18">Middle Name</p>
              </div>	  
              <div class="col-sm-9">
              <div class="input-group mb-3">
              <input type="text"  value="<?=$user1['studentMname']?>" class="form-control border-black" id="studentMname" name="studentMname" placeholder="<?php echo $user1['studentMname'];?>" aria-label="Username" aria-describedby="basic-addon1" >
            </div>
            </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18">Last Name</p>
              </div>	  
              <div class="col-sm-9">
              <div class="input-group mb-3">
              <input type="text"  value="<?=$user1['studentLname']?>" class="form-control border-black" id="studentLname" name="studentLname" placeholder="<?php echo $user1['studentLname'];?>" aria-label="Username" aria-describedby="basic-addon1" >
            </div>
            </div>
            </div>
            <hr>

      <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color: #ec6d18">New Password</p>
              </div>	  
              <div class="col-sm-9">
              <div class="input-group mb-3">
              <input type="password" value="<?=$user1['studentPassword']?>" class="form-control border-black" id="studentPassword" name="studentPassword" placeholder="Type your new password" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-12">
              <button class="btn text-white float-end" name="update" value="update"  type="submit" style="background-color: #ec6d18; width:30%">UPDATE</button>
              <a href="profile.php"> 
              <button class="btn btn-secondary text-white" type="button" style="width:30%">BACK</button>
             </a>
            </div>
        </div>

          </div>

        </div>
  </form>
      </div>
    </div>
  </div>
</section>

		</main>
		</div>
</div>
</div>

</body>
</html>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src='node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>


<script>
    document.getElementById("image").onchange = function(){
        document.getElementById("Tform").submit();   
    }
</script>

<?php
    if(isset($_FILES["image"]["name"])){
      $id = $_POST["id"];
      $address = $_POST["name"];

      $imageName = $_FILES["image"]["name"];
      $imageSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = 'profile-edit.php';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = 'profile-edit.php';
        </script>
        ";
      }
      else{
        $newImageName = $address . $id . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query = "UPDATE student_info SET profile_image = '$newImageName' WHERE studentNum = '$id'";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, 'temp/' . $newImageName);
        echo
        "
        <script>
        document.location.href = 'profile-edit.php';
        </script>
        ";
      }
    }
    ?>

</script>


<script>
    $(document).ready(function(){
      $("#save_editForm").on('submit', function(e){
          e.preventDefault();

          var data = {
          studentFname: $("#studentFname").val(),
          studentMname: $("#studentMname").val(),
          studentLname: $("#studentLname").val(),
          studentPassword: $("#studentPassword").val(),
          };
          console.log(data);
          $.ajax({
            type: "POST",
            url: "class/edit-connect.php",
            data: data,
            dataType: "html",
            success: function (response) {

              
             $(".alert-message").html(response);

              
            }
          });
       
          
      })



    })
</script> 
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