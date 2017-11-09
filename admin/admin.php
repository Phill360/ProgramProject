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
  <div>
    
      <div class="input-group" id="adv-search">
        <input type="text" class="form-control" placeholder="Search for snippets" />
        <div class="input-group-btn">
          <div class="btn-group" role="group">
            <div class="dropdown dropdown-lg">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
              <div class="dropdown-menu dropdown-menu-right" role="menu">
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="filter">Filter by</label>
                    <select class="form-control">
                      <option value="0" selected>All Snippets</option>
                      <option value="1">Featured</option>
                      <option value="2">Most popular</option>
                      <option value="3">Top rated</option>
                      <option value="4">Most commented</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="contain">Author</label>
                    <input class="form-control" type="text" />
                  </div>
                  <div class="form-group">
                    <label for="contain">Contains the words</label>
                    <input class="form-control" type="text" />
                  </div>
                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </form>
              </div>
            </div>
            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
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