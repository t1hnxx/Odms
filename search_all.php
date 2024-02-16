<?php

    $conn = mysqli_connect("localhost","root","","odms");
    require 'class/login_connect.php';
    $facultyID = $_SESSION["facultyID"];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM faculty_info WHERE facultyID = '$facultyID'"));
    $faculty = $user["facultyID"];
    $output = '';

    if(isset($_POST['query'])){
        $search=$_POST['query'];
        //$query = ("SELECT * FROM document WHERE  OR documentName LIKE CONCAT('%','?','%') OR documentID LIKE CONCAT('%','?','%')");
        $stmt = $conn->prepare("SELECT * FROM document WHERE (documentName LIKE CONCAT('%',?,'%') OR documentID LIKE CONCAT('%',?,'%')) AND submittedTo = '$faculty'");
        $stmt->bind_param("ss",$search, $search);

        
    }
    else{
        $stmt = mysqli_prepare($conn, "SELECT documentName, documentID FROM document WHERE submittedTo = '$faculty'");
    }
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        var_dump($_SESSION);
        $output = " <thead class='table-dark'>
        <tr>
        <td>Document Reference Number</td>
        <td colspan='3'>Document Name</td>
        <td>Received By</td>
        <td>Document Type </td>
        <td>Document Status</td>
         <td>Remarks</td>

<td colspan='4'>Action</td>
             </tr>
   </thead>
   <tbody id = 'table-data'>";
   while($row = $result->fetch_assoc()){
    $output .=  
    "<tr>;
  
    <td>" . $row['documentID'] . "</td> 
    <td colspan='3'>" . $row['documentName'] . "</td> 
    <td>" . $row['submittedTo'] . "</td>
    <td >" . $row['documentType'] . "</td>; 

    <td >" . $row['documentStatus'] . "</td> 
    <td >" . $row['remarks'] . "</td>;
    <td colspan='4'><a class='btn btn-primary btn-sm update_docu' href='edit-me.php?documentID='" . $row["documentID"] . "id='update_docu' type='button'> Edit </a></td>;
    </tr>";
}
$output .= "</tbody>";
echo $output;

}
else{
    echo "<span class='text-secondary fs-1'>No result Found</span>";
}

?>