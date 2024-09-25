<?php
                            
                               
    $course_query = "SELECT * FROM lesson_notes WHERE uploaded_by='{$_SESSION['id']}'";
    // $course_query = "SELECT * FROM lesson_notes";
    $run_course_query = mysqli_query($sqlConnection, $course_query);
    // var_dump($run_course_query);die;
    if($run_course_query -> num_rows <= 0){
        echo "<h4 class='text-center mt-3'>No lesson note has been approved yet</h4>";
        return;
    }elseif($run_course_query->num_rows > 0){
        $result = $run_course_query -> fetch_all(MYSQLI_ASSOC);
    }?>
    <div class="row mt-4">
        <?php
            $status = ['-1'=>'declined', '0'=>'pending', '1'=>'approved'];
            
            for ($i = 0; $i < sizeof($result); $i++){
                
                // var_dump($status[$result[$i]['approved']]);die;
        echo "
        <div class='col-md-2'>
            <div class='card'>
                <img class='card-img-top img-fluid' src='assets/images/media/sm-5.jpg' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title text-center {$status[$result[$i]['approved']]}'><span>{$result[$i]['grade']}</span> | <span>{$result[$i]['subject']}</span></h5>
                    <h5 class='card-title text-center {$status[$result[$i]['approved']]}'><span>{$status[$result[$i]['approved']]}</span></h5>
                </div>
            </div>
        </div>";
    }

?>