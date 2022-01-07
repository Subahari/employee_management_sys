
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
	        $RewardTitle = $_POST['RewardTitle'];
            $fullname = $_POST['fullname'];
	        $Year = $_POST['Year'];
	        $RewardType = $_POST['RewardType'];
	       

	        date_default_timezone_set('Asia/Colombo');
    		$CurrentDate=date('Y-m-d H:m:s ', strtotime("now"));
	       	
	       	$query0="SELECT RewardID FROM add_reward ORDER BY RewardID DESC";
		    $result0=mysqli_query($conn,$query0) or die ("Eror find RewardID: ".mysqli_error($conn));
		    if(mysqli_num_rows($result0)>0){
		        $row=mysqli_fetch_assoc($result0);
		        $RewardID=$row['RewardID'];
		        $RewardID=++$RewardID;
		    }
		    else{
		        $RewardID="R001";
		    }
		 
		 	$query1 = "INSERT INTO add_reward(RewardID,RewardTitle,EmployeeName,Year,RewardType,CurrentDate)
		    	VALUES('$RewardID','$RewardTitle','$fullname','$Year', '$RewardType','$CurrentDate')";
		    $result1=$conn->query($query1)  or die($conn ->error);
		    
		    if($result1==true){ 	        
		        echo ("<SCRIPT LANGUAGE='JavaScript'>
		                   window.alert('This new project has been added successfully.');
		                    window.location.href='admin.php?pg=viewreward.php';
		                    </SCRIPT>"); 
		    }
		    else {
		        $_SESSION['error_msg'] = "Database error: Could not add project";
		    } 
		}
	}
?>