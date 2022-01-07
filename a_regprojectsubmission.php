<?php
	$host="localhost";
	$dbusername="root";
	$dbPassword="";
	$dbname="emp-management-sys";

	$conn=new mysqli($host,$dbusername,$dbPassword,$dbname);
	
	$errors = [];
	$msg="";

    if (isset($_POST['ProjectID'])&& isset($_POST['ProjectName']) && isset($_POST['Deadline']) ) {
        $doc="";
		$ProjectID = $_POST['ProjectID'];
        $ProjectName = $_POST['ProjectName'];    
        $Deadline = $_POST['Deadline'];  
	

	
	$doc=$_FILES['doc'];
    $docname = $_FILES['doc']['name'];
    $docextension = pathinfo($docname, PATHINFO_EXTENSION);
    $docextension = pathinfo($docname, PATHINFO_EXTENSION);
    $doctempname = $_FILES["doc"]["tmp_name"];               
    $new_docname = $ProjectName.".".$docextension;
    $final_docname=str_replace(' ','-',$new_docname);      
    $docfolder = "project_doc/".$final_docname;
	
	
	/*
	$doc=$_FILES['doc'];
    $docname = $_FILES['doc']['name'];
    $doctempname = $_FILES["doc"]["tmp_name"]; 
    $docextension = pathinfo($docname, PATHINFO_EXTENSION);                 
    //$file = rand(1,1000)."-".$_FILES['doc']['name'];
    $new_docname =  rand(1,1000)."-".$ProjectName.".".$docextension;
    $final_docname=str_replace(' ','-',$new_docname);      
    $docfolder = "uploads/emp-cv/".$final_docname;
	*/
	
	
// Check if nic already exists
    $sql = "SELECT * FROM  project_submission WHERE ProjectID='$ProjectID' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
		 $errors['nic' &&'position'] = "nic already exists";
        	echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('$ProjectID!!!!,You Already Submitted that project')
            window.location.href='j_openposition.php';
            </SCRIPT>");
    }

    else if (count($errors) === 0) 
    {
		$query1 = "INSERT INTO project_submission(ProjectID,ProjectName, Deadline, doc)VALUES('$ProjectID','$ProjectName','$Deadline','$final_docname')";
		$result1=$conn->query($query1)  or die($conn ->error);
		
		if($result1==true){ 
            
        
						
						 echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('You have Successfully submitted $ProjectName project!')
            window.location.href='viewproject.php';
            </SCRIPT>");
						
			if (!in_array($docextension, ['zip', 'pdf', 'docx','rar'])) {
                echo "Your Doc file extension must be .zip, .pdf, .rar or .docx\n";
            } 
            else{
                $result_doc_upload=move_uploaded_file($doctempname, $docfolder);       
                
                if ($result_doc_upload==true)  {
                    echo "Document uploaded successfully\n";               
                }
                else{
                        echo "Failed to upload Document";
                    }
            }
		}
		else{
            echo "<script type='text/javascript'>window.alert('Error while submitting project record') </script>";		
        }
	}		
		
    else {
        $_SESSION['error_msg'] = "Database error: Could not register job application";
    }
    
}
else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('All field are required!!!')
            window.location.href='a_submission.php';
            </SCRIPT>");
        die();
    }

