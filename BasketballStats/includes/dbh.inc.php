<?php

	$dbSeverName = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "basketball_players";
	
	$conn = mysqli_connect($dbSeverName, $dbUsername, $dbPassword, $dbName);
	$db = new PDO('mysql:host=localhost;dbname=basketball_players', 'root', '');
	
	
	
	
		
