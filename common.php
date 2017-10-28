<?php
session_start();

// Set session variables
$_SESSION["response"]="";
// $_SESSION["favanimal"];

  
// Function to determine request type is POST 
function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

// Function to determine request type is GET 
function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

/* This function registers a user */
function registerUser($firstname, $lastname, $email, $password)
{
  require_once('./_php/connect.php');
    
  // Get all users from the database
  $query = "SELECT * "; 
	$query .= "FROM user ";
	$result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result)
	{
		die("1. Database query failed.");
	}
	  
	// Iterate through users
	while ($row = mysqli_fetch_assoc($result))
	{
	  // Match email to a row
	  if ($row["email"] == $email)
	  {
	    $check = 'previous user exists';
    }
	  else
    {
      $check = 'no previous user';
    }
	}
    
  // If email doesn't exsit in the database create account
  if ($check == 'no previous user')
  {
    // Secure password string temp
   	$userpass = md5($password);
   	  
   	// Create query to insert user details
    $query = "INSERT INTO user ";
    $query .= "(firstName, lastName, email, password) ";
    $query .= "VALUES (";
    $query .= "'" . $firstname . "',";
    $query .= "'" . $lastname . "',";
    $query .= "'" . $email . "',";
    $query .= "'" . $userpass . "'";
    $query .= ")";
    // Add user to db
    $write = mysqli_query($connection, $query); 

    // Test for query error
    if(!$write) 
    {
		  die("2. Database query failed.");
    }
    $_SESSION["response"] = "PET ADDED";
    $_SESSION['validUser'] = true;
    $_SESSION['usertype'] = $usertype;
    header('Location: index.php');
  }
  // mysqli_close($connection);
}

/* This function signs the user in */
function signInUser($email, $password)
{
  // Super admin user sign in
  if ($email == 'super' && $password == 'super')
  {
    $validUser = true;
    $usertype = 'admin';
  }
  else // user from database
  {
    require_once('./_php/connect.php');
    $userpass = md5($password);
    // Query to find a match for login details
    $query = "SELECT * FROM user ";
    $query .= "WHERE email=";
    $query .= "'" . $email . "'";
    $query .= " and password=";
    $query .= "'" . $userpass . "'";
    $result = mysqli_query($connection, $query);
    $count  = mysqli_num_rows($result);
    if($count==0) {
    // Password is a match
    } else {
      debug_to_console("password is match");
      while ($row = mysqli_fetch_assoc($result))
      {
        $validUser = true;
       	$usertype = $row["userType"];
      }
    }
  }
  
  if ($validUser == true) 
  {
    $_SESSION['validUser'] = true;
    $_SESSION['usertype'] = $usertype;
    $_SESSION['email'] = $email;
    header('Location: index.php');
  } else {
    $_SESSION['validUser'] = false;
  }
  // mysqli_close($connection);
}

  
  
/* This function unsets all session variables and logs the user out */
function signOutUser()
{
  $result = '';
  $validUser = true;
    
  unset($_SESSION['validUser']);
  unset($_SESSION['usertype']);
  unset($_SESSION['email']);
    
  $validUser = false;
    
  if (checkStatus() == 'signed out')
  {
    $result = 'signed out';
  }
  else
  {
    $result = 'signed in';
  }
  header('Location: index.php');
  mysqli_close($connection);
}

/* This function checks whether the user is logged in or not */
function checkStatus()
{
  if ((!isset($_SESSION['validUser'])) || ($_SESSION['validUser'] != true))
  {
    $status = 'signed out';
  }
  else
  {
	  $status = 'signed in';
  }
  return $status;
}
  
/* This function checks whether the user is an admin user or a normal user */
function checkUserType()
{
  if ($_SESSION['usertype'] == 'admin') // This value was set to '1'. Changed to 'admin'.
  {
    $usertype = 'admin';
  }
  else
  {
	  $usertype = 'normal';
  }
  return $usertype;
}
  
