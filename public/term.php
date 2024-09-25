<?php 
    include "./inc/header.php";
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
                                <h4 class="mb-0 font-size-18">Choose Term</h4>

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

                    <div class="row">
                        <div class="col-md-4 col-xl-4 col-sm-4">
                            <div class='card card-pricing'>
                                <div class='card-body text-center'>
                                    
                                    <h5 class='font-weight-bold mt-2 text-uppercase'>
                                        First Term
                                    </h5>
                                    <ul class='card-pricing-features'>
                                    <li> </li>
                                    </ul>
                                    <a href="./compile_results.php?class=<?php echo $_GET['class']; ?>&term=first" class='btn btn-primary mt-4 mb-2 btn-rounded'>Compile Results for 1st Term<i class='mdi mdi-arrow-right ml-1'></i></a>
                                </div>
                            </div> <!-- end Pricing_card -->
                        </div>
                        <div class="col-md-4 col-xl-4 col-sm-4">
                            <div class='card card-pricing'>
                                <div class='card-body text-center'>
                                    
                                    <h5 class='font-weight-bold mt-2 text-uppercase'>
                                        Second Term
                                    </h5>
                                    <ul class='card-pricing-features'>
                                    <li> </li>
                                    <!-- <?php //var_dump($_SESSION);die;?> -->
                                    </ul>
                                    <a href="./compile_results.php?class=<?php echo $_GET['class']; ?>&term=second" class='btn btn-primary mt-4 mb-2 btn-rounded'>Compile Results for 2nd Term<i class='mdi mdi-arrow-right ml-1'></i></a>
                                </div>
                            </div> <!-- end Pricing_card -->
                        </div>
                        <div class="col-md-4 col-xl-4 col-sm-4">
                            <div class='card card-pricing'>
                                <div class='card-body text-center'>
                                    
                                    <h5 class='font-weight-bold mt-2 text-uppercase'>
                                        Third Term
                                    </h5>
                                    <ul class='card-pricing-features'>
                                    <li> </li>
                                    </ul>
                                    <a href="./compile_results.php?class=<?php echo $_GET['class']; ?>&term=third" class='btn btn-primary mt-4 mb-2 btn-rounded'>Compile Results for 3rd Term<i class='mdi mdi-arrow-right ml-1'></i></a>
                                </div>
                            </div> <!-- end Pricing_card -->
                        </div>
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>