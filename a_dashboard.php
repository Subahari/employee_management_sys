<?php include 'controllers/authController.php'?>
<?php include 'a_empreg.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
  header('location: index.php');
}

$sql0= "SELECT * from emp_registration";
$result0 = mysqli_query($conn, $sql0);
$empCount=mysqli_num_rows($result0);

$sql1 = "SELECT * from leaves as l left join emp_registration as e on l.EmpID=e.empid where Status=0 ORDER BY PostingDate DESC" ;
$result1 = mysqli_query($conn, $sql1);
$leaveCount=mysqli_num_rows($result1);

$sql2 = "SELECT * from loan_applicants as la left join emp_registration as e on la.empid=e.empid where status='Waiting For Approval' ORDER BY date_of_apply DESC" ;
$result2 = mysqli_query($conn, $sql2);
$loanCount=mysqli_num_rows($result2);

$sql3 = "SELECT * from feedback as f left join emp_registration as e on f.EmpID=e.empid ORDER BY Date Desc Limit 3";
$result3 = mysqli_query($conn, $sql3);

$sql4 ="SELECT month_year,SUM(epf_20) as total_epf, SUM(etf) as total_etf, SUM(net_salary) as total_emp_salary FROM monthly_payment GROUP BY month_year order by month_year desc Limit 3";
$result4 = mysqli_query($conn,$sql4);
$chart_data="";
while ($row = mysqli_fetch_array($result4)) { 
    $month_year[]  = $row['month_year'];
    $total_epf[] = $row['total_epf'];
    $total_etf[] = $row['total_etf'];
    $total_emp_salary[] = $row['total_emp_salary'];
    $total_cost[]= $row['total_epf']+ $row['total_etf']+$row['total_emp_salary'];
}

$sql5 = "SELECT * from comments ORDER BY date Desc Limit 3";
$result5 = mysqli_query($conn, $sql5);

date_default_timezone_set('Asia/Colombo');
    $currentdate=date('Y-m-d H:m:s ', strtotime("now"));

$sql6 = "SELECT * from assign_project where DeadLine>= DATE(NOW()) order by DeadLine ASC" ;
$result6 = mysqli_query($conn, $sql6);
$projectCount=mysqli_num_rows($result6);
    
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
    	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

        <link rel="stylesheet" href="css/dash_style.css">
        <title>Add Loan Service</title>  
        

<style type="text/css">
    
