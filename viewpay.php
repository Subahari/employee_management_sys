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
$conn=new mysqli('localhost','root','','emp-management-sys') or die(mysqli_error($mysqli));

$id=0;


if(isset($_GET['view'])){
	$id=$_GET['view'];
	$sql="SELECT * FROM payment where pay_id='$id'";
    $sqldata=mysqli_query($conn,$sql)or die('error getting');
    $row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC);
	$name=$row['username'];
	$pid=$row['pay_id'];
	$pamount=$row['pay_amount'];
	$pmonth=$row['month'];
	$discription=$row['Discription'];
} 

?>

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
		
<title>View Payment</title>

</head>
<style>

</style>
<body style="background-image: url('images/c1.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  

    <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
      <div class="wrapper wrapper--w780 ">
        <div class="card card-1"  style="background: transparent;">
          <div class="card-heading"></div>
          <div class="card-body">


 <a href="admin.php?pg=pay.php" class="at"><button class="btn btn-outline-secondary" style="float: left;"><i class="fas fa-caret-square-left"></i> BACK</button></a><br>

<form class="row g-3 needs-validation" action="" method="post" name="add-loan-form" enctype="multipart/form-data">
                <h2 class="title"><u>Payment Profile</u></h2>


<form class="row g-3 needs-validation" action="" method="post" name="add-loan-form" enctype="multipart/form-data">
  <div class="form-floating mb-2 col-md-12">  
    <input type="text" class="form-control" name="pid" id="floatingInput" placeholder="" value='<?php echo $pid; ?>' disabled> 
    <label for="floatingInput" class="form-label">Payment ID:</label>                   
    <div class="valid-feedback">Looks good!</div>                 
  </div>
  
  <div class="form-floating mb-2 col-md-12">  
    <input type="text" class="form-control" name="name" id="floatingInput" placeholder="" value='<?php echo $name; ?>' disabled> 
    <label for="floatingInput" class="form-label">User Name:</label>                   
    <div class="valid-feedback">Looks good!</div>
  </div>
<div class="form-floating mb-2 col-md-12">
 <input type="text" class="form-control" name="pmonth" id="floatingSelect" aria-label="Floating label select" value='<?php echo $pmonth; ?>' disabled>
  <label for="floatingSelect" class="form-label">Month of Payment</label>
 </div>

  <div class="form-floating mb-2 col-md-12">  
    <input type="text" class="form-control" name="pamount" id="floatingInput" placeholder="" value='<?php echo $pamount; ?>' > 
    <label for="floatingInput" class="form-label">Amount:</label>                   
    <div class="valid-feedback">Looks good!</div>                 
  </div>
  
  <div class="form-floating mb-2 col-md-12">
	<textarea class="form-control" name="discription" placeholder="Enter the payment discription" id="floatingTextarea2" style="height: 100px"><?php echo $discription; ?></textarea>
	<label for="floatingTextarea2">Description</label>
	<div class="valid-feedback">Please provide the reason briefly.</div>
  </div>


	<div class="col-6  d-flex justify-content-center mb-2">
    <button type="submit" class="btn btn-primary" name="update">Update</button>
    </div>

    <div class="col-6  d-flex justify-content-center mb-2">
    <button type="reset" class="btn btn-info" name="reset-btn">RESET</button>
    </div>


</form>

	
<?php

$mysqli=new mysqli('localhost','root','','emp-management-sys') or die(mysqli_error($mysqli));


if(isset($_POST['update'])){
  
  
  $pamount=$_POST['pamount'];
  $discription=$_POST['discription'];
  
  
  
  $mysqli->query("UPDATE payment SET pay_amount='$pamount',Discription='$discription' where pay_id=$id")or die($mysqli->error);
  
       echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Records hasbeen updated successfully.')
            window.location.href='admin.php?pg=pay.php';
            </SCRIPT>");
}
?>

</div>
				</div>
        </div>
    </div>

    
    </body>
</html>
 