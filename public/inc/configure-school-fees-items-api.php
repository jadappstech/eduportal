<?php

header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include('functions.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == 'POST'){
    $inputData = json_decode(file_get_contents("php://input"), true);
       
    $student_name =  mysqli_real_escape_string($sqlConnection, $inputData['student_name']);
    $school_fees_amount =  mysqli_real_escape_string($sqlConnection, $inputData['school_fees_amount']);
    $discount =  mysqli_real_escape_string($sqlConnection, $inputData['discount']);
    $total =  mysqli_real_escape_string($sqlConnection, $inputData['totalText']);
    $term =  mysqli_real_escape_string($sqlConnection, $inputData['term']);
    $class =  mysqli_real_escape_string($sqlConnection, $inputData['getclass']);
    $school_fees_item = $inputData['school_fees_item'];
    $school_fees_item = json_encode($school_fees_item);
    $uploaded_by = $_SESSION['id'];
    
    var_dump($term);die;
    
    $query = "INSERT INTO schoolfees (`student`, `schoolfees`, `school_fees_items`, `discount`, `total`, `uploaded_by`) VALUES ('$student_name', '$school_fees_amount', '$school_fees_item', '$discount', '$total', '$uploaded_by')";
    $result = mysqli_query($sqlConnection, $query);
    if($result){
        $data = [
            'status' => 200,
            'message' => 'School fees configured successfully',
        ];
        // header('HTTP/1.0 200 OK');
        // return json_encode($data);
        http_response_code(200);
        echo json_encode($data);      
    }else{
        
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        http_response_code(500);
        echo json_encode($data);
    }

}else{
    $data = [
        'status' => 405,
        'message'=> $requestMethod . ' Method not allowed',
    ];
    header('HTTP/1.0 405 Method not allowed');
    echo json_encode($data);
}


?>