<?php

require "dbcon.php";?>
<!DOCTYPE html>
<head>
	<title>Dashboard | CEIT-ODMS</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
     Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var x = new Date()
document.getElementById('ct').innerHTML = x;
display_c();
 }
</script>
 <style>
    #div1{
    position:relative;
	background-color:#8888ff;
	display:block;
	height:20px;
  width: 20px;
	overflow:hidden;
        border: 1px solid #000;
}
 </style>
 </head>
  
 <body onload=display_ct();>
<span id='ct' ></span>

  <div style="width: 50px;text-overflow: ellipsis;">hjertujkjnbfdsfghjkmnbfgnhmj,mnbfghmjhgfvghjytgffdvfghgfdvb nmjyhgfvbhnjyhtrfedfghnjytgrfvghytrfgbhnjuyhtrfgbhjuytrgfhjg</div>


  <input type="submit" class="toggle_div" id="dasButton" value="Expand"/><br>
<div id="div1"> hgbvnhbvfghbfghbn v </div>



  <div class="wrapper"> <br><br><br>

  TRYYYYYYYYYYYYYYYYY PERSONNEL
   <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
  
    -->

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>	
	


    
   
 <?php   
  $query = "SELECT * FROM users_documents";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_array($result);

  $string = $row['documentName'];
 
/* $string = strip_tags($string);
if (strlen($string) > 10) {

    // truncate string
    $stringCut = substr($string, 0, 10);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= '... <a href="/this/story">Read More</a>';
}
echo $string;*/




echo substr_replace($string, "...", 20);
?>	
  
  </body>
  
<script>

$(function(){
 
 // The height of the content block when it's not expanded
 var adjustheight = 50;
 // The "more" link text
 var moreText = "+  More";
 // The "less" link text
 var lessText = "- Less";
  
 // Sets the .more-block div to the specified height and hides any content that overflows
 $(".more-less .more-block").css('height', adjustheight).css('overflow', 'hidden');
  
 // The section added to the bottom of the "more-less" div
 $(".more-less").append('[...]');
 // Set the "More" text
 $("a.adjust").text(moreText);
  
 $(".adjust").toggle(function() {
         $(this).parents("div:first").find(".more-block").css('height', 'auto').css('overflow', 'visible');
         // Hide the [...] when expanded
         $(this).parents("div:first").find("p.continued").css('display', 'none');
         $(this).text(lessText);
     }, function() {
         $(this).parents("div:first").find(".more-block").css('height', adjustheight).css('overflow', 'hidden');
         $(this).parents("div:first").find("p.continued").css('display', 'block');
         $(this).text(moreText);
 })
});
 
</script>



<script>

$("#dasButton").click(function(){
    var inputValue=$("#dasButton").attr('value');
    
    if(inputValue=="Expand")
    {
        $("#div1").animate({width:"200px"});
        $("#dasButton").attr('value','Reduce');
    }
    else if(inputValue=="Reduce")
    {
        $("#div1").animate({width:"20px"});
        $("#dasButton").attr('value','Expand');
    }
});
</script>
</html>
