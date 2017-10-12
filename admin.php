<?php
require_once('./functions.php');
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>

</head>

<body>
<div class="container">
  <h2>Dropdowns</h2>
  <p>The .divider class is used to separate links inside the dropdown menu with a thin horizontal line:</p>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
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
</div>
</body>
</html>