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


?>


<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Post Open Vacanices</title>
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	

  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->


 
</head>
<!--style-->
<style>
.sign-up {
 
  width: 500px;
  height:650px;
  
}
body{
margin:0;
padding:0;
background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(images/home4.jpg);
background-size:cover;
background-position:center;
font-family:sans-serif;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;
}

select option:first-child {
   display:none;
}

</style>

<!--body-->
<body>

<!--form-->
  <form class="sign-up" action="a_add_vacancy.php"  method="POST"  enctype="multipart/form-data" >
    <h1 class="sign-up-title">Post Open Vacanices</h1>
	<table>
	


      <tr>
        <td >Designation</td>
        <td>
          <select name="designation" class="sign-up-input" required>
			<option value=""> -- Select designation -- </option>
            <option value="Senior Developer">Senior Developer</option>
            <option value="Software Engineer Backend">Software Engineer Backend</option>
            <option value="IT support Executive">IT support Executive</option>
            <option value="Front End Developer">Front End Developer</option>
            <option value="UI Designer">UI Designer</option>
			<option value="Android &IOS App Developers">Android & IOS App Developers</option>
			<option value="DOT NET,ANGULARJS & MVC">DOT NET,ANGULARJS & MVC</option>
			<option value="IT HARDWARE,TECHNICAL SUPPORT">IT HARDWARE,TECHNICAL SUPPORT</option>
			<option value="DOT NET,MVC & JQUERY">DOT NET,MVC & JQUERY</option>
          </select>
        </td>
      </tr>


      <tr>
        <td >Experience</td>
        <td>
          <select name="experience" class="sign-up-input" required>
		  <option value=""> -- Select Experience -- </option>
		  <option value="Fresher">Fresher</option>
            <option value="0-1 Year">0-1 Year</option>
            <option value="More than 1 year">More than 1 year</option>

          </select>
        </td>
      </tr>

      <tr>
        <td >Qualification :</td>
        <td><input type="text" name="qualification" placeholder="Expected Qualification"  class="sign-up-input" pattern="[a-zA-Z][a-zA-Z ]{2,}"required></td>
      </tr>

      <tr>
        <td >JobType</td>
        <td>
          <select name="jobtype" class="sign-up-input"required>
		  <option value="" > -- Select JobType -- </option>
		  <option value="FullTime">FullTime</option>
            <option value="PartTime">PartTime</option>
          </select>
        </td>
      </tr>


      <tr>
        <td >ClosingDate</td>
        <td><input type="date" id="closingdate" name="closingdate" class="sign-up-input" required></td>
      </tr>


      <tr>
        <td > For more details(ContactNo)</td>
        <td>
          <input type="text" name="contact"  class="sign-up-input"  placeholder="1234567895"pattern="[0-9]{10}"  required>
        </td>
      </tr>

      <tr>
        <td></td>
        <td><input type="submit" value="Submit" name="submit" id="submit"></td>
      </tr>

    
  </form>
</table>
<!--script-->
<script>
    $(function(){
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();

        var minDate= year + '-' + month + '-' + day;

        $('#closingdate').attr('min', minDate);
    });
</script>
 
</body>
</html>


