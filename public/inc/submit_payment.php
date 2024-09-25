<?php
header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include("functions.php");

$requestMethod = $_SERVER["REQUEST_METHOD"];

$id = $_SESSION['id'];

// var_dump($_SESSION);die;

if($requestMethod == 'POST')
{
    $inputData = json_decode(file_get_contents("php://input"));

    if(empty($inputData)){

        $upload_payment_receipt = upload_payment_receipt($_POST, $_FILES, $id);
        echo $upload_payment_receipt;
        echo"<script>Payment receipt uploaded successfully!</script>";
        header("Location: ./../payments.php");
    }else{
        
        $upload_payment_receipt = upload_payment_receipt($inputData, $_FILES, $id);
        echo json_encode($upload_payment_receipt);
        echo"<script>Payment receipt uploaded successfully!</script>";
        header("Location: ./../payments.php");
        // header("Location: ../welcome.php");
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