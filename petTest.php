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
          
          
          
          
          <form action="add_pet.php">
            
            <!-- Enter pet name -->
            <div class="input-group">
              <span class="input-group-addon">Text</span>
              <input id="petName" type="text" class="form-control" name="petName" placeholder="Enter pet name">
            </div>
            <br>
            
            <!-- Gender selection -->
            <div class="form-group">
              <label for="age">Gender:</label>
              <select class="form-control" name="age" id="age">
                <option>Female</option>
                <option>Male</option>
              </select>
            </div>
            
     
            <!-- Checkboxes for health check -->
            <label>Health checks:</label>
            <div class="checkbox">
              <input type="hidden" name="desexed" value="0">
              <label><input type="checkbox" name="desexed" value="1">Desexed</label>
            </div>           
            <div class="checkbox">
               <input type="hidden" name="vaccinated" value="0">
              <label><input type="checkbox" name="vaccinated" value="1">Vaccinated</label>
            </div>

            <button type="submit" value="Add Pet" class="btn btn-primary">Submit</button>
          </form>
       
       
       
        </div>
      </div>
      
   
    </div>
  </div>
</div>
</body>
</html>