<?php
	require_once('common.php');
	$status = checkUser();
	
	if (isset($_POST['signOutBtn']))
  {
		// Get user input
		logoutUser();
  }
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <?php
	require_once('common.php');
	$status = checkUser();
  ?>

  <script>
$(document).ready(function() {
   $('#signOutBtn').on('click', function() {
      alert("You clicked me!");
   });
});
  </script>

</head>

<body>
<div class="container">
  <div class="jumbotron">
    <div class="slackey"><div class="orange"><div class="textHuge">Paw Companions</div></div></div>
    <div class="slackey"><div class="black"><div class="textxLarge">Find your true companion</div></div></div>
    
    
    <div class="btn-toolbar">
      <?php 
      if ($status != 'logged_in')
      {?>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#signInModal">Sign in</button>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#registerModal">Register</button>
      <?php
      }
      else
      {?>
        <button id="signOutBtn" type="button" class="btn btn-primary pull-right" onclick="signOut()">Sign out</button>
      <?php
      }?>
        
    </div>
  </div>
</div>
</body>
</html>