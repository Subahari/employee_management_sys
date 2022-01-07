 <?php include 'controllers/authController.php'?>


<?php
// redirect user to login page if they're not logged in
  if (empty($_SESSION['id'])) {
      header('location: login.php');
  }
  else if (($_SESSION['usertype']=='admin')) {
    header('location: admin.php');
  }
?>


 <?php
 $errors= array();


$username=$_SESSION['username'];

$sql = "SELECT * FROM emp_registration WHERE username='$username'";   
$result = mysqli_query($conn, $sql);
while ($employee = mysqli_fetch_assoc($result)) {
  $empid = $employee['empid'];
  $firstname = $employee['firstname'];
  $lastname = $employee['lastname'];
  $title = $employee['title'];
}

$fullname=$title." ".$firstname." ".$lastname;

if (isset($_POST['apply'])) {
  // receive all input values from the form

  $fullname=$_POST['fullname'];
  //$date = $_POST['date'];
  $rating = $_POST['rating'];
  $comment = $_POST['comment'];
  
   date_default_timezone_set('Asia/Colombo');
    $date=date('Y-m-d H:m:s ', strtotime("now"));
  
  if (count($errors) == 0) {
	 
    $query0="SELECT feed_ID FROM feedback ORDER BY feed_ID DESC";
        $result0=mysqli_query($conn,$query0) or die ("Eror find feed_ID: ".mysqli_error($conn));

        if(mysqli_num_rows($result0)>0){
            $row=mysqli_fetch_assoc($result0);
            $fid=$row['feed_ID'];
            $fid=++$fid;
        }
        else{
            $fid="F001";
        }
  	$conn -> query("INSERT INTO feedback(feed_ID,EmpID,Date,Rating,Comments) 
  			  VALUES('$fid','$empid','$date','$rating','$comment')") or 
			  die($conn ->error);
			  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('$fullname you have succesfully added your comment')
            window.location.href='feedbackadd.php';
            </SCRIPT>");
	
  }
  else{
	echo("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Error')
            window.location.href='feedbackadd.php';
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
		<title> Add Feedback</title>

</head>

<body style="background-image: url('images/f3.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  

   <?php
        if ($_SESSION['usertype']=='hr' || $_SESSION['usertype']=='emp' ) {
            include "hr_emp_header.php";
        }
    ?>  

    <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
      <div class="wrapper wrapper--w780 ">
        <div class="card card-1"  style="background: transparent;">
          <div class="card-heading"></div>
          <div class="card-body">

				<form class="row g-3 needs-validation" action="" method="post" name="add-loan-form" enctype="multipart/form-data">
                <h2 class="title"><u>Add Feedback</u></h2>
		
				<div class="row g-2">
				<div class="form-floating col-md">  
                      <input type="text" class="form-control" name="empid" id="floatingInput" placeholder="EmpID" value='<?php echo $empid; ?>' readonly required /> 
                      <label for="floatingInput" class="form-label">EmpID</label>                   
                      <div class="valid-feedback">Looks good!</div>                 
                  </div>
				  
				<div class="form-floating  col-md">  
                      <input type="text" class="form-control" name="fullname" id="floatingInput" placeholder="FullName" value='<?php echo $fullname;?>' readonly required /> 
                      <label for="floatingInput" class="form-label">Employee Name</label>                   
                      <div class="valid-feedback">Looks good!</div>                 
                  </div>
				  </div><br>				

				 <div class="form-floating  col-md-12">                   
                      <select class="form-select" name="rating" id="floatingSelect" aria-label="Floating label select">
                        <option selected disabled>Give your ratings:</option>
                      	<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
                      </select>
                      <label for="floatingSelect" class="form-label">Rating</label>
                 </div>
				 <br>
				 
				 <div class="form-floating mb-2 col-md-12">
                      <textarea class="form-control" name="comment" placeholder="Description" id="floatingTextarea2" style="height: 100px"></textarea>
                      <label for="floatingTextarea2">Comments</label>
                      <div class="valid-feedback">Please provide the reason briefly.</div>
                  </div>
		
					<div class="row g-2">
					<div class="col-md  d-flex justify-content-center mb-2">
                      <button type="submit" class="btn btn-primary" name="apply">ADD</button>
                  </div>

                <div class="col-md  d-flex justify-content-center mb-2">
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
</html>