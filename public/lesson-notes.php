<?php 
    include_once "./inc/header.php";
    include_once "./inc/config.php";
    if($usertype == "student"):
        echo "Access denied!";
        header("Location: welcome.php");
    endif;

    $query = "SELECT * FROM users WHERE usertype = 'student'";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    
    $query = "SELECT * FROM subjects";
    $run_query = mysqli_query($sqlConnection, $query);

    $subject = $run_query->fetch_all(MYSQLI_ASSOC);
    // var_dump($subject[1]['subject']);die;
    $_POST['id'] = $_SESSION['id'];
    // var_dump($_SESSION['id']);die;
?>
<style>
    .approved{
        color: green !important;
    }
    .pending{
        color: gray !important;
    }
    .declined{
        color: red !important;
    }
</style>
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
                                <h4 class="mb-0 font-size-18">Lesson Notes</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Lesson Notes</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <?php 
                    
                    if($usertype == "admin"){
                        echo "

                        <div class='row'>
                            <div class='col-xl-12'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <form>
                                        <div class='table-responsive'>
                                            <table class='table mb-0'>
                                                <thead class='thead-light'>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Class</th>
                                                        <th>Subject</th>
                                                        <th>Lesson note</th>
                                                        <th class='text-center'>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                ";?>
                                                    <?php
                                                    $query_lesson_note = "SELECT * FROM lesson_notes WHERE approved = 0";
                                                    $lessons = mysqli_query($sqlConnection, $query_lesson_note);
                                                    // $updated_at = now();
                                                    // $if($lessons->num_rows > 0){

                                                        $lesson_notes = $lessons->fetch_all(MYSQLI_ASSOC);
                                                    // };
                                                    // var_dump($lesson_notes);die;
                                                        for($i = 0, $j = 1; $i < sizeof($lesson_notes); $i++, $j++){
                                                            
                                                            // var_dump($lesson_notes[$i]['lesson_note']);die;
                                                            echo "
                                                            <tr>
                                                                <th scope='row'>".$j."</th>
                                                                <td>{$lesson_notes[$i]['grade']}</td>
                                                                <td>{$lesson_notes[$i]['subject']}</td>
                                                                <td><a href='./inc/lesson_notes/{$lesson_notes[$i]['lesson_note']}'>{$lesson_notes[$i]['lesson_note']}</a></td>
                                                                <td class='text-center'>
                                                                    <a href='approve_lesson_note.php?id={$lesson_notes[$i]['id']}' id='approve' name='approve' class='btn btn-sm btn-primary mx-3'><i class='bx bx-check'></i></a>
                                                                    <a href='decline_lesson_note.php?id={$lesson_notes[$i]['id']}' id='decline' name='decline' class='btn btn-sm btn-danger mx-3'><i class='bx bx-x'></i></a>
                                                                </td>
                                                            </tr>
                                                            
                                                            ";
                                                        }

                                                    ?>

                                                    <?php echo"
                                                </tbody>
                                            </table>
                                        </div>

                                    </form>
                                    </div>
                                    <!-- end card-body-->
                                </div>
                                <!-- end card -->

                            </div>
                        </div>


                        ";
                    }

                    ?>

                    <form action="./inc/upload_lesson_note.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="subject">Select Subject</label>
                                <select name="subject" id="subject" class="form-control">
                                    <option selected disabled>Select subject</option>
                                    <?php
                                        for($i = 0; $i < sizeof($subject); $i++){
                                            echo "<option value=".$subject[$i]['subject'].">".ucfirst($subject[$i]['subject'])."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="grade">Select Class</label>
                                <select name="grade" id="grade" class="form-control">
                                    <option selected disabled>Select Class</option>
                                    <?php
                                                                
                                        $classes_query = "SELECT * FROM student_classes";// WHERE usertype = 'student' AND students_class='jss1'";
                                        $classes_result = mysqli_query($sqlConnection, $classes_query);
                                        if($classes_result->num_rows>0){
                                            
                                            $classes_user = $classes_result->fetch_all(MYSQLI_ASSOC);
                                        }
                                        $selected_class = strtolower($user[0]['students_class']);
                                        for($i = 0; $i < sizeof($classes_user); $i++){
                                            if($selected_class == $classes_user[$i]['grade']){
                                        // var_dump($selected_class == $classes_user[$i]['grade']);die;

                                                echo "<option value=".$classes_user[$i]['grade']." selected='selected'>".$classes_user[$i]['grade']."</option>";
                                            }else{
                                                
                                                echo "<option value=".$classes_user[$i]['grade'].">".$classes_user[$i]['grade']."</option>";
                                            }
                                        }
                                    ?>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="lesson_note">Upload Lesson Note</label>
                                <input type="file" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" id="lesson_note" name="lesson_note" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for=""><br></label>
                                <input type="submit" id="submit" name="submit" class="form-control btn btn-primary">
                            </div>
                        </div>
                    </form>
                        
                          

                            <?php
                            
                               
                                $course_query = "SELECT * FROM lesson_notes WHERE uploaded_by='{$_SESSION['id']}'";
                                // $course_query = "SELECT * FROM lesson_notes";
                                $run_course_query = mysqli_query($sqlConnection, $course_query);
                                // var_dump($run_course_query);die;
                                if ($usertype != 'admin'):

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
                            endif;

                            ?>
                         
                    </div>
                
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>