</style>

    </head>

    <body>
            <div class="main-content" >
                
                <div class="row m-t-25" style="margin-left: 240px; margin-top: 30px; padding: 30px;">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?php echo $empCount;?></h2>
                                        <span>Total Employees</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?php echo $loanCount;?></h2>
                                        <span>Loan Applicants</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?php echo $leaveCount;?></h2>
                                        <span>Leave Applicants</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?php echo $projectCount;?></h2>
                                        <span>Pending Projects</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart4"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <br>
               
                <div class="row" style="margin-left: 270px; ">
                    
                    <div class="col-lg-6 col-sm-12" style="text-align:center">
                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-20" style="background-color: white; border-radius: 10px;">
                                <br><h3 class="page-header" >Monthly Analytical Reports </h3>
                                <div>Total EPF, ETF, Employee Salary</div>
                                <canvas  id="chartjs_bar"></canvas> <br>
                                
                              
                                <script type="text/javascript">
                                    var ctx = document.getElementById("chartjs_bar").getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels:<?php echo json_encode(array_reverse($month_year)); ?>,
                                            datasets:[
                                                {
                                                    label: 'Tot_Employee_Salary',
                                                    backgroundColor: "#ff407b",
                                                    data: <?php echo json_encode(array_reverse($total_emp_salary)); ?>
                                                },
                                                {
                                                    label: 'Tot_EPF(20%)',
                                                    backgroundColor: "#5969ff",
                                                    data: <?php echo json_encode(array_reverse($total_epf)); ?>
                                                },
                                                {
                                                    label: 'Tot_ETF(3%)',
                                                    backgroundColor: "#ffc750",
                                                    data: <?php echo json_encode(array_reverse($total_etf)); ?>
                                                }
                                            ]  
                                        },
                                        options: {
                                            legend: {
                                                display: true,
                                                position: 'bottom',
                         
                                                labels: {
                                                    fontColor: '#71748d',
                                                    fontFamily: 'Circular Std Book',
                                                    fontSize: 14,
                                                }
                                            } 
                                        }
                                    } );
                                </script>
                            </div> 
                        </div>

                         <div class="col-lg-6 col-sm-12" style="text-align:center">
                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-20" style="background-color: white; border-radius: 10px;">
                                <br><h3 class="page-header" >Monthly Analytical Reports </h3>
                                <div>Monthly Cost</div>
                                <canvas  id="chartjs_pie"></canvas> <br>
                                
                              
                                <script type="text/javascript">
                                    var ctx = document.getElementById("chartjs_pie").getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels:<?php echo json_encode(array_reverse($month_year)); ?>,
                                            /*datasets:[
                                                {
                                                    label: 'Tot_Employee_Salary',
                                                    backgroundColor: "#5969ff",
                                                    data: <?php echo json_encode(array_reverse($total_emp_salary)); ?>
                                                },
                                                {
                                                    label: 'Tot_EPF(20%)',
                                                    backgroundColor: "#ff407b",
                                                    data: <?php echo json_encode(array_reverse($total_epf)); ?>
                                                },
                                                {
                                                    label: 'Tot_ETF(3%)',
                                                    backgroundColor: "#ffc750",
                                                    data: <?php echo json_encode(array_reverse($total_etf)); ?>
                                                }
                                            ] 
                                            */
                                            datasets:[
                                                {
                                                    label: 'Tot_Monthly Cost',
                                                    backgroundColor: "rgba(54,162,235,0.8)",
                                                    data: <?php echo json_encode(array_reverse($total_cost)); ?>
                                                }
                                            ]

                                        },
                                        options: {
                                            legend: {
                                                display: true,
                                                position: 'bottom',
                         
                                                labels: {
                                                    fontColor: '#71748d',
                                                    fontFamily: 'Circular Std Book',
                                                    fontSize: 14,
                                                }
                                            } 
                                        }
                                    } );
                                </script>
                            </div> 
                        </div>
                       
                    </div>

                    <br><br>

                    
                    <!-- Leave Applicants Table-->
                    <div class="col-lg-9" style="margin-left: 300px;">
                        <h3 class="title-1 m-b-25">Leave Applicants</h3>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning table-hover">
                                <thead class="text-center">
                                    <tr class="table-dark">
                                        <th>Employee</th>
                                        <th>LeaveType</th>
                                        <th>Description</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>PostingDate</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($leave = mysqli_fetch_assoc($result1)) {
                                            echo "<tr>";
                                                echo "<td>".$leave['title']." ".$leave['firstname']." ".$leave['lastname']."</td>";
                                                echo "<td>".$leave['LeaveType']."</td>";
                                                echo "<td>".$leave['Description']."</td>";
                                                echo "<td>".$leave['FromDate']."</td>";
                                                echo "<td>".$leave['ToDate']."</td>";
                                                echo "<td>".$leave['PostingDate']."</td>";
                                                echo "<td style='color:blue;''>"."Waiting For Approval"."</td>";
                                                ?>
                                                <td><a href="admin.php?pg=leaves_3.php&leaveid=<?php echo $leave['ID'];?>" class="btn btn-info" name="view">View All</a></td>
                                           </tr>
                                           <?php
                                            }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br>
                    <!-- Loan Applicants Table-->
                    <div class="col-lg-9" style="margin-left: 300px;">
                        <h3 class="title-1 m-b-25">Loan Applicants</h3>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-earning table-hover">
                                <thead class="text-center table-dark" >
                                    <tr>
                                        <th>Loan-ApplicantID</th>
                                <th>Employee Name</th>
                                <th>Loan-Type</th>                                   
                                <th>Loan-Amount</th>
                                <th>Duration (Years)</th>
                                <th>Repayment-Method</th>
                                <th>EMI-amount</th>                                   
                                <th>Date-of-Apply</th>
                                <th>Status</th>
                                <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($loan_applicants = mysqli_fetch_assoc($result2)) {
                                            $loan_id=$loan_applicants['loan_id'];
                                            $sqlx = "SELECT * from `loan_details` where loan_id='$loan_id'";
                                            $resultx = mysqli_query($conn, $sqlx);
                                            $loan_type = mysqli_fetch_assoc($resultx)['loan_type'];

                                            echo "<tr>";
                                            echo "<td>".$loan_applicants['la_id']."</td>";
                                                echo "<td>".$loan_applicants['title']." ".$loan_applicants['firstname']." ".$loan_applicants['lastname']."</td>";
                                                echo "<td>".$loan_type."</td>";
                                                echo "<td>".$loan_applicants['loan_amount']."</td>";  
                                                echo "<td>".$loan_applicants['duration']." Yrs</td>";                               
                                                echo "<td>".$loan_applicants['repayment']."</td>";
                                                echo "<td>".$loan_applicants['emi']."</td>";                                       
                                                echo "<td>".$loan_applicants['date_of_apply']."</td>";    
                                                echo "<td style='color:#d72474;''>"."Waiting For Approval"."</td>";
                                                echo "<td>". "<a href=\"admin.php?pg=a_view_la_details.php&eid=$loan_applicants[empid]&lid=$loan_id&laid=$loan_applicants[la_id]\">"."<input type='button' class='btn btn-primary' name='viewloanapp-btn' value='View All'></a>  </td> ";  
                                           echo "</tr>";
                                           
                                            }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><br>

                    <div class="row" style=" margin-left: 270px;">
                        <div class="col-lg-6 col-sm-12" >
                            <div class="au-card au-card--no-shadow au-card--no-pad m-b-20">
                                <div class="au-card-title" style="background-image:url('images/f4.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3 class="card-title">Employee Says...</h3>
                                    <p class="card-text">The employees says about our platform</p>
                                </div>
                                <ul class="list-group list-group-flush" >                           
                                    <?php 
                                    while ($feedback = mysqli_fetch_assoc($result3)) { 
                                        $pto=$feedback['photo'];
                                        $rate=(int)$feedback['Rating'];
                                    ?>
                                        <li class="list-group-item">
                                            <?php echo'<img src="images/emp-photos/'.$pto.' " class="bd-placeholder-img rounded-circle class="img-fluid img-thumbnail" width="70px" height="70px"/>'.
                                                "<span> <b> &nbsp; ".$feedback['title']." ".$feedback['firstname']." ".$feedback['lastname']."</b> </span>";
                                                for($x=1;$x <= $rate;$x++) {
                                                    echo '<span style="float:right;"><img src="images/icons/star.png" width="30px" height="30px"> </span>';                        
                                                }
                                                    echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                                                        .$feedback["Comments"]; ?> </li>
                                        <?php 
                                    } ?>
                                </ul>                         
                            </div>
                        </div>

                         <div class="col-lg-6 col-sm-12">
                            <div class="au-card au-card--no-shadow au-card--no-pad m-b-20">
                                <div class="au-card-title" style="background-image:url('images/f4.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3 class="card-title">Viewers Says...</h3>
                                    <p class="card-text">The viewers of our site says about us</p>
                                </div>
                                <ul class="list-group list-group-flush" >                           
                                    <?php 
                                    while ($siteViewersFeedback = mysqli_fetch_assoc($result5)) { 
                                    ?>
                                        <li class="list-group-item">
                                            <?php echo'<img src="images/people2.png" class="bd-placeholder-img rounded-circle class="img-fluid img-thumbnail" width="70px" height="70px"/>'.
                                                "<span> <b> &nbsp; ".$siteViewersFeedback['comment_sender_name']."</b> </span>";
                                                
                                                echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                                                    .$siteViewersFeedback["comment"]; ?> </li>
                                        <?php 
                                    } ?>
                                </ul>
                             
                            </div>
                        </div>
                    </div>
                    <br>
        </div>            
    </body>
</html>