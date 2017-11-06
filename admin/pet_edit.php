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
          <div class="opensans">Edit a pet</div>
        </div>
        <div class="panel-body">
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post" enctype="multipart/form-data">
            
          <div class="form-group">
            <label for="age">RSPCA ID:</label>
            <select class="form-control" id="rspcaID" name="rspcaID" required>
            <?php
            // Connect AWS MYSQL Server
            require('_php/connect.php');

	          $query = "SELECT rspcaID FROM animals";
	          $result = mysqli_query($connection, $query);
            
            // Test for query error
            if(!$result) 
            {
              die("Database query failed.");
            }
	
            // List animals in database
            while($row = mysqli_fetch_assoc($result)) 
            {
              echo "<option value=\"" . $row["rspcaID"] . "\">" . $row["rspcaID"] . "</option>" ;
            } 
            mysqli_close($connection);
            ?>
            </select>
          </div>

          <button type="submit" class="btn btn-primary" name="editPetBtn">Remove</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>