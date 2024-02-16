<?php 
require '../dbcon.php';

if($_POST["action"] == "edit"){
		edit();

	}
else{
	delete();
}
function edit(){
    global $conn;
    global $user;

   $me = $user['facultyID'];
   $dep = $user['facultyDepartment'];
   $pos = $user['position'];

   
    if (empty($_POST['submittedTo'])) {
        // If empty, assign "None"
        $_POST['submittedTo'] = "None";
    } else {
        $_POST['submittedTo'];
    }

    if($_POST['documentStatus'] == "return")
    {
        if($_POST['documentType'] == "thesis" || $_POST['documentType'] == "journal")
        {
            $_POST['submittedTo'] = "None";
        }
        elseif($_POST['documentType'] == "completion_form"){
            {
                $_POST['submittedTo'] = $me;
            }
        }
    }elseif($_POST['documentStatus'] == "to_chairperson")
    {
        $fquery = "SELECT facultyID FROM faculty_info WHERE position = 'chairperson' AND facultyDepartment = '$dep'";
        $fresult = mysqli_query($conn,$fquery);
        $crow = mysqli_fetch_assoc($fresult);
        if($_POST['documentType'] == "thesis" || $_POST['documentType'] == "completion_form")
        {
            $_POST['submittedTo'] = $crow['facultyID'];
        }
    }elseif($_POST['documentStatus'] == "signed")
    {
        if($_POST['documentType'] == "thesis" || $_POST['documentType'] == "completion_form")
        {
            $_POST['submittedTo'] = $me;
        }
    }
    elseif($_POST['documentStatus'] == "to_registrar")
    {
        $rquery = "SELECT facultyID FROM faculty_info WHERE (position = 'registrar' OR position = 'assistant_registrar') AND facultyDepartment = 'REGISTRAR'";
        $rresult = mysqli_query($conn,$rquery);
        $rrow = mysqli_fetch_array($rresult);
        if($_POST['documentType'] == "thesis" || $_POST['documentType'] == "completion_form")
        {
            $_POST['submittedTo'] = $rrow['facultyID'];
        }
    }
    elseif($_POST['documentStatus'] == "to_dean")
    {
        $dquery = "SELECT facultyID FROM faculty_info WHERE position = 'dean' AND facultyDepartment = 'DEAN'";
        $dresult = mysqli_query($conn,$dquery);
        $drow = mysqli_fetch_array($dresult);
        if($_POST['documentType'] == "thesis" || $_POST['documentType'] == "completion_form")
        {
            $_POST['submittedTo'] = $drow['facultyID'];
        }
    }
    elseif($_POST['documentStatus'] == "to_uregistrar")
    {
        if($_POST['documentType'] == "thesis" || $_POST['documentType'] == "completion_form")
        {
            $_POST['submittedTo'] = "None";
        }
    }
    
    // Proceed with saving to the database (same as before)
    $documentID= mysqli_real_escape_string($conn,$_POST['documentID']);
    $documentType=  mysqli_real_escape_string($conn,$_POST['documentType']);
    $documentName=  mysqli_real_escape_string($conn,$_POST['documentName']);
    $documentOwner=  mysqli_real_escape_string($conn,$_POST['documentOwner']);
    $submittedTo=  mysqli_real_escape_string($conn,$_POST['submittedTo']);
    $documentStatus=  mysqli_real_escape_string($conn,$_POST['documentStatus']);
    $remarks=  mysqli_real_escape_string($conn,$_POST['remarks']);
    
    

    $query = "UPDATE document SET documentName = '$documentName', documentType = '$documentType', documentOwner = '$documentOwner', submittedTo = '$submittedTo', 
    documentStatus = '$documentStatus', remarks = '$remarks' WHERE documentID = '$documentID'";
    $run = mysqli_query($conn,$query);

    $trans = "INSERT INTO document_transaction (documentID, documentName, documentType, documentOwner, submittedTo, documentStatus, remarks) VALUES ('$documentID', '$documentName', '$documentType', '$documentOwner', '$submittedTo', '$documentStatus', '$remarks')";
    $transrun = mysqli_query($conn,$trans);

    $fclty = "UPDATE faculty_info SET documents_handle = documents_handle + 1 WHERE facultyID = '$submittedTo'";
    $fcltyrun = mysqli_query($conn,$fclty);

    $completion = "UPDATE completion SET documentStatus = '$documentStatus', submittedTo = '$submittedTo', remarks = '$remarks' WHERE documentID = '$documentID'";
    $completionrun = mysqli_query($conn,$completion);

    $fclty2 = "UPDATE faculty_info SET documents_handle = documents_handle - 1 WHERE facultyID = '$submittedTo'";
    $fcltyrun2 = mysqli_query($conn,$fclty2);
   
    if($run){
        echo "The document was updated successfully!";
        $transrun;
        if($documentStatus == 'submitted'){
        $fcltyrun;
        }elseif($documentStatus == 'return'){
            $fcltyrun2;
            
        }

        if($documentType = 'completion_form'){
            $completionrun;
        }
    }
    else{
        echo "An error occurred";
        
    }
}


function delete(){
	global $conn;

	$id = $_POST['action'];

	$find = "SELECT * FROM document WHERE documentID = '$id' LIMIT 1";
	$fquery = mysqli_query($conn,$find);
	$row = mysqli_fetch_assoc($fquery);
	
	$sbmtd = $row['submittedTo'];

	$me = "UPDATE faculty_info SET documents_handle = documents_handle - 1 WHERE facultyID = '$sbmtd'";
	$mean = mysqli_query($conn,$me);

	$query = "DELETE FROM document WHERE documentID = '$id'";
	$queryrun = mysqli_query($conn,$query);


    $queryC = "DELETE FROM completion WHERE documentID = '$id'";
	$queryrunC = mysqli_query($conn,$queryC);

	if($queryrun){
		echo "Deleted Successfully";
		$mean;
        $queryrunC;
	}
else{
	echo "Error";
}
}


