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
          <div class="opensans">Select pet to edit</div>
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
                  <th>RSPCA ID</th>
                  <th>Name</th>
                  <th>Breed</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Description</th>
                  <th>Edit</th>
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
				        <td><?php echo $row["breedID"] ; ?>	</td>
				        <td><?php echo $row["age"] ; ?>	</td>
				        <td><?php echo $row["gender"] ; ?> </td>
				        <td><?php echo $row["description"] ; ?>	</td>
				        <td><button type="submit" class="btn btn-primary" name="selectPetBtn">Edit</button></td>
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