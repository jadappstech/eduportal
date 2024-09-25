<?php
     session_start();
     include('./inc/config.php');
     // var_dump($_SESSION);
     // var_dump($_POST);die;
     $student_id = $_POST['student'];
     $subject = $_POST['subject'];
     $term = $_SESSION['term'];
     $class = $_SESSION['class'];
     $score = $_POST['score'];
     $ca = strtolower($_POST['ca']);
     $year = date('Y');
     // $year = '2023';
     // var_dump($ca);die;
     $query = "SELECT * FROM scores WHERE student_id = '$student_id' AND term = '$term'";
     // $subjects_array = array();
    $query = mysqli_query($sqlConnection, $query);
    
     $subjects_array[$subject] = $score;
     // $temp_arr = array_push($subjects_array);
     $students_score = json_encode($subjects_array);
     //total score
     //I want to create an array with all the subjects and the total scores
     $total_score = $students_score;
     // var_dump($total_score);die;
     
     //check if course exists in totalscore and then add it. otherwise, insert new element for that course
     // $present = "SELECT * FROM scores WHERE JSON_EXTRACT(first_test, '$.\"mathematics\"') = '14' AND student_id = $student_id";
//     die;

     //UPDATE scores SET first_test = JSON_ARRAY_INSERT(first_test, '$', 'new_value') WHERE student_id = 11;

     // var_dump($query);die;
     if($query->num_rows > 0){
          //echo "update";
          // var_dump($query[0]['first_test']);die;
          
          if($ca == 'first test'){
               $check = "SELECT first_test FROM scores WHERE student_id = $student_id AND term = '$term'";
               $check = mysqli_query($sqlConnection, $check);
     
               if($check->num_rows > 0){
                    $check = $check->fetch_all(MYSQLI_ASSOC);
               }
            
               $array = json_encode($check, true);
               $decoded_array = json_decode($check[0]['first_test'], true);
               // var_dump($decoded_array);die;
               $decoded_array[$subject] = $score;
               $updated_json = json_encode($decoded_array);
              
               $check[0]['first_test'] = $updated_json;
               $students_score = $check[0]['first_test'];
               // var_dump($check[0]['first_test']);//die;

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

               $new_query = "UPDATE scores SET first_test = '$students_score', total_score = '$total_score' WHERE student_id = $student_id AND term = '$term'";
          }elseif($ca == 'second test'){
               $check = "SELECT second_test FROM scores WHERE student_id = $student_id AND term = '$term'";
               $check = mysqli_query($sqlConnection, $check);
     
               if($check->num_rows > 0){
                    $check = $check->fetch_all(MYSQLI_ASSOC);
               }
               $array = json_encode($check, true);
               $decoded_array = json_decode($check[0]['second_test'], true);
               // var_dump($decoded_array);die;
               $decoded_array[$subject] = $score;
               $updated_json = json_encode($decoded_array);
              
               $check[0]['second_test'] = $updated_json;
               $students_score = $check[0]['second_test'];
               // var_dump($check[0]['second_test']);//die;
             


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








               $new_query = "UPDATE scores SET second_test = '$students_score' WHERE student_id = $student_id AND term = '$term'";
          }else{
               $check = "SELECT exam FROM scores WHERE student_id = $student_id AND term = '$term'";
               $check = mysqli_query($sqlConnection, $check);
     
               if($check->num_rows > 0){
                    $check = $check->fetch_all(MYSQLI_ASSOC);
               }
               // $new_query = "UPDATE scores SET exam = '$students_score' WHERE student_id = '$student_id' AND term = '$term'";
               $array = json_encode($check, true);
               $decoded_array = json_decode($check[0]['exam'], true);
               // var_dump($decoded_array);die;
               $decoded_array[$subject] = $score;
               $updated_json = json_encode($decoded_array);
              
               $check[0]['exam'] = $updated_json;
               $students_score = $check[0]['exam'];
               // var_dump($check[0]['exam']);//die;

               $new_query = "UPDATE scores SET exam = '$students_score' WHERE student_id = $student_id AND term = '$term'";
          }
          // $create_query = "INSERT INTO continuous_assessment (subject, student_id, term, exam, year) VALUES ('$subject', '$student_id', '$term', '$score', '$year')";
          // var_dump($subject);die;
          $new_query = mysqli_query($sqlConnection, $new_query);
          if($new_query){
               $data = [
                    'status' => 200,
                    'message' => 'Record updated successfully'
               ];
          }
          $previous_page = $_SERVER['HTTP_REFERER'];
          header("Location: $previous_page");
     }else{
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
          if($new_query){
               $data = [
                    'status' => 200,
                    'message' => 'Record Inserted successfully'
               ];
          }
          $previous_page = $_SERVER['HTTP_REFERER'];
          header("Location: $previous_page");
     }
    
?>