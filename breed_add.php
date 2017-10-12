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
    <div class="col-sm-12">
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
                <option>Easy Going</option>
                <option>Playful</option>
                <option>Excitable</option>
              </select>
            </div>
            <br>
            
            <!-- Enter breed active -->
            <div class="input-group">
              <span class="input-group-addon">Active</span>
              <select class="form-control" id="active" name="active">
                <option>Lap dog</option>
                <option>Active</option>
                <option>Sports star</option>
              </select>
            </div>
            <br>
            
                     <!-- Enter breed fee -->
            <div class="input-group">
              <span class="input-group-addon">Breed Fee</span>
              <input id="breedFee" type="text" class="form-control" name="fee" placeholder="Enter breed fee">
            </div>
            <br>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>