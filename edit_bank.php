<?php
//Start the session to see if the user is authenticated user. 
	session_start();
	//Check if the user is authenticated first. Or else redirect to login page 
	if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
	//Connect to mysql server
	$link = mysql_connect('localhost', 'root', '');
	//Check link to the mysql server
	if(!$link){
        die('Failed to connect to server: ' . mysql_error());
	}
	//Select database
	$db = mysql_select_db('farmer_database');
		if(!$db){
			die("Unable to select database");
		}
	//Create query
	$qry = 'SELECT * FROM account WHERE USER_ID = \''.$_SESSION['USER_ID'].'\'';
	echo'<html>
	<head>
	<title>Book Loan | E-Agriculture</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
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
	</div><!-- content -->
	<div id="content">
		<div class="indent1">';
		
	//Execute query
	$result = mysql_query($qry);
	if($result){
	while($row=mysql_fetch_assoc($result)){
   echo'<h2>Edit bank account details for '.$row['USER_ID'].'</h2>
		<h3>Change the required fields and click on save.</h3>
		<h3><a href="profile.php">Back to Profile</a></h3>
		<form name="myForm" action="edit_bank_save.php" method="post"> 
		<table align="center">
		<tr>
		<td><h3>Account Number</h3></td></br>
		<td><input type="text" value = '.$row['ACCOUNT_NO'].' name="ac_no" height="20"/></td>
		</tr>
		<tr>
		<td><h3>Credit Limit</h3></td>
		<td><input type="text" name="credit_limit" value = '.$row['CREDIT_LIMIT'].'></td>
		</tr>
		<tr>
		<td><h3>Bank</h3></td>
		<td><input type="text" name="bank" value = '.$row['BANK'].'></td>
		</tr>
		<tr>
		<td colspan="2" align="center">
		<input type="submit" value="Save"> </td>
		</tr>
		</table>
		</div>
		</div>
		</div>
		</body>
		</html>';
	}
	}	
}
?>