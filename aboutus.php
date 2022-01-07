<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Aboutus</title>

<style>
    .body {

        margin:0;
        padding:0;
        background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(images/abouuspageback.jpg);
        background-size:cover;
        background-position:center;
        font-family:sans-serif;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;

    }


    #contact1 {
        padding:100px;
        background-size:cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-color: #F1F5F5;
        background-position: center ;
        background-size: 100px 100px;


    #contact {
        padding:5000px;
        background-size:cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-color: red;
        background-position: center ;
        background-size: 100px 100px;

    .buttonapply {
        background-color: blueviolet; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 16px;
    }



</style>
</head>
<body>
<?php
include 'header.php';
?>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<section>

   <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
	<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/create.png" class="d-block w-100" alt="search job">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:white;background-color:black" >Create degital flatform</h5>
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/design2.jpg" class="d-block w-100" alt="find jop">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:white;background-color:black"">Design degital flatform</h5>
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/develop.jpg" class="d-block w-100" alt="apply job">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:white;background-color:black;">Develop degital flatform</h5>
        
      </div>
    </div>
	 <div class="carousel-item">
      <img src="images/build.jpeg" class="d-block w-100" alt="apply job">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:white;background-color:black;">Build degital flatform</h5>
       
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>


<!--Who we are-->
<div class="body">

    <div class="container">
        <div class="row" >


            <div class="col-md-6 col-sm-12">
                <div class="contact-image" style="padding-top: 75px;padding-bottom: 75px">
                    <img width="318" height="288" src="images/generic-corporate-3-3.jpg" class="img-responsive" alt="">
                    <img  width="164" height="148" src="images/generic-corporate-3-1.jpg" class="img-responsive" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <form id="contact-form" role="form" action="" method="post">
                    <div class="col-md-12 col-sm-12" style="padding-top: 50px" >

                        <h1 align="center" style="font-family: 'cursive';color: midnightblue">ABOUT US</h1>
                        <h3 STYLE="color: blue;font-family: 'Bell MT'">WHO WE ARE....</h3>
                        <h6>We are <b>HEXAD</b>, <b style="font-family: Verdana">creativity hunters!</b> One of the best digital service place in Sri Lanka. You will gain a masterpiece of our ideas to enhance your business successfully.</h6><br>

                        <h6>We provide a variety of services online and Hexad expertise web designing, web development, graphic designing, digital marketing, IT consultancy, UX/UI and branding.</h6>
                        <dl class="contact-list" style="padding-left: 50px">
                            <dt><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</dt>
                            <dd> No. 289, Stanley Road, Jaffna, Sri Lanka</dd>

                            <div class="col-md-6 col-sm-12">
                                <div align="center" ><button onclick="location.href='contactus.php'" type="button" align="center" class="btn btn-primary"><i class="fa fa-phone" aria-hidden="true"> <i class="fa fa-hand-o-up" aria-hidden="true"></i>Our Contact Details</i></button></div>
                            </div>
                        </dl>
                    </div>



                </form>
            </div>



        </div>
    </div>

</div>

<!--how we do-->
<section id="contact">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-12">
                <form id="contact-form" role="form" action="" method="post">
                    <div class="col-md-12 col-sm-12" style="padding-bottom: 20px">


                        <h3 STYLE="color: dodgerblue;font-family:Verdana;padding-bottom: 20px;align:center;padding-top: 50px">How we do it...</h3>
                        <h6>We provide our services in lower cost with quick implementation according to your expectation. Our skill is to establish your brand through creative UI & UX designing. Businesses are focused on creating brand identification, our skills will be supportive for you to accomplish this task easily.</h6><br>
                        <h6>Diversification of services helps you in gaining various benefits from Hexad. We are here to serve you!</h6>
                    </div>



                </form>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="contact-image">
                    <img  width="1024" height="432" src="images/all-devices-black-1024x432.png" class="img-responsive" alt="">
                </div>
            </div>

        </div>
    </div>
</section>


<!--mission-->
<div class="body" style="padding-left: 100px;padding-right: 100px;padding-bottom: 100px;padding-top: 100px">

    <div class="card-group">
        <div class="card">

            <div class="card-body" style="padding-top: 20px">
                <h5 class="card-title" align="center"> <i class="fa fa-paper-plane" aria-hidden="true"></i> OUR MISSION</h5>
                <p class="card-text">To create a virtual market online to make everyone convenient to access any business place worldwide.</p>
            </div>
        </div>
        <div class="card">

            <div class="card-body" style="padding-top: 20px">
                <h5 class="card-title" align="center"> <i class="fa fa-window-restore" aria-hidden="true"></i> OUR VISION</h5>
                <p class="card-text">Our fashion is to fascinate the world of digital business.</p>
            </div>
        </div>
        <div class="card">

            <div class="card-body">
                <h5 class="card-title"align="center"> <i class="fa fa-question-circle" aria-hidden="true"></i> WHY US</h5>
                <p class="card-text">You need innovation, trend, perfection? Then we are the one’s your finding! Let’s bring out the best part of your business.</p>
            </div>
        </div>
    </div>
</div>

</div>










    <div class ="col-9" >



        <div >
            <h2 align="center">Company Facility</h2>
            <ul >
               
                <li style ="padding-top:20px">Create Websites</li>
                <li style ="padding-top:20px">Create GUI Application</li>
                <li style ="padding-top:20px">Create Andriod App</li>
				
				 <li style ="padding-top:20px"> Job Opportunity</li>
               

            </ul>
        </div>


    </div>

    </div>



<hr>

<!--applicant comments-->
<section id="contact">
    <div>
<h1 align="center">What our Applicants say…</h1>
<h5 align="center">Here’s what our applicants are saying about our services</h5>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->

<div class="card-group">
    <div class="card">

        <div class="card-body">
            <img src="images/profile.png" style="float: left;" /> <h5 class="card-title">Kalaa</h5>
            <p class="card-text">system is very customer friendly.Good</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">2021-06-25 16:15:58</small>
        </div>
    </div>
    <div class="card">

        <div class="card-body">
            <img src="images/profile.png" style="float: left;" /> <h5 class="card-title">Sobi</h5>
            <p class="card-text">Excellent employee management system..</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">2021-06-25 16:17:46</small>
        </div>
    </div>
    <div class="card">

        <div class="card-body">
            <img src="images/profile.png" style="float: left;" /> <h5 class="card-title">Kavi</h5>
            <p class="card-text">Amazing system.</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">2021-06-25 16:18:11</small>
        </div>
    </div>
</div>

<div align="center">

<a class="nav-link" href="J_feedback.php"><button type="button" class="tn btn-primary"><center>View More</center></button></a>
</div>
    </div>

</section>
<section><hr></section>
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



</body>
</html>
