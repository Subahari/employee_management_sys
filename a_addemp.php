<?php include 'controllers/authController.php'?>
<?php include 'a_empreg.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
  header('location: index.php');
}
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

  <style>
    span.astr{
      color: red;
      font-size: 18px;

    }
  </style>

  <title>Employee Registration</title>
 
</head>

<body style="background-image: url('images/bg-images/b13.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: center; background-attachment: fixed;">
  
  <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
    <div class="wrapper wrapper--w780 ">
    
      <div class="card card-1"  style="background: transparent;">
        <div class="card-heading"></div>
          <div class="card-body">
              <img src="images/icons/reg1.png"/>
              <h2 class="title"><u>Employee Registration</u></h2><br>
              
              <form class="row g-3 needs-validation" action="" method="post" name="emp-reg-form" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
                <!-- Employee Personal Details --><br>
                <label for="floatingInput" class="form-label">Employee Personal Details</label> 
                  
                  <!-- Title of name input -->
                  <div class="form-outline mb-2 col-md-12">
                    <div class="input-group form-outline">
                        <span class="input-group-text mb-2 col-md-2">Name</span>                        
                        <div class="form-floating mb-2 col-md-2">                   
                            <select class="form-select" name="title" id="floatingSelect" aria-label="Floating label select" required>
                              <option value="" selected disabled>Choose...</option>
                              <option value="Mr.">Mr.</option>
                              <option value="Mrs.">Mrs.</option>
                              <option value="Miss.">Miss.</option>
                              <option value="Dr.">Dr.</option>
                            </select>
                            <label for="floatingSelect" class="form-label">Title <span class="astr">*</span></label>
                            <div class="valid-feedback">Looks good!</div> 
                        </div>    
                        <!-- Firstname input -->
                        <div class="form-floating mb-2 col-md-4 ">  
                            <input type="text" class="form-control" name="firstname" id="floatingInput" placeholder="Firstname" pattern="^[A-Za-z \s*]+$"  required /> 
                            <label for="floatingInput" class="form-label">First name <span class="astr">*</span> </label> 
                            <div class="invalid-feedback">Please enter alphabets only. </div>                
                            <div class="valid-feedback">Looks good!</div>                 
                        </div>
                        <!-- Lastname input -->
                        <div class="form-floating mb-2 col-md-4 ">  
                            <input type="text" class="form-control" name="lastname" id="floatingInput" placeholder="Lastname" pattern="^[A-Za-z \s*]+$" required /> 
                            <label for="floatingInput" class="form-label">Last name <span class="astr">*</span></label> 
                            <div class="invalid-feedback">Please enter alphabets only. </div>                   
                            <div class="valid-feedback">Looks good!</div>                 
                        </div>
                    </div>
                  </div>
                    
                  <!-- Email input -->
                  <div class="form-floating mb-2 col-md-6">
                      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                      <label for="floatingInput">Email address <span class="astr">*</span></label>
                      <div class="invalid-feedback">Please enter your valid email.</div>
                      <div class="valid-feedback">Looks good!</div> 
                  </div>                 
                  <!-- NIC No  input -->
                  <div class="form-floating mb-2 col-md-6">
                      <input type="text" class="form-control" name="nic" id="floatingInput" placeholder="NIC" pattern="^[0-9]{9}[vVxX]$|(^[0-9]{11}[vVxX]$)"  title="Must be in the format of *********v / ***********v" required/>
                      <label for="floatingInput" class="form-label">NIC No <span class="astr">*</span></label>
                      <div class="invalid-feedback">Please enter your valid NIC no.</div>
                      <div class="valid-feedback">Looks good!</div> 
                  </div>
                  <!-- Username input -->
                  <div class="form-outline mb-2 col-md-6">
                      <div class="input-group form-outline">
                          <span class="input-group-text col-md-2" id="inputGroupPrepend">@</span>
                          <div class="form-floating col-md-10">
                              <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username" pattern="^[a-z*]+$" aria-describedby="inputGroupPrepend" required>
                              <label for="floatingInput">Username <span class="astr">*</span></label>
                              <div class="invalid-feedback">Please enter lowercase alphabets only. </div> 
                              <div class="valid-feedback">Looks good!</div>
                          </div>
                      </div>                      
                  </div>
                  <!-- Password input -->
                  <div class="form-floating mb-2 col-md-6">
                      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" value="<?php echo @$pw;?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one Number and one Uppercase and Lowercase letter, and at least 8 or more characters" disabled>
                      <label for="floatingPassword">Password <span class="astr">*</span></label>
                      <input type="checkbox" onclick="ShowPW()"> <small>Show Password</small>
                      <div class="invalid-feedback">Please choose a valid password.</div>  
                  </div>
                <!-- Employee Roll input -->
                  <div class="form-floating mb-2 col-md-6">
                      <select class="form-select" name="emproll" id="floatingSelect" aria-label="Floating label select" required>
                      <option value="" selected disabled>Choose...</option>
                        <option value="HR">HR</option>
                        <option value="Manager">Manager</option>
                        <option value="Director">Director</option>
                        <option value="Assist-Manager">Assist-Manager</option>
                        <option value="Trainee">Trainee</option>
                      </select>
                      <label for="floatingSelect" class="form-label">Employee Roll <span class="astr">*</span></label>  
                      <div class="valid-feedback">Looks good!</div>                  
                  </div>
                  <!-- Department input -->
                  <div class="form-floating mb-2 col-md-6">
                      <select class="form-select" name="department" id="floatingSelect" aria-label="Floating label select" required>
                        <option value="" selected disabled>Choose...</option>
                        <option value="HR">HR</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Finance">Finance</option>
                        <option value="Front-Office">Front-Office</option>
                        <option value="IT">IT</option>
                      </select>
                      <label for="floatingSelect" class="form-label">Department <span class="astr">*</span></label>
                      <div class="valid-feedback">Looks good!</div>                    
                  </div>
                  <!-- Appointment Date input -->
                  <div class="form-floating mb-2 col-md-6">
                      <input type="date" class="form-control" name="appointment_date" id="floatingInput"placeholder="mm/dd/yyyy" required/>
                      <label for="floatingInput" class="form-label">Appointment Date <span class="astr">*</span></label>
                      <div class="valid-feedback">Looks good!</div>
                  </div> 
                 <!-- Basic Salary input -->
                  <div class="form-floating mb-2 col-md-6">
                      <input type="number" min="15000.00" step="500" class="form-control" name="basic_salary" id="floatingInputBasicSalary" placeholder="Basic Salary" required>
                      <label for="floatingInput">Basic Salary (Rs.) <span class="astr">*</span></label> 
                      <div class="valid-feedback">Looks good!</div>    
                  </div>
                  <!-- Address input -->
                  <div class="form-floating mb-2 col-md-12">
                      <input type="text" class="form-control" name="address" id="floatingInput"placeholder="Address" required/>
                      <label for="floatingInput" class="form-label">Address <span class="astr">*</span></label>
                      <div class="valid-feedback">Looks good!</div>
                  </div>
                  <!-- Gender input -->
                  <div class="form-floating mb-2 col-md-6">                   
                      <select class="form-select" name="gender" id="floatingSelect" aria-label="Floating label select" required>
                        <option value="" selected disabled>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                      <label for="floatingSelect" class="form-label">Gender <span class="astr">*</span></label>
                      <div class="valid-feedback">Looks good!</div> 
                  </div>
                  <!-- DOB input -->
                  <div class="form-floating mb-2 col-md-6">
                      <input type="date" class="form-control" name="dob" id="floatingInput"placeholder="mm/dd/yyyy" required/>
                      <label for="floatingInput" class="form-label">DOB <span class="astr">*</span></label>
                      <div class="valid-feedback">Looks good!</div>
                  </div>           
                  <!-- PhoneNo input -->
                  <div class="form-outline mb-2 col-md-12">
                      <div class="input-group form-outline">
                          <span class="input-group-text col-md-1">Tel</span>
                          <div class="form-floating col-md-5">
                              <input type="tel" name="mobileno" aria-label="Mobile No" class="form-control" id="floatingInput1" placeholder="Mobile-No" pattern="[0-9]{10}" required>
                              <label for="floatingInput1">Mobile-No <span class="astr">*</span></label>
                              <div class="invalid-feedback">Please enter your valid phone no. </div> 
                              <div class="valid-feedback">Looks good!</div>
                          </div>
                          <div class="form-floating col-md-6">                     
                              <input type="tel" name="homeno" aria-label="Home No" class="form-control" id="floatingInput2" placeholder="Home-No" pattern="[0-9]{10}">
                              <label for="floatingInput2">Home-No <small> (Optional)</small></label>
                          </div>
                      </div>                  
                  </div>
                  <!-- Civil Status input -->
                  <div class="form-floating mb-2 col-md-4">
                      <select class="form-select" name="civil_status" id="floatingSelect" aria-label="Floating label select" required>
                        <option value="" selected disabled>Choose...</option>
                        <option value="Male">Single</option>
                        <option value="Female">Married</option>
                        <option value="Other">Widow</option>
                      </select>
                      <label for="floatingSelect" class="form-label">Civil Status <span class="astr">*</span></label>
                      <div class="valid-feedback">Looks good!</div> 
                  </div>
                  <!-- Ethnicity input -->
                  <div class="form-floating mb-2 col-md-4">  
                      <input type="text" class="form-control" name="ethnicity" id="floatingInput" placeholder="Ethnicity" pattern="^[A-Za-z \s*]+$" required /> 
                      <label for="floatingInput" class="form-label">Ethnicity <span class="astr">*</span></label>                   
                      <div class="valid-feedback">Looks good!</div>                 
                  </div>
                  <!-- Religion input -->
                  <div class="form-floating mb-2 col-md-4">  
                  <select class="form-select" name="religion" id="floatingSelect" aria-label="Floating label select" required>
                        <option value="" selected disabled>Choose...</option>
                        <option value="Male">Hindu</option>
                        <option value="Female">Christian</option>
                        <option value="Other">Islam</option>
                        <option value="Other">Sinhalese</option>
                      </select>
                      <label for="floatingSelect" class="form-label">Religion <span class="astr">*</span></label> 
                      <div class="valid-feedback">Looks good!</div>                 
                  </div>               
                  <!-- Education Qualification input -->
                  <div class="form-floating mb-2 col-md-12">  
                      <input type="text" class="form-control" name="edu_level" id="floatingInput" placeholder="education"required /> 
                      <label for="floatingInput" class="form-label">Education Level <span class="astr">*</span></label>                   
                      <div class="valid-feedback">Looks good!</div>                 
                  </div>               
                  <!-- Work Experience input -->
                  <div class="form-floating mb-2 col-md-12">
                      <textarea class="form-control" name="work_experience" placeholder="Work Experience" id="floatingTextarea2" style="height: 100px"></textarea>
                      <label for="floatingTextarea2">Work Experience <small> (Optional)</small></label>
                  </div>
                  <!-- Photo upload -->               
                  <div class="form-floating mb-2 col-md-12">
                      <div class="input-group form-floating">
                          <span class="input-group-text col-auto">Photo <span class="astr">*</span></span>
                          <input type="file" class="form-control" name="photo" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                          <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Upload</button>
                      </div>
                  </div>
                  <!-- CV upload --> 
                  <div class="form-floating mb-2 col-md-12">
                      <div class="input-group form-floating">
                          <span class="input-group-text col-auto">CV <span class="astr">*</span></span>
                          <input type="file" class="form-control" name="cv" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                          <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Upload</button>
                      </div>
                  </div>

                <!-- Emergency Contact input -->
                <label for="floatingInput" class="form-label">Bank Details</label> 
                <div class="input-group form-outline">

                  <!-- Bank Name input -->
                  <div class="form-floating mb-2 col-md-4">  
                    <select class="form-select" name="bankname" id="floatingSelect" aria-label="Floating label select" required>
                        <option value="" selected disabled>Choose...</option>
                        <option value="Peoples Bank">Peoples Bank</option>
                        <option value="Bank of Ceylon">Bank of Ceylon</option>
                        <option value="Commercial Bank">Commercial Bank</option>
                        <option value="Sampath Bank">Sampath Bank</option>
                        <option value="National Savings bank">National Savings bank</option>
                        <option value="Hatton National bank">Hatton National bank</option>
                      </select>
                      <label for="floatingSelect" class="form-label">Bank Name <span class="astr">*</span></label> 
                      <div class="valid-feedback">Looks good!</div>         
                  </div>

                  <!-- Branch input -->
                  <div class="form-floating mb-2 col-md-4">  
                      <input type="text" class="form-control" name="branch" id="floatingInput" placeholder="Branch name"required pattern="^[A-Za-z \s*]+$" /> 
                      <label for="floatingInput" class="form-label">Branch <span class="astr">*</span></label>                  
                      <div class="valid-feedback">Looks good!</div>                 
                  </div>

                  <!-- Acc No input -->
                  <div class="form-floating mb-2 col-md-4">
                      <input type="number"  class="form-control" name="acc_no" id="floatingInputBasicSalary" placeholder="Account Number" required>
                      <label for="floatingInput">Account Number <span class="astr">*</span></label>
                      <div class="valid-feedback">Looks good!</div>      
                  </div>
              </div>

              <!-- Emergency Contact Details -->
              <label for="floatingInput" class="form-label">Emergency Contact</label> 
              <div class="input-group form-outline">
                      
                <!-- Emergency Contact - Name input -->                
                <div class="form-floating mb-2 col-md-6">  
                    <input type="text" class="form-control" name="ec_name" id="floatingInput" placeholder="Full name" pattern="^[A-Za-z \s*]+$"required /> 
                    <label for="floatingInput" class="form-label">Emergency Contact Name <span class="astr">*</span></label>  <div class="invalid-feedback">Please enter alphabets only. </div>                 
                    <div class="valid-feedback">Looks good!</div>                 
                </div>

                <!-- Emergency Contact - Relationship input -->
                <div class="form-floating mb-2 col-md-6">  
                    <input type="text" class="form-control" name="ec_relationship" id="floatingInput" placeholder="Relationship" pattern="^[A-Za-z \s*]+$" required /> 
                    <label for="floatingInput" class="form-label">Relationship with you <span class="astr">*</span></label> 
                    <div class="invalid-feedback">Please enter alphabets only. </div>                
                    <div class="valid-feedback">Looks good!</div>                 
                </div>

                <!-- Emergency Contact - Contact No input -->
                <div class="form-outline mb-2 col-md-12">
                    <div class="input-group form-outline">
                        <span class="input-group-text col-md-1">Tel</span>
                        <div class="form-floating col-md-3">
                            <input type="tel" name="ec_mobileno" aria-label="Mobile No" class="form-control" id="floatingInput1" placeholder="Mobile-No" pattern="[0-9]{10}" required>
                            <label for="floatingInput1">Mobile-No <span class="astr">*</span></label>
                            <div class="invalid-feedback">Please enter valid phone no. </div> 
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="form-floating col-md-4">                     
                            <input type="tel" name="ec_homeno" aria-label="Home No" class="form-control" id="floatingInput2" placeholder="Home-No" pattern="[0-9]{10}">
                            <label for="floatingInput2">Home-No <small> (Optional)</small></label>
                        </div>
                        <div class="form-floating col-md-4">                     
                            <input type="tel" name="ec_workno" aria-label="Work No" class="form-control" id="floatingInput2" placeholder="Work-No" pattern="[0-9]{10}">
                            <label for="floatingInput2">Work-No <small> (Optional)</small></label>
                        </div>
                    </div>                  
                </div>
              </div>

              <!-- Checkbox -->
                <div class="col-12">
                  <div class="form-check d-flex justify-content-center mb-2">
                    <input type="checkbox" class="form-check-input me-2" value="" id="invalidCheck" required />
                    <label class="form-check-label" for="invalidCheck" > Create an account? </label>
                    <div class="invalid-feedback">You must agree before submitting.</div>
                  </div>
                </div>

                <div class="col-6  d-flex justify-content-center mb-2">
                  <button type="submit" class="btn btn-primary" name="empreg-submit-btn">SUBMIT</button>
                </div>

                <div class="col-6  d-flex justify-content-center mb-2">
                  <button type="reset" class="btn btn-info" name="reset-btn">RESET</button>
                </div>
                    
              </form>
              </div>
            </div>
        </div>
    </div>
</div>


    <script>

        function ShowPW() {
          var x = document.getElementById("floatingPassword");
          if (x.type === "password") {
            x.type = "text";
          }
          else {
            x.type = "password";
          }
        }

        // For disabling form submissions if there are invalid fields
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

  </script>

</body>
</html>