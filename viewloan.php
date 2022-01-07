<?php require_once ('controllers/authController.php'); ?>

<?php 

if (empty($_SESSION['id'])) {
    header('location: login.php');
}

$uname = $_SESSION['username'];

$sql = "SELECT * from `loan_details` ORDER BY loan_id ASC" ;
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT e.empid,l.la_id from `emp_registration` as e left join `loan_applicants` as l on  e.empid='l.empid' where e.username='$uname' ";
$result2 = mysqli_query($conn, $sql2);
$eid = mysqli_fetch_assoc($result2)['empid'];
$laid = mysqli_fetch_assoc($result2)['la_id'];

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
        <title>View Loan Details</title>

        <?php
            if ($_SESSION['usertype']=='admin'){ ?>
                <style type="text/css">
                    .wrapper{
                        margin-left: 300px;
                    }
                </style>
            <?php }
        ?>
    </head>
    <body style="background-image: url('images/bg-images/bg12.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;"> 

        <?php
            if ($_SESSION['usertype']=='hr' || $_SESSION['usertype']=='emp' ) {
                include "hr_emp_header.php";
            }
        ?>  
        
        <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
            <div class="wrapper wrapper--w1200" style="max-width: 1200px;">
                <div class="card card-1 "  style="background: transparent;">
                    <div class="card-heading"> </div>
                    <div class="card-body"> 
                        <h3><u>Loan Details</u></h3> <br> 
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Loan-ID</th>
                                    <th scope="col">Loan-Type</th>
                                    <th scope="col">Loan-Purpose</th>
                                    <th scope="col">Maximum Loan Amount</th>
                                    <th scope="col">Interest-Rate</th>
                                    <th scope="col">Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($loan = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>".$loan['loan_id']."</td>";                               
                                        echo "<td>".$loan['loan_type']."</td>";
                                        echo "<td>".$loan['loan_purpose']."</td>";
                                        echo "<td>".$loan['max_loan_amount']."</td>";
                                        echo "<td>".$loan['interest_rate']."%</td>";                                       
                                        
                                        if ($_SESSION['usertype']=='admin') {
                                        echo "<td>"."<a href=\"admin.php?pg=a_updateloan.php&id=$loan[loan_id]\">"."<input type='button' class='btn btn-success' name='update-loan-btn' value='Update'></a>  

                                            <a href=\"admin.php?pg=a_deleteloan.php&id=$loan[loan_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">"."<input type='button' class='btn btn-danger' name='deleteloan-btn' value='Delete'></a>"."</td>";
                                        }
                                        else{

                                        echo "<td>"."<a href=\"loanapply.php?lid=$loan[loan_id]&eid=$eid\">"."<input type='button' class='btn btn-success' name='apply-loan-btn' value='Apply'></a>"."</td>";
                                        }
                                    }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>