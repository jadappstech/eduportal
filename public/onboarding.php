<?php
    include "./inc/header.php";
    include_once "access-control.php";
    //here because of the pic on the navbar
    $query = "SELECT * FROM users WHERE usertype = 'student'";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the pic on the navbar -ends
?>
<style>
  select, option{
    text-transform: uppercase;
  }
</style>
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
                                <h4 class="mb-0 font-size-18">Onboarding</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Onboarding</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Onboard a new user</h4>
                                    <!-- <p class="card-subtitle mb-4">If your form layout allows it, you can swap the <code>.{valid|invalid}-feedback</code> classes for <code>.{valid|invalid}-tooltip</code> classes to display validation feedback in a styled tooltip. Be sure to have a parent with <code>position: relative</code> on it for tooltip positioning. In the example below, our column classes have this already, but your project may require an alternative setup.</p> -->
                                    <form class="needs-validation" novalidate action="./config/login/onboard-user.php" method="POST">
                                        <div class="form-row">
                                          <div class="col-md-4 mb-3">
                                            <label for="validationTooltip02">Surname</label>
                                            <input type="text" class="form-control" name="surname" id="validationTooltip02" placeholder="Surname" value="" required>
                                            <div class="valid-tooltip">
                                              Looks good!
                                            </div>
                                          </div>
                                          <div class="col-md-4 mb-3">
                                            <label for="validationTooltip01">Other names</label>
                                            <input type="text" class="form-control" name="name" id="validationTooltip01" placeholder="First name" value="" required>
                                            <div class="valid-tooltip">
                                              Looks good!
                                            </div>
                                          </div>
                                          <div class="col-md-4 mb-3">
                                            <label for="students_class">Student's class</label>
                                                <select name="students_class" id="students_class" class="form-control">
                                                    <option disabled selected>Select Class</option>
                                                    <?php
                                                        
                                                        $classes_query = "SELECT * FROM student_classes";// WHERE usertype = 'student' AND students_class='jss1'";
                                                        $classes_result = mysqli_query($sqlConnection, $classes_query);
                                                        if($classes_result->num_rows>0){
                                                            
                                                            $classes_user = $classes_result->fetch_all(MYSQLI_ASSOC);
                                                        }
                                                        // $selected_class = strtolower($user[0]['students_class']);
                                                        // var_dump($selected_class);die;
                                                        for($i = 0; $i < sizeof($classes_user); $i++){
                                                            echo "<option value=".$classes_user[$i]['grade'].">".$classes_user[$i]['grade']."</option>";
                                                        }
                                                        ?>
                                                </select>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationTooltip03">Email</label>
                                                <input type="email" class="form-control" name="email" id="validationTooltip03" placeholder="Enter User's email" value="" required>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                              <div class="row">
                                                <div class="col-lg-4">
                                                <label for="validationTooltip04">Registration Number</label>
                                                  <select name="regid" id="regid" class="form-control">
                                                    <option value="GBA/PRY">GBA/PRY</option>
                                                    <option value="GBA/SEC">GBA/SEC</option>
                                                  </select>
                                                </div>
                                                <div class="col-lg-8">

                                                  <label for="validationTooltip04">&nbsp;</label>
                                                  <input type="text" name="regnum" class="form-control" id="validationTooltip04" min="5" placeholder="Registration Number" required>
                                                  <div class="invalid-tooltip">
                                                    Registration Number should be at least 5 characters!
                                                  </div>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                          <div class="col-md-4 mb-3">
                                            <label for="validationTooltip03">Password (at least 8 characters)</label>
                                            <input type="text" class="form-control" name="password" id="validationTooltip03" placeholder="Password" min="8" required>
                                            <div class="invalid-tooltip">
                                              Password should be atleast 8 characters!
                                            </div>
                                          </div>
                                        </div>
                                        <button class="btn btn-primary waves-effect waves-light" id="sa-success" type="submit">Submit Form</button>
                                      </form>
                                    
                                </div> <!-- end card-body-->
                            </div> <!-- end card -->
                        </div> <!-- end col-->
                    </div> <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>