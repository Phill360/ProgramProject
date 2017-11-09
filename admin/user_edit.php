<?php
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
  <div class='device-check visible-xs' data-device='xs'></div>
  <div class='device-check visible-sm' data-device='sm'></div>
  <div class='device-check visible-md' data-device='md'></div>
  <div class='device-check visible-lg' data-device='lg'></div>

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
				          <td><button type="submit" class="btn disabled" name="promoteUserBtn" value=<?php echo $row["userID"] ?>>Promote</button></td>
				          <td><button type="submit" class="btn btn-success" name="demoteUserBtn" value=<?php echo $row["userID"] ?>>Demote</button></td>
				          <?php
				        }
				        else 
				        {
				          ?>
				          <td><button type="submit" class="btn btn-success" name="promoteUserBtn" value=<?php echo $row["userID"] ?>>Promote</button></td>
				          <td><button type="submit" class="btn disabled" name="demoteUserBtn" value=<?php echo $row["userID"] ?>>Demote</button></td>
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
    function getCurrentGridOption()
    {
      return $('.device-check:visible').attr('data-device')
    }
    
    $screen = getCurrentGridOption();
    echo $screen;
  ?>
</body>
</html>