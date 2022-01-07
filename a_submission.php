

<?php
	$prid=$_GET['pid'];
	
	
	?>
	<?php require_once ('controllers/authController.php'); ?>

<?php 

if (empty($_SESSION['id'])) {
    header('location: login.php');
}
?>


<?php 
//include 'controllers/authController.php'?>

<?php
// redirect user to login page if they're not logged in
/*
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
  header('location: index.php');
}

*/


        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "emp-management-sys";

        $mysqli = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        $pid=$_GET['pid'];
        $result=$mysqli->query("SELECT ProjectID,ProjectName,ProjectType,TeamMembers,DescriptionComments,DeadLine,AssignDate from assign_project where ProjectID='$pid'") or die($mysqli->error);
/**$sql1 = "SELECT * from `assign_project` where ProjectID='$pid' ASC" ;
$results1 = mysqli_query($conn, $sql1);**/
while($row=$result->fetch_assoc()) { 
    $ProjectID=$row['ProjectID'];  
    $ProjectName=$row['ProjectName'];
    $DeadLine=$row['DeadLine'];
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
        <title>Project Submission</title>  
</head>

<body style="background-image: url('images/c8.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: left; background-attachment: fixed;">  
   <?php
        if ($_SESSION['usertype']=='hr' || $_SESSION['usertype']=='emp' ) {
            include "hr_emp_header.php";
        }
    ?>  
  
  <div class="content-wrapper p-t-100 p-b-100 font-robo" style="text-align:center;margin:75px 10px; opacity:0.95;">
    <div class="wrapper wrapper--w780 ">
        <div class="card card-1"  style="background: transparent;">
            <div class="card-heading"></div>
            <div class="card-body">
              
                <form class="row g-3 needs-validation" action="a_regprojectsubmission.php" method="post" name="add-loan-form" enctype="multipart/form-data">
                    <h2 class="title">Project Submission</h2>


                     <!-- ProjectID input -->
                     <div class="form-floating mb-2 col-md-12">
                       
                        <input type="text" class="form-control" name=" ProjectID" id="floatingInput" placeholder=" ProjectID" value="<?php echo $prid;?>" readonly>
                        <label for="floatingInput" class="form-label">ProjectID</label>                   
                        <div class="valid-feedback">Looks good!</div>                 
                    
                         
                    </div>



                     <!-- ProjectName input -->
                     <div class="form-floating mb-2 col-md-12">
                      
                        <input type="text" class="form-control" name="ProjectName" id="floatingInput" placeholder="ProjectName" value="<?php echo $ProjectName;?>" readonly
 required /> 
                        <label for="floatingInput" class="form-label">ProjectName</label>                   
                        <div class="valid-feedback">Looks good!</div>                 
                    
                          
                    </div>

                      
                    

                   
                    <!-- DeadLine input -->
                    <div class="form-floating mb-2 col-md-12">
                    <input type="text" class="form-control" name="Deadline" id="floatingInput" placeholder="DeadLine" value="<?php echo $DeadLine;?>" readonly
 required /> 
                          <label for="floatingInput" class="form-label">Deadline</label>
                          <div class="valid-feedback">Looks good!</div>
                      </div>    




                      <!-- Project Documentation upload --> 
                      
                      <div class="form-floating mb-2 col-md-12">
                          <div class="input-group form-floating">
                              <span class="input-group-text col-auto">Project Submission</span>
                              <input type="file" class="form-control" name="doc" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" aria-label="Upload" required>
                              <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon01">Upload</button>
                          </div>
                      </div>




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

