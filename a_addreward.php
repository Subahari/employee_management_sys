<?php 
include 'controllers/authController.php'?>

<?php

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
  header('location: index.php');
}

$sql1 = "SELECT * from `emp_registration` ORDER BY empid ASC" ;
$result1 = mysqli_query($conn, $sql1);
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
        <title>Add Reward
        </title>  
</head>

<body style="background-image: url('images/bg-images/r5.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  
  <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
    <div class="wrapper wrapper--w780 ">
        <div class="card card-1"  style="background: transparent;">
            <div class="card-heading"></div>
            <div class="card-body">
              
                <form class="row g-3 needs-validation" action="a_regreward.php" method="post" name="add-loan-form" enctype="multipart/form-data">
                    <h2 class="title" style="color: white;">Add Reward</h2>
                
                    <!-- Reward Title input -->
                    <div class="form-floating mb-2 col-md-12">  
                        <input type="text" class="form-control" name="RewardTitle" id="floatingInput" placeholder="RewardTitle" required /> 
                        <label for="floatingInput" class="form-label">RewardTitle</label>                   
                        <div class="valid-feedback">Looks good!</div>                 
                    </div>

                          <!-- Employee Name input -->
                          <div class="form-floating mb-2 col-md-12">
                          <select class="form-select" name="fullname" id="EmployeeName"  aria-label="Floating label select">                    
                            <?php 
                               while ($employee = mysqli_fetch_assoc($result1)) {                                        
                                    $empid=$employee['empid'];
                                    $fname=$employee['firstname'];
                                    $lname=$employee['lastname'];
                                    $fullname=$fname." ".$lname;                
                                    echo '<option  value="'.$fullname.'">'.$fullname.' </option>';                      
                                 }
                            ?>
                        </select>
                        <label for="floatingSelect" class="form-label">Employee Name</label>   
                    </div>

                    <!-- Year -->
                    <div class="form-floating mb-2 col-md-12">
                          <select class="form-select" name="Year" id="floatingSelect" aria-label="Floating label select">
                          <option selected disabled>Choose...</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>

                          </select>
                          <label for="floatingSelect" class="form-label">Year</label>                   
                    </div>



                    <!-- Reward Type input -->
                    <div class="form-floating mb-2 col-md-12">
                          <select class="form-select" name="RewardType" id="floatingSelect" aria-label="Floating label select">
                          <option selected disabled>Choose...</option>
                            <option value="Bronze">Bronze</option>
                            <option value="Silver">Silver</option>
                            <option value="Gold">Gold</option>
                            <option value="Platinum">Platinum</option>
                            <option value="Diamond">Diamond</option>
                            

                          </select>
                          <label for="floatingSelect" class="form-label">Reward Type</label>                   
                    </div>

              

                    <!-- Current Date input -->
                    <!--div class="form-floating mb-2 col-md-12">
                          <input type="date" class="form-control" name="DeadLine" id="floatingInput"placeholder="mm/dd/yyyy" required/>
                          <label for="floatingInput" class="form-label">Current Date</label>
                          <div class="valid-feedback">Looks good!</div>
                      </div-->    




                      <!-- Project Documentation upload --> 
                      
                      <!--div class="form-floating mb-2 col-md-12">
                          <div class="input-group form-floating">
                              <span class="input-group-text col-auto">Project Document</span>
                              <input type="file" class="form-control" name="ProjectDocument" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" aria-label="Upload" required>
                              <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon01">Upload</button>
                          </div>
                      </div-->




                    <div class="col-6  d-flex justify-content-center mb-2">
                      <button type="submit" class="btn btn-primary" name="Assign">SUBMIT</button>
                    </div>

                    <div class="col-6  d-flex justify-content-center mb-2">
                      <button type="reset" class="btn btn-primary" name="reset-btn">RESET</button>
                    </div>
                </form>
              
            </div>
        </div>
    </div>
</div>


<?php
/*
    $pdoc=$_FILES['ProjectDocument'];
    $pdoc_name = $_FILES['pdoc']['name'];
    $pdoc_extension = pathinfo($pdoc_name, PATHINFO_EXTENSION);
    $pdoc_tempname = $_FILES["pdoc"]["tmp_name"];               
   
    $new_pdocname =  rand(1,1000)."-".$fullname.".".$pdoc_extension;
    $final_pdocname=str_replace(' ','-',$new_pdocname);      
    $pdoc_folder = "uploads/project-doc/".$final_pdocname;
    
    $num = 1;
    while (file_exists("uploads/project-doc/".$final_pdocname.".".$pdoc_extension)) {
        $p_name = (string)$fullname.$num;
        $final_pdocname = $p_name . "." . $pdoc_extension;
        $num++;
    } 

            if (!in_array($pdoc_extension, ['zip', 'pdf', 'docx','.rar'])) {
                echo "Your CV file extension must be .zip, .pdf, .rar or .docx\n";
            } 
            else{
                $result_pdoc_upload=move_uploaded_file($pdoc_tempname, $pdoc_folder);       
                
                if ($result_pdoc_upload===true)  {
                    echo "Project Documentation uploaded successfully\n";               
                }
                else{
                        echo "Failed to upload Project Documentation ";
                    }
            } 
        */
?>

</body>
</html>

