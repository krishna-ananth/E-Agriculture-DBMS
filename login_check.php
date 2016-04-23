<?php
    if ($_POST['submit'] == 'Login'){
        //Collect POST values
		$login = $_POST['login'];
        $password = $_POST['password'];   
		if($login && $password){
            //Connect to mysql server
			$link = mysql_connect('localhost', 'root', '') or die('Failed to connect to server: ' . mysql_error());;
			//Select database
			$db = mysql_select_db('farmer_database') or die("Unable to select database");
			//Create query
			$qry='SELECT * FROM LOGIN WHERE USER_ID = \''.$login.'\' AND PASSWORD = MD5('.$password.')';
					
			//Execute query
			$result=mysql_query($qry);
						
			//Check whether the query was successful or not         
			if($result){
				$count = mysql_num_rows($result);
			}
			else{
				//Login failed
				include('login.php');
				echo '<center>Incorrect Username or Password !!! Login again or <a href="register.php">Register</a><center>';
				exit();
			}
			//if query was successful it should fetch 1 matching record from the table.
			if( $count == 1){
			//Login successful set session variables and redirect to main page.
			session_start();
			$_SESSION['IS_AUTHENTICATED'] = 1;
							$_SESSION['USER_ID'] = $login;
							echo 'username is '.$login;
							header('location:profile.php');
						}
			else{
							//Login failed
							include('login.php');
							echo '<center>Incorrect Username or Password !!! Login again or <a href="register.php">Register</a><center>';
							exit();
						}
				}
		else{
					include('login.php');
					echo '<center>Username or Password missing!!</center>';
					exit();
		}
    }
else{       
        header("location: login.php");
        exit();
    }
?>