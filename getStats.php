<?php
 echo'<html>
	<head>
	<title>Resources | E-Agriculture</title>
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
 // CODE TO BE EXECUTED WHEN PESTICIDE 
   if ($_POST['submit'] == 'Herbicide')
 {
	if($_POST['br_id']) 
		{
			//Connect to mysql server
			$link = mysql_connect('localhost', 'root', ''); 
			//Check link to the mysql server
			if(!$link)
			{
				die('Failed to connect to server: ' . mysql_error());
			}
			//Select database
			$db = mysql_select_db('farmer_database');
			if(!$db)
			{
				die("Unable to select database"); 
			}
			//Prepare query 
			$query = 'SELECT BREED_ID,SEASON,NAME,HERBICIDE
			FROM CROPS_VEGETABLE AS C
			JOIN HERBS_T1 AS H
			ON C.BREED_ID=H.BR_ID
			WHERE C.BREED_ID = \''.$_POST['br_id'].'\'';
			//Execute query
			$result = mysql_query($query); 
			echo '<h2> HERBICIDE DETAILS</h2>';
			echo '<table align="center" cellspacing="10"> 
			<tr><td><h3>Breed ID</h3></td> 
			<td><h3>Season</h3></td>
			<td><h3>Name</h3></td>
			<td><h3>Herbicide</h3></td>
			</tr>';
			
			while($row = mysql_fetch_assoc($result))
			{
				echo '<tr><td><h3>'.$row['BREED_ID'].'</h3></td>
				<td><h3>'.$row['SEASON'].'</h3></td> 
				<td><h3>'.$row['NAME'].'</h3></td> 
				<td><h3>'.$row['HERBICIDE'].'</h3></td> 
				</tr>'; 
			}
			echo '</table>'; 
		} 
		else 
		{
			echo'<h3>Resource not available for this Breed ID</h3>';
			include("resources.php");
		}
}
 
 // CODE TO BE EXECUTE WHEN PESTICIDE CLICKED
 if ($_POST['submit'] == 'Pesticide')
 {
	if($_POST['br_id']) 
		{
			//Connect to mysql server
			$link = mysql_connect('localhost', 'root', ''); 
			//Check link to the mysql server
			if(!$link)
			{
				die('Failed to connect to server: ' . mysql_error());
			}
			//Select database
			$db = mysql_select_db('farmer_database');
			if(!$db)
			{
				die("Unable to select database"); 
			}
			//Prepare query 
			$query = 'SELECT BREED_ID,SEASON,NAME,PESTICIDE
			FROM CROPS_VEGETABLE AS C
			JOIN PESTS_T1 AS P
			ON C.BREED_ID=P.BR_ID
			WHERE C.BREED_ID = \''.$_POST['br_id'].'\'';
			//Execute query
			$result = mysql_query($query); 
			echo '<h2> PESTICIDES DETAILS</h2>';
			echo '<table align="center" cellspacing="10"> 
			<tr><td><h3>Breed ID</h3></td> 
			<td><h3>Season</h3></td>
			<td><h3>Name</h3></td>
			<td><h3>Pesticide</h3></td>
			</tr>';
			
			while($row = mysql_fetch_assoc($result))
			{
				echo '<tr><td><h3>'.$row['BREED_ID'].'</h3></td>
				<td><h3>'.$row['SEASON'].'</h3></td> 
				<td><h3>'.$row['NAME'].'</h3></td> 
				<td><h3>'.$row['PESTICIDE'].'</h3></td> 
				</tr>'; 
			}
			echo '</table>'; 
		} 
		else 
		{
			echo'<h3>Resource not available for this Breed ID</h3>';
			include("resources.php");
		}
}

// Code to be executed WHEN 'Get Fertilizer' is clicked. 
 if ($_POST['submit'] == 'Get Fertilizer')
 {
	if($_POST['br_id']) 
		{
			//Connect to mysql server
			$link = mysql_connect('localhost', 'root', ''); 
			//Check link to the mysql server
			if(!$link)
			{
				die('Failed to connect to server: ' . mysql_error());
			}
			//Select database
			$db = mysql_select_db('farmer_database');
			if(!$db)
			{
				die("Unable to select database"); 
			}
			//Prepare query 
			$query = 'SELECT * FROM CROP_FERTILIZERS AS C JOIN FERTILIZERS AS F ON ((C.COMPANY_NM = F.COMPANY_NM) AND (C.FERTILIZER_NM=F.FERTILIZER_NM)) WHERE C.BREED_ID = \''.$_POST['br_id'].'\'';
			//Execute query
			$result = mysql_query($query); 
			echo '<h2> FERTILIZERS DETAILS</h2>';
			echo '<table align="center" cellspacing="10"> 
			<tr><td><h3>Breed ID</h3></td> 
			<td><h3>Company Name</h3></td>
			<td><h3>Fertilizer Name</h3></td>
			<td><h3>Potassium</h3></td>
			<td><h3>Phosphorus</h3></td> 
			<td><h3>Sulphur</h3></td> 
			<td><h3>Nitrogen</h3></td> 
			<td><h3>Cost</h3></td> 
			</tr>';
			
			while($row = mysql_fetch_assoc($result))
			{
				echo '<tr><td><h3>'.$row['BREED_ID'].'</h3></td>
				<td><h3>'.$row['COMPANY_NM'].'</h3></td> 
				<td><h3>'.$row['FERTILIZER_NM'].'</h3></td> 
				<td><h3>'.$row['POTASSIUM'].'</h3></td> 
				<td><h3>'.$row['PHOSPHORUS'].'</h3></td> 
				<td><h3>'.$row['SULPHUR'].'</h3></td>
				<td><h3>'.$row['NITROGEN'].'</h3></td> 
				<td><h3>'.$row['COST'].'</h3></td> 
				</tr>'; 
			}
			echo '</table>'; 
		} 
		else 
		{
			echo'<h3>Resource not available for this Breed ID</h3>';
			include("resources.php");
		}
}
  
