<?php 
 require_once "./inc/header.php";
 include_once "access-control.php";
 //    require_once "./inc/config.php";
$states = require_once "./inc/fetch_states.php";
//    $lga = require_once "./inc/fetch_lga.php";

 if(!isset($_SESSION['name'])){
     header("Location: ./index.php");
 }

 //here because of the pic on the navbar
 $query = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
 $run_query = mysqli_query($sqlConnection, $query);
 $user = $run_query->fetch_all(MYSQLI_ASSOC);
 //here because of the pic on the navbar -ends
 
 $usertype = $usertype ?? null;

 $user_id = $_GET['id'];
 $_SESSION['edit_users_id'] = $user_id;
 $_SESSION['toEditUser'] = true;
 $query = "SELECT * FROM users WHERE id = '$user_id'";
 
 $result = mysqli_query($sqlConnection, $query);

 if($result->num_rows > 0){
     $edit_user = $result->fetch_all(MYSQLI_ASSOC);
 }

$usertype = $_SESSION['usertype'];
if($usertype != 'admin'){
    echo "You can't access this page";
    die;
}

// var_dump($edit_user[0]['name']);die;

?>
<body>
    <div id="layout-wrapper">
        <?php include "./inc/navbar.php"; ?>
        <div class="vertical-menu">
            <?php include "./inc/sidebar.php"; ?>    
        </div>
        
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Edit <?php echo $edit_user[0]['name'].' '.$edit_user[0]['surname'].'\'s profile' ; ?></h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Edit Student</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                    
                    <form action="./inc/update-bio.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                        <h4 class="card-title">Basic Details </h4>
                                        <div class="row">
                                            <div class="col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label for="regnum">Registration Number</label>
                                                    <input type="text" id="regnum" name="regnum" class="form-control" placeholder="Enter your text" value="<?php echo $edit_user[0]['regnum']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label for="students_name">First name</label>
                                                    <input type="text" name="students_name" id="students_name" class="form-control" placeholder="Enter your text" value="<?php echo $edit_user[0]['name']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label for="surname">Surname</label>
                                                    <input type="text" id="surname" name="surname" class="form-control" placeholder="Enter your text" value="<?php echo $edit_user[0]['surname']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select name="gender" id="gender" class="form-control">
                                                        <option disabled>Select Gender</option>
                                                        <?php
                                                            $selected_gender = $this_user[0]['gender'];
                                                            // var_dump($selected_gender);die;
                                                            $gender_query = "SELECT * FROM gender";
                                                            $result = mysqli_query($sqlConnection, $gender_query);
                                                            $gender = $result->fetch_all(MYSQLI_ASSOC);
                                                            // var_dump($gender[1]['gender']);die;
                                                            for($i = 0; $i < sizeof($gender); $i++){
                                                                if($selected_gender == $gender[$i]['gender']){

                                                                    echo "<option value=".$gender[$i]['gender']." selected='selected'>".$gender[$i]['gender']."</option>";
                                                                }else{
                                                                    
                                                                    echo "<option value=".$gender[$i]['gender'].">".$gender[$i]['gender']."</option>";
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="<?php echo $edit_user[0]['email']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label for="students_class">Class</label>
                                                    <select class="form-control" id="students_class" name="students_class">
                                                        <option disabled>Choose class</option>
                                                        <?php
                                                                $classes_query = 'SELECT * FROM student_classes';// WHERE usertype = 'student' AND students_class='jss1'';
                                                                $classes_result = mysqli_query($sqlConnection, $classes_query);
                                                                if($classes_result->num_rows>0){
                                                                    $this_users_class = $classes_result->fetch_all(MYSQLI_ASSOC);
                                                                }
                                                                // print_r($this_users_class);die;
                                                                $selected_class = strtolower($edit_user[0]['students_class']);
                                                                for($i = 0; $i < sizeof($this_users_class); $i++){
                                                                    if($selected_class == $this_users_class[$i]['grade']){
                                                                // var_dump($selected_class == $this_users_class[$i]['grade']);die;
    
                                                                        echo "<option value='".$this_users_class[$i]['grade']."' selected>".ucfirst($this_users_class[$i]['grade'])."</option>";
                                                                    }else{
                                                                        
                                                                        echo "<option value=".$this_users_class[$i]['grade'].">".ucfirst($this_users_class[$i]['grade'])."</option>";
                                                                    }
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label for="dob">Date of birth</label>
                                                    <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $edit_user[0]['dob']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label for="nationality">Nationality</label>
                                                    <input type="text" id="nationality" class="form-control" name="nationality" placeholder="Enter your Nationality" value="<?php echo $edit_user[0]['nationality']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" value="<?php echo $edit_user[0]['state']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label for="lga">Local Govt.</label>
                                                    <input type="text" class="form-control" id="lga" name="lga" placeholder="Enter Local Govt" value="<?php echo $edit_user[0]['lga']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="bloodgroup">Blood Group</label>
                                                    <input type="text" name="bloodgroup" id="bloodgroup" class="form-control" placeholder="Enter your Blood Group" value="<?php echo $edit_user[0]['bloodgroup']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="genotype">Genotype</label>
                                                    <input type="text" id="genotype" name="genotype" class="form-control" placeholder="Enter your genotype" value="<?php echo $edit_user[0]['genotype']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col-xl-12 -->
                    
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Father's Information </h4>
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="parents_fullname">Full name</label>
                                                <input type="text" id="parents_fullname" name="parents_fullname" class="form-control" placeholder="Enter your text" value="<?php echo $edit_user[0]['parents_fullname']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone number</label>
                                                <input type="number" class="form-control" name="parents_phone" id="parents_phone" placeholder="Enter Phone number" value="<?php echo $edit_user[0]['parents_phone']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="parents_email" name="parents_email" placeholder="Enter email" value="<?php echo $edit_user[0]['parents_email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="wphone">Whatsapp Phone no</label>
                                                <input type="number" class="form-control" name="wphone" id="wphone" placeholder="Enter Whatsapp number" value="<?php echo $edit_user[0]['wphone']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="occupation">Occupation</label>
                                                <input type="text" id="occupation" class="form-control" name="occupation" placeholder="Enter Occupation" value="<?php echo $edit_user[0]['occupation']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Residential Address</label>
                                                <textarea name="address" id="address" cols="31" rows="3" class="form-control"><?php echo $edit_user[0]['address']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Office Phone no</label>
                                                <input type="number" class="form-control" name="office_phone" id="office_phone" placeholder="Enter office phone number" value="<?php echo $edit_user[0]['office_phone']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Office Address</label>
                                                <textarea name="office_address" id="office_address" cols="31" rows="3" class="form-control"><?php echo $edit_user[0]['office_address']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col-xl-6 -->
                    
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Mother's Information </h4>
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="sponsor_fullname">Full name</label>
                                                <input type="text" id="sponsor_fullname" name="sponsor_fullname" class="form-control" placeholder="Enter Mother's name" value="<?php echo $edit_user[0]['sponsor_fullname']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="sponsor_phone">Phone number</label>
                                                <input type="number" class="form-control" name="sponsor_phone" id="sponsor_phone" placeholder="Enter phone number" value="<?php echo $edit_user[0]['sponsor_phone']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="sponsor_email">Email</label>
                                                <input type="email" class="form-control" id="sponsor_email" name="sponsor_email" placeholder="Enter email" value="<?php echo $edit_user[0]['sponsor_email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Whatsapp Phone no</label>
                                                <input type="number" class="form-control" name="sponsor_wphone" id="sponsor_wphone" placeholder="Enter Whatsapp number" value="<?php echo $edit_user[0]['sponsor_wphone']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="sponsor_occupation">Occupation</label>
                                                <input type="text" id="sponsor_occupation" class="form-control" name="sponsor_occupation" placeholder="Enter occupation" value="<?php echo $edit_user[0]['sponsor_occupation']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="sponsor_address">Residential Address</label>
                                                <textarea name="sponsor_address" id="sponsor_address" cols="31" rows="3" class="form-control"><?php echo $edit_user[0]['sponsor_address']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="sponsor_office_phone">Office Phone no</label>
                                                <input type="number" class="form-control" name="sponsor_office_phone" id="sponsor_office_phone" placeholder="Enter office phone number" value="<?php echo $edit_user[0]['sponsor_office_phone']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="sponsor_office_address">Office Address</label>
                                                <textarea name="sponsor_office_address" id="sponsor_office_address" cols="31" rows="3" class="form-control"><?php echo $edit_user[0]['sponsor_office_address']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col-xl-6 -->
                        <div class="col-xl-12">
                            <button type="submit" class="btn btn-block btn-primary btn-md">Submit</button>
                        </div>
                    </div> <!-- end row -->
                    </form>
                </div> <!-- end container-fluid -->
            </div> <!-- end page-content -->
        </div> <!-- end main-content -->
        <?php include "./inc/footer.php"; ?>
    </div> <!-- end layout-wrapper -->
    
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/metismenu.min.js"></script>
    <script src="./assets/js/simplebar.min.js"></script>
    <script src="./assets/js/waves.min.js"></script>
    <script src="./assets/js/app.js"></script>
</body>
</html>
