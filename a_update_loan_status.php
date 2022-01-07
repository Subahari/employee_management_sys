<?php require_once ('controllers/authController.php'); ?>

<?php

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
    header('location: index.php');
}

    if (isset($_GET['Reason'])){
        $response=$_GET['Response'];
        $la_id=$_GET['laid'];
        $reason=$_GET['Reason'];

        $sqlx = "SELECT * from `loan_applicants` WHERE la_id='$la_id'";
        $resultx = mysqli_query($conn, $sqlx);
        while ($loan_applicants = mysqli_fetch_assoc($resultx)) {
            $us_count=$loan_applicants['update_status_count']; 
        }

        if($us_count<1)
        {
            $us_count=$us_count+1;
            $result = mysqli_query($conn, "UPDATE `loan_applicants` SET status='$response',update_status_reason='$reason' ,update_status_count=$us_count where la_id='$la_id'") or die($mysqli->error());
            if($result===true)
            {
                echo ("<SCRIPT LANGUAGE='JavaScript'>                                                   
                        window.alert('You Are $response This Loan Application.' )                                               
                        window.location.href='admin.php?pg=a_view_all_loan_applicants.php';
                    </SCRIPT>");

                if($response=='Approved') 
                {
                    $query1="SELECT lb_id FROM loan_borrowers ORDER BY lb_id DESC";
                    $result1=mysqli_query($conn,$query1) or die ("Eror find lb_id: ".mysqli_error($conn));
                    if(mysqli_num_rows($result1)>0){
                        $row=mysqli_fetch_assoc($result1);
                        $lb_id=$row['lb_id'];
                        $lb_id=++$lb_id;
                    }
                    else{
                        $lb_id="LB001";
                    }

                    $query2="SELECT * FROM loan_applicants where la_id='$la_id'";
                    $result2=mysqli_query($conn,$query2) or die("Error in Find :".mysqli_error($conn));
                    $applicants=mysqli_fetch_assoc ($result2);
                    $tot_month=$applicants['duration']*12;
                    $tot_repayment=$applicants['emi']*$tot_month;

                    $query3="INSERT INTO `loan_borrowers`(lb_id, la_id, tot_repayment_amount, no_of_month_available, available_repayment_amount, status) VALUES('$lb_id','$la_id','$tot_repayment','$tot_month','$tot_repayment','Process')";
                    $result3=$conn->query($query3)  or die($conn ->error);
                }
                /*
                else{
                    $query4="SELECT la_id FROM loan_borrowers where la_id='$la_id'";
                    $result4=mysqli_query($conn,$query4) or die ("Eror find la_id: ".mysqli_error($conn));
                    if(mysqli_num_rows($result4)>0){
                        $result5= mysqli_query($conn, "DELETE FROM `loan_borrowers` WHERE la_id='$la_id'");
                    }
                }
                */
            }  
        }
        else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>                                                   
                        window.alert('You Are Already update The Loan Application Status. So You Cannot Update Any More ' )                                               
                        window.location.href='admin.php?pg=a_view_all_loan_applicants.php';
                    </SCRIPT>"); 
        }

                                               
    }

    /*
    if(isset($_GET['Res'])){
            $response=$_GET['Res'];
            $la_id=$_GET['laid'];

            $result = mysqli_query($conn, "UPDATE `loan_applicants` SET status='$response' where la_id='$la_id'") or die($mysqli->error());

            if($result===true){
                echo ("<SCRIPT LANGUAGE='JavaScript'>                                                   
                        window.alert('You Are $response This Loan Application.' )  ;                                        
                        window.location.href='admin.php?pg=a_view_all_loan_applicants.php';
                    </SCRIPT>"); 
            }

            if($response=='Approved') {
                $query1="SELECT lb_id FROM loan_borrowers ORDER BY lb_id DESC";
                $result1=mysqli_query($conn,$query1) or die ("Eror find lb_id: ".mysqli_error($conn));
                if(mysqli_num_rows($result1)>0){
                    $row=mysqli_fetch_assoc($result1);
                    $lb_id=$row['lb_id'];
                    $lb_id=++$lb_id;
                }
                else{
                    $lb_id="LB001";
                }

                $query2="SELECT * FROM loan_applicants where la_id='$la_id'";
                $result2=mysqli_query($conn,$query2) or die("Error in Find :".mysqli_error($conn));
                $applicants=mysqli_fetch_assoc ($result2);
                $tot_month=$applicants['duration']*12;
                $tot_repayment=$applicants['emi']*$tot_month;

                $query3="INSERT INTO `loan_borrowers`(lb_id, la_id, tot_repayment_amount, no_of_month_available, available_repayment_amount, status) VALUES('$lb_id','$la_id','$tot_repayment','$tot_month','$tot_repayment','Process')";
                $result3=$conn->query($query3)  or die($conn ->error);

            }
                                                    
        }
        */
?>