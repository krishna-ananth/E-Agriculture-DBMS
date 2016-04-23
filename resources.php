 <html>
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
  </div>
  <!-- content -->
  <div id="content">
    <div class="indent1">
      <h2>Resources</h2> 
	<?php
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
	$qry = 'SELECT NAME,BREED_ID FROM crops_vegetable';
	$result = mysql_query($qry);
	echo '<table align="center" cellspacing="10"> 
			<tr><td><h3>Crop Name</h3></td> 
			<td><h3>Breed ID</h3></td>
			</tr>';
			
			while($row = mysql_fetch_assoc($result))
			{
				echo '<tr><td><h3>'.$row['NAME'].'</h3></td>
				<td><h3>'.$row['BREED_ID'].'</h3></td>
				</tr>';
			}
			echo '</table>';
	echo '<br><br><h2>Enter the respective Breed ID</h2>';
	?>
	
	<form action = "getStats.php" method = "post"> 
 <table align="center"> 
 <tr> 
 <td><h3>Crop Breed ID</h3></td>
 <td><select name="br_id"><option value = "<?php include("drop.php"); ?>" > </option></select></td>
 </tr>
 </table> 
 <table cellpadding = "20" align="center" cellspacing="10"> 
 <tr> 
 <td align="center"> <input type="submit" name="submit" value="Get Fertilizer"> </td>
 <td><input type="submit" name="submit" value="Climate"></td>
 <td><input type="submit" name="submit" value="Storage"></td> 
 <td><input type="submit" name="submit" value="Market"></td>
 <td><input type="submit" name="submit" value="Pesticide"></td> 
 <td><input type="submit" name="submit" value="Herbicide"></td>
 </tr>
 </table> 
 </form> 
 </div>
 </div>
 </div>
</body>
</html>