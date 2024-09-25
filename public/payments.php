<?php 
    include "./inc/header.php";

    $query = "SELECT * FROM users WHERE usertype = 'student'";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);

    $my_id = $_SESSION['id'];
    if($usertype == 'student'){

        $_SESSION['myclass'] = $user[$my_id]['students_class'];
    }else{
        $_SESSION['myclass'] = 'sss3';
    }

    //connect to school fees details db
    $fees_query = "SELECT * FROM school_fees_details WHERE grade = '".$_SESSION['myclass']."'";
    $run_fees_query = mysqli_query($sqlConnection, $fees_query);
    if($run_fees_query){
        $student_fees = $run_fees_query->fetch_all(MYSQLI_ASSOC);
    }else{
        var_dump($sqlConnection->error);die;
    }
    
    
    // var_dump($student_class[0]);die; 
    // var_dump($_SESSION['myclass']);die;
    //USE A FOR LOOP TO DISPLAY ALL THE BANK DETAILS AT ONCE
   
   
?>
<script src="https://js.paystack.co/v1/inline.js"></script>
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
                                <h4 class="mb-0 font-size-18">Payment</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Payment</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="card">
                        <div class="card-body">
            
                            <h2>Make payment into this account:</h2>

                            <div class="row">
                                <div class="col-md-6 col-xl-6 col-sm-12">
                                    <div class="form-control">
                                        Bank name: <strong><?php echo $student_fees[0]['bank_name'];?></strong>
                                    </div>
                                    <div class="form-control">
                                        Account name: <strong><?php echo $student_fees[0]['acct_name'];?></strong>
                                    </div>
                                    <div class="form-control">
                                        Account number: <strong><?php echo $student_fees[0]['acct_num'];?></strong> 
                                    </div>
                                    <div class="form-control"> 
                                        Amount: <strong><?php echo $student_fees[0]['amount'];?></strong>
                                    </div>
                                    <div class="">
                                        <!--<button class="btn-block btn btn-primary" disabled>Pay online</button>-->
                                        <button type="button" class="btn btn btn-primary" onclick="payWithPaystack()"> Make online payment </button> 
                                        <script>
                                          function payWithPaystack(){
                                            var handler = PaystackPop.setup({
                                              key: 'pk_test_451256ee3fdd45ea7923be5df1bbb2e06a4afb57',
                                              email: 'beavers@jadappstech.com',
                                              amount: <?php echo $student_fees[0]['amount'];?>00,
                                              ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                              metadata: {
                                                 custom_fields: [
                                                    {
                                                        display_name: "Mobile Number",
                                                        variable_name: "mobile_number",
                                                        value: "+2348012345678"
                                                    }
                                                 ]
                                              },
                                              callback: function(response){
                                                let message = 'Payment complete! Reference: '+response.reference;
                                                alert(message);
                                                window.location.href = "./verify-transaction.php?reference="+response.reference
                                                // console.log('success. ref is ' + response.reference);
                                            
                                                // let data = {reference: response.reference};
                                            
                                                // fetch("./verify-payment.php", {
                                                //     method: "POST", 
                                                //     body: JSON.stringify(data)
                                                // }).then(res => {
                                                //     console.log("Request complete! response:", res);
                                                //     alert("Payment complete!")
                                                //     window.location.href="./success.html"
                                                // });
                                            },
                                              onClose: function(){
                                                  alert('window closed');
                                              }
                                            });
                                            handler.openIframe();
                                          }
                                        </script>
                                    </div>
                                </div>
                                <?php if($usertype == 'admin'):?>
                                <div class="col-md-6 col-xl-6 col-sm-12">
                                    
                                    <form method = 'POST' action='update_school_fees_amount.php'>
                                    <input type='text' name='bank_name' value="<?php echo $student_fees[0]['bank_name'] ?>" placeholder='Enter Bank name' class='form-control'>
                                    <input type='text' name='acct_num' value="<?php echo $student_fees[0]['acct_num'] ?>" placeholder='Enter Account number' class='form-control'>
                                    <input type='text' name='acct_name' value="<?php echo $student_fees[0]['acct_name'] ?>" placeholder='Enter Account name' class='form-control'>
                                    <div class="row">
                                        
                                        <div class="col-sm-6">
                                            <select name="studentsclass" id=""  class="form-control">
                                                <option selected disabled>Select class</option>
                                                <?php
                                                    $class_query = "SELECT * FROM student_classes";
                                                    $run_class_query = mysqli_query($sqlConnection, $class_query);
                                                    $run_class_query = $run_class_query->fetch_all(MYSQLI_ASSOC);
                                                    for($i = 0; $i < count($run_class_query); $i++){
                                                        echo"<option value='".$run_class_query[$i]['grade']."'>".ucfirst($run_class_query[$i]['grade'])."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type='text'  class="form-control" name='amount' value="" placeholder='Enter Amount'>
                                        </div>
                                    </div>
                                    <input type='submit' name='submitfees' class='btn btn-primary btn-block form-control'>
                                    </form>
                                </div>
                                <?php endif; ?>
                            </div>
                            <br>
                            <br>
                            <div class="card">
                                <div class="card-body">

                                    <form action='./inc/submit_payment.php' method = 'POST'>
                                        <h5>AFTER PAYMENT, PLEASE UPLOAD YOUR PAYMENT RECEIPT/TELLER HERE</h5>
                                        <div class='row'>
                                            <div class='col-sm-12 col-xl-8'>
                                                <input type='file' class='form-control'>
                                            </div>
                                            <div class='col-sm-12 col-xl-4'>
                                                <input type='submit' name='submit_payment' accept=".jpg,.png,.pdf,.docx" class='btn btn-primary form-control'>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                            if($_SESSION['usertype'] == 'admin'){
                                echo "
                                <h4 class='card-title'>Change School Fees status</h4>
                                
                                
                                <form id='form' name='form'>
                                    <div class='form-group'>
                                        <div class='row'>
                                            <div class='col-9'>
    
                                                <label for='public_message'>Name of Student</label>
                                                <select name='student' id='student'class='form-control'>
                                                    <option selected disabled>Select a student</option>
                                ";
                            
                            ?>

                                                <?php
                                                for($i = 0; $i < sizeof($user); $i++){
                                                    $id = $user[$i]['id'];
                                                    $value = $user[$i]['name'].' '.$user[$i]['surname'];

                                                    echo "<option value='$id'>$value</option>";
                                                }
                                                ?>
                                                <?php
                                                    echo "
                                                    </select>
                                                    </div>
                                                    <div class='col-3'>
            
                                                        <label for='public_message'>Payment status</label>
                                                        <select name='status' id='status'class='form-control'>
                                                            <option selected disabled>Select School Fees status</option>
                                                            <option value='0'>Unpaid</option>
                                                            <option value='1'>Paid</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <button id='changeStatus' onclick='changeStatus()' class='btn btn-primary waves-effect waves-light'>Change status</button>
                        
                                                    ";}
                                                ?>
                                            
                            <!-- <form action="./disable_public_message.php" method="post">
                                <input type="submit" class="btn btn-secondary waves-effect waves-light" id="close_communication_alert" value="delete">
                                
                            </form> -->
                            
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                    
                </div> <!-- container-fluid -->
                
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>
          
          <script>
            function changeStatus(){
                
                let student = document.getElementById('student').value;
                let status = document.getElementById('status').value;
                let data = {

                    'student': student,
                    'status': status
                }
                $.ajax({
                    url: './school-fees-status.php',
                    type: 'POST',
                    data: data,
                    // data: JSON.parse(data),
                    success: onSuccess,
                    error: onError
                })
                // console.log($('form').serialize)
                function onSuccess(response){

                    //Success Message
                    // $('#sa-success').click(function () {
                        Swal.fire(
                            {
                                title: 'Success!',
                                text: 'School fees status changed!',
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            }
                        )
                    // });
                    // Refresh the page after a delay of 3 seconds
                    setTimeout(function(){
                        location.reload();
                    }, 2000); // 3000 milliseconds = 3 seconds
                }
                function onError(xhr, error){
                    console.log('error');
                    console.log(error);
                    console.log(data);

                    console.log(xhr);
                }
            }
          </script>