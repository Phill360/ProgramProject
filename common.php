<?php
session_start();

// Set session variables
$_SESSION["response"]="";
// $_SESSION["favanimal"];

  
/* Function to determine request type is POST */
function is_post_request() 
{
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/* Function to determine request type is GET */ 
function is_get_request() 
{
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
		die("Database query failed - registerUser()");
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
    if (!$write) 
    {
		  die("Database query failed - registerUser()");
    }
    
    $_SESSION["response"] = "PET ADDED";
    $_SESSION['validUser'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['usertype'] = $usertype;
    $_SESSION['firstName'] = $firstname;
    $_SESSION['lastName'] = $lastname;
    
    $query = "SELECT userID, email FROM user";
	  $result = mysqli_query($connection, $query);
	  
	  while ($row = mysqli_fetch_assoc($result)) 
    {
      // Match email to a row
	    if ($row["email"] == $email)
	    {
	      $_SESSION['userID'] = $row['userID'];
      }
    }

    header('Location: index.php');
  }
  
  // Close database connection
  mysqli_close($connection);
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
  else // Get user from database
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
    if($count==0) 
    {
      // Password is a match
    } 
    else 
    {
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
    $query = "SELECT * FROM user ";
    $query .= "WHERE email='" . $email . "'";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) 
    {
      $userID = $row["userID"];
      $firstname = $row["firstName"];
      $lastname = $row["lastName"];
    }
    
    $_SESSION['validUser'] = true;
    $_SESSION['usertype'] = $usertype;
    $_SESSION['email'] = $email;
    $_SESSION['userID'] = $userID;
    $_SESSION['firstName'] = $firstname;
    $_SESSION['lastName'] = $lastname;
    header('Location: index.php');
  } else {
    $_SESSION['validUser'] = false;
  }
  
  // Close database connection
  mysqli_close($connection);
}

/* This function sets up the user session */
function setupUserSession()
{
	// Connect AWS MYSQL Server
  require('./_php/connect.php');
  
  $email = $_SESSION['email'];
  
  // Getting user's userID
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
	    $userID = $row['userID'];
    }
	}
	  
	// With the userID we now check if this user has visited the site previously. */
  $query = "SELECT userID FROM userSearch";
	$result = mysqli_query($connection, $query);

	// Test for query error
	if(!$result)
	{
		die("6. Database query failed.");
	}
	else
	{
	  $count = 0;
	  while ($row = mysqli_fetch_assoc($result))
	  {
	    if ($row["userID"] == $userID)
	    {
	      $count = 1;
      }
	  }

	  if ($count == 0)
	  {
      $_SESSION['userTool'] = 'questionnaire'; // Temporarily change
	  }
	  else
	  {
      $_SESSION['userTool'] = 'matches';	    
	  }
	}
	
	// Close database connection
	mysqli_close($connection);
}

/* This function unsets all session variables and logs the user out */
function signOutUser()
{
  $result = '';
  $validUser = true;
    
  unset($_SESSION['validUser']);
  unset($_SESSION['usertype']);
  unset($_SESSION['email']);
  unset($_SESSION['userID']);
  unset($_SESSION['firstName']);
  unset($_SESSION['lastName']);
    
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
  
  // Close database connection
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
  if ($_SESSION['usertype'] == 'admin')
  {
    $usertype = 'admin';
  }
  else
  {
	  $usertype = 'normal';
  }
  return $usertype;
}

