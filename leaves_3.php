<?php include 'controllers/authController.php'?>

<?php
error_reporting(0);
include('config1.php');
 if (empty($_SESSION['id'])) {
      header('location: login.php');
  }
  
else{

// code for update the read notification status
$isread=1;
$did=intval($_GET['leaveid']);  
date_default_timezone_set('Asia/Colombo');
$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
$sql="update leaves set ISRead=:isread where ID=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();

// code for action taken on leave
if(isset($_POST['update']))
{ 
$did=intval($_GET['leaveid']);
$description=$_POST['description'];
$status=$_POST['status'];   
date_default_timezone_set('Asia/Colombo');
$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
$sql="update leaves set AdminRemark=:description,Status=:status,AdminRemarkDate=:admremarkdate where ID=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':admremarkdate',$admremarkdate,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="Leave updated Successfully";
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
        <title>Admin | Leave Details </title>  

    </head>
   <body style="background-image: url('images/c1.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  

    <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
      <div class="wrapper wrapper--w780 ">
        <div class="card card-1"  style="background: transparent;">
          <div class="card-heading"></div>
          <div class="card-body">
			  
			  <form class="row g-3 needs-validation" action="" method="post" name="Leave_details" enctype="multipart/form-data">
				<h2 class="title"><u>LEAVE DETAILS</u></h2>
			  
        <form class="row g-3 needs-validation" action="" method="post" name="add-loan-form" enctype="multipart/form-data">
		
<?php 
$lid=intval($_GET['leaveid']);
$sql = " SELECT * FROM leaves where ID='$lid'";
$query = $dbh -> prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>  
	   <div class="form-floating mb-2 col-md-6">  
    <input type="text" class="form-control" name="empname" id="floatingInput" placeholder="" value='<?php echo htmlentities($result->Empname);?>' disabled> 
    <label for="floatingInput" class="form-label">EmpName :</label>                   
    <div class="valid-feedback">Looks good!</div>                 
  </div>
  
  <div class="form-floating mb-2 col-md-6">  
    <input type="text" class="form-control" name="lid" id="floatingInput" placeholder="" value='<?php echo htmlentities($result->Leave_ID);?>' disabled> 
    <label for="floatingInput" class="form-label">leaves Id :</label>                   
    <div class="valid-feedback">Looks good!</div>
  </div>
    <div class="form-floating mb-2 col-md-6">  
    <input type="text" class="form-control" name="leavefrom" id="floatingInput" placeholder="" value='<?php echo htmlentities($result->FromDate);?>' disabled> 
    <label for="floatingInput" class="form-label">Leave from:</label>                   
    <div class="valid-feedback">Looks good!</div>                 
  </div>
  
  <div class="form-floating mb-2 col-md-6">  
    <input type="text" class="form-control" name="leaveto" id="floatingInput" placeholder="" value='<?php echo htmlentities($result->ToDate);?>' disabled> 
    <label for="floatingInput" class="form-label">Leave to:</label>                   
    <div class="valid-feedback">Looks good!</div>                 
  </div>
  <div class="form-floating mb-2 col-md-6">  
    <input type="text" class="form-control" name="leavetype" id="floatingInput" placeholder=""  value='<?php echo htmlentities($result->LeaveType);?>' disabled> 
    <label for="floatingInput" class="form-label">Leave Type:</label>                   
    <div class="valid-feedback">Looks good!</div>                 
  </div>
  
  <div class="form-floating mb-2 col-md-6">  
    <input type="text" class="form-control" name="discription" id="floatingInput" placeholder="" value='<?php echo htmlentities($result->Description);?>' disabled> 
    <label for="floatingInput" class="form-label">Leave Description:</label>                   
    <div class="valid-feedback">Looks good!</div>
  </div>
  
  <div class="form-floating mb-2 col-md-6">  
    <input type="text" class="form-control" name="postingdate" id="floatingInput" placeholder="" value='<?php echo htmlentities($result->PostingDate);?>' disabled> 
    <label for="floatingInput" class="form-label">Posting Date:</label>                   
    <div class="valid-feedback">Looks good!</div>
  </div>
  
   <div class="form-floating mb-2 col-md-6">
	<input type="text" class="form-control" name="st" id="floatingInput" value="<?php $status=$result->Status;
if ($status==1) {
  echo "Approved";
} elseif ($status==2) {
  echo "Not Approved";
} else {
  echo "waiting for approval";
}
?>"disabled>
    <label for="floatingInput" class="form-label">leave Status :</label>                   
    <div class="valid-feedback">Looks good!</div>
  </div>
  
   <div class="form-floating mb-2 col-md-6">  
    <input type="text" class="form-control" name="des" id="floatingInput" placeholder="" value='<?php
	if($result->AdminRemark==""){
	echo "waiting for Approval";  
	}
	else{
	echo htmlentities($result->AdminRemark);
	} ?>' disabled> 
    <label for="floatingInput" class="form-label">Admin Remark: </label>                   
    <div class="valid-feedback">Looks good!</div>
  </div>
  
  <div class="form-floating mb-2 col-md-6">  
    <input type="text" class="form-control" name="admremarkdate" id="floatingInput" placeholder="" value='<?php
	if($result->AdminRemarkDate==""){
	echo "NA";  
	}
	else{
	echo htmlentities($result->AdminRemarkDate);
	} ?>' disabled> 
    <label for="floatingInput" class="form-label">Admin Action taken date :</label>                   
    <div class="valid-feedback">Looks good!</div>
  </div>
  
  <?php 
if($status==0)
{

?>
	<div class="col-12  d-flex justify-content-center mb-2">
    <h5 style="color:green;"><u>Take Action</u></h5> 
    </div>
	
	<div class="form-floating mb-2 col-md-12">
	<select class="form-select" name="status" id="floatingSelect" aria-label="Floating label select";>
	<option value="">Choose your option</option>
    <option value="1">Approved</option>
    <option value="2">Not Approved</option>
    </select>
    <label for="floatingSelect" class="form-label">Leave take action</label>
    </div>	
     
	 <div class="form-floating mb-2 col-md-12">
	<textarea class="form-control" name="description" placeholder="Enter the payment discription" id="floatingTextarea2" style="height: 100px"></textarea>
	<label for="floatingTextarea2">Description</label>
	<div class="valid-feedback">Please provide the reason briefly.</div>
    </div>
	<div class="col-12  d-flex justify-content-center mb-2">
    <button type="submit" class="btn btn-primary" name="update">Submit</button>
    </div>

<?php } ?> 
                                
           <?php $cnt++;} }?>
</form>
 
        
       
				</div>
			</div>
        </div>
    </div>
    </body>
</html>
<?php } ?>