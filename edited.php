<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src='node_modules/sweetalert2/dist/sweetalert2.all.min.js'> </script>
<script>
function submitData(action) {	
  const selectedRadio = $('#personnel input[name="submittedTo"]:checked');
  const selectedValue = selectedRadio.val() || ""; // Assign an empty string if no radio is selected
  const selectedStatusValue = $('input[name="documentStatus"]:checked').val();
  // No need for the conditional check as we've already handled the empty case
  var data = {
    action: action,
    documentID: $('#documentID').val(),
    documentType: $('#documentType').val(),
    documentName: $('#documentName').val(),
    documentOwner: $('#documentOwner').val(),
	createdby:$('#createdby').val(),
    submittedTo: selectedValue, // Will be empty string if no radio is selected
    documentStatus: selectedStatusValue,
    remarks: $('#remarks').val(),
  };
  Swal.fire({
	title: 'Are you sure?',
	text: "You won't be able to revert this!",
	icon: 'question',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	confirmButtonText: 'Update'
	}).then((result) => {
		if (result.isConfirmed) {	
		
			$.ajax({
					url: 'class/edit-document.php', // Replace with your server-side script URL
					type: 'POST',
					data: data,
					success: function(response) {
						if(response.includes("The document was updated successfully!")){
  						// Trim any leading/trailing whitespace, including potential blank lines
						//var trimmedResponse = response.trim();
						//alert(response)
							Swal.fire({
								title:"Document Updated Successfully!",
								icon: "success",
								confirmButtonText: "Go to Documents"
							}).then(function() {
								window.location = "documentChoice.php";
							});}
						else{
							Swal.fire({
								title: "Error Updating the Document",
								text: response,
								icon: "error",
								confirmButtonText: "Try Again"
							});
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.error("AJAX error:", textStatus, errorThrown);
						Swal.fire({
						title: "Request Failed",
						text: "An error occurred while creating the document. Please try again.",
						icon: "error",
						confirmButtonText: "Close"
						});
					}
				});
			}
		})
	}
	

</script>

<script>
function deleteData(action) {
  const selectedRadio = $('#personnel input[name="submittedTo"]:checked');
  const selectedValue = selectedRadio.val() || ""; // Assign an empty string if no radio is selected
  const selectedStatusValue = $('input[name="documentStatus"]:checked').val();
  // No need for the conditional check as we've already handled the empty case
  var data = {
    action: action,
    documentID: $('#documentID').val(),
    documentType: $('#documentType').val(),
    documentName: $('#documentName').val(),
    documentOwner: $('#documentOwner').val(),
    submittedTo: selectedValue, // Will be empty string if no radio is selected
    documentStatus: selectedStatusValue,
    remarks: $('#remarks').val(),
	};			
	Swal.fire({
	title: 'Are you sure?',
	text: "You won't be able to revert this!",
	icon: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: 'class/edit-document.php', // Replace with your server-side script URL
				type: 'POST',
				data: data,
				success: function(response) {
					if(response.includes("Deleted Successfully")){
  						// Trim any leading/trailing whitespace, including potential blank lines
						//var trimmedResponse = response.trim();
						Swal.fire({
							position:"top-end",
							title: "Deleted Successfully",
							icon: "success",
							showConfirmButton: false,
  							timer: 1500
						}).then(function() {
							window.location = "documentChoice.php";
						});}
					else{
						Swal.fire({
							title: "Error Deleting Document",
							text: response,
							icon: "error",
							confirmButtonText: "Try Again"
						});
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.error("AJAX error:", textStatus, errorThrown);
					Swal.fire({
					title: "Request Failed",
					text: "An error occurred while creating the document. Please try again.",
					icon: "error",
					confirmButtonText: "Close"
					});
				}
			})
		};

	})
			}
</script>

<script>
function deleteCData(action) {
  const selectedRadio = $('#personnel input[name="submittedTo"]:checked');
  const selectedValue = selectedRadio.val() || ""; // Assign an empty string if no radio is selected
  const selectedStatusValue = $('input[name="documentStatus"]:checked').val();
  // No need for the conditional check as we've already handled the empty case
  var data = {
    action: action,
    documentID: $('#documentID').val(),
    documentType: $('#documentType').val(),
    documentName: $('#documentName').val(),
    documentOwner: $('#documentOwner').val(),
    submittedTo: selectedValue, // Will be empty string if no radio is selected
    documentStatus: selectedStatusValue,
    remarks: $('#remarks').val(),
	};			
	Swal.fire({
	title: 'Are you sure?',
	text: "You won't be able to revert this!",
	icon: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: 'class/edit-documentC.php', // Replace with your server-side script URL
				type: 'POST',
				data: data,
				success: function(response) {
					if(response.includes("Deleted Successfully")){
  						// Trim any leading/trailing whitespace, including potential blank lines
						//var trimmedResponse = response.trim();
						Swal.fire({
							position:"top-end",
							title: "Deleted Successfully",
							icon: "success",
							showConfirmButton: false,
  							timer: 1500
						}).then(function() {
							window.location = "documentChoice.php";
						});}
					else{
						Swal.fire({
							title: "Error Deleting Document",
							text: response,
							icon: "error",
							confirmButtonText: "Try Again"
						});
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.error("AJAX error:", textStatus, errorThrown);
					Swal.fire({
					title: "Request Failed",
					text: "An error occurred while creating the document. Please try again.",
					icon: "error",
					confirmButtonText: "Close"
					});
				}
			})
		};

	})
			}
</script>