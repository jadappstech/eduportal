<?php 
    include "./inc/header.php";
    include_once "access-control.php";

    //here because of the pic on the navbar
    $query = "SELECT * FROM users WHERE usertype = 'student'";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the pic on the navbar -ends

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

                    <div class="row">
                        <?php //var_dump($_POST);?>
                        <div class="col-xl-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Potential Students</h4>
                                        <!-- <p class="card-subtitle mb-4"> Use <code>.table-striped</code> to add zebra-striping
                                            to any table row
                                            within the <code>&lt;tbody&gt;</code>. </p> -->

                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone number</th>
                                                        <th>Number of kids</th>
                                                        <th>kids Info</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query = "SELECT * FROM potential_students";// WHERE id = '$id'";
                                                        $result = mysqli_query($sqlConnection, $query);
                                                        $this_user = $result->fetch_all(MYSQLI_ASSOC);
                                                        // var_dump($this_user);
                                                        if($this_user){
                                                            for($i = 0, $j = 1; $i < count($this_user); $i++, $j++){

                                                                echo "
                                                                    <tr>
                                                                        <th scope='row'>".$j."</th>
                                                                        <th scope='row'>".$this_user[$i]['myname']."</th>
                                                                        <td>".$this_user[$i]['email']."</td>
                                                                        <td>".$this_user[$i]['phone_number']."</td>
                                                                        <td>".$this_user[$i]['num_of_kids']."</td>
                                                                        <td>";
                                                                        $json = $this_user[$i]['kids_info'];
                                                                        $data = json_decode($json, true);
                                                                        if($data == null){

                                                                            echo " - ";
                                                                        }else{

                                                                            foreach ($data as $key => $value) {
                                                                                echo $key . ': ' . $value . '<br>';
                                                                            }
                                                                        }

                                                                        // for($i = 0; $i < $this_user[$i]['kids']; $i++){
                                                                        //     echo $i;
                                                                        // };
                                                                        // die;
                                                                        //.$this_user[$i]['kids_info']
                                                                        "</td>
                                                                    </tr>
                                                                ";
                                                            }
                                                        }else{
                                                           echo "<tr>
                                                                <th scope='row' colspan = '5'>No record found</th>
                                                            </tr>";
                                                        }
                                                    ?>
                                                   
                                                </tbody>
                                            </table>
                                            </div>
                                        </div> <!-- end table-responsive-->
                                    </div>
                                    <!-- end card-body-->
                                </div>
                                <!-- end card -->
                            </div>
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>