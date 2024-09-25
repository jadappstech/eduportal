
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
                                                    <span><h2>Beavers Preparatory School Portal</h2></span>
                                                </a>
                                            </div>
                                            <!-- <form action="./inc/join_us_api.php" method="POST" class="p-2"> -->
                                            <form id="form" id="POST" class="p-2">
                                                <div class="form-group">
                                                    <label for="myname">Name</label>
                                                    <input class="form-control" type="text" id="myname" name="myname" required="" placeholder="Michael Zenaty">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input class="form-control" type="email" id="email" name="email" required="" placeholder="john@deo.com">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone_number">Phone number</label>
                                                    <input class="form-control" type="number" required="" id="phone_number" name="phone_number" placeholder="Enter your phone number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kids_num">How many kids do you intend to register</label>
                                                    <input class="form-control" type="number" required="" id="kids_num" name="kids_num" placeholder="How many kids do you intend to register?">
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
                                                <div class="form-group mb-4 pb-3">
                                                    <div class="custom-control custom-checkbox checkbox-primary">
                                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                                        <label class="custom-control-label" for="checkbox-signin">I accept <a href="#">Terms and Conditions</a></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox checkbox-primary">
                                                        <input type="submit" class="btn btn-primary btn-block" value='Submit' id="checkbox-signin">
                                                    </div>
                                                </div>
                                               
                                            </form>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                    <!-- end card -->
            
                                    <!-- <div class="row mt-4">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-white-50 mb-0">Already have an account? <a href="index.php" class="text-white-50 ml-1"><b>Sign In</b></a></p>
                                        </div>
                                    </div> -->
            
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

        // // document.getElementById('form').addEventListener('submit', function(e) {
        //     e.preventDefault();
        //     let myname = document.getElementById("myname").value;
        //     let email = document.getElementById("email").value;
        //     let phone_number = document.getElementById("phone_number").value;
        //     let kids_num = document.getElementById("kids_num").value;
        //     let one_name = '';
        //     for (let i = 0,j = 1; i < kids_num; i++,j++) {
        //         const elements = document.getElementsByClassName('myElement');
        //         const element = elements[i];
        //         one_name = one_name + i.toString();
        //         element.classList.add(one_name);
        //         alert(one_name);
        //     }
        // })
        let submitButton = document.getElementById('submitButton');
        submitButton.addEventListener('click', (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            fetch('./inc/save_data.php', {
                method: 'POST',
                body: formData
            })
            .then((response) => response.text())
            .then((message) => console.log(message))
            .catch((error) => console.error(error));
        });


        let kids_num_div = document.getElementById('kids_num_div');
        let num_of_kids = document.getElementById('kids_num');
        document.getElementById('proceed').addEventListener('click', ()=>{

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
                        <input type="text" name="kids_name`+j+`" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="kids_class`+j+`" class="form-control" value="skdk">
    
                    </div>
                </div>
                `;
                kids_num_div.appendChild(row);
                
            }
                      
            // kids_num_div.innerHTML += `<div class='mb-3 text-center'>
            // <input type='submit' class='btn btn-primary btn-block' id='submit' value='Submit'>
            // </div>`
           
        })
      

        function callFunction(e){
            
        }

    </script>
</body>

</html>