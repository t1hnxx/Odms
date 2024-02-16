
<?php
require 'vendor/autoload.php';
require "dbcon.php";
$me = $_GET['me'];
$rowmo = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM document WHERE createdby = '$me' AND documentType='journal'"));

$docuID = $rowmo['documentID'];
$name = $rowmo['documentName'];
$date = date("D M j, y, g:i a", strtotime($rowmo['date']));

use Dompdf\Dompdf;;     
$html_content = html_entity_decode('<!DOCTYPE html>
<html>
<head>
<style>
@page {
  margin: 5px 5px;
}
body{
    font-size: 10px;
}
div{
    border: 1px solid black;
    padding-left: 2px;
    text-align: center;
}
span{
    font-size: 8px;
    margin-left: 10px;
}
</style>
</head>
<body><div><b>' . $name . ' ( ' . $docuID . ' )' . '</b><br>
<span>
    <em>' .$date . '</em>
</span>
</div>
</body>
</html>');

 $dompdf = new Dompdf();

 // Load HTML content (can be from a file, database, or generated dynamically)
 $dompdf->loadHtml(html_entity_decode($html_content)); // Replace with your HTML

 // Set paper size (optional)
 $dompdf->setPaper(array(0,0,30,210), 'landscape');

 // Render the PDF
 $dompdf->render();

 // Output the PDF to the browser (or save as a file)
 $dompdf->stream("my_document.pdf");
?>
