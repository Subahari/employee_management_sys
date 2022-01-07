


<?php
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

    $photo = $_FILES['photo'];
    $photoname = $_FILES['photo']['name'];
    $tempname = $_FILES["photo"]["tmp_name"]; 
    $pextension = pathinfo($photoname, PATHINFO_EXTENSION);
    $empphoto=rand(1,1000)."-".$fullname.".".$pextension;
    $folder = "jopapplicant/images/".$empphoto;

    
    $cv=$_FILES['cv'];
    $cvname = $_FILES['cv']['name'];
    $cvtempname = $_FILES["cv"]["tmp_name"]; 
    $cvextension = pathinfo($cvname, PATHINFO_EXTENSION);                 
    //$file = rand(1,1000)."-".$_FILES['cv']['name'];
    $new_cvname =  rand(1,1000)."-".$fullname.".".$cvextension;
    $final_cvname=str_replace(' ','-',$new_cvname);      
    $cvfolder = "jopapplicant/CV/".$final_cvname;
	


        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "emp-management-sys";

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
                $stmt->bind_param("ssssssssssissssss",$position,$title, $fname, $lname, $nic, $birthday, $gender,$civil, $address, $district, $phone, $email, $qualification, $adqualification, $workexp,$empphoto,$final_cvname);
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
}
?>