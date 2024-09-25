<?php
session_start();
//connect to the database
    include_once('const.php');

    $sqlConnection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    // Check connection for errors and exit if true
    if ($sqlConnection->connect_error) {
        returnJson(STATUS_ERROR, SQL_CONNECTION_ERROR, INTERNAL_SERVER_ERROR);
        die();
    }

    function error422($message){
        $data = [
            'status' => 422,
            'message' => $message,
        ];
        header('HTTP/1.0 422 Unprocessable Entity');
        return json_encode($data);
        exit();
    }

    //upload payment receipt
    function upload_payment_receipt($input, $file, $id){
        global $sqlConnection;
    
        // var_dump($file);die;
        // $grade = mysqli_real_escape_string($sqlConnection, $input['grade']);
        // $subject = mysqli_real_escape_string($sqlConnection, $input['subject']);
        //adding the photo
        $target = "./payment_receipts/".basename($_FILES['submit_payment']['name']);
        $uploaded_by = $_SESSION['id'];
        $submit_payment = $_FILES['submit_payment']['name'];
        // var_dump($_FILES);DIE;
        if($_FILES['submit_payment']['size'] > 2000000){
            var_dump("File exceeds 2MB");
            return false;
    
        }
        if(!(move_uploaded_file($_FILES['submit_payment']["tmp_name"], $target))){
            // var_dump($_FILES);
            var_dump("Error uploading file");
            return false;
        };
    
    
        $query = "INSERT INTO school_fees_receipts (`submitted_by`,`receipt`) VALUES ('$uploaded_by','$submit_payment')";
    
        $result = mysqli_query($sqlConnection, $query);
    
        
        if($result){
            $data = [
                'status' => 200,
                'message' => 'Lesson note uploaded successfully',
            ];
            header('HTTP/1.0 Lesson note uploaded successfully');
            return json_encode($data);
        }else{
            
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header('HTTP/1.0 500 Internal Server Error');
            return json_encode($data);
        }
    
                
    }
    //upload payment receipt
    //get a single student
    function getStudent($param){
        global $sqlConnection;

        // if(!$param['state_id']){
        //     $state_id = null;
        // }else{
            $user_id = (int)$param['id'];
        // }

        $query = "SELECT * FROM users WHERE id = $user_id";
        //    var_dump($sqlConnection);die;
        $query_run = mysqli_query($sqlConnection, $query);

        if($query_run){

            if(mysqli_num_rows($query_run) > 0){

                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

                $data = [
                    'status' => 200,
                    'message' => 'Student Fetched Successfully',
                    'data' => $res,
                ];
                header('HTTP/1.0 200 Student Fetched Successfully');
                return json_encode($data);

            }else{
                $data = [
                    'status' => 404,
                    'message' => 'No Student with this credential Found'
                ];
                header('HTTP/1.0 200 No Student with this credential Found');
                return json_encode($data);
            }

        }else{
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header('HTTP/1.O 500 Internal Server Error');
            return json_encode($data);
        }
    }

    ////uppload grades
    function upload_class($input, $id){
        global $sqlConnection;
    
        // var_dump($file);die;
        $grade = mysqli_real_escape_string($sqlConnection, $input['grade']);
        $grade = strtolower($grade);
        $uploaded_by = $id;
       
        $query = "INSERT INTO student_classes (`grade`, `uploaded_by`) VALUES ('$grade', '$uploaded_by')";
    
        $result = mysqli_query($sqlConnection, $query);
    
        
        if($result){
            $data = [
                'status' => 200,
                'message' => 'grade uploaded successfully',
            ];
            header('HTTP/1.0 grade uploaded successfully');
            return json_encode($data);
        }else{
            
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header('HTTP/1.0 500 Internal Server Error');
            return json_encode($data);
        }
    
    }
    ////uppload grades
    ////joinUs, for potential students
    function addSchoolFeesItems($input){
        global $sqlConnection;
    
        // var_dump($file);die;
        $schoolfeesitem = mysqli_real_escape_string($sqlConnection, $input['schoolfeesitem']);
        $schoolfeesitem = strtolower($schoolfeesitem);
        $description = mysqli_real_escape_string($sqlConnection, $input['description']);
        $amount = mysqli_real_escape_string($sqlConnection, $input['amount']);
        $modality = mysqli_real_escape_string($sqlConnection, $input['modality']);
        $created_by = mysqli_real_escape_string($sqlConnection, $_SESSION['id']);
    //    $created_by = $_SESSION['id'];
       
        $query = "INSERT INTO school_fees_items (`schoolfeesitem`, `description`, `amount`,`modality`, `created_by`) VALUES ('$schoolfeesitem', '$description', '$amount', '$modality', '$created_by')";
    
        $result = mysqli_query($sqlConnection, $query);
        // var_dump($sqlConnection);die;
        
        if($result){
            $data = [
                'status' => 200,
                'message' => 'School item added successfully',
            ];
            header('HTTP/1.0 200 OK');
            return json_encode($data);
        }else{
            
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header('HTTP/1.0 500 Internal Server Error');
            return json_encode($data);
        }
    
    }
    function joinUs($input){
        global $sqlConnection;
    
        // var_dump($file);die;
        $myname = mysqli_real_escape_string($sqlConnection, $input['myname']);
        $myname = strtolower($myname);
        $email = mysqli_real_escape_string($sqlConnection, $input['email']);
        $phone_number = mysqli_real_escape_string($sqlConnection, $input['phone_number']);
        $kids_num = mysqli_real_escape_string($sqlConnection, $input['kids_num']);
        $num = (int)$kids_num;
        $kids_info = [];

        // for($i = 0; $i < $num; $i++){
        //    $one_name = "{$kids_name}_$i";
        //    $one_name = mysqli_real_escape_string($sqlConnection, $input[$one_name]);
        //    array_push($kids_info, $one_name);
        // }
        // var_dump($kids_info);die;
        // $uploaded_by = $id;
       
        $query = "INSERT INTO potential_students (`myname`, `email`, `phone_number`, `num_of_kids`, `kids_info`) VALUES ('$myname', '$email', '$phone_number', '$num', '$kids_info')";
    
        $result = mysqli_query($sqlConnection, $query);
    
        
        if($result){
            $data = [
                'status' => 200,
                'message' => 'Subject uploaded successfully',
            ];
            header('HTTP/1.0 Subject uploaded successfully');
            return json_encode($data);
        }else{
            
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header('HTTP/1.0 500 Internal Server Error');
            return json_encode($data);
        }
    
    }
    ////joinUs, for potential students
    ////upload subject
    function upload_subject($input, $id){
        global $sqlConnection;
    
        // var_dump($file);die;
        $subject = mysqli_real_escape_string($sqlConnection, $input['subject']);
        $subject = strtolower($subject);
        $level = mysqli_real_escape_string($sqlConnection, $input['level']);
        $level = strtolower($level);
        $uploaded_by = $id;
       
        $query = "INSERT INTO subjects (`subject`,`level`, `uploaded_by`) VALUES ('$subject', '$level', '$uploaded_by')";
    
        $result = mysqli_query($sqlConnection, $query);
    
        
        if($result){
            $data = [
                'status' => 200,
                'message' => 'Subject uploaded successfully',
            ];
            header('HTTP/1.0 Subject uploaded successfully');
            return json_encode($data);
        }else{
            
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header('HTTP/1.0 500 Internal Server Error');
            return json_encode($data);
        }
    
    }
    ////upload subject

    function getLgaList($param){
        global $sqlConnection;

        // if(!$param['state_id']){
        //     $state_id = null;
        // }else{
            $state_id = (int)$param['state_id'];
        // }

        $query = "SELECT * FROM lga WHERE state_id = $state_id";
        //    var_dump($sqlConnection);die;
        $query_run = mysqli_query($sqlConnection, $query);

        if($query_run){

            if(mysqli_num_rows($query_run) > 0){

                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

                $data = [
                    'status' => 200,
                    'message' => 'Lga List Fetched Successfully',
                    'data' => $res,
                ];
                header('HTTP/1.0 200 Lga List Fetched Successfully');
                return json_encode($data);

            }else{
                $data = [
                    'status' => 404,
                    'message' => 'No Lga Found'
                ];
                header('HTTP/1.0 200 No Lga Found');
                return json_encode($data);
            }

        }else{
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header('HTTP/1.O 500 Internal Server Error');
            return json_encode($data);
        }
    }

    
    function updateBio($customerInput, $id){
        
        //ensure connection is established
        global $sqlConnection;
        
        // $id = (int)$_SESSION["id"];

        // if(isset($_SESSION['edit_users_id']) && ($_SESSION['toEditUser'] == true)){
            $id = (int)$_SESSION['edit_users_id'];
        // }
        // if($id == null || !($id)){
        //     $id = (int)$_SESSION['edit_users_id'];
        // }
    
        //ensure id of student is not empty and 
        //that the customer params is not empty
        // var_dump($customerInput);die;
        if(!($id)){
    
            return error422("$id = The id is empty");
        }elseif($id == null){
    
            return error422("The id cannot be null");
            
        }
    
        //sanitize the text gotten from the form
        $id = mysqli_real_escape_string($sqlConnection, $id);
        $name = mysqli_real_escape_string($sqlConnection, $customerInput['students_name']);
        $name = strtolower($name);
        $regnum = mysqli_real_escape_string($sqlConnection, $customerInput['regnum']);
        $surname = mysqli_real_escape_string($sqlConnection, $customerInput['surname']);
        $surname = strtolower($surname);
        $dob = mysqli_real_escape_string($sqlConnection, $customerInput['dob']);
        $gender = mysqli_real_escape_string($sqlConnection, $customerInput['gender']);
        $students_class = mysqli_real_escape_string($sqlConnection, $customerInput['students_class']);
        $state = mysqli_real_escape_string($sqlConnection, $customerInput['state']);
        $lga = mysqli_real_escape_string($sqlConnection, $customerInput['lga']);
        $nationality = mysqli_real_escape_string($sqlConnection, $customerInput['nationality']);
        $bloodgroup = mysqli_real_escape_string($sqlConnection, $customerInput['bloodgroup']);
        $genotype = mysqli_real_escape_string($sqlConnection, $customerInput['genotype']);
        $parents_fullname = mysqli_real_escape_string($sqlConnection, $customerInput['parents_fullname']);
        $parents_phone = mysqli_real_escape_string($sqlConnection, $customerInput['parents_phone']);
        $parents_email = mysqli_real_escape_string($sqlConnection, $customerInput['parents_email']);
        $occupation = mysqli_real_escape_string($sqlConnection, $customerInput['occupation']);
        $wphone = mysqli_real_escape_string($sqlConnection, $customerInput['wphone']);
        $sponsor_fullname = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_fullname']);
        $sponsor_phone = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_phone']);
        $sponsor_email = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_email']);
        $sponsor_occupation = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_occupation']);
        $sponsor_wphone = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_wphone']);
        $sponsor_address = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_address']);
        $address = mysqli_real_escape_string($sqlConnection, $customerInput['address']);
        // var_dump(!(isset($_POST['photo'])));die;
        
        //adding the photo
        // $target = "./images/".basename($_FILES['photo']['name']);
        // $photo = isset($_POST['photo']) ? $_POST['photo']: $customerInput['photo'];
        // var_dump($_FILES['photo']['name']);die;

        // if(!(isset($_FILES['photo']['name']))){
        //     $photo = $_SESSION['user_photo'];

        
        // }else{

        //     $photo = $_FILES['photo']['name'];
        // }
        // else{
        
        // var_dump($photo);die;
        // if($_FILES['photo']['size'] > 3000000){
        //     var_dump("File exceeds 3MB");
        //     return false;

        // }
        // if((!($_FILES['photo'] == 0)) && ($_FILES['photo']['size'] > 0)){

        //     if(!(move_uploaded_file($_FILES['photo']["tmp_name"], $target))){
        //         var_dump($_FILES);
        //         var_dump("Error uploading file");
        //         return false;
        // }
        // var_dump($photo);die;

            //adding the photo
            // return error message in case of an empty field
        // }elseif(false){
            
        //     return false;
        // if(empty(trim($regnum))){
        //     return error422('Enter your registration number');
        // }elseif(empty(trim($surname))){
        //     return error422('Enter your surname');
        // }elseif(empty(trim($students_class))){
        //     return error422("Enter student's class");
        // }elseif(empty(trim($nationality))){
        //     return error422("Enter parent's nationality");
        // }elseif(empty(trim($state))){
        //     return error422("Enter parent's state");
        // }elseif(empty(trim($lga))){
        //     return error422("Enter parent's lga");
        // }elseif(empty(trim($dob))){
        //     return error422("Enter parent's date of birth");
        // }elseif(empty(trim($bloodgroup))){
        //     return error422("Enter parent's bloodgroup");
        // }elseif(empty(trim($genotype))){
        //     return error422("Enter student's genotype");
        // }elseif(empty(trim($parents_fullname))){
        //     return error422("Enter parent's full name");
        // }elseif(empty(trim($parents_phone))){
        //     return error422("Enter parent's phone number");
        // }elseif(empty(trim($parents_email))){
        //     return error422('Enter parent\'s email');
        // }elseif(empty(trim($occupation))){
        //     return error422("Enter parent's occupation");
        // }elseif(empty(trim($wphone))){
        //     return error422("Enter parent's whatsApp number");
        // }elseif(empty(trim($sponsor_email))){
        //     return error422("Enter sponsor's full email");
        // }elseif(empty(trim($sponsor_fullname))){
        //     return error422("Enter sponsor's full name");
        // }elseif(empty(trim($sponsor_phone))){
        //     return error422("Enter sponsor's phone number");
        // }elseif(empty(trim($sponsor_occupation))){
        //     return error422("Enter sponsor's occupation");
        // }elseif(empty(trim($sponsor_wphone))){
        //     return error422("Enter sponsor's WhatsApp phone number");
        // }elseif(empty(trim($sponsor_address))){
        //     return error422("Enter sponsor's address");
        // }elseif(empty(trim($address))){
        //     return error422("Enter parent's address");
        // }else{
        // var_dump($_FILES);die;
            
            //update the databse if there is no empty field
            $query = "UPDATE users SET 
            regnum = '$regnum',
            name = '$name',
            surname = '$surname',
            dob = '$dob',
            gender = '$gender',
            students_class = '$students_class',
            nationality = '$nationality',
            state = '$state',
            lga = '$lga',
            bloodgroup = '$bloodgroup',
            genotype = '$genotype',
            parents_fullname = '$parents_fullname',
            parents_phone = '$parents_phone',
            parents_email = '$parents_email',
            occupation = '$occupation',
            wphone = '$wphone',
            sponsor_email = '$sponsor_email',
            sponsor_fullname = '$sponsor_fullname',
            sponsor_phone = '$sponsor_phone',
            sponsor_occupation = '$sponsor_occupation',
            sponsor_wphone = '$sponsor_wphone',
            address = '$address',
            sponsor_address = '$sponsor_address'
            -- photo = '$photo'

            WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($sqlConnection, $query);
    
            // var_dump($result);die;  
            if($result){
                $data = [
                    'status' => 200,
                    'message' => 'Profile updated successfully',
                ];
                // var_dump(typeof($data));die;
                header('HTTP/1.0 200 OK');
                // echo json_encode($data);

                return json_encode($data);
            }else{
                
                $data = [
                    'status' => 500,
                    'message' => 'Internal Server Error'
                ];
                header('HTTP/1.0 500 Internal Server Error');
                // echo json_encode($data);
                return json_encode($data);
            }
        // }
    // }
    }
    function registerNewStudent($customerInput){
        // var_dump($customerInput);die;
        //ensure connection is established
        global $sqlConnection;
            
        //sanitize the text gotten from the form
        $name = mysqli_real_escape_string($sqlConnection, $customerInput['students_name']);
        $name = strtolower($name);
        $surname = mysqli_real_escape_string($sqlConnection, $customerInput['surname']);
        $surname = strtolower($surname);
        $dob = mysqli_real_escape_string($sqlConnection, $customerInput['dob']);
        $gender = mysqli_real_escape_string($sqlConnection, $customerInput['gender']);
        $students_class = mysqli_real_escape_string($sqlConnection, $customerInput['students_class']);
        $state = mysqli_real_escape_string($sqlConnection, $customerInput['state']);
        $lga = mysqli_real_escape_string($sqlConnection, $customerInput['lga']);
        $nationality = mysqli_real_escape_string($sqlConnection, $customerInput['nationality']);
        $bloodgroup = mysqli_real_escape_string($sqlConnection, $customerInput['bloodgroup']);
        $genotype = mysqli_real_escape_string($sqlConnection, $customerInput['genotype']);
        $parents_fullname = mysqli_real_escape_string($sqlConnection, $customerInput['parents_fullname']);
        $parents_phone = mysqli_real_escape_string($sqlConnection, $customerInput['parents_phone']);
        $parents_email = mysqli_real_escape_string($sqlConnection, $customerInput['parents_email']);
        $occupation = mysqli_real_escape_string($sqlConnection, $customerInput['occupation']);
        $wphone = mysqli_real_escape_string($sqlConnection, $customerInput['wphone']);
        $sponsor_fullname = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_fullname']);
        $sponsor_phone = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_phone']);
        $sponsor_email = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_email']);
        $sponsor_occupation = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_occupation']);
        $sponsor_wphone = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_wphone']);
        $sponsor_address = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_address']);
        $address = mysqli_real_escape_string($sqlConnection, $customerInput['address']);
        //new additions
        $prev_school = mysqli_real_escape_string($sqlConnection, $customerInput['prev_school']);
        $office_address = mysqli_real_escape_string($sqlConnection, $customerInput['office_address']);
        $office_phone = mysqli_real_escape_string($sqlConnection, $customerInput['office_phone']);
        $sponsor_office_address = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_office_address']);
        $sponsor_office_phone = mysqli_real_escape_string($sqlConnection, $customerInput['sponsor_office_phone']);


        // return error message in case of an empty field
        if(false){
            
            return false;
        // if(empty(trim($regnum))){
        //     return error422('Enter your registration number');
        // }elseif(empty(trim($surname))){
        //     return error422('Enter your surname');
        // }elseif(empty(trim($students_class))){
        //     return error422("Enter student's class");
        // }elseif(empty(trim($nationality))){
        //     return error422("Enter parent's nationality");
        // }elseif(empty(trim($state))){
        //     return error422("Enter parent's state");
        // }elseif(empty(trim($lga))){
        //     return error422("Enter parent's lga");
        // }elseif(empty(trim($dob))){
        //     return error422("Enter parent's date of birth");
        // }elseif(empty(trim($bloodgroup))){
        //     return error422("Enter parent's bloodgroup");
        // }elseif(empty(trim($genotype))){
        //     return error422("Enter student's genotype");
        // }elseif(empty(trim($parents_fullname))){
        //     return error422("Enter parent's full name");
        // }elseif(empty(trim($parents_phone))){
        //     return error422("Enter parent's phone number");
        // }elseif(empty(trim($parents_email))){
        //     return error422('Enter parent\'s email');
        // }elseif(empty(trim($occupation))){
        //     return error422("Enter parent's occupation");
        // }elseif(empty(trim($wphone))){
        //     return error422("Enter parent's whatsApp number");
        // }elseif(empty(trim($sponsor_email))){
        //     return error422("Enter sponsor's full email");
        // }elseif(empty(trim($sponsor_fullname))){
        //     return error422("Enter sponsor's full name");
        // }elseif(empty(trim($sponsor_phone))){
        //     return error422("Enter sponsor's phone number");
        // }elseif(empty(trim($sponsor_occupation))){
        //     return error422("Enter sponsor's occupation");
        // }elseif(empty(trim($sponsor_wphone))){
        //     return error422("Enter sponsor's WhatsApp phone number");
        // }elseif(empty(trim($sponsor_address))){
        //     return error422("Enter sponsor's address");
        // }elseif(empty(trim($address))){
        //     return error422("Enter parent's address");
        }else{
            
            // INSERT INTO `school_portal`.`users` (`name`, `surname`) VALUES ('Aminu', 'jaden');

            //update the databse if there is no empty field
            $query = "INSERT INTO users 
            (`name`,`surname`,`dob`,`gender`,`students_class`,`nationality`,`state`,`lga`,`bloodgroup`,`genotype`,`parents_fullname`,`parents_phone`,`parents_email`,`occupation`,`wphone`,`sponsor_email`,`sponsor_fullname`,`sponsor_phone`,`sponsor_occupation`,`sponsor_wphone`,`address`,`sponsor_address`, `prev_school`, `office_address`, `office_phone`, `sponsor_office_phone`, `sponsor_office_address`) VALUES ('$name','$surname','$dob','$gender','$students_class','$nationality','$state','$lga','$bloodgroup','$genotype','$parents_fullname','$parents_phone','$parents_email','$occupation','$wphone','$sponsor_email','$sponsor_fullname','$sponsor_phone','$sponsor_occupation','$sponsor_wphone','$address','$sponsor_address', '$prev_school', '$office_address', '$office_phone', '$sponsor_office_phone', '$sponsor_office_address')";
            
            $result = mysqli_query($sqlConnection, $query);
    
            // var_dump($result);die;
            if($result){
                $data = [
                    'status' => 200,
                    'message' => 'Profile Created successfully',
                ];
                // var_dump(typeof($data));die;
                header('HTTP/1.0 Profile Created successfully');
                // echo json_encode($data);

                return json_encode($data);
            }else{
                
                $data = [
                    'status' => 500,
                    'message' => 'Internal Server Error'
                ];
                header('HTTP/1.0 500 Internal Server Error');
                // echo json_encode($data);
                return json_encode($data);
            }
        }
    }

    function upload_lesson_note($input, $file, $id){
        global $sqlConnection;
    
        // var_dump($file);die;
        $grade = mysqli_real_escape_string($sqlConnection, $input['grade']);
        $subject = mysqli_real_escape_string($sqlConnection, $input['subject']);
        //adding the photo
        $target = "./lesson_notes/".basename($_FILES['lesson_note']['name']);
        $uploaded_by = $id;
        $lesson_note = $_FILES['lesson_note']['name'];
        if($_FILES['lesson_note']['size'] > 2000000){
            var_dump("File exceeds 2MB");
            return false;
    
        }
        if(!(move_uploaded_file($_FILES['lesson_note']["tmp_name"], $target))){
            // var_dump($_FILES);
            var_dump("Error uploading file");
            return false;
        };
    
    
        $query = "INSERT INTO lesson_notes (`grade`,`subject`,`lesson_note`, `uploaded_by`) VALUES ('$grade','$subject','$lesson_note', '$uploaded_by')";
    
        $result = mysqli_query($sqlConnection, $query);
    
        
        if($result){
            $data = [
                'status' => 200,
                'message' => 'Lesson note uploaded successfully',
            ];
            header('HTTP/1.0 Lesson note uploaded successfully');
            return json_encode($data);
        }else{
            
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header('HTTP/1.0 500 Internal Server Error');
            return json_encode($data);
        }
    
                
    }

