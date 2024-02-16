<?php 
$query = "SELECT * FROM users_documents WHERE facultyDepartment = 'DAFE'";
$result = mysqli_query($conn,$query); 
?>
<div class="d-flex flex-row" id="filter">
  <div class="col-sm-6">
    <label for="search">Search Document</label>
    <input type="text" name="search" id="search_dafe" class="form-control rounded-0 w-100" placeholder="Search">
    <br>
    <span for="getdafe">Document Type: </span>
  <select name="getdafe" id="getdafe" class=" w-50 form-select form-select-sm" aria-label="Small select example">
    <option disabled selected>Open this select menu</option>
    <option value="thesis">CAPSTONE PROJECT/ THESIS / MANUSCRIPT</option>
    <option value="journal">OJT JOURNAL</option>
    <option value="completion_form">COMPLETION FORM</option>
  </select>
</div>
  <div class="col-sm-2">
  </div>
  <div class="col-sm-4 ">
    <br>
    <button onclick="printdafe()" class="btn btn-flat btn-success float-end"><i class="bi bi-printer"></i>&nbsp Print</button>
  </div>
</div>

<br>
<div class="container text-white" id="areadafe">
  <table class='table table-responsive-sm table-striped table-bordered border-dark' id="dafe">
    <thead class="fw-bolder table-dark align-middle" id="headafe">
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
      <tbody class="text-break">
                <?php 
                while( $row = mysqli_fetch_array($result) ){
                
                ?>
                <tr>
                <td><?php echo date('F j, Y, g: i a', strtotime($row['date_created']))?></td>
                <td><?php echo $row['documentID'];?></td>
                <td><?php echo $row['documentName'];?></td>
                <td><?php 
                if($row['documentType'] == 'thesis'){
                  echo "Thesis/ Capstone Project/ Manuscript";
                }
                elseif($row['documentType'] == 'journal'){
                  echo "OJT Journal"; 
                }
                elseif($row['documentType'] == 'completion_form'){
                  echo "Completion Form";
                }
                else{
                  echo "Error";
                };	?></td>
                <td><?php
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

                      echo implode(", ", $student_names);
									?>
              
              
              
              
              </td>
                <td> <?php 
              if($row['submittedTo'] == "None"){
                echo "Not Submitted Yet";
              }else{
                
                echo $row['facultyFname'] . ' ' . $row['facultyMname'] . ' ' . $row['facultyLname']; 
              }?>
            
          </td>       
                <td><?php echo $row['facultyDepartment'];?></td>
              
                <td class="text-uppercase fw-bolder"><?php
              
              if($row['documentStatus'] == 'submitted'){
                echo 'Submitted';
              }
              elseif($row['documentStatus'] == 'on_hand'){
                echo 'On-Hand'; 
              }
              elseif($row['documentStatus'] == 'review'){
                echo 'Under Review';
              }
              elseif($row['documentStatus'] == 'pick-up'){
                echo 'Available for pick-up';
              }
              elseif($row['documentStatus'] == 'created'){
                echo 'Created';
              }
              elseif($row['documentStatus'] == 'graded'){
                echo 'Graded';
              }
              elseif($row['documentStatus'] == 'return'){
                echo 'Returned';
              }
              elseif($row['documentStatus'] == 'signed'){
                echo 'Signed';
              }
              elseif($row['documentStatus'] == 'to_chairperson'){
                echo 'Forwarded to Chairperson';
              }
              elseif($row['documentStatus'] == 'to_registrar'){
                echo 'Forwarded to College Registrar';
              }
              elseif($row['documentStatus'] == 'to_dean'){
                echo 'Forwarded to Dean';
              }
              elseif($row['documentStatus'] == 'to_uregistrar'){
                echo 'Forwarded to University Registrar';
              }
              elseif($row['documentStatus'] == 'to_research'){
                echo 'Forwarded to Research Coordinator';
              }

              elseif($row['documentStatus'] == null){
                echo 'Not Submitted Yet';
              }
              else{
                echo "Error";
              }; ?></td>
               <td><?php echo date('F j, Y, g: i a', strtotime($row['date']))?></td>
             </tr> 
             <?php }?>
        </tbody>
  </table>
</div>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script>
function printdafe() {
  var _el = $('<div>')
            var _head = $('head').clone()
                _head.find('title').text("Document Monitoring Report")
            var p = $('#areadafe').clone()
            //p.find('hr.border-light').removeClass('.border-light').addClass('border-dark')
            //p.find('.btn').remove()
            _el.append(_head)
            _el.append('<div class="d-flex flex-row container-fluid">'+
                      '<div class="col-1 text-right">'+
                      '</div>'+
                      '<div class="col-10 d-flex flex-row justify-content-center">'+
                      '<div class="text-dark lh-sm me-3"><img src="../cvsu.png" width="70px" height="70px" />  </div>' +
                      '<div class="text-dark"><h5 class="text-center fw-bolder">&nbsp Cavite State University </h5>' +
                      '<h6 class="text-center" style="font-size: 17px">College of Engineering and Information Technology</h6>' +
                      '<h6 class="text-center fw-bold" style="font-size: 16px">Department of Agriculture and Food Engineering</h6>' +
                      '</div>' +
                      '<div class="text-dark ms-3"><img src="../ODMS Logo.png" width="70px" height="70px" /> </div>' +     
                    ' </div>' +
                      '<div class="col-1 text-right">'+
                      '</div></div><br>' +
                      '<h5 class="text-center fw-bolder">Document Monitoring Report</h5>')
            p.find('#dafe').removeClass("table-striped").addClass("border-black")
            p.find('#headafe').removeClass("table-dark").addClass("border-black") 
            _el.append(p.html())
            var nw = window.open("","","width=1200,height=900,left=250,location=no,titlebar=yes")
            nw.document.write(_el.html());
           nw.document.close()
           setTimeout(() => {
                         nw.print()
                         setTimeout(() => {
                            nw.close()
                           
                         }, 200);
                     }, 500);
}
</script>
<script>
 $(document).ready(function(){
  $("#getdafe").on('change', function(){
			var value = $(this).val();
			//alert(value);	
			$.ajax({
				url: "report_select/getdafe.php",
				type: "POST",	
				data: 'request=' + value,
				beforeSend:function(){
					$("#dafe").html("<br><br><div class='d-flex justify-content-center'><img src='loading45.gif' height='70' width='70'></div>");
				},
				success:function(data){
					$("#dafe").html(data);
					
				}
			});
		});

  $("#search_dafe").keyup(function(){
    var search = $(this).val();
    $.ajax({
      url: 'report_search/search_dafe.php',
      method: 'post',
      data:{query:search},
      beforeSend:function(){
					$("#dafe").html("<br><br><div class='d-flex justify-content-center'><img src='loading45.gif' height='70' width='70'></div>");
				},
      success:function(response){
        $("#dafe").html(response);
      }
    });
  });
 });
</script>

