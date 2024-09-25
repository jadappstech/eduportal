<?php 
    include "./inc/header.php";
    //get the level of the class
    $my_class=$_GET['class'];
    $_SESSION['class'] = $my_class;
    // var_dump($_SESSION['class']);die;

    $grade_query = "SELECT * FROM student_classes WHERE grade = '$my_class'";
    $grade_result = mysqli_query($sqlConnection, $grade_query);
    $grade_result = $grade_result->fetch_all(MYSQLI_ASSOC);
    $grade_result = $grade_result[0]['level'];
    // var_dump($grade_result);die;

    //use level to get subjects
    $query = "SELECT * FROM subjects WHERE level = '$grade_result'";
    $result = mysqli_query($sqlConnection, $query);
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $my_id = $_SESSION['id'];
    // var_dump($my_id);die;
    // echo($result[0]['subject']);die;
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
                                <h4 class="mb-0 font-size-18">My Students</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">My Students</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <form id="assignment_form" method="POST" action ="./inc/give_assignment_api.php" enctype="multipart/form-data">
                    <div class="row">
                         <!-- COURSES TITLE UPLOAD FILE SUBMIT-->
                         <div class="col-md-4 col-xl-4 col-sm-12 my-2">
                            <select id="subject" name="subject" class="form-control" id="">
                                <option value="" selected disabled>Select Course</option>
                                <?php
                                    
                                    for($i = 0; $i < count($result); $i++){

                                        echo "<option value='".$result[$i]['subject']."'>".
                                            $result[$i]['subject']
                                            ."</option>";
                                    }
                                    //$result = 0;
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-xl-4 col-sm-12 my-2">
                             <input name="title" class="form-control" id="title" placeholder="Title/Topic">
                        </div>
                        <div class="col-md-4 col-xl-4 col-sm-12 my-2">
                            <input type="file" name="assignment_file" class="form-control" id="assignment_file" accept=".docx,.pdf">
                         </div>
                         <div class="col-md-12 col-xl-12 text-center mt-4">
                            <input type="submit" id="submitButton" class="btn btn-primary col-2">
                         </div>
                    </div> <!-- close row -->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>
          <!-- <script>
            let form = document.getElementById('assignment_form');
            let submitButton = document.getElementById('submitButton');
            submitButton.addEventListener('click', (e)=>{
                e.preventDefault();
                const formData = new FormData(form);
                fetch('./inc/give_assignment_api.php', {
                    method: 'POST',
                    body: formData
                })
                .then((response) => response.json())
                .then((data) => {
                    if(data.status == 200){
                        Swal.fire({
                            title: 'Success',
                            text: data.message
                        });
                    //     var timer = setTimeout(function() {
                    //     window.location.replace("")
                    // }, 3000);
                    }else{
                        Swal.fire({
                            title: 'Error!',
                            text: data.message
                        });
                    }
                })
                .catch((error) =>{ console.log(error)})

            })
          </script> -->