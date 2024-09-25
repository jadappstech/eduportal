<?php
// var_dump($_POST);DIE;
include_once('./inc/config.php');

$sqlConnection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);// Check connection
if ($sqlConnection->connect_error) {
 returnJson(STATUS_ERROR, SQL_CONNECTION_ERROR, INTERNAL_SERVER_ERROR);
 die();
}

$check = "SELECT * FROM school_fees_details WHERE grade = '{$_POST['studentsclass']}'";
$run_check = mysqli_query($sqlConnection, $check);
// var_dump($run_check->field_count);die;
if(!$run_check->num_rows){
    $query = "INSERT INTO school_fees_details (`bank_name`, `acct_num`, `acct_name`, `grade`, `amount`) VALUES ('{$_POST['bank_name']}','{$_POST['acct_num']}','{$_POST['acct_name']}','{$_POST['studentsclass']}','{$_POST['amount']}')";
}else{
    $query = "UPDATE school_fees_details SET
    bank_name = '{$_POST['bank_name']}',
    acct_num = '{$_POST['acct_num']}',
    acct_name = '{$_POST['acct_name']}',
    grade = '{$_POST['studentsclass']}',
    amount = '{$_POST['amount']}'
    WHERE grade = '".$_POST['studentsclass']."' LIMIT 1";
}
  
// var_dump($query);die;
$run_query = mysqli_query($sqlConnection, $query);
// $result = $run_query->fetch_all(MYSQLI_ASSOC);

// var_dump($sqlConnection->error);die;

if($run_query){
    $data = [
        'status' => 200,
        'message' => 'School fees updated successfully',
    ];
    // var_dump(typeof($data));die;
    header('HTTP/1.0 School fees updated successfully');
    // echo json_encode($data);

    // return json_encode($data);
    header("Location: ./payments.php");
}else{
    
    $data = [
        'status' => 500,
        'message' => 'Internal Server Error'
    ];
    header('HTTP/1.0 500 Internal Server Error');
    // echo json_encode($data);
    // return json_encode($data);
    header("Location: ./payments.php");

}

?>