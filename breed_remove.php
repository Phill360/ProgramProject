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
          <div class="opensans">Remove a pet</div>
        </div>
        <div class="panel-body">
          
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
            <div class="input-group">
              <span class="input-group-addon">Text</span>
              <!--<input id="breedID" type="text" class="form-control" name="breedID" placeholder="Enter breed ID">-->
               <select class="form-control" id="species" name="breedID" required>
            
             <?php
                // Connect AWS MYSQL Server
                require('_php/connect.php');

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
                  // Need to make this only show breeds depending on the 
                  // whether Dog or cat is selected
                  // if ($row["type"] == "Dog") {
                    echo "<option value=\"" . $row["breedID"] . "\">" . $row["name"] . "</option>" ;
                  // }
                } 
                 mysqli_close($connection);
                ?>
            
            
            
            
            
            
            
            </div>
            <br>
            <p>Message<?php getMessage($message) ?></p>
            <br>
            <button type="submit" class="btn btn-primary" name="remBreedBtn">Remove</button>
          </form>
        </div>
      </div>

    </div>
  </div>

</body>
</html>