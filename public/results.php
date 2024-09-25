<?php 
    include "./inc/header.php";
    include_once "./inc/config.php";
    // var_dump($_GET['terms']);die;

    $term = $_GET['term'];
    //here because of the navbar pic
    $query = "SELECT * FROM users";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the navbar pic
    if(isset($term)){
        $_SESSION['term'] = $term;
    }
    if(isset($_GET['class'])){
        $_SESSION['class'] = $_GET['class'];
    }
    $year = date('Y');
    // $year = '2023';
    // var_dump($id);die;
     // $query = "SELECT * FROM `continuous_assessment`";
     if(isset($_GET['id'])){
        $student_class_id = $_GET['id'];
    }else{
        $student_class_id = $_SESSION['id'];
     }
    //  var_dump($_SESSION);die;
   
    //get level of class
    // $level_query = "SELECT level FRON subjects WHERE "
    //get level of class
    $query = "SELECT * FROM `scores` WHERE term = '$term' AND student_id = '$id'";
    $run_query = mysqli_query($sqlConnection, $query);
    $result = $run_query->fetch_all(MYSQLI_ASSOC);
    // var_dump($result);die;
    if($usertype == 'teacher'){

        //get students class starts
        $student_class = "SELECT * FROM `student_classes` WHERE grade = '{$_GET['class']}' LIMIT 1";
        $squery = mysqli_query($sqlConnection, $student_class);
        $student_class_result = $squery->fetch_all(MYSQLI_ASSOC);
        $student_class_result = $student_class_result[0]['grade'];
        // var_dump($student_class_result);die;
        //get students class ends

         //this is to enable the app spool out the subjects in a particular level
        $student_class_level = "SELECT * FROM `student_classes` WHERE grade = '$student_class_result'";
        $student_class_level = mysqli_query($sqlConnection, $student_class_level);
        $student_class_level = $student_class_level->fetch_all(MYSQLI_ASSOC);
        // var_dump($student_class_level);die;
        $student_class_level = $student_class_level[0]['level'];
        //select class level ends

        //callout subjects for particular level starts here
        $subject = "SELECT * FROM `subjects` WHERE level = '$student_class_level'";
        $subject = mysqli_query($sqlConnection, $subject);
        $subject = $subject->fetch_all(MYSQLI_ASSOC);
        // var_dump($subject);die;
        // $subject = $subject[0]['level'];
        //callout subjects for particular level ends here
    }
    // $students_names = "SELECT * FROM `users` WHERE students_class = '$student_class_result'";
    if(isset($_GET['class'])){
        $the_class = $_GET['class'];
    }else{
        $the_class = $_SESSION['my_class'];
    }
    $students_names = "SELECT * FROM `users` WHERE students_class = '$the_class'";
    $student_query = "SELECT * FROM `users` WHERE usertype = 'student'";
    //select class level starts
   
    // $subject_query = "SELECT * FROM `users` WHERE usertype = 'student'";    
    $student_result = mysqli_query($sqlConnection, $student_query);
    $students_names = mysqli_query($sqlConnection, $students_names);

    // var_dump($student_class_level);die;
    
    $student = $student_result->fetch_all(MYSQLI_ASSOC);
    $students_names = $students_names->fetch_all(MYSQLI_ASSOC);
   
    // var_dump($student_class_level[0]['level']);die;
    //spool out my classes
    // include_once "./inc/config.php";
    $my_id = $_SESSION['id'];
    $my_query = "SELECT * FROM users WHERE id = '$my_id'";
    $run_query = mysqli_query($sqlConnection, $my_query);
    $my_classes = $run_query->fetch_all(MYSQLI_ASSOC);

      //is this a form teacher? starts here
    $form_teacher = mysqli_query($sqlConnection, "SELECT form_teacher FROM users WHERE id ='$my_id'");
    $form_teacher = $form_teacher->fetch_all(MYSQLI_ASSOC);
    $form_teacher = $form_teacher[0]['form_teacher'];
    // var_dump($form_teacher);die;
      //is this a form teacher? ends here

