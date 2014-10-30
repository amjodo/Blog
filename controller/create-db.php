<?php
	//looks for database
	require_once(__DIR__ ."/../model/database.php");
//looks for these variables
// in this order to buffer & so it can be read by database	
	$connection = new mysqli($host, $username, $password);
//checks if there is an error with the connection
	if ($connection->connect_error) {
		die("<p>Error:" . $connection->connect_error). "</p>";
	}
//variable that checks if other variable exists
	$exists = $connection->select_db($database);
//if variable exists then do the command underneath
// creating database
	if(!$exists){
		$query = $connection->query("CREATE DATABASE $database");
//checking if database is created if databse was created print out this message
// create the database ONCE

	if($query) {
		echo "<p>sucessfully created database:" . $database. "</p>";
	}
}
//executed if we already have a database
else {
	echo "<p>Database already exists.</p>";
}
//creating a query to make a table in database 
//connectin has connection to database
//stores all block posts
//(11) means up to 11 values
//NOT NULL can't be empty
//AUTO_INCREMENT automatically increments ids 
$query = $connection->query("CREATE TABLE posts ("
	."id int(11) NOT NULL AUTO_INCREMENT,"
	. "title varchar (255) NOT NULL,"
	. "post text NOT NULL,"
	."PRIMARY KEY (id))");
//if table was created print out this message
//true or false statement
if($query) {
	echo "<p>Succesfully created table: posts</p>";
}
//else statement is fired when statement is false
//handles both code and recieves hmtl codes
else {
	echo "<p>$connection->error</p>";
}
//closes connection
$connection->close();