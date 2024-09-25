<?php
session_start();
include_once("./config.php");
// var_dump($_POST);
//stores the ids of every student in this class
$ids = array_keys($_POST);
// var_dump($_POST);die;

// Select all rows from the table
$sql = "SELECT * FROM student_classes";
$result = mysqli_query($sqlConnection, $sql);
// Create an array to store the data
$data = array();
// Fetch each row and add to the array
if($result){

    if(mysqli_num_rows($result) > 0){

        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
for($i = 0; $i < count($res); $i++){
   $data_item = $res[$i]['grade'];
   $data[] = $data_item;
};

$class_to = '';
for($j = 0; $j < count($data); $j++){
    if($data[$j] == $_SESSION['my_class']){
        $class_to = $data[$j + 1]; // assume $j is not the last index
        break; // exit the loop
    }
}
// var_dump($class_to); // output the final value

    // echo "$ids[$i],";
    for($i = 0; $i < sizeof($ids); $i++){
        
        $update_query = "UPDATE users SET students_class = '$class_to' WHERE id = '$ids[$i]'";
        $result = mysqli_query($sqlConnection, $update_query);
        // var_dump($class_to);//die;
        // var_dump($ids[$i]);//die;
    }
    // die;
    header("Location: ./../form_class.php");
// }
?>