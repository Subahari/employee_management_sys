<?php
	$designation=$_GET['vacancy'];
	
	
	?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Job Application Form</title>
  <script src="bootstrap/js/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  
 
	
	<script src="bootstrap/js/jquery.min.js"></script>



<script src="bootstrap/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
        $('[name="title"]').change(function() {
          if ($(this).val() == "Miss" || $(this).val() == "Mrs") {
            $("#Female").prop("checked", true);
          } else if ($(this).val() == "Mr") {
            $("#Male").prop("checked", true);
          }
        });
    });
  </script>
 
  <script>
$(function() {
    $('#agree').click(function() {
        if ($(this).is(':checked')) {
            $('#submit').removeAttr('disabled');
        } else {
            $('#submit').attr('disabled', 'disabled');
        }
    });
});


</script>
</head>
<style>
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
  font-size:17px;
}
body{
margin:0;
padding:0;
background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(images/Applicationform1.jpg);
background-size:cover;
background-position:center;
font-family:sans-serif;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;
}

.form {
  position: relative;
  margin: 50px auto;
  width: 700px;
  height:1500px;
  padding: 33px 25px 29px;
  background: white;
  border-bottom: 1px solid #c4c4c4;
  border-radius: 5px;
  -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
}
.form:before, .form:after {
  content: '';
  position: absolute;
  bottom: 1px;
  left: 0;
  right: 0;
  height: 10px;
  background: inherit;
  border-bottom: 1px solid #d2d2d2;
  border-radius: 4px;
}
.form:after {
  bottom: 3px;
  border-color: #dcdcdc;
}

.form-title {
  margin: -25px -25px 25px;
  padding: 15px 25px;
  line-height: 35px;
  font-size: 26px;
  font-weight: 300;
  color: #aaa;
  text-align: center;
  text-shadow: 0 1px rgba(255, 255, 255, 0.75);
  background: #f7f7f7;
}



.form-input {
  width: 100%;
  height: 50px;
  margin-bottom: 25px;
  padding: 0 15px 2px;
  font-size: 17px;
  background: white;
  border: 2px solid #ebebeb;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 -2px #ebebeb;
  box-shadow: inset 0 -2px #ebebeb;
}
.form-input:focus {
  border-color: #62c2e4;
  outline: none;
  -webkit-box-shadow: inset 0 -2px #62c2e4;
  box-shadow: inset 0 -2px #62c2e4;
}
.lt-ie9 .form-input {
  line-height: 20px;
}

#submit {
  position: relative;
  vertical-align: top;
  width: 200px;
  height: 35px;
  padding: 0;
  font-size: 22px;
  color: white;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
  background: #f0776c;
  border: 0;
  border-bottom: 2px solid #d76b60;
  border-radius: 5px;
  cursor: pointer;
  -webkit-box-shadow: inset 0 -2px #d76b60;
  box-shadow: inset 0 -2px #d76b60;
  align="center";
}
#submit:active {
  top: 1px;
  outline: none;
  -webkit-box-shadow: none;
  box-shadow: none;
  background-color:green;
  color:black;
}



table {
  border-collapse: collapse;
  border-spacing: 0;
}

.form-title:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 8px;
  background: #c4e17f;
  border-radius: 5px 5px 0 0;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);

}
select option:first-child {
   display:none;
}
  span.astr{
      color: red;
      font-size: 18px;

    }
	
	.dropbtn{
	 background-color: #f44336; /* Red */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  
}


</style>
<body>


<a href="j_openposition.php" class="dropbtn" style="float:right">RETURN BACK</a>
  <form  class="form" action="J_jobApplicant.php" method="POST"  enctype="multipart/form-data" >
    <h1 class="form-title">Job Application Form</h1>
	<h3 class="para">Kindly fill in the details below</h3><br>
	<table>
    <tr>
        <td width="30%" ><p>Position:</p></td>
		<td>
          <input type="text" name="position" class="form-input" value="<?php echo $designation;?>" readonly>
        </td>
      </tr>	 
   
    <tr>
        <td >Title:<span class="astr">*</span></td>
        <td>
            <select id="title" name="title"  class="form-input" required>
                <option value="0" > -- Select Title -- </option>
