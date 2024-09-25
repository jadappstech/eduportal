<?php
    // session_start();

    $usertype = $_SESSION['usertype'];

    if(!($usertype == "admin")){
        echo "Access denied!";

        header("Location: welcome.php");
    }
?>