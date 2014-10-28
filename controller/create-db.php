<?php
	//looks for database
	require_once(__DIR__ ."/../model/database.php");
//looks for these variables
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
//if created print out this message

	if($query) {
		echo "sucessfully created database:" . $database;
	}
}
//if the code above does not work print this statement
else {
	echo "Database already exists.";
}

//closes connection
$connection->close();