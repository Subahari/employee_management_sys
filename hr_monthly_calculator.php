<?php include 'controllers/authController.php'?>

<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (($_SESSION['usertype']=='emp')) {
  header('location: home_employee.php');
}
else if (($_SESSION['usertype']=='admin')) {
  header('location: admin.php');
}

$empid = $_GET['eid'];
$month=$_GET['month'];

$sql1 = "SELECT * from `emp_registration` WHERE empid='$empid'";
$result1 = mysqli_query($conn, $sql1) or die("Error in Find :".mysqli_error($conn));
$employee=mysqli_fetch_assoc ($result1);
$pto=$employee['photo'];
$fullname=  $employee['title']." ".$employee['firstname']." ". $employee['lastname'];
$basic_salary=$employee['basic_salary'];

$sql2="SELECT * from `loan_applicants` WHERE empid='$empid'";
$result2 = mysqli_query($conn, $sql2) or die("Error in Find :".mysqli_error($conn));
$loan=mysqli_fetch_assoc ($result2);
$laid=$loan['la_id'];

$sql3 = "SELECT * from `loan_borrowers` WHERE la_id='$laid' and status='Process'";
$result3 = mysqli_query($conn, $sql3) or die("Error in Find :".mysqli_error($conn));
$loan_borrowers=mysqli_fetch_assoc ($result3);
if(mysqli_num_rows($result3) > 0) {  
    if($loan_borrowers['available_repayment_amount']>0){
        $emi=$loan['emi'];
    }
    else{
        $emi=0.00;
    }
}
else{
    $emi=0.00;
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
        <title>Salary Calculator</title> 

        <style>
            span.astr{
              color: red;
              font-size: 18px;
            }
        </style>


    </head>

    <body style="background-image: url('images/c12.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: center; background-attachment: fixed;">

        <?php
          if ($_SESSION['usertype']=='hr') {
                include "hr_emp_header.php";
            }
        ?>
    
        <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
            <div class="wrapper wrapper--w1200" style="max-width: 1200px;">
        
                <div class="card card-1"  style="background: transparent;">
                    <div class="card-heading"></div>
                        <div class="card-body">
                            <a href="hr_salary_add.php?month=<?php echo $month;?>"><button class="btn btn-outline-secondary" style="float: left;"><i class="fas fa-caret-square-left"></i> BACK</button></a><br>
                            <h2 class="title"><u>Salary Calculation</u></h2><br><br>

                            <form class="row g-3 needs-validation" action="hr_salary_reg.php?empid=<?php echo $empid; ?>" method="post" name="calculator-form" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
                            
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <div class="card card-1 mx-auto d-block" width=33.33% height=33.33%>                
                                        <?php 
                                            echo "<img src='images/emp-photos/".$pto."' height = 100% width = 100% class='img-fluid img-thumbnail rounded '>"; 
                                            echo '<b>'.$fullname.'</b>';
                                        ?>                               
                                    </div><br><br> 
                                </div>
                            </div>


                            <!-- EmpID view -->
                            <div class="form-floating mb-2 col-md-4">  
                                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name" value="<?php echo $fullname; ?>" readonly required/> 
                                <label for="floatingInput" class="form-label">Full Name</label>              
                            </div>
                            <!-- Month view -->
                            <div class="form-floating mb-2 col-md-4">  
                                <input type="text" class="form-control" name="month" id="month" placeholder="Month" value="<?php echo $month; ?>" readonly required/> 
                                <label for="floatingInput" class="form-label">Month</label>                            
                            </div>
                            <!-- Basic Salary input -->
                            <div class="form-floating mb-2 col-md-4">
                                <input type="number" min=15000 class="form-control" name="basic_salary" id="basic_salary" placeholder="Basic Salary" value="<?php echo $basic_salary; ?>" onchange="calculator()" readonly required>
                                <label for="floatingInput">Basic Salary</label>                               
                            </div>
                            <!-- Living Cost Allowance input -->
                            <div class="form-floating mb-2 col-md-3">
                                <input type="number" min=0 class="form-control" name="living_cost" id="living_cost" placeholder="Living Cost Allowance" onchange="calculator()" required>
                                <label for="floatingInput">Living Cost Allowance <span class="astr">*</span></label>
                                <div class="valid-feedback">Looks good!</div>     
                            </div>
                            <!-- LFood Allowance input -->
                            <div class="form-floating mb-2 col-md-3">
                                <input type="number" min=0 class="form-control" name="food" id="food" placeholder="Food Allowance" onchange="calculator()" required>
                                <label for="floatingInput">Food Allowance <span class="astr">*</span></label>
                                <div class="valid-feedback">Looks good!</div>      
                            </div>
                            <!-- Holiday Pay input -->
                            <div class="form-floating mb-2 col-md-3">
                                <input type="number" min=0 class="form-control" name="holiday_pay" id="holiday_pay" placeholder="Holiday Pay" onchange="calculator()" required >
                                <label for="floatingInput">Holiday Pay <span class="astr">*</span></label>
                                <div class="valid-feedback">Looks good!</div>     
                            </div>
                            <!-- Total Earning calculate -->
                            <div class="form-floating mb-2 col-md-3">
                                <input type="number" min=0 class="form-control" name="total_earning" id="total_earning" placeholder="Total Earning" onchange="calculator()" readonly required>
                                <label for="floatingInput">Total Earning</label>
                            </div>
                            <!-- OverTime Allowance input -->
                            <div class="form-floating mb-2 col-md-3">
                                <input type="number" min=0  class="form-control" name="over_time" id="over_time" placeholder="Over Time Allowance" value="0" onchange="calculator()" required>
                                <label for="floatingInput">Over Time Allowance</label>
                                <div class="valid-feedback">Looks good!</div>     
                            </div>
                            <!-- Performance Allowance input -->
                            <div class="form-floating mb-2 col-md-3">
                                <input type="number" min=0 class="form-control" name="performance" id="performance" placeholder="Performance Allowance" value="0" onchange="calculator()" required>
                                <label for="floatingInput">Performance Allowance</label>
                                <div class="valid-feedback">Looks good!</div>      
                            </div>
                            <!-- Loan Repayment input -->
                            <div class="form-floating mb-2 col-md-3">
                                <input type="number" min=0 class="form-control" name="loan" id="loan" placeholder="Loan" value="<?php echo $emi; ?>" onchange="calculator()" readonly required>
                                <label for="floatingInput">Loan Repayment</label>
                            </div>
                            <!--EPF 8% calculate -->
                            <div class="form-floating mb-2 col-md-3">
                                <input type="number" min=0  class="form-control" name="epf8" id="epf8" placeholder="EPF 8%" readonly required>
                                <label for="floatingInput">EPF 8%</label>
                            </div>
                            <!--EPF 12% calculate -->
                            <div class="form-floating mb-2 col-md-3">
                                <input type="number" min=0 class="form-control" name="epf12" id="epf12" placeholder="EPF 12%" onchange="calculator()" readonly required>
                                <label for="floatingInput">EPF 12%</label>
                            </div>
                            <!--EPF 20% calculate -->
                            <div class="form-floating mb-2 col-md-3">
                                <input type="number" min=0 class="form-control" name="epf20" id="epf20" placeholder="EPF 20%" onchange="calculator()" readonly required>
                                <label for="floatingInput">EPF 20%</label> 
                            </div>
                            <!--ETF 3% calculate -->
                            <div class="form-floating mb-2 col-md-3">
                                <input type="number" min=0 class="form-control" name="etf" id="etf" placeholder="ETF" onchange="calculator()" readonly required>
                                <label for="floatingInput">ETF</label>
                            </div>
                            <!--Net Salary calculate -->
                            <div class="form-floating mb-2 col-md-3">
                                <input type="number" min=0  class="form-control" name="net_salary" id="net_salary" placeholder="Net Salary" onchange="calculator()" readonly required>
                                <label for="floatingInput">Net Salary</label>
                            </div>
                            <div class="row justify-content-center">   
                                <div class="col-3  d-flex justify-content-center mb-2">
                                    <button type="submit" class="btn btn-success" name="calculator-submit-btn">SUBMIT</button>
                                </div>

                                <div class="col-3  d-flex justify-content-center mb-2">
                                    <button type="reset" class="btn btn-info" name="reset-btn">RESET</button>
                                </div>         
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </body>

    <script>
        function calculator(){
            var basic_salary=parseFloat(document.getElementById('basic_salary').value);
            var living_cost=parseFloat(document.getElementById('living_cost').value);
            var food=parseFloat(document.getElementById('food').value);
            var holiday_pay=parseFloat(document.getElementById('holiday_pay').value);

            var total_earning=basic_salary+living_cost+food+holiday_pay;
            document.getElementById('total_earning').value =total_earning;

            var over_time=parseFloat(document.getElementById('over_time').value);
            var performance=parseFloat(document.getElementById('performance').value);
            var loan=parseFloat(document.getElementById('loan').value);  

            var epf8=total_earning*0.08;
            var epf12=total_earning*0.12;
            var epf20=epf8+epf12;
            var etf=total_earning*0.03;

            var net_salary=(total_earning-epf8)+over_time+performance-loan;
            document.getElementById('net_salary').value=net_salary;

            document.getElementById('epf8').value=epf8;
            document.getElementById('epf12').value=epf12;
            document.getElementById('epf20').value=epf20;
            document.getElementById('etf').value=etf;
            
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
</html>                      