<?php 
    include "./inc/header.php";
    if($usertype != "teacher"):
        echo "Access denied!";
        header("Location: welcome.php");
    endif;


    //spool out my classes
    include_once "./inc/config.php";
    $my_id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE students_class = '".$_GET['class']."'";
    $run_query = mysqli_query($sqlConnection, $query);
    $classes = $run_query->fetch_all(MYSQLI_ASSOC);
    // var_dump($classes);die;

    //here for the profile pic on navbar
    $user = "SELECT * FROM users WHERE id = '".$my_id."'";
    // var_dump($_GET['form_students']);die;
    $user = mysqli_query($sqlConnection, $user);
    $user = $user->fetch_all(MYSQLI_ASSOC);
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
                                // var_dump(bool($classes));die; 
                            if($classes){
                                for($i = 0; $i < count($classes); $i++){
                                    
                                    // var_dump($classes[0]['form_class']);die;
                                    // if($classes[$i]['form_class'] != null){
                                        
                                        // $json = $classes[$i]['form_class'];
                                        // $data = json_decode($json, true);
                                        // foreach($data as $key => $value){

                                            // echo "$key<br>";
                                            echo "
                                                <div class='col-md-2 col-xl-2'>
                                                ";
                                                    
                                               
                                                echo"<div class='text-center'>
                                                    <a href='student-profile.php?id=".$classes[$i]['id']."'>
                                                        <div class='card'>
                                                            <div class='card-body'>";
                                                            if( $classes[$i]['photo'] == null){
                                                                echo "<img src='./inc/images/dummy_img.png' alt='' class='img-thumbnail rounded-circle header-profile-user' />";
                                                            }else{
                                                                echo "<img src=\"./inc/images/".$classes[$i]['photo']."\" alt=".$classes[$i]['name']." class=\"img-thumbnail rounded-circle header-profile-user\" \">";
                                                            }
                                                            echo "</div>
                                                            
                                                            <div class='card-body text-center'>
                                                                <h3 class='card-text'>".$classes[$i]['name']."</h3>
                                                            </div>
                                                        </div>
                        
                                                    </a>
                                                   
                                                
                                                </div>
                                            </div>
                                            ";
                                        // }
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