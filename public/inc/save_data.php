<?php
// var_dump($_POST);

// Connect to the database
$sqlConnection = mysqli_connect("localhost", "root", "Totalchild6471!", "school_portal");

// Check connection
if ($sqlConnection->connect_error) {
    returnJson(STATUS_ERROR, SQL_CONNECTION_ERROR, INTERNAL_SERVER_ERROR);
    die();
}

// Retrieve the form data
$data = json_decode(file_get_contents('php://input'), true);

// Escape the form data to prevent SQL injection
$myname = mysqli_real_escape_string($sqlConnection, $_POST['myname']);
$email = mysqli_real_escape_string($sqlConnection, $_POST['email']);
$phone_number = mysqli_real_escape_string($sqlConnection, $_POST['phone_number']);
$kids_num = mysqli_real_escape_string($sqlConnection, $_POST['kids_num']);
$kidsname = $_POST['kidsname'];
$kidsclass = $_POST['kidsclass'];

$kidsinfo = array_combine($kidsname, $kidsclass);
$kidsinfo = json_encode($kidsinfo);

// $kidsinfo2 = json_decode($kidsinfo, true);
// var_dump($kidsinfo2['one']);die;

// var_dump($kidsinfo['two']);
// var_dump($kidsinfo[$kidsname[2]]);

$query = "INSERT INTO potential_students (myname, email, phone_number, num_of_kids, kids_info) VALUES ('$myname', '$email', '$phone_number', '$kids_num', '$kidsinfo')";

$result = mysqli_query($sqlConnection, $query);

if ($result) {
	echo json_encode(
        ['message' => 'Data saved successfully',
        'status' => 'success'

]);
} else {
	echo json_encode(['message' => 'Error saving data: ' . $sqlConnection->error, 'status'=>'error']);
}


?>