function getCustomerList(){
    global $conn;

   $query = "SELECT * FROM customers";
   $query_run = mysqli_query($conn, $query);

   if($query_run){

        if(mysqli_num_rows($query_run) > 0){

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Customer List Fetched Successfully',
                'data' => $res,
            ];
            header('HTTP/1.0 200 Customer List Fetched Successfully');
            return json_encode($data);

        }else{
            $data = [
                'status' => 404,
                'message' => 'No customer Found'
            ];
            header('HTTP/1.0 200 No customer Found');
            return json_encode($data);
        }

   }else{
    $data = [
        'status' => 500,
        'message' => 'Internal Server Error'
    ];
    header('HTTP/1.O 500 Internal Server Error');
    return json_encode($data);
   }
}


function storeCustomer($customerInput){
    global $conn;

    if($customerInput){
        $name = mysqli_real_escape_string($conn, $customerInput["name"]);
        $email = mysqli_real_escape_string($conn, $customerInput["email"]);
        $phone = mysqli_real_escape_string($conn, $customerInput["phone"]);

        if(empty(trim($name))){

            return error422("The name is empty");
        }elseif(empty(trim($email))){
            
            return error422("The email is empty");
        }elseif(empty(trim($phone))){
            
            return error422("The phone is empty");
        }else{
            $query = "INSERT INTO customers (name, email, phone) VALUES ('$name', '$email', '$phone');";

            $result = mysqli_query($conn, $query);
            if($result){
                $data = [
                    'status' => 201,
                    'message' => 'Created'
                ];
                header('HTTP/1.O 201 Record created successfully.');
                return json_encode($data);
            }else{
                $data = [
                    'status' => 500,
                    'message' => 'Internal Server Error'
                ];
                header('HTTP/1.0 500 Internal Server Error');
                return json_encode($data);
            }
        }
    }
};

