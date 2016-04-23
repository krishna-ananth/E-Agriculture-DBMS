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
	$id=$_SESSION['USER_ID'];
	$loan=$_POST['loan'];
	$purpose=$_POST['purpose'];
	$update = 'UPDATE account SET LOAN = \''.$loan.'\'';
	$update = $update . ', PURPOSE = \''.$purpose.'\' WHERE USER_ID = \''.$id.'\'';
	$result = mysql_query($update);
	if($result == FALSE) echo mysql_error() . '<br>'; 
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
		$to = "2011182@iiitdmj.ac.in";
		$subject = "Booking loan";
		$body = "Purpose : ".$_POST["purpose"]."Loan : ".$_POST["loan"];
		$headers = "From: ".$_SESSION["USER_ID"];
		mail($to,$subject,$body,$headers);
		echo "<h3>Your request for booking a loan has been sent to the Admin and you will get a reply as soon as possible.</h3>";
		echo'</div></div></div></body></html>';}
?>