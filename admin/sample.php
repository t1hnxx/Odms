
<?php require_once("dbcon.php");

$query = "SELECT * FROM users_documents";
$result = mysqli_query($conn,$query); 
?>
<!DOCTYPE html>
<!--AUGUST 2, LOGIN PAGE -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../ODMS Logo.png">

	<title>ADMIN | CEIT-ODMS</title>
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://code.jquery.com/jquery-3.7.0.js"> </script>
    <link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.7/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/fh-3.4.0/sb-1.6.0/sl-1.7.0/datatables.min.css" rel="stylesheet">
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.7/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/fh-3.4.0/sb-1.6.0/sl-1.7.0/datatables.min.js"></script>
<linl rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">


	<style>
      body {
        font-family: 'Kanit', serif;
      }
    </style>
</head>
<body class="bg-dark">

<div class="container text-white" id="area">

<table id="example" class="display table table-responsive-sm  table-striped table-bordered border-white" style="width:100%">
        <thead class=" table-dark">
        <tr>
                    <td>Document Reference Number</td>
                    <td>Document Name</td>
                    <td>Document Type</td>
                    <td>Document Author/s</td>
                    <td>Received By</td>
                    <td>Department</td>
                    <td>Document Status</td>
              
                  </tr>
              </thead>
        <tbody>
        <?php 
                while( $row = mysqli_fetch_array($result) ){
                
                ?>
                 <tr>
                <td><?php echo $row['documentID'];?></td>
                <td><?php echo $row['documentName'];?></td>
                <td><?php echo $row['documentType'];?></td>
                <td><?php echo $row['documentOwner'];?></td>
                <td><?php echo $row['facultyFname'] . " " .$row['facultyMname'] . " " . $row['facultyLname'];?></td>
                <td><?php echo $row['facultyDepartment'];?></td>
                <td><?php echo $row['documentStatus'];?></td>
              
             
             </tr> 
             <?php }?>
             </tbody>
</table>
</div>


              
                <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"> </script>
<script>
new DataTable('#example', {
    initComplete: function () {
        this.api()
            .columns()
            .every(function () {
                let column = this;
                
                // Create select element
                let select = document.createElement('select');
                select.add(new Option('Thesis','thesis'));
                column.footer().replaceChildren(select);
 
                // Apply listener for user change in value
                select.addEventListener('change', function () {
                    var val = DataTable.util.escapeRegex(select.value);
 
                    column
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });
 
                // Add list of options
                column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                        select.add(new Option(d));
                    });
            });
    }
});

</script>
</body>



<div class="col-sm-6">
    <span class="text-white"for="filter">Document Type: </span>
    <select name="getval" id="getval" class=" w-50 form-select form-select-sm bg-dark text-white" aria-label="Small select example">
      <option disabled selected>Open this select menu</option>
      <option value="thesis">CAPSTONE PROJECT/ THESIS / MANUSCRIPT</option>
      <option value="journal">OJT JOURNAL</option>
      <option value="completion_form">COMPLETION FORM</option>
    </select>
  </div>

<br><br><br>
<div class="alert-message"></div>
  <?php 
$query = "SELECT * FROM faculty_info ORDER BY facultyLname";
$result = mysqli_query($conn,$query); 
?>

<button class="btn btn-success" id="addCheckboxColumn">Add Checkbox Column</button> <br>
<button class="btn btn-primary" id="selectAll">Select All</button>
<div class="container text-white" id="area">
  <table class='table table-responsive-sm table-striped table-bordered border-dark ' id="myTable">
            <thead class="fw-bolder table-dark align-middle" id="head">
              <tr>
              <td>SELECT</td>
                    <td id="photo"></td>
                    <td>Last Name</td>
                    <td>First Name</td>
                    <td>Middle Name</td>      
                    <td>Sex</td>
                    <td>Email</td>
                    <td>Department</td>
                    <td id="photo">Number of Handled Document</td>
              
                  </tr>
            </thead>
            <tbody class="text-break">
                <?php 
                while( $row = mysqli_fetch_array($result) ){  
                  $images = $row['Fprofile_image'];
                ?>
                <tr id="<?php echo $row['facultyEmail']?>">
                <td class="text-center"><input  type='checkbox'></td>
                <td id="photo"><?php
                if($images == null){

                  
                  $output = '<img src="images/unknown.jpg" class="border border-black" style="height:60px;width:60px;border-radius: 50%" alt="..." >';

                  echo $output;
                }
                else{ ?>               
                <img src="/odms/temp/<?php echo $images;?>" class="rounded-circle border border-black" style="height:60px; width: 60px"> <?php } ?></td>
                <td><?php echo $row['facultyLname'];?></td>
                <td ><?php echo $row['facultyFname'];?></td>
                <td><?php echo $row['facultyMname'];?></td>       
                <td><?php echo $row['facultyGender'];?></td>
                <td ><?php echo $row['facultyEmail'];?></td>

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

                <td id="photo"><?php echo $row['documents_handle'];?></td> 
             </tr> 
             <?php }?>
          </tbody>
  </table>
</div>

<script>

$(document).ready(function() {
  $('#myTable tbody').on('change', 'select', function() {
    var email = $(this).closest('tr').attr('id');
    var column_name = $(this).attr('data-column');
    var new_value = $(this).val();
    
    $.ajax({
  url: 'update_data.php',
  type: 'POST',
  data: {
    row_id: email,
    column_name: column_name,
    new_value: new_value
  },
  success: function(response) {
    $(".alert-message").html(response);
  },
  error: function(jqXHR, textStatus, errorThrown) {
    // Handle error response
  }
});// Code for handling the change and sending AJAX request
  });
});

    </script>
<script>
  const selectAllButton = document.querySelector('#selectAll');
const checkboxes = document.querySelectorAll('input[type="checkbox"]');

selectAllButton.addEventListener('click', () => {
  if (selectAllButton.textContent === 'Select All') {
    // Check all checkboxes and change button text
    checkboxes.forEach(checkbox => checkbox.checked = true);
    selectAllButton.textContent = 'Deselect';
  } else {
    // Deselect all checkboxes and change button text
    checkboxes.forEach(checkbox => checkbox.checked = false);
    selectAllButton.textContent = 'Select All';
  }
});
</script>


                </html>


