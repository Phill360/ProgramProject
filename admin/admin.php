<?php
include_once('./common.php');

  if(isset($_POST['addPetBtn']))
  {
    $adminTool = 'addPet';
  }
  
  if(isset($_POST['editPetBtn']))
  {
    $adminTool = 'editPet';
  }
  
  if(isset($_POST['editRemovePetBtn']))
  {
    $adminTool = 'editRemovePet';
  }
  
  if(isset($_POST['addBreedBtn']))
  {
    $adminTool = 'addBreed';
  }
  
  if(isset($_POST['editBreedBtn']))
  {
    $adminTool = 'editBreed';
  }
  
  if(isset($_POST['editRemoveBreedBtn']))
  {
    $adminTool = 'editRemoveBreed';
  }
  
  if(isset($_POST['editUserBtn']))
  {
    $adminTool = 'editUser';
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
      <button type="submit" class="btn" name="addPetBtn">Add a pet</button>
      <button type="submit" class="btn" name="editRemovePetBtn">Edit or remove a pet</button>
      <button type="submit" class="btn" name="addBreedBtn">Add a breed</button>
      <button type="submit" class="btn" name="editRemoveBreedBtn">Edit or remove a breed</button>
      <button type="submit" class="btn" name="editUserBtn">Edit or remove a user</button>
    </form>
	</div>
  
  <div class="row">
    <div class="col-sm-12">
      <!-- Search box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Search</div>
        </div>
        <div class="panel-body">
          <div class="container">
	          <div class="row">
              <div id="custom-search-input">
                <div class="input-group col-md-6">
                  <input type="text" class="  search-query form-control" placeholder="Search" />
                    <span class="input-group-btn">
                    <button class="btn btn-primary" type="button">
                      <span class=" glyphicon glyphicon-search"></span>
                    </button>
                  </span>
                </div>
              </div>
	          </div>
          </div>
        </div>
      </div>  
    </div>
  </div>  
  <?php 
    if ($adminTool == 'editUser')
    {?>
      <div><?php include 'user_edit.php' ?></div>
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