/* This function checks the type of a user, e.g. normal or admin user */
function getUserType($userID)
{
	include_once('_php/connect.php');
	
	$query = "SELECT userType FROM user WHERE userID = '" . $userID . "'";
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

/* This function gets the userID from email address */
function getUserID($email)
{
	include_once('connect.php');
	
	$query = "SELECT userID, email FROM user";
	$result = mysqli_query($connection, $query);
	  
	while ($row = mysqli_fetch_assoc($result)) 
  {
    // Match email to a row
	  if ($row["email"] == $email)
	  {
	    $result = $row['userID'];
    }
  }
  
  return $result;
	
	// Close database connection
  mysqli_close($connection);
}
  
/* This function switches a user from normal to admin */
function promoteUser($userID)
{
  include_once('_php/connect.php');
    
  $query = "UPDATE user SET userType='admin' WHERE userID ='".$userID."'";

  if (mysqli_query($connection, $query)) 
  {
    phpAlert("The user has been promoted to admin user.");
  } 
  else 
  {
    phpAlert("User not found: ".mysqli_error($connection));
  }
    
  // Close database connection
  mysqli_close($connection);
}
  
/* This function demotes admin user to normal user */
function demoteUser($userID)
{
  include_once('_php/connect.php');
    
  $query = "UPDATE user SET userType='normal' WHERE userID ='".$userID."'";
    
  if (mysqli_query($connection, $query)) 
  {
    phpAlert("The user has been demoted to normal user.");
  } 
  else 
  {
    phpAlert("User not found: ".mysqli_error($connection));
  }
    
  // Close database connection
  mysqli_close($connection);
}

/* This function deletes a user from Paw Companions */
function deleteUser($userID)
{
	require_once('./_php/connect.php');
	
	$query = "DELETE FROM favourites WHERE userID = $userID;";
	$query .= "DELETE FROM userSearch WHERE userID = $userID;";
	$query .= "DELETE FROM user WHERE userID = $userID";
	
	// Execute multi query
  if (mysqli_multi_query($connection, $query))
  {
    do
    {
      // Store first result set
      if ($result=mysqli_store_result($connection)) 
      {
        // Fetch one and one row
        while ($row=mysqli_fetch_row($result))
        {
          printf("%s\n",$row[0]);
        }
        // Free result set
        mysqli_free_result($result);
      }
    }
    while (mysqli_next_result($connection));
  }
  
  if ($userID == $_SESSION['userID'])
  {
  	signOutUser();
  }
  
  // Close database connection
  mysqli_close($connection);
}
  
/* This function checks the number of users in the database. */
function checkNumberUsersInFile()
{
  require_once('_php/connect.php');
    
  $query = "SELECT * ";
	$query .= "FROM user ";
  $result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result) 
	{
		die("Database query failed - checkNumberUsersInFile()");
	}
	  
	$size = 0;
	while ($row = mysqli_fetch_assoc($result))
	{
	   $size += 1;
	}

  mysqli_close($connection);
  return $size;
}
  
/* UPDATED Sunday 5th November
$adultsHome (How many adults in the home?). Values: 1, 2, 3, 4 or 5. 
$childrenHome (Are there children under 6?). Values: 0 = no, 1 = yes
$howActive. Values: 1 = lazy, 3 = average, 5 = very active
$howOftenHome. Values: 1 = rarely, 3 = inconsistent, 5 = almost always
$petSelection. Values: 1 = cat, 2 = dog, 3 = cat and dog
$petSize. Values: 1 = extra small, 2 = small, 3 = medium, 4 = large, 5 = giant
$petTemperament. Values: 1 = princess, 2 = zen, 3 = Usain Bolt active
$petGender. Values: 1 = female, 2 = male, 3 = no preference

Giant dogs >50kg: Great Dane, English Mastiff, Scottish Deerhound.
Large dogs 25kg-50kg: Golden Retriever, Labrador.
Medium dogs 15kg-25kg: Afghan Hound, American Foxhound, Australian Cattle Dog.
Small dogs 5kg-15kg: Australian Terrier, Shiba Inu.
Extra small dogs <5kg: Chihuahua, Dachshund, Maltese, Yorkshire Terrier.
Cats also match to extra small. According to Google adult cats weigh 3.6 - 4.5kg. */

