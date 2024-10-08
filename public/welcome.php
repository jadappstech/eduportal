<?php 
    include "./inc/header.php";

//    include "./inc/config.php";

    if(!isset($_SESSION['name'])){
        header("Location: ./index.php");
    }

    $usertype = $usertype ?? null;
    $query = "SELECT * FROM users WHERE id = '$id'";
    // var_dump($username);die;
    $result = mysqli_query($sqlConnection, $query);

    if($result->num_rows > 0){
        $user = $result->fetch_all(MYSQLI_ASSOC);
    }

    $_SESSION['usertype'] = $user[0]['usertype'];
    $usertype = $_SESSION['usertype'];
    $school_fees = $user[0]['school_fees'];
    $my_class = $user[0]['students_class'];
    $_SESSION['my_class'] = $my_class;
    // var_dump($school_fees);die;
?>

 <style>
    .content-container {
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 8px;
    margin-top:60px;
    margin-left: 250px;
    margin-bottom:;
    flex-grow:1; 
}

.top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
}

.search-bar {
    padding: 10px;
    width: 60%;
    border-radius: 25px;
    border: 1px solid #ccc;
}

.profile-section {
    display: flex;
    align-items: center;
}

.profile-section .date {
    margin-right: 15px;
    font-size: 14px;
}

.profile-icon {
    background-color: #000;
    color: #fff;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
}

.bible-verse-section {
    margin-top: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
}

.bible-title {
    background-color: #f0c200;
    padding: 10px;
    font-weight: bold;
    text-align: center;
    border-radius: 10px 10px 0 0;
}

.bible-verse {
    padding: 20px;
    text-align: center;
    font-size: 14px;
    background-color: #fff;
}

.last-terms-section {
    display: flex;
    justify-content: space-between;
    background-color: #fff;
    padding: 10px;
    border-radius: 10px;
    flex-grow:1;
    margin-top:0px;
    margin-right:8px;
}
.last-term-heading{
    text-align:center; 
    padding:10px;
    font-weight:700; 
    color:black;
}
.last-term-item {
    text-align: center;
    width:45%;
}

.last-term-item span {
    display: block;
    font-weight: bold;
    color: #333;
}

.quick-links {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
    margin-top: 20px;
}

.quick-link {
    background-color: #d3d3d3;
    padding: 15px;
    text-align: center;
    font-weight: bold;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 14px;
}

.quick-link i {
    margin-right: 10px;
}

.classmates {
    background-color: #b5d2c3;
    padding-top:12px;
    padding-bottom:;
}

.teachers {
    background-color: #d3bbc8;
}

.class {
    background-color: #e7e4eb;
}

.subjects {
    background-color: #c3acb1;
}

.club {
    background-color: #bccbbd;
}

.house {
    background-color: #bdbbd3;
}

.upcoming-events-section {
    margin-top: 30px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
}

.section-title {
    font-weight: bold;
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
    border-radius: 10px;
}

.upcoming-events-section ul {
    list-style-type: none;
    margin-top: 15px;
}

.upcoming-events-section li {
    background-color: #f4f4f4;
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 10px;
    text-align: center;
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
    <div class="content-container">
    
    

    <!-- Bible verse section -->
    <div class="bible-verse-section">
        <div class="bible-title">Bible verse of the day</div>
        <div class="bible-verse">
            <strong>John 3 verse 16</strong><br>
            For God so loved the world that He gave His only begotten Son, that whosoever believeth in Him shall not perish but have everlasting life.
        </div>
    </div>

    <!-- Last terms section -->
     <div style=" display:flex; flex-direction:row; margin-bottom:48px; justify:space-evenly;">
    
     <div style="width:25%;">
        <div class="last-term-heading"><span>Last term</span></div>
        <div class="last-terms-section" style="margin-right:8px;">
            <div class="last-term-item">
                <span>Position</span><br>
                <strong>5</strong>
            </div>
            <div class="last-term-item">
                <span>Class size</span><br>
                <strong>20</strong>
            </div>
        </div>
    </div>

    <div style="width:25%;">
        <div class="last-term-heading"><span>Last term</span></div>
        <div class="last-terms-section">
            <!-- <div class="last-term-item">
                <span>Position</span><br>
                <strong>5</strong>
            </div> -->
            <div class="last-term-item" style="width:100%;">
                <span>Subjects offered</span><br>
                <strong>10</strong>
            </div>
        </div>
    </div>

    <div style="width:25%;">
        <div class="last-term-heading"><span>Last term</span></div>
        <div class="last-terms-section">
            <div class="last-term-item">
                <span>Position</span><br>
                <strong>5</strong>
            </div>
            <div class="last-term-item">
                <span>Class size</span><br>
                <strong>20</strong>
            </div>
        </div>
    </div>
    
    <div style="width:25%;">
        <div class="last-term-heading"><span>Last term</span></div>
        <div class="last-terms-section">
            <div class="last-term-item">
                <span>Position</span><br>
                <strong>5</strong>
            </div>
            <div class="last-term-item">
                <span>Class size</span><br>
                <strong>20</strong>
            </div>
        </div>
    </div>
   
    </div>

    <!-- Quick links section -->
    <div class="quick-links">
        <div class="quick-link classmates">
            <i class="fa fa-users"></i> Classmates 20
        </div>
        <div class="quick-link teachers">
            <i class="fa fa-chalkboard-teacher"></i> Teachers 15
        </div>
        <div class="quick-link class">
            JSS 3A
        </div>
        <div class="quick-link subjects">
            <i class="fa fa-book"></i> Subjects
        </div>
        <div class="quick-link club">
            <i class="fa fa-futbol"></i> Club
        </div>
        <div class="quick-link house">
            <i class="fa fa-home"></i> House
        </div>
    </div>

    <!-- Upcoming events section -->
    <div class="upcoming-events-section">
        <div class="section-title">Upcoming events</div>
        <ul>
            <li>Inter-house sport</li>
            <li>Inter-house sport</li>
            <li>Inter-house sport</li>
        </ul>
    </div>
</div>

</div>       

          <?php include "./inc/footer.php"; ?>