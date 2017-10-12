<?php
include_once('./common.php');



if(isset($_POST['promoteBtn']))
{
  $adminTool = 'promote';
}

if(isset($_POST['demoteBtn']))
{
  $adminTool = 'demote';
}

if(isset($_POST['selectionForm']))
{
$val = $_POST["tools"];
setMessage("the Value selected is ".$val);
}

?>



<!DOCTYPE html PUBLIC>
<html lang="en">
<head>



</head>

<body>
<div class="container">

  <div class="slackey"><div class="black"><div class="textxxMedium">Welcome admin user</div></div></div>

  

<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="promote.php">Promote a user</a></li>
    <li><a href="demote.php">Demote a user</a></li>
    <li><a href="pet_add.php">Add a pet</a></li>
  </ul>
</div>
  
  
  
  
  
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="promoteForm">
    <button type="submit" class="btn btn-primary" name="promoteBtn">Promote</button>
  </form>
  
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="demoteForm">
    <button type="submit" class="btn btn-primary" name="demoteBtn">Demote</button>
  </form>
    
    
    
 

  
  <?php 
  if ($adminTool == 'promote')
  {?>
    <div><?php include 'promote_user.php' ?></div>
<?php }
  else if ($adminTool == 'demote')
  {?>
    <div><?php include 'demote_user.php' ?></div>
<?php }
  else if ($adminTool == 'addBreed')
  {?>
    <div><?php include 'breed_add.php' ?></div>
<?php }
  else if ($adminTool == 'removePet')
  {?>
    <div><?php include 'pet_remove.php' ?></div>
<?php }
  else
  {?>
    <div><?php include 'pet_add.php' ?></div>
<?php } ?>
</div>
</body>
</html>