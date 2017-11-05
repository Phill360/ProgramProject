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
  
  if(isset($_POST['deregisterBtn']))
  {
    //
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
      <button type="submit" class="btn" name="deregisterBtn" data-toggle="modal" data-target="#deregisterModal>Deregister</button>
    </form>
  </div>

  <?php
    if ($_SESSION['userTool'] == 'questionnaire')
    {?>
      <div><?php include 'questionnaire.php' ?></div>
    <?php }
    else if ($_SESSION['userTool'] == 'matches')
    {?>
      <div><?php include 'matches.php' ?></div> 
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

<!-- Deregister -->
  <div id="deregisterModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><div class="slackey"><div class="textxxMedium">Confirm</div></div></div>
        </div>
        <div class="modal-body">
          <div class="opensans"><div class="textRegular">Are you sure you wish to deregister yourself from Pet Companions?</div></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>