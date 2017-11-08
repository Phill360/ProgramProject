<?php
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="opensans"><?php echo("Edit Breed ID: ". $_POST['editBreedBtn']); ?></div>
        </div>
        <div class="panel-body">
          <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post" enctype="multipart/form-data">
            <div class="input-group">
              <?php
              $breedID = $_POST['editBreedBtn'];
                  
              // Connect AWS MYSQL Server
              require('./_php/connect.php');
  
  	          $query = "SELECT * FROM breed WHERE breedID=$breedID";
  	          $result = mysqli_query($connection, $query);
                	
              // Test for query error
              if(!$result) 
              {
                die("Database query failed.");
              }
  	
              // List breeds in database
              while($row = mysqli_fetch_assoc($result)) 
              {
                $breedID = $row["breedID"];
                $type = $row["type"];
                $size = $row["size"];
                $temperament = $row["temperament"];
                $active = $row["active"];
                $name = $row["name"];
                $fee = $row["fee"];
              } 
              mysqli_close($connection);
              ?>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="remBreedBtn">Remove</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>