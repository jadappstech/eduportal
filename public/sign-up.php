
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
                                                    <span><h2>Beavers Preparatory School Portal</h2></span>
                                                </a>
                                            </div>
                                            <form action="http://localhost/school_portal/public/config/login/register.php" method="POST" class="p-2">
                                                <div class="form-group">
                                                    <label for="username">Name</label>
                                                    <input class="form-control" type="text" id="username" name="name" required="" placeholder="Michael Zenaty">
                                                </div>
                                                <div class="form-group">
                                                    <label for="emailaddress">Email address</label>
                                                    <input class="form-control" type="email" id="emailaddress" name="email" required="" placeholder="john@deo.com">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="usertype">Sign in as</label>
                                                    <select class="form-control" id="usertype" name="usertype" required="">
                                                        <option selected disabled>Select one</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="teacher">Teacher</option>
                                                        <option value="student">Student</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-4 pb-3">
                                                    <div class="custom-control custom-checkbox checkbox-primary">
                                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                                        <label class="custom-control-label" for="checkbox-signin">I accept <a href="#">Terms and Conditions</a></label>
                                                    </div>
                                                </div>
                                                <div class="mb-3 text-center">
                                                    <button class="btn btn-primary btn-block" id="submit" type="submit" disabled> Sign Up Free </button>
                                                    <script>
                                                        let checkboxSignin = document.querySelector("#checkbox-signin");
                                                        let btnsubmit = document.querySelector("#submit");
                                                        checkboxSignin.addEventListener("change", ()=>{
                                                            btnsubmit.disabled = !checkboxSignin.checked;
                                                        })
                                                    </script>
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

    <!-- App js -->
    <script src="assets/js/theme.js"></script>

</body>

</html>