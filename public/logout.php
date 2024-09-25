<?php

session_start();

if(isset($_SESSION['name'])){
    unset($_SESSION['name']);
}
if(isset($_SESSION['usertype'])){
    unset($_SESSION['usertype']);
}

session_destroy();

header("Location: index.php");

?>