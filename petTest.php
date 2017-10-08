<?php
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
  
</head>

<body>
<div class="container">
  <div class="row">


    

    <!-- Add a pet box -->
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Add a pet</div>
        </div>
        <div class="panel-body">
          <form action="/add_pet.php">
            


            <!-- Enter pet name -->
            <div class="input-group">
              <span class="input-group-addon">Text</span>
              <input id="petName" type="text" class="form-control" name="petName" placeholder="Enter pet name">
            </div>
            <br>
            

            
            
            <!-- Gender selection -->
            <div class="form-group">
              <label for="age">Gender:</label>
              <select class="form-control" id="age">
                <option>Female</option>
                <option>Male</option>
              </select>
            </div>
            
       




            
            <!-- Checkboxes for health check -->
            <label>Health checks:</label>
            <div class="checkbox">
              <label><input type="checkbox" value="">Desexed</label>
            </div>           
            <div class="checkbox">
              <label><input type="checkbox" value="">Vaccinated</label>
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      
   
    </div>
  </div>
</div>
</body>
</html>