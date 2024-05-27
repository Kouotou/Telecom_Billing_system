<?php 
	//MYSQLi or PDO (PHP Data Object)
	// connecting to database using mysqli
	$conn = mysqli_connect('localhost', 'group2', 'password', 'telecom_central_db');

	// check connection
	if(!$conn){
		echo 'Connection error: ' . mysqli_connect_error();
	}
?>