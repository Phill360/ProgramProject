<?php
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>

  <div class="row">
    <div class="col-sm-12">
      <!-- Remove a pet box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Edit or remove a pet</div>
        </div>
        <div class="panel-body">
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post" enctype="multipart/form-data">
            
            <?php
            // Connect AWS MYSQL Server
            require('_php/connect.php');

	          $query = "SELECT * FROM animals";
	          $result = mysqli_query($connection, $query);
            
            // Test for query error
            if(!$result) 
            {
              die("Database query failed.");
            }
	          
	          ?>
	          <table class="table table-bordered">
	            <thead>
                <tr>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">ID</th>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Name</th>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Edit</th>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Remove</th>
                </tr>
              </thead>
              <tbody>
	          <?php
	          
            // List animals in database
            while($row = mysqli_fetch_assoc($result)) 
            {
              ?>
              <tr>
				        <td><?php echo $row["rspcaID"] ; ?> </td> 
				        <td><?php echo $row["petName"] ; ?>	</td>
				        <td><button type="submit" class="btn btn-success" name="editPetBtn" value=<?php echo $row["rspcaID"]?>>Edit</button></td>
				        <td><button type="submit" class="btn btn-danger" name="removePetBtn" value=<?php echo $row["rspcaID"]?>>Remove</button></td>
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