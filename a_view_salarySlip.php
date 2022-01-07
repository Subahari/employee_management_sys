<?php 
include 'controllers/authController.php'
?>
<?php
    //Get loan applicant id, employee id, loan id from URL
    $eid=$_GET['eid'];
    $month=$_GET['month'];

    // redirect user to login page if they're not logged in
    if (empty($_SESSION['id'])) {
        header('location: login.php');
    }
    else if (($_SESSION['usertype']=='emp')) {
      header('location: index.php');
    }

    //Get employee details from emp_registration table
    $sql1 = "SELECT * from `emp_registration` WHERE empid='$eid'";
    $result1 = mysqli_query($conn, $sql1);
    $emp = mysqli_fetch_assoc($result1);    

$sql2 = "SELECT * from `monthly_payment` where empid='$eid' and month_year='$month'";
$result2 = mysqli_query($conn, $sql2);
$payment = mysqli_fetch_assoc($result2);

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
        <title>Salary Calculator</title> 

        <style>
            .right{
                text-align: right;
            }
            .left{
                text-align: left;
            }
        </style>

    </head>

    <body style="background-image: url('images/c12.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: center; background-attachment: fixed;">

        <?php
            if(($_SESSION['usertype']=='admin')){?>
                <style type="text/css">
                    .wrapper{
                        margin-left: 300px;
                    }
                </style>

            <?php }
            else if ($_SESSION['usertype']=='hr') {
                include "hr_emp_header.php";
            }


        ?>
    
        <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
            <div class="wrapper wrapper--w1200" style="max-width: 1200px;">
        
                <div class="card card-1"  style="background: transparent;">
                    <div class="card-heading"></div>
                    <div class="card-body">
                        <?php if(($_SESSION['usertype']=='admin')){?>
                           <a href="hr_salary_add.php?month=<?php echo$month;?>">
                       <?php }
                       else if(($_SESSION['usertype']=='hr')){?>
                            <a href="hr_salary_add.php?month=<?php echo$month;?>">
                        <?php }?>
                        <button class="btn btn-outline-secondary" style="float: left;"><i class="fas fa-caret-square-left"></i> BACK</button></a><br>
                        <h2 class="title"><u>Salary Slip for the period of <?php echo date('F Y', strtotime($month));?></u></h2><br><br>
                        
                        <div class="row align-items-start">
                            <div class="col-6">
                                <table class="table table-hover">
                                    <tbody style= "text-align:left;">                                  
                                        <tr>
                                            <th scope="row">Employee ID</th>
                                            <td><?php echo $emp['empid'];?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Department</th>
                                            <td><?php echo $emp['department'];?></td>
                                        </tr>
                                         
                                        <tr>
                                            <th scope="row">Bank Name, Branch</th>
                                            <td><?php echo $emp['bankname'].", ".$emp['branch'];?></td>
                                        </tr>                                  

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <table class="table table-hover">
                                    <tbody style= "text-align:left;">                                   
                                        <tr>
                                            <th scope="row">Full Name</th>
                                            <td><?php echo $emp['title']." ".$emp['firstname']." ".$emp['lastname'];?></td>
                                        </tr> 
                                        <tr>
                                            <th scope="row">Designation</th>
                                            <td><?php echo $emp['emproll'];?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Account No</th>
                                            <td><?php echo $emp['acc_no'];?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Earnings -->
                        <div class="row align-items-start">
                            <div class="col-6">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                          <th class="left" scope="col">Earnings</th>
                                          <th class="right" scope="col">Amount</th>
                                        </tr>
                                    </thead>                               
                                    <tbody>   
                                        <tr>
                                            <td class="left">Basic Salary</td>
                                            <td class="right"><?php echo $emp['basic_salary'];?></td>
                                        </tr>                               
                                        <tr>
                                            <td class="left">Living host Allowance</td>
                                            <td class="right"><?php echo $payment['living_host'];?></td>
                                        </tr>
                                        <tr>
                                            <td class="left">Food Allowance</td>
                                            <td class="right"><?php echo $payment['food'];?></td>
                                        </tr>  
                                        <tr>
                                            <td class="left">Holiday Pay Allowance</td>
                                            <td class="right"><?php echo $payment['holiday_pay'];?></td>
                                        </tr>
                                        <tr>
                                            <td class="left">Overtime Allowance</td>
                                            <td class="right"><?php echo $payment['overtime'];?></td>
                                        </tr>  
                                        <tr>
                                            <td class="left">Performance Allowance</td>
                                            <td class="right"><?php echo $payment['performance'];?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <!-- Deductions -->
                            <div class="col-6">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                          <th class="left" scope="col">Deductions</th>
                                          <th class="right" scope="col">Amount</th>
                                        </tr>
                                    </thead>                               
                                    <tbody>   
                                        <tr>
                                            <td class="left">Loan Repayment</td>
                                            <td class="right"><?php echo $payment['loan_repayment'];?></td>
                                        </tr>                               
                                        <tr>
                                            <td class="left">EPF (8%)</td>
                                            <td class="right"><?php echo $payment['epf_8'];?></td>
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Earnings -->
                        <div class="row align-items-start">
                            <div class="col-6">
                                <table class="table table-hover">
                                     <tbody>   
                                        <tr>
                                            <th class="left" scope="col">Total Earnings</th>
                                            <?php $tot_earn=($payment['total_earning']+$payment['overtime']+$payment['performance'])?>
                                            <th class="right" scope="col"><?php echo $tot_earn;?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <table class="table table-hover">
                                     <tbody>   
                                        <tr>
                                            <th class="left" scope="col">Total Deductions</th>
                                            <?php $tot_dedu=($payment['loan_repayment']+$payment['epf_8']);?>
                                            <th class="right" scope="col"><?php echo $tot_dedu;?></th>
                                        </tr>  
                                         <tr>
                                            <th class="left" scope="col">Net Salary</th>
                                            <th class="right" scope="col"><?php echo ($tot_earn-$tot_dedu);?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>   

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

