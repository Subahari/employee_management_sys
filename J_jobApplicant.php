


<?php
$host="localhost";
	$dbusername="root";
	$dbPassword="";
	$dbname="emp-management-sys";

	$conn=new mysqli($host,$dbusername,$dbPassword,$dbname);
	
	$errors = [];
	$msg="";
if (isset($_POST['submit'])) {
    if (isset($_POST['position'])&& isset($_POST['title']) && isset($_POST['fname']) &&
        isset($_POST['lname']) && isset($_POST['nic']) &&
        isset($_POST['birthday']) && isset($_POST['gender']) &&
        isset($_POST['civil']) &&isset($_POST['address']) && isset($_POST['district']) &&
        isset($_POST['phone']) && isset($_POST['email']) &&
        isset($_POST['qualification']) && isset($_POST['adqualification']) 
        && isset($_POST['workexp'])) {
        $doc="";
		$position = $_POST['position'];
        $title = $_POST['title'];    
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $nic = $_POST['nic'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
		$civil = $_POST['civil'];
        $address = $_POST['address'];
        $district = $_POST['district'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $qualification = $_POST['qualification'];
        $adqualification = $_POST['adqualification'];
        $workexp = $_POST['workexp'];

        $fullname=$fname."_".$lname;

        $files = $_FILES['photo'];
        $filename = $files['name'];
        $filrerror = $files['error'];
        $filetemp = $files['tmp_name'];
        $fileext = explode('.', $filename);
        $filecheck = strtolower(end($fileext));



$fileextstored = array('png' , 'jpg' , 'jpeg');
$destinationfile = 'jopapplicant/images/'.$filename;

    move_uploaded_file($filetemp, $destinationfile);

    
   
	
	

	
	$doc=$_FILES['doc'];
    $docname = $_FILES['doc']['name'];
    $docextension = pathinfo($docname, PATHINFO_EXTENSION);
    $docextension = pathinfo($docname, PATHINFO_EXTENSION);
    $doctempname = $_FILES["doc"]["tmp_name"];               
    $new_docname = $fullname.".".$docextension;
    $final_docname=str_replace(' ','-',$new_docname);      
    $docfolder = "jopapplicant/CV/".$final_docname;
	
// Check if nic already exists
    $sql = "SELECT * FROM  jobapplication WHERE (nic='$nic' and position='$position')LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
		 $errors['nic' &&'position'] = "nic already exists";
        	echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('$title.$fullname!!!!,You Already Applied for $position through $nic  .  $fname Apply other open Vacanices ..!')
            window.location.href='j_openposition.php';
            </SCRIPT>");
    }

    else if (count($errors) === 0) 
    {
		$query1 = "INSERT INTO jobapplication(position,title, fname, lname, nic, birthday, gender,civilstatus, address, district, phone, email, qualification, adqualification, workexp,photo,cv)VALUES('$position','$title','$fname','$lname','$nic','$birthday','$gender','$civil','$address','$district','$phone','$email','$qualification','$adqualification','$workexp','$empphoto','$final_docname')";
		$result1=$conn->query($query1)  or die($conn ->error);
		
		if($result1==true){ 
            
        
						
						 echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('$title.$fname.$lname!,You have Successfully Registered.  $fname Apply other open Vacanices ..!')
            window.location.href='j_openposition.php';
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
            echo "<script type='text/javascript'>window.alert('Error while adding job application record') </script>";		
        }
	}		
		
    else {
        $_SESSION['error_msg'] = "Database error: Could not register job application";
    }
    
}
else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('All field are required!!!')
            window.location.href='j_jobApplicantformhtml.php';
            </SCRIPT>");
        die();
    }
}
else {
    echo "Submit button is not set";
	 echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Submit button is not set')
            window.location.href='j_openposition.php';
            </SCRIPT>");
}


       /* $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "ems";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT nic,position FROM jobapplication WHERE ((nic = ?) AND (position=?)) LIMIT 1";
            $Insert = "INSERT INTO jobapplication(position,title, fname, lname, nic, birthday, gender,civilstatus, address, district, phone, email, qualification, adqualification, workexp,photo,cv) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("ss", $nic,$position);
            $stmt->execute();
            $stmt->bind_result($resultnic,$resultposition);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssssssssissssss",$position,$title, $fname, $lname, $nic, $birthday, $gender,$civil, $address, $district, $phone, $email, $qualification, $adqualification, $workexp,$destinationfile,$cvfolder);
           }
				
				if ($stmt->execute()) {
                    			 echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('$title.$fname,!,You have Successfully Registered.  $fname Apply other open Vacanices ..!')
            window.location.href='j_openposition.php';
            </SCRIPT>");
			
			
			}
                else {
                    echo $stmt->error;
                }
            }
            else {
				
			echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('$title.$fullname!!!!,You Already Applied for $position through $nic  .  $fname Apply other open Vacanices ..!')
            window.location.href='j_openposition.php';
            </SCRIPT>");
 

 

                
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('All field are required!!!')
            window.location.href='j_jobApplicantformhtml.php';
            </SCRIPT>");
        die();
    }
}
else {
    echo "Submit button is not set";
	 echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Submit button is not set')
            window.location.href='j_openposition.php';
            </SCRIPT>");
}*/
?>