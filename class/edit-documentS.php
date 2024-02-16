<?php 
require '../dbcon.php';

if($_POST["action"] == "edit"){
		edit();

	}
else{
	delete();
}
function edit() {
    global $conn;
    global $user1;
    global $course;

    $course = $user1['studentCourse'];

    if( $course == "BSABE"){
        $dep = "DAFE";
    } 
    elseif( $course == "BSCE" ||  $course == "BS Arch"){
        $dep = "DCEA";
    }
    elseif( $course == "BSCpE" ||  $course == "BSECE" ||  $course == "BSEE"){
        $dep = "DCEE";
    }
    elseif( $course == "BSIndT-ET" ||  $course == "BSIndT-ELEX" ||  $course == "BSIndT-AT" ||  $course == "BSIE"){
        $dep = "DIET";
    }
    elseif( $course == "BSCS" ||  $course == "BSIT"){
        $dep = "DIT";
    }



    // Input validation and sanitization
    $requiredFields = ['documentID', 'documentType', 'documentName', 'documentOwner', 'documentStatus', 'remarks', 'createdby'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            echo "Error: $field is required.";
            return; // Exit early if any required field is missing
        }
        $_POST[$field] = mysqli_real_escape_string($conn, $_POST[$field]); // Sanitize inputs
    }

    // Handle empty submittedTo
    $submittedTo = $_POST['submittedTo'];

  
    if($_POST['documentStatus'] == "submitted" && empty($submittedTo) ){
        echo "Please select a Personnel";
        exit;
    } elseif($_POST['documentStatus'] == "created"){
        echo "Please Select submit";
        exit;
    }

    elseif($_POST['documentStatus'] == "return") {
          $submittedTo = $_POST['submittedTo'] = "None";
        }

    elseif($_POST['documentStatus'] == "to_chairperson")
        {
            
            $fquery = "SELECT facultyID FROM faculty_info WHERE position = 'chairperson' AND facultyDepartment = '$dep'";
            $fresult = mysqli_query($conn,$fquery);
            $crow = mysqli_fetch_assoc($fresult);
           
                $submittedTo =  $_POST['submittedTo'] = $crow['facultyID'];
            
        }

    elseif($_POST['documentStatus'] == "to_dean")
        {
            $dquery = "SELECT facultyID FROM faculty_info WHERE position = 'dean' AND facultyDepartment = 'DEAN'";
            $dresult = mysqli_query($conn,$dquery);
            $drow = mysqli_fetch_array($dresult);
            if($_POST['documentType'] == "thesis" || $_POST['documentType'] == "completion_form")
            {
                $submittedTo = $_POST['submittedTo'] = $drow['facultyID'];
            }
        }

        elseif($_POST['documentStatus'] == "to_research")
        {
            $squery = "SELECT facultyID FROM faculty_info WHERE position = 'cResearch_coordinator' AND facultyDepartment = 'RESEARCH'";
            $sresult = mysqli_query($conn,$squery);
            $srow = mysqli_fetch_array($sresult);
            if($_POST['documentType'] == "thesis" || $_POST['documentType'] == "completion_form")
            {
                $submittedTo = $_POST['submittedTo'] = $srow['facultyID'];
            }
        }
    
    // Prepare queries with placeholders
    $updateQuery = "UPDATE document SET documentName = ?, documentType = ?, documentOwner = ?, submittedTo = ?, documentStatus = ?, remarks = ?, createdby = ? WHERE documentID = ?";
    $transQuery = "INSERT INTO document_transaction (documentID, documentName, documentType, documentOwner, submittedTo, documentStatus, remarks, createdby) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $fcltyQuery = "UPDATE faculty_info SET documents_handle = documents_handle + 1 WHERE facultyID = ?";
    $fcltyQuery2 = "UPDATE faculty_info SET documents_handle = documents_handle - 1 WHERE facultyID = ?";

    // Prepare statements
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    $transStmt = mysqli_prepare($conn, $transQuery);
    $fcltyStmt = mysqli_prepare($conn, $fcltyQuery);
    $fcltyStmt2 = mysqli_prepare($conn, $fcltyQuery2);

    // Bind parameters to placeholders
    mysqli_stmt_bind_param($updateStmt, "ssssssss", $_POST['documentName'], $_POST['documentType'], $_POST['documentOwner'], $submittedTo,$_POST['documentStatus'], $_POST['remarks'], $_POST['createdby'] ,$_POST['documentID'], );
    mysqli_stmt_bind_param($transStmt, "ssssssss", $_POST['documentID'], $_POST['documentName'], $_POST['documentType'], $_POST['documentOwner'], $submittedTo, $_POST['documentStatus'], $_POST['remarks'], $_POST['createdby']);
    mysqli_stmt_bind_param($fcltyStmt, "s", $submittedTo);
    mysqli_stmt_bind_param($fcltyStmt2, "s", $submittedTo);

    // Execute queries and handle errors
    if (mysqli_stmt_execute($updateStmt)) {
        if (mysqli_stmt_execute($transStmt)) {
            if ($_POST['documentStatus'] == 'submitted') {
                if (mysqli_stmt_execute($fcltyStmt)) {
                    echo "The document was updated successfully!";
                } else {
                    echo "Error updating faculty documents_handle: " . mysqli_error($conn);
                }
            } elseif ($_POST['documentStatus'] == 'return') {
                if (mysqli_stmt_execute($fcltyStmt2)) {
                    echo "The document was updated successfully!";
                } else {
                    echo "Error updating faculty documents_handle: " . mysqli_error($conn);
                }
            } else {
                echo "The document was updated successfully!";
            }
        } else {
            echo "Error adding transaction log: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating document: " . mysqli_error($conn);
    }

    // Close statements
    mysqli_stmt_close($updateStmt);
    mysqli_stmt_close($transStmt);
    mysqli_stmt_close($fcltyStmt);
    mysqli_stmt_close($fcltyStmt2);
}

function delete(){
	global $conn;

	$id = $_POST['action'];

	$find = "SELECT * FROM document WHERE id = '$id' LIMIT 1";
	$fquery = mysqli_query($conn,$find);
	$row = mysqli_fetch_assoc($fquery);
	
	$sbmtd = $row['submittedTo'];

	$me = "UPDATE faculty_info SET documents_handle = documents_handle - 1 WHERE facultyID = '$sbmtd'";
	$mean = mysqli_query($conn,$me);

	$query = "DELETE FROM document WHERE id = '$id'";
	$queryrun = mysqli_query($conn,$query);

	if($mean){
		echo "Deleted Successfully";
		$queryrun;
	}
else{
	echo "Error";
}
}


