<?php include 'controllers/authController.php'?>

<?php

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
    header('location: index.php');
  }
  
$pw="Abcd1234#"; //Assign a common password for new employees
$errors = [];
$msg="";

//When submit button press in addemp.php
if (isset($_POST["empreg-submit-btn"])) {
    $title = $_POST['title'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $username = $_POST['username'];
    //$pass = $_POST['password'];
    $emproll = $_POST['emproll'];
    $department =  $_POST['department'];
    $appointment_date =  $_POST['appointment_date'];
    $basic_salary = $_POST['basic_salary'];
    $address =  $_POST['address'];
    $gender =$_POST['gender'];
    $dob =  $_POST['dob'];
    //$sql = "SELECT YEAR('$dob') AS Year"; 
    $mobileno = $_POST['mobileno'];
    $homeno = $_POST['homeno'];
    $civil_status =  $_POST['civil_status'];
    $ethnicity = $_POST['ethnicity'];
    $religion = $_POST['religion'];
    $edu_level = $_POST['edu_level'];
    $work_experience = $_POST['work_experience'];

    $bankname =  $_POST['bankname'];
    $branch = $_POST['branch'];
    $acc_no = $_POST['acc_no'];

    $ec_name =$_POST['ec_name'];
    $ec_relationship =  $_POST['ec_relationship'];
    $ec_mobileno = $_POST['ec_mobileno'];
    $ec_homeno = $_POST['ec_homeno'];
    $ec_workno = $_POST['ec_workno'];

    $password=password_hash($pw,PASSWORD_DEFAULT); //encrypt password
    
    //Set user type based on user roll
    if($emproll=="HR"){
        $usertype="hr";
    }
    else{
        $usertype="emp";
    }

    //Set fullname
    $fullname=$firstname."_".$lastname;

    $photo = $_FILES['photo'];
    $photoname = $_FILES['photo']['name'];
    $tempname = $_FILES["photo"]["tmp_name"]; 
    $pextension = pathinfo($photoname, PATHINFO_EXTENSION);
    $empphoto=rand(1,1000)."-".$fullname.".".$pextension;
    $folder = "images/emp-photos/".$empphoto;

    
    $cv=$_FILES['cv'];
    $cvname = $_FILES['cv']['name'];
    $cvtempname = $_FILES["cv"]["tmp_name"]; 
    $cvextension = pathinfo($cvname, PATHINFO_EXTENSION);                 
    //$file = rand(1,1000)."-".$_FILES['cv']['name'];
    $new_cvname =  rand(1,1000)."-".$fullname.".".$cvextension;
    $final_cvname=str_replace(' ','-',$new_cvname);      
    $cvfolder = "uploads/emp-cv/".$final_cvname;


    // Email_validation function 
  /*   function email_validation($str) { 
         return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) ? FALSE : TRUE; 
     } 

    // Function call 
     if(!email_validation(($_POST['email']))) { 
         $errors['email']= 'Invalid email address.';
     } 
     */
     $token = bin2hex(random_bytes(50)); // generate unique token
    
    // Check if email already exists
    $sql = "SELECT * FROM emp_registration WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }

    else if (count($errors) === 0) 
    {
        //create employee id
        $query0="SELECT empid FROM emp_registration ORDER BY empid DESC";
        $result0=mysqli_query($conn,$query0) or die ("Eror find empid: ".mysqli_error($conn));

        if(mysqli_num_rows($result0)>0){
            $row=mysqli_fetch_assoc($result0);
            $empid=$row['empid'];
            $empid=++$empid;
        }
        else{
            $empid="EM001";
        }

        //insert employee details in database
        $query1 = "INSERT INTO emp_registration(empid,title,firstname,lastname,email,nic,username,emproll,department,appointment_date,basic_salary,address,gender,dob,mobileno,homeno,civil_status,ethnicity,religion,edu_level,work_experience,photo,cv,usertype,bankname,branch,acc_no,ec_name,ec_relationship,ec_mobileno,ec_homeno,ec_workno) 
            VALUES('$empid','$title','$firstname', '$lastname','$email','$nic','$username','$emproll','$department','$appointment_date','$basic_salary','$address','$gender','$dob','$mobileno','$homeno','$civil_status','$ethnicity','$religion','$edu_level','$work_experience','$empphoto','$final_cvname','$usertype','$bankname','$branch','$acc_no','$ec_name','$ec_relationship','$ec_mobileno','$ec_homeno','$ec_workno')";
        $result1=$conn->query($query1)  or die($conn ->error);
        
        if($result1==true){ 

            if (!in_array($pextension, ['jpg', 'jpeg', 'png'])) {
                echo "Your image file extension must be .jpg, .jpeg or .png\n";
            } 
            else{
                $result_photo_upload=move_uploaded_file($tempname, $folder);
                
                if ($result_photo_upload===true)  {
                    echo "Image uploaded successfully";
                }else{
                    echo "Failed to upload image\n";           
                }
            }

            if (!in_array($cvextension, ['zip', 'pdf', 'docx'])) {
                echo "Your CV file extension must be .zip, .pdf or .docx\n";
            } 
            else{
                $result_cv_upload=move_uploaded_file($cvtempname, $cvfolder);       
                
                if ($result_cv_upload==true)  {
                    echo "CV uploaded successfully\n";               
                }
                else{
                        echo "Failed to upload CV";
                    }
            }
            
            //header('location: admin.php?pg=a_addemp.php');
        }
        
        
        //Create user account 
        $queryx="SELECT id FROM users ORDER BY id DESC";
        $resultx=mysqli_query($conn,$queryx) or die ("Eror find empid: ".mysqli_error($conn));

        if(mysqli_num_rows($resultx)>1){
            $row=mysqli_fetch_assoc($resultx);
            $id=$row['id'];
            $id=++$id;
        }
        else{
            $id="U001";
        }

        $query2 =  "INSERT INTO users SET id=?,username=?, email=?, usertype=?,token=?, password=?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param('ssssss',$id, $username, $email, $usertype,$token, $password);
        $result2 = $stmt2->execute();        

        if ($result2) {
            $user_id = $stmt2->insert_id;
            $stmt2->close();

            // TO DO: send verification email to user
            //sendVerificationEmail($email, $token);
        }
        
        else{
                $_SESSION['error_msg'] = "Database error: Could not register user";
        } 

        if(($result1==true) && ($result2==true)){
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                       window.alert('This new employee record has been added successfully.');
                        window.location.href='admin.php?pg=a_viewemp.php';
                        </SCRIPT>");                   
        }
        else{
                    echo "<script type='text/javascript'>window.alert('Error while adding new employee record') </script>";     
        }
                
    }
    else {
        $_SESSION['error_msg'] = "Database error: Could not register employee";
    }
    
}

?>