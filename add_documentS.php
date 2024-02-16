<style>
#id_work_days input[type="checkbox"] {
  display: none;
}

#id_work_days span {
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

#id_work_days input[type="checkbox"]:checked + span {
  background-color: #ec6d18;
  color: white;
  
}
</style>
<?php
$course = $user1['studentCourse'];

$student_query = "SELECT * FROM student_info WHERE studentCourse = '$course'";
				$studentrun = mysqli_query($conn,$student_query);
$query = "SELECT * FROM document WHERE FIND_IN_SET('$me',documentOwner) AND documentType='thesis'";
$thesis = mysqli_query($conn,$query);

$query2 = "SELECT * FROM document WHERE documentOwner = '$me' AND documentType = 'journal'";
$journal = mysqli_query($conn,$query2);

?>


<button type="button" class="btn position-fixed bottom-0 end-0 rounded-circle border border-secondary-subtle"
style="margin-bottom: 45px; margin-right: 45px;background-color: #ec6d18" data-bs-toggle="modal" data-bs-target="#choose">
       <i class="bi bi-file-earmark-plus text-white" style=" font-size: 45px"></i> </button>

<!-- Modal -->
<div class="modal fade" id="choose" tabindex="-1" aria-labelledby="choose" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="choose" style="color:#ec6d18">Choose the document</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row align-items-center">
		<div class="col-6 text-center">
		<?php if(mysqli_num_rows($thesis) > 0){
				echo ' <button class="btn btn-secondary rounded-circle fs-1" style="width:100px;height:100px;opacity:50%" disabled>
				<i class="bi bi-file-font-fill" style="font-size: 50px"></i>
			</button><br>
			<p class="text-secondary">Thesis / Capstone </p>';
		}else{
			echo ' <button class="btn btn-success rounded-circle fs-1" style="width:100px;height:100px" data-bs-toggle="modal" data-bs-target="#thesisS">
				<i class="bi bi-file-font-fill" style="font-size: 50px"></i>
			</button><br>
			<p style="color:#ec6d18">Thesis / Capstone </p>';
		}?>
	</div>
		<div class="col-6 text-center">
		<?php if(mysqli_num_rows($journal) > 0){
				echo '<button class="btn btn-secondary rounded-circle fs-1" style="width:100px;height:100px;opacity:50%" disabled>
				<i class="bi bi-journal-bookmark text-white" style="font-size: 50px"></i>
			</button><br>
			<p class="text-secondary">OJT Journal</p>';
		}else{
			echo'<button class="btn btn-danger rounded-circle fs-1" onclick="journal()" style="width:100px;height:100px">
			<i class="bi bi-journal-bookmark text-white" style="font-size: 50px"></i>
		</button><br>
		<p style="color:#ec6d18">OJT Journal</p>';
		}
		?>
		
		</div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="thesisS" aria-hidden="true" aria-labelledby="thesisS" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="thesisS">Insert Topic Title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form autocomplete="off" class="form" role="form" action="" id="thesis_formF" method="POST">
          <div class="mb-3">
            <span class="fw-bold" style="font-size: 14px">Note: You are automatically selected as the Document Owner.</span> <br>
            <label for="documentName" class="col-form-label fw-bold" style="color:#ec6d18">Title:</label><br>
            <input type="text" class="form-control border-black border-2 w-100" id="documentName" name="documentName" placeholder="Insert your topic title here..." required>
          </div> <br>
          <div class="mb-3">
           
             <div class="sticky-top" >
              <input type="text" id="search-personnel" class="form-control border-black border-2" placeholder="Add Members">
            </div>
            <div class="form-check " id="id_work_days">	
              <?php

                  $query = "SELECT * FROM document WHERE documentType='thesis'";
                  $thesis1 = mysqli_query($conn,$query);

                  if(mysqli_num_rows($thesis1)> 0){
                  $Srow = mysqli_fetch_array($thesis1);



                  $own = $Srow['documentOwner'];
                  $O = explode(",",$own);

                  while($studentrow = mysqli_fetch_array($studentrun)){?>         
                    <label>
                    <input type="checkbox" class="roar w-100" id="documentOwner" name="documentOwner[]" value="<?php echo $studentrow["studentNum"]?>" data-valuetwo="<?php echo $studentrow["studentFname"] . ' '. $studentrow["studentLname"]?>"<?php if($studentrow["studentNum"] == $user1['studentNum']) echo "checked disabled";
                     elseif(in_array($studentrow["studentNum"], $O)) echo "disabled "; ?>>
                    <span class="w-100" id="here">
                    <?php 	
                    if($studentrow['profile_image'] == null){

                    
                      $output = '<img src="uploads/unknown.jpg" class="rounded-circle" style="height:30px" alt="..." >';

                      echo $output;
                    }
                    else{
                      echo '<img src="temp/' .$studentrow['profile_image'].'"class="rounded-circle" style="height:30px" alt="..." >';

                      
                    }
                    ?>&nbsp&nbsp <?php echo $studentrow['studentFname']. " ". $studentrow['studentLname'];?>
                </span>
                  </label> 
                
              <?php	} } else{

                while($studentrow = mysqli_fetch_array($studentrun)){?>         
                  <label>
                  <input type="checkbox" class="roar w-100" id="documentOwner" name="documentOwner[]" value="<?php echo $studentrow["studentNum"]?>" data-valuetwo="<?php echo $studentrow["studentFname"] . ' '. $studentrow["studentLname"]?>"<?php if($studentrow["studentNum"] == $user1['studentNum']) echo "checked disabled";?>>
                  <span class="w-100" id="here">
                  <?php 	
                  if($studentrow['profile_image'] == null){

                  
                    $output = '<img src="uploads/unknown.jpg" class="rounded-circle" style="height:30px" alt="..." >';

                    echo $output;
                  }
                  else{
                    echo '<img src="temp/' .$studentrow['profile_image'].'"class="rounded-circle" style="height:30px" alt="..." >';

                    
                  }
                  ?>&nbsp&nbsp <?php echo $studentrow['studentFname']. " ". $studentrow['studentLname'];?>
              </span>
                </label> 
              
            <?php	} 


              } ?> 

                 </div>
          </div>
          <div class="fw-bold fs-6" style="color:#ec6d18">Document Author/s: </div>
         <span class="fw-bolder fs-5" id="dito"></span>
      </div>
      <div class="modal-footer">
        <button class="btn border-black border-2" onclick="thesis()" style="background-color: #ec6d18; color: white; ">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
