<?php include 'controllers/authController.php'?>

<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}

else if (($_SESSION['usertype']=='admin')) {
  header('location: admin.php');
}

$uname = $_SESSION['username'];
$sql = "SELECT * from emp_registration WHERE username='$uname'";
$result = mysqli_query($conn, $sql) or die("Error in Find :".mysqli_error($conn));
$rowedit=mysqli_fetch_assoc ($result);


$fullname=$rowedit['title']." ".$rowedit['firstname']." ".$rowedit['lastname'];
$eid=$rowedit['empid'];
$op_title=$rowedit['title'];
$op_emproll=$rowedit['emproll'];
$op_depart=$rowedit['department'];
$op_gender=$rowedit['gender'];
$op_civil=$rowedit['civil_status'];
$op_religion=$rowedit['religion'];
$op_bank=$rowedit['bankname'];
$pto=$rowedit['photo'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> 
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>	
    <link rel="stylesheet" href="css/form.css">
  
  <title>Update Employee Details</title> 

  <style>
    span.astr{
      color: red;
      font-size: 18px;

    }
  </style>
</head>

<body>

 <?php
        if ($_SESSION['usertype']=='hr' || $_SESSION['usertype']=='emp' ) {
            include "hr_emp_header.php";
        }
    ?>  

    <div id="cover" style="margin-top: 80px;">

        <div class="card text-center" style="height:auto;">
          <div class="card-header" style="padding-left: 150px;">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link" aria-current="true" href="myprofile.php#myDetails"><b>View</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#editMyDetails"><b>Edit</b></a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" aria-current="true" href="myProfileChange_pw.php#changePw"><b>Change Password</b></a>
              </li>           
            </ul>
            </div>

          <div class="card-body" style="background-image: url('images/c4.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: center; background-attachment: fixed;">
            <div id="myProfile" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/bg-themes/1.png" class="d-block w-100" width=100% height=200px alt="cover" style="position: relative;">
                  </div>
                </div>

                  <div class="col-lg-3">
                    <?php echo '<img src="images/emp-photos/'.$pto.'" class="bd-placeholder-img rounded-circle" width="200" height="200" role="img" alt="profile" style="margin-top: -100px; margin-bottom: 100px; position: absolute;">'; ?>
                    <br>                           
                  </div>
                  <div style="clear:both; float:left; padding-left: 420px;">
                    <h3 style="text-align: left;"><?php echo $fullname;?></h3>  
                    <p style="text-align: left;"><?php echo $rowedit['emproll'].', '.$rowedit['department'].' department';?> </p>
                    <table>
                      <tr>
                          <td style="padding-right: 20px;"><i class="fas fa-phone-alt"></i> <?php echo $rowedit['mobileno'] ;?></td>
                          <td style="padding-right: 20px;"><i class="fas fa-envelope"></i> <?php echo $rowedit['email'] ;?></td>
                          <td><i class="fas fa-map-marker-alt"></i> <?php echo $rowedit['address'] ;?></td>
                      </tr>
                    </table>
                  </div>
                  <br><br><br>


            <div class="content-wrapper p-t-100 p-b-100 font-robo" id="editMyDetails" style="text-align:center;">
                <div class="wrapper wrapper--w1100" style="max-width: 1100px;">
                  <div class="card card-1"  style="background: transparent; padding-left: 80px; padding-right: 80px;">
                    <div class="card-heading"></div>
                    <div class="card-body">

                    <form class="row g-3 needs-validation"  action="" method="post" name="update-emp-form" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
                        <h2 class="title">Update My Details</h2>  <br><br>
                        
                        <!-- Employee Personal Details -->
                        <label for="floatingInput" class="form-label"><b>Employee Personal Details</b></label>
                        
                        <!-- EmpID view -->
                        <div class="form-floating mb-2 col-md-4">  
                            <input type="text" class="form-control" name="empid" id="floatingInput" placeholder="EmpID" value="<?php echo $rowedit['empid']; ?>" readonly/> 
                            <label for="floatingInput" class="form-label">Employee ID</label>                                 
                        </div>
                        <!-- Email input -->
                        <div class="form-floating mb-2 col-md-4">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" value="<?php echo $rowedit['email']; ?>"readonly>
                            <label for="floatingInput">Email address</label>
                        </div>                         
                        <!-- NIC No input -->
                        <div class="form-floating mb-2 col-md-4">
                            <input type="text" class="form-control" name="nic" id="floatingInput" placeholder="NIC" value="<?php echo $rowedit['nic']; ?>" readonly/>
                            <label for="floatingInput" class="form-label">NIC No <span class="astr">*</span> </label>
                            <div class="invalid-feedback">Please enter your valid NIC no.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <!-- Appointment Date input -->
                        <div class="form-floating mb-2 col-md-12">
                            <input type="date" class="form-control" name="appointment_date" id="floatingInput"placeholder="mm/dd/yyyy" value="<?php echo $rowedit['appointment_date']; ?>" readonly/>
                            <label for="floatingInput" class="form-label">Appointment Date <span class="astr">*</span> </label>
                        </div> 
                        <!-- Employee Roll input -->
                        <div class="form-floating mb-2 col-md-4">
                            <select class="form-select" name="emproll" id="floatingSelect" aria-label="Floating label select" readonly disabled>
                            <option disabled>Choose...</option>
                                <option value="HR" <?php if($op_emproll=="HR") echo 'selected="selected"';?> >HR</option>
                                <option value="Manager" <?php if($op_emproll=="Manager") echo 'selected="selected"';?> >Manager</option>
                                <option value="Director" <?php if($op_emproll=="Director") echo 'selected="selected"';?> >Director</option>
                                <option value="Assist-Manager" <?php if($op_emproll=="Assist-Manager") echo 'selected="selected"';?> >Assist-Manager</option>
                                <option value="Trainee" <?php if($op_emproll=="Trainee") echo 'selected="selected"';?> >Trainee</option>
                            </select>
                            <label for="floatingSelect" class="form-label">Employee Roll <span class="astr">*</span> </label>                
                        </div>
                        <!-- Department input -->
                        <div class="form-floating mb-2 col-md-4">
                            <select class="form-select" name="department" id="floatingSelect" aria-label="Floating label select" readonly disabled>
                                <option selected disabled>Choose...</option>
                                <option value="HR" <?php if($op_depart=="HR") echo 'selected="selected"';?> > HR</option>
                                <option value="Marketing" <?php if($op_depart=="Marketing") echo 'selected="selected"';?> > Marketing</option>
                                <option value="Finance" <?php if($op_depart=="Finance") echo 'selected="selected"';?>> Finance</option>
                                <option value="Front-Office" <?php if($op_depart=="Front-Office") echo 'selected="selected"';?>> Front-Office</option>
                                <option value="IT" <?php if($op_depart=="IT") echo 'selected="selected"';?>> IT</option>
                            </select>
                            <label for="floatingSelect" class="form-label">Department <span class="astr">*</span> </label>                 
                        </div>
                        <!-- Basic Salary input -->
                        <div class="form-floating mb-2 col-md-4">
                            <input type="number" min="15000.00" step="500.00" class="form-control" name="basic_salary" id="floatingInputBasicSalary" placeholder="Basic Salary"  value="<?php echo $rowedit['basic_salary']; ?>" readonly>
                            <label for="floatingInput">Basic Salary <span class="astr">*</span> </label>  
                        </div>
                        <!-- Name itle input -->
                        <div class="form-outline mb-2 col-md-12">
                            <div class="input-group form-outline">
                                <span class="input-group-text mb-2 col-md-2">Name</span>
                                <!-- Title input -->                        
                                <div class="form-floating mb-2 col-md-2">                   
                                    <select class="form-select" name="title" id="floatingSelect" aria-label="Floating label select">
                                    <option selected disabled>Choose...</option>
                                    <option value="Mr." <?php if($op_title=="Mr.") echo 'selected="selected"';?> >Mr.</option>
                                    <option value="Mrs." <?php if($op_title=="Mrs.") echo 'selected="selected"';?> >Mrs.</option>
                                    <option value="Miss." <?php if($op_title=="Miss.") echo 'selected="selected"';?> >Miss.</option>
                                    <option value="Dr." <?php if($op_title=="Dr.") echo 'selected="selected"';?> >Dr.</option>
                                    </select>
                                    <label for="floatingSelect" class="form-label">Title <span class="astr">*</span> </label>
                                </div>    
                                <!-- Firstname input -->
                                <div class="form-floating mb-2 col-md-4">  
                                    <input type="text" class="form-control" name="firstname" id="floatingInput" placeholder="Firstname" value="<?php echo $rowedit['firstname']; ?>" pattern="^[A-Za-z \s*]+$" required/> 
                                    <label for="floatingInput" class="form-label">First name <span class="astr">*</span> </label>                   
                                    <div class="invalid-feedback">Please enter alphabets only. </div>                
                                    <div class="valid-feedback">Looks good!</div>                 
                                </div>
                                <!-- Lastname input -->
                                <div class="form-floating mb-2 col-md-4">  
                                    <input type="text" class="form-control" name="lastname" id="floatingInput" placeholder="Lastname" value="<?php echo $rowedit['lastname']; ?>" pattern="^[A-Za-z \s*]+$" required /> 
                                    <label for="floatingInput" class="form-label">Last name <span class="astr">*</span> </label>                   
                                    <div class="invalid-feedback">Please enter alphabets only. </div>                
                                    <div class="valid-feedback">Looks good!</div>                 
                                </div> 
                            </div> 
                        </div>           
                        <!-- Address input -->
                        <div class="form-floating mb-2 col-md-12">
                            <input type="text" class="form-control" name="address" id="floatingInput"placeholder="Address" value="<?php echo $rowedit['address']; ?>" required/>
                            <label for="floatingInput" class="form-label">Address <span class="astr">*</span> </label>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <!-- Gender input -->
                        <div class="form-floating mb-2 col-md-6">                   
                            <select class="form-select" name="gender" id="floatingSelect" aria-label="Floating label select" required>
                                <option value="" disabled>Choose...</option>
                                <option value="Male" <?php if($op_gender=="HR") echo 'selected="selected"';?> >Male</option>
                                <option value="Female" <?php if($op_gender=="HR") echo 'selected="selected"';?> >Female</option>
                                <option value="Other" <?php if($op_gender=="HR") echo 'selected="selected"';?> >Other</option>
                            </select>
                            <label for="floatingSelect" class="form-label">Gender <span class="astr">*</span> </label>
                        </div>
                        <!-- DOB input -->
                        <div class="form-floating mb-2 col-md-6">
                            <input type="date" class="form-control" name="dob" id="floatingInput"placeholder="mm/dd/yyyy" value="<?php echo $rowedit['dob']; ?>" required/>
                            <label for="floatingInput" class="form-label">DOB <span class="astr">*</span> </label>
                            <div class="valid-feedback">Looks good!</div>
                        </div>           
                        <!-- PhoneNo input -->
                        <div class="form-outline mb-2 col-md-12">
                            <div class="input-group form-outline">
                                <span class="input-group-text col-md-1">Tel</span>
                                <div class="form-floating col-md-5">
                                    <input type="tel" name="mobileno" aria-label="Mobile No" class="form-control" id="floatingInput1" placeholder="Mobile-No" pattern="[0-9]{10}" value="<?php echo $rowedit['mobileno']; ?>"required>
                                    <label for="floatingInput1">Mobile-No <span class="astr">*</span> </label>
                                    <div class="invalid-feedback">Please enter valid phone no. </div> 
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="form-floating col-md-6">                     
                                    <input type="tel" name="homeno" aria-label="Home No" class="form-control" id="floatingInput2" placeholder="Home-No" pattern="[0-9]{10}" value="<?php echo $rowedit['homeno']; ?>">
                                    <label for="floatingInput2">Home-No <small> (Optional)</small></label>
                                </div>
                            </div>                  
                        </div>
                        <!-- Civil Status input -->
                        <div class="form-floating mb-2 col-md-4">
                            <select class="form-select" name="civil_status" id="floatingSelect" aria-label="Floating label select" required>
                                <option disabled>Choose...</option>
                                <option value="Single"  <?php if($op_civil=="Single") echo 'selected="selected"';?> >Single</option>
                                <option value="Married"  <?php if($op_civil=="Married") echo 'selected="selected"';?> >Married</option>
                                <option value="Widow"  <?php if($op_civil=="Widow") echo 'selected="selected"';?> >Widow</option>
                            </select>
                            <label for="floatingSelect" class="form-label">Civil Status <span class="astr">*</span> </label>
                        </div>
                        <!-- Ethnicity input -->
                        <div class="form-floating mb-2 col-md-4">  
                            <input type="text" class="form-control" name="ethnicity" id="floatingInput" placeholder="Ethnicity"  value="<?php echo $rowedit['ethnicity']; ?>" pattern="^[A-Za-z \s*]+$" required /> 
                            <label for="floatingInput" class="form-label">Ethnicity <span class="astr">*</span> </label>                   
                            <div class="valid-feedback">Looks good!</div>                 
                        </div>
                        <!-- Religion input -->
                        <div class="form-floating mb-2 col-md-4">  
                        <select class="form-select" name="religion" id="floatingSelect" aria-label="Floating label select" required>
                                <option disabled>Choose...</option>
                                <option value="Hindu"  <?php if($op_religion=="Hindu") echo 'selected="selected"';?> >Hindu</option>
                                <option value="Christian"  <?php if($op_religion=="Christian") echo 'selected="selected"';?> >Christian</option>
                                <option value="Islam"  <?php if($op_religion=="Islam") echo 'selected="selected"';?> >Islam</option>
                                <option value="Sinhalese"  <?php if($op_religion=="Sinhalese") echo 'selected="selected"';?> >Sinhalese</option>
                            </select>
                            <label for="floatingSelect" class="form-label">Religion <span class="astr">*</span> </label>               
                        </div>               
                        <!-- Education Qualification input -->
                        <div class="form-floating mb-2 col-md-12">  
                            <input type="text" class="form-control" name="edu_level" id="floatingInput" placeholder="education"  value="<?php echo $rowedit['edu_level']; ?>" required /> 
                            <label for="floatingInput" class="form-label">Education Level <span class="astr">*</span> </label>                   
                            <div class="valid-feedback">Looks good!</div>                 
                        </div>               
                        <!-- Work Experience input -->
                        <div class="form-floating mb-2 col-md-12">
                            <textarea class="form-control" name="work_experience" placeholder="Work Experience" id="floatingTextarea2" style="height: 100px"><?php echo $rowedit['work_experience']; ?></textarea>
                            <label for="floatingTextarea2">Work Experience <small> (Optional)</small></label>                          
                        </div>

                        <!-- Emergency Contact input -->
                        <label for="floatingInput" class="form-label"><b>Bank Details</b></label> 
                        <div class="input-group form-outline">

                            <!-- Bank Name input -->
                            <div class="form-floating mb-2 col-md-4">  
                                <select class="form-select" name="bankname" id="floatingSelect" aria-label="Floating label select" required>
                                    <option  disabled>Choose...</option>
                                    <option value="Peoples Bank" <?php if($op_bank=="Peoples Bank") echo 'selected="selected"';?> >Peoples Bank</option>
                                    <option value="Bank of Ceylon" <?php if($op_bank=="Bank of Ceylon") echo 'selected="selected"';?> >Bank of Ceylon</option>
                                    <option value="Commercial Bank" <?php if($op_bank=="Commercial Bank") echo 'selected="selected"';?> >Commercial Bank</option>
                                    <option value="Sampath Bank" <?php if($op_bank=="Sampath Bank") echo 'selected="selected"';?> >Sampath Bank</option>
                                    <option value="National Savings Bank" <?php if($op_bank=="National Savings Bank") echo 'selected="selected"';?> >National Savings bank</option>
                                    <option value="Hatton National Bank" <?php if($op_bank=="Hatton National Bank") echo 'selected="selected"';?> >Hatton National bank</option>
                                </select>
                                <label for="floatingSelect" class="form-label">Bank Name <span class="astr">*</span> </label>        
                            </div>

                            <!-- Branch input -->
                            <div class="form-floating mb-2 col-md-4">  
                                <input type="text" class="form-control" name="branch" id="floatingInput" placeholder="Branch name" pattern="^[A-Za-z \s*]+$" value="<?php echo $rowedit['branch']; ?>" required /> 
                                <label for="floatingInput" class="form-label">Branch <span class="astr">*</span> </label>                   
                                <div class="valid-feedback">Looks good!</div>                 
                            </div>

                            <!-- Acc No input -->
                            <div class="form-floating mb-2 col-md-4">
                                <input type="number"  class="form-control" name="acc_no" id="floatingInputBasicSalary" placeholder="Account Number"  value="<?php echo $rowedit['acc_no']; ?>" required>
                                <label for="floatingInput">Account Number <span class="astr">*</span> </label>
                                <div class="valid-feedback">Looks good!</div>     
                            </div>
                        </div>

                        <!-- Emergency Contact Details -->
                        <label for="floatingInput" class="form-label"><b>Emergency Contact</b></label> 
                        <div class="input-group form-outline">
                                
                            <!-- Emergency Contact - Name input -->                
                            <div class="form-floating mb-2 col-md-6">  
                                <input type="text" class="form-control" name="ec_name" id="floatingInput" placeholder="Full name"  pattern="^[A-Za-z \s*]+$" value="<?php echo $rowedit['ec_name']; ?>" required /> 
                                <label for="floatingInput" class="form-label">Emergency Contact Name <span class="astr">*</span> </label>                   
                                <div class="invalid-feedback">Please enter alphabets only. </div>                
                                <div class="valid-feedback">Looks good!</div>                 
                            </div>

                            <!-- Emergency Contact - Relationship input -->
                            <div class="form-floating mb-2 col-md-6">  
                                <input type="text" class="form-control" name="ec_relationship" id="floatingInput" placeholder="Relationship" pattern="^[A-Za-z \s*]+$" value="<?php echo $rowedit['ec_relationship']; ?>" required /> 
                                <label for="floatingInput" class="form-label">Relationship with you <span class="astr">*</span> </label>                   
                                <div class="valid-feedback">Looks good!</div>                 
                            </div>

                            <!-- Emergency Contact - Contact No input -->
                            <div class="form-outline mb-2 col-md-12">
                                <div class="input-group form-outline">
                                    <span class="input-group-text col-md-1">Tel</span>
                                    <div class="form-floating col-md-3">
                                        <input type="tel" name="ec_mobileno" aria-label="Mobile No" class="form-control" id="floatingInput1" placeholder="Mobile-No" pattern="[0-9]{10}" value="<?php echo $rowedit['ec_mobileno']; ?>" required>
                                        <label for="floatingInput1">Mobile-No <span class="astr">*</span> </label>
                                        <div class="invalid-feedback">Please enter valid phone no. </div> 
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="form-floating col-md-4">                     
                                        <input type="tel" name="ec_homeno" aria-label="Home No" class="form-control" id="floatingInput2" placeholder="Home-No" pattern="[0-9]{10}" value="<?php echo $rowedit['ec_homeno']; ?>">
                                        <label for="floatingInput2">Home-No <small> (Optional)</small></label>
                                    </div>
                                    <div class="form-floating col-md-4">                     
                                        <input type="tel" name="ec_workno" aria-label="Work No" class="form-control" id="floatingInput2" placeholder="Work-No" pattern="[0-9]{10}" value="<?php echo $rowedit['ec_workno']; ?>">
                                        <label for="floatingInput2">Work-No <small> (Optional)</small></label>
                                    </div>
                                </div>                  
                            </div>
                        </div>

                        <!-- Checkbox -->
                            <div class="col-12">
                            <div class="form-check d-flex justify-content-center mb-2">
                                <input type="checkbox" class="form-check-input me-2" value="" id="invalidCheck" required />
                                <label class="form-check-label" for="invalidCheck" >Are you sure update this account? </label>
                                <div class="invalid-feedback">You must agree before submitting.</div>
                            </div>
                            </div>

                            <div class="col-12 d-flex justify-content-center mb-2">
                            <button type="submit" class="btn btn-primary" name="update-emp-btn">UPDATE</button>
                            </div>                                                 
                        </form>
   
                    <div>
                </div>
            </div>
        </div>
    </div>


<?php

if(isset($_POST['update-emp-btn']))
{
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $mobileno = mysqli_real_escape_string($conn, $_POST['mobileno']);
    $homeno = mysqli_real_escape_string($conn, $_POST['homeno']);
    $civil_status = mysqli_real_escape_string($conn, $_POST['civil_status']);
    $ethnicity = mysqli_real_escape_string($conn, $_POST['ethnicity']);
    $religion = mysqli_real_escape_string($conn, $_POST['religion']);
    $edu_level = mysqli_real_escape_string($conn, $_POST['edu_level']);
    $work_experience = mysqli_real_escape_string($conn, $_POST['work_experience']);
    $bankname = mysqli_real_escape_string($conn, $_POST['bankname']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $acc_no = mysqli_real_escape_string($conn, $_POST['acc_no']);
    $ec_name = mysqli_real_escape_string($conn, $_POST['ec_name']);
    $ec_relationship = mysqli_real_escape_string($conn, $_POST['ec_relationship']);
    $ec_mobileno = mysqli_real_escape_string($conn, $_POST['ec_mobileno']);
    $ec_homeno = mysqli_real_escape_string($conn, $_POST['ec_homeno']);
    $ec_workno = mysqli_real_escape_string($conn, $_POST['ec_workno']);

    $result2 = mysqli_query($conn, "UPDATE emp_registration SET title='$title',firstname='$firstname',lastname='$lastname',address='$address',gender='$gender',dob='$dob',mobileno='$mobileno',homeno='$homeno',civil_status='$civil_status',ethnicity='$ethnicity',religion='$religion',edu_level='$edu_level',work_experience='$work_experience',bankname='$bankname',branch='$branch',acc_no='$acc_no',ec_name='$ec_name',ec_relationship='$ec_relationship',ec_mobileno='$ec_mobileno',ec_homeno='$ec_homeno',ec_workno='$ec_workno' WHERE empid='$eid'");
    if($result2==true){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('My Details is Succesfully Updated.')
    window.location.href='myprofile.php';
    </SCRIPT>");
    }
}
?>

    <script>

        function ShowPW() {
			var x = document.getElementById("floatingPassword");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
				}
		}

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms).forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        })();

    function convertToDecimal() {
			var amount = document.getElementById("floatingInputBasicSalary");
      var final_amount = amount.toFixed(2);
      document.getElementById('floatingInputBasicSalary').value = final_amount;
    }

  </script>
 
</body>
</html>