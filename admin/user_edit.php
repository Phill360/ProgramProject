<?php
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
  
  <?php
  if (stristr($_SERVER['HTTP_USER_AGENT'],'mobi')!==FALSE) 
  {
  ?>  
    <div class="row">
    <div class="col-sm-12">
      <!-- Promote user box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Promote normal user to admin user</div>
        </div>
        <div class="panel-body">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" name="promoteUserForm">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="userID" type="text" class="form-control" name="userID" placeholder="User ID">
          </div>
          <br>
            <button type="submit" class="btn btn-primary" name="mobilePromoteUserBtn">Promote</button>
          </form>
        </div>
      </div>
      <!-- Demote admin user box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Demote admin user to normal user</div>
        </div>
        <div class="panel-body">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" name="demoteUserForm">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="userID" type="text" class="form-control" name="userID" placeholder="UserID">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="mobileDemoteUserBtn">Demote</button>
          </form>
        </div>
      </div>
      <!-- Remove user box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Demote admin user to normal user</div>
        </div>
        <div class="panel-body">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" name="removeUserForm">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="userID" type="text" class="form-control" name="userID" placeholder="UserID">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="mobileConfirmRemoveUserBtn">Remove</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
  else
  {
  ?>  
    <div class="row">
    <div class="col-sm-12">
      <!-- Remove table -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Edit or remove a user</div>
        </div>
        <div class="panel-body">
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post" enctype="multipart/form-data">
            
            <?php
            // Connect AWS MYSQL Server a
            require('_php/connect.php');

	          $query = "SELECT userID, email, userType FROM user";
	          $result = mysqli_query($connection, $query);
            
            // Test for query error
            if(!$result) 
            {
              die("Database query failed.");
            }
	          
	          ?>
	          <table class="table table-hover">
	            <thead>
                <tr>
                  <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">ID</th>
                  <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">User</th>
                  <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Promote</th>
                  <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Demote</th>
                  <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Remove</th>
                </tr>
              </thead>
              <tbody>
	          <?php
            // List users in database
            while($row = mysqli_fetch_assoc($result)) 
            {
              ?>
              <tr>
				        <td><?php echo $row['userID']; ?> </td>
				        <td><?php echo $row['email']; ?> </td>
				        <?php 
				        if ($row['userType'] == 'admin')
				        {
				          ?>
				          <td><button type="submit" class="btn disabled" name="promoteUserBtn" disabled="disabled" value=<?php echo $row["userID"] ?>>Promote</button></td>
				          <td><button type="submit" class="btn btn-success" name="demoteUserBtn" value=<?php echo $row["userID"] ?>>Demote</button></td>
				          <?php
				        }
				        else 
				        {
				          ?>
				          <td><button type="submit" class="btn btn-success" name="promoteUserBtn" value=<?php echo $row["userID"] ?>>Promote</button></td>
				          <td><button type="submit" class="btn disabled" name="demoteUserBtn" disabled="disabled" value=<?php echo $row["userID"] ?>>Demote</button></td>
				          <?php
				        }
				        ?>
				        <td><button type="submit" class="btn btn-danger" name="confirmRemoveUserBtn" value=<?php echo $row["userID"] ?>>Remove</button></td>
			        </tr>
              <?php
            }
            ?>
            </tbody>
            </table>
            <?php
            mysqli_close($connection);
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
  ?>
</body>
</html>