<?php 
require "dbcon.php";

$query = "SELECT * FROM faculty_info WHERE facultyDepartment = 'DCEA' ORDER BY facultyLname";
$result = mysqli_query($conn,$query); 

?>
<div>
  <button onclick="printFdcea()" class="btn btn-flat btn-success float-start" id="prints"><i class="bi bi-printer"></i>&nbsp Print</button>
</div>
<br><br>
<div class="container text-white" id="areafdcea"><table class='table table-responsive-sm  table-striped table-bordered border-dark' id="fdcea">
              <thead class="fw-bolder table-dark align-middle" id="headcea">
              <tr>
                    <td id="photo"></td>
                    <td>Last Name</td>
                    <td>First Name</td>
                    <td>Middle Name</td>      
                    <td>Sex</td>
                    <td>Email</td>
                    <td>Department</td>
                     <!--<td id="photo">Number of Handled Document</td> -->
              
                  </tr>
              </thead>
              <tbody class="text-break">
                <?php 
                while( $row = mysqli_fetch_array($result) ){
                  $images = $row['Fprofile_image'];
                ?>
                <tr>
                <td id="photo"><?php
                if($images == null){

                  
                  $output = '<img src="images/unknown.jpg" class="border border-black" style="height:80px;width:60px;border-radius: 50%" alt="..." >';

                  echo $output;
                }
                else{ ?>               
                <img src="/odms/temp/<?php echo $images;?>" class="rounded-circle border border-black" style="height:80px; width: 60px"> <?php } ?></td>

                <td><?php echo $row['facultyLname'];?></td>
                <td><?php echo $row['facultyFname'];?></td>
                <td><?php echo $row['facultyMname'];?></td>       
                <td><?php echo $row['facultyGender'];?></td>
                <td><?php echo $row['facultyEmail'];?></td>
                <td><?php echo $row['facultyDepartment'];?></td>
                <!--<td id="photo"><?php //echo $row['documents_handle'];?></td>!-->
              
             
             </tr> 
             <?php }?>
             </tbody>
</table></div>


<script>
function printFdcea() {
  var _el = $('<div>')
            var _head = $('head').clone()
                _head.find('title').text("Document Monitoring Report")
            var p = $('#areafdcea').clone()
            //p.find('hr.border-light').removeClass('.border-light').addClass('border-dark')
            //p.find('.btn').remove()
            _el.append(_head)
            _el.append('<div class="d-flex flex-row container-fluid">'+
                      '<div class="col-1 text-right">'+
                     
                      '</div>'+
                      '<div class="col-10 d-flex flex-row justify-content-center">'+
                      '<div class="text-dark lh-sm me-3"><img src="../cvsu.png" width="65px" height="65px" />  </div>' +
                      '<div class="text-dark"><h5 class="text-center fw-bolder">&nbsp Cavite State University </h5>' + 
                      '<h6 class="text-center" style="font-size: 17px">College of Engineering and Information Technology</h6>' +
                      '<h6 class="text-center fw-bold" style="font-size: 16px">Department of Civil Engineering and Architecture</h6>' +
                      '</div>' +
                      '<div class="text-dark ms-3"><img src="../ODMS Logo.png" width="65px" height="65px" /> </div>' +  
                      '</div>' +
                      '<div class="col-1 text-right">'+
                      '</div></div><br>' +
                      '<h5 class="text-center fw-bolder">Personnel</h5>')
              p.find('#photo').hide()
              p.find('#fdcea').removeClass("table-striped").addClass("border-black")
              p.find('#headcea').removeClass("table-dark").addClass("border-black")
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


