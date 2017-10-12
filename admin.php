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
<div class="dropdown" >

<select class="form-control" name="thenumbers">
  <option value="one">One</option>
  <option value="two">Two</option>
  <option value="three">Three</option>
  <option value="four">Four</option>
</select>

</div>

 <input type="submit" name ="send"/>

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