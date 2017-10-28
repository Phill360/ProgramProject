<?php
include_once('./common.php');
$status = checkStatus();
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
<div class="container">
  <div class="jumbotron">
    <div class="slackey"><div class="orange"><div class="textHuge">Paw Companions</div></div></div>
    <div class="slackey"><div class="black"><div class="textxLarge">Find your true companion</div></div></div>
    
    
    <div class="btn-toolbar">
      <?php 
      if ($status != 'signed in')
      {?>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#signInModal">Sign in</button>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#registerModal">Register</button>
      <?php
      }
      else
      {?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="signOutForm">
          <button type="submit" class="btn btn-primary pull-right" name="signOutBtn">Sign out</button>
          <div class="opensans"><div class="black"><div class="textRegular"><?php echo("Welcome ".$_SESSION[firstName]." ".$_SESSION[lastName]);?></div></div></div>
        </form>
      <?php
      }?>
        
    </div>
  </div>
</div>
</body>
</html>