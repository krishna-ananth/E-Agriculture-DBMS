<?php

 $link = mysql_connect('localhost', 'root', ''); 
 //Check link to the mysql server 
 if(!$link){ die('Failed to connect to server: ' . mysql_error()); } 
 //Select database 
 $db = mysql_select_db('farmer_database'); 
 if(!$db)
 {
	die("Unable to select database"); 
 }
 function dropDown()
	{
		$options="<select>"; 
		$query = mysql_query("SELECT DISTINCT BREED_ID FROM `crop_fertilizers`");
		while ($row=mysql_fetch_array($query)) 
		{ 
			$name=$row["BREED_ID"];
			$options.="<option value=\"$name\">".$name."</option>";
		}
	$options.= "</SELECT>";
	return "$options";
	}
    $list = dropDown();
	echo "$list";
?>