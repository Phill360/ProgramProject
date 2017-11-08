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
  
  if(isset($_POST['removeUserBtn']))
  {
    $adminTool = 'removeUser';
  }

  if(isset($_POST['addBreedBtn']))
  {
    $adminTool = 'addBreed';
  }
  
  if(isset($_POST['editRemoveBreedBtn']))
  {
    $adminTool = 'editRemoveBreed';
  }
  
  if(isset($_POST['editBreedBtn']))
  {
    $adminTool = 'editBreed';
  }
  
  if(isset($_POST['addPetBtn']))
  {
    $adminTool = 'addPet';
  }
  
  if(isset($_POST['editRemovePetBtn']))
  {
    $adminTool = 'editRemovePet';
  }
  
  if(isset($_POST['editPetBtn']))
  {
    $adminTool = 'editPet';
  }
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
<div class="container">
  <div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="adminToolSelectionForm">
      <button type="submit" class="btn" name="promoteBtn">Promote a user</button>
      <button type="submit" class="btn" name="demoteBtn">Demote a user</button>
      <button type="submit" class="btn" name="removeUserBtn">Remove a user</button>
      <button type="submit" class="btn" name="addBreedBtn">Add a breed</button>
      <button type="submit" class="btn" name="editRemoveBreedBtn">Edit or remove a breed</button>
      <button type="submit" class="btn" name="addPetBtn">Add a pet</button>
      <button type="submit" class="btn" name="editRemovePetBtn">Edit or remove a pet</button>
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
    else if ($adminTool == 'removeUser')
    {?>
      <div><?php include 'user_remove.php' ?></div>
  <?php } 
    else if ($adminTool == 'addBreed')
    {?>
      <div><?php include 'breed_add.php' ?></div>
  <?php } 
    else if ($adminTool == 'editRemoveBreed')
    {?>
      <div><?php include 'breed_select.php' ?></div>
  <?php }
    else if ($adminTool == 'editBreed')
    {?>
      <div><?php include 'breed_edit.php' ?></div>
  <?php }
    else if ($adminTool == 'addPet')
    {?>
      <div><?php include 'pet_add.php' ?></div>
  <?php } 
    else if ($adminTool == 'editRemovePet')
    {?>
      <div><?php include 'pet_select.php' ?></div>
  <?php }
    else if ($adminTool == 'editPet')
    {?>
      <div><?php include 'pet_edit.php' ?></div>
  <?php }
    else
    {?>
      <div><?php include 'pet_add.php' ?></div>
  <?php } ?>
  
</div>
</body>
</html>