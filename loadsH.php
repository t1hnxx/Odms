<?php
require "dbcon.php";
$newCount = $_POST['newCount'];

$id = $user1['studentNum'];

$query = "SELECT * FROM document_transaction WHERE FIND_IN_SET('$id',documentOwner) AND documentType='thesis'  ORDER BY date DESC LIMIT $newCount";
$result = mysqli_query($conn,$query);


if(mysqli_num_rows($result)> 0){

while ($row = mysqli_fetch_array($result)){?>  
<div class=" border border-secondary border-2 m-1" id="gogo"> 
 <div class="row p-2" >
<span class="lh-3 fw-bold" id="name1"><?php echo $row['documentName']?> &nbsp &nbsp <span id="id1"> (<?php echo $row['documentID']?>)</span></span> <br>   
<span class="lh-1 ms-2">Status: <span style="color:#ec6d18" class="fw-bold" id="submitted1"><?php 
        $submit = $row['submittedTo'];
        $faculty ="SELECT facultyID, facultyFname, facultyMname, facultyLname FROM faculty_info WHERE facultyID = '$submit' LIMIT 1 ";
        $runme = mysqli_query($conn,$faculty);
        $rowF = mysqli_fetch_assoc($runme);

          if($row['documentStatus'] == 'submitted'){
                                echo "Submitted the document to " .$rowF['facultyFname'] . " " . $rowF['facultyLname']  ;
                            }
                            elseif($row['documentStatus'] == 'on_hand'){
                                echo "On-hand"; 
                            }
                            elseif($row['documentStatus'] == 'review'){
                                echo "Mr./Ms. "  .$rowF['facultyFname'] . " " . $rowF['facultyLname'] . " is reviewing your document";
                            }
                            elseif($row['documentStatus'] == 'pick-up'){
                                echo "Your document is available for pick-up";
                            }
                            elseif($row['documentStatus'] == 'created'){
                                echo "You've created your document";
                            }
                            elseif($row['documentStatus'] == 'return'){
                                echo "Your document has been returned";
                            }
                            elseif($row['documentStatus'] == null){
                                echo "Not submitted Yet";
                            }
                            else{
                                echo "Error";
                            }; 

          ?>
</span> </span><br>
<hr style="width: 94%;margin:auto; border: 1px solid black" >
<span class="lh-1 ms-2" style="font-size: 14px" id="remarks1">Remarks:  <i><?php echo $row['remarks']?></i> </span>
<i class="text-secondary ms-2" style="font-size:12px" id="date1"> <?php echo date('F j, Y, g:i a', strtotime($row['date']));?></i> 
</div>
</div>
<?php } 
}else{ ?>
<div class="border border-secondary border-1 d-flex justify-content-center p-1"id="gogo"> 
<br><span class="justify-content-center align-items-center fw-bolder" style="color:#ec6d18; font-size:x-large">There are no actvity in this document</span>
</div>
<?php } ?>   
