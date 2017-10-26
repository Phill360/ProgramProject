<?php
  require_once('./_php/connect.php');
  include_once('./common.php');
  
  $size = checkNumberAnimalsInDatabase();
?>

<DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Paw Companions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<p>The number of rows is: <?php echo($size);?></p>
</body>
  
</html>