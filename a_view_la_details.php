<?php include 'controllers/authController.php'?>

<?php
    // redirect user to login page if they're not logged in
    if (empty($_SESSION['id'])) {
        header('location: login.php');
    }
    else if (!($_SESSION['usertype']=='admin')) {
    header('location: index.php');
    }
    
    //Get loan applicant id, employee id, loan id from URL
    $eid = $_GET['eid'];
    $loan_id=$_GET['lid'];
    $la_id=$_GET['laid'];

    //Get employee details from emp_registration table
    $sql1 = "SELECT * from `emp_registration` WHERE empid='$eid'";
    $result = mysqli_query($conn, $sql1);
    while ($employee = mysqli_fetch_assoc($result)) {
        $empid=$employee['empid'];
        $title=$employee['title'];
        $fname=$employee['firstname'];
        $lname=$employee['lastname'];
        $email=$employee['email'];
        $nic=$employee['nic'];
        $mobileno=$employee['mobileno'];
        $emproll=$employee['emproll'];
        $department=$employee['department'];
        $appointment_date=$employee['appointment_date'];
        $basic_salary=$employee['basic_salary'];
        $pto=$employee['photo'];
    }

    //Get loan details from loan_details table
    $sql2 = "SELECT * from `loan_details` WHERE loan_id='$loan_id'";
    $result2 = mysqli_query($conn, $sql2);
    while ($loan = mysqli_fetch_assoc($result2)) {
        $loan_type=$loan['loan_type'];
        $interest_rate=$loan['interest_rate'];
    }

    //Get loan applicants details from loan_applicants table
    $sql3 = "SELECT * from `loan_applicants` WHERE la_id='$la_id'";
    $result3 = mysqli_query($conn, $sql3);
    while ($loan_applicants = mysqli_fetch_assoc($result3)) {
        $my_purpose=$loan_applicants['my_purpose'];
        $loan_amount=$loan_applicants['loan_amount'];
        $duration=$loan_applicants['duration'];
        $repayment=$loan_applicants['repayment'];
        $emi=$loan_applicants['emi'];
        $documents=$loan_applicants['documents'];
        $date_of_apply=$loan_applicants['date_of_apply'];
        $status=$loan_applicants['status'];   
        $update_status_reason=$loan_applicants['update_status_reason'];
         
    }
                           
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
        <title>View Loan Applicant's Details</title>  
    </head>

