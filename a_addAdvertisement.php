<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','emp-management-sys');
 $subject = $_POST['subject'];
    $description = $_POST['description'];


// database insert SQL code
$sql = "INSERT INTO `external_advertisement` (`id`, `subject`, `description`) VALUES ('0', '$subject', '$description')";

// insert in database 
$rs = mysqli_query($con, $sql);

 if (!in_array($pextension, ['jpg', 'jpeg', 'png'])) {
                echo "Your image file extension must be .jpg, .jpeg or .png\n";
            } 
            else{
                $result_photo_upload=move_uploaded_file($tempname, $folder);
                
                if ($result_photo_upload===true)  {
                    echo "Image uploaded successfully";
                }else{
                    echo "Failed to upload image\n";           
                }
            }

if($rs)
{
	
			 echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('You have Inserted Advertisement Successfully!!,Add Another Advertisement.')
            window.location.href='admin.php?pg=a_addAdvertisementhtml.php';
            </SCRIPT>");

}

?>
    