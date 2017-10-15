<?php
// require_once('./common.php');



 if (isset($_POST['addBreedBtn']))
  {
		// Get breed input
		$species = isset($_POST['species']) ? $_POST['species'] : '';
    $breedName = isset($_POST['breedName']) ? $_POST['breedName'] : '';
    $breedSize = isset($_POST['breedSize']) ? $_POST['breedSize'] : '';
    $temperament = isset($_POST['temperament']) ? $_POST['temperament'] : '';
    $active = isset($_POST['active']) ? $_POST['active'] : '';
    $fee = isset($_POST['fee']) ? $_POST['fee'] : '';
    
    addBreed($species, $breedName,$breedSize, $breedSize, $temperament, $active, $fee);
  }
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>

</head>

<body>

  <div class="row">
    <div class="col-sm-12">
      <!-- Add breed -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Add a breed</div>
        </div>
        <div class="panel-body">
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
            
            <!-- Select cat or dog -->
            <div class="form-group">
              <label for="type">Species:</label>
              <select class="form-control" id="species" name="species" required>
                <option>Cat</option>
                <option>Dog</option>
              </select>
            </div>
            
                    <!-- Enter breed name -->
            <div class="input-group">
              <span class="input-group-addon">Breed</span>
              <input id="petName" type="text" class="form-control" name="breedName" placeholder="Enter breed name" required>
            </div>
            <br>

            <!-- Enter breed size -->
            <div class="input-group">
              <span class="input-group-addon">Text</span>
             <select class="form-control" id="breedSize" name="breedSize" required>
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
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
                <option>Active</option>
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
            
            <button type="submit" class="btn btn-primary" name="addBreedBtn" >Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>