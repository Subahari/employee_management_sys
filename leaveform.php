 <?php include 'controllers/authController.php'?>
 
 <?php
// redirect user to login page if they're not logged in
  if (empty($_SESSION['id'])) {
      header('location: login.php');
  }
  else if (($_SESSION['usertype']=='admin')) {
    header('location: index.php');
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


if(isset($_POST['apply']))  
{
  
  $username=$_SESSION['username'];
  $fullname=$_POST['fullname'];
  $empid=$_POST['empid'];
  $leavetype=$_POST['leavetype'];  
  $fromdate=$_POST['fromdate'];  
  $todate=$_POST['todate'];
  $description=$_POST['description']; 
  $AdminRemark=0;
  $status=0;
  $isread=0;

  if ($fromdate > $todate) {
    array_push($errors, "Incorrect date format");
    echo'<script>alert("From date greater then todate")</script>';
    }
  else {
      $from_date = strtotime($fromdate);
      $to_date = strtotime($todate);
      $datediff = $to_date - $from_date;

      $duration= round($datediff / (60 * 60 * 24));
       
      if (count($errors) == 0) {

        $query0="SELECT Leave_ID FROM leaves ORDER BY Leave_ID DESC";
        $result0=mysqli_query($conn,$query0) or die ("Error find Leave_ID: ".mysqli_error($conn));

        if(mysqli_num_rows($result0)>0){
            $row=mysqli_fetch_assoc($result0);
            $leave_id=$row['Leave_ID'];
            $leave_id=++$leave_id;
        }
        else{
            $leave_id="LEV0001";
        }

        $conn -> query("INSERT INTO leaves(Leave_ID,EmpID,Empname,LeaveType,FromDate,ToDate,Duration,Description,AdminRemark,Status,IsRead,username) 
          VALUES('$leave_id','$empid','$fullname','$leavetype','$fromdate','$todate','$duration','$description','$AdminRemark','$status','$isread','$username')") or 
                die($conn ->error);
                
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                   window.alert('$username, you have applied for leave successfully')
                    window.location.href='leaveform.php';
                    </SCRIPT>");
      }
      else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Error. Please try again')
            window.location.href='leaveform.php';
            </SCRIPT>");   
      } 
    }
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
        <title>Leave Form</title>  
</head>

<body style="background-image: url('images/c1.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  

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
                <h2 class="title"><u>APPLY FOR LEAVE</u></h2>

                  <div class="form-floating mb-2 col-md-6">  
                      <input type="text" class="form-control" name="empid" id="floatingInput" placeholder="EmpID" value='<?php echo $empid; ?>' readonly required /> 
                      <label for="floatingInput" class="form-label">EmpID</label>                   
                      <div class="valid-feedback">Looks good!</div>                 
                  </div>
                  <div class="form-floating mb-2 col-md-6">  
                      <input type="text" class="form-control" name="fullname" id="floatingInput" placeholder="FullName" value='<?php echo $fullname;?>' readonly required /> 
                      <label for="floatingInput" class="form-label">Full Name</label>                   
                      <div class="valid-feedback">Looks good!</div>                 
                  </div>
                  <div class="form-floating mb-2 col-md-6">
                      <input type="date" class="form-control" name="fromdate" id="floatingInput"placeholder="mm/dd/yyyy" required/>
                      <label for="floatingInput" class="form-label">From  Date</label>
                      <div class="valid-feedback">Looks good!</div>
                  </div>    

                  <div class="form-floating mb-2 col-md-6">
                      <input type="date" class="form-control" name="todate" id="floatingInput"placeholder="mm/dd/yyyy" required/>
                      <label for="floatingInput" class="form-label">To  Date</label>
                      <div class="valid-feedback">Looks good!</div>
                  </div> 

                  <div class="form-floating mb-2 col-md-12">                   
                      <select class="form-select" name="leavetype" id="floatingSelect" aria-label="Floating label select">
                        <option selected disabled>Choose...</option>
                      	<option>Medical leave</option>
                      	<option>Casual leave</option>
                        </select>
                      <label for="floatingSelect" class="form-label">Leave Type</label>
                  </div>
	                <div class="form-floating mb-2 col-md-12">
                      <textarea class="form-control" name="description" placeholder="Description" id="floatingTextarea2" style="height: 100px"></textarea>
                      <label for="floatingTextarea2">Description</label>
                      <div class="valid-feedback">Please provide the reason briefly.</div>
                  </div>
                  <div class="col-6  d-flex justify-content-center mb-2">
                      <button type="submit" class="btn btn-primary" name="apply">SUBMIT</button>
                  </div>

                <div class="col-6  d-flex justify-content-center mb-2">
                  <button type="reset" class="btn btn-info" name="reset-btn">RESET</button>
                </div>

 
              </form>
              
            </div>
        </div>
      </div>
    </div>
 </div>                           
        
</body>
</html>
