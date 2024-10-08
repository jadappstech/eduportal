<?php

header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

require_once('functions.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];
    
$id = $_SESSION['id'];

if($requestMethod == 'POST')
{
    if(isset($_POST['submit_subject'])){

        $inputData = json_decode(file_get_contents("php://input"));
        // var_dump($inputData);die;
    
        if(empty($inputData)){
            
            $upload_subject = upload_subject($_POST, $id);
            // echo $upload_subject;
            header("Location: ../settings.php");
            
        }else{
            
            $upload_subject = upload_subject($inputData, $id);
            echo json_encode($upload_subject);
        }
    }elseif(isset($_POST['submit_class'])){
        // var_dump($_POST);die;
        $inputData = json_decode(file_get_contents("php://input"));
        // var_dump($inputData);die;
    
        if(empty($inputData)){
            
            $upload_class = upload_class($_POST, $id);
            // echo $upload_class;
            header("Location: ../settings.php");
            
        }else{
            
            $upload_class = upload_class($inputData, $id);
            // echo json_encode($upload_class);
            header("Location: ../settings.php");
        }
    }elseif(isset($_POST['submit_arm'])){
        $inputData = json_decode(file_get_contents("php://input"));
        // var_dump($inputData);die;
    
        if(empty($inputData)){
            
            // var_dump('1');//die;
            // var_dump($_POST['class_id']);die;
            $upload_arm = upload_arm($_POST, $_POST['class_id']);
            // echo $upload_arm;
            header("Location: ../settings.php");
            
        }else{
            
            var_dump($inputData);die;
            $upload_arm = upload_arm($inputData, $_POST['class_id']);
        // var_dump('2');//die;
        header("Location: ../settings.php");
            // echo json_encode($upload_arm);
        }
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