<?php 
    include "./inc/header.php";
    include_once "./components/toast.php";
    // authorization check
    if($usertype != "teacher"):
        echo "Access denied!";
        header("Location: welcome.php");
    endif;
    include_once "./inc/config.php";

    $my_id = $_SESSION['id'];
            
    //here for the profile pic on navbar
    $user = "SELECT * FROM users WHERE id = '".$my_id."'";
    // var_dump($_GET['form_students']);die;
    $user = mysqli_query($sqlConnection, $user);
    $user = $user->fetch_all(MYSQLI_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_SESSION['id'];  // ID of the user taking attendance
        $class_id = $_GET['id'];
        $query = "SELECT *
            FROM users 
            WHERE users.class_arm = ".$class_id;
        $run_query = mysqli_query($sqlConnection, $query);
        $students = $run_query->fetch_all(MYSQLI_ASSOC);
    
        // Initialize counters for present, absent, and total students
        $present_count = 0;
        $absent_count = 0;
        $total_students = count($students);
    
        // Store attendance records
        $attendance = [];

        // edit attendance
        if(isset($_GET['edit']) && $_GET['edit'] == "true"){ 
            // Loop through students to get attendance status
            $attendance_id = (int)$_GET['attendance_id'];
            $query = "DELETE FROM student_attendance WHERE attendance_id =$attendance_id";
            $run_query = mysqli_query($sqlConnection, $query);
            
            if ($run_query) {
                // Check if any rows were deleted
                if (mysqli_affected_rows($sqlConnection) > 0) {
                    echo "Attendance record deleted successfully.";
                } else {
                    echo "No record found with ID $attendance_id.";
                }
            } else {
                // Output any error for debugging purposes
                echo "Error deleting record: " . mysqli_error($sqlConnection);
            }

            for ($i = 0; $i < $total_students; $i++) {
                $student_id = $students[$i]['id'];
                $status = isset($_POST[$i]) && $_POST[$i] == 'present' ? 'Present' : 'Absent';
        
                // Count present and absent students
                if ($status == 'Present') {
                    $present_count++;
                } else {
                    $absent_count++;
                }
        
                // Store individual student attendance data
                $attendance[] = [
                    'student_id' => $student_id,
                    'status' => $status
                ];
            }
            // Current datetime
            $attendance_date = date('Y-m-d H:i:s');
        
            // Insert into the attendance table
            $sql = "UPDATE attendance
                SET present_count = ?,
                    absent_count = ?,
                    total_students = ?
                WHERE id = ?";
            // $sql = "INSERT INTO attendance (created_by, class_id, present_count, absent_count, total_students, attendance_date)
            //         VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $sqlConnection->prepare($sql);
            $stmt->bind_param("iiis", $present_count, $absent_count, $total_students, $attendance_id);
            $stmt->execute();
        
            // insert individual student records into the student_attendance table
            $sql_student = "INSERT INTO student_attendance (attendance_id, student_id, status) VALUES (?, ?, ?)";
            $stmt_student = $sqlConnection->prepare($sql_student);
            foreach ($attendance as $record) {
                $stmt_student->bind_param("iis", $attendance_id, $record['student_id'], $record['status']);
                $stmt_student->execute();
            }
        
            // Close the statements and connection
            // $stmt->close();
            // $stmt_student->close();
            // $sqlConnection->close();
        
            // echo "Attendance has been successfully recorded!";
            $_SESSION['toast-msg'] = 'Attendance has been successfully updated!'; 
            header("Location: ./take-roll-call.php");
            exit();
        }
        else {
            // Loop through students to get attendance status
            for ($i = 0; $i < $total_students; $i++) {
                $student_id = $students[$i]['id'];
                $status = isset($_POST[$i]) && $_POST[$i] == 'present' ? 'Present' : 'Absent';
        
                // Count present and absent students
                if ($status == 'Present') {
                    $present_count++;
                } else {
                    $absent_count++;
                }
        
                // Store individual student attendance data
                $attendance[] = [
                    'student_id' => $student_id,
                    'status' => $status
                ];
            }
        
            // Current datetime
            $attendance_date = date('Y-m-d H:i:s');
        
            // Insert into the attendance table
            $sql = "INSERT INTO attendance (created_by, class_id, present_count, absent_count, total_students, attendance_date)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $sqlConnection->prepare($sql);
            $stmt->bind_param("iiiiis", $user_id, $class_id, $present_count, $absent_count, $total_students, $attendance_date);
            $stmt->execute();
        
            // Get the ID of the newly inserted attendance record
            $attendance_id = $stmt->insert_id;
        
            // Now insert individual student records into the student_attendance table
            $sql_student = "INSERT INTO student_attendance (attendance_id, student_id, status) VALUES (?, ?, ?)";
            $stmt_student = $sqlConnection->prepare($sql_student);
        
            foreach ($attendance as $record) {
                $stmt_student->bind_param("iis", $attendance_id, $record['student_id'], $record['status']);
                $stmt_student->execute();
            }
        
            // Close the statements and connection
            // $stmt->close();
            // $stmt_student->close();
            // $sqlConnection->close();
        
            // echo "Attendance has been successfully recorded!";
            $_SESSION['toast-msg'] = 'Attendance has been successfully recorded!'; 
            header("Location: ./take-roll-call.php");
            exit();
        }
    }
    // if the user is trying to access a a roll call record
    elseif (isset($_GET['id'])) {
        //spool out my classes
        $query = "SELECT * FROM attendance a WHERE DATE(a.attendance_date) = CURDATE() AND a.class_id = ".$_GET['id']." LIMIT 1;";
        $run_query = mysqli_query($sqlConnection, $query);
        $temp_attendance = $run_query->fetch_all(MYSQLI_ASSOC);
        if ($temp_attendance) {
            $attendance_id = $temp_attendance[0]['id'];
            // echo json_encode($attendance_id);
            // exit();
        }
    }

    else{
        //spool out my classes
        $query = "SELECT ft.id AS form_teacher_id, ft.form_teacher AS teacher_id, ca.arm AS arm_name, sc.grade AS class_name, ca.id AS arm_id
            FROM form_teachers ft
            INNER JOIN arms ca ON ft.arm_id = ca.id
            INNER JOIN student_classes sc ON ca.class = sc.id
            WHERE ft.form_teacher = ".$my_id;
        $run_query = mysqli_query($sqlConnection, $query);
        $classes = $run_query->fetch_all(MYSQLI_ASSOC);
        // var_dump($classes);die;

    }

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
                    <!-- toast messages -->
                    <?php
                        if (isset($_SESSION['toast-msg'])) {
                            echo show_bootstrap_toast($_SESSION['toast-msg']);
                            unset($_SESSION['toast-msg']);
                        }
                    ?>
                    <!-- select class from list of classes uner the control of the form teacher -->
                    <?php if(!isset($_GET['id'])): ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Select Class To Take Roll Call</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Roll Call</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <?php
                                    // var_dump(bool($classes));die; 
                                if($classes){
                                    for($i = 0; $i < count($classes); $i++){
                                        
                                        // var_dump($classes[0]['form_class']);die;
                                        // if($classes[$i]['form_class'] != null){
                                            
                                            // $json = $classes[$i]['form_class'];
                                            // $data = json_decode($json, true);
                                            // foreach($data as $key => $value){

                                                // echo "$key<br>";
                                                echo "
                                                    <div class='col-md-2 col-xl-2'>
                                                        <div class='text-center'>
                                                            <a href='take-roll-call.php?id=".$classes[$i]['arm_id']."'>
                                                                <div class='card'>
                                                                    <div class='card-body'>
                                                                        <div class='card-body text-center'>
                                                                            <h3 class='card-text'>".$classes[$i]['class_name']." ".$classes[$i]['arm_name']."</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                ";
                                            // }
                                    }
                                }else{
                                    echo "No record found";
                                }
                            ?>
                        </div>

                    <!-- display roll clall form for class if id is present in the url and the class has no attendace for that day -->
                    <?php elseif(!isset($attendance_id)): 
                        $class_id = $_GET['id'];
                        $query = "SELECT *
                            FROM users 
                            WHERE users.class_arm = ".$class_id;
                        $run_query = mysqli_query($sqlConnection, $query);
                        $students = $run_query->fetch_all(MYSQLI_ASSOC);

                        $query = "SELECT ca.arm AS arm_name, sc.grade AS class_name, ca.id AS arm_id
                            FROM  arms ca
                            INNER JOIN student_classes sc ON ca.class = sc.id
                            WHERE ca.class = $class_id LIMIT 1";
                        $run_query = mysqli_query($sqlConnection, $query);
                        $class = $run_query->fetch_all(MYSQLI_ASSOC);
                    ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Roll Call</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Roll Call</li>
                                            <li class="breadcrumb-item active"><?php echo $class[0]['class_name'].' '.$class[0]['arm_name']; ?></li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="container mt-5">
                            <!-- Header Section -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h2>Class Roll Call</h2>
                                <span>Date: <strong><?php echo date('l jS \of F Y'); ?></strong></span>
                            </div>

                            <!-- Roll Call Table -->
                            <form action="" method="POST">
                                <table class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($students){
                                                for($i = 0; $i < count($students); $i++){
                                                    $sn = $i + 1;
                                                    echo "
                                                        <tr>
                                                            <td>$sn</td>
                                                            <td>".$students[$i]['name']." ".$students[$i]['surname']."</td>
                                                            <td>
                                                                <div class='btn-group' role='group' aria-label='Attendance Status'>
                                                                    <input type='radio' hidden class='btn-check' required name='$i' id='present$i' value='present' autocomplete='off' xchecked>
                                                                    <label class='btn btn-outline-success mr-2' for='present$i'>Present</label>
    
                                                                    <input type='radio' hidden class='btn-check' required name='$i' id='absent$i' value='absent' autocomplete='off'>
                                                                    <label class='btn btn-outline-danger' for='absent$i'>Absent</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    ";
                                                // }
                                                }
                                            }else{
                                                echo "<td colspan='3' class='text-center'>No students have been assigned to the class</td>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- Submit Button -->
                                <div class="text-center">
                                    <?php if($students): ?>
                                        <button type="submit" class="btn btn-primary">Submit Roll Call</button>
                                    <?php else: ?>
                                        <a href="take-roll-call.php" class="btn btn-primary">Go Back</a>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    <!-- edit attendance -->
                    <?php elseif($attendance_id && isset($_GET['edit']) && $_GET['edit'] == 'true'): 
                        $class_id = $_GET['id'];

                        $query = "SELECT ca.arm AS arm_name, sc.grade AS class_name, ca.id AS arm_id
                            FROM  arms ca
                            INNER JOIN student_classes sc ON ca.class = sc.id
                            WHERE ca.class = $class_id LIMIT 1";
                        $run_query = mysqli_query($sqlConnection, $query);
                        $class = $run_query->fetch_all(MYSQLI_ASSOC);

                        $query = "SELECT *
                            FROM attendance a
                            WHERE a.id = ".$attendance_id;
                        $run_query = mysqli_query($sqlConnection, $query);
                        $attendance_details = $run_query->fetch_all(MYSQLI_ASSOC);

                        $query = "SELECT *
                            FROM student_attendance a
                            INNER JOIN users u ON a.student_id = u.id
                            WHERE a.attendance_id = ".$attendance_id;
                        $run_query = mysqli_query($sqlConnection, $query);
                        $students = $run_query->fetch_all(MYSQLI_ASSOC);
                    ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Roll Call</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Roll Call</li>
                                            <li class="breadcrumb-item active"><?php echo $class[0]['class_name'].' '.$class[0]['arm_name']; ?></li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="container mt-5">
                            <!-- Header Section -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h2>Edit Class Roll Call</h2>
                                <span>Date: <strong><?php echo date('h:ia', strtotime($attendance_details[0]['attendance_date'])) . ' ' . date('jS F Y', strtotime($attendance_details[0]['attendance_date'])); ?></strong></span>
                            </div>

                            <!-- Roll Call Table -->
                            <form action="" method="POST">
                                <table class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($students){
                                                for($i = 0; $i < count($students); $i++){
                                                    $sn = $i + 1;
                                                    echo "
                                                        <tr>
                                                            <td>$sn</td>
                                                            <td>".$students[$i]['name']." ".$students[$i]['surname']."</td>
                                                            <td>
                                                                <div class='btn-group' role='group' aria-label='Attendance Status'>
                                                                    <input type='radio' hidden class='btn-check' required name='$i' id='present$i' ".($students[$i]['status']=='Present' ? 'checked' : '')." value='present' autocomplete='off' xchecked>
                                                                    <label class='btn btn-outline-success mr-2' for='present$i'>Present</label>
    
                                                                    <input type='radio' hidden class='btn-check' required name='$i' id='absent$i'".($students[$i]['status']=='Absent' ? 'checked' : '')." value='absent' autocomplete='off'>
                                                                    <label class='btn btn-outline-danger' for='absent$i'>Absent</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    ";
                                                // }
                                                }
                                            }else{
                                                echo "<td colspan='3' class='text-center'>No students have been assigned to the class</td>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- Submit Button -->
                                <div class="text-center">
                                    <?php if($students): ?>
                                        <button type="submit" class="btn btn-primary">Submit Roll Call</button>
                                    <?php else: ?>
                                        <a href="take-roll-call.php" class="btn btn-primary">Go Back</a>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    <!-- display roll call form for class if id is present in the url -->
                    <?php else: 
                        $class_id = $_GET['id'];

                        $query = "SELECT *
                            FROM attendance a
                            WHERE a.id = ".$attendance_id;
                        $run_query = mysqli_query($sqlConnection, $query);
                        $attendance_details = $run_query->fetch_all(MYSQLI_ASSOC);

                        $query = "SELECT *
                            FROM student_attendance a
                            INNER JOIN users u ON a.student_id = u.id
                            WHERE a.attendance_id = ".$attendance_id;
                        $run_query = mysqli_query($sqlConnection, $query);
                        $students = $run_query->fetch_all(MYSQLI_ASSOC);

                        $query = "SELECT ca.arm AS arm_name, sc.grade AS class_name, ca.id AS arm_id
                            FROM  arms ca
                            INNER JOIN student_classes sc ON ca.class = sc.id
                            WHERE ca.class = $class_id LIMIT 1";
                        $run_query = mysqli_query($sqlConnection, $query);
                        $class = $run_query->fetch_all(MYSQLI_ASSOC);
                        // echo json_encode($class[0]['class_name']);exit();
                    ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Roll Call</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Roll Call</li>
                                            <li class="breadcrumb-item active"><?php echo $class[0]['class_name'].' '.$class[0]['arm_name']; ?></li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="container mt-5">
                            <!-- Header Section -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h2>Class Roll Call</h2>
                                <span>Date: <strong><?php echo date('ha', strtotime($attendance_details[0]['attendance_date'])) . ' ' . date('jS F Y', strtotime($attendance_details[0]['attendance_date'])); ?></strong></span>
                            </div>

                            <!-- Roll Call Table -->
                            <form action="" method="POST">
                                <table class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($students){
                                                for($i = 0; $i < count($students); $i++){
                                                    $sn = $i + 1;
                                                    echo "
                                                        <tr>
                                                            <td>$sn</td>
                                                            <td>".$students[$i]['name']." ".$students[$i]['surname']."</td>
                                                            <td>
                                                                <div class='btn-group' role='group' aria-label='Attendance Status'>
                                                                    ".$students[$i]['status']."
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    ";
                                                // }
                                                }
                                            }else{
                                                echo "No students have been assigned to the class";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- Submit Button -->
                                <div class="text-center">
                                    <a href="take-roll-call.php" class="btn btn-primary">Go Back</a>
                                    <?php if (date('Y-m-d', strtotime($attendance_details[0]['attendance_date'])) === date('Y-m-d')): ?>
                                        <a href="take-roll-call.php?id=<?php echo $class_id; ?>&edit=true&attendance_id=<?php echo $attendance_id; ?>" class="btn btn-success">Edit</a>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                </div> <!-- container-fluid -->
            </div>
            <style>
                /* Styling for the "Present" button */
                input[type="radio"]:checked + label.btn-outline-success {
                    background-color: #28a745;
                    color: white;
                    border-color: #28a745;
                }

                /* Styling for the "Absent" button */
                input[type="radio"]:checked + label.btn-outline-danger {
                    background-color: #dc3545;
                    color: white;
                    border-color: #dc3545;
                }
            </style>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>