/* This function switches a user from normal to admin */
function createNewAdminUser($email)
{
  // include_once('_php/connect.php');
    
  $query = "UPDATE user SET userType='admin' WHERE email='" . $email . "'";

  if (mysqli_query($connection, $query)) {
    echo "User updated successfully";
  } else {
    echo "User not found: " . mysqli_error($connection);
  };
    
  // mysqli_close($connection);
}
  
/* This function demotes admin user to normal user */
function demoteAdminUser($email)
{
  // include_once('_php/connect.php');
    
  $query = "UPDATE user SET userType='normal' WHERE email='" . $email . "'";
    
  if (mysqli_query($connection, $query)) {
    echo "User updated successfully";
  } else {
    echo "User not found: " . mysqli_error($connection);
  };
    
  // mysqli_close($connection);
}
  
/* This function checks the number of users in the database. */
function checkNumberUsersInFile()
{
  // require_once('_php/connect.php');
    
  $query = "SELECT * ";
	$query .= "FROM user ";
  $result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result) 
	{
		die("3. Database query failed.");
	}
	  
	$size = 0;
	  
	while ($row = mysqli_fetch_assoc($result))
	{
	   $size += 1;
	}

  // mysqli_close($connection);
  return $size;
}
  
/* This function checks the number of pets in the database. */
function checkNumberAnimalsInDatabase()
{
  // require_once('./_php/connect.php');
    
  $query = "SELECT * ";
	$query .= "FROM animals ";
  $result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result) 
	{
	  die("4. Database query failed.");
	}
	  
	$size = 0;
	  
	while ($row = mysqli_fetch_assoc($result))
	{
	  $size += 1;
	}

  // mysqli_close($connection);
  return $size;
}
  
// All the input vaiables are numerical, for example: $childrenAtHome -> 0 = No and 1 = yes
// UPDATE as of Wed 25th Oct: The user can select BOTH cat and dog. So $catItem and $dogItem can both equal 1 at same time.
// The reason for this is that the user may want to view both cats and dogs for potential adoption.
// For $adultsHome (How many adults in the home?) at this stage is either 1, 2 or 3. But I can modify the questionnaire to give user option to select more adults.
// $howActive is either 1 (for lazy), 2 (for average) or 3 (for active)
// $petSize is either 1 (for small), 2 (for medium) or 3 (for large)
// $petTemperament is either 1 (for princess), 2 (for zen) or 3 (Usain Bolt active)
function submitQuestionnaireResponses($adultsHome, $childrenAtHome, $howActive, $howOftenHome, $catItem, $dogItem, $petSize, $petTemperament)
{
  // Connect AWS MYSQL Server
  require_once('./_php/connect.php');
  
  // Please implement
  mysqli_close($connection);
}
  
  
  
  
  
  
  
  
  
  
  
function addPet($rspcaID, $petName, $breedID, $age, $gender, $imageName, $description, $imageData) {
  // Connect AWS MYSQL Server
  // require_once('./_php/connect.php');
  
  // Does Pet alread Exist
	$query = "SELECT rspcaID  ";
	$query .= "FROM animals ";
	$query .= "WHERE rspcaID=";
	$query .= "'" . $rspcaID . "'";
	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows($result) > 0){
	  return;
	}
	
	// 2. Perform Query
	$query = "INSERT INTO animals ";
	$query .= "(rspcaID, petName, breedID, gender, imageName, age, description, imageData) ";
	$query .= "VALUES (";
	$query .= "'" . $rspcaID . "',";
	$query .= "'" . $petName . "',";
	$query .= "'" . $breedID . "',";
	$query .= "'" . $gender . "',";
	$query .= "'" . $imageName . "',";
	$query .= "'" . $age . "',";
	$query .= "'" . $description . "',";
	$query .= "'" . $imageData . "'";
	$query .= ")";
	$result = mysqli_query($connection, $query);
	
	// Test for query error
	if($result) {
	  $new_id = mysqli_insert_id($connection);

	} else {
		echo mysqli_error($connection);
		mysqli_close($connection);
		exit;
	}

	// Close database connection
	// mysqli_close($connection);
}
  
