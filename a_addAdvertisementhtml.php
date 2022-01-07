<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title >NOTICE BOARD</title>
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
background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(images/istockphoto-858072142-612x612.jpg);
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
  width: 950px;
  height:260px;
  padding: 33px 25px 29px;
  background: burlywood;
  border-bottom: 10px solid black;
  border-radius: 5px;
  -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
    border-color: black;
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
  width: 100px;
  height: 35px;
  padding: 0;
  font-size: 22px;
  color: white;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
  background: PINK;
  border: 0;
  border-bottom: 2px solid PINK;
  border-radius: 5px;
  cursor: pointer;
  -webkit-box-shadow: inset 0 -2px PINK;
  box-shadow: inset 0 -2px PINK;
}
#submit:active {
  top: 1px;
  outline: none;
  -webkit-box-shadow: none;
  box-shadow: none;
  background-color:RED;
  color:black;
}


#Reset {
  position: relative;
  vertical-align: top;
  width: 100px;
  height: 35px;
  padding: 0;
  font-size: 22px;
  color: white;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
  background: LIGHTGREEN;
  border: 0;
  border-bottom: 2px solid LIGHTGREEN;
  border-radius: 5px;
  cursor: pointer;
  -webkit-box-shadow: inset 0 -2px LIGHTGREEN;
  box-shadow: inset 0 -2px LIGHTGREEN;
}
#Reset:active {
  top: 1px;
  outline: none;
  -webkit-box-shadow: none;
  box-shadow: none;
  background-color:GREEN;
  color:black;
}

:-moz-placeholder {
  color: #ccc;
  font-weight: 300;
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
</style>
<body>
<fieldset>
 
  <form action="a_addAdvertisement.php" method="POST" class="form">
  <h1 class="form-title">Post Advertisement</h1>
   
    <table>
	<tr>
        <td >Subject of the Poster:</td>
        <td><input type="text"   name="subject" class="form-input" required></td>
    </tr>


    <tr>
        <td > Description:</td>
        <td>
          <input type="textarea"   name="description" placeholder="****advertisement details****"   class="form-input"  id="description"required>
        </td>
    </tr>
	
	
	

    <tr>
        <td><input type="reset" value="Reset" name="reset" id="Reset"></td>
        <td><input type="submit" value="Submit" name="submit" id="submit"></td>
     </tr>
	 
	

     

    </table>
  </form>
</fieldset>
</body>
</html>