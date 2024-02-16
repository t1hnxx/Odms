<?php
require "dbcon.php";


$query = "SELECT * FROM student_email";
$result = mysqli_query($conn,$query);
$query1 = "SELECT * FROM student_sheets";


    
        $query2 = mysqli_query($conn,"TRUNCATE TABLE student_email");


if($query2){
        echo "SUCCESSFUL";
        exit;
    
    }
else{
    echo "An Error Occurred";
    exit;
}
?>
