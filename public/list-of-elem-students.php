<?php 
    include "./inc/header.php";
    include_once "access-control.php";

    $query = "SELECT * FROM users WHERE usertype = 'student'";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    
    //kgone students
    $kgone_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='prenursery'";
    $kgone_result = mysqli_query($sqlConnection, $kgone_query);
    if($kgone_result->num_rows>0){
        
        $kgone_user = $kgone_result->fetch_all(MYSQLI_ASSOC);
    }
    //kgtwo students
    $kgtwo_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='nursery1'";
    $kgtwo_result = mysqli_query($sqlConnection, $kgtwo_query);
    if($kgtwo_result->num_rows>0){
        
        $kgtwo_user = $kgtwo_result->fetch_all(MYSQLI_ASSOC);
    }
    //kgthree students
    $kgthree_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='nursery2'";
    $kgthree_result = mysqli_query($sqlConnection, $kgthree_query);
    if($kgthree_result->num_rows>0){
        
        $kgthree_user = $kgthree_result->fetch_all(MYSQLI_ASSOC);
    }
    //basicone students
    $basicone_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='basic1'";
    $basicone_result = mysqli_query($sqlConnection, $basicone_query);
    if($basicone_result->num_rows>0){
        
        $basicone_user = $basicone_result->fetch_all(MYSQLI_ASSOC);
    }
    //basictwo students
    $basictwo_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='basic2'";
    $basictwo_result = mysqli_query($sqlConnection, $basictwo_query);
    if($basictwo_result->num_rows>0){
        
        $basictwo_user = $basictwo_result->fetch_all(MYSQLI_ASSOC);
    }
    //basicthree students
    $basicthree_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='basic3'";
    $basicthree_result = mysqli_query($sqlConnection, $basicthree_query);
    if($basicthree_result->num_rows>0){
        
        $basicthree_user = $basicthree_result->fetch_all(MYSQLI_ASSOC);
    }
    //basicone students
    $basicfour_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='basic4'";
    $basicfour_result = mysqli_query($sqlConnection, $basicfour_query);
    if($basicfour_result->num_rows>0){
        
        $basicfour_user = $basicfour_result->fetch_all(MYSQLI_ASSOC);
    }
    //basictwo students
    $basicfive_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='basic5'";
    $basicfive_result = mysqli_query($sqlConnection, $basicfive_query);
    if($basicfive_result->num_rows>0){
        
        $basicfive_user = $basicfive_result->fetch_all(MYSQLI_ASSOC);
    }
    //basicsix students
    $basicsix_query = "SELECT * FROM users WHERE usertype = 'student' AND students_class='basic6'";
    $basicsix_result = mysqli_query($sqlConnection, $basicsix_query);
    if($basicsix_result->num_rows>0){
        
        $basicsix_user = $basicsix_result->fetch_all(MYSQLI_ASSOC);
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
                                                <a class="nav-link active show" id="kgone-tab" data-toggle="pill" href="#kgone" role="tab" aria-controls="kgone"
                                                    aria-selected="true">
                                                    <i class="mdi mdi-home-variant d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">PRENURSERY</span>
                                                </a>
                                                <a class="nav-link" id="kgtwo-tab" data-toggle="pill" href="#kgtwo" role="tab" aria-controls="kgtwo"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-account-circle d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">NURSERY 1</span>
                                                </a>
                                                <a class="nav-link" id="kgthree-tab" data-toggle="pill" href="#kgthree" role="tab" aria-controls="kgthree"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-settings-outline d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">NURSERY 2</span>
                                                </a>
                                                <a class="nav-link" id="basicone-tab" data-toggle="pill" href="#basicone" role="tab" aria-controls="basicone"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-home-variant d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">BASIC 1</span>
                                                </a>
                                                <a class="nav-link" id="basictwo-tab" data-toggle="pill" href="#basictwo" role="tab" aria-controls="basictwo"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-account-circle d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">BASIC 2</span>
                                                </a>
                                                <a class="nav-link" id="basicthree-tab" data-toggle="pill" href="#basicthree" role="tab" aria-controls="basicthree"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-settings-outline d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">BASIC 3</span>
                                                </a>
                                                <a class="nav-link" id="basicfour-tab" data-toggle="pill" href="#basicfour" role="tab" aria-controls="basicfour"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-home-variant d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">BASIC 4</span>
                                                </a>
                                                <a class="nav-link" id="basicfive-tab" data-toggle="pill" href="#basicfive" role="tab" aria-controls="basicfive"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-account-circle d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">BASIC 5</span>
                                                </a>
                                                <!--<a class="nav-link" id="basicsix-tab" data-toggle="pill" href="#basicsix" role="tab" aria-controls="basicsix"-->
                                                <!--    aria-selected="false">-->
                                                <!--    <i class="mdi mdi-settings-outline d-lg-none d-block"></i>-->
                                                <!--    <span class="d-none d-lg-block">BASIC 6</span>-->
                                                <!--</a>-->
                                            </div>
                                        </div> <!-- end col-->

                                        <div class="col-sm-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade active show" id="kgone" role="tabpanel" aria-labelledby="kgone-tab">
                                                    <div class="row">
                                                        <?php if(isset($kgone_user)){
                                                        for ($i = 0; $i < sizeof($kgone_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $kgone_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$kgone_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $kgone_user[$i]['name'].' '.$kgone_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($kgone_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($kgone_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $kgone_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $kgone_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                   
                                                </div>
                                                <div class="tab-pane fade" id="kgtwo" role="tabpanel" aria-labelledby="kgtwo-tab">
                                                    <div class="row">
                                                        <?php if(isset($kgtwo_user)){
                                                        for ($i = 0; $i < sizeof($kgtwo_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $kgtwo_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$kgtwo_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $kgtwo_user[$i]['name'].' '.$kgtwo_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($kgtwo_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($kgtwo_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $kgtwo_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $kgtwo_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="kgthree" role="tabpanel" aria-labelledby="kgthree-tab">
                                                    <div class="row">
                                                        <?php if(isset($kgthree_user)){
                                                        for ($i = 0; $i < sizeof($kgthree_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $kgthree_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$kgthree_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $kgthree_user[$i]['name'].' '.$kgthree_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($kgthree_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($kgthree_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $kgthree_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $kgthree_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="basicone" role="tabpanel" aria-labelledby="basicone-tab">
                                                    <div class="row">
                                                        <?php if(isset($basicone_user)){
                                                        for ($i = 0; $i < sizeof($basicone_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $basicone_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$basicone_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $basicone_user[$i]['name'].' '.$basicone_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($basicone_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($basicone_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $basicone_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $basicone_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="basictwo" role="tabpanel" aria-labelledby="basictwo-tab">
                                                    <div class="row">
                                                        <?php if(isset($basictwo_user)){
                                                        for ($i = 0; $i < sizeof($basictwo_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $basictwo_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$basictwo_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $basictwo_user[$i]['name'].' '.$basictwo_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($basictwo_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($basictwo_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $basictwo_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $basictwo_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="basicthree" role="tabpanel" aria-labelledby="basicthree-tab">
                                                    <div class="row">
                                                        <?php if(isset($basicthree_user)){
                                                        for ($i = 0; $i < sizeof($basicthree_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $basicthree_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$basicthree_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $basicthree_user[$i]['name'].' '.$basicthree_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($basicthree_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($basicthree_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $basicthree_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $basicthree_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="basicfour" role="tabpanel" aria-labelledby="basicfour-tab">
                                                    <div class="row">
                                                        <?php if(isset($basicfour_user)){
                                                        for ($i = 0; $i < sizeof($basicfour_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $basicfour_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$basicfour_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $basicfour_user[$i]['name'].' '.$basicfour_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($basicfour_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($basicfour_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $basicfour_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $basicfour_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="basicfive" role="tabpanel" aria-labelledby="basicfive-tab">
                                                    <div class="row">
                                                        <?php if(isset($basicfive_user)){
                                                        for ($i = 0; $i < sizeof($basicfive_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $basicfive_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$basicfive_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $basicfive_user[$i]['name'].' '.$basicfive_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($basicfive_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($basicfive_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $basicfive_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $basicfive_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                                                    </div>
                                                                </div> <!-- end Pricing_card -->
                                                            </div> <!-- end col -->
                                                        <?php }
                                                        }else{
                                                            echo "No student in this class yet";                   
                                                                    
                                                        }; ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="basicsix" role="tabpanel" aria-labelledby="basicsix-tab">
                                                    <div class="row">
                                                        <?php if(isset($basicsix_user)){
                                                        for ($i = 0; $i < sizeof($basicsix_user); $i++){ ?>
                                                            <div class='col-md-3'>
                                                                <div class='card card-pricing'>
                                                                    <div class='card-body text-center'>
                                                                        <?php if( $basicsix_user[$i]['photo'] == null){
                                                                            echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        }else{
                                                                            echo "<img src=\"./inc/images/".$basicsix_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                                        } ?>
                                                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                                                            <?php echo $basicsix_user[$i]['name'].' '.$basicsix_user[$i]['surname']; ?>
                                                                        </h5>
                                                                        
                                                                        <ul class='card-pricing-features'>
                                                                        <li> <?php 
                                                                            if($basicsix_user[$i]['gender'] == null){
                                                                                $text = "<br /><br />";
                                                                            }else{

                                                                                $text= ucfirst($basicsix_user[$i]['gender']);
                                                                            }
                                                                            echo  $text; 
                                                                            ?> </li>
                                                                        </ul>
                                                                        <p class='text-muted'><?php echo $basicsix_user[$i]['students_class']; ?></p>
                                                                        <a href="./student-profile.php?id=<?php echo $basicsix_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
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