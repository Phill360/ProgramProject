<?php
require_once('./functions.php');
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>

</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <!-- Create new admin user box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Promote normal user to admin user</div>
        </div>
        <div class="panel-body">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" name="newAdminUserForm">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
          </div>
          <br>
            <button type="submit" class="btn btn-primary" name="createNewAdminUserBtn">Submit</button>
          </form>
        </div>
      </div>
      
      <!-- Remove an admin user box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Demote admin user to normal user</div>
        </div>
        <div class="panel-body">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" name="demoteAdminUserForm">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="email" type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="demoteAdminUserBtn">Remove</button>
          </form>
        </div>
      </div>
    </div>

   
    <div class="col-sm-6">
      <!-- Add a pet box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Add a pet</div>
        </div>
        <div class="panel-body">
          <form action="./test_files/add_pet.php" method="post">
            
            <!-- Select cat or dog -->
            <div class="form-group">
              <label for="age">Species:</label>
              <select class="form-control" id="species" name="species">
                <option>Cat</option>
                <option>Dog</option>
              </select>
            </div>
          
            <!-- Select pet breed -->
            <div class="form-group">
              <label for="age">Breed:</label>
              <select class="form-control" id="species" name="breedID">
                
                <?php
                // Connect AWS MYSQL Server
                require_once('./_php/connect.php');

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
                  if ($row["type"] == "Dog") {
                    echo "<option value=\"" . $row["breedID"] . "\">" . $row["name"] . "</option>" ;
                  }
                } ?>
                
              </select>
            </div>

            <!-- Enter pet ID -->
            <div class="input-group">
              <span class="input-group-addon">RSPCA ID</span>
              <input id="petID" type="text" class="form-control" name="rspcaID" placeholder="Enter pet ID">
            </div>
            <br>

            <!-- Enter pet name -->
            <div class="input-group">
              <span class="input-group-addon">Name</span>
              <input id="petName" type="text" class="form-control" name="petName" placeholder="Enter pet name">
            </div>
            <br>
            
            <!-- Image selection -->
            <label>Image:</label>
            <br>
            <form id="upload-image-form" action="" method="post" enctype="multipart/form-data">
              <div id="image-preview-div" style="display: none">
                <br>
                <img id="preview-img" src="noimage">
              </div>
              <div class="form-group">
                <input type="file" name="file" id="file" required>
              </div>
            
            
            <!-- Gender selection -->
            <div class="form-group">
              <label for="age">Gender:</label>
              <select class="form-control" name="gender" id="age">
                <option>Female</option>
                <option>Male</option>
              </select>
            </div>
            
            <!-- Checkboxes for health check -->I
            <label>Health checks:</label>
            <div class="checkbox">
              <input type="hidden" name="desexed" value="0">
              <label><input type="checkbox" name="desexed" value="1">Desexed</label>
            </div>           
            <div class="checkbox">
              <input type="hidden" name="vaccinated" value="0">
              <label><input type="checkbox" name="vaccinated"  value="1">Vaccinated</label>
            </div>
            <div class="checkbox">
              <input type="hidden" name="wormed" value="0">
              <label><input type="checkbox" name="wormed" value="1">Wormed</label>
            </div>
            <div class="checkbox">
              <input type="hidden" name="heartworm" value="0">
              <label><input type="checkbox" name="heartworm" value="1">Heartworm treated</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      
      <!-- Add breed -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Add a breed</div>
        </div>
        <div class="panel-body">
          <form action="./test_files/add_breed.php" method="post">
            
            <!-- Select cat or dog -->
            <div class="form-group">
              <label for="type">Species:</label>
              <select class="form-control" id="species" name="species">
                <option>Cat</option>
                <option>Dog</option>
              </select>
            </div>
            
                    <!-- Enter breed name -->
            <div class="input-group">
              <span class="input-group-addon">Breed</span>
              <input id="petName" type="text" class="form-control" name="breedName" placeholder="Enter breed name">
            </div>
            <br>

            <!-- Enter breed size -->
            <div class="input-group">
              <span class="input-group-addon">Text</span>
             <select class="form-control" id="breedSize" name="breedSize">
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
              </select>
            </div>
            <br>

            <!-- Enter breed temperament -->
            <div class="input-group">
              <span class="input-group-addon">Temperament</span>
               <select class="form-control" id="temperament" name="temperament">
                <option>Placid</option>
                <option>Friendly</option>
                <option>Not sure</option>
              </select>
            </div>
            <br>
            
            <!-- Enter breed active -->
            <div class="input-group">
              <span class="input-group-addon">Active</span>
              <select class="form-control" id="active" name="active">
                <option>Quite</option>
                <option>Active</option>
                <option>Very Active</option>
              </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      
      <!-- Remove a pet box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Remove a pet</div>
        </div>
        <div class="panel-body">
          <form>
            <div class="input-group">
              <span class="input-group-addon">Text</span>
              <input id="petID" type="text" class="form-control" name="petID" placeholder="Enter pet ID">
            </div>
            <br>
            <button type="button" class="btn btn-primary">Remove</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
</body>
</html>