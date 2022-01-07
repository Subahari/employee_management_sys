<?php
require_once ('controllers/authController.php');

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
    header('location: index.php');
  }

$sql1 = "SELECT * from `loan_borrowers` ORDER BY lb_id ASC" ;
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
        <title>View Loan Borrowers Details</title>

        <style>
               
        </style>
    </head>
    <body style="background-image: url('images/bg-images/l12.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: center; background-attachment: fixed;">   
        <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
            <div class="wrapper wrapper--w1400" style="max-width: 1400px; padding-left: 200px;">
                <div class="card card-1"  style="background: transparent;">
                    <div class="card-heading"> </div>
                    <div class="card-body"> 
                        <h3><u>Loan Borrowers Details</u></h3> <br> 
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Loan-Borrower-ID</th>
                                    <th scope="col">Loan-Applicant-ID</th>
                                    <th scope="col">Full-Name</th>
                                    <th scope="col">Total Repayment Amount</th>
                                    <th scope="col">No of Month Available</th>
                                    <th scope="col">Available Repayment Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($loan_borrower = mysqli_fetch_assoc($result1)) {
                                        $la_id=$loan_borrower['la_id'];

                                        $sql2= "SELECT * from loan_applicants where la_id='$la_id'";
                                        $result2 = mysqli_query($conn, $sql2);
                                        $empid=mysqli_fetch_assoc($result2)['empid'];

                                        $sql3 = "SELECT * from `emp_registration` where empid='$empid'";
                                        $result3 = mysqli_query($conn, $sql3);
                                        while ($employee = mysqli_fetch_assoc($result3)) {
                                            $title = $employee['title'];
                                            $fname = $employee['firstname'];
                                            $lname = $employee['lastname'];
                                            $fullname=$title." ".$fname." ".$lname;
                                            $pto=$employee['photo'];
                                        }
                                       
                                        echo "<tr>";
                                        echo "<td><img src='images/emp-photos/".$pto."' height = 70px width = 70px></td>";
                                        echo "<td>".$loan_borrower['lb_id']."</td>"; 
                                         echo "<td>".$la_id."</td>";                               
                                        echo "<td>".$fullname."</td>";
                                        echo "<td>".$loan_borrower['tot_repayment_amount']."</td>";
                                        echo "<td>".$loan_borrower['no_of_month_available']."</td>";
                                        echo "<td>".$loan_borrower['available_repayment_amount']."</td>";
                                        echo "<td>".$loan_borrower['status']."</td>";                                       
                                        
                                        if ($loan_borrower['status']=='Completed') {
                                        echo "<td>"."<a href=\"admin.php?pg=a_view_loan_borrowers.php&del=$loan_borrower[lb_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">"."<input type='button' class='btn btn-danger' name='deleteloanborrower-btn' value='Delete'></a>"."</td>";
                                        }
                                        else{
                                            echo "<td>  <input type='button' class='btn btn-danger' name='deleteloanborrower-btn' id='deleteloanborrower-btn' value='Delete' disabled></td>";
                                        }
                                        
                                    }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            <div>
        </div>
    </body>

    <?php
        if (isset($_GET['del']))
        {
            delete($_GET['del']);
        }

        function delete($lbid){      
            //deleting the row from table
            $conn = new mysqli('localhost', 'root', '','emp-management-sys');
            $result = mysqli_query($conn, "DELETE FROM `loan_borrowers` WHERE lb_id='$lbid'");

            if($result==true){
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                       window.alert('This loan borrower record has been deleted successfully.')
                        window.location.href='admin.php?pg=a_view_loan_borrowers.php';
                        </SCRIPT>");                    
            }
            else{
                    echo "<script type='text/javascript'>window.alert('Error while deleting record') window.location.href='admin.php?pg=a_view_loan_borrowers.php'</script>";       
            }

        }

    ?>
</html>