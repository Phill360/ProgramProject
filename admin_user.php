<?php

   

?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
  
</head>

<body>
<div class="container">
  <div class="row">
  <!-- Create new admin user box -->
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Promote normal user to admin user</div>
        </div>
        <div class="panel-body">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
          </div>
          <br>
          <form action="<?php normalToAdminUser(); ?>" method="post" name="newAdminUserForm">
            <button name="createNewAdminUserBtn" type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      
      <!-- Remove an admin user box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Demote admin user to normal user</div>
        </div>
        <div class="panel-body">
          <form>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="email" type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <br>
            <button type="button" class="btn btn-primary">Remove</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Add a pet box -->
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Add a pet</div>
        </div>
        <div class="panel-body">
          <form action="/action_page.php">
            
            <!-- Select cat or dog -->
            <div class="form-group">
              <label for="age">Species:</label>
              <select class="form-control" id="species">
                <option>Cat</option>
                <option>Dog</option>
              </select>
            </div>

            <!-- Enter pet ID -->
            <div class="input-group">
              <span class="input-group-addon">Text</span>
              <input id="petID" type="text" class="form-control" name="petID" placeholder="Enter pet ID">
            </div>
            <br>

            <!-- Enter pet name -->
            <div class="input-group">
              <span class="input-group-addon">Text</span>
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
            </form>
            
            <!-- Gender selection -->
            <div class="form-group">
              <label for="age">Gender:</label>
              <select class="form-control" id="age">
                <option>Female</option>
                <option>Male</option>
              </select>
            </div>
            
            <!-- Pet description -->
            <div class="form-group">
              <label for="comment">Description:</label>
                <textarea class="form-control" rows="5" id="petDescription"></textarea>
            </div>           

            <!-- Age selection -->
            <div class="form-group">
              <label for="age">Age:</label>
              <select class="form-control" id="age">
                <option>Less than 1 year</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15 years or older</option>
                <option>Age unknown</option>
              </select>
            </div> 

            <!-- Enter adoption fee -->
            <label>Adoption fee:</label>
            <div class="input-group">
              <span class="input-group-addon">Text</span>
                <input id="petFee" type="text" class="form-control" name="petFee" placeholder="Enter fee to adopt">
            </div>
            <br>
            
            <!-- Checkboxes for health check -->
            <label>Health checks:</label>
            <div class="checkbox">
              <label><input type="checkbox" value="">Desexed</label>
            </div>           
            <div class="checkbox">
              <label><input type="checkbox" value="">Vaccinated</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="">Wormed</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="">Heartworm treated</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="">Microchipped</label>
            </div>

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