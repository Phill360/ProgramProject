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
  else
  {?>
    <div><?php include 'pet_add.php' ?></div>
<?php } ?>

</div>
</body>
</html>