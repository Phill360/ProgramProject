<?php
  session_start();
  include_once('./common.php');
  
  function is_ajax_request() 
  {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  if(!is_ajax_request()) { exit; }

  // Get the current user
  $userID = $_SESSION[email];
  
  // Extract $id
  $animalID = isset($_POST['id']) ? $_POST['id'] : '';
  echo ($userID." loves ". $animalID);
  
  // Connect AWS MYSQL Server
    $host="petdatabase.colkfztcejwd.us-east-2.rds.amazonaws.com";
    $port=3306;
    $socket="";
    $user="proProg";
    $DBpassword="pawprogramming";
    $dbname="pawCompanion";
    $connection = new mysqli($host, $user, $DBpassword, $dbname, $port, $socket)
    	or die ('Could not connect to the database server' . mysqli_connect_error());
    	
    	
    $query = "INSERT INTO favourites (userID, animalID) VALUES('". $userID ."','". $animalID ."');";
	  $result = mysqli_query($connection, $query);	
    
    mysqli_close($connection);
?>