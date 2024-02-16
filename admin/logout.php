<?php
require 'login_connect.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: adminlogin.php");
?>
