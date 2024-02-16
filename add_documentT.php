<style>
#student input[type="radio"] {
  display: none;
}

#student span {
  display: none;
          padding: 5px;
          text-transform: uppercase;
          border: 2px solid #FF6F00;
          border-radius: 3px;
          color: #ec6d18;
          margin: 6px;
          text-align:center;
          width: 18rem;
          height: 3rem;
          font-size: 1rem
        }


#student input[type="radio"]:checked + span {
  background-color: #ec6d18;
  color: white;
  
}

</style>
<button type="button" class="btn btn-sm position-fixed bottom-0 end-0 rounded-circle border border-secondary-subtle"
style="margin-bottom: 50px; margin-right: 20px;background-color: #ec6d18" data-bs-toggle="modal" data-bs-target="#choose">
       <i class="bi bi-file-earmark-plus text-white" style=" font-size: 40px"></i> </button>
</div>


<div class="modal fade" id="choose" tabindex="-1" aria-labelledby="choose" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="choose" style="color:#ec6d18">CREATE COMPLETION FORM</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-grow-1 justify-content-center align-items-centers">
		 <button class="btn btn-primary rounded-circle fs-1 " style="width:100px;height:100px;opacity:50%" data-bs-toggle="modal" data-bs-target="#completionM">
		 <i class="bi bi-journal-check"></i>
			</button>
		
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="completionM" aria-hidden="true" aria-labelledby="completionM" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="completionM">Completion Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form autocomplete="on" class="form" role="form" action="" id="s" method="POST">
          <div class="mb-3">
		  	<div style="color:#ec6d18"><b>CHOOSE A STUDENT:</b></div>
		
      <input type="text" id="search-personnel" class="form-control border border-dark w-50" placeholder="Search student">
			<div  class="form-check " id="student">
				<?php

        $student_query = "SELECT * FROM student_info";
        $studentrun = mysqli_query($conn,$student_query);

        
        $fordafe = "SELECT * FROM student_info WHERE studentCourse = 'BSABE'";
        $daferun = mysqli_query($conn,$fordafe);

        $fordcea = "SELECT * FROM student_info WHERE studentCourse = 'BSCE' OR studentCourse = 'BS Arch'";
        $dcearun = mysqli_query($conn,$fordcea);

        $fordcee = "SELECT * FROM student_info WHERE studentCourse = 'BSCpE' OR studentCourse = 'BSECE' OR studentCourse = 'BSEE'";
        $dceerun = mysqli_query($conn,$fordcee);

        $fordiet = "SELECT * FROM student_info WHERE studentCourse = 'BSIndT-AT' OR studentCourse = 'BSIndT-ET' OR studentCourse = 'BSIndT-ELEX' OR studentCourse = 'BSIE'";
        $dietrun = mysqli_query($conn,$fordiet);

        $fordit = "SELECT * FROM student_info WHERE studentCourse = 'BSIT' OR studentCourse = 'BSCS'";
        $ditrun = mysqli_query($conn,$fordit);



        $department = $user['facultyDepartment'];

        if($department == 'DIT'){
          while($ditrow = mysqli_fetch_array($ditrun)){?>
						<label>
              <input type="radio" class="roar W-100" id="documentOwner" name="documentOwner" value="<?php echo $ditrow["studentNum"] ?>" data-valuetwo="<?php echo $ditrow["studentFname"] . ' '. $ditrow["studentLname"] ?>">
              <span class="w-100" id="here">
              <?php 	
					if($ditrow['profile_image'] == null){

						
						$output = '<img src="uploads/unknown.jpg" class="rounded-circle" style="height:30px" alt="..." >';

						echo $output;
					}
					else{
						echo '<img src="temp/' .$ditrow['profile_image'].'"class="rounded-circle" style="height:30px" alt="..." >';

						
					}
				?>&nbsp&nbsp<?php echo $ditrow['studentFname']. " ". $ditrow['studentLname'] ?>
              </span>
            </label>
					
			<?php	}
      } 
      elseif($department == 'DIET'){
        while($dietrow = mysqli_fetch_array($dietrun)){?>
          <label>
            <input type="radio" class="roar W-100" id="documentOwner" name="documentOwner" value="<?php echo $dietrow["studentNum"] ?>" data-valuetwo="<?php echo $dietrow["studentFname"] . ' '. $dietrow["studentLname"] ?>">
            <span class="w-100" id="here">
            <?php 	
        if($dietrow['profile_image'] == null){

          
          $output = '<img src="uploads/unknown.jpg" class="rounded-circle" style="height:30px" alt="..." >';

          echo $output;
        }
        else{
          echo '<img src="temp/' .$dietrow['profile_image'].'"class="rounded-circle" style="height:30px" alt="..." >';

          
        }
      ?>&nbsp&nbsp<?php echo $dietrow['studentFname']. " ". $dietrow['studentLname'] ?>
            </span>
          </label>
        
    <?php	}
    }

    elseif($department == 'DCEE'){
      while($dceerow = mysqli_fetch_array($dceerun)){?>
        <label>
          <input type="radio" class="roar W-100" id="documentOwner" name="documentOwner" value="<?php echo $dceerow["studentNum"] ?>" data-valuetwo="<?php echo $dceerow["studentFname"] . ' '. $dceerow["studentLname"] ?>">
          <span class="w-100" id="here">
          <?php 	
      if($dceerow['profile_image'] == null){

        
        $output = '<img src="uploads/unknown.jpg" class="rounded-circle" style="height:30px" alt="..." >';

        echo $output;
      }
      else{
        echo '<img src="temp/' .$dceerow['profile_image'].'"class="rounded-circle" style="height:30px" alt="..." >';

        
      }
    ?>&nbsp&nbsp<?php echo $dceerow['studentFname']. " ". $dceerow['studentLname'] ?>
          </span>
        </label>
      
  <?php	}
  }

  elseif($department == 'DCEA'){
    while($dcearow = mysqli_fetch_array($dcearun)){?>
      <label>
        <input type="radio" class="roar W-100" id="documentOwner" name="documentOwner" value="<?php echo $dcearow["studentNum"] ?>" data-valuetwo="<?php echo $dcearow["studentFname"] . ' '. $dcearow["studentLname"] ?>">
        <span class="w-100" id="here">
        <?php 	
    if($dcearow['profile_image'] == null){

      
      $output = '<img src="uploads/unknown.jpg" class="rounded-circle" style="height:30px" alt="..." >';

      echo $output;
    }
    else{
      echo '<img src="temp/' .$dcearow['profile_image'].'"class="rounded-circle" style="height:30px" alt="..." >';

      
    }
  ?>&nbsp&nbsp<?php echo $dcearow['studentFname']. " ". $dcearow['studentLname'] ?>
        </span>
      </label>
    
<?php	}
}
elseif($department == 'DAFE'){
  while($daferow = mysqli_fetch_array($dietrun)){?>
    <label>
      <input type="radio" class="roar W-100" id="documentOwner" name="documentOwner" value="<?php echo $daferow["studentNum"] ?>" data-valuetwo="<?php echo $daferow["studentFname"] . ' '. $daferow["studentLname"] ?>">
      <span class="w-100" id="here">
      <?php 	
  if($daferow['profile_image'] == null){

    
    $output = '<img src="uploads/unknown.jpg" class="rounded-circle" style="height:30px" alt="..." >';

    echo $output;
  }
  else{
    echo '<img src="temp/' .$daferow['profile_image'].'"class="rounded-circle" style="height:30px" alt="..." >';

    
  }
?>&nbsp&nbsp<?php echo $daferow['studentFname']. " ". $daferow['studentLname'] ?>
      </span>
    </label>
  
<?php	}
}
				?>
        
        </div>

        <hr style="height:2px;border-width:0;background-color:black">
      <div class="mb-2">
        <span class="fw-bolder" style="color:#ec6d18">Student Name:</span>
         <div class="fw-bolder fs-6 fst-italic" id="dito" style="color:#ec6d18"></div>
        </div>
          <br>
        <div class="row">
          <div class="col-sm-6">
            <label for="#semester" class="form-label fw-bolder" style="color:#ec6d18">Semester</label>
            <select
              class="form-select form-select-sm border-dark fw-bolder"
              name="semester"
              id="semester"
            >
              <option selected disabled>Select one</option>
              <option value="first">First</option>
              <option value="second">Second</option>
             
            </select>
          </div>
          <div class="col-sm-6">
            <label for="#academic_year" class="form-label fw-bolder" style="color:#ec6d18">Academic Year</label>
            <select
              class="form-select form-select-sm border-dark fw-bolder"
              name="academic_year"
              id="academic_year"
            >
              <option selected disabled>Select one</option>
              <option value="2021-2022">2021-2022</option>
              <option value="2021-2022">2021-2022</option>
              <option value="2023-2024">2023-2024</option>
              <option value="2024-2025">2024-2025</option>
            </select>
          </div>
        </div> <br>
      <div class="row">
      <div class="col-sm-4">
      <label for="#subjectCode" class="fw-bolder" style="color:#ec6d18">Subject Code</label>
          <input type="text" class="form-control border-black border-2 text-uppercase" id="subjectCode" name="subjectCode" placeholder="Subject Code">
        </div>  
          <div class="col-sm-4">
            <label for="#gradeP" class="form-label" style="color:#ec6d18">Previous Grade</label>
            <input type="text" class="form-control border-black border-2 text-uppercase" id="gradeP" name="gradeP"  value="INC" disabled>
          </div>
          <div class="col-sm-4">
            <label for="#gradeF" class="form-label" style="color:#ec6d18">Final Grade</label>
            <select
              class="form-select form-select-sm border-dark fw-bolder"
              name="gradeF"
              id="gradeF"
              
            >            
              <option value="1" selected>1</option>
              <option value="1.25">1.25</option>
              <option value="1.50">1.50</option>
              <option value="1.75">1.75</option>
              <option value="2.00">2.00</option>
              <option value="2.25">2.25</option>
              <option value="2.50">2.50</option>
              <option value="2.75">2.75</option>
              <option value="3.00">3.00</option>
              <option value="4.00">4.00</option>
              <option value="5.00">5.00</option>
             
            </select>
          </div>
        </div> <br>

          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button class="btn border-black border-2" onclick="complete()" style="background-color: #ec6d18; color: white; ">Create</button>
     
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src='node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>


