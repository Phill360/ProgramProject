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
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#signInModal">Find My Companion</button>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#registerModal">Register</button>
      <?php
      }
      else
      {?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="signOutForm">
          <button type="submit" class="btn btn-primary pull-right" name="signOutBtn">Sign out</button>
        </form>
      <?php
      }?>
        
    </div>
  </div>
</div>
<a href="testcarousel.php">link text</a>
</body>
</html>