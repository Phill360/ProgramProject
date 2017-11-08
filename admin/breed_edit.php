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
            
            <!-- Select cat or dog -->
            <div class="form-group">
              <label for="type">Species:</label>
              <select class="form-control" id="species" name="species" required>
                <option>Cat</option>
                <option>Dog</option>
              </select>
            </div>
            
            <!-- Enter breed size -->
            <div class="input-group">
              <span class="input-group-addon">Size</span>
              <select class="form-control" id="breedSize" name="breedSize" required>
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
              <span class="input-group-addon">Temperament</span>
              <select class="form-control" id="temperament" name="temperament" required>
                <option>Easy Going</option>
                <option>Playful</option>
                <option>Excitable</option>
              </select>
            </div>
            <br>
            
            <!-- Enter breed active -->
            <div class="input-group">
              <span class="input-group-addon">Active</span>
              <select class="form-control" id="active" name="active" required>
                <option>Lap dog</option>
                <option>--</option>
                <option>Active</option>
                <option>--</option>
                <option>Sports star</option>
              </select>
            </div>
            <br>
            
            <!-- Enter breed fee -->
            <div class="input-group">
              <span class="input-group-addon">Adoption Fee</span>
              <input id="breedFee" type="text" class="form-control" name="fee" placeholder="Enter adoption fee" required>
            </div>
            <br>
            
            <button type="submit" class="btn btn-primary" name="updateBreedBtn">Remove</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>