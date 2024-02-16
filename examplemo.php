<?php 
require "dbcon.php";
require 'vendor/autoload.php';
use Dompdf\Dompdf;; 
  if (isset($_POST['submit'])) {
    $id = "DH-12232023";
    $name = "name";
    $type = "thesis";
    $date = "December 23, 2023";

    $html_content = '<div><b>' . $name . ' ( ' . $id . ' )' . '</b><br>
                     <i>' . $date . '</i></div>';

                      $dompdf = new Dompdf();

                      // Load HTML content (can be from a file, database, or generated dynamically)
                      $dompdf->loadHtml($html_content); // Replace with your HTML
                    
                      // Set paper size (optional)
                      $dompdf->setPaper(array(0,0,147,210), 'landscape');
                    
                      // Render the PDF
                      $dompdf->render();
                    
                      // Output the PDF to the browser (or save as a file)
                      $dompdf->stream("my_document.pdf");
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <title>CARD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
      #id_work_days input[type="radio"] {
          display: none;
        }

        #id_work_days span {
          display: inline-block;
          padding: 15px;
          text-transform: uppercase;
          border: 2px solid #FF6F00;
          border-radius: 3px;
          color: #ec6d18;
          margin: 6px;
          text-align:center;
          width: 100%;
          font-size:90%
        }

        #id_work_days input[type="radio"]:checked + span {
          background-color: #FF6F00;
          color: white;
          
        }


        #personnel input[type="radio"] {
          display: none;
        }

        #personnel span {
          display: inline-block;
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

        #personnel input[type="radio"]:checked + span {
          background-color: #FF6F00;
          color: white;
          
        }
        .chosen-image {
          width: 50px;
          height: 50px;
          border-radius: 50%; 
        }
        .chosen-text{
          margin-left: 10px;
        }
    </style>
  </head>
  <body>
    <header>
      <!-- place navbar here -->
    </header>
    <main>
    <form action="examplemo.php" method="POST">
