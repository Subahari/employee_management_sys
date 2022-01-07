<?php
error_reporting(0);
include('con1.php');

 ?>

<?php 
include 'controllers/authController.php'?>

<?php

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
  header('location: index.php');
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>
JOB APPLICANT DETAILS
</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<script src="bootstrap/js/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<style>
* {
  box-sizing: border-box;
}

{
margin:0;
padding:0;
}

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

[class*="col-"] {
  float:left;
  padding:10px;

}

.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

ul {
  list-style-type: none;
  margin: 10px;
  padding: 0;
  overflow: hidden;
  float:right;
  background-color:rgba(0,0,0,0.6);
  font-family:"Roboto",sans-serif;
  font-size:14px;
  font-weight:bold;
  border:2px solid black;
  border-radius:4px;
}

li {
  float: left;
  font-family:"Roboto",sans-serif;
  font-size:14px;
}

li .at, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li .at:hover, .dropdown:hover .dropbtn {
	background-color:midnightblue;
	opacity:0.7;
    border:2px solid black;
}

li.dropdown {
  display: inline-block;
}



.dropdown-content {
  display: none;
  position: absolute;
  min-width: 100px;
  background-color:rgba(0,0,0,0.6);
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.6);
  z-index: 1;
}

.dropdown-content .at {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content .at:hover {
	background-color:blue;
	opacity:0.4;
	}

.dropdown:hover .dropdown-content {
	background-color:blue;
  display: block;
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
<ul>
   <li class="dropdown">
    <a href="#" class="at" class="dropbtn">RETURN BACK</a>
	</li>
</ul>


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



<div class="col-md-8" style="margin-left: 300px;">
<?php
$mysqli=new mysqli('localhost','root','' ,'emp-management-sys') or die(mysqli_error($mysqli));
$result=$mysqli->query("SELECT position,ID,fname,lname,nic,qualification,adqualification,workexp from jobapplication order by ID asc") or die($mysqli->error);
?>

<table class="table table-success table-striped" style="margin:50px 10px; opacity:0.95;">
<tr><td class="headi" colspan="4" align="center"><u>JOB APPLICANT DETAILS</u></td></tr>
<tr></tr>
<tr>
  <th>USER ID</th>
  <th>NAME</th>
  <th>POSITION</th>
  <th >ACTION</th>	
</tr>

<?php  
while($row=$result->fetch_assoc()):
?>
<tr>

<td ><?php echo $row['ID'];?></td>
<td><?php echo $row['fname']," ",$row['lname'];?></td>
<td><?php echo $row['position'];?></td>


<td align="center">
<a href="a_viewfull_jobapplicantdetails.php?view=<?php echo $row['ID'];?>"
class="btn btn-info">View</a>

<a href="a_view_jobapplicantdetails.php?delete=<?php echo $row['ID'];?>"
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




$sql="SELECT ID,fname,lname,nic from jobapplication";


$result=$conn->query($sql);


 if($result->num_rows>0){
	while($row=$result-> fetch_assoc()){
	
		
    }
	echo "</table>";
 }
 else{
    echo "<tr><td colspan=4 align=center>No Applicant available </td></tr>";
 }
 $conn-> close();   

if(isset($_GET['delete'])){
	$ID=$_GET['delete'];
    $fname=$_GET['delete'];
	$lname=$_GET['delete'];
	$position=$_GET['delete'];
	$mysqli->query("DELETE FROM jobapplication WHERE ID=$ID") or die($mysqli->error());
    
	
	
	
	        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Record hasbeen deleted successfully.')
            window.location.href='a_view_jobapplicantdetails.php';
            </SCRIPT>");
		
	}
	else{
		echo "<script type='text/javascript'>window.alert('Error while deleting records')window.location.href='a_view_jobapplicantdetails.php';;</script>";
		
	}
	
 
?>
</table>
</div>
</body>
</html>