
<?php
    include_once('./inc/config.php');

    $sqlConnection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);// Check connection
    if ($sqlConnection->connect_error) {
        returnJson(STATUS_ERROR, SQL_CONNECTION_ERROR, INTERNAL_SERVER_ERROR);
        die();
    }
 
    // var_dump($gender[0]['gender']);die;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Beavers Preparatory School Portal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
    
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />
    
    </head>
<body class="bg-primary">

    <div>
    <div class="container-fluid">
        <div class="content">

        </div>


        <div class="row mt-4">
            <div class="col-xl-7 m-auto">
                <div class="card">
                    
                    <div class="card-body py-4">
                        <div class="card-title">
                            <h3 class = "text-center">Registration Page</h3>
                        </div>
                        <!-- <form method="POST"> -->
                        <form action="./inc/register-new-student.php" method="POST">
                        <h4 class="card-title">Basic Details </h4>
                        <!-- <p class="card-subtitle mb-4">Textual form controls—like <code>input</code>s,<code> selects</code>, and<code> textare</code>s—are styled with the .form-control class. Included are styles for general appearance, focus state, sizing, and more. </p> -->

                        <div class="row">

                            <div class="col-xl-12">
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="students_name">First name</label>
                                            <input type="text" name="students_name" id="students_name" class="form-control" placeholder="Enter your text" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                        <label for="surname">Surname</label>
                                        <input type="text" id="surname" name="surname" class="form-control" placeholder="Enter your text" value="">
                                    </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <!-- <input type="text" class="form-control" id="gender" name="gender" value=<?php //echo strtoupper($user[0]["students_class"]);?>> -->
                                            <select name="gender" id="gender" class="form-control">
                                                <option disabled selected>Select Gender</option>
                                                <?php
                                                       $query = "SELECT * FROM gender";
                                                       $result = mysqli_query($sqlConnection, $query);
                                                       if($result->num_rows>0){
                                                           
                                                           $gender = $result->fetch_all(MYSQLI_ASSOC);
                                                       }

                                                       for($i = 0; $i < count($gender); $i++){
                                                           echo "<option value=\"$gender[$i]['gender']\">". $gender[$i]['gender']."</option>";

                                                       }
                                                ?>
                                                <?php
                                                    // var_dump($selected_gender);die;
                                                    // $gender_query = "SELECT * FROM gender";
                                                    // $result = mysqli_query($sqlConnection, $gender_query);
                                                    // $gender = $result->fetch_all(MYSQLI_ASSOC);
                                                    // var_dump($gender[1]['gender']);die;
                                                    // for($i = 0; $i < sizeof($gender); $i++){
                                                    //     echo "<option value=".$gender[$i]['gender'].">".$gender[$i]['gender']."</option>";
                                                    // }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="students_class">Previous school</label>
                                            <input type="text" class="form-control" id="prev_school" name="prev_school" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="students_class">Class</label>
                                            <!-- <input type="text" class="form-control" id="students_class" name="students_class" value=""> -->
                                                <select id="students_class" name="students_class" class="form-control">
                                                    <option selected disabled>Select your class</option>
                                                    <?php
                                                       $query = "SELECT * FROM student_classes";
                                                       $result = mysqli_query($sqlConnection, $query);
                                                       if($result->num_rows>0){
                                                           
                                                           $student_class = $result->fetch_all(MYSQLI_ASSOC);
                                                       }

                                                       var_dump($student_class);
                                                       for($i = 0; $i < count($student_class); $i++){
                                                           echo "<option value=\"$student_class[$i]['grade']\">". $student_class[$i]['grade']."</option>";

                                                       }
                                                ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="dob">Date of birth</label>
                                            <input type="date" name="dob" id="dob" class="form-control" placeholder="Enter your text">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="nationality">Nationality</label>
                                            <input type="text" id="nationality" class="form-control" name="nationality" placeholder="Enter your Nationality" value=''>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" id="state" name="state" value=''>

                                            <!-- <select class="form-control" id="state" name="state" required="">
                                                <option selected disabled>Select one</option>
                                                    <?php

                                                        // for ($i = 0; $i < sizeof($states); $i++){
                                                    ?>        
                                                    <option value=<?php //echo $states[$i]->id;?>><?php //echo $states[$i]->name;?></option>
                                                <?php //} ?>
                                            
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="lga">Local Govt.</label>
                                            <input type="text" class="form-control" id="lga" name="lga" required="" value=''>
                                            <!-- <select class="form-control" id="lga" name="lga" required="">
                                                <option selected disabled>Select one</option>
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="bloodgroup">Blood Group</label>
                                            <input type="text" name="bloodgroup" id="bloodgroup" class="form-control" placeholder="Enter your Blood Group" value=''>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="genotype">Genotype</label>
                                            <input type="text" id="genotype" name="genotype" class="form-control" placeholder="Enter your genotype" value=''>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title">Father's Information </h4>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="parents_fullname">Full name</label>
                                                <input type="text" id="parents_fullname" name="parents_fullname" class="form-control" placeholder="Enter your text" value=''>
                                            </div>

                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="phone">Phone number</label>
                                                <input type="number" class="form-control" name="parents_phone" id="parents_phone" placeholder="" value=''>
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="parents_email" name="parents_email" placeholder="" value=''>
                                            </div>
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="wphone">Office phone number</label>
                                                <input type="number" class="form-control" id="office_phone" name="office_phone" placeholder="" value=''>
                                            </div>
                                        <!-- </form> -->
                                    </div>
                                                                            
                                    
                                    <div class="col-xl-6 col-lg-6">

                                        <div class="form-group col-lg-6 col-xl-12">
                                            <label for="occupation">Occupation</label>
                                            <input type="text" id="occupation" class="form-control" name="occupation" placeholder="Enter your text" value=''>
                                        </div>
                                        
                                        <div class="form-group col-lg-6 col-xl-12">
                                            <label for="wphone">WhatsApp number</label>
                                            <input type="number" class="form-control" id="wphone" name="wphone" placeholder="" value=''>
                                        </div>
                                        
                                        <div class="form-group col-lg-6 col-xl-12">
                                            <label for="address">Residential Address</label>
                                            <textarea name="address" id="address" class="form-control"></textarea>
                                        </div>
                                                                
                                        <div class="form-group col-lg-6 col-xl-12">
                                            <label for="office_address">Office Address</label>
                                            <textarea name="office_address" id="office_address" class="form-control"></textarea>
                                        </div>

                                    </div>
                                </div>
                                <h4 class="card-title">Mother's Information </h4>
                                <div class="row">

                                    <div class="col-xl-6 col-lg-6">

                                        <form>
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="sponsor_fullname">Full name</label>
                                                <input type="text" id="sponsor_fullname" name="sponsor_fullname" class="form-control" placeholder="Enter your text" value=''>
                                            </div>
                                            

                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="sponsor_phone">Phone number</label>
                                                <input type="number" class="form-control" name="sponsor_phone" id="sponsor_phone" placeholder="" value=''>
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="sponsor_email">Email Address</label>
                                                <input type="email" class="form-control" id="sponsor_email" name="sponsor_email" placeholder="" value=''>
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="sponsor_office_phone">Office number</label>
                                                <input type="number" class="form-control" id="sponsor_office_phone" name="sponsor_office_phone" placeholder="" value=''>
                                            </div>
                                        <!-- </form> -->
                                    </div>
                                                                            
                                    
                                    <div class="col-xl-6 col-lg-6">

                                        <div class="form-group col-lg-6 col-xl-12">
                                            <label for="sponsor_occupation">Occupation</label>
                                            <input type="text" id="sponsor_occupation" class="form-control" name="sponsor_occupation" placeholder="Enter your text" value=''>
                                        </div>
                                        
                                        <div class="form-group col-lg-6 col-xl-12">
                                            <label for="sponsor_wphone">WhatsApp number</label>
                                            <input type="number" class="form-control" id="sponsor_wphone" name="sponsor_wphone" placeholder="" value=''>
                                        </div>
                                        
                                        <div class="form-group col-lg-6 col-xl-12">
                                            <label for="sponsor_address">Residential Address</label>
                                            <textarea name="sponsor_address" id="sponsor_address" class="form-control"></textarea>
                                        </div>
                                        
                                        <div class="form-group col-lg-6 col-xl-12">
                                            <label for="sponsor_office_address">Office Address</label>
                                            <textarea name="sponsor_office_address" id="sponsor_office_address" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- //medical info -->
                                <h4 class="card-title">Medical Information </h4>
                                <div class="row">

                                    <div class="col-xl-12 col-lg-12">

                                        <form>
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="infection_record">Upload Infection Record</label>
                                                <input type="file" id="infection_record" name="infection_record" class="form-control" placeholder="Enter your text" value=''>
                                            </div>

                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="birth_cert">Upload Birth Certificate</label>
                                                <input type="file" class="form-control" name="birth_cert" id="birth_cert" placeholder="" value=''>
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="vaccine_rec">Upload Vaccine Record</label>
                                                <input type="file" class="form-control" id="vaccine_rec" name="vaccine_rec" placeholder="" value=''>
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="food_allergy">Food Allergy</label>
                                                <input type="text" class="form-control" id="food_allergy" name="food_allergy" placeholder="" value=''>
                                            </div>
                                        <!-- </form> -->
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <input class="btn waves-effect waves-light btn-block btn-primary" id="sa-success" type="submit" value="Update">
                    </div>
                    </form>
                    <!-- end card-body-->
                </div>
                <!-- end card -->

            </div> <!-- end col -->

        </div>
<!-- <button type="button" id="submitbio" class="btn waves-effect waves-light btn-block btn-outline-success">Update</button> -->
<!-- end row-->
</div> <!-- container-fluid -->
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>

</body>

</html>