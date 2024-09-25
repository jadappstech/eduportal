<?php
    $config = include_once("./config.php");
    $obj_id = $_GET['id'];
    $obj = $_GET['obj'];
    if($obj == "class"){
        $del = 'students_classes';
    }else{
        $del = 'subjects';
    }
    $query = "DELETE FROM $del WHERE id = $obj_id LIMIT 1";
    $query = mysqli_query($sqlConnection, $query);
    // var_dump($sqlConnection);die;
    header("Location: ./../settings.php");

?>