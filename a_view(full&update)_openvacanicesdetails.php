<?php
session_start();


$conn=new mysqli('localhost','root','','emp-management-sys') or die(mysqli_error($mysqli));

$id=0;
$vId ='';
$vdateposted='';
$vdesignation='';
$vexperience='';
$vqualification='';
$vjobtype='';
$vclosingdate='';
$vcontact='';

$sql="SELECT * FROM vacany_add";
    $sqldata=mysqli_query($conn,$sql)or die('error getting');
    $row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC);

if(isset($_GET['view'])){
	$id=$_GET['view'];
	$sql="SELECT * FROM vacany_add where Id='$id'";
    $sqldata=mysqli_query($conn,$sql)or die('error getting');
    $row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC);
	
	$vId=$row['Id'];
	$vdateposted=$row['dateposted'];
	$vdesignation=$row['designation'];
	$vclosingdate=$row['closingdate'];
	
	$vexperience=$row['experience'];
	$vqualification=$row['qualification'];
	$vjobtype= $row['jobtype'];
	$vcontact=$row['contact'];	
}

?>

<html>
<!--head-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--title-->
<title>
View OPEN VACANCIES
</title>
    <!--external css style-->
<link rel="stylesheet" href="bootstrap.min.css">
    <!--script-->
<script src="bootstrap/js/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
    <!--style-->
<style>
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
  font-size:17px;
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

.form {
  position: relative;
  margin: 50px auto;
  width: 500px;
  height:850px;
  padding: 33px 25px 29px;
  background: white;
  border-bottom: 1px solid #c4c4c4;
  border-radius: 5px;
  -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
}
.form:before, .form:after {
  content: '';
  position: absolute;
  bottom: 1px;
  left: 0;
  right: 0;
  height: 10px;
  background: inherit;
  border-bottom: 1px solid #d2d2d2;
  border-radius: 4px;
}
.form:after {
  bottom: 3px;
  border-color: #dcdcdc;
}

.form-title {
  margin: -25px -25px 25px;
  padding: 15px 25px;
  line-height: 35px;
  font-size: 26px;
  font-weight: 300;
  color: #aaa;
  text-align: center;
  text-shadow: 0 1px rgba(255, 255, 255, 0.75);
  background: #f7f7f7;
}



.form-input {
  width: 100%;
  height: 50px;
  margin-bottom: 25px;
  padding: 0 15px 2px;
  font-size: 17px;
  background: white;
  border: 2px solid #ebebeb;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 -2px #ebebeb;
  box-shadow: inset 0 -2px #ebebeb;
}
.form-input:focus {
  border-color: #62c2e4;
  outline: none;
  -webkit-box-shadow: inset 0 -2px #62c2e4;
  box-shadow: inset 0 -2px #62c2e4;
}
.lt-ie9 .form-input {
  line-height: 20px;
}

#submit {
  position: relative;
  vertical-align: top;
  width: 200px;
  height: 35px;
  padding: 0;
  font-size: 22px;
  color: white;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
  background: #f0776c;
  border: 0;
  border-bottom: 2px solid #d76b60;
  border-radius: 5px;
  cursor: pointer;
  -webkit-box-shadow: inset 0 -2px #d76b60;
  box-shadow: inset 0 -2px #d76b60;
  align="center";
}
#submit:active {
  top: 1px;
  outline: none;
  -webkit-box-shadow: none;
  box-shadow: none;
  background-color:green;
  color:black;
}



table {
  border-collapse: collapse;
  border-spacing: 0;
}

.form-title:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 8px;
  background: #c4e17f;
  border-radius: 5px 5px 0 0;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);

}
</style>

        <!--body-->
<body>
<ul>
   <li class="dropdown">
    <a href="admin.php?pg=a_view_openvacanicesdetails.php" class="at" class="dropbtn">FINISH VIEWING</a>
	</li>
</ul>


<div class="registerbox">



<form action=" " method="post" class="form">
<h1 class="form-title">OPEN VACANCIES INFO</h1>
<table>

<tr>
<td>
<p> ID:</p>
</td>
<td>
<input type="text" name="id" value= "<?php echo $vId ;?>" disabled class="form-input">
</td>
</tr>

<tr>
<td>
<p>Date Posted:</p>
</td>
<td>
<input type="text" name="dateposted" value= "<?php echo $vdateposted;?>" disabled class="form-input">
</td>
</tr>

<tr>
<td>
<p>Designation:</p>
</td>
<td>
<input type="text" name="designation" value= "<?php echo $vdesignation;?>"  disabled class="form-input">
</td>
</tr>

<tr>
<td>
<p>Expected Experience:</p>
</td>
<td>
<input type="text" name="experience" value= "<?php echo $vexperience;?>"  disabled class="form-input">
</td>
</tr>

<tr>
<td>
<p>Expected Qualification:</p>
</td>
<td>
<input type="text" name="qualification" value= "<?php echo $vqualification;?>" disabled class="form-input" >
</td>
</tr>

<tr>
<td>
<p>Job Type:</p>
</td>
<td>
<input type="text" name="jobtype" value= "<?php echo $vjobtype ;?>" disabled class="form-input" >
</td>
</tr>


<tr>
<td>
<p>Closing Date:</p>
</td>
<td>
<input type="date" name="closingdate" value= "<?php echo $vclosingdate;?>"  class="form-input" >
</td>
</tr>

<tr>
<td>
<p>Contact No(For More details):</p>
</td>
<td>
<input type="text" name="contact" value= "<?php echo $vcontact;?>"  disabled class="form-input">
</td>
</tr>




</table>
<br>


<button type="submit" class="btn btn-success" name="submit" id="submit" style="margin-left:75px;">Update</button>
</form>
</div>
	
<?php

$mysqli=new mysqli('localhost','root','','emp-management-sys') or die(mysqli_error($mysqli));


if(isset($_POST['submit'])){
	
	$vId=$_POST['id'];
	$vclosingdate=$_POST['closingdate'];

	
	
	
	
	$mysqli->query("UPDATE vacany_add SET closingdate='$vclosingdate' where Id=$id")or die($mysqli->error);
	
		   echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Records of $vdesignation has been updated successfully.')
            window.location.href='a_view_openvacanicesdetails.php';
            </SCRIPT>");
		
	

}

?>

</body>
</html>