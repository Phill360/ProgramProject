<?php
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
            <div class="input-group">
              <label for="type">Species:</label>
              <select class="form-control" id="breedSpecies" name="breedSpecies" required>
                <option>Cat</option>
                <option>Dog</option>
              </select>
            </div>
            <br>
            
            <!-- Enter breed name -->
            <div class="input-group">
              <label for="type">Breed name:</label>
              <input id="breedName" type="text" class="form-control" name="breedName" placeholder="Enter breed name" required>
            </div>
            <br>

            <!-- Enter breed size -->
            <div class="input-group">
              <label for="type">Size:</label>
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
              <label for="type">Temperament:</label>
              <select class="form-control" id="breedTemperament" name="breedTemperament" required>
                <option>Easy Going</option>
                <option>Playful</option>
                <option>Excitable</option>
              </select>
            </div>
            <br>
            
            <!-- Enter breed active -->
            <div class="input-group">
              <label for="type">How active:</label>
              <select class="form-control" id="breedActive" name="breedActive" required>
                <option>Lap dog</option>
                <option>Active</option>
                <option>Sports star</option>
              </select>
            </div>
            <br>
            
            <!-- Enter breed fee -->
            <div class="input-group">
              <label for="type">Adoption fee:</label>
              <input id="breedFee" type="text" class="form-control" name="breedFee" placeholder="Enter adoption fee" required>
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