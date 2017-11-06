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
				        <td><?php echo $row["imageName"] ; ?>	</td>
				        <td><?php echo $row["description"] ; ?>	</td>
			        </tr>
              <?php
            } 
            mysqli_close($connection);
            ?>

          <button type="submit" class="btn btn-primary" name="selectPetBtn">Select</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>