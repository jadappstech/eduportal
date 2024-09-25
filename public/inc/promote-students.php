<?php 
    include "./inc/header.php";
    //spool out my classes
    include_once "./inc/config.php";
    $my_id = 7;//$_SESSION['id'];

    $query = "SELECT * FROM users WHERE id = '$my_id'";
    $run_query = mysqli_query($sqlConnection, $query);
    $classes = $run_query->fetch_all(MYSQLI_ASSOC);
    
    $json = $classes[0]['toteach'];
    $data = json_decode($json, true);

    $class_array = [];
    foreach($data as $key => $value){
        array_push($class_array, $key);
    }
    // var_dump($class_array);die;
    for($i = 0; $i < count($class_array); $i++){
        $var = $class_array[$i];
        $var_query = $var."_query";
        // var_dump($var);
        // var_dump($var_query);
        $var_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='$var'";
        $var_query = mysqli_query($sqlConnection, $var_query);

        if($var_query->num_rows>0){
            
            $var_query = $var_query->fetch_all(MYSQLI_ASSOC);
        }
        // var_dump($var_query);
        //i need to create an accordion with the classes of the students and spool out the students in those classes to promote them
    };
?>
<style>
    .acc_text{
        color:black !important;
    }
</style>
<body>
   

    <!-- Begin page -->
    <div id='layout-wrapper'>

       <?php include './inc/navbar.php'; ?>

        <!-- ========== Left Sidebar Start ========== -->
        <div class='vertical-menu'>

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
                                <h4 class="mb-0 font-size-18">Starter</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Starter</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                     <!-- //the accordion starts -->
                    <div class="row">
                        <div class='col-sm-3 mb-2 mb-sm-0'>
                            <div class='nav flex-column nav-pills' id='v-pills-tab' role='tablist' aria-orientation='vertical'>
                                <!-- <a class='nav-link active show' id='v-pills-home-tab' data-toggle='pill' href='#v-pills-home' role='tab' aria-controls='v-pills-home'
                                    aria-selected='true'>
                                    <i class='mdi mdi-home-variant d-lg-none d-block'></i>
                                    <span class='d-none d-lg-block'>Home</span>
                                </a> -->
                                <!-- <a class='nav-link' id='v-pills-profile-tab' data-toggle='pill' href='#v-pills-profile' role='tab' aria-controls='v-pills-profile'
                                    aria-selected='false'>
                                    <i class='mdi mdi-account-circle d-lg-none d-block'></i>
                                    <span class='d-none d-lg-block acc_text'>Profile</span>
                                </a> -->
                                <?php
                                    for($i = 0; $i < count($class_array); $i++){
                                        echo "<a class='nav-link' id='v-pills-".$class_array[$i]."-tab' data-toggle='pill' href='#v-pills-".$class_array[$i]."' role='tab' aria-controls='v-pills-".$class_array[$i]."'
                                        aria-selected='false'>
                                        <i class='mdi mdi-account-circle d-lg-none d-block'></i>
                                        <span class='d-none d-lg-block'>".$class_array[$i]."</span>
                                        ";

                                    }
                                ?>
                                
                            </div>
                        </div> <!-- end col-->

                        <div class='col-sm-9'>
                            <div class='tab-content' id='v-pills-tabContent'>
                                <!-- <div class='tab-pane fade active show' id='v-pills-home' role='tabpanel' aria-labelledby='v-pills-home-tab'>
                                    <p class='mb-0'>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Leggings sint. Veniam sint duis incididunt
                                    cat.
                                    <input type='checkbox' > Kelvin
                                    </p>
                                </div> -->
                                <?php
                                    for($i = 0; $i < count($class_array); $i++){
                                        $query = "SELECT * FROM users WHERE students_class = '$class_array[$i]'";
                                        $run_query = mysqli_query($sqlConnection, $query);
                                        // var_dump($sqlConnection);
                                        // var_dump($run_query);
                                        if($run_query->num_rows > 0){
                                            $stu_arr = $class_array[$i].'arr';
                                            $stu_arr = $run_query ->fetch_all(MYSQLI_ASSOC);
                                        }else{
                                            $stu_arr = "";
                                            echo "No student in this class yet!";
                                        }
                                        // var_dump($stu_arr);//die;
                                        ?>
                                        <div class='tab-pane fade' id='v-pills-<?php echo $class_array[$i]; ?>' role='tabpanel' aria-labelledby='v-pills-<?php echo $class_array[$i]; ?>-tab'>
                                            <p class='mb-0'>
                                                <input type='checkbox' name='checkbox_name' value='checkbox_value'>Hi<?php //echo $stu_arr[0]['name']; ?>
                                            </p>
                                            <input type='checkbox' name='checkbox_name' value='checkbox_value'>Hi<?php //echo $stu_arr[0]['name']; ?>
                                        </div> 
                                    <?php }
                                    
                                    
                                    
                                    // die;
                                ?>
                                <!-- <div class='tab-pane fade' id='v-pills-profile' role='tabpanel' aria-labelledby='v-pills-profile-tab'>
                                    <p class='mb-0'>Culpa dolor voluptate do laboris laboris irure renim eiusmod do sint minim consectetur
                                        qui.</p>
                                </div> -->
                                
                            </div> <!-- end tab-content-->
                        </div> <!-- end col-->
                    </div>
                        
                    <!-- //the accordion ends -->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>