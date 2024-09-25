<?php 
    include "./inc/header.php";

    $query = "SELECT * FROM users WHERE usertype = 'student'";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);

    $my_id = $_SESSION['id'];
    $_SESSION['myclass'] = $user[$my_id]['students_class'];
    // var_dump($_SESSION['myclass']);die;
    //USE A FOR LOOP TO DISPLAY ALL THE BANK DETAILS AT ONCE
   
   
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
            
                            <h2>Make all payments to any of the following accounts:</h2>
                            <div class="row">
                                <?php
                                     //connection for bank info
                                    $classes=[0=>'jss1',1=>'jss2',2=>'jss3',3=>'sss1',4=>'sss2',5=>'sss3'];
                                     for($i=0; $i < sizeof($classes); $i++){

                                         $bank_query = "SELECT * FROM school_fees_details WHERE grade = '$classes[$i]'";
                                         $run_bank_query = mysqli_query($sqlConnection, $bank_query);
                                         $classes_result = $run_bank_query->fetch_all(MYSQLI_ASSOC);

                                         if(!($classes_result)):
                                         $classes_result[0]['grade'] = "";$classes_result[0]['acct_name']="";$classes_result[0]['bank_name']="";$classes_result[0]['acct_num']="";
                                         endif;
                                ?>
                                <div class="col-md-2 col-sm-12">

                                    <ul style="list-style: none;">
                                    <!-- <?php 
                                    
                                    if($classes[2] == $_SESSION['myclass']){
                                    ?> -->
                                        <li><strong><h3><?php echo strtoupper($classes_result[0]['grade']); ?></h3></strong></li>
                                        <li>Bank name: <?php echo $classes_result[0]['bank_name'];?></li>
                                        <li>Acct number: <?php echo $classes_result[0]['acct_num'];?></li>
                                        <li>Sch name: <?php echo $classes_result[0]['acct_name']; }?></li>
                                        <?php
                                        if($_SESSION['usertype'] == 'admin'){
                                        echo "
                                        <form method = 'POST' action='update_school_fees_amount.php'>
                                        <li><input type='text' name='$classes[$i]bank_name' placeholder='Enter Bank name' class='form-control'></li>
                                        <li><input type='text' name='$classes[$i]acct_num' placeholder='Enter Account number' class='form-control'></li>
                                        <li><input type='text' name='$classes[$i]acct_name' placeholder='Enter Account name' class='form-control'></li>
                                        <li class='text-center'><input type='submit' name='submit$classes[$i]' class='btn btn-primary btn-block form-control'></li>
                                        ";}?>
                                    </ul>
                                </div>
                                <?php };?>
                               
                            </div>
                            <br>
                            <br>
                            <div class="card">
                                <div class="card-body">

                                    <form action='submit_payment' method = 'POST'>

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