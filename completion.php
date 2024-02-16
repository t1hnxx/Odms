<?php 
require 'dbcon.php';
require 'vendor/autoload.php';
require 'class/login_connect.php';
if(isset($_SESSION["facultyID"])){
  mysqli_query($conn, "SET NAMES 'utf8'");
                        mysqli_query($conn, "SET CHARACTER SET 'utf8'");
    $facultyID = $_SESSION["facultyID"];
		$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM faculty_info WHERE facultyID = '$facultyID'"));
}
elseif(isset($_SESSION["studentID"])){
	$studentID = $_SESSION["studentID"];
	$user1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_info WHERE studentID = '$studentID'"));
}
else{
	header("Location: user_login.php");
  }

date_default_timezone_set('Asia/Manila'); 

$documentOwner = $_GET['documentOwner'];
$academic_year = $_GET['academic_year'];
$subjectCode = $_GET['subjectCode'];
$gradeP = $_GET['gradeP'];
$gradeF = $_GET['gradeF'];
$semester = $_GET['semester'];

if($user['facultyMname'] == ''){
  $instructor = $user['facultyFname'] . ' ' .$user['facultyMname']. ' ' . $user['facultyLname'];
}else{
$instructor = $user['facultyFname'] . ' ' .substr($user['facultyMname'],0,1).'.' . ' ' . $user['facultyLname'];
}

$Squery = "SELECT studentFname, studentMname, studentLname, studentCourse FROM student_info WHERE studentNum = '$documentOwner'";
$runS = mysqli_query($conn,$Squery);
$Srow = mysqli_fetch_assoc($runS);

$prog = $Srow['studentCourse'];
$Pquery = "SELECT course_name, courseCode FROM course WHERE courseCode = '$prog'";
$runP = mysqli_query($conn,$Pquery);
$Prow = mysqli_fetch_assoc($runP);

$course = $Prow['course_name'];
if ($course == 'Bachelor of Science in Industrial Technology Major in Electrical Technology'){
 
  // Extract the remaining words after "in "
  $acronym = '<b>BS Industrial Technology</b>, major in <b>Electrical Technology</b>'; 

}
elseif ($course == 'Bachelor of Science in Industrial Technology Major in Electronics Technology'){

  $acronym = '<b>BS Industrial Technology</b>, major in <b>Electronic Technology</b>'; 

} 
elseif ($course == 'Bachelor of Science in Industrial Technology Major in Automotive Technology'){

  $acronym = '<b>BS Industrial Technology</b>, major in <b>Automotive Technology</b>'; 

} else{

$acronym = '<b>' . strtoupper(substr($course, 0, 1) . substr($course, strpos($course, 'Science') + 0, 1)) . ' ';
// Extract the remaining words after "in "
$acronym .= substr($course, strpos($course, 'in ') + 3) . '</b>, major in <b>N/A</b>';
}
$department = $user['facultyDepartment'];
$Cquery = "SELECT facultyFname, facultyMname, facultyLname FROM faculty_info WHERE facultyDepartment = '$department' AND position = 'chairperson'";
$runC = mysqli_query($conn,$Cquery);
$Crow = mysqli_fetch_assoc($runC);
$chairperson = $Crow['facultyFname'] . ' ' . substr($Crow['facultyMname'],0,1).'.' . ' ' . $Crow['facultyLname'];

$Rquery = "SELECT facultyFname, facultyMname, facultyLname FROM faculty_info WHERE facultyDepartment = 'REGISTRAR' AND position = 'registrar'";
$runR = mysqli_query($conn,$Rquery);
$Rrow = mysqli_fetch_assoc($runR);
$registrar = $Rrow['facultyFname'] . ' ' . substr($Rrow['facultyMname'],0,1).'.' . ' ' . $Rrow['facultyLname'];

$Dquery = "SELECT facultyFname, facultyMname, facultyLname FROM faculty_info WHERE facultyDepartment = 'DEAN' AND position = 'dean'";
$runD = mysqli_query($conn,$Dquery);
$Drow = mysqli_fetch_assoc($runD);
$dean = $Drow['facultyFname'] . ' ' . substr($Drow['facultyMname'],0,1).'.' . ' ' . $Drow['facultyLname'];

use Dompdf\Dompdf;;     
use Dompdf\Options;; 

$html_content = '<!DOCTYPE html>
<html>
<head>
<style>
@page {
  margin: 0.762cm 2.54cm
}
@font-face {
                font-family: "MyCustomFont";
                font-weight: normal;
                font-style: normal;
                font-variant: normal;
                src: url("vendor/dompdf/dompdf/lib/fonts/07558_CenturyGothic.ttf") format("truetype");
            }
@font-face {
      font-family: "Title";
      font-weight: normal;
      font-style: normal;
      font-variant: normal;
      src: url("vendor/dompdf/dompdf/lib/fonts/Bookman Old Style Bold.ttf") format("truetype");
            }
 @font-face {
      font-family: "All";
      font-weight: normal;
      font-style: normal;
      font-variant: normal;
      src: url("vendor/dompdf/dompdf/lib/fonts/Arial Regular.ttf") format("truetype");
            }
body{
    font-size: 10px;
    font-family: "All";
}
.whole{
  font-family: "All"!important;

  font-size: 11pt;
  
}
.head{
  text-align: center;
  display: flex;
  justify-content: center;
}
.place{
  font-size: 11pt;
  font-family: "MyCustomFont", sans-serif;
}
.place1{
  font-size: 10pt;
  font-family: "MyCustomFont", sans-serif;
}
.school{
  font-size: 14pt;
  font-family: "Title", sans-serif;
}

