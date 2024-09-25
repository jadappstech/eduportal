<?php
require_once './config.php';
$inputData = json_decode(file_get_contents("php://input"), true);
// array(7) { ["student"]=> array(3) { [0]=> string(2) "11" [1]=> string(2) "22" [2]=> string(2) "27" } ["term"]=> string(5) "first" ["compiled_by"]=> string(1) "7" ["position"]=> array(3) { [0]=> string(3) "235" [1]=> string(3) "283" [2]=> string(2) "12" } ["this_session"]=> string(9) "2023/2024" ["updated_by"]=> string(18) "2024-7-29 12:44:25" ["student_class"]=> string(10) "prenursery" }

$student = $_POST['student'];
$position = $_POST['position'];
$term = mysqli_real_escape_string($sqlConnection,$_POST['term']);
$this_session =  mysqli_real_escape_string($sqlConnection,$_POST['this_session']);
$updated =  mysqli_real_escape_string($sqlConnection,$_POST['updated']);
$student_class =  mysqli_real_escape_string($sqlConnection,$_POST['student_class']);
$compiled_by =  mysqli_real_escape_string($sqlConnection,$_POST['compiled_by']);
// var_dump($student);die;

// $modality = mysqli_real_escape_string($sqlConnection, $inputData['update_modality']);
for($i = 0; $i < count($student); $i++){
    $query = "SELECT * FROM student_positions WHERE student = '$student[$i]' AND session = '$this_session' AND term = '$term'";
    $query = mysqli_query($sqlConnection, $query);
    $query_result = $query->fetch_all(MYSQLI_ASSOC);
    // var_dump($query);die;
    if($query_result){
        $query = "UPDATE student_positions SET
        `position` = '$position[$i]', `updated` = '$updated', `compiled_by` = '$compiled_by' WHERE student = '$student[$i]' AND term = '$term' AND session = '$this_session' LIMIT 1";
        $result = mysqli_query($sqlConnection, $query);
        }else{
        $query = "INSERT INTO student_positions (`student`, `term`, `session`,`updated`, `compiled_by`, `position`) VALUES ('$student[$i]', '$term', '$this_session', '$updated', '$compiled_by', '$position[$i]')";
        $result = mysqli_query($sqlConnection, $query);
    }
    // $result = $result->fetch_all(MYSQLI_ASSOC);
}

// var_dump($query);die;
if($result){
    
    $data = [
        'status' => 200,
        'message' => 'Position updated successfully',
    ];
    header('HTTP/1.0 200 OK');
    return json_encode($data);
}else{
    
    $data = [
        'status' => 500,
        'message' => 'Internal Server Error'
    ];
    header('HTTP/1.0 500 Internal Server Error');
    return json_encode($data);
}
    
?>