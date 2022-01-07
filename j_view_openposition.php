<?php
session_start();


$conn=new mysqli('localhost','root','','emp-management-sys') or die(mysqli_error($mysqli));

$id="";
$vdateposted="";
$vdesignation="";
$vexperience="";
$vqualification="";
$vjobtype="";
$vclosingdate="";
$vcontact="";




if(isset($_GET['view'])){
	$id=$_GET['view'];
	$sql="SELECT * FROM vacany_add where Id='$id'";
    $sqldata=mysqli_query($conn,$sql)or die('error getting');
    $row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC);
	
$vdateposted=$row['dateposted'];
$vdesignation=$row['designation'];
$vexperience=$row['experience'];
$vqualification=$row['qualification'];
$vjobtype=$row['jobtype'];
$vclosingdate=$row['closingdate'];
$vcontact=$row['contact'];
}

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
View open position more Info
</title>



    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

   
    

    <!-- Main CSS-->
    <link href="css/main1.css" rel="stylesheet" media="all">
	
	<style>
body{
margin:0;
padding:0;
background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(images/abc.jpg);
background-size:cover;
background-position:center;
font-family:sans-serif;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;
}


.dropbtn{
	 background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  background-color:#008CBA;
}


	</style>
</head>

<body style="background-image: url(images/home4.jpg);">
<?php
    include 'header.php';
?><br><br><br>



 <a href="j_openposition.php" class="dropbtn" style="float:right">FINISH VIEWING</a>

<div class="page-wrapper   font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Open position Info:</h2>
                    <form method="POST" action="j_jobApplicantformhtml.php?vacancy=<?php echo $vdesignation;?>">

                        
						
                        <div class="col-12">
                        <div class="input-group" >
                          <p>Designation:</p>
                            <input class="input--style-1" type="text" name="designation" align="center" value="<?php echo $vdesignation;?>" readonly>
                        </div>
						<div class="col-12">
                        <div class="input-group">
                          <p>Experience:</p>
                            <input class="input--style-1" type="text" name="experience" align="center" value="<?php echo $vexperience;?>" readonly>
                        </div>

                        <div class="row row-space">
							 <div class="input-group" >
							  <p>Qualification:</p>
								<input class="input--style-1" type="text"  name="qualification" align="center" value="<?php echo $vqualification;?>" readonly>
							</div>

							<div class="input-group">
							  <p>Jobtype:</p>
								<input class="input--style-1" type="text" name="jobtype" align="center" value="<?php echo $vjobtype;?>" readonly>
							</div>
						</div>

                        <div class="input-group">
                          <p>Closingdate:</p>
                            <input class="input--style-1" type="date" name="closingdate"  align="center" value="<?php echo $vclosingdate;?>" readonly>
                        </div>
						
						  <div class="input-group" >
                          <p>More information(Contact Number):</p>
                            <input class="input--style-1" type="text" name="date" align="contact" value="<?php echo  $vcontact;?>" readonly>
                        </div>


                        
						
						
						<div class="p-t-20" align="center">
                            <button class="btn btn--radius btn--green"  name="send"   align="center">Apply </button>
                                   
                        </div>

                        
                       
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
	</div>


</body>
<!--footer-->
<footer class="section footer-classic context-dark bg-image" style="background: #127dc4;">
    <div class="container">
        <div class="row row-30">
            <div class="col-md-4 col-xl-5">
                <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/hexad-logo.png" alt="" width="140" height="37"></a>
                    <p style="color:white">We are an award-winning creative agency, dedicated to the best result in web design, promotion, business consulting, and marketing.</p>
                </div>
            </div>
            <div class="col-md-4">
                <h5 style="color:darkblue">Contacts</h5>
                <dl class="contact-list">
                    <dt style="color:white"><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</dt>
                    <dd style="color:white">Address: No. 289, Stanley Road, Jaffna, Sri Lanka</dd>
                </dl>
                <dl class="contact-list">
                    <dt style="color:white"><i class="fa fa-envelope" aria-hidden="true"></i> email:</dt>
                    <dd style="color:white"><a href="mailto:info@hexadit.com" style="color:white">info@hexadit.com</a></dd>
                </dl>
                <dl class="contact-list">
                    <dt style="color:white"><i class="fa fa-phone" aria-hidden="true"></i> phones:</dt>
                    <dd style="color:white">021 2225 958</a> <span> <!--or 0112365478--></span>
                    </dd>
                </dl>
            </div>
            <div class="col-md-4 col-xl-3">
                <h5 style="color:darkblue">Links</h5>
                <ul class="nav-list">
                    <li style="color:white"><a href="aboutus.php" style="color:white">About</a></li>
                    <li style="color:white"><a href="careers.php" style="color:white">Careers</a></li>
                    <li style="color:white"><a href="contactus.php" style="color:white">Contact us</a></li>

                    <li style="color:white"><a href="login.php" style="color:white">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row no-gutters social-container">
        <div class="col"><a class="social-inner" href="https://www.facebook.com/hexadit" style="color:white"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
        <div class="col"><a class="social-inner" href="https://www.instagram.com/hexad_it/" style="color:white"><span class="icon mdi mdi-instagram"></span><span>Instagram</span></a></div>
        <div class="col"><a class="social-inner" href="https://twitter.com/HexadIt" style="color:white"><span class="icon mdi mdi-twitter"></span><span>Twitter</span></a></div>
        <div class="col"><a class="social-inner" href=" https://www.linkedin.com/in/hexad-tech-solutions-6b1b23211/" style="color:white"><span class="icon mdi mdi-youtube-play"></span><span>Linkedin</span></a></div>
    </div>
</footer>
</html>