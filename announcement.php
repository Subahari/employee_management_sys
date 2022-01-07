<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Office Announcements</title>

<style>


    #contact {
        padding:100px;
        background-size:cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-color: #F1F5F5;
        background-position: center ;
        background-size: 100px 100px;
		background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(images/240_F_286728103_f5nCB3LLn4QudSdfau42vjGRfx2iU0Az.jpg);
		background-size:cover;
background-position:center;
font-family:sans-serif;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;

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
<body>
<?php
include 'header.php';
?>


<section id="contact" style="padding-top: 100px;padding-left: 70px;padding-right: 70px">


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <h1 align="center" style="color:white;">TEAM</h1>
    <h5 align="center">Together Everyone Achieve More</h5>
<?php
    $mysqli=new mysqli('localhost','root','' ,'emp-management-sys') or die(mysqli_error($mysqli));
    $result=$mysqli->query("SELECT * from external_advertisement order by id  asc") or die($mysqli->error);


    ?>

    <?php

    while($row=$result->fetch_assoc()):


    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <img src="images/icons8-commercial-50.png" style="float: left;" /> <h5 class="card-title"><?php echo $row['subject'];?></h5>
                    <p class="card-text"><?php echo $row['description'];?></p>
                    <div class="card-footer">
                        <small class="text-muted"><h6>Posted date:</h6><i class="fa fa-calendar"></i> <?php echo $row['date'];?></small>
                    </div>

                </div>

            </div>

        </div>
    </div>
	



<br><br>


<?php
        endwhile;

        ?>


      


</section>

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

</body>
</html>