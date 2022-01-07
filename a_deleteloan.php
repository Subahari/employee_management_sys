<?php
require_once ('controllers/authController.php');

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
    header('location: index.php');
  }

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM `loan_details` WHERE loan_id='$id'");

if($result==true){
echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('This loan record has been deleted successfully.')
            window.location.href='admin.php?pg=viewloan.php';
            </SCRIPT>");
		
	}
	else{
		echo "<script type='text/javascript'>window.alert('Error while deleting record')window.location.href='a_viewloan.php' </script>";		
	}

?>