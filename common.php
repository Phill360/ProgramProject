<?php
  session_start();

  /* This function registers a user */
  function registerUser($firstname, $lastname, $email, $password, $visits, $usertype)
  {
    include_once('_php/connect.php');
    
    $query = "SELECT * FROM user ";
	  $result = mysqli_query($connection, $query);
	  
	  // Test for query error
	  if(!$result) 
	  {
		  die("PC database query failed.");
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
   	  $userpass = md5($password);
   	  
   	  $id = '0';
   	  
      $query = 'INSERT INTO user (userID, firstname, ';
      $query .= 'lastname, email, password, admin) VALUES ($id.','.$firstname.','.';
      $query .= '$lastname.','.$email.','.$userpass.','.$usertype)');

      
      
      $_SESSION['validUser'] = true;
      $_SESSION['usertype'] = $usertype;
      header('Location: index2.php');
    }
    mysqli_close($connection);
    setMessage($message);
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
      include_once('_php/connect.php');
      
      // Check user existance	
      $query = "SELECT * FROM user ";
	    $result = mysqli_query($connection, $query);
	  
	    // Test for query error
	    if(!$result) 
	    {
		    die("PC database query failed.");
	    }
	  
	    while ($row = mysqli_fetch_assoc($result))
	    {
	      if ($row["email"] == $email)
        {
          // User exists, now check the password.
          if ($row["password"] == md5($password))
   	      {
   	        $validUser = true;
   	        $usertype = $row["admin"];
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
    $status = '';
   	
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
    $usertype = '';
   	
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
  
  /* This function switches a user from normal to admin */
  function createNewAdminUser($email)
  {
    include_once('_php/connect.php');
    
    $query = "SELECT * FROM user ";
	  $result = mysqli_query($connection, $query);
	  
	  // Test for query error
	  if(!$result) 
	  {
		  die("PC database query failed.");
	  }
	  
	  while ($row = mysqli_fetch_assoc($result))
	  {
	    if ($row["email"] == $email)
      {
        //mysqli_query($connection, 'INSERT INTO user (admin) VALUES ('normal')');
      }
    }
    mysqli_close($connection);
  }
  
  /* This function demotes admin user to normal user */
  function demoteAdminUser($email)
  {
    include_once('_php/connect.php');
    
    $query = "SELECT * FROM user ";
	  $result = mysqli_query($connection, $query);
	  
	  // Test for query error
	  if(!$result) 
	  {
		  die("PC database query failed.");
	  }
	  
	  while ($row = mysqli_fetch_assoc($result))
	  {
	    if ($row["email"] == $email)
      {
        //mysqli_query($connection, 'INSERT INTO user (admin) VALUES ('admin')');
      }
    }
    mysqli_close($connection);
  }
  
  /* This function checks the number of users in the text file. */
  function checkNumberUsersInFile()
  {
    $delimiter = ',';
    $file = 'users.txt';
    $fp = fopen($file, 'r');
    $users = array();
    
    while (! feof($fp))
    {
      $line = fgets($fp);
      $data = str_getcsv($line, $delimiter);
      array_push($users, $data);
    }
    
    $size = sizeof($users) -1;

    fclose($fp);
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
?>