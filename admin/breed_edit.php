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
          <div class="opensans"><?php echo("Edit Breed ID: ". $_POST['editBreedBtn']); ?></div>
        </div>
        <div class="panel-body">
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post" enctype="multipart/form-data">
            <div class="input-group">
              <?php
              $breedID = $_POST['editBreedBtn'];
                  
              // Connect AWS MYSQL Server
              require('./_php/connect.php');
  
  	          $query = "SELECT * FROM breed WHERE breedID = $breedID";
  	          $result = mysqli_query($connection, $query);
                	
              // Test for query error
              if(!$result) 
              {
                die("Database query failed.");
              }
  	
              // Get values for specific breed in database
              while($row = mysqli_fetch_assoc($result)) 
              {
                $breedID = $row["breedID"];
                $type = $row["type"];
                $size = $row["size"];
                $temperament = $row["temperament"];
                $active = $row["active"];
                $name = $row["name"];
                $fee = $row["fee"];
              } 
              mysqli_close($connection);
              ?>
            </div>
            
            <!-- Send breed ID (user cannot edit) -->
            <div class=hideMe>
              <div class="input-group">
                <span class="input-group-addon">RSPCA ID</span>
                <input id="breedID" type="text" class="form-control" name="breedID" value=<?php echo $breedID; ?> required>
              </div>
            </div>
            
            <!-- Select cat or dog -->
            <div class="input-group">
              <label for="type">Species:</label>
              <select class="form-control" id="species" name="species" value="<?php echo $type ?>" required>
                <option>Cat</option>
                <option>Dog</option>
              </select>
            </div>
            <br>
            
            <!-- Enter breed name -->
            <div class="input-group">
              <label for="type">Breed name:</label>
              <input id="breedName" type="text" class="form-control" name="breedName" value="<?php echo $name ?>" required>
            </div>
            <br>

            <!-- Enter breed size -->
            <div class="input-group">
              <label for="type">Size:</label>
              <select class="form-control" id="breedSize" name="breedSize" required>
                <option value=<?php echo $size; ?>><?php echo $size; ?></option>
                <option>Extra small</option>
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
                <option>Giant</option>
              </select>
            </div>
            <br>

            <!-- Enter breed temperament -->
            <div class="input-group">
              <label for="type">Temperament:</label>
              <select class="form-control" id="temperament" name="temperament" required>
                <option value=<?php echo $temperament; ?>><?php echo $temperament; ?></option>
                <option>Easy Going</option>
                <option>Playful</option>
                <option>Excitable</option>
              </select>
            </div>
            <br>
            
            <!-- Enter breed active -->
            <div class="input-group">
              <label for="type">How active:</label>
              <select class="form-control" id="active" name="active" required>
                <option value=<?php echo $active; ?>><?php echo $active; ?></option>
                <option>Lap dog</option>
                <option>Active</option>
                <option>Sports star</option>
              </select>
            </div>
            <br>
            
            <!-- Enter breed fee -->
            <div class="input-group">
              <label for="type">Adoption fee:</label>
              <input id="breedFee" type="text" class="form-control" name="fee" value="<?php echo $fee ?>" required>
            </div>
            <br>
            
            <button type="submit" class="btn btn-primary" name="updateBreedBtn">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>