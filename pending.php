<?php include 'controllers/authController.php'?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Password Reset</title>
		<style>
			.registerbox{
				width:780px;
				height:250px;
				background:rgba(0,0,0,0.5);
				color:#fff;
				top:50%;
				left:50%; 
				position:absolute;
				transform:translate(-50%,-50%);
				box-sizing:border-box;
				padding:25px 25px;
				border-radius: 20px;
			}

			.registerbox h2{
				padding-top: 15px; text-align: center; font-size:21px; font-family:sans-serif;
			}
			.registerbox p{
				text-align: center; font-size:18px; font-family:sans-serif;
			}

			
@media (max-width: 575.98px) { 
  .registerbox{
	width:350px;
	height:280px;
  }

  .registerbox h1{
    padding-top: 8px;
    font-size:30px;
  }
}

@media (min-width: 575.98px) and (max-width: 767px){
  .registerbox{
	width:500px;
	height:250px;
  	left:50%; 
  }

  .registerbox h1{
    padding-top: 20px;
    font-size:35px;
  }
}

@media (min-width: 767px) and (max-width: 1199.98px) { 
  .registerbox{
	width:620px;
	height:210px;
  }

  .registerbox h1{
    padding-top: 25px;
    font-size:40px;
  }
}
		</style>
	</head>
	<body  style="background-image: url('images/c5.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">
		<div class="registerbox">
			<form class="login-form" action="login.php" method="post" style="text-align: center;">
				<h2 class="display-4 fw-bold lh-1 mb-3">We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account. </h2>
				<p class="col-lg-10 fs-4">Please login into your email account and click on the link we sent to reset your password</p>
			</form>					
		</div>	
	</body>
</html>