<script type="text/javascript" src='node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>


<!-- OPTION DISPLAY -->
<script>
$(document).ready(function() {
  //$('#documentOwner1:checked').prop('disabled', true); // Disable the checked checkbox

   
        var selected = $('.roar:checked').map(function() {
            return $(this).attr('data-valuetwo');
        }).get().join(', ');
        $('#dito').html(selected);
   
 $('.roar').click(function() {
  selected = $('.roar:checked').map(function() {
            return $(this).attr('data-valuetwo');
        }).get().join(', ');
        $('#dito').html(selected);

 }); 
 });
</script>

<!-- ADD DOCUMENTS -->
<!-- Journal -->
<script>
	function journal(){
   
  $(document).ready(function() {
   
    $.ajax({
      url: 'journal_add.php',
      beforeSend: function() {
        // Display a loading indicator or message
      },
      success: function(response) {
        if (response.includes("Document Created Successfully")) {
          Swal.fire({
            title: "Document Created Successfully!",
            icon: "success",
            text: "Document Slip generated",
            confirmButtonText: "Go to Documents"
          }).then(function() {
           
            window.location = "documentChoice.php";
          }); var name = <?php echo $me?>

window.location = "printj.php?callback=handleData&" +  
"me=" + name ;
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
   
    
  })
};
</script>

<!-- Thesis -->
<script>
	function thesis() {
  $(document).ready(function() {
      var selectedCheckboxes = $(".roar:checkbox:checked").map(function() {
        return this.value;
      }).toArray();
      var data = {
        documentName: $("#documentName").val(),
        documentOwner: selectedCheckboxes
      };

      $.ajax({
        url: 'thesis_add.php',
        type: 'POST',
        data: data,
        success: function(response) {
        if (response.includes("Document Created Successfully!")) {
          Swal.fire({
            title: "Document Created Successfully!",
            icon: "success",
            text: "Document Slip generated",
            confirmButtonText: "Go to Documents"
          }).then(function() {
            window.location = "documentChoice.php";
          })
          window.location = "print.php?callback=handleData&" +  
      "documentName=" + data.documentName ;
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
      });
    
    });
} ;
</script>

<script>
  const searchInput = document.getElementById("search-personnel");
const personnelDiv = document.getElementById("id_work_days");

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