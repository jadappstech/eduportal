<?php
header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include("functions.php");

$requestMethod = $_SERVER["REQUEST_METHOD"];

$id = $_SESSION['id'];

// var_dump($_SESSION);die;

if($requestMethod == 'POST')
{
    $inputData = json_decode(file_get_contents("php://input"));

    if(empty($inputData)){

        $upload_lesson_note = upload_lesson_note($_POST, $_FILES, $id);
        echo $upload_lesson_note;
        echo "<script>
        Swal.fire(
            {
                title: 'Good job!',
                text: 'You clicked the button!',
                type: 'success',
                confirmButtonClass: 'btn btn-confirm mt-2'
            }
        )
        </script>";
        echo"<script>Lesson note uploaded successfully!</script>";
        header("Location: ./../lesson-notes.php");
    }else{
        
        $upload_lesson_note = upload_lesson_note($inputData, $_FILES, $id);
        echo json_encode($upload_lesson_note);
        echo "<script>
        Swal.fire(
            {
                title: 'Good job!',
                text: 'You clicked the button!',
                type: 'success',
                confirmButtonClass: 'btn btn-confirm mt-2'
            }
        )
        </script>";
        echo"<script>Lesson note uploaded successfully!</script>";
        header("Location: ./../lesson-notes.php");
        // header("Location: ../welcome.php");
    }
}else{
    $data = [
        'status' => 405,
        'message' => $requestMethod . " Method Not Allowed",
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}

?>