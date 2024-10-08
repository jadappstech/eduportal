<div data-simplebar class="h-100">

    <div class="navbar-brand-box">
        <a href="index.php" class="logo">
            <img src="assets/images/beavers_logo.png" style='min-width:6.25rem; min-height: 6.25rem; display: block; margin: auto; background-color: white;'/>
            <!-- <span>Beavers Prep. School</span> -->
        </a>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <!-- <a href="welcome.php" class="waves-effect"><i class='bx bx-home-smile'></i><span class="badge badge-pill badge-primary float-right">7</span><span>Dashboard</span></a> -->
                <a href="welcome.php" class="waves-effect"><i class='bx bx-home-smile'></i><span>Dashboard</span></a>
            </li>

            <?php
            if( $usertype == 'student' ){
                echo '
                    <li><a href="assignments.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Assignments</span></a></li>
                ';
            }
            
            if($usertype == 'student'){
                echo "
                    <li><a href='select_term.php' class=' waves-effect'><i class='bx bx-calendar'></i><span>Results</span></a></li>
                ";
            }elseif($usertype == 'teacher'){
                echo "
                    <li><a href='choose_class.php' class=' waves-effect'><i class='bx bx-calendar'></i><span>Results</span></a></li>
                ";
            }
            ?>
            
            <?php

                if( $usertype == 'admin' || $usertype == 'student' ){

                    echo '<li><a href="payments.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Payments</span></a></li>';
                }
            ?>

                        
            <?php
              //is this a form teacher? starts here
                $form_teacher = mysqli_query($sqlConnection, "SELECT form_teacher FROM users WHERE id ='".$_SESSION['id']."'");
                $form_teacher = $form_teacher->fetch_all(MYSQLI_ASSOC);
                $form_teacher = $form_teacher[0]['form_teacher'];
                // var_dump($form_teacher == '1');die;
            //is this a form teacher? ends here
            if( $usertype == 'admin' || $usertype == "teacher" ){
                echo '
                    <li><a href="lesson-notes.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Lesson Notes</span></a></li>
                ';
            }
            if( $usertype == "teacher" ){
                echo '
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-doughnut-chart"></i><span>My classes</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="my_classes.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Classes I teach</span></a></li>
                        <li><a href="form_class.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Form Class</span></a></li>
                        ' ?>
                        <?php if($form_teacher == '1'):
                        echo '
                        <li><a href="promote-students.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Promote Student</span></a></li>
                        <li><a href="demote-students.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Demote Student</span></a></li>';
                        endif; ?>
                       <?php echo '
                    </ul>
                <li>'?>
                <?php if($form_teacher == '1'):
                echo '
                <li><a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-list-check"></i><span>Roll Call</span></a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="take-roll-call.php">Take Roll Call</a></li>
                        <li><a href="roll-call-history.php">Roll Call History</a></li>
                    </ul>
                </li>';
                endif; 
            }
            if( $usertype == 'admin' ){
                echo '
                
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-doughnut-chart"></i><span>Users</span></a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="javascript: void(0);" class="has-arrow">Students</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="list-of-elem-students.php">Elementary School</a></li>
                                    <li><a href="list-of-students.php">Secondary School</a></li>
                                </ul>
                            </li>
                            <li><a href="list-of-teachers.php">Teachers</a></li>
                            <li><a href="list-of-admins.php">Administrators</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-calendar"></i><span>Onboarding</span></a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="onboarding.php">Onboard Students</a></li>
                            <li><a href="onboard-teacher.php">Onboard Teachers</a></li>
                        </ul>
                    </li>
                    <li><a href="communications.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Communications</span></a></li>
                    <li><a href="assign-form-teacher.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Form Teachers</span></a></li>
                    <li><a href="potential_students.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Potential Students</span></a></li>
                    <li><a href="list-of-teachers.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Assign Classes</span></a></li>
                    <li><a href="settings.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Settings</span></a></li>
                    <li><a href="deactivate_user.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Deactivate User</span></a></li>
                    ';
                }
                if( $usertype == 'accountant' ){
                    echo '
                        <li><a href="school-fees-items.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>School Fees Item</span></a></li>
                        <li><a href="select_class.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Configure Sch. Fees Item</span></a></li>
                        <li><a href="school-fees-discount.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>School Fees Discount</span></a></li>
                        <li><a href="school-fees-report.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>School Fees Report</span></a></li>
                        <li><a href="manage-school-fees.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Manage School Fees</span></a></li>
                        ';
                } 
                ?>
                <!-- <li><a href="compile_results.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>Compile Results</span></a></li> -->
            <!-- <li><a href="calendar.php" class=" waves-effect"><i class="bx bx-calendar"></i><span>My Transcript</span></a></li> -->
          


        </ul>
    </div>
    <!-- Sidebar -->
</div>