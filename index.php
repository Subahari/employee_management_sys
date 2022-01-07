
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> 
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
  <link rel="stylesheet" href="css/index_style.css">
  
  <title>Welcome</title>
<style>
  
  .carousel-item {
    height: 650px;
    object-fit: fill;
    /*position: relative;*/
  }

  .carousel-item > img {
    position: relative;
    top: 0;
    left: 0;
    min-width: 100%;
    height: 650px;
  } 

.context-dark, .bg-gray-dark, .bg-primary {
    color: rgba(255, 255, 255, 0.8);
}

.footer-classic a, .footer-classic a:focus, .footer-classic a:active {
    color: #ffffff;
}
.nav-list li {
    padding-top: 5px;
    padding-bottom: 5px;
}

.nav-list li a:hover:before {
    margin-left: 0;
    opacity: 1;
    visibility: visible;
}

ul, ol {
    list-style: none;
    padding: 0;
    margin: 0;
}

.social-inner {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 23px;
    font: 900 13px/1 "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.5);
}
.social-container .col {
    border: 1px solid rgba(255, 255, 255, 0.1);
}
.nav-list li a:before {
    content: "\f14f";
    font: 400 21px/1 "Material Design Icons";
    color: #4d6de6;
    display: inline-block;
    vertical-align: baseline;
    margin-left: -28px;
    margin-right: 7px;
    opacity: 0;
    visibility: hidden;
    transition: .22s ease;
} 


</style>
</head>

<body>
<?php
    include 'header.php';
?>

<div id="emsCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#emsCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#emsCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/1393442.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-start">
        <h2>We Code Your Dream To Reality</h2>
            <p>Do you need to create an Awesome website?</p>
            <p><a class="btn btn-lg btn-primary" href="Contactus.php">Contact Us</a></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/Aboutus.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h2 style="color:white;background-color:black">Make best digital solutions with ...</h2>
            <p style="color:white;background-color:black">We provide outstanding services in Web development, iOS development, Android development, Digital marketing and Designing.</p>
            <p><a class="btn btn-lg btn-primary" href="aboutus.php">About Us</a></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/joinwithus3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-end">
        <h2 style="color:black;background-color:white">Are you eager to <em>Join</em> with us.</h2>
            <p style="color:black;background-color:white">You can enter through our vacancies.</p>
            <p><a class="btn btn-lg btn-primary" href="careers.php">Join With Us</a></p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#emsCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#emsCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<footer class="section footer-classic context-dark bg-image" style="background: #127dc4;">
        <div class="container">
          <div class="row row-30">
            <div class="col-md-4 col-xl-5">
              <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/hexad-logo.png" alt="" width="140" height="37"></a>
                <p>We are an award-winning creative agency, dedicated to the best result in web design, promotion, business consulting, and marketing.</p>
              </div>
            </div>
            <div class="col-md-4">
              <h5>Contacts</h5>
              <dl class="contact-list">
                <dt><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</dt>
                <dd>Address: No. 289, Stanley Road, Jaffna, Sri Lanka</dd>
              </dl>
              <dl class="contact-list">
                <dt><i class="fa fa-envelope" aria-hidden="true"></i> email:</dt>
                <dd><a href="mailto:info@hexadit.com">info@hexadit.com</a></dd>
              </dl>
              <dl class="contact-list">
                <dt><i class="fa fa-phone" aria-hidden="true"></i> phones:</dt>
                <dd>021 2225 958</a> <span> <!--or 0112365478--></span>
                </dd>
              </dl>
            </div>
            <div class="col-md-4 col-xl-3">
              <h5>Links</h5>
              <ul class="nav-list">
                <li><a href="aboutus.php">About</a></li>
                <li><a href="careers.php">Careers</a></li>
                <li><a href="contactus.php">Contact us</a></li>

                <li><a href="login.php">Login</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row no-gutters social-container">
          <div class="col"><a class="social-inner" href="https://www.facebook.com/hexadit"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
          <div class="col"><a class="social-inner" href="https://www.instagram.com/hexad_it/"><span class="icon mdi mdi-instagram"></span><span>Instagram</span></a></div>
          <div class="col"><a class="social-inner" href="https://twitter.com/HexadIt"><span class="icon mdi mdi-twitter"></span><span>Twitter</span></a></div>
          <div class="col"><a class="social-inner" href=" https://www.linkedin.com/in/hexad-tech-solutions-6b1b23211/"><span class="icon mdi mdi-youtube-play"></span><span>Linkedin</span></a></div>
        </div>
      </footer>

</body>
</html>