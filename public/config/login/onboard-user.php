<?php

session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require __DIR__ . '/classes/Database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();

function msg($success, $status, $message, $extra = [])
{
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message' => $message
    ], $extra);
}

// DATA FORM REQUEST
// $data = json_decode(file_get_contents("php://input"));

//using data from post
$post_data = json_encode($_POST);
$data = json_decode($post_data);
// var_dump($data);die;
$returnData = [];
// var_dump($data);die;
if ($_SERVER["REQUEST_METHOD"] != "POST") :

    $returnData = msg(0, 404, 'Page Not Found!');

elseif (
    !isset($data->name)
    || !isset($data->email)
    || !isset($data->password)
    || !isset($data->students_class)
    || empty(trim($data->name))
    || empty(trim($data->email))
    || empty(trim($data->password))
    || empty(trim($data->students_class))
) :

    $fields = ['fields' => ['name', 'email', 'password', 'students_class']];
    $returnData = msg(0, 422, 'Please Fill in all Required Fields!', $fields);

// IF THERE ARE NO EMPTY FIELDS THEN-
else :

    $name = trim($data->name);
    $name = strtolower($name);
    $surname = trim($data->surname);
    $regnum = $data->regid.$data->regnum;
    $regnum = trim($regnum);
    // var_dump($regnum);die;
    $email = trim($data->email);
    $password = trim($data->password);
    $students_class = trim($data->students_class);
    $usertype = "student";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
        $returnData = msg(0, 422, 'Invalid Email Address!');

    elseif (strlen($password) < 8) :
        $returnData = msg(0, 422, 'Your password must be at least 8 characters long!');

    elseif (strlen($name) < 3) :
        $returnData = msg(0, 422, 'Your name must be at least 3 characters long!');
        
        elseif (strlen($usertype) == 0 || strlen($usertype) > 7) :
            $returnData = msg(0, 422, 'Please select a usertype!');

    else :
        try {

            $check_email = "SELECT `email` FROM `users` WHERE `email`=:email";
            $check_email_stmt = $conn->prepare($check_email);
            $check_email_stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $check_email_stmt->execute();
           
            $check_regnum = "SELECT `regnum` FROM `users` WHERE `regnum`=:regnum";
            $check_regnum_stmt = $conn->prepare($check_regnum);
            $check_regnum_stmt->bindValue(':regnum', $regnum, PDO::PARAM_STR);
            $check_regnum_stmt->execute();

            if ($check_email_stmt->rowCount()) :
                $returnData = msg(0, 422, 'This E-mail already in use!');
            elseif ($check_regnum_stmt->rowCount()) :
                $returnData = msg(0, 422, 'A student with this registration number already exists!');

            else :
                $insert_query = "INSERT INTO `users`(`name`, `surname`, `email`, `regnum`, `password`, `students_class`, `usertype`) VALUES(:name,:surname,:email,:regnum,:password,:students_class,:usertype)";

                $insert_stmt = $conn->prepare($insert_query);

                // DATA BINDING
                $insert_stmt->bindValue(':name', htmlspecialchars(strip_tags($name)), PDO::PARAM_STR);
                $insert_stmt->bindValue(':surname', htmlspecialchars(strip_tags($surname)), PDO::PARAM_STR);
                $insert_stmt->bindValue(':regnum', htmlspecialchars(strip_tags($regnum)), PDO::PARAM_STR);
                $insert_stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $insert_stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
                $insert_stmt->bindValue(':students_class', htmlspecialchars(strip_tags($students_class)), PDO::PARAM_STR);
                $insert_stmt->bindValue(':usertype', htmlspecialchars(strip_tags($usertype)), PDO::PARAM_STR);

                $insert_stmt->execute();

                if(isset($_SESSION)){
                    header( "refresh:0.1;url=../../../public/onboarding.php" );
                    return;
                }else{
                    
                    // $_SESSION["name"] = $name;
                    header( "refresh:0.1;url=../../../public/welcome.php" );
                    $returnData = msg(1, 201, 'You have successfully registered.');
                }
                

            endif;
        } catch (PDOException $e) {
            $returnData = msg(0, 500, $e->getMessage());
        }
    endif;
endif;

echo json_encode($returnData);