function addBreed($species, $breedName,$breedSize, $breedSize, $temperament, $active, $fee) {
    
  // Connect AWS MYSQL Server
  // require_once('./_php/connect.php');
    
	// 2. Perform Query
	$query = "INSERT INTO breed ";
	$query .= "(type, name, size, temperament, active, fee) ";
	$query .= "VALUES (";
	$query .= "'" . $species . "',";
	$query .= "'" . $breedName . "',";
	$query .= "'" . $breedSize . "',";
	$query .= "'" . $temperament . "',";
	$query .= "'" . $active . "',";
	$query .= "'" . $fee . "'";
	$query .= ")";
	$result = mysqli_query($connection, $query);
	// Test for query error
	if($result) {
	  $new_id = mysqli_insert_id($connection);
	} else {
		echo mysqli_error($connection);
		mysqli_close($connection);
		exit;
	}

	// Close database connection
	// mysqli_close($connection);
}
  
function remPet($rspcaID) {
    
  // Connect AWS MYSQL Server
  // require_once('./_php/connect.php');
  
  //   // 2. Perform Query
  // $query = "SELECT * FROM animals ";
  // $query .= "WHERE ";
  // $query .= "rspcaID=";
  // $query .= "'" . $rspcaID . "'";
  // $result = mysqli_query($connection, $query);
  // if($row = mysqli_fetch_assoc($result)){
  //   // Delete Image for pet
  //   unlink($row["imagePath"]);
  // }
  
  // 2. Perform Query
  $query = "DELETE FROM animals ";
  $query .= "WHERE ";
  $query .= "rspcaID=";
  $query .= "'" . $rspcaID . "'";
  $result = mysqli_query($connection, $query);

  // Test for query error
  if($result) {
    $new_id = mysqli_insert_id($connection);

  } else {
  	echo mysqli_error($connection);
  	mysqli_close($connection);
  	exit;
  }
  
  // Close database connection
  // mysqli_close($connection);
}
  
function remBreed($breedID) {
    
  // Connect AWS MYSQL Server
  // require_once('./_php/connect.php');
  
  // 2. Perform Query
  $query = "DELETE FROM breed ";
  $query .= "WHERE ";
  $query .= "breedID=";
  $query .= "'" . $breedID . "'";
  $result = mysqli_query($connection, $query);

  // Test for query error
  if($result) {
    $new_id = mysqli_insert_id($connection);
  } else {
  	echo mysqli_error($connection);
  	mysqli_close($connection);
  	exit;
  }

  // Close database connection
  // mysqli_close($connection);
}
  
/* This is a diagnostic function, e.g. store values of variables in $_SESSION  */
function setMessage($message)
{
  $_SESSION['message'] = $message; 
}
  
/* This is a diagnostic function, e.g. retrieve values of variables stored in $_SESSION  */
function getMessage()
{
  $message = $_SESSION['message'];
  return $message;
}
  
// This is a diagnostic feature for writing information to console
function debug_to_console($data) {
  if (is_array($data))
    $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) . "' );</script>";
  else
    $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
 
  echo $output;
}



	// Display Image from database
  function displayimage($rspcaID)
  {
		// Connect AWS MYSQL Server
    // require_once('./_php/connect.php');
			
		echo "$rspcaID";
			
		$query = "select * from animals where rspcaID='".$rspcaID."'";
		$result=mysqli_query($connection,$query);
		
		// Test for query error
	  if(!$result)
	  {
		  echo('Could not get image');
	  }
		
		while ($row = mysqli_fetch_array($result)) 
		{
			echo '<img src="data:image;base64, '.$row['imageData']. ' ">';
		}
		mysqli_close($connection);
	}
	
	// Setup user session
	function setupUserSession()
	{
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
		  die("5. Database query failed.");
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
		  die("6. Database query failed.");
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
	  mysqli_close($connection);
	}
	
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
	
	// Get number of animals in database
	function numberAnimalsInDatabase()
	{
	  // Connect AWS MYSQL Server
    // require_once('./_php/connect.php');
	  
	  // Get number of pets in database
	  $query = "SELECT * FROM animals";
	  $result = mysqli_query($connection, $query);
	  // Test for query error
	  if(!$result) 
	  {
		  die("8. Database query failed.");
	  }
	  return $result;
	  // mysqli_close($connection);
	}
?>