
<?php 
$query = "SELECT * FROM users_documents";
$result = mysqli_query($conn,$query); 



?>



<div class="row">
  <label for="search" style="color:black">Search Document</label>
  <div class="col-sm-6">
    <!-- Existing search input field -->
    <input type="text" name="search" id="search_all" class="form-control rounded-25 d-inline-block align-text-top w-100" placeholder="Search...">
  </div>
  <div class="col-sm-3">
    <!-- Date range input fields -->
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date" class="form-control rounded-25" placeholder="Start Date">
  </div>
  <div class="col-sm-3">
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date" class="form-control rounded-25" placeholder="End Date">
  </div>
  <div class="col-sm-6">
    <div class="text-end">
      <button onclick="printpart()" class="btn btn-flat btn-success" id="prints">
        <i class="bi bi-printer"></i>&nbsp Print
      </button>
    </div>
  </div>
</div>



<?php
// Connect to database
//$conn = mysqli_connect("your_hostname", "your_username", "your_password", "your_database");

// Get date range values from POST request
//$startDate = $_POST['startDate'];
//$endDate = $_POST['endDate'];

// Modify SQL query to filter by date range
//$query = "SELECT * FROM users_documents WHERE documentDate BETWEEN '$startDate' AND '$endDate'";

// Execute query and fetch results
//$result = mysqli_query($conn, $query);

// Generate table HTML with filtered results
// ... (similar to your existing code for generating the table)
?>










 <br>
<div class="d-flex flex-row" id="filter">
  <div class="col-sm-6">
    <span class="text-dark"for="filter">Document Type: </span>
    <select name="getval" id="getval" class=" w-50 form-select form-select-sm" aria-label="Small select example">
      <option disabled selected>Open this select menu</option>
      <option value="thesis">CAPSTONE PROJECT/ THESIS / MANUSCRIPT</option>
      <option value="journal">OJT JOURNAL</option>
      <option value="completion_form">COMPLETION FORM</option>
    </select>
  </div>
  
</div>

<br>
<div class="container text-white" id="area">
  <table class='table table-responsive-sm table-striped table-bordered border-dark' id="myTable">
    <thead class="fw-bolder table-dark align-middle" id="head">
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
function printpart() {
  var _el = $('<div>')
            var _head = $('head').clone()
                _head.find('title').text("Document Monitoring Report")
            var p = $('#area').clone()
            //p.find('hr.border-light').removeClass('.border-light').addClass('border-dark')
            //p.find('.btn').remove()
            _el.append(_head)
            _el.append('<div class="d-flex flex-row container-fluid">'+
                      '<div class="col-1 text-right">'+
                     
                      '</div>'+
                      '<div class="col-10 d-flex flex-row justify-content-center">'+
                      '<div class="text-dark lh-sm me-3"><img src="../cvsu.png" width="65px" height="65px" />  </div>' +
                      '<div class="text-dark"><h5 class="text-center fw-bolder">&nbsp Cavite State University </h5>' + 
                      '<h6 class="text-center" style="font-size: 17px">College of Engineering and Information Technology</h6>  </div>' +
                      '<div class="text-dark ms-3"><img src="../ODMS Logo.png" width="65px" height="65px" /> </div>' +  
                      '</div>' +
                      '<div class="col-1 text-right">'+
                      '</div></div><br>' +
                      '<h5 class="text-center fw-bolder">Document Monitoring Report</h5>')
              
              p.find('#myTable').removeClass("table-striped").addClass("border-black")
            p.find('#head').removeClass("table-dark").addClass("border-black")      
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
  $("#getval, #start_date, #end_date").on('change', function(){
    var documentType = $("#getval").val();
    var startDate = $("#start_date").val();
    var endDate = $("#end_date").val();
    
    // Ajax request to fetch data based on filters
    $.ajax({
      url: "report_select/get.php",
      type: "POST",
      data: { request: documentType, start_date: startDate, end_date: endDate },
      beforeSend:function(){
        $("#myTable").html("<br><br><div class='d-flex justify-content-center'><img src='loading45.gif' height='70' width='70'></div>");
      },
      success:function(data){
        $("#myTable").html(data);
      }
    });
  });

  $("#search_all").keyup(function(){
    var search = $(this).val();
    $.ajax({
      url: 'report_search/search_all.php',
      method: 'post',
      data: { query: search },
      beforeSend:function(){
        $("#myTable").html("<br><br><div class='d-flex justify-content-center'><img src='loading45.gif' height='70' width='70'></div>");
      },
      success:function(response){
        $("#myTable").html(response);
      }
    });
  });
});
</script>



