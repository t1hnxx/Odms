<?php 
require 'dbcon.php';
$row_id = $_POST['row_id'];
$column_name = $_POST['column_name'];
$new_value = $_POST['new_value'];


$new_value = mysqli_real_escape_string($conn, $new_value);

$query = "UPDATE faculty_info SET $column_name='$new_value' WHERE facultyEmail='$row_id'";
mysqli_query($conn, $query);

echo "<div class='alert alert-warning alert-dismissible fade show m-2' role='alert'><i class='bi bi-exclamation-diamond'></i> &nbsp&nbsp Department has changed successfully to <b> $new_value </b>, in email <b> $row_id </b>.
		<button type='button' class='btn-close float-end' data-bs-dismiss='alert' aria-label='Close'></button></div>";

?>