<?php include 'controllers/authController.php'?>

<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
  header('location: index.php');
}

$eid = $_GET['eid'];
$sql = "SELECT * from emp_registration WHERE empid='$eid'";
$result = mysqli_query($conn, $sql) or die("Error in Find :".mysqli_error($conn));
$rowedit=mysqli_fetch_assoc ($result);

$op_title=$rowedit['title'];
$op_emproll=$rowedit['emproll'];
$op_depart=$rowedit['department'];
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

<body style="background-image: url('images/c1.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">
    <div class="row flex-nowrap">             
        <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
            <div class="wrapper" style="width:780px;">
                <div class="card card-1"  style="background: transparent;">
                    <div class="card-heading"></div>
                    <a href="admin.php?pg=a_viewemp.php"><button class="btn btn-outline-secondary" style="float: left;"><i class="fas fa-caret-square-left"></i> BACK</button></a>
                    <div class="card-body">
                     
                    <form class="row g-3 needs-validation"  action="" method="post" name="update-emp-form" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>

                        <h2 class="title">Update Employee Details</h2>
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <div class="card card-1 mx-auto d-block" width=33.33% height=33.33%>                
                                    <?php 
                                        echo "<img src='images/emp-photos/".$pto."' height = 100% width = 100% class='img-fluid img-thumbnail rounded '>"; 
                                    ?>                               
                                </div>
                            </div>
                        </div>
                        <!-- Employee Work Details -->
                        <label for="floatingInput" class="form-label">Employee Work  Details</label> 
                        
                        <!-- EmpID view -->
                        <div class="form-floating mb-2 col-md-6">  
                            <input type="text" class="form-control" name="empid" id="floatingInput" placeholder="EmpID" value="<?php echo $rowedit['empid']; ?>" readonly/> 
                            <label for="floatingInput" class="form-label">Employee ID</label>                                 
                        </div>
                        <!-- Name itle input -->
                        <div class="form-floating mb-2 col-md-6">  
                            <input type="text" class="form-control" name="ethnicity" id="floatingInput" placeholder="Ethnicity"  value="<?php echo $op_title." ".$rowedit['firstname']." ",$rowedit['lastname']; ?>" readonly />
                            <label for="floatingInput" class="form-label">Full Name <span class="astr">*</span> </label>   
                        </div>  
                        <!-- Appointment Date input -->
                        <div class="form-floating mb-2 col-md-12">
                            <input type="date" class="form-control" name="appointment_date" id="floatingInput"placeholder="mm/dd/yyyy" value="<?php echo $rowedit['appointment_date']; ?>" readonly/>
                            <label for="floatingInput" class="form-label">Appointment Date <span class="astr">*</span> </label>
                        </div>            
                        <!-- Employee Roll input -->
                        <div class="form-floating mb-2 col-md-12">
                            <select class="form-select" name="emproll" id="floatingSelect" aria-label="Floating label select" required>
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
                        <div class="form-floating mb-2 col-md-12">
                            <select class="form-select" name="department" id="floatingSelect" aria-label="Floating label select" required>
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
                        <div class="form-floating mb-2 col-md-12">
                            <input type="number" min="15000.00" step="500.00" class="form-control" name="basic_salary" id="floatingInputBasicSalary" placeholder="Basic Salary"  value="<?php echo $rowedit['basic_salary']; ?>" required>
                            <label for="floatingInput">Basic Salary <span class="astr">*</span> </label>
                            <div class="invalid-feedback">Please enter your basic salary.</div>
                            <div class="valid-feedback">Looks good!</div>      
                        </div>

                        <!-- Checkbox -->
                        <div class="col-12">
                            <div class="form-check d-flex justify-content-center mb-2">
                                <input type="checkbox" class="form-check-input me-2" value="" id="invalidCheck" required />
                                <label class="form-check-label" for="invalidCheck" >Are you sure update this account? </label>
                                <div class="invalid-feedback">You must agree before submitting.</div>
                            </div>
                        </div>

                        <div class="col-12  d-flex justify-content-center mb-2">
                            <button type="submit" class="btn btn-primary" name="update-emp-btn">UPDATE</button>
                        </div>
                        
                    </form>
                    <div>
                </div>
            </div>
        </div>
    </div>

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

<?php

if(isset($_POST['update-emp-btn']))
{
    
	$emproll = mysqli_real_escape_string($conn, $_POST['emproll']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
	$basic_salary = mysqli_real_escape_string($conn, $_POST['basic_salary']);

    $result2 = mysqli_query($conn, "UPDATE `emp_registration` SET emproll='$emproll',department='$department',basic_salary='$basic_salary' WHERE empid='$eid'");
	if(result2==true){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('This Employee Details Are Succesfully Updated.')
    window.location.href='admin.php?pg=a_viewempdetails.php&id=$rowedit[empid]';
    </SCRIPT>");
    }
}
?>