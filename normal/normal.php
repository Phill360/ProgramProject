<?php
  include_once('./common.php');

  

  if(isset($_POST['questionnaireBtn']))
  {
    $userTool = 'questionnaire';
  }

  if(isset($_POST['matchesBtn']))
  {
    $userTool = 'matches';
  }

  if(isset($_POST['favouritesBtn']))
  {
    $userTool = 'favourites';
  }
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
<div class="container">
	<h1>This is a test page.</h1>
  <div class="slackey"><div class="black"><div class="textxxMedium">Welcome</div></div></div>
    <div>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="userToolSelectionForm">
        <button type="submit" class="btn" name="questionnaireBtn">Questionnaire</button>
        <button type="submit" class="btn" name="matchesBtn">Matches</button>
        <button type="submit" class="btn" name="favouritesBtn">Favourites</button>
      </form>
    </div>

  <?php 
    if ($userTool == 'questionnaire')
    {?>
      <div><?php include 'questionnaire.php' ?></div>
    <?php }
    else if ($userTool == 'matches')
    {?>
      <div><?php include 'matches.php' ?></div>
  <?php } 
    else if ($userTool == 'favourites')
    {?>
      <div><?php include 'favourites.php' ?></div>
  <?php } 
    else
    {?>
      <div><?php include 'matches.php' ?></div>
  <?php } ?>
</div>

</body>
</html>