<?php
session_start();
include_once('const.php');

$sqlConnection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
// Check connection for errors and exit if true
if ($sqlConnection->connect_error) {
    returnJson(STATUS_ERROR, SQL_CONNECTION_ERROR, INTERNAL_SERVER_ERROR);
    die();
}

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["edit_users_id"])) {
    $id = $_SESSION["edit_users_id"];
} else {
    $id = $_SESSION["id"];
}
// var_dump($id);die;
$id = (int) $id;
//adding the photo
// $target = "./images/" . basename($_FILES["photo"]["name"]);

// $photo = $_FILES['photo']['name'];

// var_dump($photo);die;
// Handle file upload
if ($_FILES["photo"]["size"] > 0) {
    $target = "./images/" . basename($_FILES["photo"]["name"]);
    $photo = $_FILES['photo']['name'];

    // Check file size
    if ($_FILES["photo"]["size"] > 3000000) {
        returnJson(STATUS_ERROR, "File exceeds 3MB", INTERNAL_SERVER_ERROR);
        die();
    }

    // Move uploaded file to target location
    if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $target)) {
        returnJson(STATUS_ERROR, "Error uploading file", INTERNAL_SERVER_ERROR);
        die();
    }

    // Update user photo in database
    $query = "UPDATE users SET photo = ? WHERE id = ? LIMIT 1";
    $stmt = mysqli_prepare($sqlConnection, $query);
    mysqli_stmt_bind_param($stmt, 'si', $photo, $id);
    $result = mysqli_stmt_execute($stmt);

    // Check if update was successful
    if ($result) {
        $data = [
            "status" => 200,
            "message" => "Profile updated successfully",
        ];
        header("HTTP/1.0 200 OK");
        // echo json_encode($data);
        
        // Return to previous page
        $previous_page = $_SERVER['HTTP_REFERER'];
        header("Location: $previous_page");
        exit;
    } else {
        $data = [
            "status" => 500,
            "message" => "Internal Server Error",
        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
}

// Function to return JSON response
function returnJson($status, $message, $httpCode) {
    $data = [
        "status" => $status,
        "message" => $message,
    ];
    header("HTTP/1.0 $httpCode $message");
    echo json_encode($data);
    die();
}

?>
