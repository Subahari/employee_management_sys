<?php include 'loanapply_reg.php'?>
<?php include 'controllers/authController.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}

else if (($_SESSION['usertype']=='admin')) {
  header('location: admin.php');
}


//get employee id and loan id from URL
$empid=$_GET['eid'];
$loan_id = $_GET['lid']; 
  
//get interest rate of the loan by using loan_id from `loan_details` table
    $sql1 = "SELECT * from `loan_details` where loan_id='$loan_id'" ;
    $results1 = mysqli_query($conn, $sql1);
    $loan=mysqli_fetch_assoc($results1);
    $loan_type= $loan['loan_type'];
    $max_amount= $loan['max_loan_amount'];
    $interest_rate= $loan['interest_rate'];
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
  <title>Apply Loan Service</title>  

  <style>
    span.astr{
      color: red;
      font-size: 18px;
    }
  </style>

</head>

<body style="background-image: url('images/c4.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: center; background-attachment: fixed;"> 

    <?php
        if ($_SESSION['usertype']=='hr' || $_SESSION['usertype']=='emp' ) {
            include "hr_emp_header.php";
        }
    ?>  
    <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
        <div class="wrapper wrapper--w780 ">
            <div class="card card-1"  style="background: transparent;">
                <a href="viewloan.php"><button class="btn btn-outline-secondary" style="float: left;"><i class="fas fa-caret-square-left"></i> BACK</button></a>

                <div class="card-heading"></div>
                <div class="card-body">                                   
                    <h2 class="title"><u>Apply Loan</u></h2><br>
                    <form class="row g-3 needs-validation" action="" method="post" name="reg-form" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>

                    <!-- EmpID show -->
                    <div class="form-floating mb-2 col-md-4">  
                        <input type="text" class="form-control" name="empid" id="floatingInput" placeholder="EmpID" value="<?php echo $empid;?>" required  readonly/> 
                        <label for="floatingInput" class="form-label">EmpID</label>                   
                        <div class="valid-feedback">Looks good!</div>                 
                    </div>
                    <!-- LoanID show -->
                    <div class="form-floating mb-2 col-md-4">  
                        <input type="text" class="form-control" name="loan_type" id="loan_type" placeholder="LoanType" value="<?php echo $loan_type;?>" required readonly  /> 
                        <label for="floatingInput" class="form-label">Loan Type</label>                   
                        <div class="valid-feedback">Looks good!</div>                 
                    </div>
                    <!-- interest rate show -->
                    <div class="form-floating mb-2 col-md-4">  
                        <input type="text" class="form-control" name="interest_rate" id="interest_rate" placeholder="Interest Rate" value="<?php echo $interest_rate;?>" required readonly  /> 
                        <label for="floatingInput" class="form-label">Interest Rate</label>                   
                        <div class="valid-feedback">Looks good!</div>                 
                    </div>
                    <!-- Purpose input -->
                    <div class="form-floating mb-2 col-md-12">  
                        <input type="text" class="form-control" name="my_purpose" id="floatingInput" placeholder="Purpose"required /> 
                        <label for="floatingInput" class="form-label">Your purpose for the loan <span class="astr">*</span></label>                   
                        <div class="valid-feedback">Looks good!</div>                 
                    </div>
                    <!-- Loan amount input -->
                    <div class="form-floating mb-2 col-md-12">  
                    <input type="number" min="50000.00" max="<?php echo $max_amount; ?>" step="5000.00" class="form-control" name="loan_amount" id="loan_amount" placeholder="Loan Amount"  required> 
                        <label for="floatingInput" class="form-label">Loan Amount <span class="astr">*</span></label> <div class="invalid-feedback">Minimum amount is Rs.50000 & You cannot exceed the maximum amount (Rs.<?php echo $max_amount;?>) also.</div>                       
                        <div class="valid-feedback">Looks good!</div>                 
                    </div>
                    <!-- duration input -->
                    <div class="form-floating mb-2 col-md-12">  
                        <input type="number"  min="1" step="1" max="10" class="form-control" name="duration" id="duration" placeholder="Duration" required /> 
                        <label for="floatingInput" class="form-label">Duration (in years)<span class="astr">*</span></label>                   
                        <div class="valid-feedback">Looks good!</div>   
                    </div>                
                    <!-- Repayment option input -->
                    <div class="form-floating mb-2 col-md-12">                   
                          <select class="form-select" name="repayment" id="floatingSelect" aria-label="Floating label select" onchange="Calculate_EMI(this.value)" required>
                            <option value="" selected disabled>Choose...</option>
                            <option value="Fixed installments">Fixed installments</option>
                            <option value="Reducing installments">Reducing installments</option>
                          </select>
                          <label for="floatingSelect" class="form-label">Repayment Option <span class="astr">*</span></label>
                    </div>
                    <!-- EMI amount find -->
                    <div class="form-floating mb-2 col-md-12">  
                        <input type="number"  class="form-control" name="emi" id="emi" placeholder="EMI Amount" readonly required/> 
                        <label for="floatingInput" class="form-label">EMI Amount</label>                   
                        <div class="valid-feedback">Looks good!</div>   
                    </div>             
                    <!-- Required all documents upload --> 
                    <div class="form mb-2 col-md-12">
                        <label style="text-align:left;">You must submit all the required documents as a 1 rar file</label>
                        <div class="input-group form-floating">
                            <span class="input-group-text col-auto">Documents <span class="astr">*</span></span>
                            <input type="file" class="form-control" name="documents" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Upload</button>
                        </div>
                    </div>

                    <div class="col-12">
                      <div class="form-check d-flex mb-2">
                        <input type="checkbox" class="form-check-input me-2" value="" id="invalidCheck" required/>
                        <label class="form-check-label" for="invalidCheck" > <span class="astr">* </span> The information given above is true and accurate to the best of my / our knowledge  </label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>  

                    <div class="col-6  d-flex justify-content-center mb-2">
                      <button type="submit" class="btn btn-primary" name="apply-loan-btn" >APPLY</button>
                    </div>

                    <div class="col-6  d-flex justify-content-center mb-2">
                      <button type="reset" class="btn btn-primary" name="reset-btn" id="reset-btn" onclick="Clear()">RESET</button>
                    </div>
                    
                  </form>
                </div>  
             </div>
        </div>
    </div>
 
    <script>
			  function Calculate_EMI(x) {
          document.getElementById("loan_amount").readOnly=true;
          document.getElementById("duration").readOnly=true;
          
          var p = parseInt(document.getElementById("loan_amount").value);   // p -> Principal amount of borrowed (loan amount)        
          var ai = parseFloat((document.getElementById("interest_rate").value) / 100);     // ai -> Annual interest rate         
          var mi= ai/12;  // mi -> Periodic monthly interest rate          
          var y=parseInt(document.getElementById("duration").value);    // n -> Total number of monthly payments 
          var n= y *12;

          if (x === "Fixed installments") {             
            var tot_interest_amount= (ai*p*y);
            var mon_interest_amount=tot_interest_amount/n;
            var emi=((p+tot_interest_amount)/n).toFixed(2);
            document.getElementById("emi").value = emi;
          } 
          else if (x === "Reducing installments"){
            var emi=(p*((mi*(1+mi)**n) / (((1+mi)**n)-1))).toFixed(2);
            document.getElementById("emi").value = emi;            
          }
        }

      function Clear(){
        document.getElementById("loan_amount").readOnly=false;
        document.getElementById("duration").readOnly=false;
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