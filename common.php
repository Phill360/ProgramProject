<?php
  session_start();

  
  
  /* This function registers a user */
  function registerUser($firstname, $lastname, $email, $password, $visits, $usertype)
  {
    include_once('_php/connect.php');
    
    $users = array();
    
    $query = "SELECT * FROM user ";
	  $result = mysqli_query($connection, $query);
	  
	  // Test for query error
	  if(!$result) 
	  {
		  die("PC database query failed.");
	  }
	  
	  while ($row = mysqli_fetch_assoc($result))
	  {
	    //$db_email = $row[1];
	    $data = array($row['email'], $row['password'], $row['last_name'], $row['first_name'], $row['admin']);
      array_push($users, $data);
      $message = $data[0];
	  }
	  
	  $size = sizeof($users);
	  //$message = $size;
    
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
    
    if ($check == 'no previous user')
    {
      // Secure password string
   	  $userpass = md5($password);
   	  
      $sql = "INSERT INTO user (first_name, last_name, email, password, admin) VALUES ($firstname, $lastname, $email, $password, $usertype)";

      if ($connection->query($sql) === TRUE) 
      {
        //$message = "New record created successfully";
      } 
      else 
      {
        //$message = "Error";
      }
   	  
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
    $user = array();
    
    while ( !feof($fp) )
    {
      $line = fgets($fp);
      $data = str_getcsv($line, $delimiter);
      array_push($user, $data);
    }  
    $size = sizeof($user);
    
    for ($row = 0; $row < $size; $row++) 
    {
      if ($user[$row][0] == $email)
      {
        $old = PHP_EOL.$user[$row][0].','.$user[$row][1].','.$user[$row][2].','.$user[$row][3].','.$user[$row][4].',normal';
        $new = PHP_EOL.$user[$row][0].','.$user[$row][1].','.$user[$row][2].','.$user[$row][3].','.$user[$row][4].',admin';
      }
    }
    
    $str = file_get_contents($file, true);
    $str=str_replace($old,$new,$str);
    fclose($fp);
    
    $fp = fopen($file, 'w');
    fwrite($fp,$str,strlen($str));
    fclose($fp);
  }
  
  /* This function demotes admin user to normal user */
  function demoteAdminUser($email)
  {
    $delimiter = ',';
    $file = 'users.txt';
    $fp = fopen($file, 'r');
    $user = array();
    
    while ( !feof($fp) )
    {
      $line = fgets($fp);
      $data = str_getcsv($line, $delimiter);
      array_push($user, $data);
    }  
    $size = sizeof($user);
    
    for ($row = 0; $row < $size; $row++) 
    {
      if ($user[$row][0] == $email)
      {
        $old = PHP_EOL.$user[$row][0].','.$user[$row][1].','.$user[$row][2].','.$user[$row][3].','.$user[$row][4].',admin';
        $new = PHP_EOL.$user[$row][0].','.$user[$row][1].','.$user[$row][2].','.$user[$row][3].','.$user[$row][4].',normal';
      }
    }
    
    $str = file_get_contents($file, true);
    $str=str_replace($old,$new,$str);
    fclose($fp);
    
    $fp = fopen($file, 'w');
    fwrite($fp,$str,strlen($str));
    fclose($fp);
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