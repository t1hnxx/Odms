<?php

$conn = mysqli_connect("localhost","root","","odms");

if(!$conn){
    die('Connection Failed'. mysqli_connect_error());
}

