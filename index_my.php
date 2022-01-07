<?php include 'controllers/authController.php' ?>

<?php
  if(isset($_SESSION['username'])){
    if (($_SESSION['usertype']=='hr'))
      header('location: home_hr.php');
    else if (($_SESSION['usertype']=='emp'))
      header('location: home_employee.php');
      else if (($_SESSION['usertype']=='admin'))
        header('location: admin.php');
  }
?>
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
      <img src="images/bg-images/s1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-start">
        <h2>We Code Your Dream To Riality</h2>
            <p>Do you need to create an Awesome website?</p>
            <p><a class="btn btn-lg btn-primary" href="#">Contact Us</a></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/bg-images/s2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h2>Make best digital solutions with ...</h2>
            <p>We provide outstanding services in Web development, iOS development, Android development, Digital marketing and Designing.</p>
            <p><a class="btn btn-lg btn-primary" href="#">About Us</a></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/bg-themes/3.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-end">
        <h2>Are you eager to <em>Join</em> with us.</h2>
            <p>You can enter through our vacancies.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Join With Us</a></p>
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

</body>
</html>