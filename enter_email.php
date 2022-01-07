<?php include 'controllers/authController.php'?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<link rel="stylesheet" href="css/main.css">
		<title>Password Reset</title>
	</head>
	<body style="background-image: url('images/bg-images/fp1.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">
		<div class="container col-xl-10 col-xxl-8 px-4 py-5 my-5">
			<div class="row align-items-center g-5 py-5">
				<div class="col-lg-7 text-center text-lg-start"><br>
					
				</div>

				<div class="col-10 mx-auto col-lg-5 form-wrapper auth email-for-reset">
					<form class="p-5 border rounded-3 bg-light" action="enter_email.php" method="post">
						<h3 class="text-center form-title">Reset password</h3>
						<!-- form validation messages -->
						<?php include('messages.php'); ?>
						
						<div class="form-group">	<br>	
							<input type="email" name="email" placeholder="Your email address" class="form-control form-control-lg"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
						</div><br>
						<div class="form-group">
							<button type="submit" name="reset-password" class="w-100 btn btn-lg btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>