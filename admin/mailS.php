<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src='../node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>

<?php
require "session.php";
require "dbcon.php";
$query = "SELECT * FROM student_email";
$result = mysqli_query($conn,$query);
$duplicateEmails = [];
$duplicateStudentNumbers = [];
while( $row = mysqli_fetch_array($result) ){
    if (isset($row['studentEmail']) && $row['studentEmail'] !== '') {     
        $studentEmail = $row['studentEmail'];
        $studentNum = $row['studentNum'];
        $checkQuery = "SELECT COUNT(*) FROM student_info WHERE studentEmail = '$studentEmail' OR EXISTS (SELECT 1 FROM faculty_info WHERE facultyEmail = '$studentEmail')";
        $checkResult = mysqli_query($conn, $checkQuery);
        $checkQuery1 = "SELECT COUNT(*) FROM student_info WHERE studentNum = '$studentNum'";
        $checkResult1 = mysqli_query($conn, $checkQuery1);
        if (mysqli_fetch_assoc($checkResult)['COUNT(*)'] == 0 && mysqli_fetch_assoc($checkResult1)['COUNT(*)'] == 0 ) {
    
        $length = rand(4,19);
        $number= "";
        for($i=0; $i < $length; $i++)
        {
            $new_rand = rand(0,9);
            
            $number = $number . $new_rand;
        }
    $studentID = $number;
    $userType = "Student";
    
    $studentFname = $row['studentFname'];
    $studentMname = $row['studentMname'];
    $studentLname = $row['studentLname'];
    $studentUsername = $row['studentUsername'];
  
    $studentPassword = $row['studentPassword'];
    $studPass = hash('sha1', $studentPassword);
    $studentGender = $row['studentGender'];
    $studentCourse = $row['studentCourse'];
    $urlAddress=strtolower($studentFname) . "." . strtolower($studentLname);

    $subjectL = "CEIT-ODMS Login Credentials";

    $query1 = "SELECT * FROM course WHERE courseCode = '$studentCourse'";
    $result1 = mysqli_query($conn,$query1);
    $rows = mysqli_fetch_assoc($result1);
    $code = $rows['course_name'];




    $messages = 'Dear Mr./Ms. ' .  $studentFname . ' ' . $studentMname . " " . $studentLname . ',' . '

    We would like to inform you that your login credentials for the Online Document Monitoring System have been successfully generated. The details of your account are as follows:
    
    Program: '. $code . ' ('. $studentCourse . ')
    Student Number: ' . $studentNum . '
    Username: ' . $studentUsername . '
    Temporary Password: ' . $studentPassword . '
    
    
    You can alternatively use your CVSU Gmail/Student Number along with the temporary password by visiting [url].
    
    For security purposes, we strongly recommend changing your password upon your initial login. 
    
    If you encounter any issues during the login process or have any questions, please do not hesitate to contact our support team at ceit.odms123@gmail.com.
    
    Best Regards,
    CEIT-ODMS Admin';
    
    $msg = $messages;
    $to = $studentEmail;
    $subject = $subjectL;
    $message = $msg;
    $headers = "From: <ceit.odms123@gmail.com>";


    //mail($to,$subject,$message,$headers); 
    $run=mysqli_query($conn, "INSERT INTO student_info (studentID,userType,studentNum,studentFname,studentMname,studentLname,studentEmail,studentPassword,studentGender,studentUsername,studentCourse,urlAddress) VALUES ('$studentID','$userType','$studentNum','$studentFname','$studentMname','$studentLname','$studentEmail','$studPass', '$studentGender', '$studentUsername','$studentCourse', '$urlAddress')");
       
    if ($run){
        mail($to,$subject,$message,$headers);
         mysqli_query($conn, "DELETE FROM student_email WHERE studentEmail = '$studentEmail'");  
    }
    else{ ?>
<script>
    $(document).ready(function(){
      Swal.fire({
              title: "An error occurred!",
              icon: "error",  
              showConfirmButton: false,
 			 timer: 2500
          }).then(function(){
			window.location.href = "admin--student.php";
		  });})
    </script> <?php
    }
}else{
    mysqli_query($conn, "DELETE FROM student_email WHERE studentEmail = '$studentEmail'");
    $duplicateEmails[] = "Email:<b> $studentEmail </b>, <br> Student Number:<b> $studentNum </b>"; 
}
    }
    }?>

<script>
    $(document).ready(function() {
        <?php
        // Build notification content based on whether duplicates exist
        $duplicateEmailList = "";
        if (count($duplicateEmails) > 0) {
            $duplicateList = "The following duplicate emails or student numbers were found:<br>" . implode("<br>", $duplicateEmails);
        } else {
            $duplicateList = "No duplicate emails or student numbers found.";
        }
        ?>

        Swal.fire({
           
            title: "Non-existing emails Added Successfully",
            html: "<?php echo $duplicateList; ?>",
            icon: "info", // Use "info" icon for neutral reporting
            confirmButtonText: "OK"
        }).then(function(){
            window.location.href = "admin-student.php";
        });
    });
</script>


    

  
            
   


