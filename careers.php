<!DOCTYPE html>
<html>
<head>
<title>Careers page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <style>
	* {
    box-sizing: border-box;
}

body {
    font-family: Verdana, sans-serif;
}

.mySlides {
    display: none;
}

img {
    vertical-align: middle;
}

/* Slideshow container */
.slideshow-container {
    max-width: 750px;
    position: relative;
    margin: auto;
}

/* Caption text */
.text {
    color: black;
	 background-color: white;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
	border-radius: 10%;
	
}

/* Number text (1/3 etc) */
.numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}

/* The dots/bullets/indicators */
.dot {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}

.active {
    background-color: #717171;
}

/* Fading animation */
.fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
}

@-webkit-keyframes fade {
    from {
        opacity: .4
    }

    to {
        opacity: 1
    }
}

@keyframes fade {
    from {
        opacity: .4
    }

    to {
        opacity: 1
    }
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
    .text {
        font-size: 11px
    }
}
.button {
            background-color: royalblue; /* Green */
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
		
		img {
  border-radius: 10%;
}

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
	
	#contact {
padding:50px;
 background-size:cover;
background-repeat: no-repeat;
background-attachment: fixed;
background-color: #F1F5F5;
background-position: center ;
background-size: 100px 100px;




    </style>
</head>
<body>
<?php
    include 'header.php';
?>

<section>

   <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/slider-image-1-1920x700.jpg" class="d-block w-100" alt="search job">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:white;background-color:black" >Be a part of one of Srilanka’s greatest workplaces!</h5>
        <p style="color:white;background-color:black">Join the Hexadian family and become a part of a globally recognized team of digital product specialistsHe</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/slider-image-2-1920x700.jpg" class="d-block w-100" alt="find jop">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:black;">We spark innovation, one sprint at a time</h5>
        <p style="color:black;">Get to know us and what we do</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/slider-image-3-1920x700.jpg" class="d-block w-100" alt="apply job">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:white;background-color:black;">If you can DREAM it, you can DO it."</h5>
        <p style="color:white;background-color:black;">Join Hexadian family,and fullfill your dream.</p>
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

<section>
<div class="body">
<h1 align="center" style="color:white;">Innately driven to find a better way through our core values</h1>
<h5 align="center" style="color:white;">Every Employee is empowered to drive our clients forward through our core PIRL values. </h5>


  
    <!--start-->
    <div class="slideshow-container" data-cycle="2000">

    <div class="mySlides fade">
        <div class="numbertext">1 / 4</div>
        
		<img src="images/passion.PNG" style="width:100%">
        <div class="text">Passion<br>To inspire our global teams to deliver extra ordinary results innovation</div>
		
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 4</div>
        <img src="images/innovation.PNG" style="width:100%">
        <div class="text">Innovation<br>Apply intellectual curiosity to reimagine better business outcomes for our clients</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 4</div>
       <img src="images/respect.PNG" style="width:100%">
        <div class="text">Respect<br>Protectour environment,honor our diversity and treat everyone with dignity</div>
    </div>
	<div class="mySlides fade">
        <div class="numbertext">4 / 4</div>
       <img src="images/leadership.PNG" style="width:100%">
        <div class="text">Leadership<br>Agile in thought and transparents in action our organization</div>
    </div>

</div>
</section>
	
	 <section id="contact">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <form id="contact-form" role="form" action="" method="post">
                              <div class="col-md-12 col-sm-12">
                                   <h4 align="center">We would love to hear from you</h4>
									<h1 align="center">Contact US</h1>
                                   <h6>Right now there is no us.I'm running the show alone.So evert feedback you provide,any suggestions you have and any new idea you like to share-please don't hesitate,write to me immediately.</h6><br>

                                   <h6>I'm a social animal.Animal because I've some degree of randomness in my behaviour.Social because i love to hear and share with people.</h6>
                              
							  </div>

                              <div class="col-md-6 col-sm-12">
                                   <div align="center"><button onclick="location.href='contactus.php'" type="button" align="center" class="button"><i class="fa fa-comment" aria-hidden="true"> Give feedback</i></button></div>
                              </div>

                         </form>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="images/contact-1-600x400.jpg" class="img-responsive" alt="">
                         </div>
                    </div>

               </div>
          </div>
     </section>
	
<div class="body">
<h1 align="center">Position in our company</h1>
<div class="slideshow-container" data-cycle="3000">

    

    <div class="mySlides fade">
        <div class="numbertext">1 / 6</div>
        <img src="images/Front End Developer.jpg" style="width:100%">
        <div class="text">Front End Developer</div>
    </div>
	
	<div class="mySlides fade">
        <div class="numbertext">2 / 6</div>
        <img src="images/Android &IOS App Developers.jpg" style="width:100%">
        <div class="text">Android &IOS App Developers</div>
    </div>
	
	 <div class="mySlides fade">
        <div class="numbertext">3 / 6</div>
        <img src="images/IT support Executive.jpg" style="width:100%">
        <div class="text">IT support Executive</div>
    </div>
	
	 <div class="mySlides fade">
        <div class="numbertext">4 / 6</div>
       <img src="images/seniordeveloper.jpg" style="width:100%">
        <div class="text">Seniordeveloper</div>
    </div>
	
	 <div class="mySlides fade">
        <div class="numbertext">5 / 6</div>
        <img src="images/Software Engineer Backend.jpg" style="width:100%">
        <div class="text">Software Engineer Backend</div>
    </div>
	
	 <div class="mySlides fade">
        <div class="numbertext">6 / 6</div>
        <img src="images/UI Designer.png" style="width:100%">
        <div class="text">UI Designer</div>
    </div>
</div>	
</div>
   
    <section id="contact">
          <div class="container">
               <div class="row">
                    <div class="col-md-4 col-xs-12">
                         <img src="images/employee.jpg"  alt="employee" >
                    </div>

                    <div class="col-md-offset-1 col-md-7 col-xs-12">
                         <div class="about-info">
                              
                              <figure>
                                   <figcaption>
								   <h1>Interested in taking your career to the next level?</h1>
								   <h4>Join Our Team!!!</h4>
<p>At <b >Hexad</b>,we empower each other and work with the hottest technologies and inspiring clients</p>
<h6>Find your next job opportunity here.</h6>
								   <button onclick="location.href='j_openposition.php'" type="button" align="center" class="buttonapply"><i class="fa fa-search" aria-hidden="true"> Find Jobs and apply Today</i></button>
                                   </figcaption>
                              </figure>
                         </div>
                    </div>
               </div>
          </div>
     </section>
   



 

<script>
var slideshowContainers = document.getElementsByClassName("slideshow-container");
/* For each container get starting variables */
for(let s = 0; s < slideshowContainers.length; s++) {
    /* Read the new data attribute */        
    var cycle = slideshowContainers[s].dataset.cycle;
    /* Find all the child nodes with class mySlides */
    var slides = slideshowContainers[s].querySelectorAll('.mySlides');
    var slideIndex = 0;
    /* Now we can cycle slides, but this recursive function must have parameters */
    /* slides and cycle never change, those are unique for each slide container */
    /* slideIndex will increase during each iteration */
    showSlides(slides, slideIndex, cycle);
};

/* Function is alsmost same, but now it uses 3 new parameters */
function showSlides(slides, slideIndex, cycle) {
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    };
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    };
    slides[slideIndex - 1].style.display = "block";
    /* Calling same function, but with new parameters and cycle time */
    setTimeout(function() {
        showSlides(slides, slideIndex, cycle)
    }, cycle);
};



</script>



    
</div>

<footer class="section footer-classic context-dark bg-image" style="background: #127dc4;">
        <div class="container">
          <div class="row row-30">
            <div class="col-md-4 col-xl-5">
              <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/hexad-logo.png" alt="" width="140" height="37"></a>
                <p style="color:white">We are an award-winning creative agency, dedicated to the best result in web design, promotion, business consulting, and marketing.</p>
              </div>
            </div>
            <div class="col-md-4">
              <h5 style="color:white">Contacts</h5>
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
              <h5 style="color:white">Links</h5>
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


