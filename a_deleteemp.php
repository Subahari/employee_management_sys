<?php require_once ('controllers/authController.php');?>


<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
    header('location: index.php');
  }
      
//getting id of the data from url
$id = $_GET['id'];

$uname = "SELECT username FROM `emp_registration`  WHERE empid='$id'";
$resultx = mysqli_query($conn, $uname);
if(mysqli_num_rows($resultx)>0){
    $row=mysqli_fetch_assoc($resultx);
    $username=$row['username'];
}

$result1 = mysqli_query($conn, "DELETE FROM `users` WHERE username='$username'");

//deleting the row from table
$result2 = mysqli_query($conn, "DELETE FROM `emp_registration` WHERE empid='$id'");

if(($result1==true) && ($result2==true)){
echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('This employee record has been deleted successfully.')
            window.location.href='admin.php?pg=a_viewemp.php';
            </SCRIPT>");
		
	}
	else{
		echo "<script type='text/javascript'>window.alert('Error while deleting record')window.location.href='a_viewemp.php' </script>";		
	}

?>

