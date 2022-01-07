<?php include 'controllers/authController.php'?>

<?php 

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
  header('location: index.php');
} 

$Empname = "";
$errors= array();
/*
$mysqli=new mysqli('localhost','root','','emp-management-sys') or die(mysqli_error($mysqli));
*/
  $result=$conn->query("SELECT EmpID,Date,Rating,Comments from feedback") or die($mysqli->error);

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
		
			<title>SHOW FEEDBACK</title>
</head>

<body style="background-image: url('images/f3.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  
    <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
      <div class="wrapper wrapper--w780 ">
        <div class="card card-1"  style="background: transparent;">
          <div class="card-heading"></div>
          <div class="card-body">

				<form class="row g-3 needs-validation" action="" method="post" name="add-loan-form" enctype="multipart/form-data">
                <h2 class="title" ><u>FEEDBACK FROM EMPLOYEES</u></h2>

<table class="table table-success table-striped" style="margin:50px 10px; opacity:0.95;">

  <tr>
    <th scope="col">Employee name</th>
    <th scope="col">Date</th>
    <th scope="col">Ratings given</th> 
    <th scope="col">Comments</th>
  </tr>
  <?php  
    if($result->num_rows>0){
      while($row=$result->fetch_assoc()):
        $empid=$row['EmpID'];
        $result1=$conn->query("SELECT * from emp_registration where empid='$empid'" ) or die($mysqli->error);
        $employee=$result1->fetch_assoc();

  ?>
        <tr>
          <td><?php echo $employee['title']." ".$employee['firstname']." ".$employee['lastname'];?></td>
          <td> <?php echo $row['Date'];?> </td>
          <td><?php echo $row['Rating'];?> </td>
          <td><?php echo $row['Comments'];?></td>
        </tr>
      <?php endwhile; 
    }
    else{
      echo "0 result";
     }
    $conn-> close();   
 
  ?>
</table>
			</div>
        </div>
    </div>
</div>
                            
        
        
      
    </body>
</html>
