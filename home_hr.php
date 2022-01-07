<?php 
include 'controllers/authController.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}

else if (($_SESSION['usertype']=='emp')) {
    header('location: home_employee.php');
    }
      else if (($_SESSION['usertype']=='admin')) {
        header('location: admin.php');
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <title>Welcome</title>
  <style>
    .main-banner {
      position: relative;
    }

    #bg-video {
        min-width: 100%;
        min-height: 100vh;
        max-width: 100%;
        max-height: 100vh;
        object-fit: cover;
        z-index: 0;
    }

    #bg-video::-webkit-media-controls {
        display: none;
    }

    .video-overlay {
        position: absolute;
        background-color:rgba(192,192,192,0.3);
        top: 0;
        left: 0;
        bottom: 0px;
        width: 100%;
    }

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

    .main-banner .caption h2 em {
      font-style: normal;
      color: #ed563b;
      font-weight: 900;
    }

</style>
  </head>

  <body>
      <div class="main-banner" id="top">
          <video autoplay muted loop id="bg-video">
              <source src="images/video.mp4" type="video/mp4" />
          </video>

          <div class="video-overlay header-text">
              <?php include "hr_emp_header.php";  ?>
              <br>

              <h3 style="padding-top: 70px; text-align:center;">Hello, <em> <?php echo $_SESSION['username']; ?></em></h3>
              
              <?php if (isset($_SESSION['message'])): ?>
                  <div class="alert <?php echo $_SESSION['type'] ?>">
                    <?php
                      echo $_SESSION['message'];
                      unset($_SESSION['message']);
                      unset($_SESSION['type']);
                    ?>
                  </div>
              <?php endif;?>

              <?php if (!$_SESSION['verified']): ?>            
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align: center;">
                    You need to verify your email address!
                    Sign into your email account and click on the verification link we just emailed you at
                    <strong> <?php echo $_SESSION['email']; ?></strong>
                </div>
                <?php else: 
                      $_SESSION['message'] = 'You are verified!!';
                      $_SESSION['type'] = 'alert-success';
                      unset($_SESSION['message']);
                      unset($_SESSION['type']);                
                  endif;
              ?>
                
              <div class="caption">
                  <h4>Welcome to our <br><em>Employee Management System </em></h4>
                  <h2>HEXAD Tech Solutions</h2>
              </div>

            </div>
        </div>     
  </body>
</html>