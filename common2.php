<?php
// Fetch animals from the database
	function fetchAnimalsFromDatabase($page1)
	{
    // Connect AWS MYSQL Server
    require_once('./_php/connect.php');
    
	  $query = "SELECT * FROM animals LIMIT $page1,12"; 
	  $result = mysqli_query($connection, $query);
	  
	  // Test for query error
	  if(!$result) 
	  {
		  die("7. Database query failed.");
	  }
	  
	  return $result;
	  mysqli_close($connection);
	}
	
	
?>