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

        <style>
            .pw-eye {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                right: 12px;
                cursor: pointer;
            }

            .pl-5 {
                padding-left: 35px !important;
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
                                                    <!-- <span><img src="assets/images/logo-dark.png" alt="" height="26"></span> -->
                                                    <span><h3>Gloryland Baptist Academy Portal</h3></span>
                                                </a>
                                            </div>
                                            <form action="./config/login/login.php" method="post" class="mt-3 p-2">
                                                <div class="form-group">
                                                    <label for="name">Username</label>
                                                    <input class="form-control" type="text" name="name" id="name" value="admin" required="" placeholder="john@deo.com">
                                                </div>
                                                <div class="form-group">
                                                  <a href="forgot.php" class="text-muted float-right">Forgot your password?</a>
                                                  <label for="password">Password</label>
                                                  <div class="position-relative">
                                                    <input class="form-control pl-5" type="password" required="" name="password" id="password" value="adminspassword" placeholder="Enter your password">
                                                    <span class="position-absolute pw-eye">
                                                      <i class="fas fa-eye" id="togglePassword"></i>
                                                    </span>
                                                  </div>
                                                </div>

            
                                                <div class="form-group mb-4 pb-3">
                                                    <div class="custom-control custom-checkbox checkbox-primary">
                                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                                        <!-- <label class="custom-control-label" for="checkbox-signin">Remember me</label> -->
                                                    </div>
                                                </div>
                                                <div class="mb-3 text-center">
                                                    <button class="btn btn-primary btn-block" type="submit"> Sign In </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                    <!-- end card -->
            
                                    <div class="row mt-4">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-white-50 mb-0">Create an account? <a href="register.php" class="text-white-50 ml-1"><b>Register student</b></a></p>
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

    <script>
    
    </script>
</body>

</html>