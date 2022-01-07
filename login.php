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
	
		<title>Login</title>
		
		<style>
			
		</style>
		
		<script>
			function ShowPW() {
				var x = document.getElementById("password");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
					}
			}
		</script>
	</head>
	<body style="background-image: url('images/c1.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">
		<div class="container col-xl-10 col-xxl-8 px-4 py-4">
			<div class="row align-items-center g-4 py-4">
				<div class="col-lg-7 text-center text-lg-start">
					<h1 class="display-4 fw-bold lh-1 mb-3">Login form</h1>
					<p class="col-lg-10 fs-4">Welcome to our Employee Management System of our company.</p>
				</div>

				<div class="col-10 mx-auto col-lg-5 form-wrapper auth login" >						
					<form class="p-5 border rounded-3 bg-light" action="login.php" method="post" >
						<h3 class="text-center form-title">Login</h3>
						<?php if (count($errors) > 0): ?>
							<div class="alert alert-danger">
								<?php foreach ($errors as $error): ?>
								<li>
									<?php echo $error; ?>
								</li>
								<?php endforeach;?>
							</div>
						<?php endif;?>
					
						<div class="form-group">
							<label>Username or Email</label>
							<input type="text" name="username" class="form-control form-control-lg" value="<?php echo $username; ?>">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control form-control-lg">
							<input type="checkbox" style="margin-right:5px;" onclick="ShowPW()"><small>Show Password</small>
						</div><br>
						<div class="form-group">
						<button type="submit" name="login-btn" class="w-100 btn btn-lg btn-primary">Login</button>
							
						</div>

						<hr class="my-4">

						<div class="pw-reset">						
							<p><a href="enter_email.php">Forgot your password?</a></p>
						</div>
					</form>
				</div>
  			</div>
		</div>

	</body>
</html>