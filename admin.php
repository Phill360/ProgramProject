<?php
require_once('./functions.php');
?>

<?php




?>



<!DOCTYPE html PUBLIC>
<html lang="en">
<head>



</head>

<body>
<div class="container">
  <div class="slackey"><div class="black"><div class="textxxMedium">Welcome admin user</div></div></div>
  
  
  <form id="search" action="" method="post" >
    <input type="hidden" name="selection">
      <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Admin tools
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#">Promote a normal user to admin user</a></li>
          <li><a href="#">Demote an admin user to normal user</a></li>
          <li class="divider"></li>
          <li><a href="#">Add a breed</a></li>
          <li><a href="#">Add a pet</a></li>
          <li><a href="#">Remove a pet</a></li>
        </ul>
      </div>
  </form>
  
  <?php 
  if ($tool == 'promote')
  {?>
    <div><?php include 'promote_user.php' ?></div>
<?php }
  else if ($tool == 'demote')
  {?>
    <div><?php include 'demote_user.php' ?></div>
<?php }
  else if ($tool == 'addBreed')
  {?>
    <div><?php include 'breed_add.php' ?></div>
<?php }
  else if ($tool == 'addPet')
  {?>
    <div><?php include 'pet_add.php' ?></div>
<?php }
  else if ($tool == 'removePet')
  {?>
    <div><?php include 'pet_remove.php' ?></div>
<?php }
  else
  {?>
    <div><?php include 'carousel.php' ?></div>
<?php } ?>
</div>
</body>
</html>