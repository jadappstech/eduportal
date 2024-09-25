<?php 
    include "./inc/header.php";
    include "./access-control.php";

    //here because of the pic on the navbar
    $query = "SELECT * FROM users WHERE usertype = 'student'";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the pic on the navbar -ends
    
    $query = "SELECT * FROM subjects";
    $run_query = mysqli_query($sqlConnection, $query);
    $result = $run_query -> fetch_all(MYSQLI_ASSOC);
    // var_dump($result[3]['level']);die;
    
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
                                <h4 class="mb-0 font-size-18">Settings</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Settings</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <form action="./inc/settings_api.php" method="POST">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            Add Subject 
                                        </div>
                                        <input type="text" class='form-control' name="subject" id="" placeholder='Enter subject'>
                                        <select name="level" class="form-control" id="level">
                                            <option selected disabled>Select Level</option>
                                            <option value="elementary">Elementary</option>
                                            <option value="elementary">Basic</option>
                                            <option value="high">High</option>
                                        </select>
                                        <input type="submit" class='form-control btn btn-primary mt-2' name="submit_subject" id="" value='Save subject'>
                                    </div>
                                    <div class="card-footer">
                                        <table>
                                           
                                        <?php
                                            for($i = 0; $i < count($result); $i++){
                                                echo(" <tr><td>".ucfirst($result[$i]['subject']) ."</td><td><i class='bx bx-right-arrow-alt'></i></td>") ;
                                                echo("<td class='text-right'>". ucfirst($result[$i]['level'])." Sch.</td>
                                                    <td><a href='./inc/delete_settings.php?id={$result[$i]['id']}&obj=subject' class=''><i class='bx bx-x' style='color: red'></i></a></td>
                                                </tr>") ;
                                            }
                                        ?>
                                         
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            Add Class 
                                        </div>
                                        <input type="text" class='form-control' name="grade" id="" placeholder='Enter class'>
                                        <input type="text" class='form-control' placeholder='' disabled>
                                        <input type="submit" class='form-control btn btn-primary mt-2' name="submit_class" id="" value='Save class'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>