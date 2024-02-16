<?php
    require "dbcon.php";
    $query = "SELECT * FROM admin";
    $result = mysqli_query($conn,$query);
    $results = mysqli_fetch_assoc($result);
    
    
        $id = $results['id'];
        $pass = $results['password'];
    $length = rand(4,19);
        $number= "";
        for($i=0; $i < $length; $i++)
        {
            $new_rand = rand(0,9);
            
            $number = $number . $new_rand;
        }
        $adminID = $number;
        $password = hash("sha1",$pass);

        
        //mysqli_query($conn,"UPDATE admin SET password ='$password', adminID = '$adminID' WHERE id = '$id' limit 1");

        var_dump($results);
        echo "YEHEY!";

        die;







?>