function submitResponses($adultsHome, $childrenHome, $howActive, $howOftenHome, $petSelection, $petSize, $petTemperament, $petGender, $userID)
{
  // Connect AWS MYSQL Server
  require_once('./_php/connect.php');
  
  // Check if this user already has record in userSearch and if so, write over it with new data.
  $query = "SELECT userID FROM userSearch ";
  $result = mysqli_query($connection, $query);
  
  // Test for query error
	if(!$result)
	{
		die("Database query failed - submitResponses() - 1");
	}
	  
	// Iterate through users
	while ($row = mysqli_fetch_assoc($result))
	{
	  if ($row["userID"] == $userID)
	  {
	    // User has already submited search criteria. Delete existing record. 
	    $query = "DELETE FROM userSearch WHERE userID = $userID";
	    $result = mysqli_query($connection, $query);
	    
	    // Test for query error
	    if(!$result)
	    {
		    die("Database query failed - submitResponses() - 2");
	    }
    }
	}
  
  // Insert search data into userSearch Table
	$query = "INSERT INTO userSearch ";
	$query .= "(adultsHome, childrenHome, howActive, howOftenHome, petGender, petSelection, petSize, petTemperament, userID) ";
	$query .= "VALUES (";
	$query .= "'" . $adultsHome . "',";
	$query .= "'" . $childrenHome . "',";
	$query .= "'" . $howActive . "',";
	$query .= "'" . $howOftenHome . "',";
	$query .= "'" . $petGender . "',";
	$query .= "'" . $petSelection . "',";
	$query .= "'" . $petSize . "',";
	$query .= "'" . $petTemperament . "',";
	$query .= "'" . $userID . "'"; 
	$query .= ")";
	$result = mysqli_query($connection, $query);
	
	// Test for query error
	if($result) 
	{
	  $new_id = mysqli_insert_id($connection);
	}
  
  // Close Connection
  mysqli_close($connection);
}
  