.header{
  float: left;
  width: 90%; 
  text-align: center;
 
}
.header1{
  float: left;
  width: 5%; 
  text-align: center;
 
}
.report{
  font-family: "All", sans-serif;
  font-size: 12pt;
 text-align: center;
 
 
}
.registrar{
  font-family: "All", sans-serif;
  font-size: 11pt;
 
 
 
}
.date{
  font-size: 12pt;
  text-align: right;
  display: flex;
  justify-content: right;
  margin-right: 30px;
  



}
.date1{
  font-size: 12pt;
  text-align: right;
  display: flex;
  justify-content: right;
  margin-right: 70px;

}
.column {
  float: left;
  width: 25%; 
  text-align: center;

 
}
.column1 {
  float: left;
  width: 50%; 
  text-align: left;

 
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.row1:after {
  content: "";
  display: table;
  clear: both;
}
.content{
  text-decoration: underline;
  text-decoration-thickness: 2px;
}
.approve{
  width: 70%;
  float: right;
  text-align: left;

 
  
}
.dean{
  width: 50%;
  float: right;
  text-align: left;
  font-family: "All", sans-serif;
}
img{
  width: 2.87cm; 
  height: 2.54cm;
  float:left;
 
}
p.indent {
  text-indent: 55px;
  font-family: "All", sans-serif;
  text-align: justify;
  text-justify: inter-word;
}
p{
  font-size: 11pt;
  font-family: "All", sans-serif;
}

</style>
</head>
<body>
  <div class="whole">
  <div class="row1">
  <div class="header1"></div>
  <div class="header">
 
  <img src="cvsu.png">
  <span class="place">Republic of the Philippines</span><br>
  <span class="school">CAVITE STATE UNIVERSITY</span> <br>
  <span class="place"><b>Don Severino delas Alas Campus</b></span><br>
  <span class="place1">Indang, Cavite</span>
 
</div>  <div class="header1"></div>
</div>
<br>
  <div class="report"><b>REPORT OF COMPLETION</b></div> <br>
  <div class="date">'. date("F j, Y") . '</div> <br>

  <div class="registrar"><b>THE UNIVERSITY REGISTRAR</b></div><br>
  Thru the College of Engineering and Information Technology <br>
  This University

  <br><br>
  Sir/Madam: <br>
 <p class="indent">Please be informed that Mr./Mrs./Miss <b>' . $Srow['studentFname'] . ' '. $Srow['studentMname'].' '. $Srow['studentLname'] . '</b>, with Student Number <b>' . $documentOwner . '</b>, under the program '.$acronym .' has removed the grade of “4.0” or completed the requirements for the grade of “Incomplete” on the subjects indicated below: </p> <br>

 <div class="row">
  <div class="column">
   &nbsp; Subject Code  

   <p class="content"  style="text-transform: uppercase"><b>&nbsp; ' . $subjectCode . ' &nbsp; </b></p>
    
  </div>
  <div class="column">
   
  &nbsp; Previous Grade  

    <p class="content"><b>&nbsp; ' .  $gradeP . '&nbsp;</b></p>
  </div>
  <div class="column">  
  Semester / AY Taken 
    <p class="content"><b>'.ucfirst($semester). ' / ' . $academic_year . '</b></p>
  </div>
  <div class="column">
  &nbsp; Final Grade 
   <p class="content"><b>&nbsp; '. $gradeF .' &nbsp;</b></p>
    
  </div>
</div> <br>
<div class="row">
<div class="column1">
<p></p>
<p></p>
<p></p>  
<p></p>
<p></p>  
<p>&nbsp; &nbsp;  Noted by:</p>
    <p> &nbsp; &nbsp;  <b style="text-transform: uppercase">'. $chairperson . '</b>  &nbsp; &nbsp; <br>
    &nbsp; &nbsp;  Department Chairperson <br><br>
    
    &nbsp; &nbsp;  Date: __________________</p>
    </div>
    <div class="column1">
   <p> &nbsp; &nbsp;  <b style="text-transform: uppercase">'. strtoupper($instructor) . '</b>  &nbsp; &nbsp; <br>
    &nbsp; &nbsp;  Signature Over Printed Name of Instructor </p>
  <p></p>
     <p>&nbsp; &nbsp;  Recommending Approval:</p>

       <p>&nbsp; &nbsp;  <b>'. strtoupper($registrar) . '</b>  &nbsp; &nbsp; <br>
    &nbsp; &nbsp;  College Registrar <br><br>
    
    &nbsp; &nbsp;  Date: __________________</p>
    </div>
</div> <br>
<div class="approve">
&nbsp; &nbsp; Approved By:
</div><p></p>
<p><div class="dean">
&nbsp; &nbsp;  <b> '. strtoupper($dean) . '</b><br>
&nbsp; &nbsp; &nbsp;   College Dean <br><br>

&nbsp; &nbsp;  Date: __________________
</div></p>

</div>

</body>
</html>';

$dompdf = new Dompdf(['enable_remote' => true]);

$options = new Options();
$options->setChroot(['cvsu.png']);
$options->set('defaultFont', 'Arial Regular');
$dompdf->setOptions($options);

 // Load HTML content (can be from a file, database, or generated dynamically)
 $dompdf->loadHtml(html_entity_decode($html_content)); // Replace with your HTML

 // Set paper size (optional)
 $dompdf->setPaper('A4', 'portrait');
 
 // Render the PDF
 $dompdf->render();

 // Output the PDF to the browser (or save as a file)
 $dompdf->stream("completion.pdf");
