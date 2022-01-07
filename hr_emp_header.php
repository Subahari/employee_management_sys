<?php 
include 'controllers/authController.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (($_SESSION['usertype']=='admin')) {
  header('location: admin.php');
}

$uname = $_SESSION['username'];

$sql1 = "SELECT* from `emp_registration` where username='$uname' ";
$result1 = mysqli_query($conn, $sql1);
$employ = mysqli_fetch_assoc($result1);

$full_name=$employ['title']." ".$employ['firstname']." ".$employ['lastname'];
$poto=$employ['photo'];
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

        <title></title>
    </head>

  <body> 

<header class="p-3 bg-dark text-white fixed-top">
    <div class="container">   
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
          
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
             <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
            <?php
              //if($_SESSION['verified']==1){
              if ($_SESSION['usertype']=='hr')
                echo '<li><a href="hr_salary_month.php" class="nav-link px-2 text-white">Calulate Salary</a></li>';
            ?>              
                <li><a href="viewloan.php" class="nav-link px-2 text-white">Loan-Apply</a></li>
                <li><a href="myloan_details.php" class="nav-link px-2 text-white">My-Loan-Details</a></li>
                <li><a href="leaveform.php" class="nav-link px-2 text-white">Leave-Apply</a></li> 
                <li><a href="leavehistory.php" class="nav-link px-2 text-white">My-Leave-History</a></li>        
                <li><a href="viewproject.php" class="nav-link px-2 text-white">Project</a></li>
                <li><a href="viewreward.php" class="nav-link px-2 text-white">Rewards</a></li>
                <li><a href="feedbackadd.php" class="nav-link px-2 text-white">Feedback</a></li>
        </ul>
  
        <div class="text-end">
             <a href="myprofile.php" style="text-decoration:none; "> <?php echo'<img src="images/emp-photos/'.$poto.'" class="bd-placeholder-img rounded-circle class="img-fluid img-thumbnail" width="45px" height="45px"/>';?> </a>               
            <a href="logout.php"><button type="button" class="btn btn-outline-warning me-2">LOGOUT</button></a>              
        </div>

      </div>
    </div>
  </header>
  </body>
</html>