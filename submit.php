<?php 
echo'<html>
<head>
<title>Register | E-Agriculture</title>
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
 
//Check if the user is authenticated first. Or else redirect to login page 
if(1 == 1){ 
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
 $id=$_POST['user_id'];
 $nm=$_POST['name'];
 $phone=$_POST['phone'];
 $region=$_POST['region'];
 $res=$_POST['add'];
 $land=$_POST['land'];
 $farm=$_POST['farm'];
 $password=$_POST['password'];
 $ac_no=$_POST['ac_no'];
 $bank=$_POST['bank'];
 $credit_limit=$_POST['credit_limit'];
 //Create query 
 $qrypass = 'INSERT INTO LOGIN VALUES(\''.$id.'\',MD5('.$password.'))';
 $qry = 'INSERT INTO USER_FARMER VALUES(\''.$id.'\',\''.$nm.'\',\''.$phone.'\',\''.$region.'\',\''.$res.'\',\''.$land.'\',\''.$farm.'\')';
 $qryact = 'INSERT INTO account(`USER_ID`,`ACCOUNT_NO`,`BANK`,`CREDIT_LIMIT`) VALUES(\''.$id.'\',\''.$ac_no.'\',\''.$bank.'\',\''.$credit_limit.'\')';
 //Execute query 
 $results = mysql_query($qry);
 $resultpass = mysql_query($qrypass);
 $resultact = mysql_query($qryact);
 //Check if query executes successfully 
 if($results == FALSE && $resultpass == FALSE && $resultact ==FALSE)
	echo mysql_error() . '<br>';
 else{
	echo '<h2>Registered successfully!</h2>';
	header('location:profile.php');
}//Execute query 
 $result = mysql_query($qry);
 $resultpass = mysql_query($qrypass);
}
else{ 
header('location:profile.php'); 
exit();
}
?>