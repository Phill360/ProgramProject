<?php
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>

  <div class="row">
    <div class="col-sm-12">
      <!-- Edit/Remove table -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Edit or remove a breed</div>
        </div>
        <div class="panel-body">
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post" enctype="multipart/form-data">
            
            <?php
            // Connect AWS MYSQL Server
            require('_php/connect.php');

	          $query = "SELECT breedID, name FROM breed";
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
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">ID</th>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Breed</th>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Edit</th>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Remove</th>
                </tr>
              </thead>
              <tbody>
	          <?php
	          
            // List breeds in database
            while($row = mysqli_fetch_assoc($result)) 
            {
              ?>
              <tr>
				        <td><?php echo $row["breedID"] ; ?> </td> 
				        <td><?php echo $row["name"] ; ?>	</td>
				        <td><button type="submit" class="btn btn-success" name="editBreedBtn" value=<?php echo $row["breedID"]?>>Edit</button></td>
				        <td><button type="submit" class="btn btn-danger" name="removeBreedBtn" value=<?php echo $row["breedID"]?>>Remove</button></td>
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