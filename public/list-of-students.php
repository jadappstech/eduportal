<?php 
    include "./inc/header.php";
    include_once "access-control.php";

    //here because of the pic on the navbar
    $query = "SELECT * FROM users WHERE usertype = 'student'";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);

    //jssone students
    $jssone_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='jss1'";
    $jssone_result = mysqli_query($sqlConnection, $jssone_query);
    if($jssone_result->num_rows>0){
        
        $jssone_user = $jssone_result->fetch_all(MYSQLI_ASSOC);
    }
    //jsstwo students
    $jsstwo_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='jss2'";
    $jsstwo_result = mysqli_query($sqlConnection, $jsstwo_query);
    if($jsstwo_result->num_rows>0){
        
        $jsstwo_user = $jsstwo_result->fetch_all(MYSQLI_ASSOC);
    }
    //jssthree students
    $jssthree_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='jss3'";
    $jssthree_result = mysqli_query($sqlConnection, $jssthree_query);
    if($jssthree_result->num_rows>0){
        
        $jssthree_user = $jssthree_result->fetch_all(MYSQLI_ASSOC);
    }
    //sssone students
    $sssone_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='sss1'";
    $sssone_result = mysqli_query($sqlConnection, $sssone_query);
    if($sssone_result->num_rows>0){
        
        $sssone_user = $sssone_result->fetch_all(MYSQLI_ASSOC);
    }
    //ssstwo students
    $ssstwo_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='sss2'";
    $ssstwo_result = mysqli_query($sqlConnection, $ssstwo_query);
    if($ssstwo_result->num_rows>0){
        
        $ssstwo_user = $ssstwo_result->fetch_all(MYSQLI_ASSOC);
    }
    //sssthree students
    $sssthree_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='sss3'";
    $sssthree_result = mysqli_query($sqlConnection, $sssthree_query);
    if($sssthree_result->num_rows>0){
        
        $sssthree_user = $sssthree_result->fetch_all(MYSQLI_ASSOC);
    }
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
                                <h4 class="mb-0 font-size-18">Students</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Students</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class='row mt-sm-3 mt-2 mb-2'>

                    <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">List of Students</h4>
                                    <!-- <p class="card-subtitle mb-4">Example of vertical left side tabs.</p> -->

                                    <div class="row">
                                        <div class="col-sm-2 mb-2 mb-sm-0">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active show" id="jssone-tab" data-toggle="pill" href="#jssone" role="tab" aria-controls="jssone"
                                                    aria-selected="true">
                                                    <i class="mdi mdi-home-variant d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">JSS 1</span>
                                                </a>
                                                <a class="nav-link" id="jsstwo-tab" data-toggle="pill" href="#jsstwo" role="tab" aria-controls="jsstwo"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-account-circle d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">JSS2</span>
                                                </a>
                                                <a class="nav-link" id="jssthree-tab" data-toggle="pill" href="#jssthree" role="tab" aria-controls="jssthree"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-settings-outline d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">JSS 3</span>
                                                </a>
                                                <a class="nav-link" id="sssone-tab" data-toggle="pill" href="#sssone" role="tab" aria-controls="sssone"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-home-variant d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">SSS 1</span>
                                                </a>
                                                <a class="nav-link" id="ssstwo-tab" data-toggle="pill" href="#ssstwo" role="tab" aria-controls="ssstwo"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-account-circle d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">SSS2</span>
                                                </a>
                                                <a class="nav-link" id="sssthree-tab" data-toggle="pill" href="#sssthree" role="tab" aria-controls="sssthree"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-settings-outline d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">SSS 3</span>
                                                </a>
                                            </div>
                                        </div> <!-- end col-->

                                        <div class="col-sm-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade active show" id="jssone" role="tabpanel" aria-labelledby="jssone-tab">
                                                    <div class="row">
                                                        <?php if(isset($jssone_user)){
                                                        for ($i = 0; $i < sizeof($jssone_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $jssone_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$jssone_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $jssone_user[$i]['name'].' '.$jssone_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($jssone_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($jssone_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $jssone_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $jssone_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                   
                                                </div>
                                                <div class="tab-pane fade" id="jsstwo" role="tabpanel" aria-labelledby="jsstwo-tab">
                                                    <div class="row">
                                                        <?php if(isset($jsstwo_user)){
                                                        for ($i = 0; $i < sizeof($jsstwo_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $jsstwo_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$jsstwo_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $jsstwo_user[$i]['name'].' '.$jsstwo_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($jsstwo_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($jsstwo_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $jsstwo_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $jsstwo_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="jssthree" role="tabpanel" aria-labelledby="jssthree-tab">
                                                    <div class="row">
                                                        <?php if(isset($jssthree_user)){
                                                        for ($i = 0; $i < sizeof($jssthree_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $jssthree_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$jssthree_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $jssthree_user[$i]['name'].' '.$jssthree_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($jssthree_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($jssthree_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $jssthree_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $jssthree_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="sssone" role="tabpanel" aria-labelledby="sssone-tab">
                                                    <div class="row">
                                                        <?php if(isset($sssone_user)){
                                                        for ($i = 0; $i < sizeof($sssone_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $sssone_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$sssone_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $sssone_user[$i]['name'].' '.$sssone_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($sssone_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($sssone_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $sssone_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $sssone_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="ssstwo" role="tabpanel" aria-labelledby="ssstwo-tab">
                                                    <div class="row">
                                                        <?php if(isset($ssstwo_user)){
                                                        for ($i = 0; $i < sizeof($ssstwo_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $ssstwo_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$ssstwo_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $ssstwo_user[$i]['name'].' '.$ssstwo_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($ssstwo_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($ssstwo_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $ssstwo_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $ssstwo_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="sssthree" role="tabpanel" aria-labelledby="sssthree-tab">
                                                    <div class="row">
                                                        <?php if(isset($sssthree_user)){
                                                        for ($i = 0; $i < sizeof($sssthree_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $sssthree_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$sssthree_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $sssthree_user[$i]['name'].' '.$sssthree_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($sssthree_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($sssthree_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $sssthree_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $sssthree_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                </div>
                                            </div> <!-- end tab-content-->
                                        </div> <!-- end col-->
                                    </div>
                                    <!-- end row-->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col -->

                       
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>