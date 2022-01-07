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
<html>
<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3 /css/all.min.css">  
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      
        <link rel="stylesheet" href="css/form.css">
		<title>PAYMENT DETAILS</title>
</head>


<body style="background-image: url('images/c1.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  

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
<?php endif ?>

		
<?php
$mysqli=new mysqli('localhost','root','' ,'emp-management-sys') or die(mysqli_error($mysqli));
$queryins="select empid from emp_registration ";
?>	 

	<form class="row g-3 needs-validation" action="" method="post" name="add-loan-form" enctype="multipart/form-data">
     <h2 class="title"><u>PAYMENT DETAILS</u></h2>			
                  <div class="form-floating mb-2 col-md-6">  
	<select class="form-select" name="empid" id="floatingSelect" aria-label="Floating label select" value='<?php echo "empid='empid'";?>'>

<option "><?php echo "Select Emp_ID" ?></option>
<?php
if($result=mysqli_query($mysqli,$queryins)){
	if($success=mysqli_num_rows($result)>0){
	 while($row=mysqli_fetch_array($result))
		 echo"<option value='$row[empid]'>$row[empid]</option>";
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
 <label for="floatingInput" class="form-label">EmpID</label>   
</div>
                  <div class="form-floating mb-2 col-md-6">  
				<button type="submit" class="btn btn-primary" name="search">View</button>
			</div>
			
		</form>
<?php
	// initializing variables
$username = "";
$errors= array();
$mysqli=new mysqli('localhost','root','','emp-management-sys') or die(mysqli_error($mysqli));

if (isset($_POST['search'])) 
{
	$empid=$_POST["empid"];
	$result=$mysqli->query("SELECT * from payment where empid='$empid'") or die($mysqli->error);
		$row=$result->fetch_assoc();
}
?>
		
<p><font style="color:#0d6efd;">User Name:</font> <font style="color:#212529;"><?php echo $row['username'];?></font> || <font style="color:#0d6efd;">EmpID:</font> <font style="color:#212529;"><?php echo $row['empid'];?></font></p>

<table class="table table-success table-striped" style="margin:20px 10px; opacity:0.95;"><br>
<tr>
  <th>PayID</th>
  <th>Month</th>
  <th>Amount</th>
  <th>Discription</th>
  <th></th> 
</tr><br>
<?php
	// initializing variables
$username = "";
$errors= array();
$mysqli=new mysqli('localhost','root','','emp-management-sys') or die(mysqli_error($mysqli));

if (isset($_POST['search'])) 
{
	$empid=$_POST["empid"];
	$result=$mysqli->query("SELECT * from payment where empid='$empid'") or die($mysqli->error);
	
	while($row=$result->fetch_assoc())
	{
?>	
	<tr>
	<td><?php echo $row['pay_id'];?></td>
	<td><?php echo $row['month'];?></td>
	<td><?php echo $row['pay_amount'];?></td>
	<td><?php echo $row['Discription'];?></td>
	<td>
	<a  href="admin.php?pg=viewpay.php&view=<?php echo $row['pay_id'];?>" class="btn btn-info" >Edit</a>
	</td>
	</tr>

	<?php }	}	?>

		</table>
				</div>
			</div>
        </div>
    </div>

    
    </body>
</html>
