<?php
  session_start();

  /* This function registers a user */
  function registerUser($firstname, $lastword, $email, $password)
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
   	if ($member[0] == $email)
   	{
        $result = "The selected user name is taken!";
        break;
   	}
   	else
   	{
   	  $result = 'success';
   	}
    }

    // If everything is okay -> store user data
    if ($result == 'success')
    {
      // Secure password string
   	$userpass = md5($password);
   	fwrite($fp, "$email\t$userpass\t$lastname\t$firstname\n");	  	  
    }
    
    fclose($fp);
    return $result;
  }

  /* This function logs the user in */
  function loginUser($email, $password)
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

    /* Hardwire code for admin login with email and password both being super */
    if ($email == "super")
    {
      if ($password == "super")
      {
        $validUser = true;
   	  $_SESSION['email'] = "super";
      }
    }
   	  
    for ($i=0; $i<$numberOfMembers; $i++) 
    {
      $member = explode("\t", $line[$i]);
   	
   	if ($member[0] == $email)  
   	{
   	  // User exists, check password
   	  if (trim($member[1]) == trim(md5($password)))
   	  {
   	    $validUser = true;
   	  	 $_SESSION['email'] = $email;
   	  }
      
   	  break;
   	}
    }
    fclose($fp);

    if ($validUser != true) 
    {
      $result = 'Invalid email or password!';
    }
    else
    {
      $result = 'success';
    }
    
    if ($validUser == true) 
    {
      if ($email == super)
      {
        $_SESSION['validUser'] = true;
        header('Location: index2.php');
      }
      else
      {
   	  $_SESSION['validUser'] = true;
   	  header("Location: index2.php");
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
    unset($_SESSION['email']);
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