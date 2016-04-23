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
	
	//Execute query
	$result = mysql_query($qry);
	echo'<html>
	<head>
	<title>Edit Profile | E-Agriculture</title>
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

	</div>
	<!-- content -->
	<div id="content"><div class="inner_copy"></div>
		<div class="indent1">
		<div class="indent">';

	if($result){
		while($row = mysql_fetch_assoc($result)){
		echo'<form action="book.php" method="post">';
		echo'<table align="center">
		<tr>
		<td><h3>Credit Limit</h3></td>
		<td><h3>'.$row['CREDIT_LIMIT'].'</h3></td>
		</tr>
		<tr>
		<td><h3>Loan amount</h3></td>
		<td><input type="number" name="loan"/></td>
		</tr>
		<td><h3>Purpose</h3></td>
		<td><input type="text" name="purpose"/></td>
		</tr>
		<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"</td>
		</tr>
		</table>
		</form>';
		}
	}
	echo'<br><br><h3><a href="edit_bank.php">Edit bank details</a></h3>';
	echo'<h3><a href="profile.php">Back to Profile</a></h3>';
}
?>