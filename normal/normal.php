<?php

/* This function returns the userID  */
function getUserID($email)
{
  // Connect AWS MYSQL Server
  require_once('./_php/connect.php');
  
  // Get searchIDs from userID table
  $query = "SELECT * "; 
	$query .= "FROM user ";
	$result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result)
	{
		die("Get user ID database query failed.");
	}
	
	// Iterate through results
	//while ($row = mysqli_fetch_assoc($result))
	//{
	//  // Match email to a row
	//  if ($row["email"] == $email)
	//  {
	//    $userID = $row["userID"];
  //  }
	//}
	$userID = 33;
	return $userID;
	//mysqli_close($connection);
}

?>