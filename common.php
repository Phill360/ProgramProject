<?php
  session_start();

  /* This function registers a user */
  function registerUser($firstname, $lastword, $username, $password)
  {
    $result = 'success';

    // Check user existance
    $fp = fopen("users.txt","a");
    rewind($fp);
   	  
    $line = file("users.txt");
    $numberOfMembers = count($line);

    for ($i=0; $i<$numberOfMembers; $i++)
    {
      $member = explode("\t", $line[$i]);
   	if ($member[0] == $username)
   	{
        $result = "The selected user name is taken!";
        break;
   	}
   	else
   	{
   	  $result = 'success';
   	}
    }

    // If everything is OK -> store user data
    if ($result == 'success')
    {
      // Secure password string
   	$userpass = md5($password);

   	fwrite($fp, "$username\t$userpass\t$lastname\t$firstname\n");	  	  
    }
    
    fclose($fp);
    return $result;
  }

  /* This function logs the user in */
  function loginUser($username, $password)
  {
    $result = '';
    $validUser = false;

    // Create file in case it does not already exist
    $fp = fopen("users.txt", "a");
    fclose($fp);
   	  
    // Check user existance	
    $fp = fopen("users.txt","r");
    rewind($fp);
   	  
    $line = file("users.txt");
    $numberOfMembers = count($line);

    /* Hardwire code for admin login with username and password both being super */
    if ($username == "super")
    {
      if ($password == "super")
      {
        $validUser = true;
   	  $_SESSION['userName'] = "super";
      }
    }
   	  
    for ($i=0; $i<$numberOfMembers; $i++) 
    {
      $member = explode("\t", $line[$i]);
   	
   	if ($member[0] == $username)  
   	{
   	  // User exists, check password
   	  if (trim($member[1]) == trim(md5($password)))
   	  {
   	    $validUser = true;
   	  	 $_SESSION['userName'] = $username;
   	  }
      
   	  break;
   	}
    }
    fclose($fp);

    if ($validUser != true) 
    {
      $result = 'Invalid username or password!';
    }
    else
    {
      $result = 'success';
    }
    
    if ($validUser == true) 
    {
      if ($username == super)
      {
        $_SESSION['validUser'] = true;
        header('Location: index2.php');
      }
      else
      {
   	  $_SESSION['validUser'] = true;
   	  header("Location: index.php");
      }	  
    }
    else
    {
      $_SESSION['validUser'] = false;
    }
   	  
    return $result;
  }

  /* This function unsets all session variables and logs the user out */
  function logoutUser()
  {
    unset($_SESSION['validUser']);
    unset($_SESSION['userName']);
  }

  /* This function checks whether the user is logged in or not */
  function checkUser()
  {
    $status = '';
   	
    if ((!isset($_SESSION['validUser'])) || ($_SESSION['validUser'] != true))
    {
      $status = 'not_logged_in';
    }
    else
    {
	   $status = 'logged_in';
    }
	  
    return $status;
  }
?>