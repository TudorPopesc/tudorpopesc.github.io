<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "company";

	// Create connection
	$connection = mysqli_connect($servername, $username, $password,$dbName);

	// Check connection
	if (!$connection) {
	  die("Connection failed: " . mysqli_connect_error());
	}
?>
