<?php
$servername = "localhost";
	$username = "root";
	$password = "sumi";
	$db = "shuva";

	// create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// check connection
	if($conn->connect_error){
		die("connection error: ".$conn->connect_error);
	}
?>