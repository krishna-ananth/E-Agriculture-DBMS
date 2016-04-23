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
	$qry = 'SELECT * FROM user_farmer WHERE USER_ID = \''.$_SESSION['USER_ID'].'\'';
	
	//Execute query
	$result = mysql_query($qry);
	while($row = mysql_fetch_assoc($result)){
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
		<div class="indent">
		<h2>Edit your profile</h2>
		<h3>Change the required fields and click on save.</h3>
		<h3><a href="profile.php">Back to Profile</a></h3>
		<form name="myForm" action="edit_user.php" method="post"> 
		<table align="center">
		<tr>
		<td><h3>User ID</h3></td></br>
		<td><input type="text" name="user_id" value = '.$row['USER_ID'].' height="20"/></td>
		</tr>
		<tr>
		<td><h3>Name</h3></td></br>
		<td><input type="text" value = '.$row['NAME'].' name="name" height="20"/></td>
		</tr>
		<tr>
		<td><h3>Phone Number</h3></td>
		<td><input type="number" name="phone" value = '.$row['PHONE_NO'].'></td>
		</tr>
		<tr>
		<td><h3>Region</h3></td>
		<td><input type="text" name="region" value = '.$row['REGION'].'></td>
		</tr>
		<tr>
		<td><h3>Residence</h3></td>
		<td><input type="text" name="add" value = '.$row['RESIDENCE'].'></td>
		</tr>
		<tr>
		<td><h3>Plantation Area</h3></td>
		<td><input type="text" name="land" value = '.$row['PLANTATION_LAND'].'></td>
		</tr>
		<tr>
		<td><h3>Type of Farming</h3></td>
		<td><input type="text" name="farm" value = '.$row['TYPE_OF_FARMING'].'></td>
		</tr>
		<tr>
		<td><h3>Password</h3></td>
		<td><input type="password" name="password"></td>
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
 else{
	include('login.php');
	exit();
	}
?>