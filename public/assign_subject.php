<?php 
    include "./inc/header.php";
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
                                <h4 class="mb-0 font-size-18">Assign Subjects</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Assign Subjects</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <form action="assign_subject_api.php" id="form" method="POST">

                    <?php
                        $key_array = array_keys($_POST);
                        $value_array = array_values($_POST);
                        // print_r($key_array);
                        // print_r($value_array);
                        // echo "iodioeioeioioei......<br>";
                        $level_array = array();
                        for ($i = 0; $i < sizeof($key_array); $i++){
                            $query = "SELECT * FROM student_classes WHERE grade = '$key_array[$i]'";
                            $result = mysqli_query($sqlConnection, $query);
                            if($result->num_rows>0){
                                $level = $result->fetch_all(MYSQLI_ASSOC);
                            }
                            // print_r($level[0]);
                            // $level_array[] = ($level[0]['level']);//working also
                            array_push($level_array, $level[0]['level']);
                        }
                        echo "<br>";
                        $level_array = array_unique($level_array);
                        $new_level_array = [];
                        foreach ($level_array as $element) {
                            if (!in_array($element, $new_level_array)) {
                                $new_level_array[] = $element;
                            }
                        }                        
                        // print_r($new_level_array);
                        // echo "<br>=====<br>";
                        for ($i = 0; $i < count($new_level_array); $i++){
                            if (array_key_exists($i, $new_level_array)) {
                                $query = "SELECT * FROM student_classes WHERE level = '$new_level_array[$i]'";
                                $result = mysqli_query($sqlConnection, $query);
                                if($result->num_rows>0){
                                    $grade = $result->fetch_all(MYSQLI_ASSOC);
                                }
                            }
                            for ($j = 0; $j < count($grade); $j++) {
                                // echo $grade[$j]['grade'] . "\n";
                            }
                            
                            // print_r($grade);
                            // echo "<br>==uu===<br>";
                        }
                        ?>
                        <ul>
                            <!-- <div class='row'> -->
                        <?php 
                        // var_dump($key_array);die;
                        // var_dump($key_array);die;
                            for($i = 0; $i < count($key_array); $i++){
                                echo"<li>$key_array[$i] ";
                                // echo"<li>$new_level_array[$i] =====> ";
                                //call these from the db
                                $arr_basic = ['prenursery', 'nursery1', 'nursery2', 'basic1', 'basic2', 'basic3','basic4',  'basic5', 'basic6'];
                                $arr_junior = ['jss1', 'jss2', 'jss3'];
                                $arr_high = ['sss1', 'sss2', 'sss3'];
                                if(in_array($key_array[$i], $arr_basic)){
                                    $text = "elementary";
                                }elseif(in_array($key_array[$i], $arr_junior)){
                                    $text = "junior";
                                }else{
                                    $text = "high";
                                }
                                // echo "$text";die;

                                $query = "SELECT * FROM subjects WHERE level = '$text'";
                                
                                $result = mysqli_query($sqlConnection, $query);
                                if($result->num_rows>0){
                                    $grade = $result->fetch_all(MYSQLI_ASSOC);
                                    // var_dump($result);die;
                                }
                                ?>
                                
                                <?php
                                for($j=0; $j < count($grade); $j++){
                                    echo "<ul><li><input type='checkbox' name='".$grade[$j]['subject']."__".$key_array[$i]."'>". $grade[$j]['subject']."</li></ul>";
                                    // print_r($grade[0]['subject']);//[$j]['subject'] . ", ";
                                }
                                echo"</li>";
                            }
                        
                        ?>
                        
                            
                        </ul>
                        </form>
                </div> <!-- container-fluid -->
                <input type="submit" id="submitButton" value="Submit">
                <!-- <button class="btn btn-primary btn-block" type="submit">Submit</button> -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>

          <script>
            let form = document.getElementById('form');
            let submitButton = document.getElementById('submitButton');
            submitButton.addEventListener('click', (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            fetch('assign_subject_api.php', {
                method: 'POST',
                body: formData
            })
            .then((response) => response.json())
            .then((response) => {
                // json_decode(response);
                console.log(response);
                if (response.status == 200) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message
                    });
                    var timer = setTimeout(function() {
                        window.location.replace("http://localhost/school_portal/public/profile.php?id=<?php echo $_SESSION['assign_class_to'];?>")
                    }, 3000);
                    
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message
                    });
                }
            })

            .catch((error) => console.error(error));
        });

          </script>