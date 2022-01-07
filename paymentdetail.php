<?php include 'controllers/authController.php'?>


<?php
// redirect user to login page if they're not logged in
  if (empty($_SESSION['id'])) {
      header('location: login.php');
  }
  else if (($_SESSION['usertype']=='admin')) {
    header('location: index.php');
  }
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
		<title>PAYMENT DETAILS</title>
</head>

<style>
ul {
  list-style-type: none;
  margin: 10px;
  padding: 0;
  overflow: hidden;
  float:right;
  background-color:rgba(0,0,0,0.5);
  font-family:"Roboto",sans-serif;
  font-size:14px;
  font-weight:bold;
  border:2px solid black;
  border-radius:4px;
}

li {
  float: left;
  font-family:"Roboto",sans-serif;
  font-size:16px;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
	background-color:midnightblue;
    opacity: 0.7;
    border:2px solid black;
}

li.dropdown {
  display: inline-block;
}
</style>

<body style="background-image: url('images/c1.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  
<ul>
  <li><a href="admin.php" >RETURN BACK</a></li>
</ul>
    <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
      <div class="wrapper wrapper--w780 ">
        <div class="card card-1"  style="background: transparent;">
          <div class="card-heading"></div>
          <div class="card-body">

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
		
		<form class="row g-3 needs-validation" action="" method="post" name="add-loan-form" enctype="multipart/form-data">
                <h2 class="title"><u>PAYMENT DETAILS</u></h2>


<?php
$mysqli=new mysqli('localhost','root','' ,'emp-management-sys') or die(mysqli_error($mysqli));
$result=$mysqli->query("SELECT * from payment") or die($mysqli->error);
?>

<table class="table table-success table-striped" style="margin:50px 10px; opacity:0.95;">

<tr>
  <th>EmpID</th>
  <th>USERNAME</th>
  <th>Discription</th>
  <th></th>	
</tr>

<?php  
while($row=$result->fetch_assoc()):
?>
<tr>
<td><?php echo $row['empid'];?></td>
<td><?php echo $row['username'];?></td>
<td><?php echo $row['Discription'];?></td>


<td>
<a href="pay.php?view=<?php echo $row['username'];?>"
class="btn btn-info" class="btn btn-info">View</a>

</td>
</tr>
<?php endwhile; ?>
</table>


					</div>
				</div>
        </div>
    </div>
    </body>
</html>
