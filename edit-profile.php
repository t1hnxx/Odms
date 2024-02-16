<style>
  .swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #ec6d18;
  font-size: 12px;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
} </style>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript">
	 function editSubmit(){
    $(document).ready(function(){
      var data = {
		studentFname: $("#studentFname").val(),
		studentMname: $("#studentMname").val(),
		studentLname: $("#studentLname").val(),
		NewstudentPassword: $("#NewstudentPassword").val(),
		retype_studentPassword: $("#retype_studentPassword").val(),

    facultyFname: $("#facultyFname").val(),
		facultyMname: $("#facultyMname").val(),
		facultyLname: $("#facultyLname").val(),
		NewfacultyPassword: $("#NewfacultyPassword").val(),
		retype_facultyPassword: $("#retype_facultyPassword").val(),
		action: $("#action").val(),
      };

      $.ajax({
        url: 'class/edit_connect.php',
        type: 'POST',
        data: data,
        success:function(response){
          if(response == "Account successfully updated!"){
            swal({
              title: "NOTE",

              button: "Continue",
          }).then(function() {
              window.location = "profile.php";
          });
          }
          else if(response == "Password Mismatch"){
            swal({
              title: "NOTE",
              text: response,

              button: "Try Again",
          });
          }
          else {
            swal({
              title: "NOTE",
              text: response,
              button: "Continue",
          }).then(function() {
              window.location = "profile.php";
          });
          }
        }
      });
      });
    };

	</script>



