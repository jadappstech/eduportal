<?php 
    include "./inc/header.php";
    include "./access-control.php";
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    //here because of the pic on the navbar
    $query = "SELECT * FROM users WHERE usertype = 'student'";
    $run_query = mysqli_query($sqlConnection, $query);
    $user = $run_query->fetch_all(MYSQLI_ASSOC);
    //here because of the pic on the navbar -ends
    
    $query = "SELECT * FROM subjects WHERE deleted = '0'";
    $run_query = mysqli_query($sqlConnection, $query);
    $result = $run_query -> fetch_all(MYSQLI_ASSOC);
    // var_dump($result[3]['level']);die;
    $query = "SELECT * FROM student_classes WHERE deleted = '0'";
    $run_query = mysqli_query($sqlConnection, $query);
    $student_classes = $run_query -> fetch_all(MYSQLI_ASSOC);
    // var_dump($student_classes[3]['level']);die;
    // $query = "SELECT * FROM arms";
    // $run_query = mysqli_query($sqlConnection, $query);
    // $arms = $run_query -> fetch_all(MYSQLI_ASSOC);
    $stmt = $sqlConnection->prepare("SELECT * FROM arms WHERE arm != 'default' AnD deleted = '0'");
    $stmt->execute();
    $arms = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
    
?>
<style>
    *{
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
                                <h4 class="mb-0 font-size-18">Settings</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Settings</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <form action="./inc/settings_api.php" method="POST">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            Add Subject 
                                        </div>
                                        <input type="text" class='form-control' name="subject" id="" placeholder='Enter subject'>
                                        <select name="level" class="form-control" id="level">
                                            <option selected disabled>Select Level</option>
                                            <option value="elementary">Elementary</option>
                                            <option value="elementary">Basic</option>
                                            <option value="high">High</option>
                                        </select>
                                        <input type="submit" class='form-control btn btn-primary mt-2' name="submit_subject" id="" value='Save subject'>
                                    </div>
                                    <div class="card-footer">
                                        <table>
                                           
                                        <?php
                                            for($i = 0; $i < count($result); $i++){
                                                echo(" <tr><td>".ucfirst($result[$i]['subject']) ."</td><td><i class='bx bx-right-arrow-alt'></i></td>") ;
                                                echo("<td class='text-right'>". ucfirst($result[$i]['level'])." Sch.</td>
                                                    <td><a href='./inc/delete_settings.php?id={$result[$i]['id']}&obj=subject' class=''><i class='bx bx-x' style='color: red'></i></a></td>
                                                </tr>") ;
                                            }
                                        ?>
                                         
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            Add Class 
                                        </div>
                                        <input type="text" class='form-control' name="grade" id="" placeholder='Enter class'>
                                        <!-- <input type="text" class='form-control' placeholder='' disabled> -->
                                        <select name="class_level" class="form-control" id="class_level">
                                            <option selected disabled>Select Level</option>
                                            <option value="elementary">Elementary</option>
                                            <option value="elementary">Basic</option>
                                            <option value="high">High</option>
                                        </select>
                                        <input type="submit" class='form-control btn btn-primary mt-2' name="submit_class" id="" value='Save class'>
                                    </div>
                                    <div class="card-footer">
                                        <table>
                                           
                                        <?php
                                            for($i = 0; $i < count($student_classes); $i++){
                                                echo(" <tr><td>".ucfirst($student_classes[$i]['grade']) ."</td><td><i class='bx bx-right-arrow-alt'></i></td>") ;
                                                echo("<td class='text-right'>". ucfirst($student_classes[$i]['level'])." Sch.</td>
                                                    <td><a href='./inc/delete_settings.php?id={$student_classes[$i]['id']}&obj=grade' class=''><i class='bx bx-x' style='color: red'></i></a></td>
                                                </tr>") ;
                                            }
                                        ?>
                                         
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            Add Arm 
                                        </div>
                                        <select name="class_id" class="form-control" id="class_id">
                                            <option selected disabled>Select Class</option>
                                            <?php
                                                for($i = 0; $i < count($student_classes); $i++){
                                                    echo"<option value='".$student_classes[$i]['id']."'>".$student_classes[$i]['grade']."</option>" ;
                                                }
                                            ?>
                                        </select>
                                        <input type="text" class='form-control' name="arm" id="" placeholder='Enter class'>
                                        <input type="submit" class='form-control btn btn-primary mt-2' name="submit_arm" id="" value='Save class'>
                                    </div>
                                    <div class="card-footer">
                                        <table>
                                           
                                        <?php
                                            // var_dump($student_classes);die;
                                            for ($i = 0; $i < count($arms); $i++) {
                                                // Check if the keys 'class', 'arm', and 'id' exist in $arms[$i]
                                                if (isset($arms[$i]['class'], $arms[$i]['arm'], $arms[$i]['id'])) {
                                                    $new_id = $arms[$i]['class'] - 1;
                                            
                                                    $arm = $arms[$i]['arm'];
                                                    $arm_class = $arms[$i]['class'];
                                                    $arm_id = $arms[$i]['id'];
                                            
                                                    $query = "SELECT * FROM student_classes WHERE id = '$arm_class'";
                                                    $stmt = $sqlConnection->prepare($query);
                                                    $stmt->execute();
                                                    $class = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                                            
                                                    // Check if 'grade' exists in $class[$i] before accessing it
                                                    if (isset($class[0]['grade'])) {
                                                        echo "<tr><td class ='text-right'>".$class[0]['grade']."</td><td> -> </td>"; // debugging output
                                                    } else {
                                                        echo "$i.<br>";
                                                    }
                                            
                                                    echo "<td>".$arm . "</td><td><a href='./inc/delete_settings.php?id={$arm_id}&obj=arm' class=''><i class='bx bx-x' style='color: red'></i></a> </td></tr>";
                                                } else {
                                                    echo "Missing data in arms array at index $i.<br>";
                                                }
                                            }
                                            
                                        ?>
                                         
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>