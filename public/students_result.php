<?php 
    include "./inc/header.php";
    include_once "./inc/config.php";
    // var_dump($_GET['terms']);die;

    $term = $_GET['term'];
    //here because of the navbar pic
    $query = "SELECT * FROM users";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the navbar pic
    if(isset($term)){
        $_SESSION['term'] = $term;
    }
    if(isset($_GET['class'])){
        $_SESSION['class'] = $_GET['class'];
    }
    $year = date('Y');
    $id = $_GET['id'];
    $query = "SELECT * FROM `scores` WHERE term = '$term' AND student_id = '$id'";
    $run_query = mysqli_query($sqlConnection, $query);
    $result = $run_query->fetch_all(MYSQLI_ASSOC);
 
 
    $student_query = "SELECT * FROM `users` WHERE id = $id";
    //select class level starts
    $student_result = mysqli_query($sqlConnection, $student_query);
    $student = $student_result->fetch_all(MYSQLI_ASSOC);
    //spool out my classes
    // include_once "./inc/config.php";
    $my_id = $_SESSION['id'];
    $my_query = "SELECT * FROM users WHERE id = '$my_id'";
    $run_query = mysqli_query($sqlConnection, $my_query);
    $my_classes = $run_query->fetch_all(MYSQLI_ASSOC);

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
                                <h4 class="mb-0 font-size-18">Continuous Assessment</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Continuous Assessment</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php ?>
                                <div class='col-xl-12 col-sm-12'>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <h4 class='card-title'><?php echo $student[0]['name']. " ". $student[0]['surname']; ?>'s Continuous Assessment</h4>
                                            <h6><?php echo ucfirst($term); ?> Term<h6>
                                            <!-- <p class='card-subtitle mb-4'> For basic styling—light padding and only horizontal
                                                dividers—add the base class <code>.table</code> to any
                                                <code>&lt;table&gt;</code>.
                                            </p> -->
                                            <div class='table-responsive'>
                                                <table class='table mb-0'>
                                                    <thead>
                                                        <tr>
                                                            <th>Subject</th>
                                                            <th>First Test</th>
                                                            <th>Second Test</th>
                                                            <th>Examination</th>
                                                            <th>Total</th>
                                                            <th>Average</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class=''>

                                                    <?php
                                                    // var_dump($result[0]['first_test']);
                                                    if (array_key_exists(0, $result) && $result[0] !== null) {
                                                        $first_test_array = json_decode($result[0]['first_test'], true);
                                                        // rest of your code
                                                      } else {
                                                        // handle the case when $result[0] is not set or null
                                                        $first_test_array = "";
                                                      }
                                                      
                                                    // var_dump($first_test_array['social studies']);//die;

                                                    if (array_key_exists(0, $result) && $result[0] !== null) {
                                                        $second_test_array = json_decode($result[0]['second_test'], true);//die;
                                                    } else {
                                                        // handle the case when $result[0] is not set or null
                                                        $second_test_array = "";
                                                      }
                                                    // var_dump($second_test_array['social studies']);//die;
                                                    if($result){
                                                        
                                                        for ($i = 0; $i < sizeof($result); $i++){
                                                            
                                                            foreach($first_test_array as $key => $value){
                                                                $row_sum = 0;
                                                                echo
                                                                    "<tr>"; ?>
                                                                         <?php echo " <th scope='row'>{$key}</th>
                                                                        <td>{$value}</td>";
                                                                        $row_sum += $value; ?>
                                                                        <!-- reading out info for second test -->
                                                                        <?php
                                                                            $inner_values = json_decode($result[0]['second_test'], true);
                                                                            $inner_value = isset($inner_values[$key]) ? $inner_values[$key] : '';
                                                                            echo "<td>{$inner_value}</td>";       
                                                                            $row_sum += (int)$inner_value;                                                                                                                                                                                           // }                                                                        
                                                                        ?>
                                                                        <!-- reading out info for second test -->
                                                                        <!-- reading out info for exam starts -->
                                                                        <?php
                                                                            $exam_values = json_decode($result[0]['exam'], true);
                                                                            $exam_value = isset($exam_values[$key]) ? $exam_values[$key] : '';
                                                                            echo "<td>{$exam_value}</td>"; 
                                                                            $row_sum += (int)$exam_value;                                                                                                                                                                                                 // }                                                                        
                                                                        ?>
                                                                        <!-- reading out info for exam ends -->
                                                                       <?php 
                                                                        $avg = ($row_sum/sizeof($result));
                                                                        // var_dump(sizeof($result));die;
                                                                       echo " <td>{$row_sum}</td>
                                                                       <td>{$avg}</td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    }else{
                                                        echo "<tr><td colspan='6' class='text-center'>No record yet!</td></tr>";
                                                    }
                                                    // echo date('Y');
                                                    ?>    
                                                    </tbody>
                                                </table>
                                            </div>
                                            

                                        </div>
                                        <!-- end card-body-->
                                    </div>
                                    <!-- end card -->

                                </div>
                              
                                <!-- end col -->
                            </div>
                        </div>
                    </div>
                    

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <style>
                a.d-block.pt-2.pb-2.text-dark{
                    text-transform: uppercase !important;
                }
            </style>
          <?php include "./inc/footer.php"; ?>