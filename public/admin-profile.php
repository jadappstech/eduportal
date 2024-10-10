<?php 
    include "./inc/header.php";

//    include "./inc/config.php";

    if(!isset($_SESSION['name'])){
        header("Location: ./index.php");
    }

    $usertype = $usertype ?? null;
    $query = "SELECT * FROM users WHERE id = '$id'";
    // var_dump($username);die;
    $result = mysqli_query($sqlConnection, $query);

    if($result->num_rows > 0){
        $user = $result->fetch_all(MYSQLI_ASSOC);
    }

    $_SESSION['usertype'] = $user[0]['usertype'];
    $usertype = $_SESSION['usertype'];
    $school_fees = $user[0]['school_fees'];
    $my_class = $user[0]['students_class'];
    $_SESSION['my_class'] = $my_class;
    // var_dump($school_fees);die;
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
                                <h4 class="mb-0 font-size-18">Dashboard</h4>
                                    
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <h4><b>Welcome, <?php echo ucwords($user[0]['name']);?></b></h4>
                                        </div>
                                        <?php
                                        if($usertype == 'student'):
                                        echo "
                                            <div class='float-right'>
                                                <h4 class='m-0 d-print-none'>Bio</h4>
                                            </div>
                                            ";
                                        endif;
                                        ?>
                                    </div>
    
    
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-4 center">
                                                    <?php
                                                    if( $user[0]['photo'] == null){
                                                        echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"img-thumbnail\" style=\"border-radius: 50%; height: 100px; width:100px; background-size:auto;\">";
                                                    }else{
                                                        echo "<img src=\"./inc/images/".$user[0]['photo']."\" alt=".$user[0]['name']." class=\"img-thumbnail\" style=\"border-radius: 50%; height: 100px; width:100px; background-size:auto;\">";
                                                    } ?>
                                                    
                                                    <h6 class=""><?php echo strtoupper($user[0]['name'].' '.$user[0]['surname']);?></h6>
                                                    <!-- <p class=""><strong>#123456</strong></p> -->
                                                    <p class=""><strong><?php echo strtoupper($user[0]['regnum']);?></strong></p>
                                                </div>
                                                <div class="col-8">
                                                    
                                                </div>
                                            </div>
                                           
                                        </div><!-- end col -->
                                        <div class="col-6">
                                            <div class="mt-3 float-right">
                                                <?php
                                                    if($usertype == 'student'):
                                                        if($school_fees == 0){

                                                            echo "
                                                                <p class='mb-2 m-b-10'>You are yet to pay your<br> school fees for this term</p>
                                                                <p class='mb-2'>Click <strong><a href='./payments.php'>here</a></strong> to pay now.</p>
                                                                ";
                                                        }else{

                                                            echo "
                                                                <p class='mb-2 m-b-10'>Your school fees has been fully paid</p>
                                                                ";
                                                        }
                                                    endif;
                                                    ?>
                                                
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->
    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table mt-4">
                                                    <thead>
                                                    <tr>
                                                        <th colspan="9">
                                                            MY BIODATA
                                                        </th>
                                                       
                                                    </tr></thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><b>Academic year</b><br/></td>
                                                        <td>:</td>
                                                        <td class="text-right"><?php echo date('Y');?></td>
                                                        <td><b>Gender</b> <br/></td>
                                                        <td>:</td>
                                                        <td class="text-right"><?php echo strtoupper($user[0]['gender']);?></td>
                                                        <?php
                                                            if($usertype == 'student'){
                                                                echo "
                                                                    <td><b>Class</b> <br/> </td>
                                                                    <td>:</td>
                                                                    <td class='text-right'>".strtoupper($user[0]['students_class'])."</td>
                                                                ";
                                                            }
                                                        ?>
                                                    </tr>
                                                    <!-- //row 2 -->
                                                    <tr>
                                                        <td><b>Nationality</b><br/></td>
                                                        <td>:</td>
                                                        <td class="text-right"><?php echo strtoupper($user[0]['nationality']);?></td>
                                                        <td><b>State</b> <br/></td>
                                                        <td>:</td>
                                                        <td class="text-right"><?php echo strtoupper($user[0]['state']);?></td>
                                                        <td><b>LGA</b> <br/> </td>
                                                        <td>:</td>
                                                        <td class="text-right"><?php echo strtoupper($user[0]['lga']);?></td>
                                                    </tr>
                                                    <!-- //row 3 -->
                                                    <tr>
                                                        <td><b>Date of birth</b><br/></td>
                                                        <td>:</td>
                                                        <td class="text-right"><?php echo strtoupper($user[0]['dob']);?></td>
                                                        <td><b>Blood group</b> <br/></td>
                                                        <td>:</td>
                                                        <td class="text-right"><?php echo strtoupper($user[0]['bloodgroup']);?></td>
                                                        <td><b>Genotype</b> <br/> </td>
                                                        <td>:</td>
                                                        <td class="text-right"><?php echo strtoupper($user[0]['genotype']);?></td>
                                                    </tr>
    
                                                    <?php if($usertype == 'student'){

                                                        echo "
                                                        <tr>
                                                            <th colspan='9'>PARENT'S INFORMATION</th>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Full name</b><br/></td>
                                                            <td>:</td>
                                                            <td class='text-right'>".strtoupper($user[0]['parents_fullname'])."</td>
                                                            <td><b>Phone number</b> <br/></td>
                                                            <td>:</td>
                                                            <td class='text-right'><a href='tel:".strtoupper($user[0]['parents_number'])."'>".strtoupper($user[0]['parents_number'])."</a></td>
                                                            <td><b>WhatsApp number</b> <br/> </td>
                                                            <td>:</td>
                                                            <td class='text-right'>".strtoupper($user[0]['wphone'])."</td>
                                                        </tr>
                                                        <tr>
                                                        <td><b>Email</b><br/></td>
                                                        <td>:</td>
                                                        <td class='text-right'>".strtoupper($user[0]['parents_email'])."</td>
                                                        <td><b>Occupation</b> <br/></td>
                                                        <td>:</td>
                                                        <td class='text-right'>".strtoupper($user[0]['occupation'])."</td>
                                                        <td><b>Address</b> <br/> </td>
                                                        <td>:</td>
                                                        <td class='text-right'>".strtoupper($user[0]['address'])."
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan='9'>SPONSOR'S INFORMATION</th>
                                                    </tr>

                                                    <tr>
                                                        <td><b>Full name</b><br/></td>
                                                        <td>:</td>
                                                        <td class='text-right'>".strtoupper($user[0]['sponsor_fullname'])."</td>
                                                        <td><b>Phone number</b> <br/></td>
                                                        <td>:</td>
                                                        <td class='text-right'><a href='tel:".strtoupper($user[0]['sponsor_phone']).">".strtoupper($user[0]['parents_number'])."</a></td>
                                                        <td><b>WhatsApp number</b> <br/> </td>
                                                        <td>:</td>
                                                        <td class='text-right'>".strtoupper($user[0]['sponsor_wphone'])."</td>
                                                    </tr>
                                                    <!-- //row 6 -->
                                                    <tr>
                                                        <td><b>Email</b><br/></td>
                                                        <td>:</td>
                                                        <td class='text-right'>".strtoupper($user[0]['sponsor_email'])."</td>
                                                        <td><b>Occupation</b> <br/></td>
                                                        <td>:</td>
                                                        <td class='text-right'>".strtoupper($user[0]['sponsor_occupation'])."</td>
                                                        <td><b>Address</b> <br/> </td>
                                                        <td>:</td>
                                                        <td class='text-right'>".strtoupper($user[0]['sponsor_address'])."</td>
                                                    </tr>"
                                                        
                                                        ;
                                                    }?>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
    
                                    <div class="d-print-none my-4">
                                        <div class="text-right">
                                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                                            <?php
                                                // if($usertype == 'admin'):
                                                //     echo "<a href='edit-bio.php' class='btn btn-info waves-effect waves-light'>Edit my bio page</a>";
                                                // endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>