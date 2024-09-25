<?php 
session_start();
    include "./inc/header.php";

//    include "./inc/config.php";

    if(!isset($_SESSION['name'])){
        header("Location: ./index.php");
    }
    $id = $_GET['id'];
    // var_dump($_SESSION);die;
//
//here because of the pic on the navbar
$query = "SELECT * FROM users WHERE usertype = 'student'";
$run_query = mysqli_query($sqlConnection, $query);
$user = $run_query->fetch_all(MYSQLI_ASSOC);

$this_user_id = $_GET['id'];
$_SESSION['edit_users_id'] = $this_user_id;
$_SESSION['toEditUser'] = true;
$_SESSION['who'] = 'teacher';

//
    $this_usertype = $this_usertype ?? null;
    $this_usertype = $_SESSION['usertype'];

    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($sqlConnection, $query);

    if($result->num_rows > 0){
        $this_user = $result->fetch_all(MYSQLI_ASSOC);

    }
    // $_SESSION['usertype'] = 'admin';
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
                                <h4 class="mb-0 font-size-18">Profile</h4>
                                    
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Profile</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix row">
                                        <div class="col-md-3">
                                            <div class="float-left">
                                                <h4><b>This is <?php echo ucwords($this_user[0]['name']);?>'s Profile page</b></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="float-left text-left">
                                                <!-- display the courses and classes of teacher -->
                                                <?php
                                                    if($this_user[0]['usertype'] != 'student'){
                                                        echo "<h6 class='card-title mt-2'>My Classes</h6>";
                                                        $this_user_id = $_GET['id'];
                                                        $query = "SELECT * FROM users WHERE id = '$this_user_id'";
                                                        $run_query = mysqli_query($sqlConnection, $query);
                                                        $classes = $run_query->fetch_all(MYSQLI_ASSOC);
                                                        // var_dump($classes[0]['toteach']);die;
                                                        if($classes){
                                                            for($i = 0; $i < count($classes); $i++){
                            
                                                                if($classes[$i]['toteach'] != null){
                                                                    
                                                                    $json = $classes[$i]['toteach'];
                                                                    $data = json_decode($json, true);
                                                                    foreach($data as $key => $value){
                            
                                                                        // echo "$key<br>";
                                                                        echo "
                                                                            | <span class=''><strong>$key</strong></span> |
                                                                        ";
                                                                    }
                                                                    
                                                                }else{
                                                                    echo " No class assigned yet! ";
                                                                }
                                                            }
                                                        }else{
                                                            echo "No class assigned yet";
                                                        }
                                                    }
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
    
    
                                    <div class="row mt-1">
                                        <div class="col-md-2 text-center">
                                           
                                        <?php
                                                    if( $this_user[0]['photo'] == null){
                                                        echo "<img src=\"./inc/images/dummy_img.png\" alt=\"\" class=\"\" style=\"border-radius: 20%; height: 150px; width:150px; background-size:auto;\">";
                                                    }else{
                                                        echo "<img src=\"./inc/images/".$this_user[0]['photo']."\" alt=".$this_user[0]['name']." class=\"\" style=\"border-radius: 20%; height: 150px; width:150px; background-size:auto;\">";
                                                    } ?>
                                            <h4 class="text-center"><?php echo strtoupper($this_user[0]['name']).' '.strtoupper($this_user[0]['surname']) ;?></h4>
                                            <!-- <p class=""><strong>#123456</strong></p> -->
                                            <p class="text-center"><strong><?php echo strtoupper($this_user[0]['regnum']);?></strong></p>
                                            <p class="text-center">
                                                <?php if(!isset($this_user[0]['wphone'])){
                                                    echo "";
                                                }else{
                                                    echo "
                                                    <strong><a href='tel: ".$this_user[0]['wphone']."'>".$this_user[0]['wphone']."</a></strong><br/>
                                                    ";
                                                }?>
                                                <strong><a href='mailto:#'><?php echo $this_user[0]['email']; ?></a></strong></p>
                                            
                                            <div>
                                                <form action="./inc/update_photo.php" method="POST" enctype="multipart/form-data">
                                                    <input type="file" name="photo" id="photo" accept=".jpg,.jpeg,.png">
                                                    <!-- <input type="text" name="myphoto" id="photo" accept=".jpg,.jpeg,.png"> -->
                                                    <input type="submit" class="btn btn-primary btn-block form-control" name="submit">
                                                </form>
                                            </div>
                                            <div class="">
                                                <ul>
                                                
                                                </ul>
                                            </div>
                                               
                                        </div>
                                        <div class="col-md-10">

                                            <div class="table-responsive">
                                                <table class="table mt-4">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="9">BIODATA</th>
                                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Academic year</b><br/></td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php echo date('Y');?></td>
                                                            <td><b>Gender</b> <br/></td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php echo strtoupper($this_user[0]['gender']);?></td>
                                                            
                                                        </tr>
                                                        <!-- //row 2 -->
                                                        <tr>
                                                            <td><b>Nationality</b><br/></td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php echo strtoupper($this_user[0]['nationality']);?></td>
                                                            <td><b>State</b> <br/></td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php echo strtoupper($this_user[0]['state']);?></td>
                                                            <td><b>LGA</b> <br/> </td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php echo strtoupper($this_user[0]['lga']);?></td>
                                                        </tr>
                                                        <!-- //row 3 -->
                                                        <tr>
                                                            <td><b>Date of birth</b><br/></td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php echo strtoupper($this_user[0]['dob']);?></td>
                                                            <td><b>Blood group</b> <br/></td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php echo strtoupper($this_user[0]['bloodgroup']);?></td>
                                                            <td><b>Genotype</b> <br/> </td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php echo strtoupper($this_user[0]['genotype']);?></td>
                                                        </tr>
        
                                                        <!-- //row 4 -->
                                                      
                                                        <tr>
                                                            <th colspan='9'>EMERGENCY CONTACT INFORMATION</th>
                                                        </tr>
                                                               

                                                        <!-- //row 5 -->
                                                        <tr>
                                                            <td><b>Full name</b><br/></td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php echo strtoupper($this_user[0]['parents_fullname']);?></td>
                                                            <td colspan = '2'><b>Phone number</b> <br/></td>
                                                            <td>:</td>
                                                            <td colspan = '3' class="text-right"><?php echo ($this_user[0]['parents_phone']);?></td>
                                                            <!-- <td><b>WhatsApp number</b> <br/> </td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php //echo strtoupper($this_user[0]['wphone']);?></td> -->
                                                        </tr>
                                                        <!-- //row 6 -->
                                                        <tr>
                                                            <td><b>Email</b><br/></td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php echo strtoupper($this_user[0]['parents_email']);?></td>
                                                            <td><b>Occupation</b> <br/></td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php echo strtoupper($this_user[0]['occupation']);?></td>
                                                            <td><b>R/ship with NOK</b> <br/> </td>
                                                            <td>:</td>
                                                            <td class="text-right"><?php echo strtoupper($this_user[0]['address']);?></td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td><b>Office Phone</b> <br/> </td>
                                                            <td>:</td>
                                                            <td colspan="2" class="text-right"><?php echo strtoupper($this_user[0]['sponsor_phone']);?></td>
                                                            <td><b>Office Address</b> <br/> </td>
                                                            <td>:</td>
                                                            <td colspan="3" class="text-right"><?php echo strtoupper($this_user[0]['sponsor_address']);?></td>
                                                        </tr>
                                                        <!-- //row 7 -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <!-- end row -->
    
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                        </div>
                                    </div>
                                    
    
                                    <div class="d-print-none my-4">
                                        <div class="text-right">
                                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>

                                            <?php if($_SESSION['usertype'] == "admin"):
                                                echo "<a href=\"edit-teacher.php?id=$id\" class=\"btn btn-info waves-effect waves-light\">Edit my bio page</a>";
                                            endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          <?php include "./inc/footer.php"; ?>