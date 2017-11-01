<?php

  function is_ajax_request() 
  {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  if(!is_ajax_request()) { exit; }

  // extract $id
  $animalID = isset($_POST['id']) ? $_POST['id'] : '';
  echo $animalID;
  
  $userID = $_SESSION[email];
  addPetToFavourites($userID, $animalID);
  
?>