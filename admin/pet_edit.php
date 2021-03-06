<?php
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans"><?php echo("Edit RSPCA ID: ". $_POST['editPetBtn']); ?></div>
        </div>
        <div class="panel-body">
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post" enctype="multipart/form-data">
            <div class="form-group">
              <?php
              $rspcaID = $_POST['editPetBtn'];
            
              // Connect AWS MYSQL Server
              require('_php/connect.php');

	            $query = "SELECT * FROM animals WHERE rspcaID = $rspcaID";
	            $result = mysqli_query($connection, $query);
            
              // Test for query error
              if(!$result) 
              {
                die("Database query failed.");
              }
	
              // Get values for specific pet database
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
            </div>
          
            <!-- Send RSPCA ID (user cannot edit) -->
            <div class=hideMe>
              <div class="input-group">
                <span class="input-group-addon">RSPCA ID</span>
                <input id="rspcaID" type="text" class="form-control" name="rspcaID" value=<?php echo $rspcaID; ?> required>
              </div>
            </div>
            
            <!-- Enter pet name -->
            <div class="input-group">
              <label>Name:</label>
              <input id="petName" type="text" class="form-control" name="petName" value="<?php echo $petName ?>" required>
            </div>
            <br>
            
            <!-- Select breed -->
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
                $breedName = $row["name"];
              }
            }
            mysqli_close($connection);
            ?>
          
            <div class="input-group">
              <label>Breed:</label>
              <select class="form-control" id="breedID" name="breedID" required>
                <?php
                echo "<option value=\"".$breedID."\">".$breedName."</option>";
            
                // Connect AWS MYSQL Server
                require('_php/connect.php');

	              $query = "SELECT breedID, type, name FROM breed";
	              $result = mysqli_query($connection, $query);
            
                // Test for query error
                if(!$result) 
                {
                  die("Database query failed.");
                }
            
                // List breeds in database for dropdown menu
                while($row = mysqli_fetch_assoc($result)) 
                {
                  echo "<option value=\"".$row["breedID"]."\">".$row["name"]."</option>" ;
                } 
                mysqli_close($connection);
                ?>
              </select>
            </div>
            <br>
          
            <!-- Image selection -->
            <label>Current image:</label>
            <br>
            <div class="holder">
              <?php displayImage($_POST['editPetBtn']); ?>
            </div>
            <p></p><br>
  
            <label>Replace current image with..</label>
            <br>
            <form id="upload-image-form" action="" method="post" enctype="multipart/form-data">
            <div class="holder">
              <div id="image-preview-div" style="display: none">
                <img id="preview-img" src="noimage">
              </div>
            </div>
            <br>

            <div class="input-group">
              <input type="file" name="image" id="file">
            </div>
            <br>
          
            <!-- Gender selection -->
            <?php 
            if ($gender == 'F')
            {
              $genderText = "Female";
            }
            else 
            {
              $genderText = "Male";
            }
            ?>
            <div class="input-group">
              <label for="gender">Gender:</label>
              <select class="form-control" name="gender" id="gender" required>
                <option value=<?php echo $gender; ?>><?php echo $genderText; ?></option>
                <option value="F">Female</option>
                <option value="M">Male</option>
              </select>
            </div>
            <br>
            
            <!-- Age selection -->
            <?php 
            if ($age == 0.25)
            {
              $ageText = "-3 months";
            }
            elseif ($age == 0.5) 
            {
              $ageText = "3-6 months";
            }
            elseif ($age == 1) 
            {
              $ageText = "6-12 months";
            }
            elseif ($age == 2) 
            {
              $ageText = "2 Year";
            }
            elseif ($age == 3) 
            {
              $ageText = "3 Year";
            }
            elseif ($age == 4) 
            {
              $ageText = ">4 Year";
            }
            else 
            {
              $ageText = "5+ Year";
            }
            ?>
          
            <div class="input-group">
              <label for="age">Age:</label>
              <select class="form-control" name="age" id="age" required>
                <option value=$age><?php echo $ageText; ?></option> 
                <option value="0.25">-3 months</option>
                <option value="0.5">3-6 months</option>
                <option value="1">6-12 months</option>
                <option value="2">2 Year</option>
                <option value="3">3 Year</option>
                <option value="4">4 Year</option>
                <option value="5">5+ Year</option>
              </select>
            </div>
            <br>
            
            <!-- Pet description -->
            <div class="form-group">
              <label for="description">Pet Description:</label>
              <textarea class="form-control" name="description" id="description" rows="5" cols="50"><?php echo $description; ?></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="updatePetBtn">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>