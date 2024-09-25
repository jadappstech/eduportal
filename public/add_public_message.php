<?php
include_once('./inc/config.php');

$sqlConnection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);// Check connection
if ($sqlConnection->connect_error) {
 returnJson(STATUS_ERROR, SQL_CONNECTION_ERROR, INTERNAL_SERVER_ERROR);
 die();
}
// var_dump($_POST);die;
if(isset($_POST['public_message'])){

    $msg = $_POST['public_message'];
}else{
    $msg = null;
}
// $comm_query = "INSERT INTO communications WHERE message = '$msg'";
$comm_query = "INSERT INTO `communications` (`message`, `status`) VALUES ('$msg', '1')";
$result = mysqli_query($sqlConnection, $comm_query);
// var_dump($result);die;

header('Location: ./communications.php');