<button class="btn btn-success" type="submit" name="submit">Generate PDF</button>
</form>

    <button class="btn border-0 m-3 text-decoration-underline fw-bolder" style="border: 2px solid #ec6d18;font-size: 4vh;color:#ec6d18"><i class="bi bi-arrow-left-circle"></i>&nbspBACK</button>
  
      <div class="col-md-10 m-3">
        <div class="card m-3 rounded-0 border-dark shadow-lg" style="background-color:#fffcfa">
        <div class="card-header p-3" style="color:#ec6d18;"><h4 class="card-title text-center fw-bolder">EDIT DOCUMENT</h4></div>
          <div class="card-body">
          <div class="card-text">
          <form action="" method="post">

            <div class="row m-2">
              <div class="col-md-6 mb-2">
                <label for="" class="form-label">Document Reference ID</label>
                <input
                  type="text"
                  class="form-control border-danger border-1"
                  value="HIIII"
                  name="documentID"
                  id=""
                  aria-describedby="helpId"
                  placeholder=""
                  disabled readonly/>
                <small id="helpId" class="form-text text-danger opacity-75 fst-italic" style="font-size: small">Field cannot be edited</small>
              </div>

              <div class="col-md-6 mb-2">
                <label for="" class="form-label">Document Type</label>
                <input
                  type="text"
                  class="form-control border-danger border-1"
                  name="documentID"
                  id=""
                  aria-describedby="helpId"
                  placeholder=""
                  disabled readonly/>
                  <small id="helpId" class="form-text text-danger opacity-75 fst-italic" style="font-size: small">Field cannot be edited</small>
              </div>
              
            
            
            </div>

            <div class="row m-2">
              <div class="col-md-6 mb-2">
                <label for="" class="form-label">Document Name</label>
                <input
                  type="text"
                  class="form-control border-secondary border-1"
                  name="documentID"
                  id=""
                  aria-describedby="helpId"
                  placeholder=""
                />
                <small id="helpId" class="form-text text-muted"></small>
              </div>

              <div class="col-md-6 mb-2">
                <label for="" class="form-label">Document Authors</label>
                <input
                  type="text"
                  class="form-control border-secondary border-1"
                  name="documentID"
                  id=""
                  aria-describedby="helpId"
                  placeholder=""
                />
                <small id="helpId" class="form-text text-muted">Help text</small>
              </div>
            </div>

            <div class="row m-2">
            <div class="col-md-6 mb-2 ">
              <label for="" class="form-label">Submitted To</label>
              <button type="button" class="btn form-control" data-bs-toggle="modal" data-bs-target="#myModal" style="border: 2px solid #FF6F00; color:#FF6F00">
                SELECT A PERSONNEL
              </button>

                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">List of Personnel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="form-check" id="personnel">

                        <?php
                            $query = "SELECT * FROM faculty_info";
                            $queryrun = mysqli_query($conn,$query);

                            if(mysqli_num_rows($queryrun)>0){
                              while($fclty = mysqli_fetch_array($queryrun)){
                                echo ' <label><input type="radio" name="submittedTo" id="submittedTo" value="' . $fclty['facultyID'] . '"><span>   <img src="temp/' .$fclty['Fprofile_image'].'"style="height:40px;width:40px;border-radius: 50%">&nbsp' .$fclty['facultyFname'] . ' ' . $fclty['facultyMname']. ' '. $fclty['facultyLname'] . '</span></label>';

                              }
                            }
                            else{
                              echo "An error occurred";
                            }
                        
                        ?>
                        </div>
                        </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save-options">Save Options</button>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                <div class="col-md-6 mb-2 ">
                <label for="" class="form-label"></label>
                <div class="fw-bolder" id="chosen-options" style="display:hidden;">
                  </div>
                </div>
             
            </div>

            <div class="row m-2">
              <div class="col-md-12 mb-2">
              <label for="" class="form-label">Document Status</label>
              <p id="id_work_days">
                <label><input type="radio" name="work_days" value="1" checked><span>CREATED</span></label>
                <label><input type="radio" name="work_days" value="2"><span>SUBMITTED</span></label>
                <label><input type="radio" name="work_days" value="3"><span>ON-HAND</span></label>
                <label><input type="radio" name="work_days" value="4"><span>REVIEW</span></label>
                <label><input type="radio" name="work_days" value="5"><span>FOR PICK-UP</span></label>
                <label><input type="radio" name="work_days" value="6"><span>RETURNED</span></label>
               
              </p>
              </div>
            </div>

            <div class="row m-2 form-floating">
             <textarea class="form-control" name="remarks" placeholder="Leave a comment here" id="floatingTextarea">HAHAHAHAH</textarea>
               <label for="floatingTextarea">Remarks</label>
            </div>

          
          </div>    
        </div>

        
          <div class="card-footer">
            <div class="row m-2">
          <div class="col-md-12 text-center">
            <button class="btn m-2 w-75 fw-bolder" style="background-color:#ec6d18;color:white">UPDATE</button>
            </form>
          </div>
          </div>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>

<script>
  // Inside the #save-options button's click handler
  $('#save-options').click(function() {
  const selectedRadio = document.querySelector('#personnel input[name="submittedTo"]:checked');
  const selectedValue = selectedRadio.value;
  const selectedText = selectedRadio.nextElementSibling.textContent.trim();
  const imagePath = selectedRadio.nextElementSibling.querySelector('img').src;

  const chosenOptions = document.getElementById('chosen-options');
  chosenOptions.textContent = ''; // Clear previous content

  const chosenImage = document.createElement('img');
  chosenImage.src = imagePath;
  chosenImage.classList.add('chosen-image');
  chosenOptions.appendChild(chosenImage);

  const chosenText = document.createElement('span');
  chosenText.textContent = selectedText;
  chosenText.classList.add('chosen-text');
  chosenOptions.appendChild(chosenText);

  chosenOptions.style.display = 'block';
  $('#myModal').modal('hide');
  $('#chosen-options').css({"border":"2px solid #FF6F00", "color":"#FF6F00", 
    "border-radius": "5px","padding-left":"5px"});
  $('#chosen-options').show();

  // Optionally store the selected value for later use
  // e.g., document.getElementById('hiddenInput').value = selectedValue;
});
</script>

    
  </body>
</html>
