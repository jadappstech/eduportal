<?php 
    include_once "./inc/header.php";
    include_once "./inc/config.php";
    if($usertype == "admin"):
        echo "Access denied!";
        header("Location: welcome.php");
    endif;

    $_POST['id'] = $_SESSION['id'];
    $my_id = $_SESSION['id'];
    $my_class = $_SESSION['my_class'];
    // $my_class = "prenursery";
    // var_dump($my_class);die;
    $query = "SELECT * FROM assignments WHERE class = '$my_class'";
    // var_dump($my_class);die;
    $run_query = mysqli_query($sqlConnection, $query);
    
    // var_dump($my_id);die;
    $info = $run_query->fetch_all(MYSQLI_ASSOC);
    // $myclass = $info[0]['students_class'];
    
    // var_dump($info[0]['students_class']);die;
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
    a.h4{
        text-transform: capitalize;
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
                                <h4 class="mb-0 font-size-18">Assignments</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Assignments</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <?php 
                    
                    if($usertype != "admin"){
                        echo "

                        <div class='row'>
                            <div class='col-xl-12'>
                                <div class='card'>
                                    <div class='card-body table-responsive'>
                                    ";?><?php

                                        // print_r($info); 
                                        echo"<form>
                                        <div class='table-responsive'>
                                        <table class='table mb-0'>
                                                <thead class='thead-light'>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Subject</th>
                                                        <th class='text-center'>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                ";?>
                                                    <?php
                                                    $query_assignment = "SELECT * FROM assignments WHERE class = '$my_class'";
                                                    $assignment = mysqli_query($sqlConnection, $query_assignment);
                                                    // $updated_at = now();
                                                    if(!($assignment->num_rows > 0)){
                                                        echo"
                                                            <tr><h2 align='center'>No assignment yet</h2></tr>
                                                        ";
                                                    }
                                                    $assignment = $assignment->fetch_all(MYSQLI_ASSOC);
                                                    $text='';
                                                    // var_dump($lesson_notes);die;
                                                    for($i = 0, $j = 1; $i < sizeof($assignment); $i++, $j++){
                                                        
                                                        // var_dump($lesson_notes[$i]['lesson_note']);die;
                                                        if($info[$i]['subject'] != $text){
                                                            echo "
                                                            <tr>
                                                                <th scope='row'>".$j."</th>
                                                                <td colspan='2'><a href='./view-assignment.php?id={$info[$i]['subject']}' class='h4 card-title text-center'><span>{$info[$i]['subject']}</span></a></td>
                                                            </tr>";
                                                        }else{
                                                            continue;
                                                        }
                                                        $text = $info[$i]['subject'];
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

                    </div>
                
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>