<option  value='Mr'>Mr</option><option  value='Miss'>Miss</option><option  value='Mrs'>Mrs</option>
            </select></td>
        </tr>
   <tr>
    <td style="text-align:left">First name :<span class="astr">*</span></td>
    <td>
        
            <input type="text" name="fname" class="form-input" pattern="[a-zA-Z][a-zA-Z ]{2,}"required>
        
    </td>
   </tr>
   <tr>
    <td style="text-align:left">Last name :<span class="astr">*</span></td>
    <td>
        <input type="text" name="lname" class="form-input" pattern="[a-zA-Z][a-zA-Z ]{2,}"required>
    </td>
   </tr>
   <tr>
    <td style="text-align:left">NIC number :<span class="astr">*</span></td>
    <td>
        <input type="text" name="nic" pattern="[0-9]{9}[V/v]" class="form-input" placeholder="*********v" required>
    </td>
   </tr>
   <tr>
    <td style="text-align:left" >Date of Birth: </td>
    <td><input type="date" id="birthday" name="birthday" class="form-input"></td>
   </tr>
   <tr>
    <td style="text-align:left" >Gender :<span class="astr">*</span></td>
    <td class="form-input">
        <input type="radio" name="gender" id="Male" value="Male" >Male
        <input type="radio" name="gender" id="Female" value="Female" >Female
    </td>
   </tr>
      <tr>
          <td style="text-align:-webkit-left">Civil status :<span class="astr">*</span></td>
          <td>
              <select name="civil" id="civil"  class="form-input"required>
    <option value="0" > -- Select Civil status -- </option>
	<option value="single" > Single</option>
	<option value="married" > Married</option></select>
          </td>
      </tr>
      <tr>
    <td style="text-align:left"> Permanent Address :<span class="astr">*</span></td>
    <td>
        <input type="text" name="address"  id="address"  class="form-input"required>
    </td>
   </tr>
   <tr>
    <td style="text-align:left">District:<span class="astr">*</span> </td>
    <td>
        <select name="district"  id="district" class="form-input" required>
    <option value="0" > -- Select District -- </option><Option Value="Ampara">Ampara</Option><Option Value="Anuradhapura">Anuradhapura</Option><Option Value="Badulla">Badulla</Option><Option Value="Batticaloa">Batticaloa</Option><Option Value="Colombo">Colombo</Option><Option Value="Galle">Galle</Option><Option Value="Gampaha">Gampaha</Option><Option Value="Hambantota">Hambantota</Option><Option Value="Jaffna">Jaffna</Option><Option Value="Kalutara">Kalutara</Option><Option Value="Kandy">Kandy</Option><Option Value="Kegalle">Kegalle</Option><Option Value="Kilinochchi">Kilinochchi</Option><<Option Value="Kurunegala">Kurunegala</Option><Option Value="Mannar">Mannar</Option><Option Value="Matale">Matale</Option><Option Value="Matara">Matara</Option><Option Value="Monaragala">Monaragala</Option><Option Value="Mullaitivu">Mullaitivu</Option><Option Value="Nuwara-Eliya">Nuwara-Eliya</Option><Option Value="Polonnaruwa">Polonnaruwa</Option><Option Value="Puttalam">Puttalam</Option><Option Value="Ratnapura">Ratnapura</Option><Option Value="Trincomalee">Trincomalee</Option><Option Value="Vavuniya">Vavuniya</Option>
    </select>
    </td>
  </tr>

     
   <tr>
    <td style="text-align:left">Phone No : <span class="astr">*</span></td>
    <td>
        
            <input type="tel" name="phone"  id="phone"placeholder="12345678"  class="form-input"pattern="[0-9]{10}" required>
        
    </td>
   </tr>
   <tr>
    <td style="text-align:left">Email : <span class="astr">*</span></td>
    <td>
        
            <input type="email" name="email"  id="email" placeholder="name@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
 class="form-input"  required>
        
    </td>
   </tr>
   <tr>
    <td style="text-align:left">Qualification: <span class="astr">*</span></td>
    <td>
        <select name="qualification"   class="form-input"required>
        <option value="0" > -- Select Qualification -- </option>
          <option value="O/L">O/L</option>
          <option value="A/L">A/L</option>
          <option value="Diploma">Diploma</option>
          <option value="Undergraduate">Undergraduate</option>
          <option value="Postgraduate">Postgraduate</option>
          <option value="graduate">Graduate</option>
    </select>
    </td>
  </tr>
   <tr>
    <td style="text-align:left">Additional Qualification:</td>
    <td>
        <input type="text" name="adqualification"   class="form-input">
    </td>
   </tr>
   <tr>
    <td style="text-align:left">Work Experience :</td>
    <td>
        <input type="text" name="workexp"  class="form-input" >
    </td>
   </tr>
   <tr>
    <td style="text-align:left">Photograph: <span class="astr">*</span></td>
	<td></td>
	</tr>
	<tr><td style="text-align:left" valign="top" forcolor="white"><b>(Not Mandatory)</b></td>
    <td><input type="file"  name="photo" class="form-input"></td>
   </tr>
   <tr>
    <td style="text-align:-moz-left">Add your CV:</td>
	<td></td>
	</tr>
	<tr><td style="text-align:-webkit-left" valign="top" forcolor="white"><b>(Not Mandatory)</b></td>
   <td><input type="file"  name="doc"    class="form-input" ></td>
   </tr>
  
	<tr>
     <td style="text-align:left" colspan="2" ><input type="checkbox" name="checkbox" value="check" id="agree" /> I hereby declare that the information given above is true</td>

    </tr>
        <tr></tr>
	<tr>
	<td></td>
	<td style="text-align:justify-all"><input type="submit" value="Submit" name="submit" id="submit"   disabled="disabled" ></td>
   </tr>
  </form>
</table>
 
</body>
</html>