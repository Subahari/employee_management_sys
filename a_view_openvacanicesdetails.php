
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
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">  
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      
        <link rel="stylesheet" href="css/form.css">
<title>
OPEN VACANICES DETAILS
</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<script src="bootstrap/js/jquery.min.js"></script>




</head>
<STYLE>
body{
margin:0;
padding:0;
background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(images/home4.jpg);
background-size:cover;
background-position:center;
font-family:sans-serif;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;
}

</style>
<body>



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


<div class="col-md-9">
<?php
$mysqli=new mysqli('localhost','root','' ,'emp-management-sys') or die(mysqli_error($mysqli));
$result=$mysqli->query("SELECT Id,dateposted,designation,experience,qualification,jobtype,closingdate,contact from vacany_add ORDER BY closingdate ASC") or die($mysqli->error);
?>
<body style="background-image: url('images/c1.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  
    <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
      <div class="wrapper wrapper--w1600 ">
        <div class="card card-1"  style="background: transparent; margin-left: 300px;">
          <div class="card-heading"></div>
          <div class="card-body">

				
               <h2 class="title"><u>OPEN POSITION DETAILS</u></h2> 

<table class="table table-success table-striped" style="margin:50px 10px; opacity:0.95;" class="form">
<tr><td class="headi" colspan="8" align="center">OPEN POSITION DETAILS</td></tr>
<tr>
  <th> ID</th>
  <th>POSITION</th>
  <th>CLOSING DATE</th>
  <th colspan="2">Status</th>
  <th colspan="2">ACTION</th>

</tr>

<?php 
$date=date("Y-m-d"); 
while($row=$result->fetch_assoc()):
?>
<tr>

<td><?php echo $row['Id'];?></td>
<td><?php echo $row['designation'];?></td>
<td><?php echo $row['closingdate'];?></td>

<td><?php  $Cdate= $row['closingdate'];?></td>
<td><?php echo $row['closingdate'];?></td>
<?php
if($date>=$Cdate){
	echo "<td style=color:red>  Due to closing date</td>
                                    ";
}
else{
	echo "<td style=color:green >  Active status</td>
                                    ";
}
?>
<td>
<a href="a_view(full&update)_openvacanicesdetails.php?view=<?php echo $row['Id'];?>"
class="btn btn-info">View & Update</a>

<a href="a_view_openvacanicesdetails.php?delete=<?php echo $row['Id'];?>"
class="btn btn-danger">Delete</a>

</td>
</tr>
<?php endwhile; ?>


<?php

$dbServername ="localhost";
$dbUsername ="root";
$dbPassword ="";
$dbName ="emp-management-sys";

$conn = mysqli_connect($dbServername, $dbUsername,$dbPassword,$dbName);
if($conn->connect_error)
{
	die("Connection failed:".$conn->connect_error);
}


$id=0;
$sql="SELECT Id,dateposted,designation,experience,qualification,jobtype,closingdate,contact from vacany_add ORDER BY closingdate ASC";
$result=$conn->query($sql);

 if($result->num_rows>0){
	while($row=$result-> fetch_assoc()){
	
		
    }
	echo "</table>";
 }
 else{
    echo "<tr><td colspan=4 align=center>No vacancy available </td></tr>";
 }
 $conn-> close();   

if(isset($_GET['delete'])){
	$id=$_GET['delete'];

	$mysqli->query("DELETE FROM vacany_add WHERE Id=$id") or die($mysqli->error());	
		
	        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('You have been  successfully deleted $row[designation]s Details. .')
            window.location.href='a_view_openvacanicesdetails.php';
            </SCRIPT>");
		
	}
	else{
		echo "<script type='text/javascript'>window.alert('Error while deleting records')window.location.href='a_view_openvacanicesdetails.php';;</script>";
		
	}
	
 
?>
</table>
</div>
</body>
</html>