<!-- OPTION DISPLAY -->
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

<!-- ADD DOCUMENTS -->
<!-- Completion -->
<script>
  function complete(){
		$(document).ready(function(){
			 var x= $("#documentOwner:checked").val();
       var semester = $("#semester").val();
       var academic_year = $("#academic_year").val();
       var subjectCode = $("#subjectCode").val();
       var gradeP = $("#gradeP").val();
       var gradeF = $("#gradeF").val();
  
      var data = {
		documentOwner: x,
    semester: semester,
    academic_year: academic_year,
    subjectCode: subjectCode,
    gradeP: gradeP,
    gradeF: gradeF,
      };
	    $.ajax({
      url: 'completion_add.php',
      type: 'POST',
      data: data,
      beforeSend: function() {
        // Display a loading indicator or message
      },
      success: function(response) {
        if (response.includes("Document Created Successfully")) {
          Swal.fire({
            title: "Document Created Successfully!",
            icon: "success",
            confirmButtonText: "Go to Documents"
          }).then(function() {
            window.location = "documentChoice.php";
          });
        } else {
          Swal.fire({
            title: "Error Creating Document",
            text: response,
            icon: "error",
            confirmButtonText: "Try Again"
          });
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle AJAX errors gracefully
        console.error("AJAX error:", textStatus, errorThrown);
        Swal.fire({
          title: "Request Failed",
          text: "An error occurred while creating the document. Please try again.",
          icon: "error",
          confirmButtonText: "Close"
        });
      }
    })
    window.location = "completion.php?callback=handleData&" +  
    "documentOwner=" + x + 
    "&semester=" + semester + 
    "&academic_year=" + academic_year + 
    "&subjectCode=" + subjectCode + 
    "&gradeP=" + gradeP + 
    "&gradeF="+ gradeF ;
	})}
</script>

<!-- SEARCH -->
<script>
	function search_stud(){
		let input = document.getElementById('documentOwner').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('roar'); 
	for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
			x[i].style.listStyleType="none"; 
            x[i].style.display="inline-block";
			                
        } 
    } 
	};
</script>

<script>
 const searchInput = document.getElementById("search-personnel");
const personnelDiv = document.getElementById("student");

searchInput.addEventListener("input", () => {
  const searchQuery = searchInput.value.toLowerCase();
  const spans = personnelDiv.querySelectorAll("label span");

  spans.forEach(span => {
    const labelText = span.textContent.toLowerCase();
    const matchesSearch = labelText.includes(searchQuery);

    // Show/hide both span and label based on search query:
    span.style.display = matchesSearch ? "inline-block" : "none";
    span.parentElement.style.display = matchesSearch ? "inline-block" : "none";
  });

  // If search query is empty, hide all spans:
  if (!searchQuery) {
    spans.forEach(span => {
      span.style.display = "none";
      span.parentElement.style.display = "none";
    });
  }
});



</script>