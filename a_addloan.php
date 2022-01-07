<?php include 'controllers/authController.php'?>
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
        <title>Add Loan Service</title>  
        
        <style>
            span.astr{
                color: red;
                font-size: 18px;
            }
        </style>
    </head>

<body style="background-image: url('images/bg-images/b11.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  
  <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
    <div class="wrapper wrapper--w780 ">
      <div class="card card-1"  style="background: transparent;">
        <div class="card-heading"></div>
        <div class="card-body">
              
              <form class="row g-3 needs-validation" action="" method="post" name="add-loan-form" enctype="multipart/form-data">
                <h2 class="title" style="color:white;">Add Loan Category</h2>

                <!-- Loan Type input -->
                <div class="form-floating mb-2 col-md-12">  
                    <input type="text" class="form-control" name="loan_type" id="floatingInput" placeholder="Loan Type" pattern="^[A-Za-z \s*]+$" required /> 
                    <label for="floatingInput" class="form-label">Loan Type <span class="astr">*</span></label>                   
                    <div class="valid-feedback">Looks good!</div>                 
                </div>

                <!-- Maximum amount input -->
                <div class="form-floating mb-2 col-md-12">  
                    <input type="number" min="50000.00" step="5000.00" class="form-control" name="max_loan_amount" id="floatingInputMaxAmount" placeholder="Maximum Loan Amount" required/> 
                    <label for="floatingInput" class="form-label">Maximum-Amount <span class="astr">*</span></label>                   
                    <div class="valid-feedback">Looks good!</div>                 
                </div>
                
                <!-- Purpose input -->
                <div class="form-floating mb-2 col-md-12">  
                <textarea class="form-control" name="loan_purpose" placeholder="Loan Purpose" id="floatingTextarea2" style="height: 80px"></textarea>
                    <label for="floatingInput" class="form-label">Purpose <span class="astr">*</span></label>                   
                    <div class="valid-feedback">Looks good!</div>                 
                </div>

                <!-- Interest Rate input -->
                <div class="form-floating mb-2 col-md-12">  
                    <input type="number"  min="1.00" step="0.01" class="form-control" name="interest_rate" id="floatingInputOnterestRate" placeholder="Interest Rate"required /> 
                    <label for="floatingInput" class="form-label">Interest-Rate (%) <span class="astr">*</span></label>                   
                    <div class="valid-feedback">Looks good!</div>                 
                </div>

                <div class="col-6  d-flex justify-content-center mb-2">
                  <button type="submit" class="btn btn-warning" name="addloan-submit-btn" style="width:150px;">SUBMIT</button>
                </div>

                <div class="col-6  d-flex justify-content-center mb-2">
                  <button type="reset" class="btn btn-info" name="reset-btn" style="width:150px;">RESET</button>
                </div>

                </form>
              
            </div>
        </div>
    </div>
</div>

<?php


//When submit button press in addemp.php
if (isset($_POST["addloan-submit-btn"])) {
    $loan_type = $_POST['loan_type'];
    $max_loan_amount = $_POST['max_loan_amount'];
    $loan_purpose= $_POST['loan_purpose'];
    $interest_rate = $_POST['interest_rate'];

    //create employee id
    $query0="SELECT loan_id FROM loan_details ORDER BY loan_id DESC";
    $result0=mysqli_query($conn,$query0) or die ("Eror find loan_id: ".mysqli_error($conn));
    if(mysqli_num_rows($result0)>0){
        $row=mysqli_fetch_assoc($result0);
        $loan_id=$row['loan_id'];
        $loan_id=++$loan_id;
    }
    else{
        $loan_id="L001";
    }

    //insert loan details in database
    $query1 = "INSERT INTO loan_details(loan_id,loan_type,loan_purpose,max_loan_amount,interest_rate) 
        VALUES('$loan_id','$loan_type','$loan_purpose','$max_loan_amount', '$interest_rate')";
    $result1=$conn->query($query1)  or die($conn ->error);
    
    if($result1==true){ 
        
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('This new loan has been added successfully.');
                    window.location.href='admin.php?pg=viewloan.php';
                    </SCRIPT>"); 
    }
    else {
        $_SESSION['error_msg'] = "Database error: Could not add loan";
    } 
}


?>
</body>
</html>

