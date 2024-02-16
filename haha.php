<!DOCTYPE html>
<html>
<head>
<style>
@page {
  
}
@font-face {
                font-family: "MyCustomFont";
                font-weight: normal;
                font-style: normal;
                font-variant: normal;
                src: url("vendor/dompdf/dompdf/lib/fonts/07558_CenturyGothic.ttf") format("truetype");
            }
@font-face {
      font-family: "Title";
      font-weight: normal;
      font-style: normal;
      font-variant: normal;
      src: url("vendor/dompdf/dompdf/lib/fonts/Bookman Old Style Bold.ttf") format("truetype");
            }
 @font-face {
      font-family: "All";
      font-weight: normal;
      font-style: normal;
      font-variant: normal;
      src: url("vendor/dompdf/dompdf/lib/fonts/Arial Regular.ttf") format("truetype");
            }
body{
    font-size: 10px;
    font-family: "All";
}
.whole{
  font-family: "All"!important;

  font-size: 11pt;
  
}
.head{
  text-align: center;
  display: flex;
  justify-content: center;
}
.place{
  font-size: 11pt;
  font-family: "MyCustomFont", sans-serif;
}
.place1{
  font-size: 10pt;
  font-family: "MyCustomFont", sans-serif;
}
.school{
  font-size: 14pt;
  font-family: "Title", sans-serif;
}

.header{
  float: left;
  width: 50%; 
  text-align: center;
}
.header1{
  float: left;
  width: 25%; 
  text-align: center;
 
}
.report{
  font-family: "All", sans-serif;
  font-size: 12pt;
 text-align: center;
 
 
}
.registrar{
  font-family: "All", sans-serif;
  font-size: 11pt;
 
 
 
}
.date{
  font-size: 12pt;
  text-align: right;
  display: flex;
  justify-content: right;
  margin-right: 30px;
  



}
.date1{
  font-size: 12pt;
  text-align: right;
  display: flex;
  justify-content: right;
  margin-right: 70px;

}
.column {
  float: left;
  width: 25%; 
  text-align: center;

 
}
.column1 {
  float: left;
  width: 50%; 
  text-align: left;

 
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.row1:after {
  content: "";
  display: table;
  clear: both;
}
.content{
  text-decoration: underline;
  text-decoration-thickness: 2px;
}
.approve{
  width: 70%;
  float: right;
  text-align: left;

 
  
}
.dean{
  width: 50%;
  float: right;
  text-align: left;
 

}
img{
  width: 2.87cm; 
  height: 2.54cm;
  float:left
}
p.indent {
  text-indent: 55px;
}

</style>
</head>
<body>
  <div class="whole">
  <div class="row1">
  <div class="header1"></div>
  <div class="header">
 
  <img src="cvsu.png">
  <span class="place">Republic of the Philippines</span><br>
  <span class="school">CAVITE STATE UNIVERSITY</span> <br>
  <span class="place"><b>Don Severino delas Alas Campus</b></span><br>
  <span class="place1">Indang, Cavite</span>
 
</div>  <div class="header1"></div>
</div>
<br><br><br>
  <div class="report"><b>REPORT OF COMPLETION</b></div> <br><br>
  <div class="date">'. date("F j, Y") . '</div> <br>

  <div class="registrar"><b>THE UNIVERSITY REGISTRAR</b></div><br>
  Thru the College of Engineering and Information Technology <br>
  This University

  <br><br><br>
  &nbsp; Sir/Madam: <br>

 <p class="indent">Please be informed that Mr./Mrs./Miss ________________________________, with Student Number &nbsp; _________________, under the program '.$acronym .', major in <b>N/A</b> has removed the grade of “4.0” or completed the requirements for the grade of “Incomplete” on the subjects indicated below: </p> <br>

 <div class="row">
  <div class="column">
   &nbsp; &nbsp;  Subject Code &nbsp; &nbsp; 

   <p class="content"><b>&nbsp; &nbsp; ITEC 199&nbsp; &nbsp; </b></p>
    
  </div>
  <div class="column">
   
  &nbsp; &nbsp;  Previous Grade &nbsp; &nbsp; 

    <p class="content"><b>&nbsp; &nbsp; INC&nbsp; &nbsp; </b></p>
  </div>
  <div class="column">
    
  &nbsp; &nbsp; Semester / AY Taken &nbsp; &nbsp; 

    <p class="content"><b>&nbsp; &nbsp; Second/ 2022-2023&nbsp; &nbsp; </b></p>
  </div>
  <div class="column">
  &nbsp; &nbsp;  Final Grade  &nbsp; &nbsp; 

   <p class="content"><b>&nbsp; &nbsp; 1.75&nbsp; &nbsp; </b></p>
    
  </div>
</div> <br><br><br>
<div class="row">
<div class="column1">
    
    <br>
    <br><br><br>
    <p>&nbsp; &nbsp;  Noted by:</p> <br><br>
    &nbsp; &nbsp;  <b>CHARLOTTE B. CARANDANG</b>  &nbsp; &nbsp; <br>
    &nbsp; &nbsp;  Department Chairperson<br><br>

    &nbsp; &nbsp;  Date: __________________
    </div>
    <div class="column1">
    &nbsp; &nbsp;  <b>ANABELLE J. ALMAREZ</b>  &nbsp; &nbsp; <br>
    &nbsp; &nbsp;  Signature Over Printed Name of Instructor <br><br><br>
  
     <p>&nbsp; &nbsp;  Recommending Approval:</p><br><br>

       &nbsp; &nbsp;  <b>FLORENCE M. BANASIHAN</b>  &nbsp; &nbsp; <br>
    &nbsp; &nbsp;  College Registrar<br><br>

    &nbsp; &nbsp;  Date: __________________
    </div>
</div> <br><br>
<div class="approve">
&nbsp; &nbsp; Approved By:
</div> <br> <br><br><br>
<div class="dean">
&nbsp; &nbsp;  <b> WILLIE C. BUCLATIN</b><br>
&nbsp; &nbsp;   College Dean <br><br>

&nbsp; &nbsp;  Date: __________________
</div>

</div>

</body>
</html>