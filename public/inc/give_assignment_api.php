<?php
session_start();

header("Content-Type: application/json");

include_once "config.php";

$id = (int)$_SESSION["id"];
// var_dump($_SESSION);die;
// Handle file upload
if ($_FILES["assignment_file"]["size"] > 0) {
  $target = "./assignments/" . basename($_FILES["assignment_file"]["name"]);
  $assignment_file = $_FILES['assignment_file']['name'];

  // Check file size
  if ($_FILES["assignment_file"]["size"] > 1500000) {
    echo json_encode(["status" => 400, "message" => "File exceeds 1.5MB"]);
    die();
  }

  // Move uploaded file to target location
  if (!move_uploaded_file($_FILES["assignment_file"]["tmp_name"], $target)) {
    echo json_encode(["status" => 500, "message" => "Error uploading file"]);
    die();
  }

  $teacher = $id;
  $class = $_SESSION['class'];
  $title = $_POST['title'];
  $subject = $_POST['subject'];

  // Update user photo in database
  $query = "INSERT INTO assignments (teacher, class, title, subject, file) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($sqlConnection, $query);
  mysqli_stmt_bind_param($stmt, "issss", $teacher, $class, $title, $subject, $assignment_file);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_affected_rows($stmt);

  if ($result) {
    echo json_encode(["status" => 200, "message" => "Assignment uploaded successfully"]);
  } else {
    echo json_encode(["status" => 500, "message" => "Internal Server Error"]);
  }
}
?>
