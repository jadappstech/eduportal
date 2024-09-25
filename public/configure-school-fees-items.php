<?php 
    include "./inc/header.php";
    //here because of the navbar pic
    $query = "SELECT * FROM users WHERE id = ".$_SESSION['id'];
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the navbar pic
    //populate the school fees items
    $query = "SELECT * FROM school_fees_items";
    $school_fees_items = mysqli_query($sqlConnection, $query);
    if($school_fees_items->num_rows > 0){
        $school_fees_items = $school_fees_items->fetch_all(MYSQLI_ASSOC);
    }
    // var_dump($school_fees_items[0]['schoolfeesitem']);die;
    //populate the school fees items
    //populate the school fees items
    $query = "SELECT * FROM users WHERE usertype='student' AND students_class = '".$_GET['class']."'";
    $student = mysqli_query($sqlConnection, $query);
    if($student->num_rows > 0){
        $student = $student->fetch_all(MYSQLI_ASSOC);
    }
    // var_dump($student[10]['surname']);die;
    //populate the school fees items
?>
<style>
    #student_name, .getclass{
        text-transform: uppercase;
    }
   
</style>
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
                                <h4 class="mb-0 font-size-18">Configure School Fees Items for <span class='getclass' name="getclass"><?php echo $_GET['class']; ?></span></h4>
                                
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Configure School Fees Items</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                <div class="container">
                    <!-- <form action=""> -->
                        <div class="row">
                        <div class="col-md-12 col-lg-12">
                                <label for="term">Term</label>
                                <select name='term' id='term' class='form-control'>
                                    <option value="" selected disabled>Select Term</option>
                                    <option value="first">First Term</option>
                                    <option value="second">Second Term</option>
                                    <option value="third">Third Term</option>
                                </select>                                 
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <label for="student_name">Student</label>
                                <select name='student_name' id='student_name' class='form-control'>
                                    <option value="" selected disabled>Select Student Name</option>
                                    <?php
                                        for($i = 0; $i < count($student); $i++){
                                            $id = $student[$i]['id'];
                                            echo "
                                                <option value='$id'>{$student[$i]['surname']} {$student[$i]['name']}</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <label for="school_fees_amount">School Fees Amount</label>
                                <input type="number" class="form-control" name="school_fees_amount" id="school_fees_amount">
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <!-- <input type="checkbox" class="form-control" name="school_fees_item" id="school_fees_item">-->
                                <label for="school_fees_item">School Fees Item</label> 
                                <div class="row">
                                    <?php
                                    for ($i = 0; $i < count($school_fees_items); $i++){
                                        $amount = $school_fees_items[$i]['amount'];
                                        $schoolfeesitem = $school_fees_items[$i]['schoolfeesitem'];
                                        $schoolfeesitemid = $school_fees_items[$i]['id'];
                                        echo "<div class='col-md-2 col-lg-2'>
                                                <div class='custom-control custom-checkbox custom-control-inline'>
                                                    <input type='checkbox' value='{$amount}' name='{$schoolfeesitemid}' class='checkbox custom-control-input' id='{$schoolfeesitemid}'>
                                                    <label class='custom-control-label' for='{$schoolfeesitemid}'>{$schoolfeesitem} (<label>{$amount}</label>)</label>
                                                </div>
                                            </div>";
                                    }?>
                                        
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <label for="discount">Discount</label>
                                <input type="number" class="form-control" name="discount" id="discount">
                            </div>
                            
                            <div class="col-md-12 col-lg-12">
                                <label for="total">Total</label>
                                <input type="number" class="form-control" name="total" id="total" disabled>
                                <button class='mt-4 form-control btn btn-block btn-primary' onclick='getTotal()' id='get_total'>Get Total</button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <script>
                var get_total = document.getElementById('get_total')
                var checkbox = document.querySelectorAll('.checkbox');
                var school_fees_amount = document.getElementById('school_fees_amount');
                var discount = document.getElementById('discount');
                var totalText = document.getElementById('total');
                var student_name = document.getElementById('student_name');
                // Add event listeners to all checkboxes and select elements
                document.querySelectorAll('input[type="checkbox"], select').forEach(element => {
                    element.addEventListener('change', function() {
                        // Change the button text when a checkbox or select item is clicked
                        get_total.textContent = 'Get Total';
                    });
                });
                document.querySelectorAll('input[type="number"], select').forEach(element => {
                    element.addEventListener('keyup', function() {
                        // Change the button text when a checkbox or select item is clicked
                        get_total.textContent = 'Get Total';
                    });
                });

                function getTotal(){

                    if(get_total.textContent == 'Get Total'){
                        // alert("Get Total")
                        var total = 0
                        for(let i = 0; i < checkbox.length; i++){
                            if(checkbox[i].checked == true){
                                total += Number(checkbox[i].value)
                            }
                        }
                        total += Number(school_fees_amount.value);
                        total -= Number(discount.value);
                        totalText.value = total;
                        console.log(total);

                        get_total.textContent = 'Save School Fees';
                    }else{
                        // alert('something else');
                        //store in db
                        let school_fees_item = [];
                        for(let i = 0; i < checkbox.length; i++){
                            if( checkbox[i].checked == true){
                                school_fees_item.push(checkbox[i].name)
                            }
                        }
                        data = {
                            get_total: get_total.value,
                            school_fees_amount: school_fees_amount.value,
                            school_fees_item: school_fees_item,
                            discount: discount.value,
                            totalText: totalText.value,
                            student_name: student_name.value
                        };
                        // alert('here')
                        $.ajax({
                            url: './inc/configure-school-fees-items-api.php',
                            contentType: 'application/json',
                            type: 'POST',
                            data: JSON.stringify(data),
                            success: function(response) {
                            let data = response;
                            let status = data.status;
                            // console.log(typeof(data))
                            if (status == 200) {
                                Swal.fire({
                                title: 'Success!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'Ok',
                                }).then(()=>{
                                    setTimeout(function() {
                                    location.reload();
                                    }, 1500)
                                });
                            }
                        },
                        error: function(error) {
                            Swal.fire({
                            title: 'Error!',
                            text: error.responseText,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                            });
                            console.log('Error:', error.statusText, error);
                            }
                        });
                    }
                }
                // .addEventListener('click');
                // getTotal(){

                // }
            </script>
          <?php include "./inc/footer.php"; ?>