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
background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(images/bg-images/r3.jpg);
background-size:cover;
background-position:center;
font-family:sans-serif;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;
}



.headi{
	
	font-weight:bold;
font-size:20px;
color:red;

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
$result=$mysqli->query("SELECT RewardID,RewardTitle,EmployeeName,Year,RewardType,CurrentDate from add_reward") or die($mysqli->error);
$cnt=1;
?>

<table class="table table-dark table-hover" style="margin:50px 10px; opacity:0.95;">
<tr><td class="headi" colspan="7" align="center"><u>VIEW REWARDS DETAILS</u></td></tr>
<tr></tr>
<tr>
  <th >NUMBER</th>
  <th >REWARD ID</th>	
  <th>REWARD TITLE</th>
  <th>EMPLOYEE NAME</th>
  <th>YEAR</th>
  <th >REWARD TYPE</th>	
  <th >CURRENT DATE</th>	
</tr>

<?php  
while($row=$result->fetch_assoc()):
?>
<tr>
<td align="center"> <b><?php echo htmlentities($cnt);?></b></td>
<td ><?php echo $row['RewardID'];?></td>
<td><?php echo $row['RewardTitle'];?></td>
<td><?php echo $row['EmployeeName'];?></td>
<td><?php echo $row['Year'];?></td>
<td><?php echo $row['RewardType'];?></td>
<td><?php echo $row['CurrentDate'];?></td>








</tr>
                                         <?php $cnt++; ?>
                                    </tbody>

<?php endwhile; ?>



</table>
</div>
</body>
</html>