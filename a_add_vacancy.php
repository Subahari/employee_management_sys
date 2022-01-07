<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['designation']) &&
        isset($_POST['experience']) && isset($_POST['qualification']) &&
        isset($_POST['jobtype']) && isset($_POST['closingdate']) &&
        isset($_POST['contact'])) {
        
        
        $designation = $_POST['designation'];
        $experience = $_POST['experience'];
        $qualification = $_POST['qualification'];
        $jobtype = $_POST['jobtype'];
        $closingdate = $_POST['closingdate'];
        $contact = $_POST['contact'];


        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "emp-management-sys";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT designation FROM vacany_add WHERE designation = ? LIMIT 1";
            $Insert = "INSERT INTO vacany_add(dateposted,designation,experience,qualification,jobtype,closingdate,contact) values(?, ?, ?, ?, ?, ?, ? )";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $designation);
            $stmt->execute();
            $stmt->bind_result($designation);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssssi",$dateposted,$designation,$experience,$qualification,$jobtype,$closingdate,$contact);
                if ($stmt->execute()) {
				
					
						
						 echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Successfully inserted $designation  details,Add Other open positions')
            window.location.href='a_add_vacancyhtml.php';
            </SCRIPT>");
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already inserted this details.";
				
							 echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('You already inserted $designation  details,Add Other open positions')
            window.location.href='a_add_vacancyhtml.php';
            </SCRIPT>");
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        
					 echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('All Fields are Required')
            window.location.href='a_add_vacancyhtml.php';
            </SCRIPT>");
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>