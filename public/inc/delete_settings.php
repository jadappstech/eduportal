<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    // var_dump($_SESSION);die;
    $config = include_once("./config.php");
    $obj_id = $_GET['id'];
    $obj = $_GET['obj'];
    $delete = 1;
    $deleted_by = $_SESSION['id'];
    $current_date = date("Y-m-d");
    if($obj == "grade"){
        $del = 'student_classes';
        $arm_query = "UPDATE arms SET deleted = ?, deleted_by = ?, deleted_at = ? WHERE class = ?";
        $arm_stmt = $sqlConnection->prepare($arm_query);
        $arm_stmt->bind_param("iisi", $delete, $deleted_by, $current_date, $obj_id);
        $arm_stmt->execute();
    }elseif($obj == "subject"){
        $del = 'subjects';
    }elseif($obj == 'arm'){
        $del = 'arms';
    }
    // $query = mysqli_query($sqlConnection, $query);
 
    $query = "UPDATE $del SET deleted = ?, deleted_by = ?, deleted_at = ? WHERE id = ? LIMIT 1";
    $stmt = $sqlConnection->prepare($query);
    $stmt->bind_param("iisi", $delete, $deleted_by, $current_date, $obj_id);
    $stmt->execute();
    // var_dump($stmt->execute());die;
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    $stmt->close();    
    // var_dump($sqlConnection);die;
    header("Location: ./../settings.php");

?>