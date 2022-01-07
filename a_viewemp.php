<?php
require_once ('controllers/authController.php');

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
    header('location: index.php');
}



if( isset($_POST['search']) ){
    $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['search']));
    $sql = "SELECT * FROM emp_registration WHERE firstname ='$name' or  lastname='$name' or email='$name' or empid='$name' or emproll='$name'";
}
else{
    $sql = "SELECT * from `emp_registration` ORDER BY empid ASC" ;
}
//echo "$sql";
$result = mysqli_query($conn, $sql);
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
        <title>Employee Registration</title>
    </head>
    <body style="background-image: url('images/bg-images/b3.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: center; background-attachment: fixed;">   
        <div class="content-wrapper p-t-100 p-b-100 font-robo d-flex justify-content-center" style="text-align:center;">
            <div class="wrapper wrapper--w1420" style="max-width: 1450px; padding-left: 200px;">
                <div class="card card-1"  style="background: transparent;">
                    <div class="card-heading"> </div>
                    <div class="card-body"> 
                        <img src="images/icons/viewall.png"/>
                        <h3><u>Employee Details</u></h3> <br><br>                                    
                        
                        <form action="" method="POST">
                            <input type="text" placeholder="Type employee name here" name="search" style="width:250px; height:40px;">
                            &nbsp;
                            <input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
                            <a href="admin.php?pg=a_viewemp.php"> <i class="fas fa-sync-alt"> </i></a>
                        </form> <br>

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
                                        echo "<td>".
                                            "<a href=\"admin.php?pg=a_viewempdetails.php&id=$employee[empid]\">"."<img src='images/icons/view.png'  name='viewemp-btn' style='width:40px; height:40px;'/ ></a>".
                                            "<a href=\"admin.php?pg=a_updateempdetails.php&eid=$employee[empid]\">"."<img src='images/icons/update.png'  name='updateemp-btn' style='width:40px; height:40px;'/ ></a>".
                                            "<a href=\"admin.php?pg=a_deleteemp.php&id=$employee[empid]\" onClick=\"return confirm('Are you sure you want to delete?')\">"."<img src='images/icons/delete.png'  name='deleteemp-btn' style='width:40px; height:40px;'/ ></a>".
                                        "</td>";                                      
                                        
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
