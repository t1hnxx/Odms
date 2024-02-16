<!DOCTYPE html>
<?php
	require 'class/login_connect.php';
	
	if(isset($_SESSION["facultyID"])){
		$session = $_SESSION["facultyID"];
		$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM sample WHERE facultyID = '$session'"));
    $type = $user['userType'];
    if($type == "Personnel"){
		include("sample.php");}
    elseif($type == "Student"){
      include("sample4.php");
    }
	}  
	else{
		header("Location: optionLogin.php");
	  }

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
 </head> 

<body>
TRYYYYYYYYYYYYYYYYY STUDENT
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
  

</nav>
<div class="offcanvas-lg offcanvas-start" id="navbarTogglerDemo01 aria-labelledby="navbarTogglerDemo01OffcanvasLabel">
 <aside class="bd-sidebar">
 <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title" id="bdSidebarOffcanvasLabel">Browse docs</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdSidebar"></button>
        </div>
		  <div class="offcanvas-body">
          <nav class="bd-links w-100" id="bd-docs-nav" aria-label="Docs navigation"><ul class="bd-links-nav list-unstyled mb-0 pb-3 pb-md-2 pe-lg-2">
      <li class="bd-links-group py-2">
      <a class="navbar-brand" href="#">Hidden brand</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
	  </div>
      </aside>
    </div>
</body>
</html>