<?php 
$query = "SELECT * FROM faculty_info WHERE facultyDepartment = 'GUIDANCE' ORDER BY facultyLname";
$result = mysqli_query($conn,$query); 

?>
<div>
  <button onclick="printFdit()" class="btn btn-flat btn-success float-start" id="prints"><i class="bi bi-printer"></i>&nbsp Print</button>
</div>
<br><br>
<br><div class="container text-white" id="area"><table class='table table-responsive-sm table-striped table-bordered border-dark' id="myTable">
              <thead class="fw-bolder table-dark" id="headgui">
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
              <tbody>
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
                <td id="photo"><?php echo $row['documents_handle'];?></td>
              
             
             </tr> 
             <?php }?>
             </tbody>
</table></div>



