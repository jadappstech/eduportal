<?php 
    include "./inc/header.php";
    //here because of the navbar pic
    $query = "SELECT * FROM users WHERE id = ".$_SESSION['id'];
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the navbar pic
    //here because of the list of classes
    $query = "SELECT * FROM student_classes";
    $run_query = mysqli_query($sqlConnection, $query);
    $classes = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the list of classes
?>
<style>
    .i{
        text-transform: uppercase;
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
                                <h4 class="mb-0 font-size-18">Select Class</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Select Class</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="container">
                        <div class="row">
                            <?php
                            for($i = 0; $i < count($classes); $i++){
                                $class = $classes[$i]['grade'];
                                echo "
                                    <div class='col-sm-2'>
                                        <a href='./configure-school-fees-items.php?class=$class'><div class='card card-body'>
                                    <h5 class='card-title text-center i'>$class</h5>
                                    <p class='card-text'>
                                        <!--<small class='text-muted'>Last updated 3 mins ago</small>-->
                                    </p>
                                </div></a>
                                    </div>
                                ";
                            }
                            ?>
                        </div>
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>