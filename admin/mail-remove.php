<?php
require "dbcon.php";


$query = "SELECT * FROM faculty_email";
$result = mysqli_query($conn,$query);
$query1 = "SELECT * FROM faculty_sheets";
$result1 = mysqli_query($conn,$query1);
$row1 = mysqli_fetch_assoc($result1);

   
    
        $query2 = mysqli_query($conn,"TRUNCATE TABLE faculty_email");

if($query2){

        echo "SUCCESSFUL";
        exit;
}
else{
    echo "An Error Occurred";
    exit;
}

?>
