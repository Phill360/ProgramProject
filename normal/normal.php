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

</div>

</body>
</html>