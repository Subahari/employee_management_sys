 <?php require_once ('controllers/authController.php'); ?>

<?php

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='hr')) {
  header('location: index.php');
}

        if (isset($_GET['del_eid']))
        {
            delete($_GET['del_eid'],$_GET['month']);
        }

        function delete($eid,$month){      
            //deleting the row from table
            $conn = new mysqli('localhost', 'root', '','emp-management-sys');
            $result = mysqli_query($conn, "DELETE FROM `monthly_payment` WHERE empid='$eid' and month_year='$month'");

            if($result==true){
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                       window.alert('This salary payment record has been deleted successfully.')
                        window.location.href='hr_salary_month.php';
                        </SCRIPT>");                    
            }
            else{
                    echo "<script type='text/javascript'>window.alert('Error while deleting record') </script>";       
            }

        }

    ?>