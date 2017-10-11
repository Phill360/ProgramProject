<?php
  session_start();
  
  

  /* This function registers a user */
  function registerUser($firstname, $lastname, $email, $password, $visits, $usertype)
  {
    
     debug_to_console("registering User");
      debug_to_console("pass: " . $password);
     
    require_once('./_php/connect.php');
    
    // Connect to the table user in database
    $query = "SELECT * "; 
	  $query .= "FROM user ";
	  $result = mysqli_query($connection, $query); // This is not working here
	  
	  // Test for query error
	  if(!$result)
	  {
		  die("1. Database query failed.");
	  }
	  
	  
	  
	  while ($row = mysqli_fetch_assoc($result))
	  {
	   
	    if ($row["email"] == $email)
	    {
	      $check = 'previous user exists';
	    }
	    else
      {
        $check = 'no previous user';
      }
	  }
    
    if ($check == 'no previous user')
    {
      // Secure password string
   	  $userpass = $password;
   	  debug_to_console("pass: " . $password);
   	  debug_to_console("Md5" . $userpass);
   	  
   	 // $id = '0';
   	  
      $query = "INSERT INTO user ";
      $query .= "(firstName, lastName, email, password, admin) ";
      $query .= "VALUES (";
      $query .= "'" . $firstname . "',";
      $query .= "'" . $lastname . "',";
      $query .= "'" . $email . "',";
      $query .= "'" . $userpass . "',";
      $query .= "'" . $usertype . "'";
      $query .= ")";
      $write = mysqli_query($connection, $query); // Not working here either

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
    setMessage($password);
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
      
     

    
      $query = "SELECT * ";
	    $query .= "FROM user ";
	    $query .= "WHERE email='" . $email . "'";
  	  $result = mysqli_query($connection, $query);
	  
	    // Test for query error
	    if(!$result) 
	    {
		    die("3. Database query failed.");
	    }
	  
	  //$row = mysqli_fetch_assoc($result);
	  

	  
	    while ($row = mysqli_fetch_assoc($result))
	    {
	      debug_to_console($row);
	      if ($row['email'] == $email)
        {
           debug_to_console("email is match");
            
   	         
          // User exists, now check the password.
          if ($row['password'] == md5($password))
   	      {
   	          debug_to_console("password is match");
   	         
   	        $validUser = true;
   	        $usertype = $row["admin"];
   	      } else {
   	         debug_to_console("password NO match");

   	         debug_to_console("Entered: " . md5($password));
   	         debug_to_console("DB : " . $row['password']);
   	      }
   	      
        }
	    }
    }
    
    if ($validUser == true) 
    {
      $_SESSION['validUser'] = true;
      $_SESSION['usertype'] = $usertype;
      header('Location: index2.php');	  
    }
    else
    {
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
    
    if ($_SESSION['usertype'] == '1')
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
    
    $query = "UPDATE user SET admin='1' WHERE email='" . $email . "'";

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
    
    $query = "UPDATE user SET admin='0' WHERE email='" . $email . "'";

    if (mysqli_query($connection, $query)) {
      echo "User updated successfully";
    } else {
      echo "User not found: " . mysqli_error($connection);
    };
    

    mysqli_close($connection);
  }
  
  /* This function checks the number of users in the text file. */
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
  
  function debug_to_console($data) {
    if (is_array($data))
        $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
 
    echo $output;
}
?>