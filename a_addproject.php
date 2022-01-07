<?php 
include 'controllers/authController.php'?>

<?php
// redirect user to login page if they're not logged in

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
        <title>Add Project</title>  
</head>

<body style="background-image: url('images/c3.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  
  <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;">
    <div class="wrapper wrapper--w780 ">
        <div class="card card-1"  style="background: transparent;">
            <div class="card-heading"></div>
            <div class="card-body">
              
                <form class="row g-3 needs-validation" action="a_regproject.php" method="post" name="add-loan-form" enctype="multipart/form-data">
                    <h2 class="title">Add Project</h2>
                
                    <!-- Project Name input -->
                    <div class="form-floating mb-2 col-md-12">  
                        <input type="text" class="form-control" name="ProjectName" id="floatingInput" placeholder="Project Name" required /> 
                        <label for="floatingInput" class="form-label">Project Name</label>                   
                        <div class="valid-feedback">Looks good!</div>                 
                    </div>

                    <!-- Project Type input -->
                    <div class="form-floating mb-2 col-md-12">
                          <select class="form-select" name="ProjectType" id="floatingSelect" aria-label="Floating label select">
                          <option selected disabled>Choose...</option>
                            <option value="Web development with HTML/CSS">Web development with HTML/CSS</option>
                            <option value="Mobile application development">Mobile application development</option>
                            <option value="UI/Ux Design">UI/Ux Design</option>
                            <option value="Data entry">Data entry</option>
                            <option value="Others">Others</option>
                          </select>
                          <label for="floatingSelect" class="form-label">Project Type</label>                   
                    </div>

                    <!-- Team Members input -->
                    <div class="form-floating mb-2 col-md-12">
                          <select class="form-select" name="Team[]" id="team" multiple aria-label="Floating label select" style="height: 100px">                    
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
                        <label for="floatingSelect" class="form-label">Team Members</label>   
                    </div>

                    <!-- Description input -->
                    <div class="form-floating mb-2 col-md-12">
                          <textarea class="form-control" name="DescriptionComments" placeholder="DescriptionComments" id="floatingTextarea2" style="height: 100px"></textarea>
                          <label for="floatingTextarea2">Description</label>
                          <div class="valid-feedback">Please provide a additional information.</div>
                      </div>

                    <!-- DeadLine input -->
                    <div class="form-floating mb-2 col-md-12">
                          <input type="date" class="form-control" name="DeadLine" id="floatingInput"placeholder="mm/dd/yyyy" required/>
                          <label for="floatingInput" class="form-label">Deadline</label>
                          <div class="valid-feedback">Looks good!</div>
                      </div>    




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

