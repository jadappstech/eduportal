<?php
    include_once "./config.php";

    // die(var_dump($_POST));
    $id = $_GET['id'];
    // $form_teacher = $_GET['id'];
    // array(2) { ["grade"]=> string(8) "nursery1" ["form_teacher"]=> string(2) "30" }
    // INSERT INTO `school_portal`.`users` (`name`, `surname`) VALUES ('Aminu', 'jaden');
    // $query = "INSERT INTO users (`form_class`, `form_teacher`) VALUES('$grade', '$form_teacher')";
    $query = "UPDATE users SET form_class = '', form_teacher = '0' WHERE id = '$id' LIMIT 1";

    // var_dump($query);die;
    $result = mysqli_query($sqlConnection, $query);

    header("Location: ./../assign-form-teacher.php");

?>