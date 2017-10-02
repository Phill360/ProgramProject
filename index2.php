<?php
	require_once('common.php');
	$status = checkUser();
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
</body>
</html>