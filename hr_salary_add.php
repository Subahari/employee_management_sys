<?php include 'controllers/authController.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (($_SESSION['usertype']=='emp')) {
  header('location: home_employee.php');
}

if (isset($_POST['month-btn'])) {
$month=$_POST['month'];
}
else if (isset($_GET['month'])) {
$month=$_GET['month'];
}

$sql = "SELECT * from `emp_registration` ORDER BY empid ASC" ;
$result = mysqli_query($conn, $sql);
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
        <title>Salary Calculation</title>    
    </head>

    <body style="background-image: url('images/c15.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">
        <?php 
            if(($_SESSION['usertype']=='admin')){
                include "sidebar.php";?>
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
                    
                    <div class="card-body">
                        <?php if(($_SESSION['usertype']=='admin')){
                           echo ' <a href="admin.php?pg=hr_salary_month.php">';
                       }
                       else if(($_SESSION['usertype']=='hr')){
                            echo '<a href="hr_salary_month.php">';
                        }?>
                        <button class="btn btn-outline-secondary" style="float: left;"><i class="fas fa-caret-square-left"></i> BACK</button></a><br>
                        <h2 class="title"><u>Salary Calculation</u></h2><br><br>

                        <div class="row justify-content-center">                        
                            <div class="form-floating mb-3 col-md-4">  
                                <input type="month" min="2018-01" class="form-control" name="month" id="month" placeholder="Month" value=<?php echo $month?> disabled/> 
                                <label for="floatingInput" class="form-label"> Month</label>                   
                                <div class="valid-feedback">Looks good!</div>                 
                            </div> 
                        </div>    

                        <div id="details">
                            <!-- Employee Personal Details --><br><br>
                            <label for="floatingInput" class="form-label"><b>Employees</b></label> 

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Emp-ID</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Basic Salary</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($employee = mysqli_fetch_assoc($result)) {
                                            $empid=$employee['empid'];
                                            $basic_salary=$employee['basic_salary'];

                                            echo "<tr>";
                                            echo "<td>".$empid."</td>";
                                            echo "<td><img src='images/emp-photos/".$employee['photo']."' height = 70px width = 70px></td>";
                                            echo "<td>".$employee['title']." ".$employee['firstname']." ".$employee['lastname']."</td>";                                       
                                            echo "<td>".$basic_salary."</td>";
            
                                            $sql1 = "SELECT * FROM `monthly_payment` WHERE empid='$empid' and month_year='$month' limit 1";
                                            $resultx = mysqli_query($conn, $sql1);

                                            if (mysqli_num_rows($resultx) > 0) {  
                                                echo "<td> Calculated </td>";
                                                if ($_SESSION['usertype']=='hr') {
                                                    echo "<td>  <input type='button' class='btn btn-info' name='calculator-btn' id='calculate' value='Calculate' disabled>
                                                        <a href='a_view_salarySlip.php?eid=$empid&month=$month'>"."<input type='button' class='btn btn-success' name='viewcalculator-btn' value='View'></a>  </td>";       
                                                        
                                                   /* echo "<td> <a href='hr_salary_delete.php?del_eid=$empid&month=$month' onClick=\"return confirm('Are you sure you want to delete?')\">"."<input type='button' class='btn btn-danger' name='deletecalculator-btn' value='Delete'></a>"."</td>"; */
                                                }
                                                if ($_SESSION['usertype']=='admin') {
                                                     echo "<td> <a href='admin.php?pg=a_view_salarySlip.php&eid=$empid&month=$month'>"."<input type='button' class='btn btn-success' name='viewcalculator-btn' value='View'></a>"."</td>";    
                                                }

                                            } 
                                            else{
                                                echo "<td> Not Calculated </td>";
                                                if ($_SESSION['usertype']=='hr') {
                                                    echo "<td>"."<a href='hr_monthly_calculator.php?eid=$empid&month=$month'>"."<input type='button' id='calculate' class='btn btn-info' name='calculator-btn' value='Calculate'></a>"."</td>"; 
                                                }
                                                if ($_SESSION['usertype']=='admin') {
                                                    echo "<td><input type='button' class='btn btn-success' name='calculator-btn' id='calculate' value='View' disabled> </td>";
                                                } 
                                            }                                                
                                        }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </body>
</html>

