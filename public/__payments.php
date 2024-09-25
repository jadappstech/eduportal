<?php 
    include "./inc/header.php";
    //here because of the navbar pic
    $query = "SELECT * FROM users";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the navbar pic

    $my_id = $_SESSION['id'];
    if($usertype == 'student'){

        $_SESSION['myclass'] = $user[$my_id]['students_class'];
    }else{
        $_SESSION['myclass'] = 'sss3';
    }
var_dump($user[$my_id]['usertype']);die;
    if($user[$my_id]['usertype'] == 'teacher'){
        header("Location: welcome.php");
        // echo "Hi";die;
    }
    //connect to school fees details db
    $fees_query = "SELECT * FROM school_fees_details WHERE grade = '".$_SESSION['myclass']."'";
    $run_fees_query = mysqli_query($sqlConnection, $fees_query);
    if($run_fees_query){
        $student_fees = $run_fees_query->fetch_all(MYSQLI_ASSOC);
    }else{
        var_dump($sqlConnection->error);die;
    }
    // var_dump($user[$my_id]['name']);die;
    if($student_fees == null){
        // echo("No student's class");die;
        // $student_fees[0]['bank_name'] = "";
        // $student_fees[0]['acct_name'] = "";
        // $student_fees[0]['acct_num'] = "";
        // $student_fees[0]['amount'] = "";
    }
    
    // var_dump($student_class[0]);die; 
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
            
                            <h2>Make payment into this account:</h2>

                            <div class="row  mb-3">
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
                                        <button class="btn-block btn btn-primary" disabled>Pay online</button>
                                    </div>
                                </div>
                                <?php if($usertype == 'admin'):?>
                                <div class="col-md-6 col-xl-6 col-sm-12">
                                    
                                    <form method = 'POST' action='update_school_fees_amount.php'>
                                    <input type='text' name='bank_name' value="<?php echo $student_fees[0]['bank_name']; ?>" placeholder='Enter Bank name' class='form-control'>
                                    <input type='text' name='acct_num' value="<?php echo $student_fees[0]['acct_num']; ?>" placeholder='Enter Account number' class='form-control'>
                                    <input type='text' name='acct_name' value="<?php echo $student_fees[0]['acct_name']; ?>" placeholder='Enter Account name' class='form-control'>
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
                            
                            <div class="">
                            <?php 
                    
                    if($usertype == "admin"){
                        echo "

                        <div class='row'>
                            <div class='col-xl-12'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <form>
                                        <div class='table-responsive'>
                                            <table class='table mb-0'>
                                                <thead class='thead-light'>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>receipt</th>
                                                        <th>Student</th>
                                                        <th class='text-center'>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                ";?>
                                                    <?php
                                                    $query_receipts = "SELECT * FROM school_fees_receipts WHERE status = 0";
                                                    $receipts = mysqli_query($sqlConnection, $query_receipts);
                                                    // $updated_at = now();
                                                    // $if($lessons->num_rows > 0){

                                                        $receipts = $receipts->fetch_all(MYSQLI_ASSOC);
                                                    // };
                                                    // var_dump($receiptss);die;
                                                        for($i = 0, $j = 1; $i < sizeof($receipts); $i++, $j++){
                                                            
                                                            // var_dump($receiptss[$i]['receipts']);die;
                                                            echo "
                                                            <tr>
                                                                <th scope='row'>".$j."</th>
                                                               
                                                                <td><a href='./inc/receipts/{$receipts[$i]['receipt']}' download>{$receipts[$i]['receipt']}</a></td>
                                                                <td>{$receipts[$i]['submitted_by']}</td>
                                                                <td class='text-center'>
                                                                    <a href='./inc/approve_receipt.php?id={$receipts[$i]['id']}' id='approve' name='approve' class='btn btn-sm btn-primary mx-3'><i class='bx bx-check'></i></a>
                                                                    <a href='./inc/decline_receipt.php?id={$receipts[$i]['id']}' id='decline' name='decline' class='btn btn-sm btn-danger mx-3'><i class='bx bx-x'></i></a>
                                                                </td>
                                                            </tr>
                                                            
                                                            ";
                                                        }

                                                    ?>

                                                    <?php echo"
                                                </tbody>
                                            </table>
                                        </div>

                                    </form>
                                    </div>
                                    <!-- end card-body-->
                                </div>
                                <!-- end card -->

                            </div>
                        </div>


                        ";
                    }

                    ?>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body">

                                    <form action='./inc/submit_payment.php' method = 'POST' enctype='multipart/form-data'>

                                        <div class='row'>
                                            <div class='col-sm-12 col-xl-8'>
                                                <input type='file' name='submit_payment' class='form-control' accept=".jpg, .jpeg, .png, .pdf, .doc, .docx">
                                            </div>
                                            <div class='col-sm-12 col-xl-4'>
                                                <input type='submit' class='btn btn-primary form-control'>
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
                        <div>
                            <?php
                                $receipt_query = "SELECT * FROM school_fees_receipts WHERE submitted_by = '$my_id'";
                                $receipt = mysqli_query($sqlConnection, $receipt_query);
                                // $receipt = $run_query->fetch_all(MYSQLI_ASSOC);
                                // var_dump($receipt);DIE;
                                                      
                               
                           if ($usertype != 'admin'):

                            if($receipt -> num_rows <= 0){
                                echo "<h4 class='text-center mt-3'>No payment has been made yet</h4>";
                                return;
                            }elseif($receipt->num_rows > 0){
                                $result = $receipt -> fetch_all(MYSQLI_ASSOC);
                            }?>
                            <div class="row mt-4">
                                <?php
                                    $status = ['-1'=>'declined', '0'=>'pending', '1'=>'approved'];
                                    
                                    for ($i = 0; $i < sizeof($result); $i++){
                                        
                                        // var_dump($status[$result[$i]['approved']]);die;
                                echo "
                                <div class='col-md-2'>
                                    <div class='card'>
                                        <img class='card-img-top img-fluid' src='assets/images/media/sm-5.jpg' alt='Card image cap'>
                                        <div class='card-body'>
                                            <h5 class='card-title text-center {$status[$result[$i]['status']]}'><span>{$status[$result[$i]['status']]}</span></h5>
                                        </div>
                                    </div>
                                </div>";
                            }
                        endif; ?>
                        </div>
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