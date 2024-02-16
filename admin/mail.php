<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src='../node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>


<?php
require "session.php";
require "dbcon.php";

$query = "SELECT * FROM faculty_email";
$result = mysqli_query($conn,$query);
$duplicateEmails = [];
while( $row = mysqli_fetch_array($result) ){
    if (isset($row['facultyEmail'])) {
      $email = $row['facultyEmail'];
      $checkQuery = "SELECT COUNT(*) FROM faculty_info WHERE facultyEmail = '$email' OR EXISTS (SELECT 1 FROM student_info WHERE studentEmail = '$email')";
        $checkResult = mysqli_query($conn, $checkQuery);
        if (mysqli_fetch_assoc($checkResult)['COUNT(*)'] == 0 ) {
        $length = rand(4,19);
        $number= "";
        for($i=0; $i < $length; $i++)
        {
            $new_rand = rand(0,9);
            
            $number = $number . $new_rand;
        }
        $facultyID = $number;
        $userType = "Personnel";
    $firstname = $row['facultyFname'];
    $midname = $row['facultyMname'];
    $lastname = $row['facultyLname'];
  
    $subjectL = "Login Credentials for Online Document Monitoring System";
    $gender = $row['facultyGender'];
    $username = $row['facultyUsername'];
    $password = $row['facultyPassword'];
    $facultyPass = hash('sha1', $password);
    $position = $row['position'];
    $department = $row['facultyDepartment'];
    $urlAddress=strtolower($firstname) . "." . strtolower($lastname);

    $query1 = "SELECT * FROM department WHERE departmentCode = '$department'";
    $result1 = mysqli_query($conn,$query1);
    $rows = mysqli_fetch_array($result1);
    $code = $rows['departmentName'];

    $messages = 'Dear Mr./ Ms. ' .  $firstname . ' ' . $midname . " " . $lastname . ',' . '

    We would like to inform you that your login credentials for the Online Document Monitoring System have been successfully generated. The details of your account are as follows:
    
    Department: '. $code . ' ('. $department . ')
    Email: ' . $email . '
    Username: ' . $username . '
    Temporary Password: ' . $password . '
    
    
    You can alternatively use your CVSU Gmail/Student Number along with the temporary password by visiting [url].
    
    For security purposes, we strongly recommend changing your password upon your initial login. 
    
    If you encounter any issues during the login process or have any questions, please do not hesitate to contact our support team at ceit.odms123@gmail.com.
    
    Best Regards,
    CEIT-ODMS Admin';
    $msg = $messages;
    $to = $email;
    $subject = $subjectL;
    $message = $msg;
    $headers = "From: <ceit.odms123@gmail.com>";


    //mail($to,$subject,$message,$headers); 
        $run = mysqli_query($conn, "INSERT INTO faculty_info (facultyID,userType,facultyFname,facultyMname,facultyLname,facultyUsername,facultyEmail,facultyPassword,position,facultyGender,facultyDepartment,urlAddress) VALUES ('$facultyID','$userType','$firstname','$midname','$lastname','$username','$email','$facultyPass','$position', '$gender', '$department', '$urlAddress')");
       
    if ($run){
        mail($to,$subject,$message,$headers);
         mysqli_query($conn, "DELETE FROM faculty_email WHERE facultyEmail = '$email'");  
        //mysqli_query($conn,"INSERT INTO faculty_sheets (facultyID,userType,facultyFname,facultyMname,facultyLname,facultyUsername,facultyEmail,facultyPassword,facultyGender,facultyDepartment,urlAddress) VALUES ('$facultyID','$userType','$firstname','$midname','$lastname','$username','$email','$facultyPass', '$gender', '$department', '$urlAddress')");
        ?>
        <?php
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
			window.location.href = "admin-faculty.php";
		  });})
    </script> <?php
        exit;
    }
}else{
    mysqli_query($conn, "DELETE FROM faculty_email WHERE facultyEmail = '$email'");  
    $duplicateEmails[] = $email;  
}

    }
    }?>
    <script>
    $(document).ready(function() {
        <?php
        // Build notification content based on whether duplicates exist
        $duplicateEmailList = "";
        if (count($duplicateEmails) > 0) {
            $duplicateEmailList = "The following emails already exist:<br>" . implode("<br>", $duplicateEmails);
        } else {
            $duplicateEmailList = "No duplicate emails found.";
        }
        ?>

        Swal.fire({
           
            title: "Non-existing emails Added Successfully",
            html: "<?php echo $duplicateEmailList; ?>",
            icon: "info", // Use "info" icon for neutral reporting
            confirmButtonText: "OK"
        }).then(function(){
            window.location.href = "admin-faculty.php";
        });
    });
</script>

