<?php 
$query = "SELECT * FROM student_info ORDER BY studentLname";
$result = mysqli_query($conn,$query); 

?>


<div class="row">
  <div class="col-sm-6">
    <input type="text" name="search_personnel"  id="search_personnel" class="form-control rounded-25 d-inline-block align-text-top w-100" placeholder="Search...">
  </div>
<div class="col-sm-6">
<button onclick="printS()" class="btn btn-flat btn-md btn-success float-end" id="prints"><i class="bi bi-printer"></i>&nbsp Print</button>
</div>
</div>
<br>






<div class="d-flex flex-row" id="filter">
  <div class="col-sm-6">
    <?php $query1 = "SELECT department_id,	departmentCode, departmentName FROM department ORDER BY department_id ASC";
										$result1 = mysqli_query($conn,$query); ?>
    <span class="text-dark"for="filter">Program: </span>
    <select name="getval" id="getval" class=" w-50 form-select form-select-sm text-dark"  aria-label="Small select example">
      <option disabled selected>Open this select menu</option>
      <option value="BSABE">BSABE</option>
      <option value="BS Arch">BS Arch</option>
      <option value="BSCpE">BSCpE</option>
      <option value="BSCS">BSCS</option>
      <option value="BSEE">BSEE</option>
      <option value="BSECE">BSECE</option>
      <option value="BSIE">BSIE</option>
      <option value="BSIndT-ET">BSIndT-ET</option>
      <option value="BSIndT-AT">BSIndT-AT</option>
      <option value="BSIndT-ELEX">BSIndT-ELEX</option>
      <option value="BSCE">BSCE</option>
      <option value="BSIT">BSIT</option>
      
    </select>
  </div>
 </div>

<br> 
<div class="container text-white" id="area">
  <table class='table table-responsive-sm table-striped table-bordered border-dark' id="myTable">
            <thead class="fw-bolder table-dark align-middle" id="head">
              <tr>
                    <td id="photo"></td>
                    <td>Student Number</td>
                    <td>Last Name</td>
                    <td>First Name</td>
                    <td>Middle Name</td>      
                    <td>Sex</td>
                    <td>Email</td>
                    <td>Program</td>
                   <!-- <td id="photo">No. of Owned Documents</td> -->
              
                  </tr>
              </thead>
              <tbody class="text-break">
                <?php 
                while( $row = mysqli_fetch_array($result) ){  
                  $images = $row['profile_image'];
                ?>
                <tr>
                <td id="photo"><?php
                if($images == null){

                  
                  $output = '<img src="images/unknown.jpg" class="border border-black" style="height:60px;width:60px;border-radius: 50%" alt="..." >';

                  echo $output;
                }
                else{ ?> <img src="/odms/temp/<?php echo $images;?>" class="rounded-circle border border-black" style="height:60px; width: 60px"> <?php } ?></td>
                <td><?php echo $row['studentNum'];?></td>
                <td><?php echo $row['studentLname'];?></td>
                <td><?php echo $row['studentFname'];?></td>
                <td><?php echo $row['studentMname'];?></td>       
                <td><?php echo $row['studentGender'];?></td>
                <td><?php echo $row['studentEmail'];?></td>
                <td><?php echo $row['studentCourse'];?></td>
                <!-- <td id="photo"><?php // echo $row['documents_owned'];?></td> -->
              
             
             </tr> 
             <?php }?>
             </tbody>
</table></div>

<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script>
 $(document).ready(function(){
  $("#getval").on('change', function(){
			var value = $(this).val();
			//alert(value);	
			$.ajax({
				url: "report_select/get.php",
				type: "POST",	
				data: 'request=' + value,
				beforeSend:function(){
					$("#myTable").html("<br><br><div class='d-flex justify-content-center'><img src='loading45.gif' height='70' width='70'></div>");
				},
				success:function(data){
					$("#myTable").html(data);
					
				}
			});
		});
  });
</script>

<script>
function printS() {
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
                      '<h5 class="text-center fw-bolder">List of Students</h5>')
            p.find('#photo').hide()
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
    document.getElementById('search_personnel').addEventListener('keyup', function() {
      const table = document.getElementById('myTable'); // Replace with your table's ID
const rows = table.querySelectorAll('tbody tr');
const searchTerm = document.getElementById('search_personnel').value.toLowerCase();

rows.forEach(row => {
  const cells = row.querySelectorAll('td');
  let matchFound = false;

  cells.forEach(cell => {
    if (cell.textContent.toLowerCase().includes(searchTerm)) {
      matchFound = true;
      return; // Exit the cells loop if a match is found
    }
  });

  row.style.display = matchFound ? '' : 'none';
});

});
})

</script>
