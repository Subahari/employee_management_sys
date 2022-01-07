<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact us</title>


    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  

<style>
body {
  border: 1px solid black;

  background-color: lightblue;

}

.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

</style>

<script>
		$(document).ready(function(){

		 $('#comment_form').on('submit', function(event){
		  event.preventDefault();
		  var form_data = $(this).serialize();
		  $.ajax({
		   url:"addcomment.php",
		   method:"POST",
		   data:form_data,
		   dataType:"JSON",
		   success:function(data)
		   {
			if(data.error != '')
			{
			 $('#comment_form')[0].reset();
			 $('#comment_message').html(data.error);
			 $('#comment_id').val('0');
			 load_comment();
			}
		   }
		  })
		 });

		 load_comment();

		 function load_comment()
		 {
		  $.ajax({
		   url:"fetchcomment.php",
		   method:"POST",
		   success:function(data)
		   {
			$('#display_comment').html(data);
		   }
		  })
		 }

		 $(document).on('click', '.reply', function(){
		  var comment_id = $(this).attr("id");
		  $('#comment_id').val(comment_id);
		  $('#comment_name').focus();
		 });

		});
		</script>
		</head>
<body>
<?php
    include 'header.php';
?>




<div class="container" style="padding-left: 10px; margin-top:10px;">
    <img src="images/contact-1-600x400.jpg" style="width:100%;height:400px;">

    <div class="centered" style="color: gainsboro;font-size: 20px">Contact Us</div>
</div>



<div class="container-fluid" style="padding-top: 15px;padding-left: 70px;padding-right: 70px">

 
  <div class="row">
    <div class="col-sm-6" style="background-color:lavender;"><h5 style="color: mediumblue">Feel free to ask for details, don't save any questions!</h5>
	
<form method="POST" id="comment_form" >
						<div class="form-group">
							<input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
						</div><br>
						<div class="form-group">
							<textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
						</div><br>
						<div class="form-group">
							<input type="hidden" name="comment_id" id="comment_id" value="0" />
							
							<input type="reset" value="Reset" class="btn btn-info"/>
							<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
						</div>
						
					</form>
					<span id="comment_message"></span>
						<br />
        <hr>
        <div class="col-sm-6" style="background-color:lavender;"><h5 align="center" style="font-family: Verdana;font-size: 30px;color: purple" >Business Hours      </h5>
            <i class="far fa-clock" style="color: blue"></i><p>Monday - Friday 9am to 5pm</p><br>
            <i class="far fa-clock" style="color: blue"></i><p>Saturday - 9am to 2pm</p><br>
            <i class="far fa-clock" style="color: blue"></i><p>Sunday - Closed</p><br>

        </div>
	
	
	
   </div>
    <div class="col-sm-6" style="background-color:lavenderblush;"><h5 align="center"> We would love to hear from you</h5>
        <h1 align="center" style="color: palevioletred">Contact Us</h1><p>Right now there is no us,I'm running the show alone.So every feedback you provide,any suggestions you have and any new idea you like to share_please don't hesitate,write to me immediately.</p>
	<br><p>I'm a social animal.Animal because I've some degree of randomness in my behaviour.Social because I love to hear and share with people</p>
    <hr>
        <div class="col-sm-6" style="background-color:lavenderblush;"><h5 align="center" style="font-family: Verdana;font-size: 30px;color: purple" >Our Office       </h5>


                <dl class="contact-list">
                    <dt style="color:black"><i class="fa fa-map-marker" aria-hidden="true" style="color: blue"></i> Address:</dt>
                    <dd style="color:black">Address: No. 289, Stanley Road, Jaffna, Sri Lanka</dd>
                </dl>
                <dl class="contact-list">
                    <dt style="color:black"><i class="fa fa-envelope" aria-hidden="true" style="color: blue"></i> email:</dt>
                    <dd style="color:black"><a href="mailto:info@hexadit.com" style="color:black;">info@hexadit.com</a></dd>
                </dl>
                <dl class="contact-list">
                    <dt style="color:black"><i class="fa fa-phone" aria-hidden="true" style="color: blue"></i> phones:</dt>
                    <dd style="color:black">021 2225 958</a> <span> <!--or 0112365478--></span>
                    </dd>
                </dl>



        </div>
        <div class="elementor-element elementor-element-77d332d elementor-shape-circle e-grid-align-left elementor-grid-0 elementor-widget elementor-widget-social-icons" data-id="77d332d" data-element_type="widget" data-widget_type="social-icons.default">
            <div class="elementor-widget-container">
                <div class="elementor-social-icons-wrapper elementor-grid">
							<span class="elementor-grid-item">
					<a class="elementor-icon elementor-social-icon elementor-social-icon-whatsapp elementor-animation-pulse elementor-repeater-item-760115d" target="_blank">
						<span class="elementor-screen-only"></span>
						<i class="fab fa-whatsapp"></i>					</a>
				</span>
                    <span class="elementor-grid-item">
					<a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-animation-pulse elementor-repeater-item-4b3b937" href="https://www.facebook.com/hexadit" target="_blank">
						<span class="elementor-screen-only"></span>
						<i class="fab fa-facebook"></i>					</a>
				</span>
                    <span class="elementor-grid-item">
					<a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-animation-pulse elementor-repeater-item-cb8a0f3" href="https://www.instagram.com/hexad_it/" target="_blank">
						<span class="elementor-screen-only"></span>
						<i class="fab fa-instagram"></i>					</a>
				</span>
                    <span class="elementor-grid-item">
					<a class="elementor-icon elementor-social-icon elementor-social-icon-envelope elementor-animation-pulse elementor-repeater-item-16c60bc" href="" target="_blank">
						<span class="elementor-screen-only"></span>
						<i class="fas fa-envelope"></i>					</a>
				</span>
                    <span class="elementor-grid-item">
					<a class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-animation-pulse elementor-repeater-item-9df7c8c" href="https://twitter.com/HexadIt" target="_blank">
						<span class="elementor-screen-only"></span>
						<i class="fab fa-twitter"></i>					</a>
				</span>
                    <span class="elementor-grid-item">
					<a class="elementor-icon elementor-social-icon elementor-social-icon-linkedin elementor-animation-pulse elementor-repeater-item-9fd1958" target="_blank">
						<span class="elementor-screen-only"></span>
						<i class="fab fa-linkedin"></i>					</a>
				</span>
                </div>

            </div>

        </div>
        <hr>
        <div class="elementor-element elementor-element-976eb90 text-color-primary  mb-0 elementor-widget elementor-widget-heading" data-id="976eb90" data-element_type="widget" data-widget_type="heading.default">
            <div class="elementor-widget-container">
                <h5 align="center" style="font-family: Verdana;font-size: 30px;color: purple" >Our <b>Location</b>       </h5>
                		</div>
        </div>
        <div class="elementor-element elementor-element-eceda9c gmap-rounded p-b-md m-b elementor-widget elementor-widget-google_maps" data-id="eceda9c" data-element_type="widget" data-widget_type="google_maps.default">
            <div class="elementor-widget-container">
                <div class="elementor-custom-embed">
                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=289%20Stanley%20Road%2C%20Jaffna&amp;t=m&amp;z=15&amp;output=embed&amp;iwloc=near" title="%3$s" aria-label="%3$s"></iframe>
               </div>
            </div>
        </div>


</div>


<footer class="section footer-classic context-dark bg-image" style="background: #127dc4;padding-top: 10px;margin-top:50px" >
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