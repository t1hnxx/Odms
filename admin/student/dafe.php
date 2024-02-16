<?php 
$query = "SELECT * FROM student_info WHERE studentCourse = 'BSABE' ORDER BY studentLname";
$result = mysqli_query($conn,$query); 

?>
<div>
  <button onclick="printSdafe()" class="btn btn-flat btn-success float-start" id="prints"><i class="bi bi-printer"></i>&nbsp Print</button>
</div>
<br> <br>
<div class="container text-white" id="sdafe">
  <table class='table table-responsive-sm  table-striped table-bordered border-dark' id="sdafe">
            <thead class="fw-bolder table-dark align-middle" id="headafe">
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

                  
                  $output = '<img src="images/unknown.jpg" class="border border-black" style="height:80px;width:60px;border-radius: 50%" alt="..." >';

                  echo $output;
                }
                else{ ?> <img src="/odms/temp/<?php echo $images;?>" class="rounded-circle border border-black" style="height:80px; width: 60px"> <?php } ?></td>
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
<script>
function printSdafe() {
  var _el = $('<div>')
            var _head = $('head').clone()
                _head.find('title').text("Document Monitoring Report")
            var p = $('#sdafe').clone()
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
            p.find('#sdafe').removeClass("table-striped").addClass("border-black")       
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
    document.getElementById('search_dafe').addEventListener('keyup', function() {
      const table = document.getElementById('fdafe'); // Replace with your table's ID
const rows = table.querySelectorAll('tbody tr');
const searchTerm = document.getElementById('search_dafe').value.toLowerCase();

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
