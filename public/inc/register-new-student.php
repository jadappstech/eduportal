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

        $registerNewStudent = registerNewStudent($_POST);
        echo $registerNewStudent;
        // var_dump("You have successfully registered a new student");
        // echo "
        // <script>setTimeout(function(){
        //     location.reload();
        // }, 5000); </script>
        // ";
        header("Location: register.php");
        // header("Location: http://www.schoolportal.geeeep.ng");
        
    }else{
        $registerNewStudent = registerNewStudent($inputData);
        echo json_encode($registerNewStudent);
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