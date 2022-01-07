
<?php
session_start();


$conn=new mysqli('localhost','root','','emp-management-sys') or die(mysqli_error($mysqli));

$id="";
$vtitle="";
$vfname="";
$vlname="";
$vnic="";
$vbirthday="";
$vid="";
$vgender="";
$vaddress="";
$vdistrict="";
$vphone="";
$vemail="";
$vadqualification="";

$vqualification="";
$vdate="";
$vworkexp="";
$vphoto="";

if(isset($_GET['view'])){
	$id=$_GET['view'];
	$sql="SELECT * FROM jobapplication where ID='$id'";
    $sqldata=mysqli_query($conn,$sql)or die('error getting');
    $row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC);
	$vposition=$row['position'];
	$vtitle=$row['title'];
	$vfname=$row['fname'];
	$vlname=$row['lname'];
	$vnic=$row['nic'];
	$vbirthday=$row['birthday'];
	$vid=$row['ID'];
	$vgender=$row['gender'];
	$vcivilstatus=$row['civilstatus'];
	$vaddress=$row['address'];
	$vdistrict=$row['district'];
	$vphone=$row['phone'];
	$vemail=$row['email'];
	$vadqualification=$row['adqualification'];
	$vqualification=$row['qualification'];
	$vdate=$row['Apply Date'];
	$vworkexp=$row['workexp'];
	$vphoto = $row['photo'];
}

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
View Job Applicants
</title>


<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <style>
        body{
            margin:0;
            padding:0;
            background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(images/c3.jpg);
            background-size:cover;
            background-position:center;
            font-family:sans-serif;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>
<ul>
   <li class="dropdown">
    <a href="a_view_jobapplicantdetails.php" class="at" class="dropbtn">FINISH VIEWING</a>
	</li>
</ul>

<div class="page-wrapper  p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1" style="margin-left: 300px;">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Applicant Info</h2>
                    <form method="POST" action="a_view_jobapplicantdetails.php?">

                        <div class="input-group">
                          <img src="../jopapplicant/images<?php echo $vphoto;?>" height = 150px width = 150px>
                        </div>


                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                  <p>First Name</p>
                                     <input class="input--style-1" type="text" name="fname" value="<?php echo $vfname;?>" readonly >
                                </div>
                            </div>
                            <div class="col-6">
							
                                <div class="input-group">
                                  <p>Last Name</p>
                                    <input class="input--style-1" type="text" name="lname" value="<?php echo $vlname;?>" readonly>
                                </div>
                            </div>
                        </div>
						
						 <div class="row row-space">
							<div class="col-6">
									<div class="input-group" >
									  <p>NIC NO</p>
										<input class="input--style-1" type="text" name="nic"  align="center" value="<?php echo $vnic;?>" readonly>
									</div>
							</div>
 
						   <div class="col-6">
								<div class="input-group" >
								  <p>Birthday</p>
									<input class="input--style-1" type="email"  name="birthday" align="center" value="<?php echo $vbirthday;?>" readonly>
								</div>
							</div>
						</div>
                       
						<div class="row row-space">
							<div class="col-6">
								<div class="input-group" >
								  <p>Gender</p>
									<input class="input--style-1" type="text" name="gender" align="center" value="<?php echo $vgender;?>" readonly>
								   
								</div>
							</div>
							
                            <div class="col-6">
                                <div class="input-group" >
                                  <p>Civil Status</p>
                                  <input class="input--style-1" type="text" name="civilstatus" align="center" value="<?php echo $vcivilstatus;?>" readonly>
                                </div>
                            </div>
                        </div>
						
                        <div class="col-12">
                        <div class="input-group" >
                          <p>Address</p>
                            <input class="input--style-1" type="text" name="address" align="center" value="<?php echo $vaddress;?>" readonly>
                        </div>
						<div class="col-12">
                        <div class="input-group">
                          <p>District</p>
                            <input class="input--style-1" type="text" name="district" align="center" value="<?php echo $vdistrict;?>" readonly>
                        </div>

                        <div class="row row-space">
							 <div class="input-group" >
							  <p>Contact No</p>
								<input class="input--style-1" type="text"  name="phone" align="center" value="<?php echo $vphone;?>" readonly>
							</div>

							<div class="input-group">
							  <p>Email ID</p>
								<input class="input--style-1" type="text" name="email" align="center" value="<?php echo $vemail;?>" readonly>
							</div>
						</div>

                        <div class="input-group">
                          <p>Qualification</p>
                            <input class="input--style-1" type="text" name="qualification"  align="center" value="<?php echo $vqualification;?>" readonly>
                        </div>
						
						  <div class="input-group" >
                          <p>Applied date</p>
                            <input class="input--style-1" type="text" name="date" align="center" value="<?php echo  $vdate;?>" readonly>
                        </div>


                        <div class="input-group" >
                          <p>Additional Qualification</p>
                            <input class="input--style-1" type="text" name="adqualification"  align="center"value="<?php echo $vadqualification;?>" readonly>
                        </div>
						
							  <div class="input-group" >
                          <p>Work Expericence</p>
                            <input class="input--style-1" type="textfield" name="workexp" align="center" value="<?php echo $vworkexp;?>" readonly>
                        </div>
						
						
						<div class="p-t-20" align="center">
                            <button class="btn btn--radius btn--green"  name="send"   align="center">Finish </button>
                        </div>

                        
                       
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
	


</body>
</html>