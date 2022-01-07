<?php include 'controllers/authController.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
  header('location: index.php');
}

$lid = $_GET['id'];
$sql = "SELECT * from loan_details WHERE loan_id='$lid'";
$result = mysqli_query($conn, $sql) or die("Error in Find :".mysqli_error($conn));
$rowedit=mysqli_fetch_assoc ($result);
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
  <title>Update Loan Details</title>  
</head>

<body style="background-image: url('images/c4.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: center; background-attachment: fixed;">  
  <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
    <div class="wrapper wrapper--w780 ">
      <div class="card card-1"  style="background: transparent;">
        <div class="card-heading"></div>
        <a href="admin.php?pg=viewloan.php"><button class="btn btn-outline-secondary" style="float: left;"><i class="fas fa-caret-square-left"></i> BACK</button></a>
        <div class="card-body">
              
              <form class="row g-3 needs-validation" action="" method="post" name="add-loan-form" enctype="multipart/form-data">
                <h2 class="title">Update Loan Details</h2>


                <!-- LoanID view -->
                <div class="form-floating mb-2 col-md-12">  
                    <input type="text" class="form-control" name="loan_id" id="floatingInput" placeholder="Loan ID" value="<?php echo $rowedit['loan_id']; ?>" disabled required/> 
                    <label for="floatingInput" class="form-label">Loan ID</label>                   
                    <div class="valid-feedback">Looks good!</div>                 
                </div>

                <!-- Loan Type view -->
                <div class="form-floating mb-2 col-md-12">  
                    <input type="text" class="form-control" name="loan_type" id="floatingInput" placeholder="Loan Type" pattern="^[A-Za-z \s*]+$" value="<?php echo $rowedit['loan_type']; ?>" required /> 
                    <label for="floatingInput" class="form-label">Loan Type</label>                   
                    <div class="valid-feedback">Looks good!</div>                 
                </div>

                <!-- Maximum amount view -->
                <div class="form-floating mb-2 col-md-12">  
                    <input type="number" min="50000.00" step="5000.00" class="form-control" name="max_loan_amount" id="floatingInputMaxAmount" placeholder="Maximum Loan Amount" value="<?php echo $rowedit['max_loan_amount']; ?>"required/> 
                    <label for="floatingInput" class="form-label">Maximum-Amount</label>                   
                    <div class="valid-feedback">Looks good!</div>                 
                </div>
               
                <!-- Purpose view -->
                <div class="form-floating mb-2 col-md-12">  
                <textarea class="form-control" name="loan_purpose" placeholder="Loan Purpose" id="floatingTextarea2" style="height: 80px" required> <?php echo $rowedit['loan_purpose']; ?> </textarea>
                    <label for="floatingInput" class="form-label">Loan Purpose</label>                   
                    <div class="valid-feedback">Looks good!</div>                 
                </div>

                <!-- Interest Rate view -->
                <div class="form-floating mb-2 col-md-12">  
                    <input type="number"  min="1.00" step="0.01" class="form-control" name="interest_rate" id="floatingInputOnterestRate" placeholder="Interest Rate" value="<?php echo $rowedit['interest_rate']; ?>"required /> 
                    <label for="floatingInput" class="form-label">Interest-Rate (%)</label>                   
                    <div class="valid-feedback">Looks good!</div>                 
                </div>

                <div class="col-12  d-flex justify-content-center mb-2">
                  <button type="submit" class="btn btn-primary" name="update-loan-btn">UPDATE</button>
                </div>

                </form>
              
            </div>
        </div>
    </div>
</div>

<?php


    //When update button press in addemp.php   
    if(isset($_POST['update-loan-btn']))
    {
        $loan_type = mysqli_real_escape_string($conn, $_POST['loan_type']);
        $max_loan_amount = mysqli_real_escape_string($conn, $_POST['max_loan_amount']);
        $loan_purpose = mysqli_real_escape_string($conn, $_POST['loan_purpose']);
        $interest_rate = mysqli_real_escape_string($conn, $_POST['interest_rate']);
        
        $result2 = mysqli_query($conn, "UPDATE `loan_details` SET loan_type='$loan_type',max_loan_amount='$max_loan_amount',loan_purpose='$loan_purpose',interest_rate='$interest_rate' WHERE loan_id='$lid'");
        if(result2==true){
            echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('This Loan Details Are Succesfully Updated.')
        window.location.href='admin.php?pg=viewloan.php';
        </SCRIPT>");
        }
    }
    ?>
</body>
</html>

