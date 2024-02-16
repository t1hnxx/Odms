<?php
require "dbcon.php";
require "session.php";

$conn = new PDO('mysql:host=localhost;dbname=odms','root','');

//for username


foreach ($_POST['facultyEmail'] as $key => $value){
    $num = '1234567890';
    $number = substr(str_shuffle($num),0,4);
    $facultyUsername = "prsnnl". $number;
    //for password
    $length = 8;
    $random = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    $facultyPassword = $random;


    $sql = "insert into faculty_email(facultyFname,facultyMname,facultyLname,facultyGender,facultyUsername,facultyEmail,facultyPassword,position,facultyDepartment) values(:facultyFname,:facultyMname,:facultyLname,:facultyGender,:facultyUsername,:facultyEmail,:facultyPassword,:position,:facultyDepartment)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([   
        'facultyFname' =>$_POST['facultyFname'][$key],
        'facultyMname' => $_POST['facultyMname'][$key],
        'facultyLname' => $_POST['facultyLname'][$key],
        'facultyGender' => $_POST['facultyGender'][$key],
        'facultyUsername' => $facultyUsername,
        'facultyEmail' =>  $_POST['facultyEmail'][$key],
        'facultyPassword' => $facultyPassword,
        'position' => 'instructor',
        'facultyDepartment' => $_POST['facultyDepartment'][$key]
        //'facultyFname' => $_POST['facultyFname'][$key],
        //'facultyFname' => $_POST['facultyFname'][$key],

    ]);


    $sql1 = "insert into faculty_sheets(facultyFname,facultyMname,facultyLname,facultyGender,facultyUsername,facultyEmail,facultyPassword,position,facultyDepartment) values(:facultyFname,:facultyMname,:facultyLname,:facultyGender,:facultyUsername,:facultyEmail,:facultyPassword,:position,:facultyDepartment)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute([   
        'facultyFname' =>$_POST['facultyFname'][$key],
        'facultyMname' => $_POST['facultyMname'][$key],
        'facultyLname' => $_POST['facultyLname'][$key],
        'facultyGender' => $_POST['facultyGender'][$key],
        'facultyUsername' => $facultyUsername,
        'facultyEmail' =>  $_POST['facultyEmail'][$key],
        'facultyPassword' => $facultyPassword,
        'position' => 'instructor',
        'facultyDepartment' => $_POST['facultyDepartment'][$key]
        //'facultyFname' => $_POST['facultyFname'][$key],
        //'facultyFname' => $_POST['facultyFname'][$key],

    ]);
    


}
echo 'Successful';



?>


