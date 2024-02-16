<?php 
   session_start();
   $conn=mysqli_connect("localhost","root","","odms");

   if(isset($_POST["action"])){
    if($_POST["action"] == "loginF"){
      personnel();
    }
    else if($_POST["action"] == "loginS"){
      student();
    }
  }

  // LOGIN
function personnel(){
  global $conn;

  $facultyEmail = $_POST["facultyEmail"];
 

  $user = mysqli_query($conn, "SELECT * FROM faculty_info WHERE facultyEmail = '$facultyEmail'");

  if(mysqli_num_rows($user) > 0){

    $row = mysqli_fetch_assoc($user);

    if(password_encryptfcl() == $row['facultyPassword']){
      echo "LOG IN SUCCESSFULLY";
      $_SESSION["loginF"] = true;
      $_SESSION["facultyID"] = $row["facultyID"];
      exit;
    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
  else{
    echo "Please use the provided Login Credentials";
    exit;
  }
  
}


function student(){
  global $conn;

  $studentNum = $_POST["studentNum"];
  
  $user1 = mysqli_query($conn, "SELECT * FROM student_info WHERE studentNum = '$studentNum' OR studentEmail = '$studentNum' OR studentUsername = '$studentNum'");
  $user = mysqli_query($conn, "SELECT * FROM faculty_info WHERE facultyEmail = '$studentNum' OR facultyUsername = '$studentNum'");

  if(mysqli_num_rows($user1) > 0){

    $row1 = mysqli_fetch_assoc($user1);
    
    if(password_encryptstud() == $row1['studentPassword']){
      echo "LOG IN SUCCESSFULLY"; 
      $_SESSION["loginS"] = true;
      $_SESSION["studentID"] = $row1["studentID"];
    exit;}
    else{
      echo "Invalid Student Number, Username or Password";
      exit;
    }
  }elseif(mysqli_num_rows($user) > 0){
    $row = mysqli_fetch_assoc($user);

    if(password_encryptstud() == $row['facultyPassword']){
      echo "LOG IN SUCCESSFULLY";
      $_SESSION["loginF"] = true;
      $_SESSION["facultyID"] = $row["facultyID"];
      exit;
    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
  else{
    echo "Invalid Username, Email or Password";
    exit;
  }
  

}



/*function loginall(){
  global $conn;

  $username = $_POST['username'];
 

  $user = mysqli_query($conn, "SELECT * FROM faculty_info WHERE facultyUsername = '$username'");
  $user2 = mysqli_query($conn, "SELECT * FROM student_info WHERE studentUsername = '$username'");

  if(mysqli_num_rows($user) > 0){

    $row = mysqli_fetch_assoc($user);

    if(password_encryptall() == $row['facultyPassword']){
      echo "LOG IN SUCCESSFULLY";
      $_SESSION["loginF"] = true;
      $_SESSION["facultyID"] = $row["facultyID"];
      exit;
    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
 
  elseif(mysqli_num_rows($user2) > 0){
  $row2 = mysqli_fetch_assoc($user2);

  if(password_encryptall() == $row2['studentPassword']){
    echo "LOG IN SUCCESSFULLY";
    $_SESSION["loginS"] = true;
    $_SESSION["studentNum"] = $row2["studentNum"];
    exit;
  }
  else{
    echo "Wrong Password";
    exit;
  }
  }
  else{
    echo "Please use the provided Login Credentials";
    exit;
  }
  
}

function password_encryptall(){
  global $conn;
  $password = $_POST["password"];
  $pass1 = hash("sha1", $password);
  return $pass1;
}*/



function password_encryptstud(){
  global $conn;
  $studentPassword = $_POST["studentPassword"];
  $pass = hash("sha1", $studentPassword);
  return $pass;
}

function password_encryptfcl(){
  global $conn;
  $facultyPassword = $_POST["facultyPassword"];
  $pass1 = hash("sha1", $facultyPassword);
  return $pass1;
}
?>

 




