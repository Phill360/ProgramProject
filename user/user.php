<?php
  include_once('./common.php');

  // Connect AWS MYSQL Server
  require_once('./_php/connect.php');
  
  $email = $_SESSION['email'];
  
  /* Getting user's userID */
  
  // Perform query
  $query = "SELECT * "; 
	$query .= "FROM user ";
	$result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result)
	{
		die("Get user ID database query failed.");
	}
	
	// Iterate through results to get the user ID 
	while ($row = mysqli_fetch_assoc($result))
	{
	  // Match email to a row
	  if ($row["email"] == $email)
	  {
	    $userID = $row["userID"];
    }
	}
	
	/* With the userID we now check if this user has visited the site previously. */
  
  // Perform new search
  $query = "SELECT * "; 
	$query .= "FROM userSearch ";
	$result = mysqli_query($connection, $query);

	// Test for query error
	if(!$result)
	{
		die("Database query failed.");
	}
	else
	{
	  $count  = mysqli_num_rows($result);
	  if ($count == 0)
	  {
      $_SESSION['userTool'] = 'matches'; // Temporarily change
	  }
	  else
	  {
      while ($row = mysqli_fetch_assoc($result))
	    {
	      // Match user ID to a row
	      if ($row["userID"] == $userID)
	      {
	        $_SESSION['userTool'] = 'matches';
        }
	    }	    
	  }
	}

  if(isset($_POST['questionnaireBtn']))
  {
    $_SESSION['userTool'] = 'questionnaire';
  }

  if(isset($_POST['matchesBtn']))
  {
    $_SESSION['userTool'] = 'matches';
  }

  if(isset($_POST['favouritesBtn']))
  {
    $_SESSION['userTool'] = 'favourites';
  }
  
  mysqli_close($connection);
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
<div><?php include 'display_image.php' ?></div>

</body>
</html>