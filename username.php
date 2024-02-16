<?php 
$conn = mysqli_connect("localhost","root","","odms");

if(!$conn){
    die('Connection Failed'. mysqli_connect_error());
} 
$query = "SELECT * FROM users_documents";
$result = mysqli_query($conn,$query); ?>

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
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.7/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.css" rel="stylesheet">
 
 
	<style>
      body {
        font-family: 'Kanit', serif;
      }
    </style>
</head>
  
<body class="bg-dark">
    <div class="table-responsive">
<table class='tablesorter table table-responsive-sm table-dark table-striped table-bordered border-white' id="myTable">
              <thead class="table-dark">
              <tr>
                    <td>Document Reference Number</td>
                    <td>Document Name</td>
                    <td>Document Type</td>
                    <td colspan="3">Document Author/s</td>
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
                <td colspan="3"><?php echo $row['facultyFname'] . " " .$row['facultyMname'] . " " . $row['facultyLname'];?></td>
                <td><?php echo $row['facultyDepartment'];?></td>
                <td><?php echo $row['documentStatus'];?></td>
              
             
             </tr> 
             <?php }?>
             </tbody>
</table>
</div>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js" integrity="sha512-qzgd5cYSZcosqpzpn7zF2ZId8f/8CHmFKZ8j7mU4OUXTNRd5g+ZHBPsgKEwoqxCtdQvExE5LprwwPAgoicguNg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.7/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>
 

<script>


/*$(function() {
  $("#myTable").tablesorter();
});*/
</script>

<script>
    $(document).ready(function(){
        $('#myTable').DataTable({
            //"processing" : true,
            "serverSide" : true,
            
            dom: 'lBfrtip',
            buttons: [
                'excel', 'csv', 'pdf', 'copy'
            ],
            
            
        });
    });
    


</script>