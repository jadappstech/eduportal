<?php 
    require_once "./inc/header.php";
    
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
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <form method="POST"> -->
                                    <form action="./inc/update-bio.php" method="POST" enctype="multipart/form-data">
                                    <h4 class="card-title">Basic Details </h4>
                                    <!-- <p class="card-subtitle mb-4">Textual form controls—like <code>input</code>s,<code> selects</code>, and<code> textare</code>s—are styled with the .form-control class. Included are styles for general appearance, focus state, sizing, and more. </p> -->

                                    <div class="row">

                                        <div class="col-xl-12">
                                            <div class="row">
                                                <div class="col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="name">Registration Number</label>
                                                        <input type="text" id="regnum" name="regnum" class="form-control" placeholder="Enter your text" value="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="students_name">First name</label>
                                                        <input type="text" name="students_name" id="students_name" class="form-control" placeholder="Enter your text" value=>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                    <label for="surname">Surname</label>
                                                    <input type="text" id="surname" name="surname" class="form-control" placeholder="Enter your text" value=>
                                                </div>
                                                </div>
                                                <div class="col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <!-- <input type="text" class="form-control" id="gender" name="gender" value=<?php //echo strtoupper($user[0]["students_class"]);?>> -->
                                                        <select name="gender" id="gender" class="form-control">
                                                            <option disabled>Select Gender</option>
                                                            
                                                              <option value="" selected='selected'>Hi</option>
                                                                
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="students_class">Class</label>
                                                        <input type="text" class="form-control" id="students_class" name="students_class" value=>
                                                            <!-- <option selected disabled>Select your class</option>
                                                            <option value="jss1">JSS1</option>
                                                            <option value="jss2">JSS2</option>
                                                            <option value="jss3">JSS3</option>
                                                            <option value="sss1">SSS1</option>
                                                            <option value="sss2">SSS2</option>
                                                            <option value="sss3">SSS3</option>
                                                        </select> -->
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
                                                <!--<div class="col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="photo">My Photo</label>
                                                         <input type="file" id="photo" name="photo" class="form-control" placeholder="Select you profile picture"> 
                                                    </div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card -->

                        </div> <!-- end col -->
                    
                        <div class="col-xl-6">
                            <div class="card">

                            <div class="card-body">
                                    <h4 class="card-title">Father's Information </h4>
                                    <!-- <p class="card-subtitle mb-4">Textual form controls—like <code>input</code>s,<code> selects</code>, and<code> textare</code>s—are styled with the .form-control class. Included are styles for general appearance, focus state, sizing, and more. </p> -->
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6">
                                                <div class="form-group col-lg-6 col-xl-12">
                                                    <label for="fathers_fullname">Full name</label>
                                                    <input type="text" id="fathers_fullname" name="fathers_fullname" class="form-control" placeholder="Enter your text" value=''>
                                                </div>
                                                
        
                                                <div class="form-group col-lg-6 col-xl-12">
                                                    <label for="phone">Phone number</label>
                                                    <input type="number" class="form-control" name="parents_phone" id="parents_phone" placeholder="" value=''>
                                                </div>
                                                
                                                <div class="form-group col-lg-6 col-xl-12">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="parents_email" name="parents_email" placeholder="" value=''>
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                                                                  
                                        
                                        <div class="col-xl-6 col-lg-6">
    
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="occupation">Occupation</label>
                                                <input type="text" id="occupation" class="form-control" name="occupation" placeholder="Enter your text" value=''>
                                            </div>
                                            
                                                                                        
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="address">Residential Address</label>
                                                <textarea name="address" id="address" cols="31" rows="3"></textarea>
                                            </div>

                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="address">Office Address</label>
                                                <textarea name="address" id="address" cols="31" rows="3"></textarea>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-->

                        </div> <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card">

                            <div class="card-body">
                                    <h4 class="card-title">Mother's Information </h4>
                                  
                                    <div class="row">

                                        <div class="col-xl-6 col-lg-6">

                                            <!-- <form> -->
                                                <div class="form-group col-lg-6 col-xl-12">
                                                    <label for="mother_fullname">Full name</label>
                                                    <input type="text" id="mother_fullname" name="mother_fullname" class="form-control" placeholder="Enter your text" value=''>
                                                </div>
                                                
        
                                                <div class="form-group col-lg-6 col-xl-12">
                                                    <label for="mother_phone">Phone number</label>
                                                    <input type="number" class="form-control" name="mother_phone" id="mother_phone" placeholder="" value=''>
                                                </div>
                                                
                                                <div class="form-group col-lg-6 col-xl-12">
                                                    <label for="mother_email">Email Address</label>
                                                    <input type="email" class="form-control" id="mother_email" name="sponsor_email" placeholder="" value=''>
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                                                                  
                                        
                                        <div class="col-xl-6 col-lg-6">
    
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="mother_occupation">Occupation</label>
                                                <input type="text" id="mother_occupation" class="form-control" name="mother_occupation" placeholder="Enter your text" value=''>
                                            </div>
                                            
                            
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="mother_address">Residential Address</label>
                                                <textarea name="mother_address" id="mother_address" cols="31" rows="3"></textarea>
                                            </div>

                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="mother_address">Office Address</label>
                                                <textarea name="mother_address" id="mother_address" cols="31" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                        <!-- <div class="col-md-12 col-xl-12">
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Sponsor's Information </h4>
                                            <div class="row">
                                                <div class="col-xl-2 col-sm-2">
                                                    <input type="checkbox" name="" id=""> mathematics
                                                </div>
                                                <div class="col-xl-2 col-sm-2">
                                                    <input type="checkbox" name="" id=""> mathematics
                                                </div>
                                                <div class="col-xl-2 col-sm-2">
                                                    <input type="checkbox" name="" id=""> mathematics
                                                </div>
                                                <div class="col-xl-2 col-sm-2">
                                                    <input type="checkbox" name="" id=""> mathematics
                                                </div>
                                                <div class="col-xl-2 col-sm-2">
                                                    <input type="checkbox" name="" id=""> mathematics
                                                </div>
                                                <div class="col-xl-2 col-sm-2">
                                                    <input type="checkbox" name="" id=""> mathematics
                                                </div>
                                                <div class="col-xl-2 col-sm-2">
                                                    <input type="checkbox" name="" id=""> mathematics
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                    </div>
                    <input class="btn waves-effect waves-light btn-block btn-outline-success" id="sa-success" type="submit" value="Update">
                    <!-- <button type="button" id="submitbio" class="btn waves-effect waves-light btn-block btn-outline-success">Update</button> -->
                    </form>
                    <!-- end row-->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

                <script>
            $("#state").on("change", function () {
                return;
                $("#lga").empty()
                let selectedValue = $(this).val()
                // alert($(this).val());return;
                // let selectedValue = 10;
                $.ajax({
                    // url: apiUrl + "fetch_lga.php?state=" + selectedValue,
                    url: "http://localhost/school_portal/public/inc/fetch_lga.php?state_id=" + selectedValue,
                    type: "GET",
                    // crossDomain: true,
                    data: {},
                    success: function (response) {
                    // let data = JSON.parse(response)
                    let data = (response.data)
                    
                    // Populate the names of the lgas to the dropdown
                    for (i = 0; i < data.length; i++) {
                        let x = document.getElementById("lga")
                        let option = document.createElement("option")
                        option.text = data[i].name
                        option.value = data[i].state_id
                        x.add(option)
                        // console.log(data[i].name);
                    }
                    // alert('Success!');
                }
                //error:function (error){
                //     alert("Could not load lga")
                //     console.log(error)
                // }

                })
                //  alert('selected value'+selectedValue)
            })

            //send post data
            function updatebio() {
                return;
            // $("#submitbio").on('click', function(){
                // preventDefault();
                // alert(9);
                let regnum = document.getElementById('regnum').value;
                let students_name = document.getElementById('students_name').value;
                let surname = document.getElementById('surname').value;
                let nationality = document.getElementById('nationality').value;
                let students_class = document.getElementById('students_class').value;
                let address = document.getElementById('address').value;
                let state = document.getElementById('state').value;
                let lga = document.getElementById('lga').value;
                let dob = document.getElementById('dob').value;
                let bloodgroup = document.getElementById('bloodgroup').value;
                let genotype = document.getElementById('genotype').value;
                let parents_fullname = document.getElementById('parents_fullname').value;
                let parents_phone = document.getElementById('parents_phone').value;
                let parents_email = document.getElementById('parents_email').value;
                let occupation = document.getElementById('occupation').value;
                let wphone = document.getElementById('wphone').value;
                let sponsor_fullname = document.getElementById('sponsor_fullname').value;
                let sponsor_email = document.getElementById('sponsor_email').value;
                let sponsor_phone = document.getElementById('sponsor_phone').value;
                let sponsor_occupation = document.getElementById('sponsor_occupation').value;
                let sponsor_wphone = document.getElementById('sponsor_wphone').value;
                let sponsor_address = document.getElementById('sponsor_address').value;
                let data = {
                    "regnum": regnum,
                    "students_name": students_name,
                    "surname": surname,
                    "students_class": students_class,
                    "nationality": nationality,
                    "state": state,
                    "lga": lga,
                    "dob": dob,
                    "bloodgroup": bloodgroup,
                    "genotype": genotype,
                    "parents_fullname": parents_fullname,
                    "parents_phone": parents_phone,
                    "parents_email": parents_email,
                    "address": address,
                    "occupation": occupation,
                    "wphone": wphone,
                    "sponsor_fullname": sponsor_fullname,
                    "sponsor_email": sponsor_email,
                    "sponsor_phone": sponsor_phone,
                    "sponsor_occupation": sponsor_occupation,
                    "sponsor_wphone": sponsor_wphone,
                    "sponsor_address": sponsor_address
                }
                $.ajax({
                    url: './inc/update-bio.php',
                    // url: '../site/add_site.php/',
                    type: 'POST',
                    crossDomain: true,
                    data: JSON.parse(data),
                    contentType:"application/json",
                    // alert(data)
                    // console.log(data)
                    success:onSuccess,
                    error: onError});
                    // alert(9)
                    function onSuccess(response) {
                        response = JSON.parse(response)
                        let res = response
                        let status = res.status 
                        // console.log(res)
                        if(status == "200"){
                            alert('Profile updated successfully!');
                            // window.location.href = "http://google.com";
                        }else{
                            alert(res.message);
                            console.log(res);
                            console.log(data);
                        }
                    }
                    
                    function onError(xhr, status, error) {
                        
                        // console.log(res)
                        // if(status == "200"){
                            // alert('Lecturer created successfully');
                            // window.location.href = "http://google.com";
                        // }else{
                            alert('Error');
                           
                            console.log(error);
                            // console.log(data);
                        // }
                    }
               
                };
        </script>