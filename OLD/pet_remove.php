<?php
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>

</head>

<body>

  <div class="row">
    <div class="col-sm-12">
      <!-- Remove a pet box -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans">Remove a pet</div>
        </div>
        <div class="panel-body">
          
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
            <div class="input-group">
              <span class="input-group-addon">Pet ID</span>
              <input id="petID" type="text" class="form-control" name="rspcaID" placeholder="Enter pet ID">
            </div>
            <br>
   
            <br>
            <button type="submit" class="btn btn-primary" name="removePetBtn">Remove</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>