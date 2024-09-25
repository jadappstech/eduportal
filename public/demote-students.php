<?php 
    include "./inc/header.php";
    //spool out my classes
    include_once "./inc/config.php";
    $my_id = $_SESSION['id'];

    $query = "SELECT * FROM users WHERE id = '".$_SESSION["id"]."'";
    $run_query = mysqli_query($sqlConnection, $query);
    $classes = $run_query->fetch_all(MYSQLI_ASSOC);
    $user = $classes;
    $form_class = $classes[0]['form_class'];

    //select every student from the form class starts
    $form_class_query = "SELECT * FROM users WHERE students_class = '".$form_class."'";
    $form_class_query = mysqli_query($sqlConnection, $form_class_query);
    $form_class_query = $form_class_query->fetch_all(MYSQLI_ASSOC);
    //select every student from the form class ends
    // var_dump($form_class_query);die;

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
                                <h4 class="mb-0 font-size-18">Promote Students</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Promote Students</li>
                                    </ol>
                                </div>

                            </div>
                            <form action="./inc/demote-students-api.php" method='POST'>
                                <div class="row">
                                    <div class="col-md-3 col-xl-3">
                                        <?php
                                        for($i = 0; $i < count($form_class_query); $i++){

                                            $studentsname = $form_class_query[$i]['name']." ".$form_class_query[$i]['surname'];
                                            // echo $studentsname};?>
                                            <input type='checkbox' id='' name='<?php echo $form_class_query[$i]['id']; ?>' class=''>

                                        <?php
                                        echo " $studentsname"."<br>";
                                        }
                                        ?>
                                        <br>
                                    <button type="Submit" class="form-control btn-primary">Demote students</button>
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                    <!-- end page title -->

                     <!-- //the accordion starts -->
                 
                    <!-- //the accordion ends -->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>