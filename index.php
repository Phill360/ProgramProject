<?php
	include_once('./common.php');
	
	$status = checkStatus();
	$usertype = checkUserType();
	debug_to_console("user: " . $_SESSION['usertype']);
	
	$message = getMessage();
	echo('Message: '.$message);

  // When the user registers
  if (isset($_POST['registerBtn']))
  {
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
			// Register the user
			$result = registerUser($firstname, $lastname, $email, $password, $visits);
		}
  }
  
  // User sign in
  if (isset($_POST['signInBtn']))
  {
		// Get user input
		$email  = isset($_POST['email']) ? $_POST['email'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';

		// Sign in the user
		signInUser($email,$password);
  }
  
  // When the user signs out
  if(isset($_POST['signOutBtn']))
  {
    signOutUser();
  }
  
  // When the admin user promotes another user from normal to admin user
  if(isset($_POST['createNewAdminUserBtn']))
  {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    createNewAdminUser($email);
  }
  
  // When the admin user demotes another user from admin to normal user
  if(isset($_POST['demoteAdminUserBtn']))
  {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    demoteAdminUser($email);
  }
  
 if (isset($_POST['addPetBtn']))
  {
		// Get pet input
    $rspcaID = $_POST['rspcaID'];
    $petName = $_POST['petName'];
    $breedID = $_POST['breedID'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $imagePath = $_POST['file'];
    $description = $_POST['description'];
  
    if($rspcaID == ''){
      
    } else { 
      addPet($rspcaID, $petName, $breedID, $age, $gender, $imagePath, $description);
    }
  }
  
 if (isset($_POST['addBreedBtn']))
  {
		// Get breed input
		$species = isset($_POST['species']) ? $_POST['species'] : '';
    $breedName = isset($_POST['breedName']) ? $_POST['breedName'] : '';
    $breedSize = isset($_POST['breedSize']) ? $_POST['breedSize'] : '';
    $temperament = isset($_POST['temperament']) ? $_POST['temperament'] : '';
    $active = isset($_POST['active']) ? $_POST['active'] : '';
    $fee = isset($_POST['fee']) ? $_POST['fee'] : '';
    
    if($species == ''){
      // 
    } else {
    addBreed($species, $breedName,$breedSize, $breedSize, $temperament, $active, $fee);
    }
  }
  
  if (isset($_POST['remPetBtn']))
  {
		// Get delete pet input
    $rspcaID = $_POST['rspcaID'];
    remPet($rspcaID);

  }
  
  if (isset($_POST['remBreedBtn']))
  {
		// Get delete breed input
    $breedID = $_POST['breedID'];
    remBreed($breedID);
  }
  
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Paw Companions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Google services -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta name="google-signin-client_id" content="979917733927-ucaoh1mmkqkmpp8oqfnonj45fjdcd7n4.apps.googleusercontent.com">
  
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="upload-image.js"></script>

  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Slackey" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  
  <!-- Pet Companions CSS -->
  <link rel="stylesheet" type="text/css" href="css/pcstyle.css">
  
</head>

<body>
<div><?php include 'header.php' ?></div>

<!-- control home page shown depending in user account type -->
<!-- this should be done in one php block -- JenCam TO DO -->
<?php
  if ($status == 'signed in' && $usertype == 'normal')
  {
    $userID = getUserID($email);
    $profile = checkIfUserHasProfile($userID);
    
    ?><div><?php include 'search.php' ?></div> 
  <?php }
  else if ($status == 'signed in' && $usertype == 'admin')
  {?>
    <div><?php include 'admin/admin.php' ?></div>
  <?php } 
  else
  {?>
    <div><?php include 'carousel.php' ?></div>
  <?php } ?>

<div><?php include 'footer.php' ?></div>

  <!-- Sign in -->
  <div id="signInModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><div class="slackey"><div class="textLarge">Sign In</div></div></div>
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
              <span class="input-group-addon">First Name</span>
              <input id="firstname" type="text" class="form-control" name="firstname" placeholder="First name">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon">Last Name</span>
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
            <p>By pressing submit, you accept our<a href="terms.php">Terms and Conditions</a></p>
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
