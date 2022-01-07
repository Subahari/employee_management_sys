<?php
session_start();
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>
SHOW FEEDBACK
</title>
<link rel="stylesheet" href="bootstrap.min.css">

<script src="jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="bootstrap.min.js"></script>
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
background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(images/gym1.jpg);
background-size:cover;
background-position:center;
font-family:sans-serif;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;
}

.registerbox{
	width:330px;
	height:600px;
	background:rgba(0,0,0,0.7);
	color:#fff;
	top:60%;
	left:50%; 
	position:absolute;
	transform:translate(-50%,-50%);
	box-sizing:border-box;
	padding:70px 30px;
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
  background-color:rgba(0,0,0,0.7);
  font-family:"Roboto",sans-serif;
  font-size:14px;
  font-weight:bold;
  border:2px solid black;
  border-radius:4px;
}

li {
  float: left;
  font-family:"Roboto",sans-serif;
  font-size:18px;
}

li .at, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 10px 14px;
  text-decoration: none;
}

li .at:hover, .dropdown:hover .dropbtn {
	background-color:midnightblue;
	opacity:0.6;
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
	color:white;
	font-weight:bold;
font-size:20px;
color:pink;
} 

tr,td,th{
font-weight:bold;
}

</style>

<body>

<ul>
   <li class="dropdown">
    <a href="home.php" class="at" class="dropbtn">HOME</a>
	</li>
</ul>
<div class="col-md-9">
<?php
$Empname = "";
$errors= array();
$mysqli=new mysqli('localhost','root','','emp-management-sys') or die(mysqli_error($mysqli));

$result=$mysqli->query("SELECT Empname,Date,Rating,Comments from feedback") or die($mysqli->error);
?>

<table class="table table-dark table-hover" style="margin:50px 10px; opacity:0.95;">
<tr><td class="headi">GYM DETAILS</td></tr>
<tr>
<td><p><font color="yellow">GYM Name:</font> JK GYM CENTER  <br> <br><font color="yellow"> Address:</font> Pointpedro,Jaffna <br><br><font color="yellow"> Phone Number:</font> 0771234567 <br><br> <font color="yellow"> Email:</font> jkfitness@gmail.com <br><br><font color="yellow"> Facebook:</font> https://www.facebook.com/jkFitnessCenter/ <font color="red">||</font><font color="yellow"> Twitter:</font> https://twitter.com/jkFitnessCenter</p><br>
</tr>
<tr><td class="headi">FEEDBACKS FROM MEMBERS</td></tr>
<?php  
while($row=$result->fetch_assoc()):
?>
<tr>
<td><p><font color="yellow">Employee name:</font> <?php echo $row['Empname'];?>  <font color="yellow"> Date:</font> <?php echo $row['Date'];?> <font color="red">|</font><font color="yellow"> Ratings given:</font> <?php echo $row['Rating'];?> <font color="red">|</font><font color="yellow"> Comments:</font> <?php echo $row['Comments'];?></p><br>
</td>
</tr>
<?php endwhile; ?>


<?php

$dbServername ="localhost";
$dbEmpname ="root";
$dbPassword ="";
$dbName ="emp-management-sys";

$conn = mysqli_connect($dbServername, $dbEmpname,$dbPassword,$dbName);
if($conn->connect_error)
{
	die("Connection failed:".$conn->connect_error);
}
$id=0;
$sql="SELECT Empname,Date,Rating,Comments from feedback";
$result=$conn->query($sql);

 if($result->num_rows>0){
	while($row=$result-> fetch_assoc()){
	
		
    }
	echo "</table>";
 }
 else{
    echo "0 result";
 }
 $conn-> close();   
	
 
?>
</table>
</div>
</body>
</html>
