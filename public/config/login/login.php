<?php

session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require __DIR__.'/classes/Database.php';
require __DIR__.'/classes/JwtHandler.php';

function msg($success,$status,$message,$extra = []){
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message' => $message
    ],$extra);
}

$db_connection = new Database();
$conn = $db_connection->dbConnection();

//read data using post
$data = $_POST;
$data = json_encode($data);
$data = json_decode($data);
//read data using input
// $data = json_decode(file_get_contents("php://input"));

$returnData = [];

// IF REQUEST METHOD IS NOT EQUAL TO POST
if($_SERVER["REQUEST_METHOD"] != "POST"):
    $returnData = msg(0,404,'Page Not Found!');

// CHECKING EMPTY FIELDS
elseif(!isset($data->name) 
    || !isset($data->password)
    || empty(trim($data->name))
    || empty(trim($data->password))
    ):

    $fields = ['fields' => ['name','password']];
    $returnData = msg(0,422,'Please Fill in all Required Fields!',$fields);

// IF THERE ARE NO EMPTY FIELDS THEN-
else:
    $name = trim($data->name);
    $password = trim($data->password);

    // CHECKING THE EMAIL FORMAT (IF INVALID FORMAT)
    // if(!filter_var($name, FILTER_VALIDATE_EMAIL)):
    if(!$name):
        $returnData = msg(0,422,'Invalid name...not found!');
    
    // IF PASSWORD IS LESS THAN 8 THE SHOW THE ERROR
    elseif(strlen($password) < 8):
        $returnData = msg(0,422,'Your password must be at least 8 characters long!');

    // THE USER IS ABLE TO PERFORM THE LOGIN ACTION
    else:
        try{
            
            // $fetch_user = "SELECT * FROM `users` WHERE `name`=:name";
            $fetch_user = "SELECT * FROM `users` WHERE `regnum`=:name AND active = 1";
            $query_stmt = $conn->prepare($fetch_user);
            $query_stmt->bindValue(':name', $name,PDO::PARAM_STR);
            $query_stmt->execute();

            // IF THE USER IS FOUND BY EMAIL
            if($query_stmt->rowCount()):
                $row = $query_stmt->fetch(PDO::FETCH_ASSOC);
                $check_password = password_verify($password, $row['password']);

                // VERIFYING THE PASSWORD (IS CORRECT OR NOT?)
                // IF PASSWORD IS CORRECT THEN SEND THE LOGIN TOKEN
                if($check_password):

                    $jwt = new JwtHandler();
                    $token = $jwt->jwtEncodeData(
                        'http://localhost/phpapi/',
                        array("user_id"=> $row['id'])
                    );
                    
                    // $returnData = [
                    //     'success' => 1,
                    //     'message' => 'You have successfully logged in.',
                    //     'token' => $token
                    // ];
                    $_SESSION["name"] = $row["name"];
                    $_SESSION["id"] = $row["id"];

                    header( "refresh:0.1;url=../../../public/welcome.php" );
                // IF INVALID PASSWORD
                else:
                    $returnData = msg(0,422,'Incorrect Password!');
                endif;

            // IF THE USER IS NOT FOUNDED BY EMAIL THEN SHOW THE FOLLOWING ERROR
            else:
                $returnData = msg(0,422,'User not found!');
            endif;
        }
        catch(PDOException $e){
            $returnData = msg(0,500,$e->getMessage());
        }

    endif;

endif;


echo json_encode($returnData);