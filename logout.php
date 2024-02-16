<?php
require 'class/login_connect.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: user_login.php");
?>
