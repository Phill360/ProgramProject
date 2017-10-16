<?php
  require_once('./_php/connect.php');
  
    if (!isset($_GET['PetId'])) {
        die("You must specify a Pet ID");
    }
    else {
      // first store GET values in variables
      $petID = $_GET['PetId'];
    }
    
    // 2. Perform Query
    $query = "SELECT * ";
    $query .= "FROM animals ";
    $query .= "WHERE rspcaID = $petID";
    $result = mysqli_query($connection, $query);
    // Test for query error
    if(!$result) {
    	die("Database query failed.");
    }
    else {
        
    }

?>

<!--<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Paw Companions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- Page Content -->
    <div class="container">



<body>
  <div class="pets container">
  <div class="slackey"><div class="black"><div class="textxxMedium"> View Pet </div></div></div>
  <?php
    while($row = mysqli_fetch_assoc($result)) {
  ?>
      <div class="col-xs-6 col-sm-4">
        <div class="thumbnail">
          <!--<img src="media/ahmed-saffu-208365png" alt "pet">-->
          <div class="caption">
            <div class="right">
            <a class="btn btn-default btn-lg" href="#">
            <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a>
            </button>
            </div>
            <h3> Name: <?php echo $row["petName"]; ?></h3>
            <p> Gender: <?php echo $row["gender"]; ?></p>
            <p> Age: <?php echo $row["age"]; ?></p>
            <p><?php echo $row["description"]; ?></p>
          </div>
        </div>
      </div>
  <?php
    }
  ?>
  </div>
  </body>
</html>