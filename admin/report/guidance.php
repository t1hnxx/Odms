<?php 
$query = "SELECT * FROM faculty_info WHERE facultyDepartment = 'GUIDANCE'";
$result = mysqli_query($conn,$query); 

?>
<div class="d-inline align-text-top" id="filter">
<span class="text-white"for="filter">Department: </span> <button type="button" class="btn btn-flat btn-success float-end" id="prints"><i class="bi bi-printer"></i>&nbsp Print</button>
<select name="getval" id="getval" class=" w-25 form-select form-select-sm" aria-label="Small select example">
  <option selected>Open this select menu</option>
  <option value="DCEA">DCEA</option>
  <option value="DCEE">DCEE</option>
  <option value="DIET">DIET</option>
  <option value="DIT">DIT</option>
  <option value="DAFE">DAFE</option>
</select></div>
<br><div class="container text-white" id="area"><table class='table table-responsive-sm table-dark table-striped table-bordered border-white' id="myTable">
              <thead class="table-dark">
              <tr>
                    <td></td>
                    <td>Last Name</td>
                    <td>First Name</td>
                    <td>Middle Name</td>      
                    <td>Sex</td>
                    <td>Email</td>
                    <td>Department</td>
                    <td>Number of Handled Document</td>
              
                  </tr>
              </thead>
              <tbody>
                <?php 
                while( $row = mysqli_fetch_array($result) ){
                
                ?>
                <tr>
                <td><?php echo $row['Fprofile_image'];?></td>
                <td><?php echo $row['facultyLname'];?></td>
                <td><?php echo $row['facultyFname'];?></td>
                <td><?php echo $row['facultyMname'];?></td>       
                <td><?php echo $row['facultyGender'];?></td>
                <td><?php echo $row['facultyEmail'];?></td>
                <td><?php echo $row['facultyDepartment'];?></td>
                <td><?php echo $row['documents_handle'];?></td>
              
             
             </tr> 
             <?php }?>
             </tbody>
</table></div>

