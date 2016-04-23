<html>
<head>
<title>Mail | E-Agriculture</title>
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
    <div class="indent1">
	<?php
	$to = "2011182@iiitdmj.ac.in";
	$subject = $_POST["subject"];
	$body = $_POST["body"];
	$headers = "From: ".$_POST["from"]." Phone: ".$_POST["phone"];
	mail($to,$subject,$body,$headers);
	echo "<h3>Thank you for your message.It has been sent to the Admin and you will get a reply as soon as possible.</h3>";
	?>

</body>
</html>