
<?php include 'controllers/authController.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (($_SESSION['usertype']=='emp')) {
  header('location: index.php');
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
        <title>Salary Calculation</title>    
    </head>

    <body style="background-image: url('images/c15.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">
    <?php
        if ($_SESSION['usertype']=='hr') {
            include "hr_emp_header.php";
        }

        else if ($_SESSION['usertype']=='admin'){ ?>
                <style type="text/css">
                    .wrapper{
                        margin-left: 300px;
                    }
                </style>
            <?php }
        
    ?>
        <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
            <div class="wrapper wrapper--w1200" style="max-width: 1200px;">
        
                <div class="card card-1"  style="background: transparent;">
                    <div class="card-heading"></div>
                    <div class="card-body">
                            
                            <h2 class="title"><u>Salary Calculation</u></h2><br><br>

                                 
                            <form action="hr_salary_add.php" method="POST">     
                                <!-- Month input -->
                                <div class="row justify-content-center">                        
                                    <div class="form-floating mb-3 col-md-4">  
                                        <input type="month" min="2018-01" class="form-control" name="month" id="month" placeholder="Month" required/> 
                                        <label for="floatingInput" class="form-label"> Month</label>                   
                                        <div class="valid-feedback">Looks good!</div>                 
                                    </div> 
                                </div>                           

                                <!-- Submit button -->
                                <div class="row justify-content-center">                        
                                    <div class="col-md-4">                                   
                                    <button class='btn btn-primary btn-sm' name='month-btn' onchange="showdetails();"> Submit</button>
                                </div>
                                
                            <form>
                            <br>

                    </div>
                </div>
            </div>
        </div>      

    </body>
</html>

