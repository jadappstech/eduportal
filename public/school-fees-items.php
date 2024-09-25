<?php 
    include "./inc/header.php";
    //here because of the navbar pic
    $query = "SELECT * FROM users WHERE id = ".$_SESSION['id'];
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the navbar pic

    $query = 'SELECT * FROM school_fees_items';
    $run_query = mysqli_query($sqlConnection, $query);
    if($run_query->num_rows > 0){
        $result = $run_query->fetch_all(MYSQLI_ASSOC);
    }else{
        $result = "No data yet";
    }

?>

<style>
    td{
        text-transform: capitalize;
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
                                <h4 class="mb-0 font-size-18">School Fees Item</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">School Fees Items</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container-fluid -->
                <div class="container">
                    <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="card-title">Striped rows</h4> -->
                                    <p class="card-subtitle mb-4 text-center">
                                        <button type="button" class='btn btn-outline-primary  waves-effect waves-light' data-toggle="modal" data-target="#exampleModalCenter">Add</button>
                                        <button type="button" class='btn btn-outline-danger  waves-effect waves-light'>Delete</button>                                      
                                    </p>

                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                    <th>Modality</th>
                                                    <th colspan='2' class='text-center'>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    for($i = 0, $j = 1; $i < count($result); $i++, $j++){
                                                        echo "
                                                        <tr>
                                                            <th scope='row'>{$j}</th>
                                                            <td>{$result[$i]['schoolfeesitem']}</td>
                                                            <td>{$result[$i]['description']}</td>
                                                            <td>{$result[$i]['amount']}</td>
                                                            <td>{$result[$i]['modality']}</td>
                                                            <td><i type='button' style='color:green;' class='bx bx-pencil editrow' data-toggle='modal' data-target='#updateform' data-id='{$result[$i]['id']}'></i></td>
                                                           <!-- <td><a href=''><i type='button' style='color:red;' class='bx bxs-trash' id='deleteItem' data-toggle='modal' data-target='#deleteform' data-id='{$result[$i]['id']}'></i></td> -->
                                                           ";
                                                           $re = (string)$result[$i]['id']; 
                                                           echo "<td><a href='./inc/delete-school-fees-item-api.php?id=$re'><i type='button' style='color:red;' class='bx bxs-trash' id='deleteItem'></i></a></td>
                                                            
                                                        </tr>
                                                        ";
                                                    }
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                </div>
            </div>
            <!-- End Page-content -->

            <!-- addmodal -->
             <!-- Modal -->
             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add School Fees Item</h5>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- <form action="inc/add-school-fees-items-api.php" method="POST"> -->
                        <form id="addForm">
                            <div class="modal-body">
                                <label for="schoolfeesitem" class="mt-2">Name:</label>
                                <input type="text" name="schoolfeesitem" id='schoolfeesitem' class='form-control'>
                                <label for="description" class="mt-2">Description:</label>
                                <textarea class='form-control' name="description" id="description"></textarea>
                                <label for="amount" class="mt-2">Amount:</label>
                                <input type="text" name="amount" id='amount' class='form-control'>
                                <label for="modality" class="mt-2">Modality:</label>
                                <select name="modality" id="modality" class='form-control'>
                                   <option selected disabled>Select One</option>
                                <option value="compulsory">Compulsory</option>
                                <option value="optional">Optional</option>
                               </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="" id='closeAddSchoolFees' class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
                                <button type="button" onclick="addFunction()" id='saveAddSchoolFees' class="btn btn-primary waves-effect waves-light">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- addmodal -->
            <!-- updatemodal -->
             <!-- Modal -->
             <div class="modal fade" id="updateform" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <form id="updateForm">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Update School Fees Item <span id='itemId' name='itemId'></span></h5>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        
                            <div class="modal-body">
                                <label for="update_schoolfeesitem" class="mt-2">Name:</label>
                                <input type="text" name="update_schoolfeesitem" id='update_schoolfeesitem' class='form-control'>
                                
                                <label for="update_description" class="mt-2">Description:</label>
                                <textarea class='form-control' name="update_description" id="update_description"></textarea>
                                
                                <label for="update_amount" class="mt-2">Amount:</label>
                                <input type="text" name="update_amount" id='update_amount' class='form-control'>
                                
                                <label for="update_modality" class="mt-2">Modality:</label>
                                <select name="update_modality" id="update_modality" class='form-control'>
                                   <option selected disabled>Select One</option>
                                    <option value="compulsory">Compulsory</option>
                                    <option value="optional">Optional</option>
                               </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="" id='closeAddSchoolFees' class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
                                <button type="button" onclick="updateForm()" data-id='' id='updateSchoolFees' class="btn btn-primary waves-effect waves-light">Update School Fees Item</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- updatemodal -->
            <!-- deletemodal -->
            <div class="modal fade" id="deleteform" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add School Fees Item</h5>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- <form action="inc/add-school-fees-items-api.php" method="POST"> -->
                        <!-- <form id="addForm"> -->
                            <div class="modal-body">
                               <h3 class="text-center">Are you sure you want to delete?</h3>
                            </div>
                            <div class="modal-footer" style='display: inline-block; text-align: center'>
                                <button type="button" onclick="" id='closeAddSchoolFees' class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
                                <button type="button" onclick="deleteFunction()" id='saveAddSchoolFees' class="btn btn-danger waves-effect waves-light">Yes, delete item</button>
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
            <!-- deletemodal -->

            <script>
                const theUpdateForm = document.getElementById('updateForm');
                const update_schoolfeesitem = document.getElementById('update_schoolfeesitem');
                const update_description = document.getElementById('update_description');
                const update_amount = document.getElementById('update_amount');
                // const amount = document.getElementById('amount');
                const update_modality = document.getElementById('update_modality');
                const itemId = document.getElementById('itemId');
                function addFunction(){
                    let schoolfeesitem = $('#schoolfeesitem').val();
                    let description = $('#description').val();
                    let amount = $('#amount').val();
                    let modality = $('#modality').val();

                    let data = {
                        schoolfeesitem: schoolfeesitem,
                        description: description,
                        amount: amount,
                        modality: modality
                    };

                    $.ajax({
                        url: './inc/add-school-fees-items-api.php',
                        type: 'POST',
                        data: data,
                        success: function(response) {
                        let data = response;
                        let status = data.status;
                        console.log(typeof(data))
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
                            text: 'Could not add school fees item!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        console.log('Error:', error.statusText);
                        }
                    });

                }
                //update script
                $('.editrow').on('click', function(){
                    let id = $(this).data('id');
                    $.ajax({
                        url: './inc/fetch-school-fees-items-api.php?id='+id,
                        type: 'GET',
                        success: function(response) {
                        let data = response;
                        let status = data.status;
                        let res = JSON.parse(data.data)
                        if (status == 200) {
                            update_schoolfeesitem.value = (res[0]['schoolfeesitem'])
                            update_description.value = (res[0]['description'])
                            update_amount.value = (res[0]['amount'])
                            update_modality.value = (res[0]['modality'])
                            itemId.textContent = (res[0]['id'])
                        }
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Could not add school fees item!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        console.log('Error:', error.statusText);
                        }
                    });
                })
                //update function
                function updateForm(){
                    // let id = document.getElementById('itemId').value;
                    const formData = new FormData(theUpdateForm);
                    const data = {};
                    formData.forEach((value, key) => (data[key] = value));
                    data['itemId'] = itemId.textContent;

                    $.ajax({
                    url: './inc/update-school-fees-items-api.php',
                    type: 'POST',
                    data: JSON.stringify(data),
                    contentType: 'application/json',
                    success: function(response) {
                        // const res = JSON.parse(response);
                        const res = response;
                        if (res.status == 200) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Update successful!',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            }).then(()=>{
                                setTimeout(function() {
                                   location.reload();
                                }, 1500)
                            });
                            } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Could not update item!',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        }
                    },
                    error: function(error) {
                        Swal.fire({
                        title: 'Error!',
                        text: 'Could not update item!',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                        });
                        console.log('Error:', error.statusText);
                        }
                    });

                }
                //update script
                //delete script
                function deleteFunction(){
                    let myid = $("#deleteItem").data('id');
                    // let id = $(this).data('id');
                    alert(myid)
                }
                //delete script
            </script>
          <?php include "./inc/footer.php"; ?>