<?php include 'controllers/authController.php'?>

<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
  header('location: index.php');
}

$id = $_GET['id'];
$sql = "SELECT * from `emp_registration` WHERE empid='$id'";
$result = mysqli_query($conn, $sql);

while ($employee = mysqli_fetch_assoc($result)) {
    $empid=$employee['empid'];
    $title=$employee['title'];
    $fname=$employee['firstname'];
    $lname=$employee['lastname'];
    $email=$employee['email'];
    $nic=$employee['nic'];
    $emproll=$employee['emproll'];
    $department=$employee['department'];
    $appointment_date=$employee['appointment_date'];
    $basic_salary=$employee['basic_salary'];
    $address=$employee['address'];
    $gender=$employee['gender'];
    $dob=$employee['dob'];
    $mobileno=$employee['mobileno'];
    $homeno=$employee['homeno'];
    $civil_status=$employee['civil_status'];
    $ethnicity=$employee['ethnicity'];
    $religion=$employee['religion'];
    $edu_level=$employee['edu_level'];
    $work_experience=$employee['work_experience'];
    $pto=$employee['photo'];
    $bankname=$employee['bankname'];
    $branch=$employee['branch'];
    $acc_no=$employee['acc_no'];
    $ec_name=$employee['ec_name'];
    $ec_relationship=$employee['ec_relationship'];
    $ec_mobileno=$employee['ec_mobileno'];
    $ec_homeno=$employee['ec_homeno'];
    $ec_workno=$employee['ec_workno'];
   // echo "<td><img src='images/emp-photos/".$employee['photo']."' height = 70px width = 70px></td>";
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


  <title>View Employee Details</title>
 
  
</head>

<body style="background-image: url('images/c1.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">
<div class="row flex-nowrap">             
    <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
        <div class="wrapper" style="width:780px;">
            <div class="card card-1"  style="background: transparent;">
                <div class="card-heading"></div>
                <div class="card-body">
                    <a href="admin.php?pg=a_viewemp.php"><button class="btn btn-outline-secondary" style="float: left;"><i class="fas fa-caret-square-left"></i> BACK</button></a><br>
                    <h3>Employee Details - <?php echo $fname." ".$lname;?></h3><br>
                    <div class="row align-items-start">
                        <div class="col-8">
                            <table class="table table-hover">
                                <tbody style= "text-align:left;">                                  
                                    <tr>
                                        <th colspan=2 style="text-align:center;"><u> Employee Details</u></th>                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">EmpID</th>
                                        <td><?php echo $empid;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Full Name</th>
                                        <td><?php echo $title." ".$fname." ".$lname;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td><?php echo $email;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">NIC</th>
                                        <td><?php echo $nic;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Employee Roll</th>
                                        <td><?php echo $emproll;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Department</th>
                                        <td><?php echo $department;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Appointment Date</th>
                                        <td><?php echo $appointment_date;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Basic Salary</th>
                                        <td><?php echo 'Rs. '.$basic_salary;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td><?php echo $address;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Gender</th>
                                        <td><?php echo $gender;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date Of birth</th>
                                        <td><?php echo $dob;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mobile No</th>
                                        <td><?php echo $mobileno;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Home No</th>
                                        <td><?php echo $homeno;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Civil Status</th>
                                        <td><?php echo $civil_status;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ethnicity</th>
                                        <td><?php echo $ethnicity;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Religion</th>
                                        <td><?php echo $religion;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Education level</th>
                                        <td><?php echo $edu_level;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Work Experience</th>
                                        <td><?php echo $work_experience;?></td>                                       
                                    </tr>
                                    <tr>
                                        <th colspan=2 style="text-align:center;"><u> Bank Details</u></th>                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Bank name</th>
                                        <td><?php echo $bankname;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Branch</th>
                                        <td><?php echo $branch;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Account No</th>
                                        <td><?php echo $acc_no;?></td>
                                    </tr>
                                    <tr>
                                        <th colspan=2 style="text-align:center;"><u> Emergency Contact Details</u></th>                                      
                                    </tr>
                                    <tr>
                                        <th scope="row"> Name</th>
                                        <td><?php echo $ec_name;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Relationship</th>
                                        <td><?php echo $ec_relationship;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mobile No</th>
                                        <td><?php echo $ec_mobileno;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Home No</th>
                                        <td><?php echo $ec_homeno;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Work No</th>
                                        <td><?php echo $ec_workno;?></td>
                                    </tr>
                                    

                                </tbody>
                            </table> 
                            <div class="update-emp-details">	<br>					
                                <?php echo '<p><small>Do you have any changes? <a href="admin.php?pg=a_updateempdetails.php&eid='.$empid.'">Click Here To Update</a></small></p>';?>                                
						    </div>                   
                        </div>
                        <div class="col-4" style="clear:both; float:right;">
                            <div class="card card-1   mx-auto d-block" width=33.33% height=33.33%>                
                                    <?php 
                                    echo "<img src='images/emp-photos/".$pto."' height = 100% width = 100% class='img-fluid img-thumbnail rounded '>"; 
                                    ?>                               
                            </div>
                        </div>
                    </div>
                <div>
            </div>
        </div>
    </div>
    
</body>
</html>