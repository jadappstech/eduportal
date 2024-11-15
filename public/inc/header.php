<?php

    // error_reporting(0);
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        if(!isset($_SESSION['id'])){
            header("Location: ./index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php 
        require_once "./inc/config.php";
    ?>

    <head>
        <meta charset="utf-8" />
        <title>Beavers Preparatory School Portal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
    
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery.js"></script>
        <!-- <script src="inc/modals.js"></script> -->
        <style>
            *{
                text-transform: uppercase !important;
            }
        </style>
    </head>
    <?php
        $username = $_SESSION["name"];
        $usertype = $_SESSION["usertype"];    
        $id = $_SESSION["id"];    
        

        $comm = include "inc_communications.php";
        if($comm == null){
            $message = null;
        }

    ?>

   