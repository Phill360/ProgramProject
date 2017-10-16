<?php


  
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>

</head>

<body>

  <div class="row">
    <div class="col-sm-12">
      <!-- Remove a breed box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Remove a breed</div>
        </div>
        <div class="panel-body">
          
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
            <div class="input-group">
              <span class="input-group-addon">Breed Name</span>
              <!--<input id="breedID" type="text" class="form-control" name="breedID" placeholder="Enter breed ID">-->
                <select class="form-control" id="species" name="breedID" required>
            
                  <?php
                  // Connect AWS MYSQL Server
                  require('../_php/connect.php');
  
  	              // 2. Perform Query
  	              $query = "SELECT breedID, name ";
  	              $query .= "FROM breed ";
  	              $result = mysqli_query($connection, $query);
                	// Test for query error
                	if(!$result) {
                		die("Database query failed.");
                	}
  	
  	
                  // Generate Breed List
                  while($row = mysqli_fetch_assoc($result)) {
                      echo "<option value=\"" . $row["breedID"] . "\">" . $row["name"] . "</option>" ;
                  } 
                   mysqli_close($connection);
                  ?>
            
                </select>
              </div>
            <br>
            <button type="submit" class="btn btn-primary" name="remBreedBtn">Remove</button>
          </form>
        </div>
      </div>

    </div>
  </div>

</body>
</html>