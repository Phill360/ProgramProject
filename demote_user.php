<?php
require_once('./functions.php');
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>

</head>

<body>
<div class="container">

    <div class="col-sm-12">
      <!-- Demote admin user box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Demote admin user to normal user</div>
        </div>
        <div class="panel-body">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" name="demoteAdminUserForm">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="email" type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="demoteAdminUserBtn">Remove</button>
          </form>
        </div>
      </div>
    </div>

</div>
</body>
</html>