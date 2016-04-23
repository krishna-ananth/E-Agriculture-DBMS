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
	$id = $_SESSION['USER_ID'];
	$result = mysql_query($qry);
	$ac_no=$_POST['ac_no'];
	$credit_limit=$_POST['credit_limit'];
	$bank=$_POST['bank'];
	if($result){
	$update = 'UPDATE account SET ACCOUNT_NO = \''.$ac_no.'\'';
	$update = $update . ', CREDIT_LIMIT = \''.$credit_limit.'\'';
	$update = $update . ', BANK = \''.$bank.'\''.'WHERE USER_ID = \''.$id.'\'';
	$result = mysql_query($update);
	if($result == FALSE) echo mysql_error() . '<br>'; 
	else header('location:profile.php');
	}
	}
?>