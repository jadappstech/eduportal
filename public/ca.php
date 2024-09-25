<?php
    session_start();
    include('./inc/config.php');
    
    $student_id = $_POST['student'];
    $subject = $_POST['subject'];
    $term = $_SESSION['term'];
    $class = $_SESSION['class'];
    $score = $_POST['score'];
    $ca = strtolower($_POST['ca']);
    $year = date('Y');
    $previous_page = $_SERVER['HTTP_REFERER'];
    // var_dump($previous_page);die;

    // brings out the information in the scores table 
    $query = "SELECT * FROM scores WHERE student_id = '$student_id' AND term = '$term'";
    $query = mysqli_query($sqlConnection, $query);

    // creates an array with the subject and score
    $subjects_array[$subject] = $score;
    // converts the array to a json object
    $students_score = json_encode($subjects_array);
    //creates an array with all the subjects and the total scores
    $total_score = $students_score;
    // if there are records in the scores table, do this
    if($query->num_rows > 0){
        if($ca == 'first test'){
        // if the record to be saved is for first test, check if the subject already exists for this person in this term
            $check = "SELECT first_test FROM scores WHERE student_id = $student_id AND term = '$term'";
            $check = mysqli_query($sqlConnection, $check);
            
            if($check->num_rows > 0){
                $check = $check->fetch_all(MYSQLI_ASSOC);
            }
            // convert the record to a multidimensional array
            $array = json_encode($check, true);

            $decoded_array = json_decode($check[0]['first_test'], true);
            $decoded_array[$subject] = $score;
            $updated_json = json_encode($decoded_array);
            
            $check[0]['first_test'] = $updated_json;
            $students_score = $check[0]['first_test'];
            
            $new_query = "UPDATE scores SET first_test = '$students_score' WHERE student_id = $student_id AND term = '$term'";
            
        }elseif($ca == 'second test'){
            $check = "SELECT second_test FROM scores WHERE student_id = $student_id AND term = '$term'";
            $check = mysqli_query($sqlConnection, $check);
    
            if($check->num_rows > 0){
                $check = $check->fetch_all(MYSQLI_ASSOC);
            }
            $array = json_encode($check, true);
            $decoded_array = json_decode($check[0]['second_test'], true);
            $decoded_array[$subject] = $score;
            $updated_json = json_encode($decoded_array);
            
            $check[0]['second_test'] = $updated_json;
            $students_score = $check[0]['second_test'];
            
            $new_query = "UPDATE scores SET second_test = '$students_score' WHERE student_id = $student_id AND term = '$term'";
        }else{
            $check = "SELECT exam FROM scores WHERE student_id = $student_id AND term = '$term'";
            $check = mysqli_query($sqlConnection, $check);
    
            if($check->num_rows > 0){
                $check = $check->fetch_all(MYSQLI_ASSOC);
            }
            $array = json_encode($check, true);
            $decoded_array = json_decode($check[0]['exam'], true);
            $decoded_array[$subject] = $score;
            $updated_json = json_encode($decoded_array);
            
            $check[0]['exam'] = $updated_json;
            $students_score = $check[0]['exam'];

            $new_query = "UPDATE scores SET exam = '$students_score' WHERE student_id = $student_id AND term = '$term'";
        }
            //add new element to already existent array 
        // $update_total_score = "UPDATE scores SET total_score = JSON_SET(total_score, '$.\"$subject\"', '$score') WHERE id = ".$student_id." AND term = '$term'";
        $new_query = mysqli_query($sqlConnection, $new_query);
        // if($new_query){
        //     $data = [
        //             'status' => 200,
        //             'message' => 'Record updated successfully'
        //     ];
        // }
        // $previous_page = $_SERVER['HTTP_REFERER'];
        // header("Location: $previous_page");
    }else{
        // if there is no record found in the table, insert record into the table
        //echo "insert";
        if($ca == 'first test'){
            $new_query = "INSERT INTO scores (student_id, term, first_test) VALUES ($student_id, '$term', '$students_score')";
        }elseif($ca == 'second test'){
            $new_query = "INSERT INTO scores (student_id, term, second_test) VALUES ($student_id, '$term', '$students_score')";
        }else{
            $new_query = "INSERT INTO scores (student_id, term, exam) VALUES ($student_id, '$term', '$students_score')";
        }
        // $create_query = "INSERT INTO continuous_assessment (subject, student_id, term, exam, year) VALUES ('$subject', '$student_id', '$term', '$score', '$year')";
        $new_query = mysqli_query($sqlConnection, $new_query);
        // var_dump($new_query);die;
        // if($new_query){
        //     $data = [
        //         'status' => 200,
        //         'message' => 'Record Inserted successfully'
        //     ];
        // }
        // $previous_page = $_SERVER['HTTP_REFERER'];
        // header("Location: $previous_page");
    }
    // add code for totalscore here
    //this gets the total score for the first, second tests, & exam starts here
    $the_first_test = "SELECT first_test FROM scores WHERE JSON_EXTRACT(first_test, '$.\"$subject\"') AND student_id = $student_id AND term = '$term'";
    $the_first_test = mysqli_query($sqlConnection, $the_first_test);
    if($the_first_test->num_rows > 0){
        $the_first_test = $the_first_test->fetch_all(MYSQLI_ASSOC);
            //convert it to a useable form
        $the_first_test_array = json_decode($the_first_test[0]['first_test'], true);
        //fetch out the particular subject
        $the_first_test_score = (int)$the_first_test_array[$subject];
    }else{
        $the_first_test_score = 0;
    }
    $the_second_test = "SELECT second_test FROM scores WHERE JSON_EXTRACT(second_test, '$.\"$subject\"') AND student_id = $student_id AND term = '$term'";
    $the_second_test = mysqli_query($sqlConnection, $the_second_test);
    if($the_second_test->num_rows > 0){
        $the_second_test = $the_second_test->fetch_all(MYSQLI_ASSOC);
            //convert it to a useable form
        $the_second_test_array = json_decode($the_second_test[0]['second_test'], true);
        //fetch out the particular subject
        $the_second_test_score = (int)$the_second_test_array[$subject];
    }else{
        $the_second_test_score = 0;
    }
    $the_exam = "SELECT exam FROM scores WHERE JSON_EXTRACT(exam, '$.\"$subject\"') AND student_id = $student_id AND term = '$term'";
    $the_exam = mysqli_query($sqlConnection, $the_exam);
    if($the_exam->num_rows > 0){
        $the_exam = $the_exam->fetch_all(MYSQLI_ASSOC);
            //convert it to a useable form
        $the_exam_array = json_decode($the_exam[0]['exam'], true);
        //fetch out the particular subject
        $the_exam_score = (int)$the_exam_array[$subject];
    }else{
        $the_exam_score = 0;
    }
    $total_subject_score = $the_first_test_score + $the_second_test_score + $the_exam_score;
    // var_dump($the_exam_score);die;
    //this gets the total score for the first, second tests, & exam ends here

    //first check if the record exists in the totalscore column
    // $present = "SELECT total_score FROM scores WHERE JSON_EXTRACT(total_score, '$.\"$subject\"') AND student_id = $student_id";
    //first check if any record exists in the totalscore column
    $present = "SELECT total_score FROM scores WHERE student_id = $student_id AND term = '$term'";
    $present = mysqli_query($sqlConnection, $present);
    if ($present->num_rows > 0) {
        // find the sum of that course from first and second test and exam if they exist
        //select the course from the first test, second test and exam
        // $the_first_test = "SELECT first_test FROM scores WHERE JSON_EXTRACT(first_test, '$.\"$subject\"') AND student_id = $student_id AND term = '$term'";
        // $the_first_test = "SELECT first_test FROM scores WHERE JSON_EXTRACT(first_test, '$.\"$subject\"') AND student_id = $student_id AND term = '$term'";
        // $the_first_test = mysqli_query($sqlConnection, $the_first_test);
        // if($the_first_test->num_rows > 0){
        //     $the_first_test = $the_first_test->fetch_all(MYSQLI_ASSOC);
        //         //convert it to a useable form
        //     $the_first_test_array = json_decode($the_first_test[0]['first_test'], true);
        //     //fetch out the particular subject
        //     $the_first_test_score = (int)$the_first_test_array[$subject];
        // }else{
        //     $the_first_test_score = 0;
        // }
        $present = $present->fetch_all(MYSQLI_ASSOC);
        $existing_array = json_decode($present[0]['total_score'], true);
        $existing_array[$subject] = $total_subject_score;
        // Encode the updated array
        $total_subject_score_array = json_encode($existing_array);
        //find the sum total of all the scores and the average to save also
        // var_dump($existing_array);die;
        $totals = 0;
        $num_of_courses = count($existing_array);
        $avg = 0;
        foreach($existing_array as $key => $value){
            $totals += $value;
        }
        $avg = $totals/$num_of_courses;
        // var_dump($avg);
        // var_dump($totals);
        // var_dump($num_of_courses); die;
        // Update the database with the new array
        $query = "UPDATE scores SET total_score = '$total_subject_score_array', total = '$totals', average = '$avg' WHERE student_id = $student_id AND term = '$term'";
        // var_dump($total_subject_score_array);die;
        $result = mysqli_query($sqlConnection, $query);
        if($result){
            $data = [
                'status' => 200,
                'message' => 'Record Inserted successfully!'
            ];
        }else{
            $data = [
                'status' => 500,
                'message' => 'An Error occured while updating record!'
            ];
        }
        // return $data;
        header("Location: $previous_page");

        // var_dump($the_first_test_score);die;
        //sum up all the scores
    } else {
        //do this if the subject doesn't exist in column
               
        $subject = mysqli_real_escape_string($sqlConnection, $subject);
        $total_subject_score_array = [$subject => $total_subject_score];
        // var_dump($total_subject_score_array);die;
        $total_subject_score_array = json_encode($total_subject_score_array);
        $query = "UPDATE scores SET total_score = '$total_subject_score_array' WHERE student_id = $student_id AND term = '$term'";
        $result = mysqli_query($sqlConnection, $query);
        if($result){
            $data = [
                'status' => 200,
                'message' => 'Record Inserted successfully!'
            ];
        }else{
            $data = [
                'status' => 500,
                'message' => 'An Error occured while updating record!'
            ];
        }
        // return $data;
        header("Location: $previous_page");

    }

    //this gets the total score for the first test ends here
    
?>