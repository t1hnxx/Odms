<?php
    require "dbcon.php";

    $query = "SELECT * FROM student_info";
    $result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<style>
#id_work_days input[type="radio"] {
  display: none;
}

#id_work_days span {
  display: inline-block;
  padding: 5px;
  text-transform: uppercase;
  
  color: gold;
}

#id_work_days input[type="radio"]:checked + span {
  background-color: #ec6d18;
  color: white;
}

</style>
<body>


<span id="dito"></span>

 <form action="document_add.php" method="post">   
<button class="btn btn-primary w-25" type="button" data-bs-toggle="collapse" data-bs-target="#id_work_days" aria-expanded="false" aria-controls="id_work_days">
    Button with data-bs-target
  </button><br>

 <div class="collapse border border-danger border-2"id="id_work_days" name="id_work_days">fdgefd
    <div >
 <input type="text" name="search"  id="search" class="form-control rounded-25 d-inline-block align-text-top w-100 input" placeholder="Search"> </div>
 <div class="overflow-auto "id="ANO" style="height:100px">
 <?php
 while($row = mysqli_fetch_array($result)){
    echo '<div class="w-100 border border-black" id="choices"> <label class="w-100"><input type="radio" class="roar" id="yeah" name="work_days[]" value="'.$row["studentNum"] . '" data-valuetwo="'.$row["studentFname"] . ' '. $row["studentLname"] .'"><span class="w-100" id="here"><img src="unknown.jpg" class="rounded-circle" style="height:20px">&nbsp&nbsp' .$row['studentFname']. " ". $row['studentLname']. '</span></label><br></div>';
 }

 
 
 ?></div>
</div><br>

<div class="col-lg-9">
		<input type="submit" name="btnsubmit" value="Generate QR Code">
		</div>

        <?php 
if (isset($_POST["btnsubmit"])) {
   


    $checkBoxValue = join(", ", $_POST['work_days']);

    echo $checkBoxValue;

    /*echo "<pre>";
    var_dump($_POST);
    echo "</pre>";*/
}
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

const search = document.getElementById("search");
const labels = document.querySelectorAll('#id_work_days > #ANO > #choices >label');

search.addEventListener("input", () => Array.from(labels).forEach((element) => element.style.display = element.childNodes[1].id.toLowerCase().includes(search.value.toLowerCase()) ? "inline" : "none"))
</script>

<script>
$(document).ready(function() {
    $('.roar').click(function() {
        var selected = $('.roar:checked').map(function() {
            return $(this).attr('data-valuetwo');
        }).get().join(', ');
        $('#dito').html(selected);
    });
});



</script>


</body>
</html>