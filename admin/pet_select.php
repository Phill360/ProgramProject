<?php
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
  <?php
  if (stristr($_SERVER['HTTP_USER_AGENT'],'mobi')!==FALSE) 
  {
  ?>  
    <div class="row">
      <div class="col-sm-12">
        
        <!-- Add a pet box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Edit a pet</div>
        </div>
        <div class="panel-body">
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post" enctype="multipart/form-data">
            
            <!-- Enter pet ID -->
            <div class="input-group">
              <label>RSPCA ID:</label>
              <input id="petID" type="text" class="form-control" name="rspcaID" placeholder="Enter pet ID"  required>
            </div>
            <br>
            
            <!-- Enter pet name -->
            <div class="input-group">
              <label>Name:</label>
              <input id="petName" type="text" class="form-control" name="petName" placeholder="Enter pet name"  required>
            </div>
            <br>

            <!-- Select pet breed -->
            <div class="input-group">
              <label for="age">Breed:</label>
              <select class="form-control" id="species" name="breedID" required>
                
                <?php
                // Connect AWS MYSQL Server
                require('_php/connect.php');

	              // Perform Query
	              $query = "SELECT breedID, type, name ";
	              $query .= "FROM breed ";
	              $result = mysqli_query($connection, $query);
              	// Test for query error
              	if(!$result) 
              	{
              		die("Database query failed.");
              	}
	
                // Generate Breed List
                while($row = mysqli_fetch_assoc($result)) {
                  // Need to make this only show breeds depending on the 
                  // whether Dog or cat is selected
                  // if ($row["type"] == "Dog") {
                    echo "<option value=\"".$row["breedID"]."\">".$row["name"]."</option>" ;
                  // }
                } 
                 mysqli_close($connection);
                ?>
              </select>
            </div>
            
            <!-- Image selection -->
            <label>Image:</label>
            <br>
            <form id="upload-image-form" action="" method="post" enctype="multipart/form-data"required>
              <div class="holder">
              <div id="image-preview-div" style="display: none">
                <img id="preview-img" src="noimage">
              </div>
              <div class="input-group">
                <input type="file" name="image" id="file" required>
              </div>
              </div>
              <br><br>
            
            <!-- Gender selection -->
            <div class="input-group">
              <label for="gender">Gender:</label>
              <select class="form-control" name="gender" id="gender" required>
                <option value="F">Female</option>
                <option value="M">Male</option>
              </select>
            </div>
            <br>
            
            <!-- Age selection -->
            <div class="input-group">
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
            <br>
            
            <!-- Pet description -->
            <div class="form-group">
              <label for="description">Pet Description:</label>
              <textarea class="form-control" name="description" id="description" rows="5" cols="50" required></textarea>
            </div>
            <br>
         
            <button type="submit" class="btn btn-primary" name="addPetBtn">Submit</button>
          </form>
        </div>
      
      
        <!-- Remove a pet box -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="opensans">Remove a pet</div>
          </div>
          <div class="panel-body">
            <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
              <div class="input-group">
                <span class="input-group-addon">Pet ID</span>
                <input id="petID" type="text" class="form-control" name="rspcaID" placeholder="RSPCA ID">
              </div>
              <br>
              <br>
              <button type="submit" class="btn btn-primary" name="mobileRemovePetBtn">Remove</button>
            </form>
          </div>
        </div>
      </div>
      </div>
    </div>
  <?php
  }
    else
  {
  ?>  
    <div class="row">
    <div class="col-sm-12">
      <!-- Remove a pet box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Edit or remove a pet</div>
        </div>
        <div class="panel-body">
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post" enctype="multipart/form-data">
            
            <?php
            // Connect AWS MYSQL Server
            require('_php/connect.php');

	          $query = "SELECT rspcaID, petName FROM animals";
	          $result = mysqli_query($connection, $query);
            
            // Test for query error
            if(!$result) 
            {
              die("Database query failed.");
            }
	          
	          ?>
	          <table class="table table-hover">
	            <thead>
                <tr>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">ID</th>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Name</th>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Edit</th>
                  <th class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Remove</th>
                </tr>
              </thead>
              <tbody>
	          <?php
            // List animals in database
            while($row = mysqli_fetch_assoc($result)) 
            {
              ?>
              <tr>
				        <td><?php echo $row["rspcaID"] ; ?> </td> 
				        <td><?php echo $row["petName"] ; ?>	</td>
				        <td><button type="submit" class="btn btn-success" name="editPetBtn" value=<?php echo $row["rspcaID"]?>>Edit</button></td>
				        <td><button type="submit" class="btn btn-danger" name="removePetBtn" value=<?php echo $row["rspcaID"]?>>Remove</button></td>
			        </tr>
              <?php
            }
            ?>
            </tbody>
            </table>
            <?php
            mysqli_close($connection);
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>  
  <?php
  }
  ?>
</body>
</html>