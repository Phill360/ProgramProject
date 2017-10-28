  // Get number of animals in database
	function numberAnimalsInDatabase()
	{
	  // Connect AWS MYSQL Server
    require_once('./_php/connect.php');
	  
	  // Get number of pets in database
	  $query = "SELECT * FROM animals";
	  $result = mysqli_query($connection, $query);
	  // Test for query error
	  if(!$result) 
	  {
		  die("8. Database query failed.");
	  }
	  return $result;
	  mysqli_close($connection);
	}