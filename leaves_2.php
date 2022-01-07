<?php include 'controllers/authController.php'?>


<?php
// redirect user to login page if they're not logged in
  if (empty($_SESSION['id'])) {
      header('location: login.php');
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

   <<div class="content-wrapper p-t-99 p-b-100 font-robo" style="text-align:center;">
            <div class="wrapper wrapper--w1400" style="max-width: 1400px; padding-left: 200px;">
                <div class="card card-1"  style="background: transparent;">
                    <div class="card-heading"> </div>
                    <div class="card-body"> 
                        <h3><u>Leave Applicants</u></h3> <br>                       
                          <table class="table table-success table-striped" style="margin:20px 10px; opacity:0.95;">
                            <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Employee Name</th>
                                  <th scope="col">Leave Type</th>
                                  <th scope="col">Posting Date</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Caption</th>
                               </tr>
                             </thead>
<tbody>
<?php
$mysqli=new mysqli('localhost','root','' ,'emp-management-sys') or die(mysqli_error($mysqli));
$result=$mysqli->query("SELECT ID,Empname,LeaveType,PostingDate,Status from leaves ") or die($mysqli->error);
$cnt=1;

while($row=$result->fetch_assoc()):
?>

<tr>
<td> <b><?php echo htmlentities($cnt);?></b></td>											
<td><?php echo $row['Empname'];?></td>
<td><?php echo $row['LeaveType'];?></td>
<td><?php echo $row['PostingDate'];?></td>


<td><?php $stats=$row['Status'];;
if($stats==1){?>
     <span style="color: green">Approved</span>
     <?php } if($stats==2)  { ?>
     <span style="color: red">Not Approved</span>
     <?php } if($stats==0)  { ?>
     <span style="color: blue">waiting for approval</span>
     <?php } ?>
 </td>

<td><a href="admin.php?pg=leaves_3.php&leaveid=<?php echo $row['ID'];?>" class="btn btn-info" name="view">View</a></td>
                                    </tr>
									
                                         <?php $cnt++;?>
										 <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>   
    </body>
</html>
