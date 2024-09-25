<?php

include './inc/config.php';
// $text = $_REQUEST;
// var_dump($text);die;
$id = $_REQUEST['student'];
$status = $_REQUEST['status'];
function updateSchoolFeesStatus($student_id, $status){

    global $sqlConnection;
    $query = "UPDATE `users` SET `school_fees` = '$status' WHERE (`id` = '$student_id')";

    $result = mysqli_query($sqlConnection, $query);
    
    if($result){
        $data = [
            'status'=>200,
            'message'=>'School fees status updated',
            'data' => $result,
        ];
        // var_dump($data);die;

        // header('HTTP/1.0 School fees status updated');
        return json_encode($data);
    }else{
        
        $data = [
            'status'=>500,
            'message'=>'Interval Server error',
            'data' => $result,
        ];
        // header('HTTP/1.0 Interval Server error');
        return json_encode($data);
    }
    // return $data;
};


updateSchoolFeesStatus($id, $status);
