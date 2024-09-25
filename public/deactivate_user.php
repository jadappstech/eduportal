<?php 
    include "./inc/header.php";
    include "./access-control.php";
    include_once "./inc/config.php";

    //here because of the navbar pic
    $user_query = "SELECT * FROM users";
    $run_query = mysqli_query($sqlConnection, $user_query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the navbar pic
    
    $query = "SELECT * FROM users WHERE active = 1";
    $usernames = mysqli_query($sqlConnection, $query);
    if($usernames -> num_rows > 0){
        $usernames = $usernames->fetch_all(MYSQLI_ASSOC);
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
                                <h4 class="mb-0 font-size-18">Deactivate User</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Deactivate User</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <form action="./inc/deactivate_user_api.php" method="POST">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <select name="username" id="username" class="form-control">
                                    <option selected disabled>Select username</option>
                                    <?php
                                        for($i = 0; $i < count($usernames); $i++){
                                            echo "
                                                <option value='".$usernames[$i]['id']."'>{$usernames[$i]['name']} {$usernames[$i]['surname']}</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <button class='btn btn-primary form-control' type="submit" name="deactivate" id="deactivate">Deactivate user</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>