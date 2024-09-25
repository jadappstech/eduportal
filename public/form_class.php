<?php 
    include "./inc/header.php";
    if($usertype != "teacher"):
        echo "Access denied!";
        header("Location: welcome.php");
    endif;

    //spool out my classes
    include_once "./inc/config.php";
    $my_id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id = '$my_id'";
    $run_query = mysqli_query($sqlConnection, $query);
    $classes = $run_query->fetch_all(MYSQLI_ASSOC);
    $user = $classes;
    $_SESSION['my_class'] = $classes[0]['form_class'];

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
                                <h4 class="mb-0 font-size-18">Form Class</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Form Class</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <?php
                            if($classes){
                                for($i = 0; $i < count($classes); $i++){

                                    if($classes[$i]['form_class'] != null){
                                        
                                        // $json = $classes[$i]['form_class'];
                                        // $data = json_decode($json, true);
                                        // foreach($data as $key => $value){

                                            // echo "$key<br>";
                                            echo "
                                                <div class='col-md-3 col-xl-3'>
                                                   
                                                        <div class='card'>
                                                            <div class='card-body'>
                                                                
                                                            </div>
                                                            
                                                            <div class='card-body text-center'>
                                                                <h3 class='card-text'>".$classes[$i]['form_class']."</h3>
                                                                <a href = 'form_students.php?class=".$classes[$i]['form_class']."' class='btn btn-primary'>View Students</a>
                                                                
                                                                <a href = './term.php?class=".$classes[$i]['form_class']."' class='btn btn-primary'>Compile results</a>
                                           
                                                            </div>
                                                        </div>
                        
                                                </div>
                                            ";
                                        }
                                }
                            }else{
                                echo "No record found";
                            }
                        ?>
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>