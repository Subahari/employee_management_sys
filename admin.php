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
	
	<!--link rel="stylesheet" href="css/menu.css"-->  

  <title>Admin Panel</title>
<style>
  #bg-video {
        min-width: 100%;
        min-height: 100vh;
        max-width: 100%;
        max-height: 100vh;
        object-fit: cover;
        z-index: 0;
       overflow: hidden;
        margin-top: -15px;
        margin-bottom: -25px;
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

@media(min-width: 576px){
   #content: {
    margin-left: 50px;
}
   
     
</style>
</head>

<body>
      

      <div class="content">

      <header class="py-2 fixed-top">
         
                  <a href="logout.php" class="nav-link text-white">       
                    <button type="button" class="btn btn-danger btn-sm px-3 ms-sm-3 fw-bold float-end"><i class="fas fa-sign-in-alt"></i> Logout</button>
                  </a>    
               
        </header>

            <div class="row flex-nowrap">             
              <?php
                include("sidebar.php");
              ?>


              <div class="col py-3" >
                <div id="content">
        

                <?php
                    if(isset($_GET['pg']))
                    {
                      include($_GET['pg']);
                    }
                    else{
                      include("aindex.php");
                    }
                ?>                
              </div>
              
            </div>
        </div>    
</body>
</html>
