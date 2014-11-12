<?php
require_once(__DIR__ . "/../model/database.php");
//stores what is put into the title and post after submited
//validate & sanitize
//wants/ recive info thats put in this file
 $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
 $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);

echo "<p>Title: $title</p>"; 
echo "<p>Post: $post</p>";


?>