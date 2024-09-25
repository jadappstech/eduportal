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
                                    <form action="./inc/update-bio.php" method="POST" enctype="multipart/form-data">
                                        <h4 class="card-title">Basic Details</h4>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-lg-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="teachers_name">First name</label>
                                                            <input type="text" name="teachers_name" id="teachers_name" class="form-control" placeholder="Enter your text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="surname">Surname</label>
                                                            <input type="text" id="surname" name="surname" class="form-control" placeholder="Enter your text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="gender">Gender</label>
                                                            <select name="gender" id="gender" class="form-control">
                                                                <option disabled>Select Gender</option>
                                                                <option value="" selected='selected'>Hi</option>
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
                                                            <input type="text" id="nationality" class="form-control" name="nationality" placeholder="Enter your Nationality">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="state">State</label>
                                                            <input type="text" class="form-control" id="state" name="state">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="lga">Local Govt.</label>
                                                            <input type="text" class="form-control" id="lga" name="lga" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-xl-6">
                                                        <div class="form-group">
                                                            <label for="bloodgroup">Blood Group</label>
                                                            <input type="text" name="bloodgroup" id="bloodgroup" class="form-control" placeholder="Enter your Blood Group">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-xl-6">
                                                        <div class="form-group">
                                                            <label for="genotype">Genotype</label>
                                                            <input type="text" id="genotype" name="genotype" class="form-control" placeholder="Enter your genotype">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card -->
                        </div> <!-- end col -->

                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Emergency Contact's Information</h4>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="kins_fullname">Full name</label>
                                                <input type="text" id="kins_fullname" name="kins_fullname" class="form-control" placeholder="Enter your text">
                                            </div>
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="phone">Phone number</label>
                                                <input type="number" class="form-control" name="parents_phone" id="parents_phone" placeholder="">
                                            </div>
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="parents_email" name="parents_email" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="occupation">Occupation</label>
                                                <input type="text" id="occupation" class="form-control" name="occupation" placeholder="Enter your text">
                                            </div>
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="wphone">WhatsApp number</label>
                                                <input type="number" class="form-control" id="wphone" name="wphone" placeholder="">
                                            </div>
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="relationship">Relationship with NOK</label>
                                                <textarea name="relationship" id="relationship" class="form-control" cols="31" rows="3"></textarea>
                                            </div>
                                            <div class="form-group col-lg-6 col-xl-12">
                                                <label for="address">Residential Address</label>
                                                <textarea name="address" id="address" class="form-control" cols="31" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <input class="btn waves-effect waves-light btn-block btn-outline-success" id="sa-success" type="submit" value="Update">
                </div> <!-- container-fluid -->
            </div> <!-- End Page-content -->
        </div> <!-- main-content -->
    </div> <!-- layout-wrapper -->

    <script>
        $("#state").on("change", function () {
            $("#lga").empty();
            let selectedValue = $(this).val();
            $.ajax({
                url: "http://localhost/school_portal/public/inc/fetch_lga.php?state_id=" + selectedValue,
                type: "GET",
                success: function (response) {
                    let data = response.data;
                    for (let i = 0; i < data.length; i++) {
                        let x = document.getElementById("lga");
                        let option = document.createElement("option");
                        option.text = data[i].name;
                        option.value = data[i].state_id;
                        x.add(option);
                    }
                }
            });
        });

        function updatebio() {
            // Code for handling form submission via AJAX
        }
    </script>
</body>
