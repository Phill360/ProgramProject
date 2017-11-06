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
            
            <?php
            $rspcaID = $_POST['editPetBtn'];
            
            // Connect AWS MYSQL Server
            require('_php/connect.php');

	          $query = "SELECT * FROM animals WHERE rspcaID=$rspcaID";
	          $result = mysqli_query($connection, $query);
            
            // Test for query error
            if(!$result) 
            {
              die("Database query failed.");
            }
	
            // List animals in database
            while ($row = mysqli_fetch_assoc($result)) 
            {
              $petName = $row["petName"];
              $breedID = $row["breedID"];
              $gender = $row["gender"];
              $imageName = $row["imageName"];
              $age = $row["age"];
              $description = $row["description"];
              $imageData = $row["imageData"];
            }
            mysqli_close($connection);
            ?>
            </select>
          </div>
          
          <!-- Select cat or dog -->
          <div class="form-group">
            <label>Species:</label>
            <select class="form-control" id="species" name="species" required>
            <option>Cat</option>
            <option>Dog</option>
            </select>
          </div>
          
          <!-- Select breed -->
          <div class="form-group">
            <label>Breed:</label>
            <select class="form-control" id="breedID" name="breedID" required>
            <?php
            
            
            
            
            
            // Connect AWS MYSQL Server
            require('_php/connect.php');

	          $query = "SELECT breedID, type, name FROM breed";
	          $result = mysqli_query($connection, $query);
            
            // Test for query error
            if(!$result) 
            {
              die("Database query failed.");
            }
            
            // Get default value for breed name
            while($row = mysqli_fetch_assoc($result)) 
            {
              if ($row["breedID"] == $breedID)
              {
                echo "<option value=\"" . $breedID . "\">" . $breedID . "</option>" ;
              }
            } 
            
            // List breeds in database for dropdown menu
            while($row = mysqli_fetch_assoc($result)) 
            {
              echo "<option value=\"" . $row["breedID"] . "\">" . $row["name"] . "</option>" ;
            } 
            mysqli_close($connection);
            ?>
            </select>
          </div>
          
          <!-- Enter pet name -->
          <div class="input-group">
            <span class="input-group-addon">Name</span>
            <input id="petName" type="text" class="form-control" name="petName" placeholder=<?php echo $petName ?>  required>
          </div>
          <br>
          
          <!-- Image selection -->
            <label>Image:</label>
            <br>
            <form id="upload-image-form" action="" method="post" enctype="multipart/form-data"required>
              <div id="image-preview-div" style="display: none">
                <img id="preview-img" src="noimage">
              </div>
              <div class="form-group">
                <input type="file" name="image" id="file" required>
              </div>
            
            <!-- Gender selection -->
            <div class="form-group">
              <label for="gender">Gender:</label>
              <select class="form-control" name="gender" id="age" placeholder=<?php echo $gender ?> required>
                <option>Female</option>
                <option>Male</option>
              </select>
            </div>
            
              <!-- Age selection -->
            <div class="form-group">
              <label for="age">Age:</label>
              <select class="form-control" name="age" id="age" placeholder=<?php echo $age ?> required>
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
              <textarea class="form-control" name="description" id="description" rows="5" cols="50" placeholder=<?php echo $description ?> required></textarea>
            </div>

          <button type="submit" class="btn btn-primary" name="editPetBtn">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>