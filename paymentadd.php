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

<?php
// initializing variables
$username = "";
$errors= array();
$mysqli=new mysqli('localhost','root','','emp-management-sys') or die(mysqli_error($mysqli));

if (isset($_POST['submit'])) {
  
  $name = $_POST['user'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $price= $_POST['price'];
  $discription= $_POST['discription'];
  
  
  $add_check_query = "SELECT * FROM emp_registration WHERE username='$name' LIMIT 1";
  $result = mysqli_query($mysqli, $add_check_query);
  $row=mysqli_fetch_array($result);
    $empid=$row['empid'];
    
    
  if (count($errors) == 0) {
	
  	$mysqli -> query("INSERT INTO payment(empid,username,month,year,pay_amount,Discription)  
  			  VALUES('$empid','$name','$month','$year','$price','$discription')") or 
			  die($mysqli ->error);
			  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('You have succesfully added a payment for $name')
            window.location.href='paymentadd.php';
            </SCRIPT>");
	
  }
  else{
	echo("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Error')
            window.location.href='paymentadd.php';
            </SCRIPT>");  
  }
}


?>
<!DOCTYPE html>
<html>
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
<title> Add Payment</title>

<style>

</style>
</head>

<body style="background-image: url('images/bg-images/l8.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  
  <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
    <div class="wrapper wrapper--w780 ">
        <div class="card card-1"  style="background: transparent;">
            <div class="card-heading"></div>
            <div class="card-body">
<div>
<?php if(isset($_SESSION['username'])) : ?> 
</div>
<p>
You are 
<strong>
<?php echo $_SESSION['username']; ?>
</strong>
</p>
	<div>   
      <?php endif ?>
  
	<form class="row g-3 needs-validation" action="" method="post" name="add-loan-form" enctype="multipart/form-data">
                <h2 class="title"><u>ADD PAYMENT</u></h2>
				
<?php
$mysqli=new mysqli('localhost','root','' ,'emp-management-sys') or die(mysqli_error($mysqli));
$queryins="select username from emp_registration ";
?>	 
<div class="form-floating  mb-2 col-md-8;" >
<select class="form-select" name="user" id="floatingSelect" aria-label="Floating label select" value='<?php echo "name='user'";?>'>

<option><?php echo "Select user" ?></option>
<?php
if($result=mysqli_query($mysqli,$queryins)){
	if($success=mysqli_num_rows($result)>0){
	 while($row=mysqli_fetch_array($result))
		 echo"<option value='$row[username]'>$row[username]</option>";
	   echo "</select>";
	 }
	 else {
		 echo "no results found";
	 }
}
	 else{
	    echo "failed to connect to database";
	 }
?>
  <label for="floatingInput" class="form-label">User name</label> 
</select>
</div>

<div class="form-floating mb-2 col-md-6">
 <select class="form-select" name="month" id="floatingSelect" aria-label="Floating label select">
    <option value="Select month">Select month</option>
    <option value="January">January</option>
    <option value="February">February</option>
    <option value="March">March</option>
    <option value="April">April</option>
	<option value="May">May</option>
    <option value="June">June</option>
    <option value="July">July</option>
	<option value="August">August</option>
    <option value="September">September</option>
    <option value="October">October</option>
	<option value="November">November</option>
    <option value="December">December</option> 
  </select>
  <label for="floatingSelect" class="form-label">Month of Payment</label>
 </div>

 <div class="form-floating mb-2 col-md-6">  
 <input type="number" min=2010  class="form-control" name="year" id="floatingInput" placeholder="Enter the year"   required /> 
 <label for="floatingInput" class="form-label">Year:</label>                   
 <div class="valid-feedback">Looks good!</div>                 
</div>
 
<div class="form-floating mb-2 col-md-12">  
 <input type="number" class="form-control" name="price" id="floatingInput" placeholder="Enter the payment amount"   required /> 
 <label for="floatingInput" class="form-label">Payment Amount:</label>                   
 <div class="valid-feedback">Looks good!</div>                 
</div>

<div class="form-floating mb-2 col-md-12">
	<textarea class="form-control" name="discription" placeholder="Enter the payment discription" id="floatingTextarea2" style="height: 100px"></textarea>
	<label for="floatingTextarea2">Description</label>
	<div class="valid-feedback">Please provide the reason briefly.</div>
</div>
<div class="col-6  d-flex justify-content-center mb-2 col-md-12">
    <button type="submit" class="btn btn-primary" name="submit">Add Payment</button>
</div>

</form>
					</div>
				</div>
        </div>
    </div>

</div>

    
    </body>
</html>