?>
<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

       <?php include "./inc/navbar.php"; ?>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <?php include "./inc/sidebar.php"; ?>    

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
               <?php include_once "communication_message.php"; ?>
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Continuous Assessment</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Continuous Assessment</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php if($usertype == 'student'){ ?>
                                <div class='col-xl-12 col-sm-12'>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <h4 class='card-title'>My Continuous Assessment</h4>
                                            <h6><?php echo ucfirst($term); ?> Term<h6>
                                            <!-- <p class='card-subtitle mb-4'> For basic styling—light padding and only horizontal
                                                dividers—add the base class <code>.table</code> to any
                                                <code>&lt;table&gt;</code>.
                                            </p> -->
                                            <div class='table-responsive'>
                                                <table class='table mb-0'>
                                                    <thead>
                                                        <tr>
                                                            <th>Subject</th>
                                                            <th>First Test</th>
                                                            <th>Second Test</th>
                                                            <th>Examination</th>
                                                            <th>Total</th>
                                                            <th>Average</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class=''>

                                                    <?php
                                                    // var_dump($result[0]['first_test']);
                                                    if (array_key_exists(0, $result) && $result[0] !== null) {
                                                        $first_test_array = json_decode($result[0]['first_test'], true);
                                                        // rest of your code
                                                      } else {
                                                        // handle the case when $result[0] is not set or null
                                                        $first_test_array = "";
                                                      }
                                                      
                                                    // var_dump($first_test_array['social studies']);//die;

                                                    if (array_key_exists(0, $result) && $result[0] !== null) {
                                                        $second_test_array = json_decode($result[0]['second_test'], true);//die;
                                                    } else {
                                                        // handle the case when $result[0] is not set or null
                                                        $second_test_array = "";
                                                      }
                                                    // var_dump($second_test_array['social studies']);//die;
                                                    if($result){
                                                        
                                                        for ($i = 0; $i < sizeof($result); $i++){
                                                            
                                                            foreach($first_test_array as $key => $value){
                                                                $row_sum = 0;
                                                                echo
                                                                    "<tr>"; ?>
                                                                         <?php echo " <th scope='row'>{$key}</th>
                                                                        <td>{$value}</td>";
                                                                        $row_sum += $value; ?>
                                                                        <!-- reading out info for second test -->
                                                                        <?php
                                                                            $inner_values = json_decode($result[0]['second_test'], true);
                                                                            $inner_value = isset($inner_values[$key]) ? $inner_values[$key] : '';
                                                                            echo "<td>{$inner_value}</td>";       
                                                                            $row_sum += (int)$inner_value;                                                                                                                                                                                           // }                                                                        
                                                                        ?>
                                                                        <!-- reading out info for second test -->
                                                                        <!-- reading out info for exam starts -->
                                                                        <?php
                                                                            $exam_values = json_decode($result[0]['exam'], true);
                                                                            $exam_value = isset($exam_values[$key]) ? $exam_values[$key] : '';
                                                                            echo "<td>{$exam_value}</td>"; 
                                                                            $row_sum += (int)$exam_value;                                                                                                                                                                                                 // }                                                                        
                                                                        ?>
                                                                        <!-- reading out info for exam ends -->
                                                                       <?php 
                                                                        $avg = ($row_sum/sizeof($result));
                                                                        // var_dump(sizeof($result));die;
                                                                       echo " <td>{$row_sum}</td>
                                                                       <td>{$avg}</td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    }else{
                                                        echo "<tr><td colspan='6' class='text-center'>No record yet!</td></tr>";
                                                    }
                                                    // echo date('Y');
                                                    ?>    
                                                    </tbody>
                                                </table>
                                            </div>
                                            

                                        </div>
                                        <!-- end card-body-->
                                    </div>
                                    <!-- end card -->

                                </div>
                                <?php } ?>
                                <?php if($usertype == 'teacher'){?>
                                    <!-- list of all my students and their scores for the courses I take -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="mb-4"><?php echo ucfirst($the_class); ?></h4>
                                            
                                        </div>
                                                                           
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div id="accordion" class="custom-accordion mb-4">
                                           
                                                <?php for($i = 0; $i < sizeof($subject); $i++){
                                                    echo "
                                                        <div class='card mb-0'>
                                                            <div class='card-header' id='headingOne'>
                                                                <h5 class='m-0 font-size-15 heading_subject'>
                                                                    <a class='d-block pt-2 pb-2 text-dark' data-toggle='collapse' href='#collapse{$i}' aria-expanded='' aria-controls='collapse{$i}'>
                                                                    {$subject[$i]['subject']}<span class='float-right'><i class='mdi mdi-chevron-down accordion-arrow'></i></span>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id='collapse{$i}' class='collapse' aria-labelledby='headingOne' data-parent='#accordion'>
                                                                <div class='card-body'>
                                                                    <div class='table-responsive'>
                                                                        <table class='table mb-0'>
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>S/N</th>
                                                                                    <th>Student</th>
                                                                                    <th>First Test</th>
                                                                                    <th>Second Test</th>
                                                                                    <th>Examination</th>
                                                                                    <th>Total</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class=''>
                                                                            ";
                                                                            // var_dump($students_names[0]['name']);die;
                                                                            for($j = 0,$k = 1; $j < count($students_names); $j++,$k++){
                                                                                $show_total_score = 0;
                                                                                echo "
                                                                                <tr>
                                                                                    <td>{$k}</td>
                                                                                    <td>{$students_names[$j]['name']} {$students_names[$j]['surname']}</td>"; ?>
                                                                                    <!-- first test -->
                                                                                        <?php 
                                                                                            $score_query = "SELECT first_test FROM scores WHERE student_id = '".$students_names[$j]['id']."'"; 
                                                                                            $score_query = mysqli_query($sqlConnection, $score_query);
                                                                                            $score_query = $score_query -> fetch_all(MYSQLI_ASSOC);
                                                                                            $score_query = json_encode($score_query);
                                                                                            $score_query = json_decode($score_query, true);
                                                                                            $students_score_for_this_course = $subject[$i]['subject'];

                                                                                          if (!empty($score_query) && array_key_exists(0, $score_query) && array_key_exists('first_test', $score_query[0])) {
                                                                                            $this_score_array = json_decode($score_query[0]['first_test'], true);
                                                                                            if(!empty($this_score_array)){ // Check if $this_score_array is not empty
                                                                                            //   echo "<pre>";
                                                                                            //   print_r($this_score_array); // Print out the array
                                                                                            //   echo "</pre>";
                                                                                              if(isset($students_score_for_this_course) && array_key_exists($students_score_for_this_course, $this_score_array)){ // Check if $students_score_for_this_course is set and exists in $this_score_array
                                                                                                $course_score = $this_score_array[$students_score_for_this_course];
                                                                                                $show_total_score += $course_score;
                                                                                                if(empty($course_score)){
                                                                                                  echo "";
                                                                                                }else{
                                                                                                  echo "<td>{$course_score}</td>";
                                                                                                }
                                                                                              } else {
                                                                                                echo "<td></td>";
                                                                                              }
                                                                                            } else {
                                                                                              echo "<td></td>";
                                                                                            }
                                                                                          } else {
                                                                                            echo "<td></td>";
                                                                                          }
                                                                                         
                                                                                                                                                                            
                                                                                       ?>
                                                                                       <!-- first test ends -->
                                                                                       <!-- second test -->
                                                                                       <?php 
                                                                                           $score_query = "SELECT second_test FROM scores WHERE student_id = '".$students_names[$j]['id']."'"; 
                                                                                           $score_query = mysqli_query($sqlConnection, $score_query);
                                                                                           $score_query = $score_query -> fetch_all(MYSQLI_ASSOC);
                                                                                           $score_query = json_encode($score_query);
                                                                                           $score_query = json_decode($score_query, true);
                                                                                           $students_score_for_this_course = $subject[$i]['subject'];
                                                                                           if (!empty($score_query) && array_key_exists(0, $score_query) && array_key_exists('second_test', $score_query[0])) {
                                                                                               $this_score_array = json_decode($score_query[0]['second_test'], true);
                                                                                               if(!empty($this_score_array)){ // Check if $this_score_array is not empty
                                                                                                 if(isset($students_score_for_this_course) && array_key_exists($students_score_for_this_course, $this_score_array)){ // Check if $students_score_for_this_course is set and exists in $this_score_array
                                                                                                   $course_score = $this_score_array[$students_score_for_this_course];
                                                                                                   $show_total_score += $course_score;
                                                                                                   if(empty($course_score)){
                                                                                                     echo "";
                                                                                                   }else{
                                                                                                     echo "<td>{$course_score}</td>";
                                                                                                   }
                                                                                                 } else {
                                                                                                   echo "<td></td>";
                                                                                                 }
                                                                                               } else {
                                                                                                 echo "<td></td>";
                                                                                               }
                                                                                             } else {
                                                                                               echo "<td></td>";
                                                                                             }
                                                                                             
                                                                                       ?>
                                                                                       <!-- second test ends -->
                                                                                       <!-- exam score starts here -->
                                                                                       <?php 
                                                                                            $score_query = "SELECT exam FROM scores WHERE student_id = '".$students_names[$j]['id']."'"; 
                                                                                            $score_query = mysqli_query($sqlConnection, $score_query);
                                                                                            $score_query = $score_query -> fetch_all(MYSQLI_ASSOC);
                                                                                            $score_query = json_encode($score_query);
                                                                                            $score_query = json_decode($score_query, true);
                                                                                            $students_score_for_this_course = $subject[$i]['subject'];
                                                                                            if (!empty($score_query) && array_key_exists(0, $score_query) && array_key_exists('exam', $score_query[0])) {
                                                                                                $this_score_array = json_decode($score_query[0]['exam'], true);
                                                                                                if(!empty($this_score_array)){ // Check if $this_score_array is not empty
                                                                                                  if(isset($students_score_for_this_course) && array_key_exists($students_score_for_this_course, $this_score_array)){ // Check if $students_score_for_this_course is set and exists in $this_score_array
                                                                                                    $course_score = $this_score_array[$students_score_for_this_course];
                                                                                                    $show_total_score += $course_score;
                                                                                                    if(empty($course_score)){
                                                                                                      echo "";
                                                                                                    }else{
                                                                                                      echo "<td>{$course_score}</td>";
                                                                                                    }
                                                                                                  } else {
                                                                                                    echo "<td></td>";
                                                                                                  }
                                                                                                } else {
                                                                                                  echo "<td></td>";
                                                                                                }
                                                                                              } else {
                                                                                                echo "<td></td>";
                                                                                              }
                                                                                           
                                                                                        ?>
                                                                                       <!-- exam score ends here -->
                                                                                     <?php echo "<td>$show_total_score</td>
                                                                                </tr>
                                                                                ";
                                                                            }
                                                                             echo "
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ";
                                                }
                                                ?>
                                                
                                            </div> <!-- end custom accordions-->
                                        </div> <!-- end col -->

                                        <div class="col-lg-12">
                                            <div class="mb-4">
                                                <p>
                                                
                                                </p>
                                                <div class="collapse show" id="collapseExample">
                                                    <div class="card card-body">
                                                    <form action="ca.php" method="POST">
                                                        <div class='row'>
                                                            <div class="col-sm-12 col-md-2">
                                                                <select name="student" id="student" class="form-control">
                                                                    <option value="" selected disabled>Select Student name</option>
                                                                    <?php
                                                                        for ($i = 0; $i < sizeof($students_names); $i++){
                                                                            echo "
                                                                            <option value='{$students_names[$i]['id']}'>{$students_names[$i]['name']} {$students_names[$i]['surname']}</option>
                                                                            ";
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <select name="subject" id="subject" class="form-control">
                                                                    <option value="" selected disabled>Select Subject</option>
                                                                    <!-- call subjects from db -->
                                                                    <?php
                                                                    // var_dump($subject);die;
                                                                        for ($i = 0; $i < sizeof($subject); $i++){
                                                                            echo "
                                                                            <option value='{$subject[$i]['subject']}'>{$subject[$i]['subject']}</option>
                                                                            ";
                                                                        }
                                                                    ?>
                                                                    <!-- <option value="mathematics">Mathematics</option> -->
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12 col-md-2">
                                                                <select name="ca" id="ca" class="form-control">
                                                                    <option value="" selected disabled>Select Continuous Assessment</option>
                                                                    <option value="first test">First Test</option>
                                                                    <option value="second test">Second Test</option>
                                                                    <option value="exam">Examination</option>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-sm-12 col-md-2">
                                                                <input type="text" id="" name="score" placeholder='Enter score here' class="form-control">
                                                            </div>
                                                            <div class="col-sm-12 col-md-4">
                                                                <input type="submit" id="" name="" class="btn-primary btn form-control">
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> <!-- end .mb-4-->
                                        </div> <!-- end col -->

                                    </div>
                                    <!-- end row-->
                                    <!-- list of all my students and their scores for the courses I take -->             
                    
                                <?php };?>
                                <!-- end col -->
                            </div>
                        </div>
                    </div>
                    

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <style>
                a.d-block.pt-2.pb-2.text-dark{
                    text-transform: uppercase !important;
                }
            </style>
          <?php include "./inc/footer.php"; ?>