/* Search for question matches */
function searchResult($offset)
{
	// Connect AWS MYSQL Server
  $host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
  $port=3306;
  $socket="";
  $user="proProg";
  $DBpassword="pawprogramming";
  $dbname="pawCompanion";
  $connection = new mysqli($host, $user, $DBpassword, $dbname, $port, $socket)
    	or die ('Could not connect to the database server' . mysqli_connect_error());

 	// Connect AWS MYSQL Server
	// require_once('./_php/connect.php');
  
	// UserID from session
	$userID =  $_SESSION['userID'];
  
	// Get pet data for comparsion
	$query = "SELECT * ";
	$query .= "FROM userSearch ";
	$query .= "WHERE userID=".$userID;
	
	$search = mysqli_query($connection, $query);

	// Test for query error
	if($search) 
	{
	  $new_id = mysqli_insert_id($connection);
	} 
	else 
	{
		// echo mysqli_error($connection);
		mysqli_close($connection);
		exit;
	}
	
	while ($row = mysqli_fetch_assoc($search)) 
	{
    $adultsHome = $row["adultsHome"];
    $childrenHome = $row["childrenHome"];
    $howActive = $row["howActive"];
    $howOftenHome = $row["howOftenHome"];
    $petGender = $row["petGender"];
    $petSelection = $row["petSelection"];
    $petSize = $row["petSize"];
    $petTemperament = $row["petTemperament"];
	}
	
	// 1. Size
  if ($adultsHome >= 2) // Minimum two or more adults
  {
    if ($petSize == 5) // Prefer a giant pet
    {
      if ($childrenHome == 0) // No children under 6
      {
        $breedSize = 5; // Matched with giant pets
      }
    }
  }
  if ($adultsHome >= 2) // Minimum two or more adults
  {
    if ($petSize == 4) // Prefer a large pet
    {
      if ($childrenHome == 0) // No children under 6
      {
        $breedSize = 4; // Matched with large pets
      }
    }
  }
  if ($adultsHome >= 1) // One or more adults
  {
    if ($petSize == 3) // Prefer a medium size pet
    {
      $breedSize = 3; // Matched with medium size pets
    }
  }
  if ($adultsHome >= 1) // One or more adults
  {
    if ($petSize == 2) // Prefer a small pet
    {
      $breedSize = 2; // Matched with small pets
    }
  }
  if ($adultsHome >= 1) // One or more adults
  {
    if ($petSize == 1) // Prefer an extra small pet
    {
      $breedSize = 1; // Matched with extra small pets
    }
  }

  // 2. Active
  $activity = round(($howActive * $howOftenHome)/5);
  if ($activity == 5)
  {
  	$breedActive = "Sports star";
  }
  if ($activity == 3 || $activity == 4)
  {
  	$breedActive = "Active";
  }
  else 
  {
  	$breedActive = "Lap dog";
  }

  // 3. Temperament
  if ($petTemperament == 3) // Prefer Usain Bolt pet
  {
    if ($childrenHome == 0) // No children under 6
    {
      $breedTemperament = "Excitable"; // Matched with Usain Bolt
    }
    else 
    {
    	$breedTemperament = "Playful"; // Matched with princess
    }
  }
  if ($petTemperament == 2) // Prefer zen pet
  {
    if ($childrenHome == 0) // No children under 6
    {
      $breedTemperament = "Easy Going"; // Matched with zen
    }
    else 
    {
    	$breedTemperament = "Playful"; // Matched with princess
    }
  }
  if ($petTemperament == 1)
  {
    $breedTemperament = "Playful"; // Matched with princess
  }

  // 4. Gender
  if ($petGender == 2) // Male animal preferred
  {
    $animalsGender = "M"; // Matched with male pets
  }
  if ($petGender == 1) // Female animal preferred
  {
    $animalsGender = "F"; // Matched with female pets
  }
  else
  {
    $animalsGender = "F"; // Matched with female and male pets
  }

  // 5. Selection Type
  if ($petSelection == 0) // Cat preferred
  {
    $breedType = "Cat"; // A cat preferred
  }
  if ($petSelection == 1) // Dog preferred
  {
    $breedType = "Dog"; // A dog preferred
  }
  else
  {
  	$breedType = "Dog"; // Matched with cats and dogs
  }
	
	$query = "SELECT animals.rspcaID, animals.petName, animals.description, animals.gender, animals.age, breed.active, breed.type, breed.size, breed.temperament ";
	$query .= "FROM breed ";
	$query .= "INNER JOIN animals ";
	$query .= "ON animals.breedID=breed.breedID ";
	$query .= "WHERE animals.gender = '" . $animalsGender . "'";
	$query .= "AND breed.size = '".$breedSize."' ";
	$query .= "AND breed.type = '".$breedType."' ";
	$query .= "AND breed.temperament = '".$breedTemperament."' ";
	$query .= "AND breed.active = '".$breedActive."'"; // Get just the animals matching user's preferred pet size.
	
	if ($result=mysqli_query($connection,$query))
  {
    // Return the number of rows in result set
    $_SESSION['matchCount'] = mysqli_num_rows($result);
    // Free result set
    mysqli_free_result($result);
  }
	
	// Get pet data for comparsion
	$query = "SELECT animals.rspcaID, animals.petName, animals.description, animals.gender, animals.age, breed.active, breed.type, breed.size, breed.temperament ";
	$query .= "FROM breed ";
	$query .= "INNER JOIN animals ";
	$query .= "ON animals.breedID=breed.breedID ";
	$query .= "WHERE animals.gender = '".$animalsGender."' ";
	$query .= "AND breed.size = '".$breedSize."' ";
	$query .= "AND breed.type = '".$breedType."' ";
	$query .= "AND breed.temperament = '".$breedTemperament."' ";
	$query .= "AND breed.active = '".$breedActive."' ";
	$query .= "LIMIT $offset, 6"; // Get just the animals matching user's preferred pet size, 6 per page.
	
	$result = mysqli_query($connection, $query);
	
	return $result;

  // Close Connection
  mysqli_close($connection);
}

