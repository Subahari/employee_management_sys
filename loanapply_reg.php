<?php include 'controllers/authController.php'?>
<?php

$errors = [];
$msg="";

//When submit button press in loanapply.php
if (isset($_POST["apply-loan-btn"])) {
    
    date_default_timezone_set('Asia/Colombo');
    $date_of_apply=date('Y-m-d H:m:s ', strtotime("now"));

    $empid = $_POST['empid'];

      //get firstname and lastname of the employee by using empid  from `emp_registration` table
    $sql1 = "SELECT * from `emp_registration` where empid='$empid'" ;
    $results1 = mysqli_query($conn, $sql1);
    $fname = mysqli_fetch_assoc($results1)['firstname'];
    $lname = mysqli_fetch_assoc($results1)['lastname'];
    $fullname=$fname." ".$lname;

    $loan_id = $_GET['lid']; 
    $my_purpose = $_POST['my_purpose'];
    $loan_amount = $_POST['loan_amount'];
    $duration = $_POST['duration'];
    $repayment = $_POST['repayment'];
    $emi = $_POST['emi'];

    $doc=$_FILES['documents'];
    $docname = $_FILES['documents']['name'];
    $docextension = pathinfo($docname, PATHINFO_EXTENSION);
    $doctempname = $_FILES["documents"]["tmp_name"];               
    //$file = rand(1,1000)."-".$_FILES['cv']['name'];
    $new_docname =  rand(1,1000)."-".$fullname.".".$docextension;
    $final_docname=str_replace(' ','',$new_docname);      
    $docfolder = "uploads/loan-applicants-doc/".$final_docname;  
   
    $count=0;
    $sql2 = "SELECT * from `loan_applicants` where empid='$empid'";
    $results2 = mysqli_query($conn, $sql2);
    while ($loan_ap = mysqli_fetch_assoc($results2)) {
        $laid=$loan_ap['la_id'];
        $sql3 = "SELECT * from `loan_borrowers` where la_id='$laid' and status='Process'";   
        $results3 = mysqli_query($conn, $sql3);
        $count=mysqli_num_rows($results3);
        if(mysqli_num_rows($results3)>0)
            break;
    }
        if($count != 0) {
            echo "<SCRIPT LANGUAGE='JavaScript'>
            window.alert ('Sorry, You are already apply a loan. First you settled all repayment. Then only you can apply this loan'); </script>";
        }
        else{
            if (!in_array($docextension, ['zip', 'rar', 'docx'])) {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align: center; margin-top:100px;"> Your document file extension must be .zip, .rar or .docx </div>'; 
            } 
            else{
            
                //create loanApplicant_id
                $query0="SELECT la_id FROM loan_applicants ORDER BY la_id DESC";
                $result0=mysqli_query($conn,$query0) or die ("Eror find la_id: ".mysqli_error($conn));

                if(mysqli_num_rows($result0)>0){
                    $row=mysqli_fetch_assoc($result0);
                    $la_id=$row['la_id'];
                    $la_id=++$la_id;
                }
                else{
                    $la_id="LA001";
                }

                //insert loan_applicants details in 'loan_applicants' table
                $query1 = "INSERT INTO loan_applicants(la_id,empid,loan_id,my_purpose,loan_amount,duration,repayment,emi,documents,date_of_apply) 
                    VALUES('$la_id','$empid','$loan_id', '$my_purpose','$loan_amount','$duration','$repayment','$emi','$final_docname','$date_of_apply')";
                $result1=$conn->query($query1)  or die($conn ->error);
                
                if($result1==true){ 
                    
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                               window.alert('Your loan application record has been submitted successfully.');
                                </SCRIPT>"); 
                                                  
                                $result_doc_upload=move_uploaded_file($doctempname, $docfolder);       
                                
                                if ($result_doc_upload==true)  {
                                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align: center; margin-top:100px;">
                                        Your document also uploaded successfully! </div>';               
                                }
                                else{
                                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align: center; margin-top:100px;"> Failed to upload your documents. Make sure to handover your documents as both hard-copy and soft-copy in Administation. </div>'; 
                                }
                }
                else{
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                               window.alert('Sorry. Your loan application does not submitted .');
                                </SCRIPT>"); 
                }


            }
           
               
        }
    }


?>