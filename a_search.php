<?php
require_once ('controllers/authController.php');

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
    header('location: index.php');
}
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "emp-management-sys";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * from `emp_registration` ORDER BY empid ASC";
if( isset($_GET['search']) ){
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM emp_registration WHERE firstname ='$name' or 	lastname='$name' or email='$name' or empid='$name'";
}
$result = $con->query($sql);
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
            
        <link rel="stylesheet" href="css/form.css">
        <title>Employee Details</title>
    </head>
    <body style="background-image: url('images/c6.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">   
        <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
            <div class="wrapper wrapper--w1420" style="max-width: 1450px; padding-left: 200px;">
                <div class="card card-1"  style="background: transparent;">
                    <div class="card-heading"> </div>
                    <div class="card-body">
<img src="images/icons/viewall.png"/>					
					
<form action="" method="GET">
<input type="text" placeholder="Type the name here" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
                        
						
                        <h3><u>Employee Details</u></h3> <br><br>                                    
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Emp-ID</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile-No</th>
                                    <th scope="col">Emp-Roll</th> 
                                    <th scope="col">Department</th>                              
                                    <th scope="col">Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($employee = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>".$employee['empid']."</td>";
                                        echo "<td><img src='images/emp-photos/".$employee['photo']."' height = 70px width = 70px></td>";
                                        echo "<td>".$employee['title']." ".$employee['firstname']." ".$employee['lastname']."</td>";                                       
                                        echo "<td>".$employee['email']."</td>";
                                        echo "<td>".$employee['mobileno']."</td>";
                                        echo "<td>".$employee['emproll']."</td>";
                                        echo "<td>".$employee['department']."</td>";
                                        echo "<td colspan=3>"."<a href=\"admin.php?pg=a_viewempdetails.php&id=$employee[empid]\">"."<input type='button' class='btn btn-info' name='viewemp-btn' value='View All'></a>       <a href=\"admin.php?pg=a_updateempdetails.php&eid=$employee[empid]\">"."<input type='button' class='btn btn-success' name='updateemp-btn' value='Update'></a>        <a href=\"admin.php?pg=a_deleteemp.php&id=$employee[empid]\" onClick=\"return confirm('Are you sure you want to delete?')\">"."<input type='button' class='btn btn-danger' name='deleteemp-btn' value='Delete'></a>"."</td>";
                                        //echo "<td>"."<a href=\"a_viewempdetails.php?id=$employee[empid]\">"."<button class='btn btn-info' name='viewemp-btn' value='View All'><i class='fas fa-eye'></i> View All</button></a>       <a href=\"a_updateempdetails.php?eid=$employee[empid]\">"."<button class='btn btn-success' name='updateemp-btn' value='Update'><i class='fas fa-edit'></i> Update</button></a>        <a href=\"a_deleteemp.php?id=$employee[empid]\" onClick=\"return confirm('Are you sure you want to delete?')\">"."<button class='btn btn-danger' name='deleteemp-btn' value='Delete'><i class='fas fa-user-minus'>  Delete</button></i></a>"."</td>";
                                    }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            <div>
        </div>
    </body>
</html>
