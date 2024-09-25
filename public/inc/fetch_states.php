<?php

require_once("config.php");

$query = "SELECT * FROM states";
$result = mysqli_query($sqlConnection, $query);

if($result->num_rows > 0){
    $states = $result->fetch_all(MYSQLI_ASSOC);
}
// var_dump(json_encode($states));die;
return json_encode($states);