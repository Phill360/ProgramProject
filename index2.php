<?php
	require_once('common.php');
	$status = checkUser();
	
	if (isset($_POST['submitBttn']))
  {
		// Get user input
		$username  = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';

		// Try to register the user
		$result = loginUser($username,$password);
  }
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Paw Companions Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="upload-image.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Slackey" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="pcstyle.css">
  
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta name="google-signin-client_id" content="979917733927-ucaoh1mmkqkmpp8oqfnonj45fjdcd7n4.apps.googleusercontent.com">
</head>

<body>
<div><?php include 'header.php' ?></div>

<?php 
  if ($status == 'logged_in')
  {?>
    <div><?php include 'admin_user.php' ?></div>
<?php }
  else
  {?>
    <div><?php include 'start.php' ?></div>
<?php } ?>

<!-- Sign In Modal -->
  <div id="signInModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><div class="slackey"><div class="textLarge">Sign in</div></div></div>
        </div>
        <div class="modal-body">
          <div class="g-signin2" data-onsuccess="onSignIn"></div>
          <br>
          
          
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="email" type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <br>
            <div class="checkbox">
              <label><input type="checkbox" name="remember">Remember me</label>
            </div>
            <button name="submitBttn" type="submit" class="btn btn-primary">Submit</button>
          </form>
          
          
          
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Register Modal -->
  <div id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><div class="slackey"><div class="textLarge">Register</div></div></div>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>