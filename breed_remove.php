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
              <span class="input-group-addon">Text</span>
              <input id="breedID" type="text" class="form-control" name="breedID" placeholder="Enter breed ID">
            </div>
            <br>
            <p>Message<?php getMessage($message) ?></p>
            <br>
            <button type="submit" class="btn btn-primary" name="remBreedBtn">Remove</button>
          </form>
        </div>
      </div>

    </div>
  </div>

</body>
</html>