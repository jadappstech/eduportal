<?php

header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include('functions.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == 'GET'){
   
    $query = "SELECT * FROM school_fees_items WHERE id =". $_GET['id'];
    $run_query = mysqli_query($sqlConnection, $query);
    if($run_query->num_rows < 1){
        $info = "no data yet";
    }else{
        $info = $run_query->fetch_all(MYSQLI_ASSOC);
    }
    $data = [
        'status' => 200,
        'data' => json_encode($info),
        'message'=> 'Successful',
    ];
    header('HTTP/1.0 200 Successful');
    echo json_encode($data);
}else{
    $data = [
        'status' => 405,
        'message'=> $requestMethod . ' Method not allowed',
    ];
    header('HTTP/1.0 405 Method not allowed');
    echo json_encode($data);
}


?>