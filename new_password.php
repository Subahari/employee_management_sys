<?php include 'controllers/authController.php' ;?>
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
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/menu.css">
		<title>Password Reset</title>

		<script>
			function ShowPW1() {
				var x = document.getElementById("new_pass");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
					}
			}
			function ShowPW2() {
				var x = document.getElementById("new_pass_c");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
					}
			}
		</script>

	</head>
	<body style="background-image: url('images/bg-images/fp2.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">
	<div class="container col-xl-10 col-xxl-8 px-4 py-4">
			<div class="row align-items-center g-5 py-5">
				<div class="col-lg-7 text-center text-lg-start">
					<h1 class="display-4 fw-bold lh-1 mb-3 text-white">Reset Password form</h1>
					<p class="col-lg-10 fs-4 text-white">Reset your password.</p>
				</div>

				<div class="col-10 mx-auto col-lg-5 form-wrapper auth new_password">
					<form class="p-5 border rounded-3 bg-light" name="resetpassword" action="new_password.php" method="post">
						<h3 class="text-center form-title">New password</h3><br>
						<!-- form validation messages -->
						<?php include('messages.php'); ?>
						<div class="form-group">
							<label>New password</label>
							<input type="password" name="new_pass" id="new_pass"class="form-control form-control-lg">
							<input type="checkbox" style="margin-right:5px;" onclick="ShowPW1()"><small>Show Password</small>
						</div><br>
						<div class="form-group">
							<label>Confirm new password</label>
							<input type="password" name="new_pass_c" id="new_pass_c" class="form-control form-control-lg">
							<input type="checkbox" style="margin-right:5px;" onclick="ShowPW2()"><small>Show Password</small>
						</div><br>
						<div class="form-group">
							<button type="submit" name="new_password"class="w-100 btn btn-lg btn-primary">Submit</button>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</body>
</html>