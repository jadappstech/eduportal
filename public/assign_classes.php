<?php 
    include "./inc/header.php";
    $teachers_id = $_GET['id'];
    $query = "SELECT * FROM users WHERE usertype = 'teacher' AND id = '$teachers_id'";
    $result = mysqli_query($sqlConnection, $query);
    if($result->num_rows>0){
        
        $user = $result->fetch_all(MYSQLI_ASSOC);
    }else{
        $user = "No record found for this user.";
    }
    //spool out the classes from db
    $class_query = "SELECT * FROM student_classes";
    $class_result = mysqli_query($sqlConnection, $class_query);
    if($class_result->num_rows>0){
        
        $student_class = $class_result->fetch_all(MYSQLI_ASSOC);
    }else{
        $student_class = "No record found for here.";
    }
    $_SESSION['assign_class_to'] = $_GET['id'];
    // var_dump($_SESSION);die;
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
                                <h4 class="mb-0 font-size-18">Assign Classes</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Assign Classes</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-6">
                            
                            <h4>Assign classes to <?php
                                echo(ucfirst($user[0]['name'])." ". ucfirst($user[0]['surname']));
                            ?>
                            </h4>
                        </div>
                        <div class="col-md-12 col-xl-12">
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="card">
                                        <form method="POST" action="assign_subject.php">
                                        <div class="card-body">
                                           
                                            <h4 class='card-title'> </h4>
                                            <div class='row'>
                                                <?php for($i = 0; $i < sizeof($student_class); $i++){?>
                                                <div class='col-xl-2 col-sm-2'>
                                                    <input type='checkbox' name='<?php echo $student_class[$i]['grade'];?>' id=''> <?php echo strtoupper($student_class[$i]['grade']);?>
                                                </div>
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary mb-3 btn-block" >
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>