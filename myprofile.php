
<?php include 'controllers/authController.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}

$uname = $_SESSION['username'];

$sql1 = "SELECT* from `emp_registration` where username='$uname' ";
$result1 = mysqli_query($conn, $sql1);
$employee = mysqli_fetch_assoc($result1);

$fullname=$employee['title']." ".$employee['firstname']." ".$employee['lastname'];
$pto=$employee['photo'];

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
  <title>My profile</title>  

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
                <a class="nav-link active" aria-current="true" href="#myDetails"><b>View</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="myprofileEdit.php#editMyDetails"><b>Edit</b></a>
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
                    <img src="images/bg-themes/1.png" class="d-block w-100" width=100% height=200px alt="..." style="position: relative;">
                  </div>
                </div>

                  <div class="col-lg-3">
                    <?php echo '<img src="images/emp-photos/'.$pto.'" class="bd-placeholder-img rounded-circle" width="200" height="200" role="img" alt="Team" style="margin-top: -100px; margin-bottom: 100px; position: absolute;">'; ?>
                    <br>                           
                  </div>
                  <div style="clear:both; float:left; padding-left: 420px;">
                    <h3 style="text-align: left;"><?php echo $fullname;?></h3>  
                    <p style="text-align: left;"><?php echo $employee['emproll'].', '.$employee['department'].' department';?> </p>
                    <table>
                      <tr>
                          <td style="padding-right: 20px;"><i class="fas fa-phone-alt"></i> <?php echo $employee['mobileno'] ;?></td>
                          <td style="padding-right: 20px;"><i class="fas fa-envelope"></i> <?php echo $employee['email'] ;?></td>
                          <td><i class="fas fa-map-marker-alt"></i> <?php echo $employee['address'] ;?></td>
                      </tr>
                    </table>
                  </div>
                  <br><br><br>
                  
                     <div class="content-wrapper p-t-100 p-b-100 font-robo" id="myDetails" style="text-align:center;">
                        <div class="wrapper wrapper--w1100" style="max-width: 1100px;">
                          <div class="card card-1 "  style="background: transparent;">
                            <div class="card-heading"></div>
                            <div class="card-body">
                              <h2 class="title">View My Details</h2>  <br><br>
                            <div class="row align-items-start">
                              <div class="col-6">

                                <table class="table table-hover">
                                  <tbody style= "text-align:left;">    
                                   <tr>
                                        <th colspan=2 style="text-align:center;"><u> Personal Information</u></th>                                     
                                    </tr>                              
                                    <tr>
                                        <th scope="row">EmpID</th>
                                        <td><?php echo $employee['empid'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">NIC</th>
                                        <td><?php echo $employee['nic'];;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Appointment Date</th>
                                        <td><?php echo $employee['appointment_date'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Basic Salary</th>
                                        <td><?php echo 'Rs. '.$employee['basic_salary'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Gender</th>
                                        <td><?php echo $employee['gender'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date Of birth</th>
                                        <td><?php echo $employee['dob'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Home No</th>
                                        <td><?php echo $employee['homeno'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Civil Status</th>
                                        <td><?php echo $employee['civil_status'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ethnicity</th>
                                        <td><?php echo $employee['ethnicity'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Religion</th>
                                        <td><?php echo $employee['religion'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Education level</th>
                                        <td><?php echo $employee['edu_level'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Work Experience</th>
                                        <td><?php echo $employee['work_experience'];?></td>                                       
                                    </tr>
                                   
                                </tbody>
                              </table>
                            </div> 

                            <div class="col-6">
                                <table class="table table-hover">
                                  <tbody style= "text-align:left;">                                  
                                     <tr>
                                        <th colspan=2 style="text-align:center;"><u> Bank Details</u></th>                                     
                                    </tr>
                                    <tr>
                                        <th scope="row">Bank name</th>
                                        <td><?php echo $employee['bankname'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Branch</th>
                                        <td><?php echo $employee['branch'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Account No</th>
                                        <td><?php echo $employee['acc_no'];?></td>
                                    </tr>
                                  </tbody>
                                </table>

                                <br><br>
                                <table class="table table-hover">
                                  <tbody style= "text-align:left;">  
                                    <tr>
                                        <th colspan=2 style="text-align:center;"><u> Emergency Contact Details</u></th>                                     
                                    </tr>
                                    <tr>
                                        <th scope="row"> Name</th>
                                        <td><?php echo $employee['ec_name'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Relationship</th>
                                        <td><?php echo $employee['ec_relationship'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mobile No</th>
                                        <td><?php echo $employee['ec_mobileno'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Home No</th>
                                        <td><?php echo $employee['ec_homeno'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Work No</th>
                                        <td><?php echo $employee['ec_workno'];?></td>
                                    </tr>
                                    
                                   
                                </tbody>
                              </table>
                            </div> 
                          </div>
                  </div>
          </div>

        </div>
    </div>

</body>
</html>