/* This function gets animals */
function getAnimals($offset)
{
  // Connect AWS MYSQL Server
  // require_once('./_php/connect.php');
  
  $host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
  $port=3306;
  $socket="";
  $user="proProg";
  $DBpassword="pawprogramming";
  $dbname="pawCompanion";
  $connection = new mysqli($host, $user, $DBpassword, $dbname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());
  
  $query = "SELECT rspcaID, petName, description ";
  $query .= "FROM animals ";
  $query .= "LIMIT $offset, 6";
  
  $result = mysqli_query($connection, $query);
  
  // Test for query error
	if(!$result) 
	{
		die("Database query failed - getAnimals()");
	}
  
  return $result;
  
  // Close Connection
  mysqli_close($connection);
}

/* This function adds a pet to the database */  
function addPet($rspcaID, $petName, $breedID, $age, $gender, $imageName, $description, $imageData) 
{
  // Connect AWS MYSQL Server
  require_once('./_php/connect.php');
  
  // Does the pet already exist in the database?
	$query = "SELECT rspcaID  ";
	$query .= "FROM animals ";
	$query .= "WHERE rspcaID=";
	$query .= "'" . $rspcaID . "'";
	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows($result) > 0)
	{
	  return;
	}
	
	// Perform Query
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
	if($result) 
	{
	  $new_id = mysqli_insert_id($connection);
	} 
	else 
	{
		// echo mysqli_error($connection);
		mysqli_close($connection);
		exit;
	}

	// Close database connection
	mysqli_close($connection);
}

/* This function updates a pet in the database with new image */
function updatePetWithImage($rspcaID, $petName, $breedID, $age, $gender, $imageName, $description, $imageData)
{
	// Connect AWS MYSQL Server
  require_once('./_php/connect.php');

  // Remove old pet record from database
  $query = "DELETE FROM animals ";
  $query .= "WHERE ";
  $query .= "rspcaID=";
  $query .= "'" . $rspcaID . "'";
  $result = mysqli_query($connection, $query);

  // Test for query error
  if($result) 
  {
    $new_id = mysqli_insert_id($connection);
  } 
  else 
  {
  	// echo mysqli_error($connection);
  	mysqli_close($connection);
  	exit;
  }
  
  // Check if pet already exists
	$query = "SELECT rspcaID  ";
	$query .= "FROM animals ";
	$query .= "WHERE rspcaID=";
	$query .= "'" . $rspcaID . "'";
	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows($result) > 0)
	{
	  return;
	}
	
	// Insert new pet record into database
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
	if($result) 
	{
	  $new_id = mysqli_insert_id($connection);
	} 
	else 
	{
		// echo mysqli_error($connection);
		mysqli_close($connection);
		exit;
	}

	// Close database connection
	mysqli_close($connection);
}

/* This function updates a pet in the database (without image) */ 
function updatePetWithoutImage($rspcaID, $petName, $breedID, $age, $gender, $description) 
{
  // Connect AWS MYSQL Server
  require_once('./_php/connect.php');
	
	// Add updated pet to the database
	$query = "UPDATE animals ";
	$query .= "SET ";
	$query .= "rspcaID ='" . $rspcaID . "',";
	$query .= "petName ='" . $petName . "',";
	$query .= "breedID ='" . $breedID . "',";
	$query .= "gender ='" . $gender . "',";
	$query .= "age ='" . $age . "',";
	$query .= "description ='" . $description . "'";
	$query .= "WHERE ";
  $query .= "rspcaID =";
  $query .= "'" . $rspcaID . "'";
	$result = mysqli_query($connection, $query);
	
	// Test for query error
	if($result) 
	{
	  $new_id = mysqli_insert_id($connection);
	} 
	else 
	{
		// echo mysqli_error($connection);
		mysqli_close($connection);
		exit;
	}

	// Close database connection
	mysqli_close($connection);
}