<body style="background-image: url('images/c10.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">
<div class="row flex-nowrap">             
    <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
        <div class="wrapper" style="width:810px;">
            <div class="card card-1"  style="background: transparent;">
                <div class="card-heading"></div>
                <div class="card-body">
                    <a href="admin.php?pg=a_view_all_loan_applicants.php">
                        <button class="btn btn-outline-secondary" style="float: left;"><i class="fas fa-caret-square-left"></i> BACK</button></a><br>
                    <h3>Loan Applicant Details - <?php echo $fname." ".$lname;?></h3><br>
                    
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <div class="card card-1 mx-auto d-block" width=33.33% height=33.33%>                
                                <?php 
                                    echo "<img src='images/emp-photos/".$pto."' height = 100% width = 100% class='img-fluid img-thumbnail rounded '>"; 
                                ?>                               
                            </div>
                        </div>
                    </div>
                    
                    <div class="row align-items-start">
                        
                        <div class="col-6">
                            <table class="table table-hover">
                                <tbody style= "text-align:left;"> <br>                                 
                                    <tr>
                                        <th colspan=2 style="text-align:center;"><u> Employee Details</u></th>                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">EmpID</th>
                                        <td><?php echo $empid;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Full Name</th>
                                        <td><?php echo $title." ".$fname." ".$lname;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td><?php echo $email;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">NIC</th>
                                        <td><?php echo $nic;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mobile No</th>
                                        <td><?php echo $mobileno;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Employee Roll</th>
                                        <td><?php echo $emproll;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Department</th>
                                        <td><?php echo $department;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Appointment Date</th>
                                        <td><?php echo $appointment_date;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Basic Salary</th>
                                        <td><?php echo 'Rs. '.$basic_salary;?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    
                        <div class="col-6">
                            <table class="table table-hover">
                                <tbody style= "text-align:left;"> <br>    
                                    <tr>
                                        <th colspan=2 style="text-align:center;"><u> Loan Details</u></th>                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Applied Loan</th>
                                        <td><?php echo $loan_type;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Interest Rate</th>
                                        <td><?php echo $interest_rate;?>%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Purpose</th>
                                        <td><?php echo $my_purpose;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Loan Amount</th>
                                        <td>Rs. <?php echo $loan_amount;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Duration</th>
                                        <td><?php echo $duration;?> Yrs</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Repayment</th>
                                        <td><?php echo $repayment;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">EMI</th>
                                        <td>Rs. <?php echo $emi;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Documents</th>
                                        <td><?php echo $documents;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date Of Apply</th>
                                        <td><?php echo $date_of_apply;?></td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div> 

                    </div>
                    
                    
                    <div class="row justify-content-center">
                        <div class="col-9">
                            <table class="table table-hover">
                                <tbody>    
                                    <tr>
                                        <th scope="row">Status of this Loan Application</th>
                                        <?php 
                                        if($status=='Approved') 
                                            echo '<td style="background-color: green; color: white;">'.$status.'</td>';
                                        if($status=='Rejected') 
                                            echo '<td style="background-color: #bf360c; color: white;">'.$status.'</td>';
                                       if($status=='Waiting For Approval')
                                            echo '<td style="background-color:#fff9c4; color: black;">'.$status.'</td>';
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        if($status=='Rejected') {
                                            echo '<th scope="row">Reason of reject</th>';
                                            echo '<td>'.$update_status_reason.'</td>';
                                        }
                                        ?>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                    if($status=='Waiting For Approval'){
                         ?>             
                    <!-- Modify Status option -->
                    <div class="row justify-content-center">
                        <div class="col-10"  style="display:none;" id="reason" >                           
                            <table class="table table-hover">
                                <tbody>
                                    <tr>                                       
                                        <th scope="row">Reason of Update Status</th>
                                        <td>
                                            <textarea class="form-control" name="update_status_reason" id="reason_area" placeholder="Reason of Update Status" id="floatingTextarea1" style="height: 100px" onchange="restatus()" required></textarea>
                                        </td>                                     
                                    </tr>   <br>
                                    
                                    <tr>                                       
                                        <td colspan='2'><input type="checkbox" value="" id="myCheck"name='myCheck' onchange="restatus()"required />
                                        <label for="invalidCheck" > The information given above is true and accurate.</label>    </td>                                   
                                    </tr>                                                                    
                                </tbody>                               
                            </table>                            
                        </div>
                    </div>                    

                    <!-- Status update buttons -->
                    <div><br>
                        <div id='link_in' style="display:none;">                       
                            <a id='link1'> <input type='submit' class='btn btn-success' name='approve-loan-btn' id='approve-loan-btn1' value='Approved'>  </a>   
                            <a id='link2'>  <input type='submit' class='btn btn-danger' name='reject-loan-btn' id='reject-loan-btn1' value='Rejected'> </a> 
                            <!--a id='link3'>  <input type='submit' class='btn btn-info' name='waiting-loan-btn' id='waiting-loan-btn1' value='Waiting List'> </a-->                                             
                        </div>

                        <div id='link_out' style="display:none;">
                            <input type='button' class='btn btn-success' name='approve-loan-btn' id='approve-loan-btn2' value='Approved' disabled=true></a>
                            <input type='button' class='btn btn-danger' name='reject-loan-btn' id='reject-loan-btn2' value='Rejected' disabled=true></a>
                            <!--input type='button' class='btn btn-info' name='waiting-loan-btn' id='waiting-loan-btn2' value='Waiting List' disabled=true-->
                        </div>
                    </div>
                  

                    <div class="update-status" name="update-status" id="update-status">	<br>	
                        <p>Are you sure to response this loan application? </p><button class='btn btn-info btn-sm' name='restatus-btn' onclick="restatus()"> Take Action</button>			                                                  
                    </div> 
                    <?php } ?>                 

                </div>
               <div>
            </div>
        </div>
    </div>

    <script>
        function restatus(){
            
            //Get update reason textarea div id for display
            var x = document.getElementById("reason");      
            if (x.style.display === "none") {
                x.style.display = "block";              
            } 
            //Get reason of update status
            var y=document.getElementById("reason_area").value;
            var strLink1 = "admin.php?pg=a_update_loan_status.php&laid=<?php echo $la_id;?>&Response=Approved&Reason="+y;
                document.getElementById("link1").setAttribute("href",strLink1);
            var strLink2 = "admin.php?pg=a_update_loan_status.php&laid=<?php echo $la_id;?>&Response=Rejected&Reason="+y;
                document.getElementById("link2").setAttribute("href",strLink2);
            /*var strLink3 = "admin.php?pg=a_update_loan_status.php&laid=<?php echo $la_id;?>&Response=Waiting For Approval&Reason="+y;
                document.getElementById("link3").setAttribute("href",strLink3); */

            //Show the appopriate button to update status
            var li = document.getElementById('link_in');
            var lo = document.getElementById('link_out');

            var cb = document.getElementById("myCheck");            
            if((document.getElementById("reason_area").value != '')&&(cb.checked == true))
            {               
                if (li.style.display === 'none') {
                    li.style.display = 'block';                   
                }                    
                if (lo.style.display === 'block') {
                    lo.style.display = 'none';
                }
            } 
            else{
                if (li.style.display === 'block') {
                    li.style.display = 'none';
                }                    
                if (lo.style.display === 'none') {
                    lo.style.display = 'block';
                }
            }           
        }
    </script>
</body>
</html>