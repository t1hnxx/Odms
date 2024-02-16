<?php 
   session_start();
   require "dbcon.php";

   if(isset($_POST["action"])){
    if($_POST["action"] == "admin"){
      admin();
  }}

  // LOGIN
function admin(){
  global $conn;

  $username = $_POST["username"];
  $password = $_POST["password"];
 

  $user = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

  if(mysqli_num_rows($user) > 0){

    $row = mysqli_fetch_assoc($user);

    if($password == $row['password']){
      echo "LOG IN SUCCESSFULLY";
      $_SESSION["admin"] = true;
      $_SESSION["id"] = $row["id"];
      exit;
    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
  else{
    echo "User Not Registered";
    exit;
  }
}


?>
 




