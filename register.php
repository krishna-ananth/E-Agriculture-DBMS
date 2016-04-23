<html>
<head>
<title>Register | E-Agriculture</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head >
<body>
<div id="main">
  <!-- header -->
  <div id="header">
    <ul class="site-nav">
      <li><a href="home.html">Home</a></li>
      <li><a href="about-us.html">About Us</a></li>
      <li><a href="resources.php">Resources</a></li>
	  <li><a href="login.php">Login</a></li>
	  <li><a href="register.php">Register</a></li>
      <li><a href="contact-us.html">Contact Us</a></li>
      <li><a href="sitemap.html">Site Map</a></li>
    </ul>
    <div class="logo"></div>
  </div>
  <!-- content -->
  <div id="content"><div class="inner_copy"></div>
    <div class="indent1">
      <div class="indent">
		<h2>Registration Form</h2>
		<h3>Please enter the following details.</h3>
		<?php 
		echo'
		<form name="myForm" action="submit.php" method="post"> 
		<table align="center" >
		<tr>
		<td><h3>Choose User ID</h3></td></br>
		<td><input type="text" name="user_id" height="20"/></td>
		</tr>
		<tr>
		<td><h3>Password</h3></td>
		<td><input type="password" name="password"/></td>
		</tr>
		<tr>
		<td><h3>Name</h3></td></br>
		<td><input type="text" name="name" height="20"/></td>
		</tr>
		<tr>
		<td><h3>Phone Number</h3></td>
		<td><input type="number" name="phone"/></td>
		</tr>
		<tr>
		<td><h3>Region</h3></td>
		<td><input type="text" name="region" /></td>
		</tr>
		<tr>
		<td><h3>Residence</h3></td>
		<td><input type="text" name="add" /></td>
		</tr>
		<tr>
		<td><h3>Plantation Area</h3></td>
		<td><input type="text" name="land" /></td>
		</tr>
		<tr>
		<td><h3>Type of Farming</h3></td>
		<td> <input type="text" name="farm" /></td>
		</tr>
		<td><h3>Account Number</h3></td>
		<td><input type="text" name="ac_no" /></td>
		</tr>
		</tr>
		<td><h3>Bank</h3></td>
		<td><input type="text" name="bank" /></td>
		</tr>
		</tr>
		<td><h3>Credit Limit</h3></td>
		<td><input type="text" name="credit_limit" /></td>
		</tr>
		<tr>
		<td colspan="2" align="center">
		<input type="submit" value="submit"> </td>
		</tr>';
		?>
</table>
</form>
</body>
</html>