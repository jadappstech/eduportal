<?php
include_once('./inc/config.php');
session_start();

$sqlConnection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);// Check connection
if ($sqlConnection->connect_error) {
  returnJson(STATUS_ERROR, SQL_CONNECTION_ERROR, INTERNAL_SERVER_ERROR);
  die();
}

$id = $_GET['id'];
$reviewed_by = $_SESSION['id'];
// echo $reviewed_by;die;

if(isset($id)){
  $query_lesson_note = "UPDATE lesson_notes SET approved = '1',  reviewed_by = '$reviewed_by'  WHERE id = '$id' LIMIT 1";
  $lesson_note = mysqli_query($sqlConnection, $query_lesson_note);

  $_SESSION['toast-msg'] = 'Lesson Note Accepted Successfully'; 
  header("Location: ./lesson-notes.php");
}

?>