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
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$region = $_POST['region'];
	$add = $_POST['add'];
	$land = $_POST['land'];
	$farm = $_POST['farm'];
	$id = $_SESSION['USER_ID'];
	
	$update = 'UPDATE user_farmer SET NAME = \''.$name.'\'';
	$update = $update . ', PHONE_NO = \''.$phone.'\'';
	$update = $update . ', REGION = \''.$region.'\'';
	$update = $update . ', RESIDENCE = \''.$add.'\'';
	$update = $update . ', PLANTATION_LAND = \''.$land.'\'';
	$update = $update . ', TYPE_OF_FARMING = \''.$farm.'\''.'WHERE USER_ID = \''.$id.'\'';
	$result = mysql_query($update);
	
	if($result == FALSE) echo mysql_error() . '<br>'; 
	else echo mysql_info();
	
	if($_POST['password']){
	$passupdate = 'UPDATE LOGIN SET PASSWORD = MD5('.$_POST['password'].')';
	$passresult = mysql_query($passupdate);
	if($passresult == FALSE) echo mysql_error() . '<br>'; 
	else echo mysql_info();
	}
}
header('location:profile.php');
?>