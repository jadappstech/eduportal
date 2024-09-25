<?php

require('./inc/config.php');


// if(isset($_POST['send-reset-link'])){
    $query = "SELECT * FROM `users` WHERE regnum ='". $_POST['regnum']. "'";
    $result = mysqli_query($sqlConnection, $query);
    if($result){
        // var_dump(mysqli_num_rows($result));die;
        if(mysqli_num_rows($result)){
            // found email
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Africa/Lagos');
            $date = date("Y-m-d");
            $pwd = $_POST['password'];
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $query = "UPDATE `users` SET password = '$pwd' WHERE regnum = '".$_POST['regnum']."'";
            // var_dump($sqlConnection);die;
            if(mysqli_query($sqlConnection, $query)){
                echo "Password changed successfully!";
            }else{
                // var_dump(sendMail($_POST['email'], $reset_token));die;

                echo "Server down, try again later!";
            }
        }else{
            echo "Registration number not found";
        }
    }else{
        echo "Cannot run query";
    }
    header('Location: ./index.php');

// }