<?php
/* This function gets the userID from email address */
function getUserID($email)
{
	include_once('_php/connect.php');
	
	$query = "SELECT userID FROM user WHERE email = '" . $email . "'";
	$result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result) 
	{
		die("Database query failed.");
	}
	
	return $result;
	
	// Close database connection
  mysqli_close($connection);
}

?>