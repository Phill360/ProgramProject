<?php
	echo($status);
	
	
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
      if ($status != 'logged_in')
      {?>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#signInModal">Sign in</button>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#registerModal">Register</button>
      <?php
      }
      else
      {?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signOutform">
          <div class="input-group">
            <button id="signOutBtn" type="button" class="btn btn-primary pull-right" onclick="signOut()">Sign out</button>
          </div>
        </form>
      <?php
      }?>
        
    </div>
  </div>
</div>
</body>
</html>