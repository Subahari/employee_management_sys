
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
  <script type="text/javascript">
  		function ShowPW1() {
				var x = document.getElementById("new_pass");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
					}
			}
			function ShowPW2() {
				var x = document.getElementById("new_pass_c");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
					}
			}
  </script>
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
                <a class="nav-link" aria-current="true" href="#myDetails"><b>View</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="myprofileEdit.php#editMyDetails"><b>Edit</b></a>
              </li>  
              <li class="nav-item">
                <a class="nav-link active" aria-current="true" href="myProfileChange_pw.php#changePw"><b>Change Password</b></a>
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
                  
                <div class="content-wrapper p-t-100 p-b-100 font-robo" id="changePw" style="text-align:center;">
                <div class="wrapper wrapper--w1100" style="max-width: 1100px;">
                  <div class="card card-1"  style="background: transparent; padding-left: 80px; padding-right: 80px;">
                    <div class="card-heading"></div>
                    <div class="card-body">

	                    <form class="row g-3 needs-validation"  action="" method="post" name="update-emp-form" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
	                        <h2 class="title">Change Password</h2>  <br><br>
	                        
	                       <?php include('messages.php'); ?>
	                        <!-- New Password enter -->
	                        <div class="form-floating mb-2 col-md-12">  
	                            <input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="newPW"> 
	                            <label for="floatingInput" class="form-label">New Password</label>
	                            <input type="checkbox" style="margin-right:5px;" onclick="ShowPW1()"><small>Show Password</small>                                 
	                        </div>
	                         <!-- New Password Re-enter -->
	                        <div class="form-floating mb-2 col-md-12">  
	                            <input type="password" class="form-control" name="new_pass_c" id="new_pass_c" placeholder="confirmNewPW"> 
	                            <label for="floatingInput" class="form-label">Confirm new password</label> 
	                            <input type="checkbox" style="margin-right:5px;" onclick="ShowPW2()"><small>Show Password</small>                              
	                        </div>
	                        <!-- Checkbox -->
	                            <div class="col-12">
	                            <div class="form-check d-flex justify-content-center mb-2">
	                                <input type="checkbox" class="form-check-input me-2" value="" id="invalidCheck" required />
	                                <label class="form-check-label" for="invalidCheck" >Are you sure to change this password? </label>
	                                <div class="invalid-feedback">You must agree before submitting.</div>
	                            </div>
	                            </div>
	                        <div class="form-group">
								<button type="submit" name="new_password"class="w-50 btn btn-lg btn-primary">Submit</button>
							</div>	
						</form>

                	</div>
            	   </div>
        		  </div>
    			</div>
			</div>
		  </div>
	    </div>
	</div>


    <script>
    	
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


  </script>

</body>
</html>
 