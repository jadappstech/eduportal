<?php

include_once('./inc/config.php');


$sqlConnection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);// Check connection
if ($sqlConnection->connect_error) {
 returnJson(STATUS_ERROR, SQL_CONNECTION_ERROR, INTERNAL_SERVER_ERROR);
 die();
}


if(isset($_POST['submitjss1'])){
    // var_dump(1);die;
    $query = "UPDATE school_fees_details SET
    bank_name = '{$_POST['jss1bank_name']}',
    acct_num = '{$_POST['jss1acct_num']}',
    acct_name = '{$_POST['jss1acct_name']}',
    amount = '{$_POST['jss1amount']}'
    WHERE grade = 'jss1' LIMIT 1";

}elseif(isset($_POST['submitjss2'])){
    // var_dump(2);die;
    $query = "UPDATE school_fees_details SET
    bank_name = '{$_POST['jss2bank_name']}',
    acct_num = '{$_POST['jss2acct_num']}',
    acct_name = '{$_POST['jss2acct_name']}',
    amount = '{$_POST['jss2amount']}'
    WHERE grade = 'jss2' LIMIT 1";
}elseif(isset($_POST['submitjss3'])){
    // var_dump($_POST['jss3amount']);die;
    $query = "UPDATE school_fees_details SET
    bank_name = '{$_POST['jss3bank_name']}',
    acct_num = '{$_POST['jss3acct_num']}',
    acct_name = '{$_POST['jss3acct_name']}',
    amount = '{$_POST['jss3amount']}'
    WHERE grade = 'jss3' LIMIT 1";
    // $query = "UPDATE school_fees_details SET bank_name = '{$_POST['jss3bank_name']}', acct_num = {'$_POST'[jss3acct_num']}', acct_name = '{$_POST['jss3acct_name'}]' WHERE grade = 'jss3' LIMIT 1";
}elseif(isset($_POST['submitsss2'])){
    // var_dump(4);die;
    $query = "UPDATE school_fees_details SET
    bank_name = '{$_POST['sss1bank_name']}',
    acct_num = '{$_POST['sss1acct_num']}',
    acct_name = '{$_POST['sss1acct_name']}',
    amount = '{$_POST['sss1amount']}'
    WHERE grade = 'sss1' LIMIT 1";
    // $query = "UPDATE school_fees_details SET bank_name = '$sss1bank_name', acct_num = '$sss1acct_num', acct_name = '$sss1acct_name' WHERE grade = 'sss1' LIMIT 1";
}elseif(isset($_POST['submitsss2'])){
    // var_dump(5);die;
    $query = "UPDATE school_fees_details SET
    bank_name = '{$_POST['sss2bank_name']}',
    acct_num = '{$_POST['sss2acct_num']}',
    acct_name = '{$_POST['sss2acct_name']}',
    amount = '{$_POST['sss2amount']}'
    WHERE grade = 'sss2' LIMIT 1";
    // $query = "UPDATE school_fees_details SET bank_name = '$sss2bank_name', acct_num = '$sss2acct_num', acct_name = '$sss2acct_name' WHERE grade = 'sss2' LIMIT 1";
}else{
    // var_dump('random');die;
    $query = "UPDATE school_fees_details SET
    bank_name = '{$_POST['sss3bank_name']}',
    acct_num = '{$_POST['sss3acct_num']}',
    acct_name = '{$_POST['sss3acct_name']}',
    amount = '{$_POST['sss3amount']}'
    WHERE grade = 'sss3' LIMIT 1";
    // $query = "UPDATE school_fees_details SET bank_name = '$sss3bank_name', acct_num = '$sss3acct_num', acct_name = '$sss3acct_name' WHERE grade = 'sss3' LIMIT 1";
}



$run_query = mysqli_query($sqlConnection, $query);
// $result = $run_query->fetch_all(MYSQLI_ASSOC);

// var_dump($run_query);die;

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