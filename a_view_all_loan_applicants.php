<?php
require_once ('controllers/authController.php');

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
    header('location: index.php');
  }

//$sql1 = "SELECT empid from `users`,`emp_registration` where id='$uid' && users.username= emp_registration.username";

$sql1 = "SELECT * from `loan_applicants` ORDER BY date_of_apply DESC" ;
$result1 = mysqli_query($conn, $sql1);
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
    </head>
    <body style="background-image: url('images/bg-images/b3.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: center; background-attachment: fixed;">   
        <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
            <div class="wrapper wrapper--w1400" style="max-width: 1400px; padding-left: 260px;">
                <div class="card card-1"  style="background: transparent;">
                    <div class="card-heading"> </div>
                    <div class="card-body"> 
                        <h3><u>Loan Applicants Details</u></h3> <br> 
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Loan-ApplicantID</th>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Loan-Type</th>                                   
                                    <th scope="col">Loan-Amount</th>
                                    <th scope="col">Duration (Years)</th>
                                    <th scope="col">Repayment-Method</th>
                                    <th scope="col">EMI-amount</th>                                   
                                    <th scope="col">Date-of-Apply</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($loan_applicants = mysqli_fetch_assoc($result1)) {
                                        $la_id=$loan_applicants['la_id'];
                                        $empid=$loan_applicants['empid'];
                                        $loan_id=$loan_applicants['loan_id'];
                                        $status=$loan_applicants['status'];

                                        $sql2 = "SELECT title,firstname,lastname from `emp_registration` where empid='$empid'";
                                        $result2 = mysqli_query($conn, $sql2);
                                        while ($employee = mysqli_fetch_assoc($result2)) {
                                            $title = $employee['title'];
                                            $fname =$employee['firstname'];
                                            $lname =$employee['lastname'];
                                        }
                                        $fullname=$title." ".$fname." ".$lname;
                                        
                                        $sql3 = "SELECT * from `loan_details` where loan_id='$loan_id'";
                                        $result3 = mysqli_query($conn, $sql3);
                                        $loan_type = mysqli_fetch_assoc($result3)['loan_type'];

                                        echo "<tr>";
                                        echo "<td>".$loan_applicants['la_id']."</td>";                               
                                        echo "<td>".$fullname."</td>";
                                        echo "<td>".$loan_type."</td>";                                       
                                        echo "<td>".$loan_applicants['loan_amount']."</td>";  
                                        echo "<td>".$loan_applicants['duration']." Yrs</td>";                               
                                        echo "<td>".$loan_applicants['repayment']."</td>";
                                        echo "<td>".$loan_applicants['emi']."</td>";                                       
                                        echo "<td>".$loan_applicants['date_of_apply']."</td>";    
                                        $status=$loan_applicants['status'];
                                            if($loan_applicants['status']=='Approved')
                                                echo "<td><span style='color: green;'>Approved</span></td>";
                                            else if($loan_applicants['status']=='Rejected')
                                                echo "<td><span style='color: red;'>Rejected</span></td>";
                                            else
                                                echo "<td><span style='color: blue;'>Waiting For Approval</span></td>";
                                                                       
                                        echo "<td>". "<a href=\"admin.php?pg=a_view_la_details.php&eid=$empid&lid=$loan_id&laid=$loan_applicants[la_id]\">"."<input type='button' class='btn btn-primary' name='viewloanapp-btn' value='View All'></a>  </td> ";    
                                        
                                        /*
                                        if($status==='Waiting For Approval'){
                                            echo "<td>  
                                                <a href='admin.php?pg=a_update_loan_status.php&Res=Approved&laid=$loan_applicants[la_id]' onClick=\"return confirm('Are you sure you want to Approve the loan application?')\"> <input type='submit' class='btn btn-success' name='approve-loan-btn' id='approve-loan-btn' value='Approved'>  </a>   
                                                        
                                                <a href='admin.php?pg=a_update_loan_status.php&Res=Rejected&laid=$loan_applicants[la_id]' onClick=\"return confirm('Are you sure you want to Reject the loan application?')\">  <input type='submit' class='btn btn-danger' name='reject-loan-btn' id='reject-loan-btn' value='Rejected'> </a>" ."</td>";                                    
                                        }
                                        else if($status==='Approved' || $status==='Rejected'){
                                            echo "<td>  <input type='button' class='btn btn-success' name='approve-loan-btn' id='approve-loan-btn' value='Approved' disabled>
                                                        <input type='button' class='btn btn-danger' name='reject-loan-btn' id='reject-loan-btn' value='Rejected' disabled> </td>";
                                        }
                                        */

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