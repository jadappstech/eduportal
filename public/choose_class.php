<?php 
    include "./inc/header.php";
    include_once "./inc/config.php";
    if($usertype != 'teacher'){
        header('Location: ./welcome.php');
    }
    // $jssone_query = "SELECT * FROM student_classes";// WHERE usertype = 'student' AND students_class='jss1'";
    // $jssone_result = mysqli_query($sqlConnection, $jssone_query);
    // if($jssone_result->num_rows>0){
        
    //     $jssone_user = $jssone_result->fetch_all(MYSQLI_ASSOC);
    // }
        //here because of the navbar pic
        $query = "SELECT * FROM users";
        $run_query = mysqli_query($sqlConnection, $query);
        $user = $run_query->fetch_all(MYSQLI_ASSOC);
        //here because of the navbar pic

    //spool out my classes
    
    $my_id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id = '$my_id'";
    $run_query = mysqli_query($sqlConnection, $query);
    $classes = $run_query->fetch_all(MYSQLI_ASSOC);

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
                                <h4 class="mb-0 font-size-18">Choose class</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Choose class</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        
                        <?php if($classes){

                                for($i = 0; $i < sizeof($classes); $i++){
                                        
                                if($classes[$i]['toteach'] != null){
                                $json = $classes[$i]['toteach'];
                                $data = json_decode($json, true);
                                foreach($data as $key => $value){
                                    // var_dump($key);
                                    // var_dump("=>");
                                    // var_dump($key);//die;
                                ?>
                                <div class='col-md-2 col-sm-12'>
                                    <div class='card card-pricing'>
                                        <div class='card-body text-center'>
                                            
                                            <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                <?php echo $key; ?>
                                            </h5>
                                            <ul class='card-pricing-features'>
                                            <li> </li>
                                            </ul>
                                            <a href="./choose_term.php?class=<?php echo $key; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Upload Results for <?php echo $key; ?><i class='mdi mdi-arrow-right ml-1'></i></a>
                                            <!-- <a href="./results.php?class=<?php //echo $key; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Upload Results for <?php //echo $key; ?><i class='mdi mdi-arrow-right ml-1'></i></a> -->
                                        </div>
                                    </div> <!-- end Pricing_card -->
                                </div> <!-- end col -->
                              <?php  }
                            }else{
                                echo "<div class='col-md-12 col-sm-12'>
                                <div class='card card-pricing'>
                                    <div class='card-body text-center'>
                                        <h1>No Class assigned to you yet</h1>
                                    </div>
                                </div>
                            </div>
                            "; 
                                
                            }
                            // var_dump("OOOOPS");die;
                         ?>
                            
                        <?php }
                        }else{
                           
                        }; ?>
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>