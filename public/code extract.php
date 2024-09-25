code extract

//check if course exists in totalscore and then add it. otherwise, insert new element for that course
    
$check_total = "SELECT total_score FROM scores WHERE student_id = $student_id AND term = '$term'";
    $check_total = mysqli_query($sqlConnection, $check_total);
    $check_total = $check_total->fetch_all(MYSQLI_ASSOC);
    if($check_total[0]['total_score'] == null){
        //add array to db
        $total_query = "UPDATE scores SET total_score = '$total_score' WHERE student_id = $student_id AND term = '$term'";
    }else{
    // echo "Sth";
    //check if the course already exists in the array
    //if yes, update score
    //if no, create new element
    //this adds the total score
    $present = "SELECT total_score FROM scores WHERE JSON_EXTRACT(total_score, '$.\"$subject\"') AND student_id = $student_id";
    $present = mysqli_query($sqlConnection, $present);
    if ($present->num_rows > 0) {
        //add new element to already existent array 
        // foreach ($present as $row) {
        //     var_dump($row);
        // }
        $update_total_score = "UPDATE scores SET total_score = JSON_SET(total_score, '$.\"$subject\"', '$score') WHERE id = $student_id";
    
    } else {
        // var_dump($total_score);die;
        $add_total = "INSERT INTO scores (total_score) VALUES ($total_score) WHERE id = $student_id";
        $add_total = mysqli_query($sqlConnection, $add_total);

        if($add_total){
                $data = [
                    'status' => 200,
                    'message' => 'Record Inserted successfully'
                ];
        }else{
                $data = [
                    'status' => 500,
                    'message' => 'An error occured'
                ];
        }
        return $data;
    }
    
    //this adds the total score
    }
    die;

