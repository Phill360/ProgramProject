<?php
  include_once('./common.php');
  
  setupUserSession(); // Error 5 if cannot connect

  if(isset($_POST['questionnaireBtn']))
  {
    $_SESSION['userTool'] = 'questionnaire';
  }

  if(isset($_POST['matchesBtn']))
  {
    $_SESSION['userTool'] = 'matches';
  }

  if(isset($_POST['favouritesBtn']))
  {
    $_SESSION['userTool'] = 'favourites';
  }
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
<div class="container">
  
  <div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="userToolSelectionForm">
      <button type="submit" class="btn" name="questionnaireBtn">Questionnaire</button>
      <button type="submit" class="btn" name="matchesBtn">Matches</button>
      <button type="submit" class="btn" name="favouritesBtn">Favourites</button>
    </form>
  </div>

  <?php
    if ($_SESSION['userTool'] == 'questionnaire')
    {?>
      <div><?php include 'questionnaire.php' ?></div>
    <?php }
    else if ($_SESSION['userTool'] == 'matches')
    {?>
      <div><?php include 'display_image.php' ?></div> 
    <?php } 
    else if ($_SESSION['userTool'] == 'favourites')
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