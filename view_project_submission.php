<?php require_once ('controllers/authController.php'); ?>

<?php 

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>
PROJECT DETAILS VIEWS
</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<script src="bootstrap/js/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<style>


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



 

}
th{
font-weight:bold;
}


</style>

<body>

<?php
        if ($_SESSION['usertype']=='hr' || $_SESSION['usertype']=='emp' ) {
            include "hr_emp_header.php";
        }
    ?>  


<div class="col-md-11" style="padding-left: 300px; margin-top: 200px;">
<?php
$mysqli=new mysqli('localhost','root','' ,'emp-management-sys') or die(mysqli_error($mysqli));
$result=$mysqli->query("SELECT ProjectID,ProjectName,Deadline,doc from project_submission") or die($mysqli->error);
$cnt=1;
?>

<body style="background-image: url('images/c1.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  
    <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;width:1000px">
      <div class="wrapper wrapper--w1000 ">
        <div class="card card-1"  style="background: transparent;">
          <div class="card-heading" ></div>
          <div class="card-body">

				
               <h2 class="title"><u>VIEW Project Submission DETAILS</u></h2> 

<table class="table table-success table-striped" style="margin:50px 10px; opacity:0.95;">
<tr><td class="headi" colspan="10" align="center"><u>VIEW PROJECT SUBMISSION DETAILS</u></td></tr>
<tr></tr>
<tr>
  <th >NUMBER</th>
 <th>ProjectID</th>
  <th>ProjectName</th>
  <th>Deadline</th>
  <th >doc</th>	
  
  <?php 
if ($_SESSION['usertype']=='admin'  ) {
  ?>  
<!--th colspan="4">ACTION</th-->
<?php
}?>
</tr>

<?php  
while($row=$result->fetch_assoc()):
?>
<tr>
<td align="center"> <b><?php echo htmlentities($cnt);?></b></td>
<td ><?php echo $row['ProjectID'];?></td>
<td><?php echo $row['ProjectName'];?></td>
<td><?php echo $row['Deadline'];?></td>
<td><?php echo $row['doc'];?></td>

<?php
/*
if ($_SESSION['usertype']=='admin'  ) {
  ?>
<td>
<a href="a_view(full&update)_openvacanicesdetails.php?view=<?php echo $row['ProjectID'];?>"
class="btn btn-info">Update</a>
</td>
<td>
<a href="viewreward.php?delete=<?php echo $row['ProjectID'];?>"
class="btn btn-danger">Delete</a>

</td>
  <?php
}
*/ ?>






</tr>
                                         <?php $cnt++; ?>
                                    </tbody>

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
$sql="SELECT ProjectID,ProjectName,Deadline,doc from project_submission ORDER BY ProjectID ASC";
$result=$conn->query($sql);

 if($result->num_rows>0){
	while($row=$result-> fetch_assoc()){
	
		
    }
	echo "</table>";
 }
 else{
    echo "<tr><td colspan=10 align=center>No PROJECT SUBMISSION available </td></tr>";
 }
   


	$conn-> close(); 
 
?>


</table>
</div>
</body>
</html>