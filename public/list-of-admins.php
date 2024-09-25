<?php 
    include "./inc/header.php";
    include_once "access-control.php";

    //here because of the pic on the navbar
    $query = "SELECT * FROM users WHERE usertype = 'student'";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the pic on the navbar -ends
    
    $query = "SELECT * FROM users WHERE usertype = 'admin'";
    $result = mysqli_query($sqlConnection, $query);
    if($result->num_rows>0){
        
        $this_user = $result->fetch_all(MYSQLI_ASSOC);
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
                                <h4 class="mb-0 font-size-18">Administrators</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Administrators</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class='row mt-sm-3 mt-2 mb-2'>
                        <?php for ($i = 0; $i < sizeof($this_user); $i++){ ?>
                           <div class='col-md-3'>
                                <div class='card card-pricing'>
                                    <div class='card-body text-center'> 
                                        <?php if( $this_user[$i]['photo'] == null){
                                                    echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                }else{
                                                    echo "<img src=\"./inc/images/".$this_user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                                } ?>
                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                            <?php echo $this_user[$i]['name'].' '.$this_user[$i]['surname']; ?>
                                        </h5>
                                        
                                        <ul class='card-pricing-features'>
                                            <li> <?php 
                                            if($this_user[$i]['gender'] == null){
                                                $text = "<br /><br />";
                                            }else{

                                                $text= ucfirst($this_user[$i]['gender']);
                                            }
                                            echo  $text; 
                                            ?> </li>
                                        </ul>
                                        <p class='text-muted'><?php echo $this_user[$i]['students_class']; ?></p>
                                        <a href="./teacher-profile.php?id=<?php echo $this_user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                    </div>
                                </div> <!-- end Pricing_card -->
                            </div> <!-- end col -->
                        <?php }; ?>
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>