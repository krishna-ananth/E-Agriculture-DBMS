<?php
//Start the session to see if the user is authenticated user. 
session_start(); //Check if the session variable for user authentication is set, if not redirect to login page.
echo'<html>
<head>
<title>Profile | E-Agriculture</title>
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
  <div id="content"><div class="inner_copy"></div>
    <div class="indent1">
      <div class="indent">';
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
	$qry = 'SELECT * FROM user_farmer WHERE USER_ID = \''.$_SESSION['USER_ID'].'\'';
    $qryact = 'SELECT * FROM account WHERE USER_ID = \''.$_SESSION['USER_ID'].'\'';

	//Execute query
	$result = mysql_query($qry);
	$resultact = mysql_query($qryact);
	
	echo '<h2>'.$_SESSION['USER_ID'].' Profile</h2><br><br>';
	
	if($result)
	{
	echo '<a href="loan.php"><h3>Book a Loan</h3></a>';
	echo '<a href="edit.php"><h3>Edit Account Details<h3></a>';
	echo '<a href="log_out.php"><h3>Log Out</h3></a><br><br>';
	}
	
	echo'<table width="300" align="center" cellpadding="5" cellspacing="0">';
	while ($row = mysql_fetch_assoc($result))
	{
	echo'<tr>
	<td><h3>User Id		<h3></td>
	<td><h3>'.$row['USER_ID'].'</h3></td>
	</tr>
	<tr>
	<td><h3>Name	</h3></td>
	<td><h3>'.$row['NAME'].'</h3></td>
	</tr>
	<tr>
	<td><h3>Phone number </h3></td>
	<td><h3>'.$row['PHONE_NO'].'</h3></td>
	</tr>
	<tr>
	<td><h3>Region </h3></td>
	<td><h3>'.$row['REGION'].'</h3></td>
	</tr>
	<tr>
	<td><h3>Residence </h3></td>
	<td><h3>'.$row['RESIDENCE'].'</h3></td>
	</tr>
	<tr>
	<td><h3>Plantation Land </h3></td>
	<td><h3>'.$row['PLANTATION_LAND'].'</h3></td>
	</tr>
	<tr>
	<td><h3>Type of Farming </h3></td>
	<td><h3>'.$row['TYPE_OF_FARMING'].'</h3></td>
	</tr>';
	}
	if($resultact)
	{
	while($rowact = mysql_fetch_assoc($resultact))
	echo '<tr>
	<td><h3>Bank</h3></td>
	<td><h3>'.$rowact['BANK'].'</h3></td>
	</tr>
	<tr>
	<td><h3>Account Number</h3></td>
	<td><h3>'.$rowact['ACCOUNT_NO'].'<h3></td>
	</tr>
	<tr>
	<td><h3>Credit Limit</h3></td>
	<td><h3>'.$rowact['CREDIT_LIMIT'].'</h3></td>
	</tr>';
	echo '</table>';
	}
	
	else
		echo '</table>';
	
	exit();
}

else{
	header('location:login.php');
	exit();
	}
?>