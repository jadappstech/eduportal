<?php
header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

require_once('functions.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

//CHECK FOR HOW TO ADD ID TO THE REQUEST ARRAY MANUALLY
//THE ID DOES NOT COME WITH THE REQUEST ARRAY. IT IS APPENDED ONLY TO GET IN THIS CASE
if(isset($_SESSION['edit_users_id'])){
    $id = $_SESSION['edit_users_id'];
}else{
    
    $id = $_SESSION['id'];
}

if($requestMethod == 'POST')
{
    
    $inputData = json_decode(file_get_contents("php://input"));
  
    if(empty($inputData)){
        
        $updateBio = updateBio($_POST, $id);
     // echo $updateBio;
        unset($_SESSION['edit_users_id']);
        $_SESSION['toEditUser'] = false;
        if($_SESSION['who'] == 'teacher'){
            header("Location: ../teacher-profile.php?id=$id");
        }elseif($_SESSION['who'] == 'student'){
            header("Location: ../student-profile.php?id=$id");
        }else{
            header("Location: ../welcome.php");
        }

    }else{
        
        $updateBio = updateBio($inputData, $id);
        var_dump($inputData, $id);die;
        $_SESSION['toEditUser'] = false;
        unset($_SESSION['edit_users_id']);
        echo json_encode($updateBio);
        if($_SESSION['who'] == 'teacher'){
            header("Location: ../teacher-profile.php?id=$id");
        }elseif($_SESSION['who'] == 'student'){
            header("Location: ../student-profile.php?id=$id");
        }else{
            header("Location: ../welcome.php");
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