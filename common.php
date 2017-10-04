<?php
  session_start();

  /* This function registers a user */
  function registerUser($firstname, $lastword, $email, $password, $visits, $usertype)
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
        $result = "unsuccessful";
        break;
   	  }
   	  else
   	  {
   	    $result = 'success';
   	    echo $result;
   	  }
    }

    // If everything is okay -> store user data
    if ($result == 'success')
    {
      // Secure password string
   	  $userpass = md5($password);
   	  fwrite($fp, "$email\t$userpass\t$lastname\t$firstname\t$visits\t$usertype\n");
   	  $_SESSION['validUser'] = true;
      $_SESSION['usertype'] = $usertype;
      header('Location: index2.php');
    }
    
    fclose($fp);
    return $result;
  }

  /* This function logs the user in */
  function signInUser($email, $password)
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

    /* Super user: email/username = super, password = super */
    if ($email == "super")
    {
      if ($password == "super")
      {
        $validUser = true;
        $usertype = "admin";
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
   	      $usertype = $member[5];
   	  	  $_SESSION['email'] = $email;
   	    }
   	  break;
   	  }
    }
    
    fclose($fp);

    if ($validUser != true) 
    {
      $result = 'unsuccessful';
    }
    else
    {
      $result = 'success';
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
   	  
    return $result;
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
    
    if (checkStatus() == 'not_logged_in')
    {
      $result = 'success';
    }
    else
    {
      $result = 'unsuccessful';
    }
    header('Location: index2.php');	
    return $result;
  }

  /* This function checks whether the user is logged in or not */
  function checkStatus()
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
    $fp = fopen("users.txt","w+");
    rewind($fp);
   	  
    $ln = file("users.txt");
    $numberOfMembers = count($ln);
    
    for ($i=0; $i<$numberOfMembers; $i++) 
    {
      $member = explode("\t", $ln[$i]);
   	
   	  if ($member[0] == $email)  
   	  {
   	    // User exists.
   	    $delete = $member;
   	    $email = $member[0];
   	    $userpass = $member[1];
   	    $lastname = $member[2];
   	    $firstname = $member[3];
   	    $visits = $member[4];
   	    $usertype = 'admin';
   	  }
    }
    
    $data = file("users.txt");
    $out = array();

    foreach($data as $line) 
    {
      if(trim($line) != $delete) 
      {
        $out[] = $line;
      }
    }
    
    flock($fp, LOCK_EX);
    
    foreach($out as $line) 
    {
      fwrite($fp, $line);
    }
    
    fwrite($fp, "$email\t$userpass\t$lastname\t$firstname\t$visits\t$usertype\n");
    
    flock($fp, LOCK_UN);
    fclose($fp);
    return $email;
    
  }
?>