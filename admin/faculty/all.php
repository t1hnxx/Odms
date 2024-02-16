
<?php 
$query = "SELECT * FROM faculty_info ORDER BY facultyLname";
$result = mysqli_query($conn,$query); 
?>
 <br>
<div class="row">
  <div class="col-sm-6">
    <input type="text" name="search_personnel"  id="search_personnel" class="form-control rounded-25 d-inline-block align-text-top w-100" placeholder="Search...">
  </div>
<div class="col-sm-6">
<button class="btn btn-danger float-end ms-2" id="deleteButton"><i class="bi bi-trash3"></i> Select & Delete</button>
<button class="btn btn-primary float-end" id="selectAll" hidden>Select All</button> <br>

  <button onclick="printF()" class="btn btn-flat btn-success float-end" id="prints"><i class="bi bi-printer"></i>&nbsp Print</button>
</div>
</div>
<button class="btn btn-danger float-end ms-2" id="deleteButton" hidden><i class="bi bi-trash3"></i></button>&nbsp<button class="btn btn-primary float-end" id="selectAll" hidden>Select All</button> <br>
<div class="alert-message"></div>
<div class="container text-white" id="area">
  <table class='table table-responsive-sm table-striped table-bordered border-dark ' id="myTable">
            <thead class="fw-bolder table-dark align-middle" id="head">
              <tr>
                    <td id="photo" hidden>SELECT</td>
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
            <tbody class="text-break align-middle">
                <?php 
                while( $row = mysqli_fetch_array($result) ){  
                  $images = $row['Fprofile_image'];
                ?>
                <tr id="<?php echo $row['facultyEmail']?>">
                <td class="text-center photo" hidden><input id="<?php echo $row['facultyID']?>"  type='checkbox'></td>
                <td id="photo"><?php
                if($images == null){

                  
                  $output = '<img src="images/unknown.jpg" class="border border-black" style="height:60px;width:60px;border-radius: 50%" alt="..." >';

                  echo $output;
                }
                else{ ?>               
                <img src="/odms/temp/<?php echo $images;?>" class="rounded-circle border border-black" style="height:60px; width: 60px"> <?php } ?></td>
                <td><?php echo $row['facultyLname'];?></td>
                <td><?php echo $row['facultyFname'];?></td>
                <td><?php echo $row['facultyMname'];?></td>       
                <td><?php echo $row['facultyGender'];?></td>
                <td><?php echo $row['facultyEmail'];?></td>
                <td>
                    <?php 
										$query1 = "SELECT * FROM department ORDER BY department_id ASC";
										$result1 = mysqli_query($conn,$query1);
									 ?>
                                     <select data-column='facultyDepartment'>
                                    <?php while ($rows = mysqli_fetch_array($result1))
												{ ?>
                                     <option value="<?php echo $rows['departmentCode'];?>" <?php  echo ($row['facultyDepartment'] == $rows['departmentCode'] ? 'selected' : '') ?>><?php echo $rows['departmentCode'] ?></option>
                             <?php } ?>
                 </td>
                <!--<td id="photo"><?php //echo $row['documents_handle'];?></td> --> 
             </tr> 
             <?php }?>
          </tbody>
  </table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
function printF() {
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
                      '<h5 class="text-center fw-bolder">List of Personnel</h5>')
            p.find('#photo').hide()
            p.find('.photo').hide()
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


<script>
$(document).ready(function(){
  // Add click event to the delete button
  $('#deleteButton').on('click', function() {
    // Toggle the visibility of checkboxes
    $('.photo input[type="checkbox"]').toggle();
    $('#selectAll').toggle();
  });

  // Add click event to the select all button
  $('#selectAll').on('click', function() {
    // Toggle the checked state of all checkboxes
    $('.photo input[type="checkbox"]').prop('checked', function(i, value) {
      return !value;
    });
  });

  // Add click event to handle the delete functionality
  $('#deleteButton').on('click', function() {
    // Check if any checkboxes are selected
    if ($('.photo input[type="checkbox"]:checked').length > 0) {
      // Perform deletion logic using AJAX
      if (confirm("Are you sure you want to delete selected faculty records?")) {
        // Extract selected faculty IDs
        var selectedFacultyIDs = $('.photo input[type="checkbox"]:checked').map(function() {
          return this.id;
        }).get();

        // Perform AJAX request to delete selected faculty records
        $.ajax({
          url: 'delete_selected_faculty.php', // Replace with the actual PHP file handling deletion
          method: 'POST',
          data: { facultyIDs: selectedFacultyIDs },
          success: function(response) {
            // Handle success, e.g., reload the page or show a success message
            alert('Selected faculty records deleted successfully.');
            location.reload();
          },
          error: function(error) {
            // Handle error, e.g., show an error message
            alert('Error deleting faculty records.');
            console.error(error);
          }
        });
      }
    } else {
      alert('Please select at least one faculty record to delete.');
    }
  });
});
</script>