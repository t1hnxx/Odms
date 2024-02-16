<?php
require "dbcon.php";
require "session.php";

$conn = new PDO('mysql:host=localhost;dbname=odms','root','');

//for username


foreach ($_POST['studentNum'] as $key => $value){
    $num = '1234567890';
    $number = substr(str_shuffle($num),0,4);
    $studentUsername = "stdnt". $number;
    //for password
    $length = 8;
    $random = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    $studentPassword = $random;


    $sql = "insert into student_email(studentNum,studentFname,studentMname,studentLname,studentGender,studentUsername,studentEmail,studentPassword,studentCourse) values(:studentNum,:studentFname,:studentMname,:studentLname,:studentGender,:studentUsername,:studentEmail,:studentPassword,:studentCourse)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([   
        'studentNum' =>  $_POST['studentNum'][$key],
        'studentFname' =>$_POST['studentFname'][$key],
        'studentMname' => $_POST['studentMname'][$key],
        'studentLname' => $_POST['studentLname'][$key],
        'studentGender' => $_POST['studentGender'][$key],
        'studentUsername' => $studentUsername,
        'studentEmail' =>  $_POST['studentEmail'][$key],
        'studentPassword' => $studentPassword,
        'studentCourse' => $_POST['studentCourse'][$key]
        //'facultyFname' => $_POST['facultyFname'][$key],
        //'facultyFname' => $_POST['facultyFname'][$key],

    ]);


    $sql1 = "insert into student_sheets(studentNum,studentFname,studentMname,studentLname,studentGender,studentUsername,studentEmail,studentPassword,studentCourse) values(:studentNum,:studentFname,:studentMname,:studentLname,:studentGender,:studentUsername,:studentEmail,:studentPassword,:studentCourse)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute([   
        'studentNum' =>  $_POST['studentNum'][$key],
        'studentFname' =>$_POST['studentFname'][$key],
        'studentMname' => $_POST['studentMname'][$key],
        'studentLname' => $_POST['studentLname'][$key],
        'studentGender' => $_POST['studentGender'][$key],
        'studentUsername' => $studentUsername,
        'studentEmail' =>  $_POST['studentEmail'][$key],
        'studentPassword' => $studentPassword,
        'studentCourse' => $_POST['studentCourse'][$key]
        //'facultyFname' => $_POST['facultyFname'][$key],
        //'facultyFname' => $_POST['facultyFname'][$key],

    ]);
    


}

if($stmt && $stmt1){
echo 'Successful';
exit;
}
else{
    echo 'An error occurred';
    exit;
}



?>
