<style>
  .swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #ec6d18;
  font-size: 12px;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
} </style>

<script src='node_modules/sweetalert/dist/sweetalert.min.js'> </script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>

<!-- ========== SUBMIT ========== -->
<script type="text/javascript">

$(document).ready(function() {
  $("#loginButton").click(function() {
    formSubmit(); // Trigger the form submission function on button click
  });

  $(document).keydown(function(event) {
    if (event.key === "Enter") {
      $("#loginButton").click(); // Simulate a click on the button when Enter is pressed
    }
  });

  function formSubmit(){
    $(document).ready(function(){
      var data = {
        facultyEmail: $("#facultyEmail").val(),
        facultyPassword: $("#facultyPassword").val(), 
        studentNum: $("#studentNum").val(),
        studentPassword: $("#studentPassword").val(),
        action: $("#action").val(),
      };

      $.ajax({
        url: 'class/login_connect.php',
        type: 'POST',
        data: data,
        success:function(response){
          if(response == "LOG IN SUCCESSFULLY"){
            swal({
              title: response,
              icon: "success",  
              button: "Continue",
          }).then(function() {
              window.location = "index.php";
          });
          }
          else {
            swal({
              title: "Log in Failed",
              text: response,
              icon: "error",  
              button: "Try Again",
          });
          }
        }
      });
      });
    };
  });
</script>