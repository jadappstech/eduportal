<?php

header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include('functions.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];
// var_dump('here');die;
if($requestMethod == 'GET'){
    // $inputData = json_decode(file_get_contents("php://input"), true);
    // $config = include_once("./config.php");
    $obj_id = $_GET['id'];
    // $obj = $_GET['obj'];
    // if($obj == "class"){
    //     $del = 'students_classes';
    // }else{
    //     $del = 'subjects';
    // }
    $query = "DELETE FROM school_fees_items WHERE id = $obj_id LIMIT 1";
    $query = mysqli_query($sqlConnection, $query);
    // var_dump($sqlConnection);die;
    header("Location: ./../school-fees-items.php");
   
}else{
    $data = [
        'status' => 405,
        'message'=> $requestMethod . ' Method not allowed',
    ];
    header('HTTP/1.0 405 Method not allowed');
    echo json_encode($data);
}


?>