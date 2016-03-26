<?php 
//functions

function confirm_query($result_set) {
	if (!$result_set) {
		die("Database query failed.");
	}
}

// function for form validation from w3schools

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




?>