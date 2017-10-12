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
  $adminTool = $_POST['tool'];
}

?>



<!DOCTYPE html PUBLIC>
<html lang="en">
<head>



</head>

<body>
<div class="container">

  <div class="slackey"><div class="black"><div class="textxxMedium">Welcome admin user</div></div></div>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="selectionForm">
  <input type="hidden" name="tool" id="tool">
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
  
  <script>
$(function() 
{
    $('.dropdown-menu li').click(function()
    {
        $('#tool').val($(this).html());
        $('#selectionForm').submit();
    });
});
</script>
  
  
  
  
  
  
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