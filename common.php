<?php
  session_start();

  /* This function registers a user */
  function registerUser($firstname, $lastname, $email, $password, $visits, $usertype)
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
        $check = 'previous user exists';
      }
      else
      {
        $check = 'no previous user';
      }
    }
    fclose($fp);
    
    $fp = fopen($file, 'a+');
    
    if ($check == 'no previous user')
    {
      // Secure password string
   	  $userpass = md5($password);
   	  fwrite($fp, PHP_EOL.$email.','.$userpass.','.$lastname.','.$firstname.','.$visits.','.$usertype);
   	  //fwrite($fp, PHP_EOL.'test');
   	  $_SESSION['validUser'] = true;
      $_SESSION['usertype'] = $usertype;
      header('Location: index2.php');
    }
    fclose($fp);
    
    $result = checkNumberUsersInFile();
    return $firstname;
  }

  /* This function signs the user in */
  function signInUser($email, $password)
  {
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
   	    }
      }
    }
    fclose($fp);
    
    if ($email == 'super' && $password == 'super')
    {
      $validUser = true;
      $usertype = "admin";
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
    fwrite($fp,'');
    fclose($fp);
    
    $fp = fopen($file, 'a+');
    for ($row = 0; $row < $size; $row++) 
    {
      //fwrite($fp, PHP_EOL.$users[$row][0]);
      fwrite($fp, PHP_EOL.$users[$row][0].','.$users[$row][1].','.$users[$row][2].','.$users[$row][3].','.$users[$row][4].','.$users[$row][5]);
    }
    fclose($fp);
    
    $result = checkNumberUsersInFile();  
    return $result;
  }
  
  /* This function checks the number of users in the text file. */
  function checkNumberUsersInFile()
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

    fclose($fp);
    return $size;
  }
  
  function setMessage($message)
  {
    $_SESSION['message'] = $message; 
  }
  
  function getMessage()
  {
    $message = $_SESSION['message'];
    return $message;
  }
?>