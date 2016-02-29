<?php
	// this will go hrough all of the steps of using mysql through php

	// 1. Create a database as constants

		define("DB_SERVER", "playground.eca.ed.ac.uk");
		define("DB_USER", "s1131656");
		define("DB_PASS", "P1M7PNJ0g1");
		define("DB_NAME", "s1131656");

	 // this variable name is the 'handle', the connection to the database. running the following will connect to the database
 	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);


	//Test if connection occurred.
		if(mysqli_connect_errno()) {
		die("database connection failed: ".
			  mysqli_connect_error().
			  " (" . mysqli_connect_errno() . ")"
			 );
		}
		?>
