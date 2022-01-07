<?php include 'controllers/authController.php'?>
<?php

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='hr')) {
  header('location: index.php');
}

$empid=$_GET['empid'];
$sql0="SELECT * from `loan_applicants` WHERE empid='$empid'";
$result0 = mysqli_query($conn, $sql0) or die("Error in Find :".mysqli_error($conn));
$loanap=mysqli_fetch_assoc ($result0);
$laid=$loanap['la_id'];

//When submit button press in addemp.php
if (isset($_POST["calculator-submit-btn"])) {
    $month = $_POST['month'];
    $basic_salary = $_POST['basic_salary'];
    $living_host = $_POST['living_cost'];
    $food = $_POST['food'];
    $holiday_pay = $_POST['holiday_pay'];
    $total_earning = $_POST['total_earning'];
    $over_time = $_POST['over_time'];
    $performance = $_POST['performance'];
    $loan =  $_POST['loan'];
    $net_salary =  $_POST['net_salary'];
    $epf8 = $_POST['epf8'];
    $epf12 =  $_POST['epf12'];
    $epf20 =$_POST['epf20'];
    $etf =  $_POST['etf'];

     //insert salary details in database
    $query1 = "INSERT INTO `monthly_payment`( empid,month_year,living_host,food,holiday_pay,total_earning,overtime,performance,loan_repayment, net_salary, epf_8,epf_12,epf_20,etf) 
        VALUES('$empid','$month','$living_host','$food','$holiday_pay','$total_earning','$over_time','$performance','$loan','$net_salary','$epf8','$epf12','$epf20','$etf')";
    $result1=$conn->query($query1)  or die($conn ->error);
    
    if($result1==true){ 
        
        $query2 = "SELECT * from `loan_borrowers` LEFT JOIN loan_applicants ON loan_applicants.la_id='loan_borrowers.la_id' where loan_borrowers.la_id='$laid'";
        $result2 = mysqli_query($conn, $query2) or die("Error in Find :".mysqli_error($conn));

        $loan_borrowers = mysqli_fetch_assoc($result2);
        $av_repay_amnt=$loan_borrowers['available_repayment_amount'];
        $no_of_month_av=$loan_borrowers['no_of_month_available'];
        $lbid=$loan_borrowers['lb_id'];
        
        if($av_repay_amnt>0){

            $avai_repay_amount= floatval($av_repay_amnt)-floatval($loan);
            $no_of_month_avai=floatval($no_of_month_av)-1;

            if($avai_repay_amount!=0){
                $query3 = "UPDATE `loan_borrowers` SET available_repayment_amount='$avai_repay_amount',no_of_month_available='$no_of_month_avai' WHERE lb_id='$lbid'";
                $result3=$conn->query($query3)  or die($conn ->error);
            }
            else{
                $query3 = "UPDATE `loan_borrowers` SET available_repayment_amount='$avai_repay_amount',no_of_month_available='$no_of_month_avai',status='Completed' WHERE lb_id='$lbid'";
                $result3=$conn->query($query3)  or die($conn ->error);
            }          
        }
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                   window.alert('This salary record has been added successfully.');
                   window.location.href='a_view_salarySlip.php?eid=$empid &month=$month';
                    </SCRIPT>"); 
    }
       /* else{

             $query3 = "UPDATE `loan_borrowers` SET status='Completed' WHERE lb_id='$lbid'";
            $result3=$conn->query($query3)  or die($conn ->error);
        }*/
   
    else {
        $_SESSION['error_msg'] = "Database error: Could not submit salary";
    }   
}

?>