<?php
error_reporting(0);
include('con1.php');

 ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Title -->
        
		<title >Current Job Opportunities</title>
		
		<!--Style sheet-->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
			
		<!--javascript-->
		<script src="bootstrap/js/jquery.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<script src="bootstrap/js/bootstrap.min.js"></script>


</head>
     <style>
	 .MyDIV {
    border-radius: 15px; 
    background: #fbfbfb;
    }

    .MyTitleDIV {
    border-radius: 15px; 
    background: black;
    font-family: Arial;
    color: #fff;
    font-weight: bold;
    text-align: left;
    }
	
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



.headi{
	
	font-weight:bold;
font-size:20px;
color:midnightblue;

} 

}
th{
font-weight:bold;
}
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: blue;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color:light blue;
}
     #contact {
         padding:100px;
         background-size:cover;
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-color: cadetblue;
         background-position: center ;
         background-size: 100px 100px;


</style>
        
        
    </head>
    <body style="background-image: url(images/home4.jpg);">




            <?php
    include 'header.php';
?>

			<br><br><br><div >
			<button onclick="topFunction()" id="myBtn" title="Go to top">^</button>
<?php
$mysqli=new mysqli('localhost','root','' ,'emp-management-sys') or die(mysqli_error($mysqli));
$result=$mysqli->query("SELECT designation,Id,closingdate  from vacany_add order by closingdate asc") or die($mysqli->error);
$cnt=1;
?><br><br>
<div class="MyDIV" style="background: #fbfbfb;">

        <div class="MyTitleDIV" style="text-align:center; font-style:italic; font-weight:900; font-size:16px;">
            <h1>Current Openings At Hexad</h1>
			
			<h6>Growth, Learning, Challenge and Empowerment...</h6>
			<div class="i-section-title"><i class="fa fa-graduation-cap"></i></div>
        
		</div>
    </div>

<table class="table table-success table-striped" style="margin:50px 10px; opacity:0.95;">
<tr><td class="headi" colspan="7" align="center"><u>OPEN POSITION DETAILS</u></td></tr>
<tr></tr>
<tr>
  <th>NO</th>
  <th>Designation</th>
  <th >Closing date</th>
  <th colspan="4" >ACTION</th>
</tr>

<?php 
 
while($row=$result->fetch_assoc()):

$date=date("Y-m-d");
?>
<tr>

<td ><?php echo $cnt;?></td>
<td><?php echo $row['designation'];?></td>

<?php 
$cloingdate=$row['closingdate'];
if($date>$Cdate){
	//echo $row['closingdate'];
	echo "<td style='color:red' >$cloingdate </td>";
}else{
	echo "<td style='color:green' >$cloingdate  </td>";
}
?>
<td ><?php $Cdate =$row['closingdate'];?></td>


<?php

if($date>$Cdate){
	
	echo "<td style='color:red' >You can't Apply for this postion(due to closing date)   </td>
                                    </tr>";
}
else{
?>

<td >
<a href="j_view_openposition.php?view=<?php echo $row['Id'];?>"
class="btn btn-info">View more details</a></td>
</tr>



<?php }
$cnt++;
endwhile;

?>


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




$sql="SELECT Id,designation,closingdate from jobapplication";


$result=$conn->query($sql);


 if($result->num_rows>0){
	while($row=$result-> fetch_assoc()){
	
		
    }
	echo "</table>";
	
	 
 }
 
 
 $conn-> close();


	
 
?>
</table>
<div class="MyDIV" style="background: #fbfbfb;">

        <div class="MyTitleDIV" style="text-align:center; font-style:italic; font-weight:900; font-size:16px;">
            <p>“Come join us to experience purpose and value within an inclusive workplace”</p>
        
		</div>
    </div>
	<div class="card-group">
  <div class="card">
    <img src="images/11.PNG" class="img-thumbnail" alt="Beyond Recruitment">
    <div class="card-body">
      <h5 class="card-title" align="center">Beyond Recruitment</h5>
      <p class="card-text">Once we recruit someone, we ensure that they get every opportunity to maximize their potential and shape their career. We have a training and development group that focuses on the learning and development needs of our people. This group's primary responsibility is to identify and fill competency gaps by providing relevant technical, business and leadership skills. One of our core beliefs is that our environment influences our development. Therefore, we have nurtured our organization's environment in order to realize our potential. Our open systems and flexible structures encourage creativity and new ideas..</p>
      
    </div>
  </div>
  <div class="card">
    <img src="images/2PNG.PNG" class="img-thumbnail" alt="Career & Development">
    <div class="card-body">
      <h5 class="card-title" align="center">Career & Development</h5>
      <p class="card-text">SIPL is focused on developing the most superior workforce so that the organization and individual employees can accomplish their work goals in service to our customers. Once we recruit someone, we ensure that they get every opportunity to maximize their potential and shape their career. We have a training and development group that focuses on the learning and development needs of our people. This group's primary responsibility is to identify and fill competency gaps by providing relevant technical, business and leadership skills. One of our core beliefs is that our environment influences our development. Therefore, we have nurtured our organization's environment to allow us to realize our potential. Our open systems, flexible structures and initiatives, like mentoring, encourage creativity and new ideas.</p>
      
    </div>
  </div>
  <div class="card">
    <img src="images/3.PNG" class="img-thumbnail" alt="Career with us">
    <div class="card-body">
      <h5 class="card-title"align="center">Career with us</h5>
      <p class="card-text">Our employees are our most important resource. SIPL is about caring for our employees and helping them to grow while they contribute to the organization's goals. We respect those who work with us and consider them as partners, who share our vision, and not mere employees. This philosophy has paid rich dividends and today we are considered a preferred employer for software professionals across the globe. We are constantly looking for ways to strengthen our processes with a view to make our organization a "work place of the future."</p>
      
    </div>
  </div>
</div>
  </div>
	
	
	<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
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