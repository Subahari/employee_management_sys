<?php include 'controllers/authController.php'?>

<?php
  error_reporting(0);
  include('config1.php');
  if (empty($_SESSION['id'])) {
      header('location: login.php');
  }  
  else if (($_SESSION['usertype']=='admin')) {
    header('location: admin.php');
  }

    $uname=$_SESSION['username'];
    $sql1 = "SELECT * from `emp_registration` where username='$uname'";
    $result1 = mysqli_query($conn, $sql1);
    while ($employee = mysqli_fetch_assoc($result1)) {
        $empid = $employee['empid'];
        $title = $employee['title'];
        $fname = $employee['firstname'];
        $lname = $employee['lastname'];
        $fullname=$title." ".$fname." ".$lname;
    }
   
    $sql2 = "SELECT * from `loan_applicants` LEFT JOIN `loan_details` ON loan_applicants.loan_id=loan_details.loan_id where empid='$empid'";
    $result2 = mysqli_query($conn, $sql2);
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
    <body style="background-image: url('images/bg-images/l12.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: center; background-attachment: fixed;"> 

        <?php
            if ($_SESSION['usertype']=='hr' || $_SESSION['usertype']=='emp' ) {
                include "hr_emp_header.php";
            }
        ?>  
        
        <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
            <div class="wrapper wrapper--w1200" style="max-width: 1200px;">        
                <div class="card card-1"  style="background: transparent;">
                    <div class="card-heading"></div>
                    <div class="card-body">
                        <h3><u>My Loan History</u></h3> <br> 
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Loan-Applicant-ID</th>
                                    <th scope="col">Loan-Type</th>
                                    <th scope="col">Interest-Rate</th>
                                    <th scope="col">My-Loan-Purpose</th>
                                    <th scope="col">Loan-Amount</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Repayment-Method</th>
                                    <th scope="col">EMI-Amount</th>
                                    <th scope="col">Date-of-Apply</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Remark-Info</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($loan_ap = mysqli_fetch_assoc($result2))
                                    {
                                        $laid=$loan_ap['la_id'];
                                        echo "<tr>";  
                                        echo "<td>".$laid."</td>";                           
                                        echo "<td>".$loan_ap['loan_type']."</td>";
                                        echo "<td>".$loan_ap['interest_rate']."%</td>";
                                        echo "<td>".$loan_ap['my_purpose']."</td>";
                                        echo "<td>".$loan_ap['loan_amount']."</td>";
                                        echo "<td>".$loan_ap['duration']."yrs</td>"; 
                                        echo "<td>".$loan_ap['repayment']."</td>";
                                        echo "<td>".$loan_ap['emi']."</td>";
                                        echo "<td>".$loan_ap['date_of_apply']."</td>";
                                        $status=$loan_ap['status'];

                                        if($loan_ap['status']=='Approved')
                                            echo "<td><span style='background-color:#c8e6c9;'> Approved </span></td>";
                                        else if($loan_ap['status']=='Rejected')
                                            echo "<td><span style='background-color:#ffccbc;'>Rejected</span></td>";
                                        else
                                            echo "<td><b><span style='background-color:;'>Waiting For Approval</span></b></td>";
                                        echo "<td>".$loan_ap['update_status_reason']."</td>";  

                                        if($status==='Approved'){
                                            echo '  <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#account'.$laid.'">View Account</button></td>';

                                                $sql3 = "SELECT * from `loan_borrowers` where la_id='$laid' limit 1";
                                                $result3 = mysqli_query($conn, $sql3);
                                                $loan_br =mysqli_fetch_assoc($result3);
                                                
                                            echo ' 
                                            <div class="modal fade" id="account'.$laid.'" tabindex="-1" aria-labelledby="account" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">My Account Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  
                                                  <div class="modal-body">                               
                                                    <div class="container-fluid" style="text-align: left;">
                                                        <div class="row">
                                                          <div class="col-md-7"><b>Total Repayment Amount</b></div>
                                                          <div class="col-md-5">'.$loan_br['tot_repayment_amount'].'</div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-md-7"><b>Available Repayment Amount</b></div>
                                                          <div class="col-md-5">'.$loan_br['available_repayment_amount'].'</div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-md-7"><b>No of Month Available</b></div>
                                                          <div class="col-md-5">'.$loan_br['no_of_month_available'].'</div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-md-7"><b>Status</b></div>
                                                          <div class="col-md-5">'.$loan_br['status'].'</div>
                                                        </div>                                  
                                                    </div>
                                                  </div>
                                                                              
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  </div>
                                                
                                                </div>
                                              </div>                         
                                            </div>';

                                        }

                                        else{
                                             echo "<td>  <input type='button' class='btn btn-info' name='view-loan-account' id='view-loan-account' value='View Account' disabled></td>";
                                             echo "</tr>";
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
</html>
<?php 
/*

     <div class="row justify-content-center col-8">
                                                
        <table class="table tab2 table-hover">
            <tbody style= "text-align:left;">                                  
                <tr>
                    <th scope="row">Total Repayment Amount</th>
                    <td><?php echo $loan_br['tot_repayment_amount'];?></td>
                </tr>
                <tr>
                    <th scope="row">Available_Repayment_Amount</th>
                    <td><?php echo $loan_br['available_repayment_amount'];?></td>
                </tr>
                <tr>
                    <th scope="row">No of month available</th>
                    <td><?php echo $loan_br['no_of_month_available'];?></td>
                </tr>                                                          
                <tr>
                    <th scope="row">Status</th>
                    <td><?php echo $loan_br['status'];?></td>
                </tr>
            </tbody>
        </table> 
                                                             
    </div> 
 */
    ?>