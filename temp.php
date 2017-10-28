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