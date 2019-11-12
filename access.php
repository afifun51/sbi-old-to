<?php
	
	$server = "127.0.0.1";
	$username = "utbksg";
	$password = "h4ny4untuksg";
	// $username = "admin";
	// $password = "6O1UE5fy";
	$database = "cbt_utbk_internal";
	//$database = "test_cbtutbk_v2";
	//$database = "tryout_cbt_database";

	
	$db_server = "127.0.0.1";
	$db_username = "utbksg";
	$db_password = "h4ny4untuksg";
	$db_database_name = "cbt_utbk_internal";
	// $db_username = "admin";
	// $db_password = "6O1UE5fy";		
	//$db_database_name = "test_cbtutbk_v2";
	
	mysql_connect($server, $username, $password) or die("gagal");
	mysql_select_db($database) or die("database error");

?>