// Code to be executed when 'Climate' is clicked.
 if($_POST['submit'] == 'Climate') 
 { 
	if($_POST['br_id'])
	{  
		//Connect to mysql server 
		$link = mysql_connect('localhost', 'root', ''); 
		//Check link to the mysql server 
		if(!$link)
		{
			die('Failed to connect to server: ' . mysql_error()); 
		}
		//Select database
		$db = mysql_select_db('farmer_database'); 
		if(!$db)
		{ 
			die("Unable to select database"); 
		}
		//Prepare query 
		$query = 'SELECT CL.CLIMATE_ZONE,CL.SOIL_COND,CL.ANNUAL_RAINFALL,CL.SEA_LEVEL FROM crops_climate AS C JOIN CLIMATE AS CL ON C.CLIMATE_ZONE = CL.CLIMATE_ZONE WHERE C.BR_ID  = \''.$_POST['br_id'].'\''; 
		//Execute query 
		$result = mysql_query($query); 
		echo '<h2>Climate</h2>';
		echo '<table align="center" cellspacing="10">
		<tr>
		<td><h3>Climate Zone</h3></td> 
		<td><h3>Soil Condition</h3></td> 
		<td><h3>Annual Rainfall</h3></td>
		<td><h3>Sea Level</h3></td></tr>'; 
		while($row = mysql_fetch_array($result))
		{
			echo '<tr><td><h3>'.$row['CLIMATE_ZONE'].'</h3></td> 
			<td><h3>'.$row['ANNUAL_RAINFALL'].'</h3></td>
			<td><h3>'.$row['SOIL_COND'].'</h3></td>
			<td><h3>'.$row['SEA_LEVEL'].'</h3></td></tr>';
		}
		echo '</table>'; 
	}
	else
	{ 
		echo'<h3>Resource not available for this Breed ID</h3>';
		include("resources.php"); 
	}
} 
 // Code to be executed when 'Storage' is clicked.
 if ($_POST['submit'] == 'Storage') 
 { 
	if($_POST['br_id']) 
	{
	//Connect to mysql server 
	$link = mysql_connect('localhost', 'root', ''); 
	//Check link to the mysql server 
	if(!$link)
	{ 
		die('Failed to connect to server: ' . mysql_error()); 
	}
	//Select database 
	$db = mysql_select_db('farmer_database'); 
	if(!$db)
	{
		die("Unable to select database"); 
	}
	//Prepare query 
	$query = 'SELECT S.CAPACITY,S.BUFFER_STOCK FROM  crops_vegetable AS C JOIN STORAGE_T1 AS S ON  C.BREED_ID = S.BR_ID WHERE S.BR_ID = \''.$_POST['br_id'].'\''; 
	//Execute query 
	$result = mysql_query($query); 
	echo '<h2>Storage detail</h2>';
	echo '<table align="center" cellspacing="10">
	<tr>
	<td><h3>Capacity</h3></td> 
	<td><h3>Buffer Stock</h3></td> 
	</tr>'; 
	while($row = mysql_fetch_array($result))
	{
		echo '<tr><td><h3>'.$row['CAPACITY'].'</h3></td> 
		<td><h3>'.$row['BUFFER_STOCK'].'</h3></td>
		</tr>';
	}
	echo '</table>'; 
}
	else 
	{ 
		echo'<h3>Resource not available for this Breed ID</h3>';
		include("resources.php"); 
	}
} 
 
 // Code to be executed when 'Market' is clicked.
 if ($_POST['submit'] == 'Market') 
 {
	if($_POST['br_id']) 
	{ 
		//Connect to mysql server 
		$link = mysql_connect('localhost', 'root', ''); 
		//Check link to the mysql server 
		if(!$link)
		{
			die('Failed to connect to server: ' . mysql_error()); 
		}
		//Select database 
		$db = mysql_select_db('farmer_database'); 
		if(!$db)
		{ 
			die("Unable to select database"); 
		}
		//Prepare query 
		$query = 'SELECT GOVT_SUB_PRICE,OPEN_MARKET_PRICE,GOVT_IMPORT,GOVT_EXPORT FROM  MARKET WHERE BREED_ID = \''.$_POST['br_id'].'\''; 
		//Execute query 
		$result = mysql_query($query); 
		echo '<h2>MARKET DETAIL</h2>';
		echo '<table align="center" cellspacing="10">
		<tr>
		<td><h3>Government Subsidised</h3></td> 
		<td><h3>Market Price</h3></td> 
		<td><h3>Government Import</h3></td>
		<td><h3>Government Export</h3></td></tr>'; 
		while($row = mysql_fetch_array($result))
		{ 
			echo '<tr><td><h3>'.$row['GOVT_SUB_PRICE'].'</h3></td> 
			<td><h3>'.$row['OPEN_MARKET_PRICE'].'</h3></td>
			<td><h3>'.$row['GOVT_IMPORT'].'</h3></td>
			<td><h3>'.$row['GOVT_EXPORT'].'</h3></td></tr>'; 
		}
		echo '</table>';
	}
	else 
	{ 
		echo'<h3>Resource not available for this Breed ID</h3>';
		include("resources.php"); 
	}
 }
 echo '</div></div></body></html>';
?>