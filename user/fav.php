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
  
  getAnimalsFromDatabase();
  
?>