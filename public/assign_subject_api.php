<?php
session_start();
include_once('./inc/config.php');
$courses = array_keys($_POST);
// print_r($courses);

$array_courses = array_values($courses);
// var_dump($array_courses);

$ext_courses_array = [];
for($i = 0; $i < count($array_courses); $i++){
    // echo $array_courses[$i]."\n";
    $the_course = explode('__', $array_courses[$i]);
    array_push($ext_courses_array, $the_course);

}
$class_to_course = [];
// print_r($class_to_course);
for($i = 0; $i < count($ext_courses_array); $i++){
    // print_r($ext_courses_array[$i]);
    // $class_to_course = [$ext_courses_array[$i][1] => $ext_courses_array[$i][0],];
    array_push($class_to_course, [$ext_courses_array[$i][1] => $ext_courses_array[$i][0]]);
}
// print_r($class_to_course);
$result = [];
foreach ($class_to_course as $item) {
  foreach ($item as $key => $value) {
    $result[$key][] = $value;
  }
}
$result = json_encode($result);

// var_dump($result);die;

// var_dump("======\n");
// var_dump($result['basic6']);
// var_dump($_SESSION);
$assign_course_to = $_SESSION['assign_class_to'];
//save the information to the db
$query = "UPDATE users SET toteach = '$result' WHERE id = '$assign_course_to'";
$run_query = mysqli_query($sqlConnection, $query);
// var_dump($result);die;
if($run_query){
    $data = [
        'status' => 200,
        'message' => 'Profile updated successfully',
    ];
    // var_dump(typeof($data));die;
    header('HTTP/1.0 200 OK');
    echo json_encode($data);

    // return json_encode($data);
    // header("Location:  http://localhost/school_portal/public/profile.php?id=$assign_course_to");
}else{
    
    $data = [
        'status' => 500,
        'message' => 'Error saving data: ' . $sqlConnection->error
    ];
    header('HTTP/1.0 500 Internal Server Error');
    echo json_encode($data);
    // return json_encode($data);
    // header("Location: ./payments.php");

}
?>