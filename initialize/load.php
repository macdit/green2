<?php
	//Start a session
	session_start();
	// Put data of one PHP file to another PHP file. 
	require "includes/users.php";
	require "includes/drugs.php";
	require "includes/ratings.php";
	require "includes/pharmacies.php";
?>
