<?php
  session_start();
  
  // Function to determine request type is POST 
  function is_post_request() {
 return $_SERVER['REQUEST_METHOD'] == 'POST';
}

// Function to determine request type is GET 
function is_get_request() {
 return $_SERVER['REQUEST_METHOD'] == 'GET';
}

  /* This function registers a user */
  function registerUser($firstname, $lastname, $email, $password, $visits)
  {
    
     debug_to_console("registering User");
      debug_to_console("pass: " . $password);
     
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
      
      $_SESSION['validUser'] = true;
      $_SESSION['usertype'] = $usertype;
      header('Location: index2.php');
    }
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
        debug_to_console("password NO match");
        debug_to_console("Entered: " . md5($password));
       	debug_to_console("DB : " . $row['password']);
      } else {
       	debug_to_console("password is match");
       	while ($row = mysqli_fetch_assoc($result))
       	{
       	  $validUser = true;
       	  $usertype = $row["userType"];
       	  	debug_to_console("admin: " . $row['userType']);
       	  setMessage("user is a: " . $usertype);
       	}
      }
    }
  
  if ($validUser == true) 
  {
    $_SESSION['validUser'] = true;
    $_SESSION['usertype'] = $usertype;
    header('Location: index2.php');
  }else{
    $_SESSION['validUser'] = false;
  }
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
    
    $validUser = false;
    
    if (checkStatus() == 'signed out')
    {
      $result = 'signed out';
    }
    else
    {
      $result = 'signed in';
    }
    header('Location: index2.php');	
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
     include_once('_php/connect.php');
    
    $query = "UPDATE user SET userType='admin' WHERE email='" . $email . "'";

    if (mysqli_query($connection, $query)) {
      echo "User updated successfully";
    } else {
      echo "User not found: " . mysqli_error($connection);
    };
    
    

    mysqli_close($connection);
  }
  
  /* This function demotes admin user to normal user */
  function demoteAdminUser($email)
  {
    include_once('_php/connect.php');
    
    $query = "UPDATE user SET userType='normal' WHERE email='" . $email . "'";

    if (mysqli_query($connection, $query)) {
      echo "User updated successfully";
    } else {
      echo "User not found: " . mysqli_error($connection);
    };
    

    mysqli_close($connection);
  }
  
  /* This function checks the number of users in the database. */
  function checkNumberUsersInFile()
  {
    require_once('./_php/connect.php');
    
    $query = "SELECT * ";
	  $query .= "FROM user ";
  	$result = mysqli_query($connection, $query);
	  
	  // Test for query error
	  if(!$result) 
	  {
		  die("6. Database query failed.");
	  }
	  
	  $size = 0;
	  
	  while ($row = mysqli_fetch_assoc($result))
	  {
	   
	    $size += 1;
	    //
	  }

    mysqli_close($connection);
    setMessage($size);
    return $size;
  }
  
  
  function addBreed() {
    // Connect AWS MYSQL Server
require_once('../_php/connect.php');





 if(is_post_request()) {
    
    // $species = $_POST['species'];
    $species = $_POST['species'];
    $breedName = $_POST['breedName'];
    $breedSize = $_POST['breedSize'];
    $temperament = $_POST['temperament'];
    $active = $_POST['active'];
    $fee = $_POST['fee'];


    
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


} else {
	// Redirect to another page if it is not a POST request
}



	// 5. Close database connection
	mysqli_close($connection);
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
?>