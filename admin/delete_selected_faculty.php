<?php
// Include your database connection here
include 'db_connection.php';

if (isset($_POST['facultyIDs'])) {
  $facultyIDs = $_POST['facultyIDs'];
  $facultyIDs = implode(',', array_map('intval', $facultyIDs));

  $query = "DELETE FROM faculty_info WHERE facultyID IN ($facultyIDs)";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // Return a success message if the deletion is successful
    echo json_encode(['success' => true]);
  } else {
    // Return an error message if the deletion fails
    echo json_encode(['error' => 'Error deleting faculty records.']);
  }
} else {
  // Handle cases where the request is not valid
  echo json_encode(['error' => 'Invalid request.']);
}

// Close the database connection if needed
mysqli_close($conn);
?>
