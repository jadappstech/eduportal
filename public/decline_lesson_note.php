<?php
include_once('./inc/config.php');
session_start();

define('STATUS_ERROR', 500);
define('INVALID_INPUT', 'Invalid input');
define('INTERNAL_SERVER_ERROR', 'Internal server error');

function returnJson($status, $message, $httpCode) {
  $data = [
      "status" => $status,
      "message" => $message,
  ];
  header("HTTP/1.0 $httpCode $message");
  echo json_encode($data);
  die();
}

$sqlConnection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);// Check connection
if ($sqlConnection->connect_error) {
  $errorMessage = "Database connection failed: " . mysqli_connect_error();
  echo '<div class="error-message">' . $errorMessage . '</div>';
  die();
}

if (empty($_POST['id'])) {
  $errorMessage = "Missing 'id' parameter.";
} elseif (empty($_POST['rejection-comment'])) {
  $errorMessage = "Missing 'comment' parameter.";
} elseif (empty($_SESSION['id'])) {
  $errorMessage = "Session is not active.";
} 

if (empty($_POST['id']) || empty($_POST['rejection-comment']) || empty($_SESSION['id'])) {
    returnJson(STATUS_ERROR, $errorMessage, INVALID_INPUT, INTERNAL_SERVER_ERROR);
    die();
}


$id = $_POST['id'];
$comment = $_POST['rejection-comment'];
$reviewed_by = $_SESSION['id'];
$file = isset($_FILES['corrected-file']) ? $_FILES['corrected-file'] : null;

if($_FILES['corrected-file']['size'] > 2000000){
  echo "File exceeds 2MB";
  return false;
}

// Validate input
// Prepare and execute update query for the comment and reviewer
$query = "UPDATE lesson_notes SET comment = ?, reviewed_by = ?, approved = -1 WHERE id = ?";
$stmt = mysqli_prepare($sqlConnection, $query);
mysqli_stmt_bind_param($stmt, "ssi", $comment, $reviewed_by, $id);


// $debugQuery = sprintf(
//   "UPDATE lesson_notes SET comment = '%s', reviewed_by = '%s' WHERE id = %d",
//   mysqli_real_escape_string($sqlConnection, $comment),
//   mysqli_real_escape_string($sqlConnection, $reviewed_by),
//   $id
// );

// // Output the query for debugging
// echo $debugQuery;die();


if (mysqli_stmt_execute($stmt)) {
  // Update successful
  // echo basename($_FILES['corrected-file']["name"]); die();
  if (!empty($_FILES['corrected-file']["tmp_name"]) && $file['error'] === UPLOAD_ERR_OK) {
    // File provided and valid, process the file upload
    $timestamp = date('YmdHis');
    $filename = preg_replace("/[^a-zA-Z0-9.-]/", "_", $file['name']);
    $newFileName = $timestamp . "_" . $filename;
    $target = "./inc/lesson_notes/" . $newFileName;


    if (move_uploaded_file($file["tmp_name"], $target)) {
      // File uploaded successfully, now update the lesson_note column
      $fileQuery = "UPDATE lesson_notes SET lesson_note = ? WHERE id = ?";
      $fileStmt = mysqli_prepare($sqlConnection, $fileQuery);
      mysqli_stmt_bind_param($fileStmt, "si", $newFileName, $id);
      
      if (!mysqli_stmt_execute($fileStmt)) {
        // Error updating the file in the database
        returnJson(STATUS_ERROR, DATABASE_ERROR, INTERNAL_SERVER_ERROR);
      }
    } else {
      // Error uploading file
      returnJson(STATUS_ERROR, FILE_UPLOAD_ERROR, INTERNAL_SERVER_ERROR);
    }
  }

  // Redirect to lesson-notes.php after processing
  $_SESSION['toast-msg'] = 'Lesson Note Declined Successfully'; 
  header("Location: ./lesson-notes.php");
} else {
    // Error executing initial update query
    returnJson(STATUS_ERROR, DATABASE_ERROR, INTERNAL_SERVER_ERROR);
}

mysqli_close($sqlConnection);



?>