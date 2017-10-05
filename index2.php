<?php
	require_once('common.php');
	$status = checkStatus();
	$usertype = checkUserType();
	$number = checkNumberUsersInFile();
	$message = getMessage();
	
	echo('The system is '.$status.' - ');
	echo(' '.$usertype.' user. - ');
	echo('There are '.$number.' users in file. - ');
	echo('Message: '.$message);
	
	
  
  if (isset($_POST['registerBtn']))
  {
		$visits = 0;
		$usertype = "normal";
		
		// Get user input
		$firstname  = isset($_POST['firstname']) ? $_POST['firstname'] : '';
		$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		
        /* Validate email address */
		$regexp = "/^[a-zA-Z0-9_\.]+@[a-zA-Z0-9\-]+([.][a-zA-Z0-9\-]+)*[.][a-zA-Z]{2,3}$/";
 
		if(!preg_match($regexp, $email))
		{       
		   echo("Not a valid email address");
		}
		else if($password == '')   
		{
			echo("No password entered");
		}
		else if($firstname == '')
		{
			echo("No first name entered");
		}
		else if($lastname == '')
		{
			echo("No last name entered");
		}
		else
		{
			// Try to register the user
			$result = registerUser($firstname, $lastword, $email, $password, $visits, $usertype);
			setMessage(' The result is - '.$result);
		}
  }
  
  
  
  if (isset($_POST['signInBtn']))
  {
		// Get user input
		$email  = isset($_POST['email']) ? $_POST['email'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';

		// Try to register the user
		signInUser($email,$password);
  }
  
  
  
  if(isset($_POST['signOutBtn']))
  {
    signOutUser();
  }
  
  
  
  if(isset($_POST['createNewAdminUserBtn']))
  {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    createNewAdminUser($email);
  }
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Paw Companions</title>
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
  if ($status == 'signed in' && $usertype == 'admin')
  {?>
    <div><?php include 'admin_user.php' ?></div>
<?php }
  else if ($status == 'signed in' && $usertype == 'normal')
  {?>
    <div><?php include 'search.php' ?></div>
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
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signInForm">
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
            <button name="signInBtn" type="submit" class="btn btn-primary">Sign in</button>
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
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="registerForm">
            <div class="input-group">
              <span class="input-group-addon">Text</span>
              <input id="firstname" type="text" class="form-control" name="firstname" placeholder="First name">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon">Text</span>
              <input id="lastname" type="text" class="form-control" name="lastname" placeholder="Last name">
            </div>
            <br>
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
            <button name="registerBtn" type="submit" class="btn btn-primary">Register</button>
          </form>
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