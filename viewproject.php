<?php include 'controllers/authController.php'?>

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


.headi{
	
font-weight:bold;
font-size:22px;
color:lightgreen;
font-family:new century schoolbook;

} 


body{
margin:0;
padding:0;
background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(images/abouuspageback.jpg);
background-size:cover;
background-position:center;
font-family:sans-serif;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;
color:white;
}



</style>

<body style="background-image: url('images/unnamed.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;color:white">  
  <?php
        if ($_SESSION['usertype']=='hr' || $_SESSION['usertype']=='emp' ) {
            include "hr_emp_header.php";
        }
    ?>  

<div class="col-md-11" style="padding-left: 280px; margin-top:150px; ">
<?php
$mysqli=new mysqli('localhost','root','' ,'emp-management-sys') or die(mysqli_error($mysqli));
$result=$mysqli->query("SELECT ProjectID,ProjectName,ProjectType,TeamMembers,DescriptionComments,DeadLine,AssignDate from assign_project") or die($mysqli->error);
$cnt=1;
?>

<table class="table table-striped" style="margin:50px 10px; opacity:0.95;">
<tr><td class="headi" colspan="11" align="center"><u>VIEW PROJECTS DETAILS</u></td></tr>
<tr></tr>
<tr>
  <th style="color:white" >NUMBER</th>
  <th style="color:white">PROJECT ID</th>	
  <th style="color:white">PROJECT NAME</th>
  <th style="color:white">PROJECT TYPE</th>
  <th style="color:white">TEAM MEMBERS</th>
  <th style="color:white">DESCRIPTION COMMENTS</th>
  <th style="color:white">DEADLINE</th>	
  <th  style="color:white">ASSIGN DATE</th>	

  <?php
    if ($_SESSION['usertype']=='hr'||$_SESSION['usertype']=='emp') {
      ?>
        <th >     </th>	
      <?php } ?>
</tr>

<?php  
while($row=$result->fetch_assoc()):
?>
<tr>
<td align="center" style="color:white"> <b><?php echo htmlentities($cnt);?></b></td>
<td  style="color:white"><?php echo $row['ProjectID'];?></td>
<td style="color:white"><?php echo $row['ProjectName'];?></td>
<td style="color:white"><?php echo $row['ProjectType'];?></td>
<td style="color:white"><?php echo $row['TeamMembers'];?></td>
<td style="color:white"><?php echo $row['DescriptionComments'];?></td>
<td style="color:white"><?php echo $row['DeadLine'];?></td>
<td style="color:white"><?php echo $row['AssignDate'];?></td>


<?php
//a_projectsubmission.php?pid=<?php echo $row['ProjectID']; 
if ($_SESSION['usertype']=='hr' || $_SESSION['usertype']=='emp' ) {
  ?>
    <td><a href="a_submission.php?pid=<?php echo $row['ProjectID'];?>">

    <input type='button' class='btn btn-success' name='Submission' value='Submission'></a></td>
  <?php
} ?>

<?php
//a_projectsubmission.php?pid=<?php echo $row['ProjectID']; 
if ($_SESSION['usertype']=='admin'  ) {
  ?>
    <td>
	<a href="admin.php?pg=a_viewproject_update.php&view=<?php echo $row['ProjectID'];?>"
class="btn btn-info">View & Update</a></td>
<td>
<a href="viewproject.php?delete=<?php echo $row['ProjectID'];?>"
class="btn btn-danger">Delete</a>


</td>
  <?php
} ?>

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


$projectid=0;
$sql="SELECT ProjectID,ProjectName,ProjectType,TeamMembers,DescriptionComments,DeadLine,AssignDate from assign_project ORDER BY ProjectID ASC";
$result=$conn->query($sql);

 if($result->num_rows>0){
	while($row=$result-> fetch_assoc()){
	
		
    }
	echo "</table>";
 }
 else{
    echo "<tr><td colspan=11 align=center style=color:white>No Project Available </td></tr>";
 }


 

if(isset($_GET['delete'])){
	$ProjectId=$_GET['delete'];

$result2 = mysqli_query($conn,"DELETE FROM assign_project WHERE ProjectID='$ProjectId'") or die($conn->error());	
		if($result2==true){
	        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('You have been  successfully deleted the project.)
            window.location.href='admin.php?pg=viewproject.php';
            </SCRIPT>");
		
	}
	else{
		echo "<script type='text/javascript'>window.alert('Error while deleting records')window.location.href='admin.php?pg=viewproject.php';;</script>";
		
	}
	}
 
?>

</table>
</div>
</body>
</html>