<?php
 require_once './config.php';

$sqlConnection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);// Check connection
if ($sqlConnection->connect_error) {
  returnJson(STATUS_ERROR, SQL_CONNECTION_ERROR, INTERNAL_SERVER_ERROR);
  die();
}

$id = $_GET['id'];
if(isset($id)){


    $query_lesson_note = "UPDATE school_fees_receipts SET status = '-1'  WHERE id = '$id' LIMIT 1";
    $lesson_note = mysqli_query($sqlConnection, $query_lesson_note);
   
    header("Location: ./../payments.php");
}

?>