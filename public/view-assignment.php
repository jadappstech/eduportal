<?php 
    include "./inc/header.php";

    $my_id = $_SESSION['id'];
    $my_class = $_SESSION['my_class'];
    $query = "SELECT * FROM assignments WHERE class = '$my_class' AND subject = '".$_GET['id']."'";
    // var_dump($my_class);die;
    $run_query = mysqli_query($sqlConnection, $query);
    
    $assignment = $run_query->fetch_all(MYSQLI_ASSOC);
    // var_dump($assignment);die;

?>
<style>
    a.h5{
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
                                <h4 class="mb-0 font-size-18">Upload Assignment</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Upload Assignment</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="table-responsive">
                        <table class='table mb-0'>
                            <thead class='thead-light'>
                                <th>#</th>
                                <th>Assignments</th>
                                <!-- <th>Answers</th> -->
                                <th></th>
                            </thead>
                            <tbody>
                                <?php
                                // var_dump($assignment);die;
                                for($i = 0, $j = 1; $i < sizeof($assignment); $i++, $j++){
                                echo "
                                    <tr>
                                        <td>$j</td>
                                        <td><a class='h5' href='./inc/assignments/".$assignment[$i]['file']."' download>{$assignment[$i]['title']}</a></td>
                                    </tr>
                                ";}
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>