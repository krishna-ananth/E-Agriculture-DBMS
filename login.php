<?php
session_start();
session_unset();
session_destroy();
?>

<html>
<head>
<title>Login Page | E-Agriculture</title>
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
      <h2>Login</h2>
      <h3>Please enter your login information.</h3>
      <form name="loginForm" method="post" action="login_check.php">
      <table align="center">
        <tr>
          <td style="color:#89b700"><b>Login</b></td>
          <td><input name="login" type="text" id="login" /></td>
        </tr>
		<tr>
          <td style="color:#89b700"><b>Password</b></td>
          <td><input name="password" type="password"/></td>
        </tr>
		<tr>
		  <td>	</td>
		  <td>	</td>
		 </tr>
		<tr>
          <td colspan="2" align="center" >
            <input type="submit" name="submit" value="Login" /></td>
         </tr>
      </table>
    </div>
  </div>
</div>
</body>
</html>