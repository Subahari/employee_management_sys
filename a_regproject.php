
<?php
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "emp-management-sys";

	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

	if ($conn->connect_error) {
	    die('Could not connect to the database.');
	}
	else{
		if (isset($_POST['Assign'])) { 
	        $ProjectName = $_POST['ProjectName'];
	        $ProjectType = $_POST['ProjectType'];
	        $Team=implode(',', $_POST['Team']);
	        $DescriptionComments = $_POST['DescriptionComments'];
	        $DeadLine = $_POST['DeadLine'];

	        date_default_timezone_set('Asia/Colombo');
    		$AssignDate=date('Y-m-d H:m:s ', strtotime("now"));
	       	
	       	$query0="SELECT ProjectID FROM assign_project ORDER BY ProjectID DESC";
		    $result0=mysqli_query($conn,$query0) or die ("Eror find ProjectID: ".mysqli_error($conn));
		    if(mysqli_num_rows($result0)>0){
		        $row=mysqli_fetch_assoc($result0);
		        $ProjectID=$row['ProjectID'];
		        $ProjectID=++$ProjectID;
		    }
		    else{
		        $ProjectID="P001";
		    }
		 
		 	$query1 = "INSERT INTO assign_project(ProjectID,ProjectName,ProjectType,TeamMembers,DescriptionComments,Deadline,AssignDate)
		    	VALUES('$ProjectID','$ProjectName','$ProjectType','$Team', '$DescriptionComments','$DeadLine','$AssignDate')";
		    $result1=$conn->query($query1)  or die($conn ->error);
		    
		    if($result1==true){ 	        
		        echo ("<SCRIPT LANGUAGE='JavaScript'>
		                   window.alert('This new project has been added successfully.');
		                    window.location.href='admin.php?pg=viewproject.php';
		                    </SCRIPT>"); 
		    }
		    else {
		        $_SESSION['error_msg'] = "Database error: Could not add project";
		    } 
		}
	}
?>