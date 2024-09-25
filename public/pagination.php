<?php 
    include "./inc/header.php";
    // include_once "access-control.php";

    
    $per_page = 4;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $start_from = ($page-1) * $per_page;

    $query = "SELECT * FROM users WHERE usertype = 'student' ORDER BY 1 DESC LIMIT $start_from, $per_page";
    $result = mysqli_query($sqlConnection, $query);
    if($result->num_rows>0){
        
        $user = $result->fetch_all(MYSQLI_ASSOC);
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
                                <h4 class="mb-0 font-size-18">Teachers</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Teachers</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class='row mt-sm-3 mt-2 mb-2'>
                        <?php for ($i = 0; $i < sizeof($user); $i++){ ?>
                           <div class='col-md-3'>
                                <div class='card card-pricing'>
                                    <div class='card-body text-center'>
                                        <?php if( $user[$i]['photo'] == null){
                                                echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                            }else{
                                                echo "<img src=\"./inc/images/".$user[$i]['photo']."\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 20px; height: 100px; width:100px; background-size:auto;\">";
                                        } ?>
                                        <h5 class='font-weight-bold mt-2 text-uppercase'>
                                            <?php echo $user[$i]['name'].' '.$user[$i]['surname']; ?>
                                        </h5>
                                        
                                        <ul class='card-pricing-features'>
                                        <li> <?php 
                                            if($user[$i]['gender'] == null){
                                                $text = "<br /><br />";
                                            }else{

                                                $text= ucfirst($user[$i]['gender']);
                                            }
                                            echo  $text; 
                                            ?> </li>
                                        </ul>
                                        <p class='text-muted'><?php echo $user[$i]['students_class']; ?></p>
                                        <a href="./profile.php?id=<?php echo $user[$i]['id']; ?>" class='btn btn-primary mt-4 mb-2 btn-rounded'>Visit Profile <i class='mdi mdi-arrow-right ml-1'></i></a>
                                    </div>
                                </div> <!-- end Pricing_card -->
                            </div> <!-- end col -->
                            <?php }; ?>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <?php
                                    $pagn = "SELECT * FROM users WHERE usertype = 'student'";
                                    $result = mysqli_query($sqlConnection, $pagn);
                                    $total_records = mysqli_num_rows($result);
                                    $total_pages = ceil($total_records / $per_page);
                                    // var_dump(!$_GET['page']);die;
                                    if(!(isset($_GET['page']))){

                                        $_GET['page'] = 1;
                                    }
                                    if(!($_GET['page'])){

                                        echo "
                                            <li class='active page-item'><a class='page-link waves-effect' href='pagination.php?page=1'>1</a></li>
                                        "; 
                                    }
                                    for($i = 1; $i <= $total_pages; $i++){

                                        if($_GET['page'] == $i){

                                            echo "
                                                <li class='page-item active'><a class='page-link waves-effect' href='pagination.php?page=$i'>$i</a></li>
                                                ";
                                            }else{
                                               echo "<li class='page-item'><a class='page-link waves-effect' href='pagination.php?page=$i'>$i</a></li>";
                                            }
                                        }
                                       
                                ?>
                            </ul>
                        </nav>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>