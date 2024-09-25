<?php

header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

require_once('functions.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == 'POST')
{
    // $id = null;
    
    $inputData = json_decode(file_get_contents("php://input"));
    

    if(empty($inputData) || $inputData == null || !isset($inputData)){

        $joinUs = joinUs($_POST);
        echo $joinUs;
        $previous_page = $_SERVER['HTTP_REFERER'];
        header("Location: $previous_page");
        exit;
        
    }else{
        $joinUs = joinUs($inputData);
        echo json_encode($joinUs);
        $previous_page = $_SERVER['HTTP_REFERER'];
        header("Location: $previous_page");
        exit;
    }
}else{
    $data = [
        'status' => 405,
        'message' => $requestMethod . " Method Not Allowed",
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}

?>