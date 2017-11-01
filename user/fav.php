<?php

  function is_ajax_request() 
  {
      return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
      echo('reaching 1');
  }
  
  if(!is_ajax_request())
  {
      echo('reaching 2');
      exit;
  }
  
  $raw_id = isset($_POST['id']) ? $_POST['id'] : '';
  echo $raw_id;
?>