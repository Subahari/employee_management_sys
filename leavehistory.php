<?php include 'controllers/authController.php'?>

<?php
  error_reporting(0);
  include('config1.php');
  if (empty($_SESSION['id'])) {
      header('location: login.php');
  }  
  else if (($_SESSION['usertype']=='admin')) {
    header('location: admin.php');
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
		<!-- Title -->
        <title>Admin | Total Leave </title>

</head>
    <body style="background-image: url('images/c1.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  

     <?php
          if ($_SESSION['usertype']=='hr' || $_SESSION['usertype']=='emp' ) {
              include "hr_emp_header.php";
          }
      ?>  

      <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
        <div class="wrapper wrapper--w1200" style="max-width: 1200px;">       
            <div class="card card-1"  style="background: transparent;">
                <div class="card-heading"></div>
                <div class="card-body">

                <form class="row g-3 needs-validation" action="" method="post" name="Leave_details" enctype="multipart/form-data">
                <h2 class="title"><u>LEAVE  HISTORY</u></h2>
                <table class="table table-success table-striped" style="margin:20px 10px; opacity:0.95;">
                    <thead>
                        <tr>
                		<th>#</th>
                		<th width="">Leave ID</th>
                        <th width="180">Leave Type</th>
                		<th width="180">From Date</th>
                		<th width="180">To Date</th>
                		<th width="180">Posting Date</th>                 
                        <th width="150">Status</th>
                	    <th width="250">Admin Remark</th>
                        </tr>
                    </thead>
                <tbody>

                <?php 
                    $username=$_SESSION['username'];
                    $sql = "SELECT * from leaves where username=:username";
                    $query = $dbh -> prepare($sql);
                    $query->bindParam(':username',$username,PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $result)
                      {               
                  ?>  
                  		<tr>
                        <td> <?php echo htmlentities($cnt);?></td>
                        <td><?php echo htmlentities($result->Leave_ID);?></td>
            			      <td><?php echo htmlentities($result->LeaveType);?></td>
                        <td><?php echo htmlentities($result->FromDate);?></td>
                        <td><?php echo htmlentities($result->ToDate);?></td>
                        <td><?php echo htmlentities($result->PostingDate);?></td>
            			      <td><?php $stats=$result->Status;

                				if($stats==1){?>
                    				    <span style="color: green">Approved</span>
                    				<?php } 
                        if($stats==2)  { ?>
                    				    <span style="color: red">Not Approved</span>
                    				<?php } 
                        if($stats==0)  { ?>
                    				    <span style= "color: blue">waiting for approval</span>
                    				<?php } ?>
                        		
                          </td>
                        <td><?php if($result->AdminRemark==""){
                        				echo "waiting for Approval";  
              					 }
              				  else{
              					   echo htmlentities($result->AdminRemark);
              					} 
            				  ?>

            			     </td>
            			</tr>
									
                          <?php $cnt++;} }?>
								
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>    
  </body>
</html>
