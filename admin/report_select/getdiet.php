<?php 
sleep(1.0);

include("../dbcon.php"); 

	if(isset($_POST['request'])){

		$request = $_POST['request'];
		$query1 = "SELECT * FROM users_documents WHERE documentType = '$request' AND facultyDepartment = 'DIET'";
		$result1 = mysqli_query($conn, $query1);
		$count = mysqli_num_rows($result1);
	
    if($count > 0){
      $output = " <thead class='fw-bolder table-dark align-middle' id='headiet'>
      <tr>
      <td>Document Reference Number</td>
      <td>Document Name</td>
      <td>Document Type</td>
      <td>Document Author/s</td>      
      <td>Received By</td>
      <td>Department</td>
      <td>Document Status</td>
           </tr>
 </thead>
 <tbody id = 'table-data'class='text-break'> ";
 while( $row = mysqli_fetch_assoc($result1)){
  if($row['documentType'] == 'thesis'){
    $type = "Thesis/ Capstone Project/ Manuscript";
  }
  elseif($row['documentType'] == 'journal'){
    $type = "OJT Journal"; 
  }
  elseif($row['documentType'] == 'completion_form'){
    $type = "Completion Form";
  }
  else{
    $type = "Error";
  };	
  if($row['documentStatus'] == 'submitted'){
    $status = 'Submitted';
  }
  elseif($row['documentStatus'] == 'on_hand'){
     $status = 'On-Hand'; 
  }
  elseif($row['documentStatus'] == 'review'){
     $status = 'Under Review';
  }
  elseif($row['documentStatus'] == 'pick-up'){
     $status = 'Available for pick-up';
  }
  elseif($row['documentStatus'] == 'created'){
     $status = 'Created';
  }
  elseif($row['documentStatus'] == 'graded'){
     $status = 'Graded';
  }
  elseif($row['documentStatus'] == 'return'){
     $status = 'Returned';
  }
  elseif($row['documentStatus'] == 'signed'){
     $status = 'Signed';
  }
  elseif($row['documentStatus'] == 'to_chairperson'){
     $status = 'Forwarded to Chairperson';
  }
  elseif($row['documentStatus'] == 'to_registrar'){
     $status = 'Forwarded to College Registrar';
  }
  elseif($row['documentStatus'] == 'to_dean'){
     $status = 'Forwarded to Dean';
  }
  elseif($row['documentStatus'] == 'to_uregistrar'){
     $status = 'Forwarded to University Registrar';
  }
  elseif($row['documentStatus'] == 'to_research'){
     $status = 'Forwarded to Research Coordinator';
  }

  elseif($row['documentStatus'] == null){
     $status = 'Not Submitted Yet';
  }
  else{
     $status = "Error";
  };
  $output .=  
  "<tr>;

  <td>" . $row['documentID'] . "</td> 
  <td>" . $row['documentName'] . "</td> 
  <td >" . $type . "</td>; 
  <td >" . $row['documentOwner'] . "</td>;
  <td>" . $row['submittedTo'] . "</td>;
  <td >" . $row['facultyDepartment'] . "</td>;
  <td class='text-uppercase'>" . $status . "</td> 
  </tr>";
}
$output .= "</tbody>";
echo $output;

}
else{

  $output = "No result Found";
?>
<div class="text-dark"><?php echo $output?></div>
<?php  
}
  }?>