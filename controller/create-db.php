<?php
	//looks for database
	require_once(__DIR__ ."/../model/database.php");
//looks for these variables
// in this order to buffer & so it can be read by database	
	$connection = new mysqli($host, $username, $password);
//checks if there is an error with the connection
	if ($connection->connect_error) {
		die("Error:" . $connection->connect_error);
	}
//variable that checks if other variable exists
	$exists = $connection->select_db($database);
//if variable exists then do the command underneath
	if(!$exists){
		$query = $connection->query("CREATE DATABASE $database");
//if created print out this message & create the database once

	if($query) {
		echo "sucessfully created database:" . $database;
	}
}
//executed if we already have a database
else {
	echo "Database already exists.";
}

//closes connection
$connection->close();