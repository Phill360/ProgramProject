<?php

?>
<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Footer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<!-- Deregister -->
<div class="panel panel-default">
  <div class="panel-heading">
    <div class="opensans">Deregister</div>
  </div>
  <div class="panel-body">
    <div class="textMedium"><div class="opensans">Are you sure you wish to deregister yourself from Pet Companions?</div></div>
    <br>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="deregisterForm">
      <button type="submit" class="btn btn-primary pull-left" name="confirmDeregisterBtn">Confirm</button>
    </form>
  </div>  
</body>
</html>