function updateCustomer($customerInput, $customerParams){
    global $conn;

    if(empty($customerParams['id'])){

        return error422("The id is empty");
    }elseif($customerParams['id'] == null){

        return error422("The id cannot be null");
    }

    $customerId = mysqli_real_escape_string($conn, $customerParams['id']);
    $name = mysqli_real_escape_string($conn, $customerInput['name']);
    $email = mysqli_real_escape_string($conn, $customerInput['email']);
    $phone = mysqli_real_escape_string($conn, $customerInput['phone']);

  

    if(empty(trim($name))){

        return error422('Enter your name');
    }elseif(empty(trim($email))){

        return error422('Enter your email');
    }elseif(empty(trim($phone))){

        return error422('Enter your phone');
    }else{
        
        $query = "UPDATE customers SET name = '$name', email = '$email', phone = '$phone' WHERE id = '$customerId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
           
            $data = [
                'status' => 200,
                'message' => 'Customer updated successfully',
            ];
            header('HTTP/1.0 Customer updated successfully');
            echo json_encode($data);
        }else{
            
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header('HTTP/1.0 500 Internal Server Error');
            echo json_encode($data);
        }
    }
}

function deleteCustomer($customerParams){
    global $conn;
    $customerId = $customerParams['id'];

    if(!isset($customerId)){
        
        return error422('No id found in url');
    }elseif($customerId == null){

        return error422('Enter the customer id');
    }

    $query = "DELETE FROM customers WHERE id ='$customerId' LIMIT 1";
    $result = mysqli_query($conn, $query);
    
    if($result){
        $data = [
            'status' => 200,
            'message' => 'Customer deleted Successfully',
        ];
        header('HTTP/1.0 Success');
        return json_encode($data);
    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        header('HTTPS/1.0 500 Internal Server Error');
        return json_encode($data);
    }
}
?>