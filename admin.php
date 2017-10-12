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

if(isset($_POST['send']))
{
$val = $_POST["thenumbers"];
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

  

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li value="promote">Promote</li>
    <li value="demote">Demote</li>
    <li value="addPet">Add a pet</li>
  </ul>
</div>

 <input type="submit" name ="send"/>

</form>
  
  
  
  
  
  
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