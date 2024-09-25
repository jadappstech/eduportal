<?php
    include_once "./config.php";

    // die(var_dump($_POST));
    $grade = $_POST['grade'];
    $form_teacher = $_POST['form_teacher'];
    // array(2) { ["grade"]=> string(8) "nursery1" ["form_teacher"]=> string(2) "30" }
    // INSERT INTO `school_portal`.`users` (`name`, `surname`) VALUES ('Aminu', 'jaden');
    // $query = "INSERT INTO users (`form_class`, `form_teacher`) VALUES('$grade', '$form_teacher')";
    $query = "UPDATE users SET form_class = '$grade', form_teacher = '1' WHERE id = '$form_teacher' LIMIT 1";

    $result = mysqli_query($sqlConnection, $query);

    // var_dump($result);die;
    header("Location: ./../assign-form-teacher.php");

?>