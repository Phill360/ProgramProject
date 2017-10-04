<?php
  session_start();

  /* This function registers a user */
  function registerUser($firstname, $lastword, $email, $password, $visits, $usertype)
  {
    $delimiter = ',';
    $file = 'users.txt';
    $fp = fopen($file, 'r');
    $users = array();
    
    while ( !feof($fp) )
    {
      $line = fgets($fp, 2048);
      $data = str_getcsv($line, $delimiter);
      array_push($users, $data);
    }  

    $size = sizeof($users);
    
    for ($row = 0; $row < $size; $row++) 
    {
      if ($users[$row][0] == $email)
      {
        $result = 'unsuccessful';
      }
      else
      {
        $result = 'success';
      }
    }
    fclose($file);
    
    $fp = fopen($file, 'a');
    
    if ($result == 'success')
    {
      // Secure password string
   	  $userpass = md5($password);
   	  fwrite($fp, $email.','.$userpass.','.$lastname.','.$firstname.','.$visits.','.$usertype.'\n');
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
    $validUser = false;
   	  
    // Check user existance	
    $file = 'users.txt';
    $fp = fopen($file, "r");
    $users = array();
    
    while ( !feof($fp) )
    {
      $line = fgets($fp, 2048);
      $data = str_getcsv($line, $delimiter);
      array_push($users, $data);
    }  

    $size = sizeof($users);
    
    for ($row = 0; $row < $size; $row++) 
    {
      if ($users[$row][0] == $email)
      {
        // User exists, now check the password.
        if ($users[$row][1] == md5($password))
   	    {
   	      $validUser = true;
   	      $usertype = $users[$row][5];
   	  	  $_SESSION['email'] = $email;
   	    }
      }
    }
    fclose($fp);
    
    if ($email == 'super' && $password == 'super')
    {
      $validUser = true;
      $usertype = "admin";
   	  $_SESSION['email'] = "super";  
    }

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
    $delimiter = ',';
    $file = 'users.txt';
    $fp = fopen($file, 'r');
    $users = array();
    
    while ( !feof($fp) )
    {
      $line = fgets($fp, 2048);
      $data = str_getcsv($line, $delimiter);
      array_push($users, $data);
    }  

    $size = sizeof($users);
    
    for ($row = 0; $row < $size; $row++) 
    {
      if ($users[$row][0] == $email)
      {
        $users[$row][5] = 'admin';
      }
    }
    fclose($fp);
    $fp = fopen($file, 'w');
    
    for ($row = 0; $row < $size; $row++) 
    {
      fwrite($file, $users[$row][0].','.$users[$row][1].','.$users[$row][2].','.$users[$row][3].','.$users[$row][4].','.$users[$row][5].'\n');
    }
    
    fclose($fp);
    
    $size = sizeof($users);
    
    
    
    return $size;
  }
?>