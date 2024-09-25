<?php 
    include "./inc/header.php";
    //here because of the pic on the navbar
    $query = "SELECT * FROM users WHERE id = '".$id."'";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the pic on the navbar
    //spool out the classes starts here
    $classes_query = "SELECT * FROM student_classes";
    $run_classes_query = mysqli_query($sqlConnection, $classes_query);
    $classes = $run_classes_query->fetch_all(MYSQLI_ASSOC);
    //spool out the classes ends here
    //spool out the teachers starts here
    $teachers_query = "SELECT * FROM users WHERE usertype = 'teacher' AND form_teacher = '0'";
    $run_teachers_query = mysqli_query($sqlConnection, $teachers_query);
    $teachers = $run_teachers_query->fetch_all(MYSQLI_ASSOC);
    //spool out the teachers ends here
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
                                <h4 class="mb-0 font-size-18">Assign Form Teacher</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Assign Form Teacher</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                   
                    <div class="table-responsive">
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th>CLASS</th>
                                    <!-- <th></th> -->
                                    <th>TEACHER</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr> -->
                                    <?php

                                        $assigned_teachers = "SELECT * FROM users WHERE form_teacher <> ''";
                                        $assigned_teachers = mysqli_query($sqlConnection, $assigned_teachers);
                                        $assigned_teachers = $assigned_teachers->fetch_all(MYSQLI_ASSOC);
                                        if(isset($assigned_teachers)){
                                            for($k = 0; $k < count($assigned_teachers); $k++){
                                                echo"<thead>
                                                    <tr>
                                                    <th>".$assigned_teachers[$k]['form_class']."</th>
                                                        <th>".$assigned_teachers[$k]['name']." ".$assigned_teachers[$k]['surname']."</th>
                                                        <th><a href='./inc/unassign-form-teacher-api.php?id=".$assigned_teachers[$k]['id']."' class='btn btn-danger form-control'>Unassign</a></th>
                                                    </tr>
                                                </thead>";
                                        }
                                        }else{
                                            echo "rara";
                                        }

                                        for($i = 0; $i < count($classes); $i++){
                                            //CHECK if a class has already been assigned
                                            $grade = $classes[$i]['grade'];
                                            $the_class_query = "SELECT * FROM users WHERE form_class = '$grade'";
                                            $the_class_query = mysqli_query($sqlConnection, $the_class_query);
                                            $the_class_query = $the_class_query->fetch_all(MYSQLI_ASSOC);
                                            // var_dump($the_class_query[0]['form_class']);die;

                                           
                                            if(!(isset($the_class_query[0]['form_class']))){
                                                echo"
                                                <form action='./inc/assign-form-teacher-api.php' method='POST'>
                                                 <tr>
                                                    <td>
                                                        <input type='text' class='form-control' name='grade' id='$grade' value='$grade' readonly>
                                                    <td>
                                                            <select name='form_teacher' id='form_teacher' class='form-control'>
                                                            <option value=''>Select teacher</option>
                                                            ";
                                                            for($j = 0; $j < count($teachers); $j++){
                                                                $fullname = $teachers[$j]['name'].' '.$teachers[$j]['surname'];
                                                                $teachers_id = $teachers[$j]['id'];
                                                            echo"<option value='$teachers_id'>".$fullname."</option>";
    
                                                        }
                                                    echo"
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button class='btn btn-primary form-control' type='submit'>Assign</button>
                                                    </td>
                                                </tr>
                                                </form>
                                                    ";
                                            }
                                            //if yes, display it under assigned classes
                                            //else allow it to be displayed among the ones yet to be displayed
                                            }
                                        ?>
                                    <!-- </tr> -->
                            </tbody>
                        </table>
                    </div>
                    
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>