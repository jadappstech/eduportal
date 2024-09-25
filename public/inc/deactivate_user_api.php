<?php

include_once('./config.php');

$user_id = (int) $_POST['username'];

if (!$user_id) {
    returnJson(STATUS_ERROR, INVALID_USER_ID, BAD_REQUEST);
    die();
}

$query = "UPDATE users SET active = 0 WHERE id = ?";
$stmt = mysqli_prepare($sqlConnection, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    header("Location: ./../deactivate_user.php");
    exit;
} else {
    returnJson(STATUS_ERROR, UPDATE_FAILED, INTERNAL_SERVER_ERROR);
    die();
}

mysqli_stmt_close($stmt);
mysqli_close($sqlConnection);
?>