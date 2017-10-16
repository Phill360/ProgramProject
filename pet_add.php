<?php


  
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>

</head>

<body>

  <div class="row">
    <div class="col-sm-12">
   
      <!-- Add a pet box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Add a pet</div>
        </div>
        <div class="panel-body">
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
            
            <!-- Select cat or dog -->
            <div class="form-group">
              <label for="age">Species:</label>
              <select class="form-control" id="species" name="species" required>
                <option>Cat</option>
                <option>Dog</option>
              </select>
            </div>
          
            <!-- Select pet breed -->
            <div class="form-group">
              <label for="age">Breed:</label>
              <select class="form-control" id="species" name="breedID" required>
                
                <?php
                // Connect AWS MYSQL Server
                require('_php/connect.php');

	              // 2. Perform Query
	              $query = "SELECT breedID, type, name ";
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
                
              </select>
             
            </div>

            <!-- Enter pet ID -->
            <div class="input-group">
              <span class="input-group-addon">RSPCA ID</span>
              <input id="petID" type="text" class="form-control" name="rspcaID" placeholder="Enter pet ID"  required>
            </div>
            <br>

            <!-- Enter pet name -->
            <div class="input-group">
              <span class="input-group-addon">Name</span>
              <input id="petName" type="text" class="form-control" name="petName" placeholder="Enter pet name"  required>
            </div>
            <br>
            
            <!-- Image selection -->
            <label>Image:</label>
            <br>
            <form id="upload-image-form" action="" method="post" enctype="multipart/form-data"required>
              <div id="image-preview-div" style="display: none">
                <br>
                <img id="preview-img" src="noimage">
              </div>
              <div class="form-group">
                <input type="file" name="file" id="file" required>
              </div>
            
            <!-- Gender selection -->
            <div class="form-group">
              <label for="gender">Gender:</label>
              <select class="form-control" name="gender" id="age" required>
                <option>Female</option>
                <option>Male</option>
              </select>
            </div>
            
              <!-- Age selection -->
            <div class="form-group">
              <label for="age">Age:</label>
              <select class="form-control" name="age" id="age" required>
                <option value="0.25">-3 months</option>
                <option value="0.5">3-6 months</option>
                <option value="1">6-12 months</option>
                <option value="2">2 Year</option>
                <option value="3">3 Year</option>
                <option value="4">4 Year</option>
                <option value="5">5+ Year</option>
              </select>
            </div>
            
             <!-- Pet description -->
            <div class="form-group">
              <label for="description">Pet Description:</label>
              <textarea class="form-control" name="description" id="description" rows="5" cols="50" required>
              </textarea>
            </div>
         
            <button type="submit" class="btn btn-primary" name="addPetBtn">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>