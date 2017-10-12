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
  
  if(isset($_POST['addBreedBtn']))
  {
    $adminTool = 'addBreed';
  }
  
  if(isset($_POST['addPetBtn']))
  {
    $adminTool = 'addPet';
  }
  
  if(isset($_POST['removePetBtn']))
  {
    $adminTool = 'removePet';
  }


?>



<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
<div class="container">
<div class="slackey"><div class="black"><div class="textxxMedium">Welcome admin user</div></div></div>
<div>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="adminToolSelectionForm">
    <button type="submit" class="btn btn-primary" name="promoteBtn">Promote a user</button>
    <button type="submit" class="btn btn-primary" name="demoteBtn">Demote a user</button>
    <button type="submit" class="btn btn-primary" name="addBreedBtn">Add a breed</button>
    <button type="submit" class="btn btn-primary" name="addPetBtn">Add a pet</button>
    <button type="submit" class="btn btn-primary" name="removePetBtn">Remove a pet</button>
  </form>
</div>

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
  else if ($adminTool == 'addPet')
  {?>
    <div><?php include 'pet_add.php' ?></div>
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