/* This function removes a pet from the database */   
function removePet($rspcaID) 
{
  // Connect AWS MYSQL Server
  require_once('./_php/connect.php');

  // Perform Query
  $query = "DELETE FROM animals ";
  $query .= "WHERE ";
  $query .= "rspcaID=";
  $query .= "'" . $rspcaID . "'";
  $result = mysqli_query($connection, $query);

  // Test for query error
  if($result) 
  {
    $new_id = mysqli_insert_id($connection);
  } 
  else 
  {
  	// echo mysqli_error($connection);
  	mysqli_close($connection);
  	exit;
  }
  
  // Close database connection
  mysqli_close($connection);
}

/* This function adds a breed to the database */  
function addBreed($breedSpecies, $breedName, $breedSize, $breedTemperament, $breedActive, $breedFee) 
{
  // Connect AWS MYSQL Server
  require_once('./_php/connect.php');
	
	// Does the breed already exist in the database?
	$query = "SELECT breedID  ";
	$query .= "FROM breed ";
	$query .= "WHERE breedID=";
	$query .= "'" . $breedID . "'";
	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows($result) > 0)
	{
	  phpAlert("The breed already exists in the database.");
	  return;
	}
	
	// Perform Query
	$query = "INSERT INTO breed ";
	$query .= "(type, name, size, temperament, active, fee) ";
	$query .= "VALUES (";
	$query .= "'" . $breedSpecies . "',";
	$query .= "'" . $breedName . "',";
	$query .= "'" . $breedSize . "',";
	$query .= "'" . $breedTemperament . "',";
	$query .= "'" . $breedActive . "',";
	$query .= "'" . $breedFee . "'";
	$query .= ")";
	$result = mysqli_query($connection, $query);
	
	// Test for query error
	if($result) 
	{
	  $new_id = mysqli_insert_id($connection);
	} 
	else 
	{
		// echo mysqli_error($connection);
		mysqli_close($connection);
		exit;
	}

	// Close database connection
	mysqli_close($connection);
}

/* This function updates a breed in the database */
function updateBreed($breedID, $breedType, $breedSize, $breedTemperament, $breedActive, $breedName, $breedFee)
{
	// Connect AWS MYSQL Server
  require_once('./_php/connect.php');
	
	// Add updated pet to the database
	$query = "UPDATE breed ";
	$query .= "SET ";
	$query .= "breedID ='" . $breedID . "',";
	$query .= "type ='" . $breedType . "',";
	$query .= "size ='" . $breedSize . "',";
	$query .= "temperament ='" . $breedTemperament . "',";
	$query .= "active ='" . $breedActive . "',";
	$query .= "name ='" . $breedName . "',";
	$query .= "fee ='" . $breedFee . "'";
	$query .= "WHERE ";
  $query .= "breedID =";
  $query .= "'" . $breedID . "'";
	$result = mysqli_query($connection, $query);
	
	// Test for query error
	if($result) 
	{
	  $new_id = mysqli_insert_id($connection);
	} 
	else 
	{
		// echo mysqli_error($connection);
		mysqli_close($connection);
		exit;
	}

	// Close database connection
	mysqli_close($connection);
}

/* This function removes a breed from the database */ 
function removeBreed($breedID) 
{
  // Connect AWS MYSQL Server
  require_once('./_php/connect.php');
  
  // Perform Query
  $query = "DELETE FROM breed ";
  $query .= "WHERE ";
  $query .= "breedID =";
  $query .= "'" . $breedID . "'";
  $result = mysqli_query($connection, $query);

  // Test for query error
  if($result) 
  {
    $new_id = mysqli_insert_id($connection);
  } 
  else 
  {
  	// echo mysqli_error($connection);
  	mysqli_close($connection);
  	exit;
  }
  
  // Close database connection
  mysqli_close($connection);
}
  
