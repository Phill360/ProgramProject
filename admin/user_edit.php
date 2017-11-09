<?php
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>

  <div class="row">
    <div class="col-sm-12">
      <!-- Remove table -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Remove a user from Paw Companions</div>
        </div>
        <div class="panel-body">
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post" enctype="multipart/form-data">
            
            <?php
            // Connect AWS MYSQL Server a
            require('_php/connect.php');

	          $query = "SELECT userID, email FROM user";
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
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">User</th>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Promote</th>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Demote</th>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Remove</th>
                </tr>
              </thead>
              <tbody>
	          <?php
            // List users in database
            while($row = mysqli_fetch_assoc($result)) 
            {
              ?>
              <tr>
				        <td><?php echo $row["email"] ; ?> </td>
				        <td><button type="submit" class="btn btn-success" name="promoteUserBtn" value=<?php echo $row["userID"]?>>Promote</button></td>
				        <td><button type="submit" class="btn btn-success" name="demoteUserBtn" value=<?php echo $row["userID"]?>>Demote</button></td>
				        <td><button type="submit" class="btn btn-danger" name="confirmRemoveUserBtn" value=<?php echo $row["userID"]?>>Remove</button></td>
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
</body>
</html>