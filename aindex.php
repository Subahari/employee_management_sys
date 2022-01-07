<?php include 'controllers/authController.php'?>

<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
  header('location: index.php');
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
  <title>Admin Panel</title>

  <style>


 .main-banner .caption {
      text-align: center;
      position: absolute;
      width: 80%;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
    }

    .main-banner .caption h4 {
      margin-top: 0px;
      font-size: 24px;
      text-transform: uppercase;
      font-weight: 800;
      color: BLACK;
      letter-spacing: 0.5px;
    }

    .main-banner .caption h2 {
      margin-top: 30px;
      margin-bottom: 25px;
      font-size: 50px;
      text-transform: uppercase;
      font-weight: 800;
      color:rgba(255,0,0,0.8);
      letter-spacing: 1px;
    }

     .main-banner .caption h1 {
      margin-top: 30px;
      margin-bottom: 25px;
      font-size: 35px;
      font-weight: 600;
      color:#00227b;
      letter-spacing: 1px;
    }

    .main-banner .caption h2 em {
      font-style: normal;
      color: #ed563b;
      font-weight: 900;
    }


</style>

  <body >
  <div class="wrapper">
        
      <div class="main-banner" id="top">
          <video autoplay muted loop id="bg-video">
              <source src="images/video1.mp4" type="video/mp4" />
          </video>

            <div class="caption">
                  <h1 style =""><em>Hello,</em> <?php echo $_SESSION['username']; ?></h1>
                  <h4>Welcome to our <br><em>Employee Management System </em></h4>
                  <h2>HEXAD Tech Solutions</h2>
              </div>
 
      </div>

  </body>
</html>