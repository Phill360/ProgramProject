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