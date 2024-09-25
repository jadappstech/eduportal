<?php

header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include('functions.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];
// var_dump('here');die;
if($requestMethod == 'POST'){
    $inputData = json_decode(file_get_contents("php://input"), true);
    
    if(empty($inputData)){
        if(empty($_POST['id'])){
            return "The id is empty";
        }elseif($_POST['id'] == null){
            return "The id cannot be null";
        }
    
        $itemId = mysqli_real_escape_string($sqlConnection, $customerParams['itemId']);
        $itemId = (int)$itemId;
        $schoolfeesitem = mysqli_real_escape_string($sqlConnection, $_POST['update_schoolfeesitem']);
        $description = mysqli_real_escape_string($sqlConnection, $_POST['update_description']);
        $amount = mysqli_real_escape_string($sqlConnection, $_POST['update_amount']);
        $modality = mysqli_real_escape_string($sqlConnection, $_POST['update_modality']);
    
        if(empty(trim($schoolfeesitem))){
            return error422('Enter your school fees item');
        }elseif(empty(trim($description))){
            return error422('Enter your description');
        }elseif(empty(trim($amount))){
            return error422('Enter your amount');
        }elseif(empty(trim($modality))){
            return error422('Enter the modality');
        }else{
            $query = "UPDATE school_fees_items SET schoolfeesitem = '$schoolfeesitem', description = '$description', amount = '$amount', modality = '$modality' WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($sqlConnection, $query);
    
            if($result){
               
                $data = [
                    'status' => 200,
                    'message' => 'School fees item updated successfully',
                ];
                header('HTTP/1.0 200');
                echo json_encode($data);
            }else{
                
                $data = [
                    'status' => 500,
                    'message' => 'Internal Server Error'
                ];
                header('HTTP/1.0 500 Internal Server Error');
                echo json_encode($data);
            }
        }
    }else{
        // var_dump($inputData['schoolfeesitem']);die;
        // echo $inputData['name'];
        // $addSchoolFeesItems = addSchoolFeesItems($inputData);
        // var_dump($sqlConnection);die;
        if(empty($inputData['itemId'])){
            return "The id is empty";
        }elseif($inputData['itemId'] == null){
            return "The id cannot be null";
        }
    
        $itemId = mysqli_real_escape_string($sqlConnection, $inputData['itemId']);
        $itemId = (int)$itemId;
        $schoolfeesitem = mysqli_real_escape_string($sqlConnection, $inputData['update_schoolfeesitem']);
        $description = mysqli_real_escape_string($sqlConnection, $inputData['update_description']);
        $amount = mysqli_real_escape_string($sqlConnection, $inputData['update_amount']);
        $modality = mysqli_real_escape_string($sqlConnection, $inputData['update_modality']);
    
        if(empty(trim($schoolfeesitem))){
            return error422('Enter your school fees item');
        }elseif(empty(trim($description))){
            return error422('Enter your description');
        }elseif(empty(trim($amount))){
            return error422('Enter your amount');
        }elseif(empty(trim($modality))){
            return error422('Enter the modality');
        }else{
            $query = "UPDATE school_fees_items SET `schoolfeesitem` = '$schoolfeesitem', `description` = '$description', `amount` = '$amount', `modality` = '$modality' WHERE id = '$itemId' LIMIT 1";
            $result = mysqli_query($sqlConnection, $query);
            // var_dump($result);die;
            if($result){
               
                $data = [
                    'status' => 200,
                    'message' => 'School fees item updated successfully',
                ];
                header('HTTP/1.0 200 OK');
                echo json_encode($data);
            }else{
                
                $data = [
                    'status' => 500,
                    'message' => 'Internal Server Error'
                ];
                header('HTTP/1.0 500 Internal Server Error');
                echo json_encode($data);
            }
        }
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