<?php
include_once('./inc/config.php');

    $sqlConnection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);// Check connection
    if ($sqlConnection->connect_error) {
        returnJson(STATUS_ERROR, SQL_CONNECTION_ERROR, INTERNAL_SERVER_ERROR);
        die();
    }
    $comm = include "inc_communications.php";

    $comm_query = "TRUNCATE `communications` ";
    // $comm_query = "DELETE * from `communications` SET `status` = '0' WHERE (`id` = '$comm[1]')";
    // $comm_query = "UPDATE communications WHERE status = '1' SET status = '0' ORDER BY 'id' DESC LIMIT 1";
    $result = mysqli_query($sqlConnection, $comm_query);
    // var_dump($result);die;
    header("Location: ./welcome.php");

?>