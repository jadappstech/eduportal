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
    // $year = '2023';
    // var_dump($id);die;
     // $query = "SELECT * FROM `continuous_assessment`";
     if(isset($_GET['id'])){
        $student_class_id = $_GET['id'];
    }else{
        $student_class_id = $_SESSION['id'];
     }
    //  var_dump($_SESSION);die;

    //get level of class
    // $level_query = "SELECT level FRON subjects WHERE "
    //get level of class
    // var_dump($student_class_id);die;
    $query = "SELECT * FROM `scores` WHERE term = '$term' AND student_id = '$id'";
    $run_query = mysqli_query($sqlConnection, $query);
    $result = $run_query->fetch_all(MYSQLI_ASSOC);
    // var_dump($result);die;
    if($usertype == 'teacher'){

        //get students class starts
        $student_class = "SELECT * FROM `student_classes` WHERE grade = '{$_GET['class']}' LIMIT 1";
        $squery = mysqli_query($sqlConnection, $student_class);
        $student_class_result = $squery->fetch_all(MYSQLI_ASSOC);
        $student_class_result = $student_class_result[0]['grade'];
        // var_dump($student_class_result);die;
        //get students class ends

         //this is to enable the app spool out the subjects in a particular level
        $student_class_level = "SELECT * FROM `student_classes` WHERE grade = '$student_class_result'";
        $student_class_level = mysqli_query($sqlConnection, $student_class_level);
        $student_class_level = $student_class_level->fetch_all(MYSQLI_ASSOC);
        // var_dump($student_class_level);die;
        $student_class_level = $student_class_level[0]['level'];
        //select class level ends

        //callout subjects for particular level starts here
        $subject = "SELECT * FROM `subjects` WHERE level = '$student_class_level'";
        $subject = mysqli_query($sqlConnection, $subject);
        $subject = $subject->fetch_all(MYSQLI_ASSOC);
        // var_dump($subject);die;
        // $subject = $subject[0]['level'];
        //callout subjects for particular level ends here
    }
    // $students_names = "SELECT * FROM `users` WHERE students_class = '$student_class_result'";
    if(isset($_GET['class'])){
        $the_class = $_GET['class'];
    }else{
        $the_class = $_SESSION['my_class'];
    }
    $students_names = "SELECT * FROM `users` WHERE students_class = '$the_class'";
    $student_query = "SELECT * FROM `users` WHERE usertype = 'student'";
    //select class level starts
   
    // $subject_query = "SELECT * FROM `users` WHERE usertype = 'student'";    
    $student_result = mysqli_query($sqlConnection, $student_query);
    $students_names = mysqli_query($sqlConnection, $students_names);

    // var_dump($student_class_level);die;
    
    $student = $student_result->fetch_all(MYSQLI_ASSOC);
    $students_names = $students_names->fetch_all(MYSQLI_ASSOC);
   
    // var_dump($student_class_level[0]['level']);die;
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
                                <div class='col-xl-12 col-sm-12'>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <h4 class='card-title'>My Continuous Assessment</h4>
                                            <h6><?php echo ucfirst($term); ?> Term<h6>
                                            <!-- <p class='card-subtitle mb-4'> For basic styling—light padding and only horizontal
                                                dividers—add the base class <code>.table</code> to any
                                                <code>&lt;table&gt;</code>.
                                            </p> -->
                                            <div class='table-responsive'>
                                                <table class='table mb-0'>
                                                    <thead>
                                                        <tr>
                                                            <th>Student</th>
                                                            <th>First Test</th>
                                                            <th>Second Test</th>
                                                            <th>Examination</th>
                                                            <th>Total</th>
                                                            <th>Average</th>
                                                            <th class='text-center'>Position</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class=''>

                                                    <?php
                                                    // var_dump($students_names);die;
                                                        for($i = 0; $i < count($students_names); $i++){
                                                            $id = $students_names[$i]['id'];
                                                            echo "<tr><td><a href='./students_result.php?id=$id&term=$term'>{$students_names[$i]['name']} {$students_names[$i]['surname']}</a></td>"?>
                                                            <?php 
                                                            // get the total score for first test
                                                            $first_test = "SELECT `first_test` FROM `scores` WHERE student_id = $id AND term = '$term'";
                                                            $first_test = mysqli_query($sqlConnection, $first_test);
                                                            if($first_test -> num_rows > 0){
                                                                $first_test = $first_test->fetch_all(MYSQLI_ASSOC);
                                                                $first_test =$first_test[0]['first_test'];
                                                                $first_test = json_decode($first_test, true);
                                                                // var_dump($first_test);die;
                                                                $total_first_test = 0;
                                                                if(is_array($first_test)){
                                                                    foreach($first_test as $key => $value){
                                                                        $total_first_test += (int)$value;
                                                                        // var_dump($value);                                      
                                                                    }   
                                                                }else{
                                                                    $total_first_test = 0;
                                                                }
                                                            }else{
                                                                $total_first_test = 0;
                                                            }
                                                            
                                                            echo "<td>$total_first_test</td>";//die;  ?>                                       
                                                            <?php 
                                                            // get the total score for second test
                                                            $second_test = "SELECT `second_test` FROM `scores` WHERE student_id = $id AND term = '$term'";
                                                            $second_test = mysqli_query($sqlConnection, $second_test);
                                                            if($second_test -> num_rows > 0){
                                                                $second_test = $second_test->fetch_all(MYSQLI_ASSOC);
                                                                $second_test =$second_test[0]['second_test'];
                                                                $second_test = json_decode($second_test, true);
                                                                // var_dump($second_test);die;
                                                                $total_second_test = 0;
                                                                if(is_array($second_test)){
                                                                    foreach($second_test as $key => $value){
                                                                        $total_second_test += (int)$value;
                                                                        // var_dump($value);                                      
                                                                    }   
                                                                }else{
                                                                    $total_second_test = 0;
                                                                }
                                                            }else{
                                                                $total_second_test = 0;
                                                            }

                                                            echo "<td>$total_second_test</td>";                                      
                                                            // get the total score for exam
                                                            $exam = "SELECT `exam` FROM `scores` WHERE student_id = $id AND term = '$term'";
                                                            $exam = mysqli_query($sqlConnection, $exam);
                                                            if($exam -> num_rows > 0){
                                                                // var_dump($exam);
                                                                $exam = $exam->fetch_all(MYSQLI_ASSOC);
                                                                $exam =$exam[0]['exam'];
                                                                $exam = json_decode($exam, true);
                                                                // var_dump($exam);
                                                                $total_exam = 0;
                                                                if(is_array($exam)){
                                                                    foreach($exam as $key => $value){
                                                                        $total_exam += (int)$value;
                                                                        // var_dump($value);                                      
                                                                    }   
                                                                }else{
                                                                    $total_exam = 0;
                                                                }
                                                            }else{
                                                                $total_exam = 0;
                                                            }
                                                            echo "<td>$total_exam</td>";//die;  ?>   
                                                            <?php 
                                                                $total = "SELECT `total` FROM `scores` WHERE student_id = $id AND term = '$term'";
                                                                $total = mysqli_query($sqlConnection, $total);
                                                                if($total -> num_rows > 0){
                                                                    $total = $total->fetch_all(MYSQLI_ASSOC);
                                                                    $total = $total[0]['total'];
                                                                }else{
                                                                    $total = 0;
                                                                }
                                                                echo "<td data-id='{$id}' class='student_position'>".$total."</td>";
                                                            ?>                                    
                                                            <?php $average = "SELECT `average` FROM `scores` WHERE student_id = $id AND term = '$term'";
                                                                $average = mysqli_query($sqlConnection, $average);
                                                                if($average -> num_rows > 0){
                                                                    $average = $average->fetch_all(MYSQLI_ASSOC);
                                                                    $average = $average[0]['average'];
                                                                }else{
                                                                    $average = 0;
                                                                }
                                                                echo "<td>".number_format((float)$average, 2, '.', '')."</td>";   
                                                                $get_position_query = "SELECT * FROM student_positions WHERE student = '$id' AND term ='".$_GET['term']."'";
                                                                $get_position_query = mysqli_query($sqlConnection, $get_position_query);
                                                                // var_dump($get_position_query);die;
                                                                if($get_position_query -> num_rows > 0){
                                                                    $get_result = $get_position_query->fetch_all(MYSQLI_ASSOC);
                                                                    $pos = $get_result[0]['position'];                       
                                                                }else{
                                                                    $pos = '0';
                                                                }

                                                                // var_dump($get_result);//die;        
                                                                echo "<td  class='text-center positions'>$pos</td>"; ?>                                    
                                                            <?php "</tr>";
                                                        }
                                                    ?>    
                                                    <tr>
                                                        <td colspan='6'></td>
                                                        <td  class='text-center'><button onclick='calcPosition()' class='btn btn-primary'>Get Positions</button></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            

                                        </div>
                                        <!-- end card-body-->
                                    </div>
                                    <!-- end card -->

                                </div>
                              
                            </div>
                        </div>
                    </div>
                    

                </div> <!-- container-fluid -->
            </div>
            <?php //var_dump($_SESSION);die; ?>
            <!-- End Page-content -->
            <style>
                a.d-block.pt-2.pb-2.text-dark{
                    text-transform: uppercase !important;
                }
            </style>
            <script>
                function calcPosition(){
                    let myid = $(this).data('id');
                   // Get all table rows
                    const rows = document.querySelectorAll('.student_position');
                    const score_row = document.querySelectorAll('.student_position');
                    const position_tds = document.querySelectorAll('.positions');

                    // Extract data-id values from each row
                    const positionrows = Array.from(rows).map(row => row.getAttribute('data-id'));
                    const score_rows = Array.from(score_row).map(score_row => score_row.innerHTML);//getAttribute('data-id'));

                    const id_to_score_array = positionrows.reduce((acc, curr, index) => {
                        acc[curr] = score_rows[index];
                        return acc;
                    }, {});
                    //try removing this block. it does the same thing with the one below
                    const sorted_id_to_score_array = Object.fromEntries(
                        Object.entries(id_to_score_array).sort((a, b) => b[1] - a[1])
                    );

                    // const sorted_positions = Object.fromEntries(
                    //     sorted_id_to_score_array.map((key, index) => [key, index + 1])
                    // );
                    
                    // const sorted_id_to_score_array = {11: '235', 22: '184', 27: '12'};
                    //this block sorts the obj in descending order of values
                    const sortedKeys = Object.keys(sorted_id_to_score_array).sort((a, b) => sorted_id_to_score_array[b] - sorted_id_to_score_array[a]);

                    const sorted_positions = Object.fromEntries(
                        sortedKeys.map((key, index) => [key, index + 1])
                    );

                    position_tds.forEach((td, index) => {
                    const key = Object.keys(sorted_positions)[index];
                    td.textContent = sorted_positions[key];
                    });
                    //save information to db
                    //student names
                    const student = positionrows //for id of students
                    //class of student
                    var student_class = new URL(window.location.href);
                    student_class = student_class.searchParams.get('class');
                    //position of students
                    // const position = score_rows;
                    const arr = Object.keys(sorted_positions).map(key => sorted_positions[key]);
                    const position = arr; //for position of students
                    // console.log(position)
                    //term
                    var term = new URL(window.location.href);
                    term = term.searchParams.get('term');
                    //compiled_by
                    var compiled_by = <?php echo $_SESSION['id'];?>
                    // console.log(typeof(position), position)
                    
                    // const session = ;
                    function getSchoolSession() {
                        const currentYear = new Date().getFullYear();
                        const currentMonth = new Date().getMonth();

                        if (currentMonth >= 8) { // September to August
                            return `${currentYear}/${currentYear + 1}`;
                        } else { // January to August
                            return `${currentYear - 1}/${currentYear}`;
                        }
                    }
                    const this_session = getSchoolSession();
                    
                    // const updated = ;
                    const currentDate = new Date();
                    const year = currentDate.getFullYear();
                    const month = currentDate.getMonth() + 1; // Add 1 because getMonth() returns 0-11
                    const day = currentDate.getDate();
                    const hours = currentDate.getHours();
                    const minutes = currentDate.getMinutes();
                    const seconds = currentDate.getSeconds();

                    const updated = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                    //send data to the db
                    let data = {
                        student: student,
                        term: term,
                        compiled_by: compiled_by,
                        position: position,
                        this_session: this_session,
                        updated: updated,
                        student_class: student_class
                    };

                    $.ajax({
                        url: './inc/add-position-api.php',
                        type: 'POST',
                        data: data,
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
                            text: 'Could not add school fees item!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                        console.log('Error:', error.statusText);
                        }
                    });

                }
            </script>
          <?php include "./inc/footer.php"; ?>