/* This function displays an image from the database */
// This function is called from matches.php
function displayImage($rspcaID)
{
  // Connect AWS MYSQL Server
  // require_once('./_php/connect.php');
  
  $host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
  $port=3306;
  $socket="";
  $user="proProg";
  $DBpassword="pawprogramming";
  $dbname="pawCompanion";
  $connection = new mysqli($host, $user, $DBpassword, $dbname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());

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
	
/* This function gets the name of the pet from the database */
function getAnimalName($rspcaID)
{
	// Connect AWS MYSQL Server
	// require_once('./_php/connect.php');
	
  $host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
  $port=3306;
  $socket="";
  $user="proProg";
  $DBpassword="pawprogramming";
  $dbname="pawCompanion";
  $connection = new mysqli($host, $user, $DBpassword, $dbname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());
    	
  // Get favourites
	$query = "SELECT * FROM animals";
	$result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result) 
	{
		die("Database query failed - getAnimalName()");
	}
	  
	// Iterate through results to get the user ID 
	while ($row = mysqli_fetch_assoc($result))
	{
	  // Match email to a row
	  if ($row["rspcaID"] == $rspcaID)
	  {
	    $petName = $row["petName"];
    }
	}
	  
	mysqli_close($connection);
	return $petName;
}
	
/* This function gets the description of the pet from the database */
function getAnimalDescription($rspcaID)
{
	// Connect AWS MYSQL Server
  $host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
  $port=3306;
  $socket="";
  $user="proProg";
  $DBpassword="pawprogramming";
  $dbname="pawCompanion";
  $connection = new mysqli($host, $user, $DBpassword, $dbname, $port, $socket)
    	or die ('Could not connect to the database server' . mysqli_connect_error());
    	
  // Get animals
	$query = "SELECT rspcaID, description FROM animals";
	$result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result) 
	{
	  die("8.2. Database query failed.");
	}
	  
	// Iterate through results to get the user ID 
	while ($row = mysqli_fetch_assoc($result))
	{
	  // Match email to a row
	  if ($row["rspcaID"] == $rspcaID)
	  {
	    $description = $row["description"];
    }
	}
	  
	mysqli_close($connection);
	return $description;
}
	
/* This function gets the user's favourites from the database */
function getFavourites()
{
	// Connect AWS MYSQL Server
  $host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
  $port=3306;
  $socket="";
  $user="proProg";
  $DBpassword="pawprogramming";
  $dbname="pawCompanion";
  $connection = new mysqli($host, $user, $DBpassword, $dbname, $port, $socket)
    	or die ('Could not connect to the database server' . mysqli_connect_error());
    	
  // Get favourites
	$query = "SELECT * FROM favourites";
	$result = mysqli_query($connection, $query);
	  
	// Test for query error
	if(!$result) 
	{
		die("9. Database query failed.");
	}
	  
	mysqli_close($connection);
	return $result;
}
	
/* This function gets the number of favourites for the user (for pagination) */
function getNumberOfFavouritesForUser()
{
	// Connect AWS MYSQL Server
  $host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
  $port=3306;
  $socket="";
  $user="proProg";
  $DBpassword="pawprogramming";
  $dbname="pawCompanion";
  $connection = new mysqli($host, $user, $DBpassword, $dbname, $port, $socket)
    	or die ('Could not connect to the database server' . mysqli_connect_error());
    
  $query = "SELECT * FROM favourites ";
  $result = mysqli_query($connection, $query);
	  
  // Test for query error
	if(!$result) 
	{
	  die("10. Database query failed.");
	}
	  
	$numberOfFavourites = 0;
	while ($row = mysqli_fetch_assoc($result))
	{
	  $numberOfFavourites += 1;
	}

  mysqli_close($connection);
  return $numberOfFavourites;
}
	
/* This function prints a popdown alert message to the screen */
function phpAlert($msg) 
{
  echo '<script type="text/javascript">alert("'.$msg.'")</script>';
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
  
/* This is a diagnostic feature for writing information to console */
function debug_to_console($data) {
  if (is_array($data))
    $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) . "' );</script>";
  else
    $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
 
  echo $output;
}
	
?>