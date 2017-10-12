<?php
require_once('./functions.php');
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>

</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <!-- Promote user box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Promote normal user to admin user</div>
        </div>
        <div class="panel-body">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" name="newAdminUserForm">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
          </div>
          <br>
            <button type="submit" class="btn btn-primary" name="createNewAdminUserBtn">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>