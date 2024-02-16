<?php
    sleep(1.0);
    $conn = mysqli_connect("localhost","root","","odms");
    $output = '';

    if(isset($_POST['query'])){
        $search=$_POST['query'];
        //$query = ("//SELECT * FROM document WHERE  OR documentName LIKE CONCAT('%','?','%') OR documentID LIKE CONCAT('%','?','%')");
        $stmt = $conn->prepare("SELECT * FROM users_documents WHERE (documentName LIKE CONCAT('%',?,'%') OR documentID LIKE CONCAT('%',?,'%') OR documentStatus LIKE CONCAT('%',?,'%') OR submittedTo LIKE CONCAT('%',?,'%') OR facultyDepartment LIKE CONCAT('%',?,'%'))AND facultyDepartment = 'DAFE'");
        $stmt->bind_param("sssss",$search,$search, $search, $search, $search);

        
    }
    else{
        $stmt = mysqli_prepare($conn, "SELECT documentName, documentID, documentType, documentStatus, submittedTo FROM users_documents WHERE facultyDepartment = 'DAFE'");
    }
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $output = " <thead class='fw-bolder table-dark align-middle table-dark'>
        <tr>
        <td>Date Created</td>
        <td>Document Reference Number</td>
        <td>Document Name</td>
        <td>Document Type</td>
        <td>Document Author/s</td>      
        <td>Received By</td>
        <td>Department</td>
        <td>Document Status</td>
        <td>Last Updated</td>
             </tr>
   </thead>
   <tbody id = 'table-data' class='text-break'>";
   while($row = $result->fetch_assoc()){
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


       $owner = $row['documentOwner'];
       $array = explode(",", $owner);
       $name = [];
    
    
          foreach ($array as $number) {
             $inner = "SELECT studentFname, studentMname, studentLname FROM student_info WHERE studentNum = '$number'";
             $result_inner = $conn->query($inner);
   
             if ($result_inner->num_rows > 0) {
                $row_inner = $result_inner->fetch_assoc();
   
                // Check for imploded data using a delimiter (e.g., comma):
                $delimiter = ',';  // Adjust the delimiter if needed
                if (strpos($owner, $delimiter) !== false) {
                   // Implode data found:
                   $full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
                   $student_names[] = $full_name;
                   
                } else {
                   // Single value:
                   $full_name = $row_inner['studentFname'] . " " . $row_inner['studentMname'] . " " . $row_inner['studentLname'];
                   $student_names = [$full_name];
                }
             } else {
                // Handle the case where student number is not found
                $student_names[] = "Student not found";
             }
          }
   
         $Docuowner =  implode(", ", $student_names);
   
         if($row['submittedTo'] == "None"){
            $submittedTo = "Not Submitted Yet";
          }else{
            
            $submittedTo = $row['facultyFname'] . ' ' . $row['facultyMname'] . ' ' . $row['facultyLname']; 
          }
        


    $output .=  
    "<tr>;
    <td>" . date('F j, Y, g: i a', strtotime($row['date_created'])) . "</td> 
    <td>" . $row['documentID'] . "</td> 
    <td>" . $row['documentName'] . "</td> 
    <td >" . $type . "</td>; 
    <td >" . $Docuowner . "</td>;
    <td>" . $submittedTo . "</td>;
    <td >" . $row['facultyDepartment'] . "</td>;
    <td class='text-uppercase'>"  .$status . "</td>;
    <td>" . date('F j, Y, g: i a', strtotime($row['date'])) . "</td>  
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

?>
