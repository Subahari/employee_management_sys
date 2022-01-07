<?php
require_once 'sendEmails.php';

if (empty($_SESSION['id'])) {
    session_start();
}
$username = "";
$email = "";
$errors = [];

$conn = new mysqli('localhost', 'root', '', 'emp-management-sys');

if (isset($_GET['token'])) {
	$_SESSION['token']=mysqli_real_escape_string($conn,$_GET['token']);
}


// LOGIN
if (isset($_POST['login-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    if (count($errors) === 0) {
		
        //$query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
		$query = "SELECT * FROM users WHERE ? IN (username, email)OR ? IN (username, email) LIMIT 1";
		
        $stmt = $conn->prepare($query);
		$stmt->bind_param('ss', $username, $password);

        if ($stmt->execute()){
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
		
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['id'] = $user['id'];               
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
               
                $utype=$user['usertype'];
                    $_SESSION["usertype"]=$user['usertype'];
                    if($utype=="admin"){    
                        header('location: admin.php');
                    }
                    elseif($utype=="hr"){
                        header('location: home_hr.php');
                    }
                    else{
                        header('location:home_employee.php');
                    }
                
            
            //  header('location: index.php');
                exit(0);
            } 
			else { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }			
    
        }
	}		
}

/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset-password'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	// ensure that the user exists on our system
	$query = "SELECT email FROM users WHERE email='$email'";
	$results = mysqli_query($conn, $query);

	if (empty($email)) {
		array_push($errors, "Your email is required");
	}
	else if(mysqli_num_rows($results) <= 0) {
		array_push($errors, "Sorry, no user exists on our system with that email.");
	}
  
	// generate a unique random token of length 100
	$token = bin2hex(random_bytes(50));

	if (count($errors) == 0) {
		// store token in the password-reset database table against the user's email
		$sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
		$result = mysqli_query($conn, $sql);
		//$stmt = $conn->prepare($sql);
		//$stmt->bind_param('ss', $email, $token);
		//$result = $stmt->execute();	
	
		if ($result==true) {
            //$user_id = $stmt->insert_id;
            //$stmt->close();
		// Send email to user with the token in a link they can click on
			sendResetPasswordEmail($email, $token);
            
			$_SESSION['id'] = $user_id;	
            $_SESSION['email'] = $email;
			$_SESSION['token'] = $token;
	
			header('location: pending.php?email=' . $email);
		}
	}
}	

	// ENTER A NEW PASSWORD
	if (isset($_POST['new_password'])) {
		if((empty($_SESSION['token'])) && empty($_SESSION['id']) ){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
                       window.alert('Sorry! First, you go to login page and click Forget your password.');
                        window.location.href='login.php';
                        </SCRIPT>");          
		}
		else{

		$new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
		$new_pass_c = mysqli_real_escape_string($conn, $_POST['new_pass_c']);

		if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
		if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");

					
		if (count($errors) == 0) {
			
			if(isset($_SESSION['token'])){
				$token = $_SESSION['token'];	// Grab to token that came from the email link
				$sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";   //select email address of user from the password_reset table
			}
			else if(isset($_SESSION['id'])){
				$uname=$_SESSION['username'];
				$sql="SELECT email FROM users WHERE username='$uname'";  
			}
			
			$results = mysqli_query($conn, $sql);
		
			$email = mysqli_fetch_assoc($results)['email'];
  
			if ($email) {
				$new_pass =password_hash($new_pass, PASSWORD_DEFAULT);
				$sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
				$results = mysqli_query($conn, $sql);
				
				$sql2 = "SELECT username FROM users WHERE email='$email' LIMIT 1";   
				$result = mysqli_query($conn, $sql2);
				$username = mysqli_fetch_assoc($result)['username'];
      
				header('location: login.php');
	  
				$_SESSION['message'] ='You successfully reset your password!';
				$_SESSION['type'] = 'alert-success';
			}
			else {
				$_SESSION['message'] = "error!";
				$_SESSION['type'] = "alert-danger";
			}
		}
		else
		{
			$_SESSION['message'] = "Expired Link!";
		}


		


	}
		
	}
	
?>
