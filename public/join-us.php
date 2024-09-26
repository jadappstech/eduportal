
<?php
    include_once('./inc/config.php');
    // global $conn;
    $query = "SELECT * FROM student_classes";
    // Check connection
    if (!$sqlConnection) {
        die("Connection failed: " . $sqlConnection->connect_error);
    }

    $stmt = $sqlConnection->prepare($query);
    // Check preparation
    if (!$stmt) {
        die("Prepare failed: " . $sqlConnection->error);
    }
    // Execute statement
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    // Get result
    $result = $stmt->get_result();

    // Fetch all rows
    $data = $result->fetch_all(MYSQLI_ASSOC);

    // Check for data
    if (!$data) {
        echo "No data found.";
    } //else {
        // Process data
     
        
    //die;}

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
        <link href="../plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    
        <style>
            #kids_num_div{
                display: none;
            }
        </style>
    </head>
<body class="bg-primary">

    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block my-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-4 mt-3">
                                                <a href="index.php">
                                                    <span><h2>Gloryland Baptist Academy Portal</h2></span>
                                                </a>
                                            </div>
                                            <!-- <form action="http://localhost/school_portal/public/config/login/register.php" method="POST" class="p-2"> -->
                                            <form id="form" class="p-2">
                                                <div class="form-group">
                                                    <label for="username">Name</label>
                                                    <input class="form-control" type="text" id="username" name="myname" required="" placeholder="Ola Adelaja" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="emailaddress">Email address</label>
                                                    <input class="form-control" type="email" id="emailaddress" name="email" required="" placeholder="ola@gmail.com" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone_number">Phone number</label>
                                                    <input class="form-control" type="number" required="" id="phone_number" name="phone_number" placeholder="Enter your phone number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kids_num">How many kids do you intend to register</label>
                                                    <input class="form-control" type="number" required="" id="kids_num" name="kids_num" placeholder="How many kids do you intend to register?" required>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control btn btn-primary" type="button" required="" id="proceed" name="proceed" value="Click here to proceed">
                                                </div>
                                                <div class="form-group" id="kids_num_div">
                                                    <!--<div class="kids_num_div_row row">

                                                         <div class="col-md-1">
                                                            <h5 class="h5">1</h5>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text"  class="form-control">
                                                        </div>
                                                       
                                                        <div class="col-md-3">
                                                            <input type="text"  class="form-control" value="skdk">
    
                                                        </div> 
                                                    </div>-->
                                                </div>
                                                <!-- <div class="form-group mb-4 pb-3">
                                                    <div class="custom-control custom-checkbox checkbox-primary">
                                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                                        <label class="custom-control-label" for="checkbox-signin">I accept <a href="#">Terms and Conditions</a></label>
                                                    </div>
                                                </div> -->
                                                <div class="mb-3 text-center">
                                                    <button class="btn btn-primary btn-block" id="submitButton" disabled> Submit </button>
                                                    <!-- <script>
                                                        let checkboxSignin = document.querySelector("#checkbox-signin");
                                                        let btnsubmit = document.querySelector("#submitButton");
                                                        checkboxSignin.addEventListener("change", ()=>{
                                                            btnsubmit.disabled = !checkboxSignin.checked;
                                                        })
                                                    </script> -->
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                    <!-- end card -->
           
                                    <div class="row mt-4">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-white-50 mb-0">Already have an account? <a href="index.php" class="text-white-50 ml-1"><b>Sign In</b></a></p>
                                        </div>
                                    </div>
            
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- <script src="assets/pages/sweet-alert-demo.js"></script> -->
    <!-- App js -->
    <script src="assets/js/theme.js"></script>

    <script>

        let kids_num_div = document.getElementById('kids_num_div');
        let num_of_kids = document.getElementById('kids_num');
        let submitBtn = document.getElementById('submitButton');
        document.getElementById('proceed').addEventListener('click', ()=>{
            submitBtn.disabled = false;
            kids_num_div.style.display = "block";
            kids_num_div.innerHTML = "";
            
            for(let i = 0, j = 1; i < num_of_kids.value; i++, j++){

                let row = document.createElement('div');
                // alert(i + "and" + j);
                row.innerHTML = `
                <div class="kids_num_div_row my-2 row">
    
                    <div class="col-md-1">
                        <h5 class="h5">`+ j +`</h5>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="kidsname[]" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <select name='kidsclass[]' class="form-control" id=''>
                            <option value='' disabled selected>Class</option>
                            <?php
                                for($i = 0; $i < count($data); $i++){
                                    // $level = $data[$i]['level'];
                                    $grade = $data[$i]['grade'];
                                    echo"<option value='$grade'>$grade</option>";
                                }
                            ?>
                               
                        </select>
                        
                    </div>
                </div>
                `;
                kids_num_div.appendChild(row);
            }
            // row.classList.add('row');

        })
        let submitButton = document.getElementById('submitButton');
        submitButton.addEventListener('click', (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            fetch('./inc/save_data.php', {
                method: 'POST',
                body: formData
            })
            .then((response) => response.json())
            .then((response) => {
                // json_decode(response);
                // console.log(response);
                if (response.status == 'success') {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message
                    });
                    // form.reset();
                    setTimeout(function() {
                        window.location.reload(false);
                    }, 1500)
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message
                    });
                }
            })

            .catch((error) => console.log(error));
        });

    </script>
</body>

</html>